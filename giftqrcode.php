﻿<!DOCTYPE html>
<?php
	$balance = base64_encode($_GET['balance']);
	$b=$_GET['balance'];
	//订单号
	$ticket_id = base64_encode($_GET['id']);
	//echo $balance;
	//echo $ticket_id;
	$f=($_GET['f']);
	$t=($_GET['t']);
?>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="utf-8">

    <link rel ="stylesheet" href="css/giftqrcode.css">
    <link rel ="stylesheet" href="css/share.css">
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
    <script>
    </script>
    <title>单程票</title>
</head>
    <body class="body blue">

    <div class="content">

        <div class="header blue">

            <a href="javascript:history.go(-1)"><div class="barbtnL"><img class="barbtnimg" src="img/back.png"/></div></a>

            <span class="header_title">单程票</span>

             <a href=" "><div class="barbtnR"><img class="barbtnimg" src="img/help.png"/></div></a>
        </div>

        <div data-role="main" class="main">
            <div id="card" class="card">
                <div id ="qcode">
                    <img id="qrcode" class="qrcode" src="<?php echo 'qrcode/qrcode2.php?bal='.$balance.'&id='.$ticket_id ?>"/>
                </div>
                <div id="refresh">
                <span id="way"><?php echo $_GET['f'].'--'.$_GET['t'];?></span></div>
                <div id="info"><span id="fare"><?php echo $b;?>元</span></div>
            </div>
        </div>
           <div class="div_share_title">
            <span class="share_title">分享</span></div>
        <div class="share">
            <div class="share_btn_lr"><div id="qq" class="btn_l"><img class="btn_img" src="img/qq.png"/></div></div>

             <div class="share_btn_c"><div id="qq" class="btn"><img class="btn_img" src="img/wechat.png"/></div></div>
        <div class="share_btn_lr"><div id="qq" class="btn_r"><img class="btn_img" src="img/more.png"/></div></div>
       </div>
        </div>
    </body>
</html>
