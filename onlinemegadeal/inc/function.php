<?php
include('config.php');
function get_cate(){
    $sql="SELECT * FROM `category`";
	$run = mysql_query($sql);
	$num = mysql_num_rows($run);
	for($i=1; $i<=$num; $i++){
		
	$row = mysql_fetch_array($run);
		$name = $row['name'];
		$id = $row['id'];
                $date = substr($row['date'],0,10);
                
			echo "<tr class='del'>
                                  <td><input type='checkbox' class='checkbox' value='$id' name='cate[]'></td>
                                  <td>$i</td>
                                 <td>$name</td>
                                 <td>$date</td>
                                 <td>
                                  <div class='btn-group'>
                                    <a  href='?id=".$id."' data-toggle='modal' class='btn  btn-success'><i class='icon_pencil-edit'></i></a>
                                  </div>
                                  </td>
                              </tr>
		";
	}
	

}



function get_brand(){
    $sql="SELECT * FROM `brand`";
	$run = mysql_query($sql);
	$num = mysql_num_rows($run);
	for($i=1; $i<=$num; $i++){
		
	$row = mysql_fetch_array($run);
		$name = $row['name'];
		$id = $row['id'];
                $date = substr($row['date'],0,10);
                
			echo "<tr class='del'>
                                  <td><input type='checkbox' class='checkbox' value='$id' name='cate[]'></td>
                                  <td>$i</td>
                                 <td>$name</td>
                                 <td>$date</td>
                                 <td>
                                  <div class='btn-group'>
                                    <a  href='?id=".$id."' data-toggle='modal' class='btn  btn-success'><i class='icon_pencil-edit'></i></a>
                                  </div>
                                  </td>
                              </tr>
		";
	}
	

}

function get_subcate(){
    $sql="SELECT category.name as cname, subcate.name as sname, subcate.id, subcate.date FROM `subcate` JOIN category ON subcate.cid = category.id ";
	$run = mysql_query($sql);
	$num = mysql_num_rows($run);
	for($i=1; $i<=$num; $i++){
		
	$row = mysql_fetch_array($run);
		$cname = $row['cname'];
                $sname = $row['sname'];
		$id = $row['id'];
                $date = substr($row['date'],0,10);
                
			echo "<tr class='del'>
                                  <td><input type='checkbox' class='checkbox' value='$id' name='cate[]'></td>
                                  <td>$i</td>
                                 <td>$cname</td>
                                 <td>$sname</td>
                                 <td>$date</td>
                                 <td>
                                  <div class='btn-group'>
                                    <a  href='?id=".$id."' data-toggle='modal' class='btn  btn-success'><i class='icon_pencil-edit'></i></a>
                                  </div>
                                  </td>
                              </tr>
		";
	}
	

}


function get_drop(){
    $sql="SELECT * FROM `category`";
	$run = mysql_query($sql);
	$num = mysql_num_rows($run);
	for($i=1; $i<=$num; $i++){
		
	$row = mysql_fetch_array($run);
		$name = $row['name'];
		$id = $row['id'];
                
			echo "<option value='$id' > $name </option>";
	}
	

}


function get_drop_brand(){
    $sql="SELECT * FROM `brand`";
	$run = mysql_query($sql);
	$num = mysql_num_rows($run);
	for($i=1; $i<=$num; $i++){
		
	$row = mysql_fetch_array($run);
		$name = $row['name'];
		$id = $row['id'];
                
			echo "<option value='$id' > $name </option>";
	}
	

}


function get_drop2(){
    $sql="SELECT * FROM `subcate`";
	$run = mysql_query($sql);
	$num = mysql_num_rows($run);
	for($i=1; $i<=$num; $i++){
		
	$row = mysql_fetch_array($run);
		$name = $row['name'];
		$id = $row['id'];
                
			echo "<option value='$id' > $name </option>";
	}
	

}



function get_subcate2(){
    $sql="SELECT category.name as cname, subcate.name as sname, subcate2.name, subcate2.id, subcate2.date FROM `subcate` JOIN category ON subcate.cid = category.id JOIN subcate2 ON subcate2.scid= subcate.id  ";
	$run = mysql_query($sql);
	$num = mysql_num_rows($run);
	for($i=1; $i<=$num; $i++){
		
	$row = mysql_fetch_array($run);
        $name = $row['name'];
		$cname = $row['cname'];
                $sname = $row['sname'];
		$id = $row['id'];
                $date = substr($row['date'],0,10);
                
			echo "<tr class='del'>
                                  <td><input type='checkbox' class='checkbox' value='$id' name='cate[]'></td>
                                  <td>$i</td>
                                 <td>$cname</td>
                                 <td>$sname</td>
                                     <td>$name</td>
                                 <td>$date</td>
                                 <td>
                                  <div class='btn-group'>
                                    <a  href='?id=".$id."' data-toggle='modal' class='btn  btn-success'><i class='icon_pencil-edit'></i></a>
                                  </div>
                                  </td>
                              </tr>
		";
	}
	

}


function get_product(){
    $sql="SELECT category.name as cname, product.id, product.date, product.name as pname, product.price, product.img FROM `product` JOIN category ON product.cid = category.id";
	$run = mysql_query($sql);
	$num = mysql_num_rows($run);
	for($i=1; $i<=$num; $i++){
		
	$row = mysql_fetch_array($run);
                $pname = $row['pname'];
		$cname = $row['cname'];
                $price = $row['price'];
                 $img = $row['img'];
		$id = $row['id'];
                $date = substr($row['date'],0,10);
                
			echo "<tr class='del'>
                                  <td><input type='checkbox' class='checkbox' value='$id' name='cate[]'></td>
                                  <td>$i</td>
                                 <td>$cname</td>
                                 <td>$pname</td>
                                 <td>$date</td>
                                     <td>$price</td>
                                           <td><img src='$img' width='50' height='50'></td>
                                 <td>
                                  <div class='btn-group'>
                                    <a  href='?id=".$id."' data-toggle='modal' class='btn  btn-success'><i class='icon_pencil-edit'></i></a>
                                  </div>
                                  </td>
                              </tr>
		";
	}
	

}

function get_rimage(){
    $sql="SELECT * FROM rside";
	$run = mysql_query($sql);
	$num = mysql_num_rows($run);
	for($i=1; $i<=$num; $i++){
		
	$row = mysql_fetch_array($run);
                $name = $row['name'];
		$image = $row['image'];
               $show = $row['show_add'];
               if($show==0){
                   $show="No";
               }else{
                   $show = "Yes";
               }
		$id = $row['id'];
                $date = substr($row['date'],0,10);
                
			echo "<tr class='del'>
                                  <td><input type='checkbox' class='checkbox' value='$id' name='cate[]'></td>
                                  <td>$i</td>
                                 <td>$name</td>
                                 <td><img src='$image' width='50' height='50' alt='$name'></td>
                                 <td>$show</td>
                                    <td>$date</td>  
                                 <td>
                                  <div class='btn-group'>
                                    <a  href='?id=".$id."' data-toggle='modal' class='btn  btn-success'><i class='icon_pencil-edit'></i></a>
                                  </div>
                                  </td>
                              </tr>
		";
	}
	

}





