 <!-- Start All Title Box -->
 <div class="all-title-box">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <h2>Shop</h2>
                 <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                     <li class="breadcrumb-item active">Shop</li>
                 </ul>
             </div>
         </div>
     </div>
 </div>
 <!-- End All Title Box -->

 <!-- Start Shop Page  -->
 <div class="shop-box-inner">
     <div class="container">
         <div class="row">
             <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                 <div class="product-categori">
                     <div class="search-product">
                         <form action="#">
                             <input class="form-control" placeholder="Search here..." type="text">
                             <button type="submit"> <i class="fa fa-search"></i> </button>
                         </form>
                     </div>
                     <div class="filter-sidebar-left">
                         <div class="title-left">
                             <h3>Categories</h3>
                         </div>
                         <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men"
                             data-children=".sub-men">

                             <div class="list-group-collapse sub-men">

                                 <?php foreach($get_all_category as $single_category):?>

                                 <a href="<?php echo base_url('home/category_post/'.$single_category->id);?>"
                                     class="list-group-item list-group-item-action">
                                     <?php echo $single_category->c_name?>
                                 </a>

                                 <?php endforeach; ?>
                             </div>
                         </div>

                         <div class="filter-brand-left">
                             <div class="title-left">
                                 <h3>Brand</h3>
                             </div>
                             <div class="brand-box">
                                 <ul>

                                     <li>
                                         <div class="radio radio-danger">
                                             <?php foreach($get_all_brand as $single_brand):?>

                                             <a href="<?php echo base_url('home/brand_post/'.$single_brand->id);?>"
                                                 class="list-group-item list-group-item-action">
                                                 <?php echo $single_brand->b_name?>
                                             </a>

                                             <?php endforeach; ?>
                                         </div>
                                     </li>

                                 </ul>
                             </div>
                         </div>
                         <div class="filter-price-left">
                             <div class="title-left">
                                 <h3>Price</h3>
                             </div>
                             <div class="price-box-slider">
                                 <div id="slider-range"></div>
                                 <p>
                                     <input type="text" id="amount" readonly
                                         style="border:0; color:#fbb714; font-weight:bold;">
                                     <button class="btn hvr-hover" type="submit">Filter</button>
                                 </p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                 <div class="right-product-box">
                     <div class="product-item-filter row">
                         <div class="col-12 col-sm-8 text-center text-sm-left">
                             <div class="toolbar-sorter-right">
                                 <span>Sort by </span>
                                 <select id="basic" class="selectpicker show-tick form-control"
                                     data-placeholder="$ USD">
                                     <option data-display="Select">Nothing</option>
                                     <option value="1">Popularity</option>
                                     <option value="2">High Price → High Price</option>
                                     <option value="3">Low Price → High Price</option>
                                     <option value="4">Best Selling</option>
                                 </select>
                             </div>
                             <p>Showing all 4 results</p>
                         </div>
                         <div class="col-12 col-sm-4 text-center text-sm-right">
                             <ul class="nav nav-tabs ml-auto">
                                 <li>
                                     <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i
                                             class="fa fa-th"></i> </a>
                                 </li>
                                 <li>
                                     <a class="nav-link" href="#list-view" data-toggle="tab"> <i
                                             class="fa fa-list-ul"></i> </a>
                                 </li>
                             </ul>
                         </div>
                     </div>

                     <div class="row product-categorie-box">
                         <div class="tab-content">
                             <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                 <div class="row">
                                     <?php foreach($get_all_product as $product):  ?>
                                     <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                         <div class="products-single fix">
                                             <div class="box-img-hover">
                                                 <div class="type-lb">
                                                     <p class="sale">Sale</p>
                                                 </div>
                                                 <img src="<?php echo base_url('assets/product_images/'.$product->p_image); ?>"
                                                     class="img-fluid" alt="Image">
                                                 <div class="mask-icon">
                                                     <ul>
                                                         <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                 title="View"><i class="fas fa-eye"></i></a></li>
                                                         <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                 title="Compare"><i class="fas fa-sync-alt"></i></a>
                                                         </li>
                                                         <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                 title="Add to Wishlist"><i
                                                                     class="far fa-heart"></i></a></li>
                                                     </ul>
                                                     <a style="left:0; right:auto;" class="cart"
                                                         href="<?php echo base_url('home/single/' .$product->id )?>">Detail</a>
                                                     <a class="cart"
                                                         href="<?php echo base_url('home/save_cart/' .$product->id )?>">Add
                                                         to cart</a>
                                                 </div>
                                             </div>
                                             <div class="why-text">
                                                 <h2><?php echo $product->p_name; ?></h2>
                                                 <h4><?php echo $product->p_short_description; ?> </h4>
                                                 <h5> $<?php echo $product->p_price; ?> </h5>
                                             </div>
                                         </div>
                                     </div>
                                     <?php endforeach; ?>
                                 </div>
                             </div>
                             <div role="tabpanel" class="tab-pane fade" id="list-view">
                                 <?php foreach($get_all_product as $product):  ?>
                                 <div class="list-view-box">
                                     <div class="row">
                                         <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                             <div class="products-single fix">
                                                 <div class="box-img-hover">
                                                     <div class="type-lb">
                                                         <p class="new">New</p>
                                                     </div>
                                                     <img src="<?php echo base_url('assets/product_images/'.$product->p_image); ?>" class="img-fluid" alt="Image">
                                                     <div class="mask-icon">
                                                         <ul>
                                                             <li><a href="#" data-toggle="tooltip"
                                                                     data-placement="right" title="View"><i
                                                                         class="fas fa-eye"></i></a></li>
                                                             <li><a href="#" data-toggle="tooltip"
                                                                     data-placement="right" title="Compare"><i
                                                                         class="fas fa-sync-alt"></i></a></li>
                                                             <li><a href="#" data-toggle="tooltip"
                                                                     data-placement="right" title="Add to Wishlist"><i
                                                                         class="far fa-heart"></i></a></li>
                                                         </ul>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                             <div class="why-text full-width">
                                                 <h2><?php echo $product->p_name; ?></h2>
                                                 <h4><?php echo $product->p_short_description; ?> </h4>
                                                 <h5> <del>$ 60.00</del> $<?php echo $product->p_price; ?> </h5>

                                                 <p> <?php echo $product->p_long_description; ?> </p>
                                                 <a class="btn hvr-hover" href="#">Add to Cart</a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <?php endforeach; ?>


                             </div>
                         </div>
                     </div>
                     <div class="content_pagi">
                         <div class="pagination">
                             <?=$this->pagination->create_links();?>
                         </div>
                         <div class="clear"></div>
                     </div>
                     <style>
                     .content_pagi {
                         padding: 20px;
                         border: 1px solid #EBE8E8;
                         border-radius: 3px;
                     }

                     .pagination {}

                     .pagination ul {}

                     .pagination ul li {
                         float: left
                     }

                     .pagination ul li a {
                         color: #000;
                         padding: 7px 12px;
                         border: 1px solid #ddd;
                         font-size: 18px;
                     }

                     .pagination ul li a:hover {
                         background: #ddd;
                     }

                     .pagiactive a {
                         background: #ddd;
                     }
                     </style>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- End Shop Page -->