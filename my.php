<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="utf-8">
    <!--引入样式表-->
    <link rel="stylesheet" href="css/my.css">
    <link rel="stylesheet" href="css/share.css">
    <!--引用JQ Mobile-->
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
    <script src="js/117.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
    <script>
    $(document).ready(function(){
     check();
      $.ajax({
          url: "http://115.159.181.250:9091/user",
          xhrFields:{
            withCredentials:true
          },
          async: true,
          type: "get",
          dataType:"text",
          error: function() {
          },
          success: function(data){
              var json = jQuery.parseJSON(data);
                   var username =json.user_name;
                   var phone =json.phone_number;
                   $("#username").val(username);
                   $("#phone").val(phone);
                   $("#city").val('南京');
          }
        });




    });
    </script>
    <title>我的资料</title>
</head>

<body class="body gray">
    <div id="content" class="content">
        <div class="header blue shadow_black">
            <a href="javascript:history.go(-1)">
                <div class="barbtnL"><img class="barbtnimg" src="img/back.png" /></div>
            </a>
            <span class="header_title">我的资料</span>
        </div>
        <div data-role="main" id="main" class="main">
            <div style="height:50px;width:100%;margin-top:0px;"></div>

            <a href="" style="text-decoration:none;">
                <div id="panel_head"><input type="button" id="title" value="头像" />
                    <div class="head"><img src="img/headimg.png" class="headimg"/></div>
                </div>
            </a>
            <a href="" style="text-decoration:none;">
                <div id="panel"><input type="button" id="title" value="昵称" />
                <input type="button" class="detail" id="username" value="" />
                </div>
            </a>
            <a href="" style="text-decoration:none;">
                <div id="panel"><input type="button" id="title" value="手机号" /> <input type="button" class="detail" id="phone" value="" /></div>
            </a>
            <a href="" style="text-decoration:none;">
                <div id="panel"><input type="button" id="title" value="地区" /> <input type="button" class="detail" id="city" value="" /></div>
            </a>
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
