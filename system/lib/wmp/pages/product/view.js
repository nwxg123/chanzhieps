import LayoutPage,{chanzhi} from '../../core/layout-page.js';

LayoutPage({
	onDataLoad: data => {
        data.attractive = [];
		data.number = 1;
		data.messageObjectType = "product";
        data.messageObjectID   = data.data.product.id;
        data.messageParam = {type : 'comment'};
		data.messageClass = "hide";
        return data;
    },
	onMessageLoad: data => {},
	clickAttr: function(e){
	    var value = e.currentTarget.dataset.value;
	    var price = e.currentTarget.dataset.price;
	    var attribute = e.currentTarget.dataset.attribute;
		var attractive = this.data.attractive;
		var attractivestr = "";
		var flag = false;
		for (var i = 0; i < attractive.length; i++) { 
			if(attractive[i].attribute == attribute) {
				attractive[i].value = value;
				attractive[i].price = price;
				flag = true;
			}
		}
		
		if(flag === false) {
			attractive = attractive.concat([{attribute:attribute,value:value,price:price}])
		}
		
		this.setData({attractive : attractive});
		
		if(this.data.data.product.promotion){
			price = this.data.data.product.promotion;
		}
		else{
			price = this.data.data.product.price;
		}
			
		for (var i = 0; i < attractive.length; i++) {
			if(attractive[i].price) price = parseFloat(price) + parseFloat(attractive[i].price);
			attractivestr += attractive[i].attribute + '|=|' + attractive[i].value + "||";
		}
	    this.setData({attractivestr : attractivestr});
	    this.setData({attrprice : price.toFixed(2)});
    },
	addNum: function(e){
		var number = this.data.number;
		number = parseInt(number) + 1;
		this.setData({number : number});
		
	},
	reduceNum: function(e){
		var number = this.data.number;
		number = parseInt(number) - 1;
		if(number > 0) this.setData({number : number});
	},
	buySubmit: function(e){
		wx.setStorageSync('postData', e.detail.value);
		wx.navigateTo({
			url: '../order/confirm',
		});
    },
	showMessage: function(e){
		if(this.data.messageClass == 'hide')
		{
			this.setData({messageClass : ""});
		}
		else
		{
			this.setData({messageClass : "hide"});
		}
	},
});