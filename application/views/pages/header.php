<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>ThewayShop - Ecommerce Bootstrap 4 HTML Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico') ?>">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" href="<?php echo base_url('assets/images/apple-touch-icon.png') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <!-- Site CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css') ?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css') ?>">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Now Man
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Fashion
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Now Man
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Fashion
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                            <option>¥ JPY</option>
                            <option>$ USD</option>
                            <option>€ EUR</option>
                        </select>
                    </div>
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +11 900 800 100</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Our location</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                        aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="<?php echo base_url();?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('home/shop');?>">Products</a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
                                <li><a href=" <?php echo base_url('cart') ?> ">Cart</a></li>
                                <?php  $customer_id = $this->session->userdata('customer_id'); ?>
                                <li><a href="<?php  if (!empty($customer_id))
                            { 
                                echo base_url('home/checkout');
                            }
                               else
                               { 
                                   echo base_url('home/loginUser');
                               }
                                 ?>"> Checkout   </a></li>
                                <li><a href="<?php  if (!empty($customer_id))
                            { 
                                echo base_url('home/checkout');
                            }
                               else
                               { 
                                   echo base_url('home/loginUser');
                               }
                                 ?>">My Account</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="service.html">Blog Posts</a></li>
                        <li class="nav-item"><a class="nav-link" href=" <?php echo base_url('home/contact') ?> ">Contact</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="<?php echo base_url('home/registerUser') ?> ">Register</a></li>
                        <li class="nav-item">
                            <?php  $customer_id = $this->session->userdata('customer_id');
                               $customer_email = $this->session->userdata('customer_email');
                        if ($customer_id){  ?>
                            <a href="<?php echo base_url('home/logout'); ?>"> <?php  echo $customer_email;   ?>   Logout</a>
                            <?php } else {    ?>
                            <a class="nav-link" href="<?php echo base_url('home/loginUser') ?>">Login</a>
                            <?php  } ?>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge"><?php echo $this->cart->total_items();?></span>
                            </a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <?php  
            
              $data = $this->cart->contents(); 
             
            //   $data->array();
            //   var_dump($data);
              ?>
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                    <?php  foreach($data as $item){  ?>
                        <li>
                            <a href=" <?php echo base_url('home/checkout'); ?> " class="photo">
                            <img src="<?php echo base_url('assets/product_images/'.$item['image'] ); ?>" class="cart-thumb" alt="" />
                        </a>
                            <h6><a href="<?php  if (!empty($customer_id))
                            { 
                                echo base_url('home/checkout');
                            }
                               else
                               { 
                                   echo base_url('home/loginUser');
                               }
                                 ?>"> <?php echo $item['name'];  ?>   </a></h6>
                            <p><?php echo $item['qty'];  ?>x - <span class="price">$    <?php echo $item['price'];  ?></span></p>
                        </li>
                        <?php } ?>
                        <li class="total">
                            <a href="<?php echo base_url('cart'); ?>" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <?php $total =  $this->cart->total();?>
                            <span class="float-right"><strong>Total</strong>: $ <?php echo $total; ?></span>
                        </li>
                    </ul>
                </li>
            </div>
        
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->