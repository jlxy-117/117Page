<!DOCTYPE html>
<?php
	header( 'Access-Control-Allow-Origin:null');
	header( 'Access-Control-Allow-Credentials:true' );
?>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="utf-8">
    <!--引入样式表-->
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/share.css">
    <!--引用JQ Mobile-->
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
      <script src="js/117.js"></script>
    <script>
		$(function(){$(window).resize(function() {
                        var c =window.screen.height * 0.7;
                        if($(window).height()<c){
                            $("#bottom").hide();
}
                        else{
                             $("#bottom").show();
                        }
});});
    </script>
    <title>注册</title>

</head>

<body class="body gray">
    <div data-role="main" id="main" class="main">

        <div id="bg" class="bg"></div>

        <div class="div_head" id="div_head">
            <div id="headimg" class="head">
                <img src="img/logo/logo3.png" class="head_img" />
            </div>
        </div>
        <form name="signup" method="post" action="signup.php">
            <div class="div_inputs">

                <div id="div_1" class="div_input">
                    <li id="icon_name" class="icon_style"></li>
                    <input id="name" class="input_style" type="text" placeholder="用户名" maxlength="6" />
                </div>

                <div id="div_2" class="div_input">
                    <li id="icon_phone" class="icon_style"></li>
                    <input id="phone" class="input_style" type="text" placeholder="手机号" maxlength="11" />
                </div>


                <div id="div_2" class="div_input">
                    <li id="icon_password" class="icon_style"></li>
                    <input id="password" class="input_style" type="password" placeholder="密码" maxlength="12" />
                </div>

                <div id="div_2" class="div_input">
                    <li id="icon_check" class="icon_style"></li>
                    <input id="check" class="input_style" type="password" placeholder="确认密码" maxlength="12" />
                </div>

                <div id="div_2" class="div_input">
                    <li id="icon_code" class="icon_style"></li>
                    <li class="btn_code"><input id="send" type="button" value="获取验证码" class="send" /></li>
                    <input id="code" class="input_style" type="text" placeholder="短信验证码" maxlength="6" />

                </div>
                    <input id="ok" type="button" class="btn_ok blue font_white" value="确 认" />
            </div>
    </div>


    <script>
    var InterValObj;
var count = 30;
var curCount;
        $(function() {
            $("#send").click(function() {
              var phonenum =$('#phone').val();
              if(checkPhone(phonenum)){
              //验证码定时
              curCount = count;
$("#send").attr("disabled", "true");
$("#send").val( + curCount + "秒再获取");
InterValObj = window.setInterval(SetRemainTime, 1000);
//提交手机号发送验证码
$.ajax({
    url:"verify.php",type:"POST",
        data:{phone:phonenum},

   error: function(){
      alert("send failed");
   },
   success: function(){
   }
 });}
 else {
   alert("手机号错误请重新输入");
 }
            });
            function SetRemainTime() {
	if (curCount == 0) {
		window.clearInterval(InterValObj);//停止计时器
		$("#send").removeAttr("disabled");//启用按钮
		$("#send").val(" 重新获取");
	}
	else {
		curCount--;
		$("#send").val( + curCount + "秒再获取");
	}
}
        });

        $(function () {
                $("#ok").click(function () {
                   var code = $('#code').val();
                   var password = $('#password').val();
                   var name = $('#name').val();
                   var phone = $('#phone').val();
                   var password_r=$('#check').val();
           //手机验证步骤

           if((code!="")&&(password!="")&&(phone!="")&&(name!="")){
             if(password==password_r){
               $.ajax({
               url:"http://115.159.181.250:9091/CheckPhoneId",
               type:"get",
               async: true,
               dataType:"text",
               data:{
                 phone:phone,
                 id:code
               },
               error: function(){
                 alert("submit failed");
               },
               success: function(data){
                var res =Boolean(data);
                if(res==1){
                   //数据post步骤
                  $.ajax({
                      url:"http://115.159.181.250:9092/register",
                      type:"post",
                  async: true,
                      dataType:"text",
            xhrFields:{
            withCredentials:true
          },
                      data:{
                        phone:phone,
                        password:password,
                        name:name
                      },
                      error: function(){
                        alert("post err failed");
                      },
                      success: function(data){
                         var res = data.toString();
             if(res=="Existed")
						 alert("post func fail");

             else
               window.location = "main.php?user_id="+res;
            }
                    });
                }
                else{
                alert("验证失败！");
                window.location = "signup.php"
                }
               }
             });
             }

              else{
                alert("两次密码输入不一样");
              }

}else {
	alert("信息不能为空！");
}


							});
            });
    </script>


    <div id="bottom">
        <a href="signin.php" id="bottom_signup">已经注册?</a>
    </div>

</body>

</html>
