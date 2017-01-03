<?php
include('../config.php');
if(isset($_POST['id'])){

$id= $_POST['id'];
$sql = "SELECT * FROM `subcate` WHERE cid ='$id'";
$res = mysql_query($sql);
$num=  mysql_num_rows($res);
if($num>0){
    $data ="<label for='exampleInputEmail1'>Choose Your Sub Category Name L1</label>"
        . "<select class='form-control' id='scid' name='l1' onchange='loadl3();' > ";
    while($row = mysql_fetch_array($res)){
        $name = $row['name'];
        $id= $row['id'];
         $data .="<option value='$id'>$name</option>";                        
                                    
   } 
   $data .="</select>";
    echo $data;
}else{
   $data = "";
}
}



if(isset($_POST['sid'])){

$id= $_POST['sid'];
$sql = "SELECT * FROM `subcate2` WHERE scid ='$id'";
$res = mysql_query($sql);
$num=  mysql_num_rows($res);
if($num>0){
    $data ="<label for='exampleInputEmail1'>Choose Your Sub Category Name L2</label>"
        . "<select class='form-control' id='scid2' name='l2' > ";
    while($row = mysql_fetch_array($res)){
        $name = $row['name'];
        $id= $row['id'];
         $data .="<option value='$id'>$name</option>";                        
                                    
   } 
   $data .="</select>";
    echo $data;
}else{
   $data = "";
}
}

