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
                <div class="col-md-8">
                    <h3 class="py-5">Order Preview</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($this->cart->total_items() > 0){ 
                                foreach($cartItems as $item){?>
                                <tr>
                                    <td><img width="40px" src="<?php echo base_url()."assets/images/".$item["image"]?>" alt=""></td>
                                    <td><?php echo $item["name"]?></td>
                                    <td><?php echo $item["price"]?></td>
                                    <td><?php echo $item['qty'] ?></td>
                                    <td><?php echo $item["subtotal"]?></td>
                                    
                                </tr>
                                <?php }
                            }?>
                        </tbody>
                       
                    </table>
                </div>
                <div class="col-md-4 mt-5">
                    <h5 class="mt-5">Shipping Information</h5>
                    <form method="post" class="mt-4" >
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="<?php echo !empty($customerData['name']) ? $customer['name'] : '' ?>" class="form-control" placeholder="Enter Email">
                            <?php echo form_error("name","<p class='text-danger'>","</p>"); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?php echo !empty($customerData['email']) ? $customer['email'] : '' ?>" class="form-control" placeholder="Enter Email">
                            <?php echo form_error("email","<p class='text-danger'>","</p>"); ?>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" class="form-control" value="<?php echo !empty($customerData['phone']) ? $customer['phone'] : '' ?>" placeholder="Enter Phone Number">
                            <?php echo form_error("phone","<p class='text-danger'>","</p>"); ?>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" value="<?php echo !empty($customerData['address']) ? $customerData['address'] : '' ?>" class="form-control" placeholder="Enter Address">
                            <?php echo form_error("address","<p class='text-danger'>","</p>"); ?>
                        </div>
                        <div class="form-group mt-3">
                        
                            <input type="submit" name="placeOrder" class="btn btn-success float-end" value="Place Order >">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <script src="<?php echo base_url()."assets/js/jQuery.js" ?>"></script>
    <script src="<?php echo base_url()."assets/js/bootstrap.min.js" ?>"></script>
</body>
</html>