import LayoutPage,{chanzhi} from '../../core/layout-page.js';

LayoutPage({
	pay: function(e){
		var postData = {'payment': 'wechatpay'};
		if(wx.getStorageSync('userInfo'))
		{
			postData.wmpUserInfo = JSON.stringify(wx.getStorageSync('userInfo'));
			postData.wmpAccount  = wx.getStorageSync('token').userInfo.account;
		}
		chanzhi.ajaxPost({
            url: chanzhi.getServerUrl("order", "pay",{'orderID':38}),
            data: postData,
            header: {"content-type":"application/x-www-form-urlencoded"}
        }).then(data => {
			chanzhi.ajaxPost({
				url: chanzhi.getServerUrl("order", "wechatpay",{'orderID':38}),
				data: postData,
				header: {"content-type":"application/x-www-form-urlencoded"}
			}).then(data => {
				wx.requestPayment(
				{
					'timeStamp': '',
					'nonceStr': '',
					'package': '',
					'signType': 'MD5',
					'paySign': '',
					'success':function(res){},
					'fail':function(res){},
					'complete':function(res){}
				})
			})
        })
	}
})
