<?php

include('../config.php');
if(isset($_POST['rid'])){

$id1= $_POST['rid'];
$sql1 = "UPDATE `rside` SET `show_add`='1' WHERE id ='$id1'";
$res1 = mysql_query($sql1);
if(!empty($res1)){
    echo "Updated Successfully";
}else{
    echo mysql_error();
}

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

