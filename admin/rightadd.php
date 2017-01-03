<?php
include('header.php');

$message="";
if(isset($_POST["cate_submit"])) {
	$itemCount = count($_FILES["rimage"]['name']);
		$itemValues=0;
		$query = "INSERT INTO `rside`(`id`, `name`, `image`, `date`, `show_add`) VALUES ";
		$queryValue = "";
		for($i=0;$i<$itemCount;$i++) {
			if(!empty($_FILES["rimage"]['name'][$i])) {
                            $name = $_FILES["rimage"]['name'][$i];
                            $tmp = $_FILES["rimage"]['tmp_name'][$i];
                            $path = "adds/".$name;
				$itemValues++;
				if($queryValue!="") {
					$queryValue .= ",";
				}
				$queryValue .= "('', '$name','$path',CURRENT_TIMESTAMP,'')";
                                move_uploaded_file($tmp, $path);
			}
		}
	$sql = $query.$queryValue;
	if($itemValues!=0) {
           $result = mysql_query($sql);
	if(!empty($result)) $message = "Added Successfully.";
            
	}
	}
        
      

?>
<section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i>Right Sidebar Adds</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_document_alt"></i>Right Sidebar Adds</li>
											</ol>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <div class="col-sm-3 pull-right">
                          <div class="panel-body pull-right">
                              
                              <button title="" onclick="show();" data-placement="top" id="add"  data-toggle="tooltip" class="btn btn-primary tooltips" type="button" data-original-title="New Image"><i class="icon_plus_alt2"></i></button>
                              <button title="" onclick="deleteCate();" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" type="button" data-original-title="Delete Selected"><i class="icon_close_alt2"></i></button>
                              <button title="" onclick="addtoright();" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" type="button" data-original-title="Show Live"><i class="icon_close_alt2"></i></button>
                              
                          </div>
                     
                      </div>
                      
                  </div>
              </div>
              
              
              <div class="row" id="add_new_hide" style="display: none">
                      <div class="col-lg-12">
                     <section class="panel">
                          <header class="panel-heading">
                           Add New Images
                          </header>
                         <?php if($message!=""):?>
                         <header class="panel-heading">
                          <?php echo $message; ?>
                          </header>
                         <?php                          endif;?>
                          <div class="panel-body">
                              <form role="form" action="rightadd.php" method="post" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Choose Files</label>
                            
                                    <input class="form-control" id="exampleInputEmail1" name="rimage[]" type="file" multiple="true">
                                 </div>
    

                          <div class="col-lg-8">
                              <button type="submit" name="cate_submit" class="btn btn-primary">Save</button>
                          </div>
                              </form>
</div>
                          </div>
                      </section>
                      </div>
                      
                  </div>
                         <div class="row">
                  <div class="col-lg-12">
                       <?php echo $message;?>
                      <section class="panel">
                          <header class="panel-heading">Category List</header>
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                   <th><i class="icon_cog"></i> #</th>
                                    <th><i class="icon_id"></i> ID </th>
                                 <th><i class="icon_document_alt"></i> Ad Name</th>
                                 <th><i class="icon_document_alt"></i> Ad Image</th>
                                 <th><i class="icon_document_alt"></i> Live</th>
                                 <th><i class="icon_calendar"></i> Creation Date</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              <div id="load">
                              <?php get_rimage(); ?>
                              </div>         
                           </tbody>
                        </table>
                      </section>
              </div>
              </div>
          </section>
</section>


<script>
  
      
function addMore() {
	$("<div>").load("cate.php", function() 
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
			var rid = $(this).val();	//$(item).remove();
                                alert($(this).val());
                                $.post('del.php',{rid:rid},function(data){
                                    
                                    $(item).remove();
                                });
            }
        });
	});
}
function show(){
    $('#add_new_hide').toggle('slow');
}



function addtoright() {
	$('tr.del').each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
			var rid = $(this).val();	//$(item).remove();
                                //alert($(this).val());
                                $.post('update.php',{rid:rid},function(data){
                                    //alert(data);
                                  $("#load").html(data);
                              });
            }
        });
	});
}
</script>






<?php
include('footer.php');
?>