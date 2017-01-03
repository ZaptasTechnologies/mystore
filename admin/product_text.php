<div class="form-group">
                            
    <div class="col-sm-3">
        <label for="exampleInputEmail1">Enter Product Name</label>
        <input class="form-control" id="exampleInputEmail1" name="cate_name[]" placeholder="Enter Your Product Name" type="text"></div>
    <div class="col-sm-3">
         <label for="exampleInputEmail1">Enter Price</label>
         <input class="form-control" id="exampleInputEmail1" name="price" placeholder="Enter Your Price" type="text" onchange="fixit(this);"></div>
    <div class="col-sm-3">
        <label for="exampleInputEmail1">Choose Brand Name</label>
       <select class="form-control" id="exampleInputEmail1" name="brand" > 
                                     <?php get_drop_brand();
                                                                             
                                     ?>
                                      </select>
    </div>
    
    <br>
        <input class="checkbox" type="checkbox"  name="del[]"> 
    <div style="height: 5px; width: 100%;" ></div>
</div>
