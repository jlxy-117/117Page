<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="utf-8">
    <link rel ="stylesheet" href="css/recharge.css">
    <link rel ="stylesheet" href="css/share.css">
    <link rel="stylesheet" href="css/remodal.css">
    <link rel="stylesheet" href="css/remodal-default-theme.css">
    <link href="css/square/red.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/117.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
      <script src="js/remodal.js"></script>
      <script src="js/icheck.js"></script>
    <script>
         function IsNum(e) {
            var k = window.event ? e.keyCode : e.which;
            if (((k >= 48) && (k <= 57))||(k == 8)||(k == 0)) {
            } else {
                if (window.event) {
                    window.event.returnValue = false;
                }
                else {
                    e.preventDefault();
                }
            }
        }














        $(document).ready(function(){
        // check();
          $('input').iCheck({
    checkboxClass: 'icheckbox_square-red',
    radioClass: 'iradio_square-red',
    increaseArea: '20%' // optional
  });

        });



        $(function(){  $("#ok").click(function(){
   var money =$("#money_input").val();
   $.ajax({
   url:"http://115.159.181.250:9092/recharge",
   xhrFields:{
   withCredentials:true
   },
   type:"post",
   data: {"cash":money,"method":'支付宝'},
   dataType:"text",
   error:function(){
       // window.location="signin.php";
   },success:function(){
 $("#message").html('已充值'+money+'元');
  document.getElementById('alert').click();
   }
   });
   });});





    </script>
    <script>
      $(document).on('opening', '.remodal', function () {
    console.log('opening');
  });

  $(document).on('opened', '.remodal', function () {
    console.log('opened');
  });

  $(document).on('closing', '.remodal', function (e) {
    console.log('closing' + (e.reason ? ', reason: ' + e.reason : ''));
  });

  $(document).on('closed', '.remodal', function (e) {
    console.log('closed' + (e.reason ? ', reason: ' + e.reason : ''));
  });

  $(document).on('confirmation', '.remodal', function () {
    console.log('confirmation');
  });

  $(document).on('cancellation', '.remodal', function () {
    console.log('cancellation');
  });
  </script>

  <title>充值</title>
</head>
<body class="body gray">
   <div id="content" class="content">
   <div class="header red">
            <!--  <span style="color:rgb(255,255,255);">test page</span> -->
<!--返回-->
            <a href="main.php"><div class="barbtnL"><img class="barbtnimg" src="img/back.png"/></div></a>
            <span class="header_title">充值</span>
        </div>
        <div data-role="main" id="main" class="main">
<!--        <div id="bg"></div>-->
            <div style="height:50px;width:100%;margin-top:0px;"></div>
            <a href="#bind" style="text-decoration:none;">
           <div id="pay" class="panel_pay">
            <div class="head"><img src="img/unionpay.png" class="headimg"></div>
            <input type="button" class="bankcard_name" value="中国工商银行"/>
            <input type="button" class="bankcard_num" value="尾号：6789"/>
               <span class="radio_"><input type="radio" name="iCheck" ></span>
            </div>
            </a>
            <div id="pay" class="panel_pay">
            <div class="head"><img src="img/alipay.png" class="headimg"></div>
            <input type="button" class="bankcard_name" value="支付宝"/>
            <input type="button" class="bankcard_num" value="账号：136****1817"/>
            <span class="radio_"><input type="radio" name="iCheck" style="top:10px;" ></span>

            </div>
            <div div id="pay" class="panel_pay">
            <div class="head"><img src="img/wechat.png" class="headimg"></div>
            <input type="button" class="bankcard_name" value="微信支付"/>
            <input type="button" class="bankcard_num" value="账号：136****1817"/>
                <span class="radio_"><input type="radio" name="iCheck" ></span>
            </div>

   <div id="bind" class="remodal" data-remodal-id="bind" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">

  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
    <h3 id="modal1Title">绑定账户</h3>
    <p id="modal1Desc">
    <select id="choose" class="select">
<option value="bank" class="option">&nbsp银行卡</option>
<option value="alipay" class="option">&nbsp支付宝</option>
  <option value="weipay" class="option">微信支付</option>
   </select>
    </p>
    <input id="account" type="text" class="bind_input b3" placeholder="请输入账号" maxlength="19"/>
    <p></p>
    <input id="phone" type="text" class="bind_input b3" placeholder="请输入手机号" maxlength="11"/>
    <p></p>
<!--    <input id="code" type="text" class="bind_input" placeholder="请输入短信验证码" maxlength="6"/>-->
    <p></p>
    <div class="div_code">
            <li id="btn_code" class="btn_code">获取验证码</li>
            <input id="code" class="bind_input" type="text" placeholder="短信验证码" maxlength="6"/>

        </div>
  </div>
  <br>
  <button data-remodal-action="cancel" class="remodal-cancel">取消</button>
  <button data-remodal-action="confirm" class="remodal-confirm">确定</button>
</div>

<a id="alert" href="#message"></a>
<div  class="remodal" data-remodal-id="message" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
<div>
 <h3 id="message"></h3>
</div>
<button data-remodal-action="confirm" class="remodal-cancel">确定</button>
</div>





<input type="text" id="money_input" class="money_text b3" placeholder=" 输入充值金额（元）" onkeypress="return IsNum(event)" maxlength="5"/>
             <input class="submit red font_white b3" id="ok" type="button" value="确认"/>



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
