<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products</title>
        <link rel="stylesheet" href="<?php echo base_url()."assets/css/bootstrap.min.css"?>">
        <link rel="stylesheet" href="<?php echo base_url()."assets/css/all.min.css"?>">

    </head>
    <body>
        <div class="container  ">
            <h1 class="pt-5">Order Status</h1>
            <?php if($this->session->userdata("success")){ ?>
                <p class="text-light bg-success p-3 rounded"><?php echo $this->session->userdata("success"); ?></p>
            <?php } ?>
            <div class="row border border-dark p-5">
                <div class="col-md-6">
                    <h4>Shipping Address</h4>
                    <h6><?php echo $order_resp[0]["customer_name"]?></h6>
                    <h6><?php echo $order_resp[0]["customer_email"]?></h6>
                    <h6><?php echo $order_resp[0]["customer_phone"]?></h6>
                    <h6><?php echo $order_resp[0]["customer_address"]?></h6>
                </div>
                <div class="col-md-6 mb-2">
                    <h4>order info</h4>
                    <span class="d-block"><strong>Refrance ID</strong> # <?php echo $order_resp[0]["order_id"]?></span>
                    <span><strong>Total</strong> <?php echo $order_resp[0]["grand_total"]?> Rupees</span>
                </div>
            </div>
            <div class="row border-bottom ">
                <div class="col-md-2 mt-3">
                    <img width="70" src="<?php echo base_url()."assets/images/".$order_resp[0]["product_image"]?>" alt="">
                </div>
                <div class="col-md-6 mt-3">
                    <h6><?php echo $order_resp[0]["product_name"]; ?></h6>
                    <h6><?php echo $order_resp[0]["product_price"]; ?> Rupess </h6>
                    <h6>Quantity <?php echo $order_resp[0]["quantity"]; ?></h6>
                </div>
                <div class="col-md-4 mt-3 mb-5">
                <span><strong>Total</strong> <?php echo $order_resp[0]["grand_total"]?> Rupees</span>
                </div>
            </div>
        </div>
    </body>
</html>