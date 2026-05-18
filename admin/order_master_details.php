<?php
    require('top.inc.php');
    $order_id=get_safe_value($con,$_GET['id']);

    //logic for updating status of order
    if(isset($_POST['update_order_status'])){
        $update_order_status=$_POST['update_order_status'];
        mysqli_query($con,"update orders set order_status='$update_order_status' where id='$order_id'");
    }
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Order Details </h4>
                           <div class="text-left">
                          
                           </div>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                               
                                     
                                         <thead>
                                            <tr>
                                                <th class="product-remove"><span class="nobr">Product Name</span></th>
                                                <th class="product-name"><span class="nobr">Product Image</span></th>
                                                <th class="product-price"><span class="nobr">Qty</span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Price </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"></span>Total Payment</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                               $uid=$_SESSION['USER_ID'];
                                               $res=mysqli_query($con, "select distinct(order_details.id),order_details.*,product.name,product.image,orders.address,orders.city,orders.pin,orders.house_number,orders.order_status from order_details,product,orders where order_details.order_id='$order_id' and order_details.product_id=product.id ");
                                               $total_price=0;
                                               while($row = mysqli_fetch_assoc($res)){
                                                $house_number=$row['house_number'];
                                                $address=$row['address'];
                                                $city=$row['city'];
                                                $pin= $row['pin'];
                                               $total_price=$total_price+($row['qty']*$row['price']);
                                               $order_status=$row['order_status'];
                                            ?>
                                            <tr>
                                                <td class="product-remove"><a href="#"><?php echo $row['name']?></a></td>
                                                <td class="product-name"><a href="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"> </a></td>
                                                 <td class="product-name"><a href="#"><?php echo $row['qty']?></a></td>
                                                  <td class="product-name"><a href="#"><?php echo $row['price']?></a></td>
                                                   <td class="product-name"><a href="#"><?php echo $row['price']?></a></td>
                                                    
                                            </tr>
                                          
                                       <?php } ?>  
                                       <td colspan="3"></td>
                                       <td class="product_name">Total Price</td>
                                       <td class="product_name"><?php echo $total_price?></td>                                         
                                        </tbody>
                                    
                              </table>
                              <div id="address_details">
                                <strong>Address</strong>

                              <?php echo $house_number?>,  <?php echo $address?>,<?php echo $city?>,<?php echo $pin?><br><br>
                               <strong>Order Status</strong>
                               <?php
                                  $order_status_arr = mysqli_fetch_assoc(mysqli_query($con, "SELECT name FROM order_status where id='$order_status'"));
                                  echo $order_status_arr['name'];
                               ?><br>
                               <br>
                               <div>
                                <form action="" method="post">
                                     <select class=" form-control" name="update_order_status">
                                  <option>Change Status</option>
                                <?php
                                $res=mysqli_query($con,"select * from order_status");
                                while($row=mysqli_fetch_assoc($res)){
                                    if($row['id']==$categories_id){
                                         echo "<option selected value=".$row['id'].">".$row['name']."</option>";

                                    }else{
                                        echo "<option value=".$row['id'].">".$row['name']."</option>";
                                    }
                                   
                                }
                                ?>
                              </select>
                                    <input type="submit" class="form-control"/>
                                </form>
                                 
                               </div>
                            </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
<?php
require('footer.inc.php');
?>          