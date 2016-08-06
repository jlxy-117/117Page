<?php
	$origin = isset($_SERVER['HTTP_ORIGIN'])? $_SERVER['HTTP_ORIGIN'] : '';
	header( 'Access-Control-Allow-Origin:'.$origin);
	header( 'Access-Control-Allow-Credentials:true' );
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="utf-8">
    <!--引入样式表-->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/share.css">
    <!--引用JQ Mobile-->
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
    <script src="js/117.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <link rel="stylesheet" href="css/swiper.css">
    <title>主页</title>
    <script>
      $(document).ready(function(){
        //  check();

				//  var username=0;
				//  var balance=0;
				// info(username,balance);


				$.ajax({
					url: "http://115.159.181.250:9091/user",
					xhrFields:{
						withCredentials:true
					},
					async: true,
					type: "get",
					dataType:"text",
					error: function() {
				  window.location="signin.php"
					},
					success: function(data){

							var json = jQuery.parseJSON(data);
							var username=json.user_name;
							var balance='余额:'+json.cash+'元';
							$('.username').html(username);
							$('.balance').html(balance);
				}
			});      
               check();
        });
    </script>
</head>





<body class="body gray">
    <div class="content">
        <div data-role="header" class="header blue shadow_black">
            <span class="header_title">主页</span>
        </div>
        <div data-role="main" class="main">
            <div style="height:50px;width:100%;margin-top:0px;"></div>
           <div class="swiper-container">
						 <div class="swiper-wrapper">
		             <div class="swiper-slide"><img src="img/1.jpg" class="slideimg"/></div>
		             <div class="swiper-slide"><img src="img/2.jpg" class="slideimg"/></div>
		             <div class="swiper-slide"><img src="img/3.jpg" class="slideimg"/></div>
		              <div class="swiper-slide"><img src="img/4.jpg" class="slideimg"/></div>
		              <div class="swiper-slide"><img src="img/5.jpg" class="slideimg"/></div>
		         </div>
		         <!-- Add Pagination -->
		         <div class="swiper-pagination swiper-pagination-white"></div>
		         <!-- Add Arrows -->
		         <div class="swiper-button-next swiper-button-white"></div>
		         <div class="swiper-button-prev swiper-button-white"></div>
		     </div>
            <div id="menu">
                <div id="info">
                    <div class="head">
                        <img id="headimg" src="img/headimg.png" />
                    </div>
                    <div class="username_div"><span class="username"></span></div>
                    <div class="weather_div"><?php
                        $ch = curl_init();
                        $url = 'http://apis.baidu.com/heweather/weather/free?cityid=CN101190101';
                        $header = array(
                            'apikey: f39c0332e60e92bcc13417f6ceb44dea',
                        );
                        // 添加apikey到header
                        curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        // 执行HTTP请求
                        curl_setopt($ch , CURLOPT_URL , $url);
                        $res = curl_exec($ch);

                        $weather = json_decode($res,true);
                        $cond_d=$weather['HeWeather data service 3.0'][0]['daily_forecast'][0]['cond']['txt_d'];
                        $cond_n=$weather['HeWeather data service 3.0'][0]['daily_forecast'][0]['cond']['txt_n'];
                        $cond=null;
                        if($cond_d==$cond_n){
                          $cond=$cond_d;
                        }
                        else{
                          $cond=$cond_d."转".$cond_n;
                        }
                        $tmp=$weather['HeWeather data service 3.0'][0]['daily_forecast'][0]['tmp']['max']."℃"."~".$weather['HeWeather data service 3.0'][0]['daily_forecast'][0]['tmp']['min']."℃";
                        echo "<span class=\"weather\">".$cond."<br/>".$tmp."</span>";
                    ?></div>
                    <div class="city_div"><span class="city">南京市</span></div>
                    <div class="balance_div"><span class="balance"></span></div>
                </div>
                <div id="btns">
                    <!--按钮第一行-->
                    <div id="btns_1" class="btns_1">
                        <!--二维码-->
                        <div id="qcode">
                            <div class="btn_img_div">
                            <img id="myqrcode" class="btn_img" src="img/myqrcode.png" />
                            </div>
                        </div>
                        <!--单程票-->
                        <div id="ticket">
                            <div class="btn_img_div">
                                <a href="buygift.php"><img class="btn_img" src="img/gift.png" /></a>
                            </div>
                        </div>
                        <!--地图-->
                        <div id="map">
                            <div class="btn_img_div">
                                <a href="map.php?id=1"><img class="btn_img" src="img/map.png" /></a>
                            </div>
                        </div>
                    </div>
                    <!--按钮第二行-->
                    <div id="btns_2" class="btns_2">
                        <!--路线-->
                        <div id="line">
                            <div class="btn_img_div">
                                <a href="map.php?id=2"><img class="btn_img" src="img/line.png" /></a>
                            </div>
                        </div>
                        <!--附近-->
                        <div id="nearby">
                            <div class="btn_img_div">
                                <a href="map.php?id=3"><img class="btn_img" src="img/nearby.png" /></a>
                            </div>
                        </div>
                        <!--充值-->
                        <div id="topup">
                            <div class="btn_img_div">
                                <a href="recharge.php"><img class="btn_img" src="img/recharge.png" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div name="footer" class="footer">

            <a href="main.php">
                <div id="home" class="footer_btn">
                    <div class="footer_btn_icon"><img class="barbtnimg" src="img/footer_home.png" /></div>
                    <div class="footer_btn_text">首页</div>
                </div>
            </a>

            <a href="map.php?id=2">
                <div id="b_line" class="footer_btn">
                    <div class="footer_btn_icon"><img class="barbtnimg" src="img/footer_line.png" /></div>
                    <div class="footer_btn_text">路线</div>
                </div>
            </a>

            <a href="buygift.php">
                <div id="b_ticket" class="footer_btn">
                    <div class="footer_btn_icon"><img class="barbtnimg" src="img/footer_gift.png" /></div>
                    <div class="footer_btn_text">单程票</div>
                </div>
            </a>

            <a href="myaccount.php">
                <div id="person" class="footer_btn">
                    <div class="footer_btn_icon"><img class="barbtnimg" src="img/footer_account.png" /></div>
                    <div class="footer_btn_text">账户</div>
                </div>
            </a>
        </div>
    </div>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        spaceBetween: 0,
        centeredSlides: true,
        autoplay: 2500,
        autoplayDisableOnInteraction: false
    });

		$(function(){



			$("#myqrcode").click(function(){
				 $.ajax({
					url: "http://115.159.181.250:9091/session",
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
							window.location="myqrcode.php?id="+data;
				}



				 });

			});
		});
    </script>
</body>

</html>
