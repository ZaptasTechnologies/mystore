<?php
include('../config.php');
if(isset($_POST['id'])){

$id= $_POST['id'];
$sql = "DELETE FROM `category` WHERE id ='$id'";
$res = mysql_query($sql);
if(!empty($res)){
    echo "Selected Category Delete Successfully";
}else{
    echo mysql_error();
}
}


if(isset($_POST['cid'])){
$id= $_POST['cid'];
$sql = "DELETE FROM `subcate` WHERE id ='$id'";
$res = mysql_query($sql);
if(!empty($res)){
    echo "Selected Sub Category Delete Successfully";
}else{
    echo mysql_error();
}
}

if(isset($_POST['scid'])){
$id= $_POST['scid'];
$sql = "DELETE FROM `subcate2` WHERE id ='$id'";
$res = mysql_query($sql);
if(!empty($res)){
    echo "Selected Sub Category Delete Successfully";
}else{
    echo mysql_error();
}
}

if(isset($_POST['bid'])){
$id= $_POST['bid'];
$sql = "DELETE FROM `brand` WHERE id ='$id'";
$res = mysql_query($sql);
if(!empty($res)){
    echo "Selected Brand Delete Successfully";
}else{
    echo mysql_error();
}
}

if(isset($_POST['pid'])){
$id= $_POST['pid'];
$sql = "DELETE FROM `product` WHERE id ='$id'";
$res = mysql_query($sql);
if(!empty($res)){
    echo "Selected Product Delete Successfully";
}else{
    echo mysql_error();
}
}


if(isset($_POST['rid'])){
$id= $_POST['rid'];
$sql = "DELETE FROM `rside` WHERE id ='$id'";
$res = mysql_query($sql);
if(!empty($res)){
    echo "Selected Product Delete Successfully";
}else{
    echo mysql_error();
}
}

