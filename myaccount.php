<!DOCTYPE html>
<?php
	$origin = isset($_SERVER['HTTP_ORIGIN'])? $_SERVER['HTTP_ORIGIN'] : '';
	header( 'Access-Control-Allow-Origin:'.$origin);
	header( 'Access-Control-Allow-Credentials:true' );
?>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="utf-8">
    <!--引入样式表-->
    <link rel="stylesheet" href="css/myaccount.css">
    <link rel="stylesheet" href="css/share.css">
		  <link rel ="stylesheet" href="css/recharge.css">
    <!--引用JQ Mobile-->
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
    <script src="js/117.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
    <title>我的账户</title>
    <script>
          $(document).ready(function(){
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
              var username=json.user_name;
              var balance='余额:'+json.cash+'元';
              $('#username').val(username);
              $('#balance').val(balance);
        }
      });


       check();
        });

//        $(function(){
//           $("#consume").click(function(){
//             $.ajax({
//            url:"record.php?type=c",
//             xhrFields:{
//			withCredentials:true
//		},
//              type:"get",
//              dataType:"text",
//              error:function(){
//                  window.location="signin.php";
//              },success:function(){
//
//              }
//
//
//
//          });
//           });
//
//            $("#recharge").click(function(){
//                   $.ajax({
//            url:"record.php?type=r",
//             xhrFields:{
//			withCredentials:true
//		},
//              type:"get",
//              dataType:"text",
//              error:function(){
//                  window.location="signin.php";
//              },success:function(){
//
//              }
//
//
//
//          });
//
//            });
//
//
//        });


    </script>
</head>

<body class="body gray">
    <div id="content" class="content">
        <div class="header blue shadow_black">
            <a href="javascript:history.go(-1)">
                <div class="barbtnL"><img class="barbtnimg" src="img/back.png" /></div>
            </a>
            <span class="header_title">我的账户</span>
        </div>
        <div data-role="main" id="main" class="main">
            <div style="height:50px;width:100%;margin-top:0px;"></div>
            <div id="bg">
                <img class="bgimg" src="img/myaccount/myaccountbg.jpg" />
            </div>
            <div class="div_head" id="div_head">
                <div class="head">
                    <img id="headimg" src="img/headimg.png" />
                </div>
                <input id="username" type="button" value="" />
            </div>
            <div id="info">
                <input id="balance" type="button" value="" />
                <input id="city" type="button" value="南京" />
            </div>
            <div id="panel">
                <a href="my.php">
                    <div class="panel white b_t b_b">
                        <div class="panel_pic_l">
                            <img src="img/myaccount/edit.png" class="panel_img" />
                        </div>
                        <input type="button" class="panel_name" value="修改资料" />
                        <div class="panel_pic_r">
                            <img src="img/myaccount/go.png" class="panel_img" />
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="panel white b_b">
                        <div class="panel_pic_l">
                            <img src="img/myaccount/password.png" class="panel_img" />
                        </div>
                        <input type="button" class="panel_name" value="修改密码" />
                        <div class="panel_pic_r">
                            <img src="img/myaccount/go.png" class="panel_img" />
                        </div>
                    </div>
                </a>
                   <a href="record.php?type=c">
                    <div class="panel white b_b">
                        <div class="panel_pic_l">
                            <img src="img/myaccount/p_record.png" class="panel_img" />
                        </div>
                        <input type="button" class="panel_name" value="消费记录" />
                        <div class="panel_pic_r">
                            <img src="img/myaccount/go.png" class="panel_img" />
                        </div>
                    </div>
                    </a>
                    <a href="record.php?type=r">
                    <div class="panel white b_b">
                        <div class="panel_pic_l">
                            <img src="img/myaccount/r_record.png" class="panel_img" />
                        </div>
                        <input type="button" class="panel_name" value="充值记录" />
                        <div class="panel_pic_r">
                            <img src="img/myaccount/go.png" class="panel_img" />
                        </div>
                    </div>
                    </a>
                <a href="">
                    <div class="panel white b_b">
                        <div class="panel_pic_l">
                            <img src="img/myaccount/notice.png" class="panel_img" />
                        </div>
                        <input type="button" class="panel_name" value="消息公告" />
                        <div class="panel_pic_r">
                            <img src="img/myaccount/go.png" class="panel_img" />
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="panel white b_b">
                        <div class="panel_pic_l">
                            <img src="img/myaccount/info.png" class="panel_img" />
                        </div>
                        <input type="button" class="panel_name" value="关于" />
                        <div class="panel_pic_r">
                            <img src="img/myaccount/go.png" class="panel_img" />
                        </div>
                    </div>
                </a>
            </div>
            <input id="signout" class="btn_signout red b3 font_white" type="button" value="退出账户" />







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

</body>

</html>
