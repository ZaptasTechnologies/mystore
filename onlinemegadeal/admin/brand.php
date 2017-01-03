<?php
include('header.php');

$message="";
if(isset($_POST["cate_submit"])) {
	$itemCount = count($_POST["cate_name"]);
		$itemValues=0;
		$query = "INSERT INTO `brand`(`id`, `name`, `date`) VALUES ";
		$queryValue = "";
		for($i=0;$i<$itemCount;$i++) {
			if(!empty($_POST["cate_name"][$i])) {
				$itemValues++;
				if($queryValue!="") {
					$queryValue .= ",";
				}
				$queryValue .= "('', '" . $_POST["cate_name"][$i] ."',CURRENT_TIMESTAMP)";
			}
		}
		$sql = $query.$queryValue;
		if($itemValues!=0) {
			$result = mysql_query($sql);
			if(!empty($result)) $message = "Added Successfully.";
		}
	}
        
        if(isset($_POST["upd_submit"])) {
	$uname =$_POST["cate_name"];
        $sid = $_POST["id"];
		
		$sql = "UPDATE `brand` SET `name`='$uname' WHERE id='$sid'";
                $itemValues = mysql_query($sql);
		if($itemValues) {
		echo "<script> alert('Updated Successfully'); </script>";
		}
	}
        
        

			


?>
<section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i>Brands</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_document_alt"></i>Brands</li>
											</ol>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <div class="col-sm-3 pull-right">
                          <div class="panel-body pull-right">
                              
                              <button title="" onclick="show();" data-placement="top" id="add"  data-toggle="tooltip" class="btn btn-primary tooltips" type="button" data-original-title="New Brand"><i class="icon_plus_alt2"></i></button>
                              <button title="" onclick="deleteCate();" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" type="button" data-original-title="Delete Selected"><i class="icon_close_alt2"></i></button>
                              
                          </div>
                     
                      </div>
                      
                  </div>
              </div>
              <?php 
              if(isset($_GET['id'])){
    $updname="";
    $id = $_GET['id'];
$sql="SELECT * FROM `brand` WHERE id='$id'";
	$run = mysql_query($sql);
	while($row = mysql_fetch_array($run)){
          $updname = $row['name'];$uid =$row['id']?>
               
               <div class="row" id="upd_new_hide" style="//display: none">
                      <div class="col-lg-12">
                     <section class="panel">
                          <header class="panel-heading">
                           Update Category
                          </header>
                   
                          <div class="panel-body">
                              <form role="form" action="brand.php" method="post">
                                      <div class="form-group">                             
                                    <label for="exampleInputEmail1">Enter Your brand Name</label>
                                    <input class="form-control" id="exampleInputEmail1" name="cate_name" value="<?php echo $updname; ?>" placeholder="Enter Your Brand Name" type="text">
                                    <input class="form-control" id="exampleInputEmail1" name="id" value="<?php echo $uid; ?>"  type="hidden">
                                     
                                      </div>
                          <div class="col-lg-8">
                              <button type="submit" name="upd_submit" class="btn btn-primary">Update</button>
                          </div>
                              </form>

                          </div>
                      </section>
                      </div>
                      
                  </div>
          <?php
        }
        
}
        ?>       
              
              <div class="row" id="add_new_hide" style="display: none">
                      <div class="col-lg-12">
                     <section class="panel">
                          <header class="panel-heading">
                           Add New Brand
                          </header>
                         <?php if($message!=""):?>
                         <header class="panel-heading">
                          <?php echo $message; ?>
                          </header>
                         <?php                          endif;?>
                          <div class="panel-body">
                              <form role="form" action="brand.php" method="post">
                                  <div class="col-lg-6 pull-right">
                                       <button title="" onClick="addMore();"  data-placement="top" id="add_new"  data-toggle="tooltip" class="btn btn-primary tooltips" type="button" data-original-title="Add More"><i class="icon_plus_alt2"></i> Add More</button>
                                       <button title="" data-placement="top" id="add_new_csv"  data-toggle="tooltip" class="btn btn-primary tooltips" type="button" data-original-title="Import From CSV"><i class="icon_plus_alt2"></i> Import From CSV</button>
                                        <button title="" onClick="deleteRow();"  data-placement="top" id="add_new"  data-toggle="tooltip" class="btn btn-primary tooltips" type="button" data-original-title="Delete Checked"><i class="icon_close_alt2"></i> Delete Checked</button>
                                       
                                  </div><br>
                                  <div class="clear-all"></div>
                                    <label for="exampleInputEmail1">Enter Your Brand Name</label>
                                  <div id="product">
                                    <?php require_once("brand_txt.php");?>
                                    </div>
                          <div class="col-lg-8">
                              <button type="submit" name="cate_submit" class="btn btn-primary">Save</button>
                          </div>
                              </form>

                          </div>
                      </section>
                      </div>
                      
                  </div>
                         <div class="row">
                  <div class="col-lg-12">
                      
                      <section class="panel">
                          <header class="panel-heading">Brand List</header>
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                   <th><i class="icon_cog"></i> #</th>
                                    <th><i class="icon_id"></i> ID </th>
                                 <th><i class="icon_document_alt"></i> Brand Name</th>
                                 <th><i class="icon_calendar"></i> Creation Date</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              <?php get_brand(); ?>
                                         
                           </tbody>
                        </table>
                      </section>
              </div>
              </div>
          </section>
</section>


<script>
  
      
function addMore() {
	$("<div>").load("brand_txt.php", function() 
	{
			$("#product").append($(this).html());
			
	});	
}
function deleteRow() {
	$('div.form-group').each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
				$(item).remove();
            }
        });
	});
}

	


function deleteCate() {
	$('tr.del').each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
			var id = $(this).val();	//$(item).remove();
                                //alert($(this).val());
                                $.post('del.php',{bid:id},function(data){
                                    
                                    $(item).remove();
                                });
            }
        });
	});
}
function show(){
    $('#add_new_hide').toggle('slow');
}
</script>






<?php
include('footer.php');
?>