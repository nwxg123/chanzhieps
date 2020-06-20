import LayoutPage from '../../core/layout-page.js';

LayoutPage({
    onDataLoad: data => {
        data.avatar = './image/default-head.png';
        data.name = '未登录';
        data.clickLogin = '点击登陆';
        return data;
    },
    onLogin: data => {},
    bindGetUserInfo: function(e){
        if(e.detail.userInfo){
            wx.setStorageSync('userInfo', e.detail);
            if(wx.getStorageSync('token') && !wx.getStorageSync('token').userInfo){
                wx.navigateTo({
                    url: '../user/oauthbind',
                });
            }
            if(wx.getStorageSync('token').userInfo)
            {
                this.setData({avatar : e.detail.userInfo.avatarUrl});
                this.setData({name : wx.getStorageSync('token').userInfo.realname});
                this.setData({clickLogin : "已授权"});
            }
        }
    }
})
