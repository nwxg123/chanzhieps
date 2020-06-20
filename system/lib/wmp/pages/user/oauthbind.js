import LayoutPage,{chanzhi} from '../../core/layout-page.js';
import md5 from '../../lib/mzui/js/md5.js';

LayoutPage({
    onDataLoad: data => {
        data.token = wx.getStorageSync('token').token;
        data.class = 'hide';
        return data;
    },
    skipBind: function(e){
        chanzhi.ajaxPost({
            url: chanzhi.getServerUrl("wmp", "skipBind"),
            data: wx.getStorageSync('token'),
            header: {"content-type":"application/x-www-form-urlencoded"}
        }).then(data => {
            if(data.result == 'success')
            {
                var token = wx.getStorageSync('token');
                token.token = data.data.account;
                token.userInfo = data.data;
                wx.setStorageSync('token', token);
                wx.navigateTo({
                    url: '../user/control',
                });
            }
            if(data.result == 'fail')
            {
                wx.redirectTo({
                    url: '../user/control',
                })
            }
        })
    },
    loginFormSubmit: function(e){
        if(e.detail.value.password){
            e.detail.value.password = md5(md5(e.detail.value.password) + e.detail.value.account)
        }
        chanzhi.ajaxPost({
            url: chanzhi.getServerUrl("wmp", "bindwechatuser"),
            data: e.detail.value,
            header: {"content-type":"application/x-www-form-urlencoded"}
        }).then(data => {
            if(data.result == 'success')
            {
                var token = wx.getStorageSync('token');
                token.userInfo = data.data;
                token.token = data.data.account;
                wx.setStorageSync('token', token);
                wx.navigateTo({
                    url: '../user/control',
                });
            }
            if(data.result == 'fail')
            {
                this.setData({class : ""});
                this.setData({errorMsg : data.message});
            }
        })
    }
})
