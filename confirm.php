<?php
#实验验证码
#生成验证码
function verification($width=100,$height=50){
    $img = imagecreate($width,$height);
    for($i=0;$i<$num;$i++){
        $rand = mt_rand(0,2);
        switch ($rand){
            case 0:
                $a = mt_rand(48,57);
                break;
            case 1:
                $a = mt_rand(65,90);
                break;
            case 2:
                $a = mt_rand(97,122);
                break;
        }
        $string .= sprintf('%c',$a);
    }
}
#随机颜色
function randLightColor($img){
    return imagecolorallocate($img,mt_rand(130,255),mt_rand(130,255),mt_rand(130,255));
}

function randDeepColor($img){
    return imagecolorallocate($img,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120));
}

#画干扰像素点
function createCode($img,$num=50,$width=100,$height=50){
    for($i=0;$i<$num;$i++){
        imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),randDeepColor($img));
    }
    
    for ($i = 0; $i < 4; $i++) {
        $x = floor($width / $num) * $i;
        $y = mt_rand(0, $height - 15);

        imagechar($img, 5, $x, $y, $string[$i], randPix($img));

    }
}


?>