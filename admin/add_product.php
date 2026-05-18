<?php
    require('top.inc.php');
    $categories_id='';
    $name='';
    $mrp='';
    $price='';
    $qty='';
    
    $short_desc='';
    $long_desc='';
    $meta_title='';
    $meta_desc='';
    $meta_keyword='';
    $msg='';
   
      // fetching cuurent value from database
      if(isset($_GET['id']) && $_GET['id'] !=''){
        $id=get_safe_value($con, $_GET['id']);
        $res=mysqli_query($con,"select * from product where id ='$id'");
        $check=mysqli_num_rows($res);
        if($check>0){
            $row=mysqli_fetch_assoc($res);
            $categories_id=$row['categories_id'];
            $name=$row['name'];
            $mrp=$row['mrp'];
            $price=$row['price'];
            $qty=$row['qty'];
            $long_desc=$row['long_desc'];
            $meta_title=$row['meta_title'];
            $meta_desc=$row['meta_desc'];
            $meta_keyword=$row['meta_keyword'];
           
        }else{
            header('location: product.php');
        die();
        }
       
    }
    if(isset($_POST['submit'])){
        $categories_id=get_safe_value($con,$_POST['categories_id']);
        $name=get_safe_value($con,$_POST['name']);
        $mrp=get_safe_value($con,$_POST['mrp']);
        $price=get_safe_value($con,$_POST['price']);
        $qty=get_safe_value($con,$_POST['qty']);
       
        $short_desc=get_safe_value($con,$_POST['short_desc']);
        $long_desc=get_safe_value($con,$_POST['long_desc']);
        $meta_title=get_safe_value($con,$_POST['meta_title']);
        $meta_desc=get_safe_value($con,$_POST['meta_desc']);
        $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
     

         //to check categories allready exit or not
         $res=mysqli_query($con,"select * from product where name ='$name'");
         $check=mysqli_num_rows($res);
          if($check>0){
            if(isset($_GET['id']) && $_GET['id'] !=''){
                $getData=mysqli_fetch_assoc($res);
                if($id==$getData['id']){
                    
                }else{
                    $msg="product already exits";  
                }
                  
                }else{
                    $msg="product already exits";
               }
        }
        if ($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
            $msg="Please select only png,jpg and jpeg image formate";
        }
            if($msg==''){
                if(isset($_GET['id']) && $_GET['id'] !=''){
                   if($_FILES['image']['name']!=''){
                     $image=rand(1111111111,9999999999) . '_' .$_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
                    $update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',long_desc='$long_desc',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image' where id='$id'";
                   }else{
                    $update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',long_desc='$long_desc',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id'";
                   }


                    mysqli_query ($con,$update_sql);
                }else{
                    $image=rand(1111111111,9999999999) . '_' .$_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
                    mysqli_query ($con,"insert into product (categories_id,name,mrp,price,qty,short_desc,long_desc,meta_title,meta_desc,meta_keyword,image,status) values ('$categories_id','$name','$mrp','$price','$qty','$short_desc','$long_desc','$meta_title','$meta_desc','$meta_keyword','$image','1')");
                }
               
                header('location:product.php');
                die();
            }   
      
    }
      
?>
 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                           <form method="post" enctype="multipart/form-data">
                             <div class="card-body card-block">
                               <div class="form-group">
                                  <label for="company" class=" form-control-label">select Categories</label>
                                  <select class=" form-control" name="categories_id">
                                  <option>select categories</option>
                                <?php
                                $res=mysqli_query($con,"select id, categories from categories order by categories asc");
                                while($row=mysqli_fetch_assoc($res)){
                                    if($row['id']==$categories_id){
                                         echo "<option selected value=".$row['id'].">".$row['categories']."</option>";

                                    }else{
                                        echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                    }
                                   
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                               <label for="company" class=" form-control-label">Product Name</label>
                               <input type="text" name="name" placeholder="Enter product name" class="form-control" required value=" <?php echo $name ?>">
                            </div>
                          
                            <div class="form-group">
                               <label for="company" class=" form-control-label">Product MRP</label>
                               <input type="text" name="mrp" placeholder="Enter product MRP" class="form-control" required value=" <?php echo $mrp ?>">
                            </div>
                         
                         
                            <div class="form-group">
                               <label for="company" class=" form-control-label">Product Selling price</label>
                               <input type="text" name="price" placeholder="Enter Selling Price" class="form-control" required value=" <?php echo $price ?>">
                            </div>
                        
                        
                            <div class="form-group">
                              <label for="company" class=" form-control-label">Product Quantity</label>
                              <input type="text" name="qty" placeholder="Enter Quantity" class="form-control" required value=" <?php echo $qty ?>">
                           </div>
                          
                            <div class="form-group">
                               <label for="company" class=" form-control-label">Product Image</label>
                               <input type="file" name="image"  class="form-control">
                            </div>
                           
                            <div class="form-group">
                               <label for="company" class=" form-control-label">Product shirt description</label>
                               <textarea name="short_desc" placeholder="write sort description of product" class="form-control" required value=" <?php echo $short_desc ?>"></textarea>
                            </div>
                             
                            <div class="form-group">
                               <label for="company" class=" form-control-label">Product long description</label>
                               <textarea name="long_desc" placeholder="write long description of product" class="form-control" required value=" <?php echo $long_desct_desc ?>"></textarea>
                            </div>
                           
                            <div class="form-group">
                               <label for="company" class=" form-control-label">Product meta title</label>
                               <textarea name="meta_title" placeholder="write meta title of product" class="form-control" required value=" <?php echo $meta_title ?>"></textarea>
                            </div>
                        
                              <div class="form-group">
                               <label for="company" class=" form-control-label">Product meta description</label>
                               <textarea name="meta_desc" placeholder="write meta description of product" class="form-control" required value=" <?php echo $meta_desc ?>"></textarea>
                            </div>
                         
                              <div class="form-group">
                               <label for="company" class=" form-control-label">Product meta keyword</label>
                               <textarea name="meta_keyword" placeholder="write meta keyword of product" class="form-control" required value=" <?php echo $meta_keyword ?>"></textarea>
                            </div>
                           
                            
                           <button name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount" name="submit">Submit</span>
                           </button>
                           <div class="field_error">  <?php echo $msg ?></div>
                        </div>
                    </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                          
<?php
require('footer.inc.php');
?>          