<?php
#定义时区常量
define('TIME_ZONE','Asia/shanghai');

function demo(){
    echo $_POST['aaa'].'だれ';
}
#echo demo();
echo '<br>'.date('Y年m月d日');
echo '<br>';
$timeofdata = getdate();
echo '<br>'.microtime(true).'<br>';
echo '<br>'.microtime().'<br>';
echo '<br>'.date_default_timezone_get().'<br>';

echo number_format("1000000").'<br>'; echo number_format("1000000",2).'<br>'; echo number_format("1000000",2,",",".");

$shu = array('first'=>'西游记','second'=>'水浒传');
$shuu = array('红楼梦','三国演义');
echo '<br>'.current($shu);
echo '<br>'.key($shu);
$dataa = each($shuu);
list($k, $v) = each($shuu);

echo '<pre>';echo $k.' and '.$v;echo '</pre>';
echo '<pre>';var_dump($dataa);echo '</pre>';

$arr=array(
    '教学部'=>array(
        array('李某','18','人妖'),
        array('高某','20','男'),
        array('张某','21','妖人'),
    ),
    '宣传部'=>array(
        array('李某','18','人妖'),
        array('高某','20','男'),
        array('张某','21','妖人'),
    ),
    '财务部'=>array(
        array('李某','18','人妖'),
        array('高某','20','男'),
        array('张某','21','妖人'),
    ),
);

echo '<br>';
while (list($k, $v)=each($arr)){
    echo '<table border=\'1\'><caption>'.$k.'</caption><br>';
    foreach($v as $value){
        echo '<tr>';
        foreach($value as $item){
            echo '<td>'.$item.'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

echo '<br>';

$zz = '/this\B/';
$string1 = 'whatthisis letter';
$string2 = 'that is better';
$string3 = '##whatareyou##';
if (preg_match($zz,$string1,$matches)){
    echo 'match successed.';
    var_dump($matches);
}else{
    echo 'match failed.';
}

$string='[b]为你写诗[/b]
[i]为你做不可能事[/i]
[u]哎呀，哥不是写情诗[/u]
[color=Red]哥是在说歌词[/color]
[size=7]吴克群[/size]
[qq]1378353651[/qq]';

//匹配UBB字符
$pattern=array(
    '/\[b\](.*)\[\/b\]/i',
    '/\[i\](.*)\[\/i\]/iU',
    '/\[u\](.*?)\[\/u\]/i',
    '/\[color=(.*?)\](.*?)\[\/color\]/',
    '/\[size=(\d)\](.*?)\[\/size\]/',
    '/\[qq\](\d{5,12})\[\/qq\]/',

    );

//需要替换的UBB字符
$replace=array(
    '<b>\\1</b><br />',
    '<i>\\1</i><br />',
    '<u>\\1</u><br />',
    '<font color="\\1">\\2</font><br />',
    '<font size="\\1">\\2</font><br />',
    '<a href="http://wpa.qq.com/msgrd?V=1&Uin=\\1&amp;Site=[Discuz!]&amp;Menu=yes"
 target="_blank"><img src="http://wpa.qq.com/pa?p=1:\\1:1" border="0"></a>',
    );

//使用正则匹配$string，将$string当中的值变为$replace的效果
$ubb=preg_replace($pattern,$replace,$string);

echo $ubb;

#创建临时文件
$handle = tmpfile();
$numbytes = fwrite($handle,'临时 文件内容');
fclose($handle);
echo '向临时文件中写入了'.$numbytes.'字节的文件。'.PHP_EOL;
echo '<br>'.__FILE__;
$dir = 'e:/';
if (is_dir($dir)){
    if($dh=opendir($dir)){
        echo '<br>';
        echo readdir($dh).'<br>';
        echo readdir($dh).'<br>';
        echo readdir($dh).'<br>';
        echo readdir($dh).'<br>';
        echo readdir($dh).'<br>';
        fclose($dh);
    }
}

#图片操作
$img = imagecreate(500,500);
//红
$red = imagecolorallocate($img, 255, 0, 0);
//绿
$green = imagecolorallocate($img, 0, 255, 0);
//蓝
$blue = imagecolorallocate($img, 0, 0, 255);
//棕
$yellow = imagecolorallocate($img, 121, 72, 0);

imagefilledrectangle($img,0,0,500,500,imagecolorallocate($img,0,0,0));
imageline($img,0,0,500,500,$red);
imageline($img,500,0,0,500,$blue);
#bool imagefilledellipse ( resource $图片资源 , int $圆心x , int $圆心y , int $圆的宽 , int $圆的高 , int $圆的颜色 )
#bool imagejpeg ( resource $image [, string $filename])
#imagedestroy($img);
?>