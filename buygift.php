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
    <link rel="stylesheet" href="css/share.css">
    <link rel="stylesheet" href="css/buygift.css">
    <link rel="stylesheet" href="css/remodal.css">
    <link rel="stylesheet" href="css/remodal-default-theme.css">
    <!--引用JQ Mobile-->
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/117.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
    <script src="js/remodal.js"></script>
    <title>单程票</title>
    <script>
    $(document).ready(function(){check();});
        function rest() {
            document.getElementById('from').value = "";
            document.getElementById('to').value = "";
        }
        $(function(){

            $("#confrim").click(function(){
              var s= $("#from").val();
              var e= $("#to").val();
              $.ajax({
          url:"http://115.159.181.250:9092/getUnUsedOrderInfo",
           xhrFields:{
     withCredentials:true
   },
            async: true,
                 type: "get",
                 dataType:"text",
                 data: {
                      station_start: s,
                      station_end: e,
                      city:'南京'
                 },
            error:function(){
              alert("jump failed");
            },
            success:function(data){
              var json = jQuery.parseJSON(data);
                   var id=json.id;
                   var balance=json.balance;
               window.location="giftqrcode.php?id="+id+"&balance="+balance+"&f="+s+"&t="+e;
            }
        });


            });
            $("#btn_ok").click(function(){
              // alert("yes");
              var s= $("#from").val();
              var e= $("#to").val();
                if(($("#from").val()!="")&&($("#to").val()!="")){
                    document.getElementById("pop").click();
               $.ajax({
           url:"http://115.159.181.250:9092/getPrice",
             async: true,
                  type: "get",
                  data: {
                       station_first: s,
                       station_last: e
                  },
             error:function(){
                //  window.location="signin.php";
                alert("getprice_failed");
             },success:function(data){
               if(data>0)
               {$("#total").html("合计:"+data.toString()+"元");}
               else{
                 alert("站点错误！");
                 window.location="buygift.php";
               }

             }
         });
//
                $("#fromto").html($("#from").val()+"--"+$("#to").val());

                }
                else{
                    alert("站点为空！");
                }



            });
        });
    </script>
    <script>
            $(document).on('opening', '.remodal', function() {
                console.log('opening');
            });

        $(document).on('opened', '.remodal', function() {
            console.log('opened');
        });

        $(document).on('closing', '.remodal', function(e) {
            console.log('closing' + (e.reason ? ', reason: ' + e.reason : ''));
        });

        $(document).on('closed', '.remodal', function(e) {
            console.log('closed' + (e.reason ? ', reason: ' + e.reason : ''));
        });

        $(document).on('confirmation', '.remodal', function() {
            console.log('confirmation');
        });

        $(document).on('cancellation', '.remodal', function() {
            console.log('cancellation');
        });
    </script>
</head>

<body class="body gray">
    <div class="content">
        <div data-role="header" class="header blue shadow_black">

            <a href="main.php">
                <div class="barbtnL"><img class="barbtnimg" src="img/back.png" /></div>
            </a>
            <span class="header_title">单程票</span>

        </div>
        <div data-role="main" class="main">
            <div style="height:50px;width:100%;margin-top:0px;"></div>
            <div class="div_inputs">
                <div class="div_input">
                    <li class="input_title">出发站点</li>
                    <input id="from" class="input_style" type="text" size="12" maxlength="12" placeholder="" />
                </div>
                <div class="div_input">
                    <li class="input_title">到达站点</li>
                    <input id="to" class="input_style" type="text" size="10" maxlength="10" placeholder="" />
                </div>



            </div>


            <div class="btns">

                <input type="button" id="btn_rest" value="重置" onclick="rest()" />
                <a href="#total" id="pop"></a>
                <input type="button" id="btn_ok" value="确定" />
                <a href="orderhistory.php"><input type="button" id="btn_history" value="历史" /></a>

            </div>

        </div>

        <div id="bind" class="remodal" data-remodal-id="total" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">

            <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
            <div>
                <h3 id="modal1Title"><span id="total" style="font-family:'黑体';font-size:22px;color:black;"></span></h3>
                <p><span id="fromto" style="font-family:'黑体';font-size:19px;color:black;"></span></p>


            </div>
            <br>
            <button data-remodal-action="cancel" class="remodal-cancel">取消</button>
            <button id="confrim" data-remodal-action="confirm" class="remodal-confirm">结算</button>
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
