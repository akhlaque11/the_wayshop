
    <!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/bootstrap.min.css') ?>">
</head>

<body>

   
<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    ADMIN PANEL
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                    <div  style="color: white !important;">
                            <p><?php echo $this->session->flashdata('message');?></p>
                    </div>
                        <form action="<?php echo base_url()?>admin/admin_login_check" method="post">
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input name="user_email" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input name="user_password" type="password" class="form-control" i>
                            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-outline-success">LOGIN</button>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
</div>








</body>
</html>