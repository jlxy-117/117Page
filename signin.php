<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="utf-8">
    <!--引入样式表-->
    <link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" href="css/share.css">
    <!--引用JQ Mobile-->
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
    <script src="js/117.js"></script>
    <script>


    </script>
    <title>登录</title>
    <script>
          $(document).ready(function(){
               var va = $(".bg").height() - 41;

               $(".div_head").css("margin-top",va);


        });



        $(function(){ $("#ok").click(function() {
               var p = $("#phone").val();
               var pw = $("#password").val();
                $.ajax({
                    url: "http://115.159.181.250:9091/login",
                    xhrFields:{
         						withCredentials:true
         					},
                    async: true,
                   type: "get",
                   data: {
                        phone: p,
                        password:pw
                   },
                    dataType:"text",
                   error: function() {
                        alert("failed");
                   },
                    success: function(data){
                        // alert(data);
                        var json = jQuery.parseJSON(data);
            						var res = json.flag.toString();
                                    if(res == "false"){
            							alert("手机或密码错误!");
            						}
            						else{
            							window.location="main.php?user_id="+json.user_id.toString();
            						}

                    }
                });

            });
            $(window).resize(function() {
                        var c =window.screen.height * 0.7;
                        if($(window).height()<c){
                            $("#bottom").hide();
}
                        else{
                             $("#bottom").show();
                        }
});

                    });
    </script>

</head>

<body class="body gray">
    <div data-role="main" id="main" class="main">
        <div id="bg" class="bg"><img src="img/signbg_xl.png" style="width:100%"/></div>
        <div class="div_head" id="div_head">
            <div class="head"><img id="headimg" src="img/headimg.png" /></div>
        </div>
        <div class="div_input">
            <!--用户名-->
            <div class="div_user">
                <li class="icon_user"></li>
                <input id="phone" class="input_style" type="text" placeholder="请输入手机号" maxlength="11" />
            </div>
            <!--密码-->
            <div class="div_password">
                <li class="icon_password"></li>
                <input id="password" class="input_style" type="password" placeholder="请输入密码" maxlength="12" />
            </div>
            <!--登录按钮-->
            <div class="div_signin">
                    <input  id="ok" type="button" class="btn_signin blue" value="登 录"/>
            </div>
        </div>
    </div>
    <div id="bottom">
        <a href="" id="bottom_forget">忘记密码</a>
        <a href="signup.php" id="bottom_signup">还没注册?</a>
    </div>
</body>

</html>
