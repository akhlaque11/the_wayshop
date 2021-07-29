 <!-- Start All Title Box -->
 <div class="all-title-box">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <h2>Checkout</h2>
                 <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#">Shop</a></li>
                     <li class="breadcrumb-item active">Checkout</li>
                 </ul>
             </div>
         </div>
     </div>
 </div>
 <!-- End All Title Box -->


 <!-- Start Cart  -->
 <div class="cart-box-main">
     <div class="container">
         <div class="row new-account-login">
             <div class="col-sm-6 col-lg-6 mb-3">
                 <div class="title-left">
                     <h3>Account Login</h3>
                 </div>
                 <h5><a data-toggle="collapse" href="#formLogin" role="button" aria-expanded="false">Click here to
                         Login</a></h5>
                 <form class="mt-3 collapse review-form-box" id="formLogin"
                     action="<?php echo base_url('home/customer_shipping_login');?>" method="post">
                     <div class="form-row">
                         <div class="form-group col-md-6">
                             <label for="InputEmail" class="mb-0">Email Address</label>
                             <input name="customer_email" type="email" class="form-control" id="InputEmail"
                                 placeholder="Enter Email">
                         </div>
                         <div class="form-group col-md-6">
                             <label for="InputPassword" class="mb-0">Password</label>
                             <input name="customer_pasword" type="password" class="form-control" id="InputPassword"
                                 placeholder="Password">
                         </div>
                     </div>
                     <button class="btn hvr-hover">Login</button>
                 </form>
             </div>
             <div class="col-sm-6 col-lg-6 mb-3">
                 <div class="title-left">
                     <h3>Create New Account</h3>
                 </div>
                 <h5><a data-toggle="collapse" href="#formRegister" role="button" aria-expanded="false">Click here to
                         Register</a></h5>
                 <form class="mt-3 collapse review-form-box" id="formRegister" method="post"
                     action="<?php echo base_url('home/customer_shipping_register');?>">
                     <div class="form-row">
                         <div class="form-group col-md-6">
                             <label for="InputName" class="mb-0">Your Name</label>
                             <input name="customer_name" type="text" class="form-control" id="InputName"
                                 placeholder="Name">
                         </div>
                         <div class="form-group col-md-6">
                             <label for="InputLastname" class="mb-0">Your Email</label>
                             <input name="customer_email" type="email" class="form-control" id="InputLastname"
                                 placeholder="Your Email">
                         </div>
                         <div class="form-group col-md-6">
                             <label for="InputEmail1" class="mb-0">Your Password</label>
                             <input name="customer_password" type="password" class="form-control" id="InputEmail1"
                                 placeholder="Password">
                         </div>
                         <div class="form-group col-md-6">
                             <label for="InputPassword1" class="mb-0">Your Address</label>
                             <input name="customer_address" type="text" class="form-control" id="InputPassword1"
                                 placeholder="Address">
                         </div>
                         <div class="form-group col-md-6">
                             <label for="InputPassword1" class="mb-0">Your Phone</label>
                             <input name="customer_phone" type="text" class="form-control" id="InputPassword1"
                                 placeholder="Phone">
                         </div>
                         <div class="form-group col-md-6">
                             <label for="InputPassword1" class="mb-0">Your City</label>
                             <input name="customer_city" type="text" class="form-control" id="InputPassword1"
                                 placeholder="City">
                         </div>
                         <div class="form-group col-md-6">
                             <label for="InputPassword1" class="mb-0">Your Country</label>
                             <select id="country" name="customer_country" class="frm-field required">
                                 <option value="null">Select a Country</option>
                                 <option value="Afghanistan">Afghanistan</option>
                                 <option value="Bangladesh">Bangladesh</option>
                                 <option value="Pakistan">Pakistan</option>
                                 <option value="India">India</option>
                             </select>
                         </div>
                         <div class="form-group col-md-6">
                             <label for="InputPassword1" class="mb-0">Your Zipcode</label>
                             <input name="customer_zipcode" type="text" class="form-control" id="InputPassword1"
                                 placeholder="Zipcode">
                         </div>
                     </div>
                     <button type="submit" class="btn hvr-hover">Register</button>
                 </form>
             </div>
         </div>
         <div class="row">
             <div class="col-sm-6 col-lg-6 mb-3">
                 <div class="checkout-address">
                     <div class="title-left">
                         <h3>Billing address</h3>
                     </div>
                     <form class="needs-validation" novalidate method="post"
                         action="<?php echo base_url('home/save_shipping_address');?>">
                         <div class="row">
                             <div class="col-md-6 mb-3">
                                 <label for="firstName">First name *</label>
                                 <input  name="fname" type="text" class="form-control" id="firstName" placeholder="" value=""
                                     required>
                                 <div class="invalid-feedback"> Valid first name is required. </div>
                             </div>
                             <div class="col-md-6 mb-3">
                                 <label for="lastName">Last name *</label>
                                 <input name="lname" type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                 <div class="invalid-feedback"> Valid last name is required. </div>
                             </div>
                         </div>
                         <div class="mb-3">
                             <label for="username">Username *</label>
                             <div class="input-group">
                                 <input name="uname" type="text" class="form-control" id="username" placeholder="" required>
                                 <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                             </div>
                         </div>
                         <div class="mb-3">
                             <label for="email">Email Address *</label>
                             <input name="email" type="email" class="form-control" id="email" placeholder="">
                             <div class="invalid-feedback"> Please enter a valid email address for shipping updates.
                             </div>
                         </div>
                         <div class="mb-3">
                             <label for="address">Address *</label>
                             <input name="address1" type="text" class="form-control" id="address" placeholder="" required>
                             <div class="invalid-feedback"> Please enter your shipping address. </div>
                         </div>
                         <div class="mb-3">
                             <label for="address2">Address 2 *</label>
                             <input name="address2" type="text" class="form-control" id="address2" placeholder="">
                         </div>
                         <div class="row">
                             <div class="col-md-5 mb-3">
                                 <label for="country">Country *</label>
                                 <select name="country" class="wide w-100" id="country">
                                     <option value="Choose..." data-display="Select">Choose...</option>
                                     <option value="United States">United States</option>
                                 </select>
                                 <div class="invalid-feedback"> Please select a valid country. </div>
                             </div>
                             <div class="col-md-4 mb-3">
                                 <label for="state">City *</label>
                                 <select name="city" class="wide w-100" id="state">
                                     <option data-display="Select">Choose...</option>
                                     <option>California</option>
                                 </select>
                                 <div class="invalid-feedback"> Please provide a valid state. </div>
                             </div>
                             <div class="mb-3">
                             <label for="address2">Phone*</label>
                             <input name="phone" type="text" class="form-control" id="address" placeholder="">
                         </div>
                             <div class="col-md-3 mb-3">
                                 <label for="zip">Zipcode *</label>
                                 <input name="zipcode" type="text" class="form-control" id="zip" placeholder="" required>
                                 <div class="invalid-feedback"> Zip code required. </div>
                             </div>
                         </div>
                         <hr class="mb-4">
                         
                         <hr class="mb-4">
                         <div class="title"> <span>Payment</span> </div>
                         <div class="d-block my-3">
                             <div class="custom-control custom-radio">
                                 <input name="payment" id="credit" name="paymentMethod" type="radio" class="custom-control-input"
                                     checked required>
                                 <label class="custom-control-label" for="credit">Cash on delivery</label>
                             </div>
                             <div class="custom-control custom-radio">
                                 <input name="payment" id="debit" name="paymentMethod" type="radio" class="custom-control-input"
                                     required>
                                 <label class="custom-control-label" for="debit">Debit card</label>
                             </div>
                             <div class="custom-control custom-radio">
                                 <input name="payment" id="paypal" name="paymentMethod" type="radio" class="custom-control-input"
                                     required>
                                 <label class="custom-control-label" for="paypal">Paypal</label>
                             </div>
                         </div>
            <div id="result">
                    <p class="text-danger font-weight-bold"><?php echo $this->session->flashdata('message'); ?></p>
                
            </div>
                        
                        
                         <hr class=" mt-5 pt-5">
                         <button class="btn hvr-hover btn-block">Place Order</button>
                     </form>
                 </div>
             </div>
             <div class="col-sm-6 col-lg-6 mb-3">
                 <div class="row">
                     <div class="col-md-12 col-lg-12">
                         <div class="shipping-method-box">
                             <div class="title-left">
                                 <h3>Shipping Method</h3>
                             </div>
                             <div class="mb-4">
                                 <div class="custom-control custom-radio">
                                     <input id="shippingOption1" name="shipping-option" class="custom-control-input"
                                         checked="checked" type="radio">
                                     <label class="custom-control-label" for="shippingOption1">Standard Delivery</label>
                                     <span class="float-right font-weight-bold">FREE</span>
                                 </div>
                                 <div class="ml-4 mb-2 small">(3-7 business days)</div>
                                 <div class="custom-control custom-radio">
                                     <input id="shippingOption2" name="shipping-option" class="custom-control-input"
                                         type="radio">
                                     <label class="custom-control-label" for="shippingOption2">Express Delivery</label>
                                     <span class="float-right font-weight-bold">$10.00</span>
                                 </div>
                                 <div class="ml-4 mb-2 small">(2-4 business days)</div>
                                 <div class="custom-control custom-radio">
                                     <input id="shippingOption3" name="shipping-option" class="custom-control-input"
                                         type="radio">
                                     <label class="custom-control-label" for="shippingOption3">Next Business day</label>
                                     <span class="float-right font-weight-bold">$20.00</span>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-12 col-lg-12">
                         <div class="odr-box">
                             <div class="title-left">
                                 <h3>Shopping cart</h3>
                             </div>
                             <div class="rounded p-2 bg-light">
                                 <div class="media mb-2 border-bottom">
                                     <div class="media-body"> <a href="detail.html"> Lorem ipsum dolor sit amet</a>
                                         <div class="small text-muted">Price: $80.00 <span class="mx-2">|</span> Qty: 1
                                             <span class="mx-2">|</span> Subtotal: $80.00
                                         </div>
                                     </div>
                                 </div>
                                 <div class="media mb-2 border-bottom">
                                     <div class="media-body"> <a href="detail.html"> Lorem ipsum dolor sit amet</a>
                                         <div class="small text-muted">Price: $60.00 <span class="mx-2">|</span> Qty: 1
                                             <span class="mx-2">|</span> Subtotal: $60.00
                                         </div>
                                     </div>
                                 </div>
                                 <div class="media mb-2">
                                     <div class="media-body"> <a href="detail.html"> Lorem ipsum dolor sit amet</a>
                                         <div class="small text-muted">Price: $40.00 <span class="mx-2">|</span> Qty: 1
                                             <span class="mx-2">|</span> Subtotal: $40.00
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-12 col-lg-12">
                         <div class="order-box">
                             <div class="title-left">
                                 <h3>Your order</h3>
                             </div>
                             <div class="d-flex">
                                 <div class="font-weight-bold">Product</div>
                                 <div class="ml-auto font-weight-bold">Total</div>
                             </div>
                             <hr class="my-1">
                             <div class="d-flex">
                                 <h4>Sub Total</h4>
                                 <div class="ml-auto font-weight-bold"> $ 440 </div>
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
                                 <div class="ml-auto h5"> $ 388 </div>
                             </div>
                             <hr>
                         </div>
                     </div>
                     <div class="col-12 d-flex shopping-box">  </div>
                 </div>
             </div>
         </div>

     </div>
 </div>
 <!-- End Cart -->