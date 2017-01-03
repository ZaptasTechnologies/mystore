<?php
include('../config.php');
if(isset($_POST['id'])){

$id= $_POST['id'];
$sql1 = mysql_query("SELECT * FROM `top` WHERE cid='$id'");
$num = mysql_num_rows($sql1);
if($num==0){
$sql = "INSERT INTO `top`(`id`, `date`, `cid`) VALUES ('',CURRENT_TIMESTAMP,'$id')";
$res = mysql_query($sql);
if(!empty($res)){
    echo "Added Successfully";
}else{
    echo mysql_error();
}
}else{
    echo "One of these category is Already added";
}
}

