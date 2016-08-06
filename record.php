<!DOCTYPE html>
<?php
	$origin = isset($_SERVER['HTTP_ORIGIN'])? $_SERVER['HTTP_ORIGIN'] : '';
	header( 'Access-Control-Allow-Origin:'.$origin);
	header( 'Access-Control-Allow-Credentials:true' );

?>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="utf-8">

    <link rel="stylesheet" href="css/record.css">
    <link rel="stylesheet" href="css/share.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/117.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
    <script src="js/mobiscroll.core.js"></script>
    <script src="js/mobiscroll.widget.js"></script>
    <script src="js/mobiscroll.scroller.js"></script>
    <script src="js/mobiscroll.util.datetime.js"></script>
    <script src="js/mobiscroll.datetimebase.js"></script>
    <script src="js/mobiscroll.widget.ios.js"></script>
    <script src="js/mobiscroll.i18n.zh.js"></script>
    <link href="css/mobiscroll.animation.css" rel="stylesheet" type="text/css" />
    <link href="css/mobiscroll.widget.css" rel="stylesheet" type="text/css" />
    <link href="css/mobiscroll.widget.ios.css" rel="stylesheet" type="text/css" />
    <link href="css/mobiscroll.scroller.css" rel="stylesheet" type="text/css" />
    <link href="css/mobiscroll.scroller.ios.css" rel="stylesheet" type="text/css" />
    <title></title>
    <script>
        $(document).ready(function() {
          //  check();
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
							 var balance=json.cash;
							 $('#balance').val(balance);
				 }
			 });
            var type = location.href.charAt(location.href.length - 1);
            var month =format_month(new Date().getMonth() + 1);
             $("#time").val(new Date().getFullYear() + '.' + month);
              var t =$("#time").val().replace('.','-');
            switch (type) {
//消费记录
                case 'c':
                document.title = "消费记录";
                $("#header_title").text("消费记录");
                $(".header").addClass("blue shadow_blue");
                 $("#bord").addClass("darkblue");
                $("#consume_title").val("消费");
                document.getElementById('refresh').src="img/refesh_c.png";

                  $("#consume").val(ajax_consume(t));
                    break;
//充值记录
                case 'r':
                document.title = "充值记录";
               $("#header_title").html("充值记录");
                $(".header").addClass("red shadow_red");
                $("#bord").addClass("darkred");
                  $("#consume_title").val("充值");
                  document.getElementById('refresh').src="img/refesh_r.png";
                  $("#consume").val(ajax_recharge(t));
                    break;
                default:
                    alert("error");
            }




           check();
        });
    </script>

    <script>
		$(function(){$("#refresh").click(function() {
							var t =$("#time").val().replace('.','-');
										if($("#consume_title").val()=="消费"){
											$("#consume").val(ajax_consume(t));
										}
									 if($("#consume_title").val()=="充值"){$("#consume").val(ajax_recharge(t));}

											});
										});
    </script>
</head>

<body class="body gray">
    <div class="content">
        <div class="header blue shadow_blue">

            <a href="myaccount.php">
                <div class="barbtnL"><img class="barbtnimg" src="img/back.png" /></div>
            </a>

            <span id="header_title" class="header_title"></span>
        </div>
        <div data-role="main" id="main" class="main">
            <div id="bord">
                <div id="div_time" class="time">
                    <input type="button" value="时间" class="title" />
                    <input id="time" type="button" value="" class="number" />
                </div>
                <div class="consume_div">
                    <input id="consume_title" type="button" value="" class="title" />
                    <input id="consume" type="button" value="" class="number" />
                </div>
                <div class="balance_div">
                    <input type="button" value="余额" class="title" />
                    <input id="balance" type="button" value="" class="number" />
                </div>
            </div>
            <div id="record">
                <!--
             <div class="templet_div">
                <div class="templet_div_half"><span class="templet_city">南京</span><span class="templet_time">2016.6.2</span></div>
                 <div class="templet_div_half"><span class="templet_way">新街口--大行宫</span><span class="templet_money">4元</span></div>
             </div>
-->



            </div>
            <div style="height:60px;width:100%;margin-top:0px;"></div>
        </div>
        <!--底部栏-->
        <script type="text/javascript">
            $(function() {
                var nowData = new Date();
                var opt = {
                    theme: 'ios', //设置显示主题
                    mode: 'scroller', //设置日期选择方式，这里用滚动
                    display: 'bottom', //设置控件出现方式及样式
                    preset: 'date', //日期:年 月 日 时 分
                    //                minDate: nowData,
                    maxDate: new Date(nowData.getFullYear(), nowData.getMonth()),
                    dateFormat: 'yy.mm', // 日期格式
                    dateOrder: 'yymm', //面板中日期排列格式
                    stepMinute: 5, //设置分钟步长
                    yearText: '年',
                    monthText: '月',
                    dayText: '日',
                    hourText: '时',
                    minuteText: '分',
                    lang: 'zh' //设置控件语言};
                };
                $('#time').mobiscroll(opt);
            });
        </script>
        <div class="refresh_div"><img id="refresh" src="" class="refresh_img" /></div>
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
</body>

</html>
