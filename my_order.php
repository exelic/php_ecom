<?php
   include 'top.php';
   $order_id=get_safe_value($con,$_GET['id']);
?>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">My Order Details</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- wishlist-area start -->
        <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
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
                                               $res=mysqli_query($con, "select distinct(order_details.id),order_details.*,product.name,product.image from order_details,product,orders where order_details.order_id='$order_id' and orders.user_id='$uid' and order_details.product_id=product.id ");
                                               $total_price=0;
                                               while($row = mysqli_fetch_assoc($res)){
                                               $total_price=$total_price+($row['qty']*$row['price']);
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
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist-area end -->


<?php
   include 'footer.php'
?>