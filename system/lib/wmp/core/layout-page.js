import WxParse from '../lib/wxParse/wxParse.js';
import blockLayoutTypes from './block-layouts.js';
import md5 from '../lib/mzui/js/md5.js';

/**
 * 获取当前页面 URL
 * 
 * @return {string}
 */
const getCurrentPageUrl = () => {
    const pages = getCurrentPages();
    const currentPage = pages[pages.length - 1];
    return currentPage.route;
};

// 获取全局 app 对象
const app = getApp();
// 获取 chanzhi 和 config 对象
export const {chanzhi, config} = app;

const pageTitleCache = {};

/**
 * 创建蝉知通用布局注册页面时的配置对象
 *
 * @param {object} options 注册参数
 * @return {object}
 */
export const createLayoutPage = (options = {}) => {
    let { moduleName, methodName } = options;

    // 获取注册页面配置
    return Object.assign({}, options, {
        /**
         * 页面绑定的数据
         */
        data: {
			msgClass: 'hide',
            loading: true,
            layouts: {},
            config
        },

        /**
         * 处理页面加载完成事件
         */
        onLoad: function (params) {
            const currentPageUrl = getCurrentPageUrl();
            const currentPageUrlSegs = currentPageUrl.split('/');
            if (!moduleName) {
                moduleName = currentPageUrlSegs[currentPageUrlSegs.length - 2];
                this.moduleName = moduleName;
            }
            if (!methodName) {
                methodName = currentPageUrlSegs[currentPageUrlSegs.length - 1];
                this.methodName = methodName;
            }

            const errorMessage = chanzhi.error;
            if (errorMessage) {
                app.errorMessage = errorMessage;
                wx.redirectTo({
                    url: '../error/index',
                });
                return;
            }
            this.serverUrl = chanzhi.getServerUrl(moduleName, methodName, params);

            if (pageTitleCache[this.serverUrl]) {
                wx.setNavigationBarTitle({
                    title: pageTitleCache[this.serverUrl],
                });
            }

            this.loadData();
            if (options.onLoad) {
                options.onLoad(params);
            }

            if (config.debug) {
                console.log('LayoutPage.onLoad', this);
            }
        },

        searchSubmit: function(e) {
            wx.redirectTo({
                url: '../search/index?words=' + e.detail.value,
            });
            return;
        },
        
        /**
         * 尝试从服务器获取数据并刷新页面，如果当前已经正在获取数据过程中，则放弃此次请求
         */
        tryLoadData: function () {
            if (this.request && this.request.working) {
                return;
            }
            return this.loadData();
        },

        /**
         * 从服务器获取数据并刷新页面，如果当前已经正在获取数据过程中，则放弃之前的请求，重新获取数据
         */
        loadData: function () {
            // 检查是否有上个请求进行中，如果有则取消上次的请求
            if (this.request && this.request.working) {
                this.request.abort();
                if (config.debug) {
                    console.log('LayoutPage.loadData: abort last request and start a new one.');
                }
            }

            if (config.debug) {
                console.log('LayoutPage.loadData', this.serverUrl);
            }

            // 显示正在加载提示
            wx.showNavigationBarLoading();
			
			var postData = {};
			if(this.postData) postData = wx.getStorageSync('postData');
			
			if(wx.getStorageSync('userInfo'))
			{
				postData.wmpUserInfo = JSON.stringify(wx.getStorageSync('userInfo'));
				postData.wmpAccount  = wx.getStorageSync('token').userInfo.account;
			}
			
            // 发起 ajax 请求
            this.request = chanzhi.ajaxPost({
                url: this.serverUrl,
				data: postData,
				header: {"content-type":"application/x-www-form-urlencoded"},
                complete: () => {
                    wx.hideNavigationBarLoading();
                    wx.stopPullDownRefresh();
                    this.request = null;
                }
            }).then(data => {
                // 格式化服务器端数据
                delete data.status;

                // 处理富文本编辑器中图片路径以及图片大小 
                Object.keys(data).forEach(key1 => {
                    const data1 = data[key1];
                    if(data1 && typeof data1 === 'object')
                    {
                        Object.keys(data1).forEach(key2 => {
                            const data2 = data1[key2];
                            if(data2 && typeof data2 === 'object')
                            {
                                Object.keys(data2).forEach(key3 => {
                                    let data3 = data2[key3];
                                    if (data3 && typeof data3 === 'string') {
                                        // 修复文章中的图片地址
                                        if (data3.includes('src="/file.php?f=')) {
                                            data3 = data3.replace(/src="\/file\.php\?f=/gi, `src="${config.root}/file.php?f=`);
                                        }
                                        if (data3.includes('src=\'/file.php?f=')) {
                                            data3 = data3.replace(/src='\/file\.php\?f=/gi, `src='${config.root}/file.php?f=`);
                                        }
                                        // 修复文章中的图片大小
                                        if (data3.includes('<img ')) {
                                            data3 = data3.replace(/\<img /gi, '<img style="width:100%; height: auto" ');
                                        }
                                        data[key1][key2][key3] = data3;
                                    }
                                });
                            }
                        })
                    }
                });

                // 格式化布局中的区块对象，将 content 字段从字符串转换为 js 对象
                if (data.layouts) {
                    Object.keys(data.layouts).forEach(pageName => {
                        const pageLayout = data.layouts[pageName];
                        Object.keys(pageLayout).forEach(layoutName => {
                            const blocks = pageLayout[layoutName];
                            blocks.forEach(block => {
                                block.layoutType = block.layoutType || blockLayoutTypes[block.type] || block.type;
                                if (block.titleless === '0') {
                                    block.titleless = false;
                                }
                                if (block.borderless === '0') {
                                    block.borderless = false;
                                }
                                if (block && block.content && typeof block.content === 'string') {
                                    block.content = JSON.parse(block.content);
                                    if (block.type === 'htmlcode' && block.content.content) {
                                        block.content.setData = data => {
                                            if (data.article) {
                                                block.content.article = data.article;
                                            }
                                        };
                                        WxParse.wxParse('article', 'html', block.content.content, block.content, 5);
                                    }
                                }
                            });
                        })
                    });
                }

                if (this.onDataLoad) {
                    data = this.onDataLoad.call(this, data);
                }
				
                // 更新导航栏标题
                if (data.data && data.data.title) {
                    wx.setNavigationBarTitle({
                        title: data.data.title
                    });
                    pageTitleCache[this.serverUrl] = data.data.title;
                }
                // 如果服务器端有设置导航条样式则应用服务器上的设置
                if (data.navigationStyle) {
                    wx.setNavigationBarColor({
                        frontColor: data.navigationStyle.frontColor,
                        backgroundColor: data.navigationStyle.backgroundColor,
                    });
                }

                // 取消显示正在加载的提示
                data.loading = false;
                data.serverUrl = this.serverUrl;

                if (this.onLogin) {
                    if(!wx.getStorageSync('token')) {
                        wx.login({
                            success(res) {
                                if(res.code) {
                                    chanzhi.ajaxGet( {
                                        url: chanzhi.getServerUrl('wmp', 'wmpLogin',{'code':res.code})
                                    }).then(data => {
                                        if(data.status == 'success')
                                        {
                                            wx.setStorageSync('token', data);
                                        }
                                    })
                                }
                            }
                        });
                    }
                    if(wx.getStorageSync('token').userInfo) {
                        const _this = this;
                        wx.getSetting({
                            success (res) {
                                if (res.authSetting['scope.userInfo']) {
                                    wx.getUserInfo({
                                        success: function(res) {
                                            data.avatar = res.userInfo.avatarUrl;
                                            data.name = wx.getStorageSync('token').userInfo.realname;
                                            data.clickLogin = "已授权";
                                            _this.setData(data);
                                        }
                                    });
                                }
                            }
                        });
                    }
                }
				
				if (this.onMessageLoad) {
					chanzhi.ajaxGet({
					 url: chanzhi.getServerUrl("message", "comment", {objectType: data.messageObjectType, objectID: data.messageObjectID}),
					 }).then(res => {
						data.message = res.data;
						this.setData(data);
					 })
				}
				
                // 更新界面
                this.setData(data);

                if (config.debug) {
                    console.log('LayoutPage.data', this.data);
                    global.layoutData = this.data;
                }
            }).catch(error => {
                wx.showModal({
                    title: '无法从服务器获取数据。（Cannot get data from remote server.）',
                    content: (error instanceof Error) ? error.message : error,
                });
            });
            return this.request;
        },
		
        formSubmit: function(e) {
            e.detail.value.wmpUserInfo = JSON.stringify(wx.getStorageSync('userInfo'));
            e.detail.value.wmpAccount  = wx.getStorageSync('token').userInfo.account;

            const {module,method,param} = e.currentTarget.dataset;
            chanzhi.ajaxPost({
                url: chanzhi.getServerUrl(module, method, param),
                data: e.detail.value,
                header: {"content-type":"application/x-www-form-urlencoded"}
            }).then(res => {
                const _this = this;
                if(res.result == 'success')
                {
                    _this.setData({msgClass: 'msger-success'});
                    _this.setData({msgInfo: res.message});
                }

                if(res.result == 'fail')
                {
                    _this.setData({msgClass: 'msger-warning'});
                    if(res.message.content){
                        _this.setData({msgInfo: res.message.content});
                    }
                    else {
                        _this.setData({msgInfo: res.message});
                    }
                }

                setTimeout(function() {
                    _this.setData({msgClass: "hide"});
                    _this.setData({msgInfo: ""});
                }, 2000);

                if(res.locate) {
                    setTimeout(function() {
                        wx.navigateTo({
                            url: chanzhi.convertUrl(res.locate),
                        });
                    }, 1000);
                }
            })
        },
		
		wxParseTagATap: function (e){
			var href = e.currentTarget.dataset.src;
			wx.redirectTo({
				 url: href
			})
		},
        /**
         * 处理下拉刷新请求
         */
        onPullDownRefresh: function () {
            if (options.onPullDownRefresh && options.onPullDownRefresh() === false) {
                return;
            }
            return this.tryLoadData();
        },

        onReady: function() {
            if (config.navigationBarStyle) {
                wx.setNavigationBarColor({
                    frontColor: config.navigationBarStyle.frontColor,
                    backgroundColor: config.navigationBarStyle.backgroundColor,
                });
            } else if (config.theme) {
                const { theme } = config;
                if (theme.navigationFrontColor) {
                    wx.setNavigationBarColor({
                        frontColor: theme.navigationFrontColor,
                        backgroundColor: theme.navigationBackgroundColor,
                    });
                }
            }

            if (options.onReady) {
                options.onReady();
            }
        }
    });
};

/**
 * 注册蝉知通用布局页面
 * 
 * @param {object} options 注册参数
 */
export default (options) => {
    // 注册页面
    Page(createLayoutPage(options));
};
