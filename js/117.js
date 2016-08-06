function checkPhone(phone){
    if(!(/^1[3|4|5|7|8]\d{9}$/.test(phone))){
        alert("手机号码有误，请重填");
    return false;   }
			return true;
}
function format_month(month) {
       if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
             return month;
    }

function check(){
	$.ajax({
		url: "http://115.159.181.250:9091/userhaha",
		xhrFields:{
			withCredentials:true
		},
		async: true,
		type: "get",
		dataType:"text",
		error: function() {
				window.location="signin.php";
		},
		success: function(data){
				if(data!="success")
						window.location="signin.php";
		}
});
}
function templet_unused(ticket_id,time,city,f,t,fare){

return '<a id="jump" href="giftqrcode.php?id='+ticket_id+'&balance='+fare+'&f='+f+'&t='+t+'"><div class="templet_div"><div class="templet_div_half"><span class="templet_city">订单号:'+ticket_id+'</span><span class="templet_time">'+time+'</span></div><div class="templet_div_half"><span class="templet_city">'+city+'</span><span class="templet_way">'+f+'--'+t+'</span><span class="templet_money">'+fare+'元'+'</span></div></a>'

}
function templet_used(ticket_id,time,city,f,t,fare){

return '<div class="templet_div_used"><div class="templet_div_half"><span class="templet_city">订单号:'+ticket_id+'</span><span class="templet_time">'+time+'</span></div><div class="templet_div_half"><span class="templet_city">'+city+'</span><span class="templet_way">'+f+'--'+t+'</span><span class="templet_money_used">'+fare+'元'+'</span></div>'

}
function templet_record_c(city,time,f,t,fare){
	return '<div class="templet_div"><div class="templet_div_half"><span class="templet_city">'+city+'</span><span class="templet_time">'+time+'</span></div><div class="templet_div_half"><span class="templet_way">'+f+'--'+t+'</span><span class="templet_money">'+fare+'元</span></div>'

}
function templet_record_r(payway,time,num,money){
	return '<div class="templet_div"><div class="templet_div_half"><span class="templet_city">'+payway+'</span><span class="templet_time">'+time+'</span></div><div class="templet_div_half"><span class="templet_way">'+num+'</span><span class="templet_money">'+money+'元</span></div>'

}
function ajax_unused(){
	$.ajax({
	url:"http://115.159.181.250:9092/getUnUsedOrderById",
	xhrFields:{
	withCredentials:true
	},
	type:"get",
	dataType:"text",
	error:function(){
			window.location="signin.php";
	},success:function(data){
			var json = jQuery.parseJSON(data);
      $("#record").html("");
			$.each(json,function(i,item){
        if(item.message=="您还没有订单"){
           $("#record").html('<span style="font-size:24px;color:gray;">无记录</span>');
        }
        else {
          var id=item.id;
  				var fare =item.cost_cash;
  				var time =item.cost_date.replace('-','.').replace('-','.');
          var city = item.city;
          var f = item.station_start;
          var t =item.station_end;
  			 $("#record").append(templet_unused(id,time,city,f,t,fare));
        }
			});
	}
	});
}
function ajax_used(){
	$.ajax({
	url:"http://115.159.181.250:9092/getUsedOrder",
	xhrFields:{
	withCredentials:true
	},
	type:"get",
	dataType:"text",
	error:function(){
			window.location="signin.php";
	},success:function(data){
			var json = jQuery.parseJSON(data);
      $("#record").html("");
			$.each(json,function(i,item){
        if(item.message=="您还没有订单"){
          $("#record").html('<span style="font-size:24px;color:gray;">无记录</span>');
        }
        else {
          var id=item.id;
          var fare =item.cost_cash;
          var time =item.cost_date.replace('-','.').replace('-','.');
          var f=item.station_start;
          var t=item.station_end;
          var city=item.city;
         $("#record").append(templet_used(id,time,city,f,t,fare));
        }

			});
	}
	});
}
function ajax_consume(time){
  var total=0;
	$.ajax({
	url:"http://115.159.181.250:9092/getUsedOrderByMonth",
	xhrFields:{
	withCredentials:true
	},
  async:false,
	type:"get",
	data: {date:time},
	dataType:"text",
	error:function(){
			// window.location="signin.php";
	},success:function(data){
			var json = jQuery.parseJSON(data);
      	$("#record").html("");
			$.each(json,function(i,item){
        if(item.message=="您还没有订单"){
         $("#record").html('<span style="font-size:24px;color:gray;">无记录</span>');
        }
        else {
          var fare =item.cost_cash;
  				var time =item.cost_date.replace('-','.').replace('-','.');
  				var f=item.station_start;
  				var t=item.station_end;
          var city=item.city;
          total=item.cost_cash+total;
  			 $("#record").append(templet_record_c(city,time,f,t,fare));
          $("#record").trigger("create");
        }
			});
	}
	});
  return total;
}
function ajax_recharge(time){
  var total=0;
	$.ajax({
	url:"http://115.159.181.250:9092/checkRecharge",
	xhrFields:{
	withCredentials:true
	},
  async:false,
	type:"get",
	data: {date:time},
	dataType:"text",
	error:function(){
			// window.location="signin.php";
	},success:function(data){
    	$("#record").html("");
			var json = jQuery.parseJSON(data);
			$.each(json,function(i,item){
        if(item.message){
             $("#record").html('<span style="font-size:24px;color:gray;">无记录</span>');
        }
        else {
          var month=format_month(new Date(item.date).getMonth() + 1);
          var time=new Date(item.date).getFullYear()+'.'+month+'.'+new Date(item.date).getDate();
  				var payway =item.method;
  				var num='0000000';
  				var money=item.cash;
            total=item.cash+total;
  			 $("#record").append(templet_record_r(payway,time,num,money));
          $("#record").trigger("create");
        }

			});
	}
	});
  return total;
}
function jump(id,balance,s,e){
 window.location="giftqrcode.php?id="+id+"&balance="+balance+"&f="+s+"&t="+e;
}
