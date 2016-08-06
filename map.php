<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="utf-8">
    <!--引入样式表-->
    <link rel="stylesheet" href="css/share.css">
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
    <script>
        window.onload = function load() {
            var type = location.href.charAt(location.href.length - 1);
            switch (type) {
                case '2':
                    document.title = "路线";
                    document.getElementById("map").src = "http://m.amap.com/subway/#city=3201";
                    document.getElementById("title").innerText = "路线";
                    break;
                case '1':
                    document.title = "地图";
                    document.getElementById("map").src = "http://m.amap.com/navigation/index/";
                    document.getElementById("title").innerText = "地图";
                    break;
                case '3':
                    document.title = "附近";
                    document.getElementById("map").src = "http://m.amap.com/nearby/index/";
                    document.getElementById("title").innerText = "附近";
                    break;
                default:
                    document.title = "错误!";
                    document.getElementById("map").src = "";
                    document.getElementById("title").innerText = "请刷新！";
            }
        }
    </script>
</head>

<body class="body gray">
    <div id="content" class="content">
        <div class="header blue shadow_black">
            <a href="javascript:history.go(-1)">
                <div class="barbtnL"><img class="barbtnimg" src="img/back.png" /></div>
            </a>
            <span id="title" class="header_title">路线</span>
        </div>
        <div data-role="main" id="main" class="main">

            <div style="position: absolute;width:100%; height: -webkit-calc(100% - 95px);top:50px;">
                <iframe id="map" style="height:96%;width:100%;border:none;padding:0px;" src="">
            </iframe>
                <div style="color:gray;font-size:11px;font-family:'黑体';width:100%;height:3%;text-align:center;">*高德地图提供本功能</div>
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
</body>

</html>
