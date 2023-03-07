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
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                <h1 class="py-4 ">Products</h1>
                <a href="<?php echo base_url()."cart"?>" class="float-end" >
                    <i class="fas fa-shopping-cart me-1"></i> 
                    <span>(<?php echo $this->cart->total_items();?>)</span>
                </a>
               </div>
                <?php if(!empty($product)){
                    foreach($product as $pro){?>
                        <div class="col-md-4 mb-3">
                            <div class="cart border">
                                <div class="cart-header">
                                    <img src="<?php echo base_url()."assets/images/".$pro["product_image"] ?>" class="img-fluid" alt="No Pic">
                                </div>
                                <div class="cart-body">
                                    <h4 class="mt-1 d-inline pl-2 ms-3"><?php echo $pro["product_name"]?></h4>
                                    <h5 class="mt-1 float-end me-3"><?php echo "Rs ". $pro["product_price"]?></h5>
                                        <p class="px-3"><?php echo $pro["product_description"] ?></p>
                                </div>
                                <div class="cart-footer mb-4">
                                    <a href="<?php echo base_url()."addToCart/".$pro["product_id"];?>" type="button" class="btn btn-success offset-4">Add To Cart</a>
                                </div>
                            </div>
                        </div>    
                    <?php }
                }?>
            </div>
        </div>
</body>
</html>