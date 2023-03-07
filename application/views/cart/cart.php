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
                    <h3 class="py-5">Shopping Cart</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($this->cart->total_items() > 0){ 
                                foreach($cartItems as $item){?>
                                <tr>
                                    <td><img width="40px" src="<?php echo base_url()."assets/images/".$item["image"]?>" alt=""></td>
                                    <td><?php echo $item["name"]?></td>
                                    <td><?php echo $item["price"]?></td>
                                    <td><input style="width:90px;" type="number" class="form-control" onchange="updateCartItem(this,'<?php echo $item["rowid"]; ?>')" value="<?php echo $item['qty'] ?>" ></td>
                                    <td><?php echo $item["subtotal"]?></td>
                                    <td><a href="<?php echo base_url()."removeItem/".$item["rowid"]; ?>" class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></a></td>
                                </tr>
                                <?php }
                            }?>
                        </tbody>
                        <tfoot class="border-none">
                            <tr>
                                <td colspan="4"><a href="<?php echo base_url()."product" ?>" class="btn btn-primary"> < Continue Shopping</a></td>
                                <td ><p class="fw-bold d-inline-block">Grand Total : </p> <?php echo $this->cart->total()." Rupees";?></td>
                                <td><a href="<?php echo base_url()."checkout" ?>" class="btn btn-success"> Checkout ></a></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    <script src="<?php echo base_url()."assets/js/jQuery.js" ?>"></script>
    <script src="<?php echo base_url()."assets/js/bootstrap.min.js" ?>"></script>
    <script>
        function updateCartItem(obj,rowid){
            $.get("<?php echo base_url()."cart/updateItemQty/"?>",{rowid:rowid,qty:obj.value},function(resp){
                if(resp == 'ok'){
                    location.reload();
                }else{
                    alert("Cart update failde, please try again");
                }
            })
        }
    </script>
</body>
</html>