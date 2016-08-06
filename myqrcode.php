<!DOCTYPE html>
<?php
	$id = $_GET['id'];
?>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="utf-8">
    <!--引入样式表-->
    <link rel="stylesheet" href="css/myqrcode.css">
    <link rel="stylesheet" href="css/share.css">
    <!--引用JQ Mobile-->
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
		<script src="js/117.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
    <script>
    </script>
    <title>我的二维码</title>
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
 								var balance='余额:'+json.cash+'元';
 								$('#balance_').html(balance);
 					}
 				});
				check();


        });




    </script>
</head>

<body class="body blue">

    <div class="content">

        <div class="header blue">

            <a href="javascript:history.go(-1)">
                <div class="barbtnL"><img class="barbtnimg" src="img/back.png" /></div>
            </a>

            <span class="header_title">我的二维码</span>
            <a href=" ">
                <div class="barbtnR"><img class="barbtnimg" src="img/help.png" /></div>
            </a>
        </div>

        <div data-role="main" class="main">
            <div id="card" class="card">
<!--                <div id="qcode_logo"><img src="img/headimg.png" class="logo" /></div>-->
                <div id="qcode">
                    <img id="qrcode" class="qrcode" src="<?php echo 'qrcode/qrcode1.php?id='.$id ?>" />
                </div>
                <div id="notice">
                    <span class="notice">二维码定时刷新请注意保护</span></div>
                <div id="balance"><span id="balance_" class="balance"></span></div>
            </div>

        </div>
    </div>
</body>

</html>
