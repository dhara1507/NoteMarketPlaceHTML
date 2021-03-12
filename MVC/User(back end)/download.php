<?php
if(isset($_GET['file'])){

    $file=$_GET['file'];
    echo $file;
}
    if(file_exists($file)){
    header("Content-Description:File Transfer");
    header("Content-Type:application/pdf");
    header("Content-Disposition:attachment;filename=".basename($file));
    header("Content-Transfer-Encoding:binary");
    header("Expires:0");
    header("Cache-Control:must-revalidate");
    header("Pragma:public");
        ob_clean();
    flush();
    readfile($file);
        
        exit;
}
else{
    echo "kk";
}
?>