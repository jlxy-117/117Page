<?php
header("Content-type:image/png");
//�������Ŀ��ļ�
include "phpqrcode/phpqrcode.php";
include "function.php";
//������������
$errorLevel = "L";
//��������ͼƬ���Ⱥ͸߶�;Ĭ��Ϊ3
$size = "40";
//������������
$id = $_GET["id"];//*****************************�û���
// ��ȡ�û���Ϣ
$str = "http://115.159.181.250:9092/getUserInfo?user_id=".$id;
$json = do_get_request($str);
$list = json_decode($json, true);
//����ֵ�ж�������Ϣ�ۿ�discount
//��ά���е����ݳ���typeȫ������
//�ж���û��Ǯ
if($list['valid']==true){
	//���ݶ�����*************************************

$arr = array('id'=>base64_encode($list['id']),'balance'=>base64_encode($list['cash']),'discount'=>base64_encode($list['discount']),'type'=>$list['type']);
$content = json_encode($arr);


$qrpic = $id.'.png';
//����QRcode���ľ�̬����png���ɶ�ά��ͼƬ
QRcode::png($content, $qrpic, $errorLevel, $size,2);
//������ַ����
//$url="www.baidu.com";
//$url.="\r\n";
//$url.="http://jingyan.baidu.com/article/acf728fd22fae8f8e510a3d6.html";
//$url.="\r\n";
//$url.="http://jingyan.baidu.com/article/92255446953d53851648f412.html";
//QRcode::png($url, false, $errorLevel, $size);


//����������ͼƬ

$QR = imagecreatefrompng($qrpic);
$logo = imagecreatefrompng("1.png");
imagesavealpha ($logo, true);
$QR_width = imagesx($QR);//��ά��ͼƬ����
$QR_height = imagesy($QR);//��ά��ͼƬ�߶�
$logo_width = imagesx($logo);//logoͼƬ����
$logo_height = imagesy($logo);//logoͼƬ�߶�
$logo_qr_width = $QR_width / 5;
$scale = $logo_width/$logo_qr_width;
$logo_qr_height = $logo_height/$scale;
$from_width = ($QR_width - $logo_qr_width) / 2;
//��������ͼƬ
imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
$logo_qr_height, $logo_width, $logo_height);
imagepng($QR);
}
else{
	$logo = imagecreatefrompng("qr_error.png");
	imagepng($logo);
}


?>
