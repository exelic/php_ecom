<?php
    require('top.inc.php');

$sql="select * from users order by id desc";
$res= mysqli_query($con,$sql);

?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Order Master </h4>
                           <div class="text-left">
                          
                           </div>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                               
                                        <thead>
                                            <tr>
                                                <th class="product-remove"><span class="nobr">Order Id</span></th>
                                               
                                                <th class="product-name"><span class="nobr">Order Date</span></th>
                                                <th class="product-price"><span class="nobr"> Shiping Address </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"></span>Payment Status</th>
                                               <th class="product-stock-stauts"><span class="nobr"></span>Order Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                               $res=mysqli_query($con, "SELECT orders.*,order_status.name as order_status_str FROM orders,order_status where order_status.id = order_status");
                                               while($row = mysqli_fetch_assoc($res)){

                                            ?>
                                            <tr>
                                                <td class="product-remove"><a href="order_master_details.php?id=<?php echo $row['id']?>"><?php echo $row['id']?></a></td>
                                                <td class="product-name"><a href="#"><?php echo $row['added_on']?></a></td>
                                                 <td class="product-name"><a href="#"><?php echo $row['house_number']?>,<?php echo $row['city']?>,<?php echo $row['address']?>,<?php echo $row['pin']?></a></td>
                                                  <td class="product-name"><a href="#"><?php echo $row['payment_type']?></a></td>
                                                   <td class="product-name"><a href="#"><?php echo $row['payment_status']?></a></td>
                                                    <td class="product-name"><a href="#"><?php echo $row['order_status_str']?></a></td>
                                                
                                            </tr>
                                          
                                       <?php } ?>                                           
                                        </tbody>
                                        
                                    
                              </table>
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