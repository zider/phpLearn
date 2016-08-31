<?php
date_default_timezone_set('PRC');

$string = file_get_contents('message.log');
if(!empty($string)){
    $string = rtrim($string,'&&');
    $arr = explode('&&',$string);
    foreach ($arr as $value) {
        var_dump($value);
        //将用户名和内容分开
        list($username, $content, $time) = explode('$#', $value);

        echo '用户名为<font color="gree">' . $username . '</font>内容为<font color="red">' . $content . '</font>时间为' . date('Y-m-d H:i:s', $time);
        echo '<hr />';
    }
}

echo in_array(_FILES['file']['type'],$allowMIME));
echo is_uploaded_file($_FILES['file']['tmp_name']);
#move_uploaded_file($_FILES['file'][tmp_name'],$path.$name);
?>
<script src=''></script>
<script type='text/javascript'>
function fetch_progress(){
    $.get('progress.php',{'<?php echo ini_get("session.upload_progress.name");?>':'test'},function(data){
        var progress = parseInt(data);
        $('#progress .label').html(progress+'%');
        if(progress < 100){
            setTimeout('fetch_progress()',100);
        }else{
            $('#progress .label').html('completed!');
        }
    },'html');
}

$('#upload-form').submit(function(){
    $('#progress').show();
    setTimeout('fetch_progress()',100);
});
</script>

<h1>基于文件的留言本显示</h1>
<form action="write.php" method="post">
    username:<input type='text' name='username'/><br/>
    contents:<input type='text' name='content'/><br>
    <input type='submit' value='submit'/>
</form>
    
<h1>文件上传</h1>
<form action='file.php' method='post' enctype='multipart/form-data'>
    file:<input type='file' name='files'/><br/>
    <input type='submit' value='submit'/>
</form>

<h1>upload processing</h1>
<form id='upload-form' action='upload.php' method='post' enctype='multipart/form-data' target='hidden_iframe'>
    <input type='hidden' name="<?php echo ini_get('session.upload_progress.name');?>" value='test'/>
    <input type='file' name='file1'/>
    <input type='submit' value='submit'/>
</form>
<div id='progress' class='progress' style='margin-bottom:15px;display:none;'>
    <div class='label'>0%</div>
</div>