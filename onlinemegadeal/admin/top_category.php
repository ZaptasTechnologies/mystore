<?php
include('header.php');

$message="";
if(isset($_POST["cate_submit"])) {
	$itemCount = count($_POST["cate_name"]);
		$itemValues=0;
		$query = "INSERT INTO `category`(`id`, `name`, `date`) VALUES ";
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
		
		$sql = "UPDATE `category` SET `name`='$uname' WHERE id='$sid'";
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
					<h3 class="page-header"><i class="fa fa-file-text-o"></i>Top Categories</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_document_alt"></i>Top Categories</li>
											</ol>
				</div>
			</div>
              <div class="row">
                  <div class="alert alert-success fade in" id="mess" style="display: none;">
                              </div>
                  <div class="col-lg-12">
                      <div class="col-sm-3 pull-right">
                          <div class="panel-body pull-right">
                              
                              <button title="" onclick="addtop();" data-placement="top" id="add"  data-toggle="tooltip" class="btn btn-primary tooltips" type="button" data-original-title="Add Top Category"><i class="icon_plus_alt2"></i></button>
                              <button title="" onclick="deleteCate();" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" type="button" data-original-title="Delete Selected"><i class="icon_close_alt2"></i></button>
                              
                          </div>
                     
                      </div>
                      
                  </div>
              </div>     
              
            
                         <div class="row">
                  <div class="col-lg-12">
                      
                      <section class="panel">
                          <header class="panel-heading">Category List</header>
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                   <th><i class="icon_cog"></i> #</th>
                                    <th><i class="icon_id"></i> ID </th>
                                 <th><i class="icon_document_alt"></i> Category Name</th>
                                 <th><i class="icon_calendar"></i> Creation Date</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              <?php get_cate(); ?>
                                         
                           </tbody>
                        </table>
                      </section>
              </div>
              </div>
          </section>
</section>


<script>
  
      

function deleteCate() {
	$('tr.del').each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
			var id = $(this).val();	//$(item).remove();
                                //alert($(this).val());
                                $.post('del.php',{id:id},function(data){
                                    
                                    $(item).remove();
                                });
            }
        });
	});
}

function addtop() {
	$('tr.del').each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
			var id = $(this).val();	//$(item).remove();
                                //alert($(this).val());
                                $.post('add.php',{id:id},function(data){
                                     $("#mess").show();
                                    $("#mess").html(data);
                                   //$(item).remove();
                                });
            }
        });
	});
}

</script>






<?php
include('footer.php');
?>