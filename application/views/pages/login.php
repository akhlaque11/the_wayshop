<div class="col-sm-12 col-lg-12 col-md-12 mb-3">
    <div class="title-left text-center">
        <h3>Account Login</h3>
    </div>

    <form class="mt-3   review-form-box" id="formLogin" action="<?php echo base_url('home/customer_logincheck');?>"
        method="post">
        <div class="form-row my-5">
            <div class="col-md-4"> </div>
            <div class="col-md-4">
                <div id="result">
                    <p class="text-danger font-weight-bold"><?php echo $this->session->flashdata('message'); ?></p>
                
                </div>



                <div class="form-group">
                    <label for="InputEmail" class="mb-0">Email Address</label>
                    <input name="customer_email" type="email" class="form-control" id="InputEmail"
                        placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="InputPassword" class="mb-0">Password</label>
                    <input name="customer_pasword" type="password" class="form-control" id="InputPassword"
                        placeholder="Password">
                </div>
                <button class="btn hvr-hover btn-block">Login</button>
            </div>
            <div class="col-md-4"> </div>

        </div>

    </form>
</div>