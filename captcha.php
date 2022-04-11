<?php
session_start();
$captcha_num = '0123456789';
$captcha_num = substr(str_shuffle($captcha_num), 0, 6);
$_SESSION["code"] = $captcha_num;
$font_size = 20;
$img_width = 110;
$img_height = 40;
header('Content-type: image/jpeg');
$image = imagecreate($img_width, $img_height);
imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);
$black=imagecolorallocate($image, 0, 0, 0);
for ($i=1;$i<=15;$i++){
    imageline($image,rand(0,110),rand(0,40),rand(0,110),rand(0,40),$black);
}
imagettftext($image, $font_size, 0, 15, 30, $text_color, 'fonts/georgia.ttf', $captcha_num);
imagejpeg($image);
?>