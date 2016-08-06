
<?php
   $phone = $_POST["phone"];
   $random=mt_rand(123897,999999);
   $ch = curl_init();
   $url='http://apis.baidu.com/kingtto_media/106sms/106sms?mobile='.$phone.'&content='.'【Spartan】您的验证码是'.$random.'，有效时间5分钟，请不要告诉他人'.'&tag=2';
   $header = array(
       'apikey: f39c0332e60e92bcc13417f6ceb44dea',
   );
   // 添加apikey到header
   curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   // 执行HTTP请求
   curl_setopt($ch , CURLOPT_URL , $url);
   $res = curl_exec($ch);
   curl_close($ch);

   //转发后台保存验证码
   $save = curl_init();
   $java_url = 'http://115.159.181.250:9091/SavePhoneId';
   curl_setopt($save, CURLOPT_URL, $java_url);
   curl_setopt($save, CURLOPT_HEADER, 1);
   curl_setopt($save, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($save, CURLOPT_POST, 1);
   $post_data = array(
        "phone" => $phone,
        "id" => $random
   );
   curl_setopt($save, CURLOPT_POSTFIELDS, $post_data);
   $data = curl_exec($save);
   curl_close($save);

 ?>
