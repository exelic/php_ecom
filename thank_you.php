<?php
   include "top.php";
?>

<div class="thank">
    <div class="box">
        <h1>Thank you!</h1>
        <p>Your order has been placed successfully.</p>
        <p>A confirmation email with your order details has been sent.</p>

        <!-- ORDER SUMMARY -->
        <div class="order-info">
            <h2>Order Summary</h2>
            <div class="row">
                <div class="thank_label">Order ID:</div>
                <div>#123456</div> <!-- replace with PHP -->
            </div>
            <div class="row">
                <div class="thank_label">Order Date:</div>
                <div>04 Dec 2025</div>
            </div>
            <div class="row">
                <div class="thank_label">Total Amount:</div>
                <div>₹ 1,999.00</div>
            </div>
            <div class="row">
                <div class="thank_label">Payment Type:</div>
                <div>Online Payment</div>
            </div>
            <div class="row">
                <div class="thank_label">Shipping Address:</div>
                <div>John Doe, 123 Street, City, PIN 000000</div>
            </div>
        </div>

        <!-- TRACKING INFO -->
        <div class="tracking">
            <span>Tracking Number:</span> TRK1234567890<br>
            You can track your order status using this number on our
            <a href="track-order.php?tracking=TRK1234567890">Order Tracking page</a>.
        </div>

        <div class="btn-wrap">
            <a href="index.php" class="btn">Continue Shopping</a>
        </div>
    </div>
</div>


<?php
   include'footer.php';
?>
