import LayoutPage,{chanzhi} from '../../core/layout-page.js';

LayoutPage({
	onDataLoad: data => {
		var products = data.data.products;
		var total_fee = 0;
		for (var id in products) {
			if(products[id].promotion !== 0) total_fee = (parseFloat(total_fee) + products[id].promotion * products[id].count).toFixed(2)
			if(products[id].promotion === 0) total_fee = (parseFloat(total_fee) + products[id].price * products[id].count).toFixed(2)
		}
		data.total_fee = total_fee;
        return data;
    },
    postData: data => {},
	addNum: function(e){
		var price     = 0;
		var total_fee = 0;
		var id        = e.currentTarget.dataset.id;
		var data      = this.data.data;
		var products  = data.products;
		var count     = products[id].count;
		
		if(products[id].promotion !== 0)
		{
			price = products[id].promotion;
		}
		else
		{
			price = products[id].price;
		}
		count = parseInt(count) + 1;
		products[id].count = count;
		products[id].total = (count * price).toFixed(2);
		this.setData({data : data});
		
		for (var id in products) {
			if(products[id].promotion !== 0) total_fee = (parseFloat(total_fee) + products[id].promotion * products[id].count).toFixed(2)
			if(products[id].promotion === 0) total_fee = (parseFloat(total_fee) + products[id].price * products[id].count).toFixed(2)
		}
		this.setData({total_fee : total_fee});
	},
	reduceNum: function(e){
		var price     = 0;
		var total_fee = 0;
		var id        = e.currentTarget.dataset.id;
		var data      = this.data.data;
		var products  = data.products;
		var count     = products[id].count;
		
		if(products[id].promotion !== 0)
		{
			price = products[id].promotion;
		}
		else
		{
			price = products[id].price;
		}
		count = parseInt(count) - 1;
		if(count > 0)
		{
		    products[id].count = count;
		    products[id].total = (count * price).toFixed(2);
		    this.setData({data : data});
		}
		
		for (var id in products) {
			if(products[id].promotion !== 0) total_fee = (parseFloat(total_fee) + products[id].promotion * products[id].count).toFixed(2)
			if(products[id].promotion === 0) total_fee = (parseFloat(total_fee) + products[id].price * products[id].count).toFixed(2)
		}
		this.setData({total_fee : total_fee});
	},
	inputNum: function(e){
		var price     = 0;
		var total_fee = 0;
		var id        = e.currentTarget.dataset.id;
		var data      = this.data.data;
		var products  = data.products;
		var count     = e.detail.value;
		
		if(products[id].promotion !== 0)
		{
			price = products[id].promotion;
		}
		else
		{
			price = products[id].price;
		}
		if(count > 0)
		{
		    products[id].count = count;
		    products[id].total = (count * price).toFixed(2);
		    this.setData({data : data});
		}
		
		for (var id in products) {
			if(products[id].promotion !== 0) total_fee = (parseFloat(total_fee) + products[id].promotion * products[id].count).toFixed(2)
			if(products[id].promotion === 0) total_fee = (parseFloat(total_fee) + products[id].price * products[id].count).toFixed(2)
		}
		this.setData({total_fee : total_fee});
	},
})
