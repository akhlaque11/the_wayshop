<script>
// Update item quantity
function updateCartItem(obj, rowid) {
    $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {
        rowid: rowid,
        qty: obj.value
    }, function(resp) {
        if (resp == 'ok') {
            location.reload();
        } else {
            alert('Your cart is updated successfully....');
            location.reload();
        }
    });
}
</script>
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cart</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home/shop') ?>">Shop</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->


<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>

                            <tr>
                                <td class="thumbnail-img">
                                    <a href="#">
                                        <img class="img-fluid"
                                            src="<?php echo base_url('assets/product_images/'.$item['image'] ); ?>" alt="" />
                                    </a>
                                </td>
                                <td class="name-pr">
                                    <a href="#">
                                        <?php echo $item['name'] ?>
                                    </a>
                                </td>
                                <td class="price-pr">
                                    <p>$ <?php echo $item['price'] ?></p>
                                </td>
                                <!-- <td class="quantity-box"><input type="number" size="4" value="<?php echo $item['qty'] ?>  " min="0" step="1"
                                          class="c-input-text qty text">
                                  </td> -->
                                <td><input type="number" class="form-control text-center"
                                        value="<?php echo $item["qty"]; ?>"
                                        onchange="updateCartItem(this, '<?php echo $item['rowid']; ?>')"></td>
                                <td class="total-pr">
                                    <!-- <p>$ 80.0</p> -->
                                    <?php echo '$'.$item["subtotal"].' USD'; ?>
                                </td>
                                <td class="remove-pr">
                                    <!-- <a href="<?php echo base_url('home/remove_cart/'.$item['id']);?>">
                                          <i class="fas fa-times"></i>
                                      </a> -->
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure to delete item?')?window.location.href='<?php echo base_url('cart/removeItem/'.$item['rowid']); ?>':false;"><i
                                            class="itrash"></i>Remove </button>
                                </td>


                            </tr>
                            <?php }; } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-6 col-sm-6">
                <div class="coupon-box">
                    <div class="input-group input-group-sm">
                        <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code"
                            type="text">
                        <div class="input-group-append">
                            <button class="btn btn-theme" type="button">Apply Coupon</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="update-box">
                    <input value="Update Cart" type="submit">
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <h3>Order summary</h3>
                    <div class="d-flex">
                        <h4>Sub Total</h4>
                        <?php $total =  $this->cart->total();?>

                        <div class="ml-auto font-weight-bold"> <?php echo '$'. $total .' USD'; ?> </div>
                    </div>
                    <div class="d-flex">
                        <h4>Discount</h4>
                        <div class="ml-auto font-weight-bold"> $ 40 </div>
                    </div>
                    <hr class="my-1">
                    <div class="d-flex">
                        <h4>Coupon Discount</h4>
                        <div class="ml-auto font-weight-bold"> $ 10 </div>
                    </div>
                    <div class="d-flex">
                        <h4>Tax</h4>
                        <div class="ml-auto font-weight-bold"> $ 2 </div>
                    </div>
                    <div class="d-flex">
                        <h4>Shipping Cost</h4>
                        <div class="ml-auto font-weight-bold"> Free </div>
                    </div>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Grand Total</h5>
                        <?php     
                        
                        $discount = -40;
                        $grand = $total + $discount; 
                        ?>
                        <div class="ml-auto h5"> <?php echo '$' .$grand. 'USD'; ?> </div>

                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-12 d-flex shopping-box">
            <?php  $customer_id = $this->session->userdata('customer_id'); ?>
            <?php  if (empty($customer_id)) { ?>
                <a href="<?php echo base_url('home/loginUser') ?>" class="ml-auto btn hvr-hover">Checkout</a>

            <?php    } 
            else { 
                ?>
                <a href="<?php echo base_url('home/checkout') ?>" class="ml-auto btn hvr-hover">Checkout</a>
                <?php } ?>
            </div>
        </div>

    </div>
</div>
<!-- End Cart -->