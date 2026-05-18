<?php
   include 'top.php';
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
                                  <span class="breadcrumb-item active">My Order</span>
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
                                               $uid=$_SESSION['USER_ID'];
                                               $res=mysqli_query($con, "SELECT orders.*,order_status.name as order_status_str FROM orders,order_status where orders.user_id ='$uid' and order_status.id=orders.order_status");
                                               while($row = mysqli_fetch_assoc($res)){

                                            ?>
                                            <tr>
                                                <td class="product-remove"><a href="my_order.php?id=<?php echo $row['id']?>"><?php echo $row['id']?></a></td>
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