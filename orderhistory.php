<!DOCTYPE html>
<?php
	$origin = isset($_SERVER['HTTP_ORIGIN'])? $_SERVER['HTTP_ORIGIN'] : '';
	header( 'Access-Control-Allow-Origin:'.$origin);
	header( 'Access-Control-Allow-Credentials:true' );

?>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"  charset="utf-8">
    <!--引入样式表-->
    <link rel ="stylesheet" href="css/orderhistory.css">
    <link rel ="stylesheet" href="css/share.css">
    <!--引用JQ Mobile-->
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/117.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
    <title>历史订单</title>
    <script>
        $(document).ready(function(){
					$.ajax({
					 url: "http://115.159.181.250:9091/user",
					 xhrFields:{
						 withCredentials:true
					 },
					 async: true,
					 type: "get",
					 dataType:"text",
					 error: function() {
					 alert("failed");
					 },
					 success: function(data){
							 var json = jQuery.parseJSON(data);
							 var balance="余额:"+json.cash+"元";
							 $('.balance').html(balance);
				 }
			 });
            $("#choose").val("unused");
              ajax_unused();

							 check();
        });



         $(function () {
                $("#choose").change(function () {
                   if( $("#choose").val()=='used'){
                        ajax_used();

                   }
                    if( $("#choose").val()=='unused'){
                      ajax_unused();
                    }

               });

							 $("#")
            });
    </script>
</head>
<body class="body gray">
   <div class="content">
   <div data-role="header" class="header blue shadow_blue">

            <a href="javascript:history.go(-1)"><div class="barbtnL"><img class="barbtnimg" src="img/back.png"/></div></a>
            <span class="header_title">历史记录</span>

        </div>
       <div data-role="main" id="main" class="main">
         <div style="height:50px;width:100%;margin-top:0px;"></div>
         <div class="bord">

            <div class="choose">
                <select id="choose" class="select">
<option value="unused" class="option">未使用订单</option>
<option value="used" class="option">已使用订单</option></select>
<!--           <input type="button" class="showall" value="显示全部"/>-->
         <span class="balance"></span>
            </div>


        </div>
          <div id="record">
<!--
               <div class="templet_div">
                <div class="templet_div_half"><span class="templet_city">南京</span><span class="templet_time">2016.7.23</span></div>
                 <div class="templet_div_half"><span class="templet_way">新街口--大行宫</span><span class="templet_money">4元</span></div>
             </div>
-->
          </div>
<!--
             <div id="used">
                <div class="templet_div_used">
                <div class="templet_div_half"><span class="templet_city">南京</span><span class="templet_time">2016.7.23</span></div>
                 <div class="templet_div_half"><span class="templet_way">新街口--大行宫</span><span class="templet_money_used">4元</span></div>
             </div>

              </div>
-->
              <div style="height:50px;width:100%;margin-top:0px;"></div>
           </div>


           <div name="footer"  class="footer">

        <a href="main.php"><div id="home" class="footer_btn"><div class="footer_btn_icon"><img class="barbtnimg" src="img/footer_home.png"/></div><div class="footer_btn_text">首页</div></div></a>

            <a href="map.php?id=2"><div id="b_line" class="footer_btn"><div class="footer_btn_icon"><img class="barbtnimg" src="img/footer_line.png"/></div><div class="footer_btn_text">路线</div></div></a>

            <a href="buygift.php"><div id="b_ticket" class="footer_btn"><div class="footer_btn_icon"><img class="barbtnimg" src="img/footer_gift.png"/></div><div class="footer_btn_text">单程票</div></div></a>

            <a href="myaccount.php"><div id="person" class="footer_btn"><div class="footer_btn_icon"><img class="barbtnimg" src="img/footer_account.png"/></div><div class="footer_btn_text">账户</div></div></a>
        </div>
    </div>
    </body>
</html>
