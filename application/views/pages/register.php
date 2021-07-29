

<div class="main register_customer">
    <div class="container">
        <div class="register_account row" style="">
            
            
            

            <div class="col-sm-3 col-lg-3 col-md-3 mb-3 my-5 "><div id="result">
                <p class="text-danger font-weight-bold "><?php echo $this->session->flashdata('message'); ?></p>
            </div></div>
            <div class="col-sm-6 col-lg-6 col-md-6 mb-3 my-5 py-5 border">
            
                 <div class="title-left">
                     <h3>Create New Account</h3>
                 </div>
                 <h5><a data-toggle="collapse" href="#formRegister" role="button" aria-expanded="false">Click here to
                         Register</a></h5>
                 <form class="mt-3 review-form-box" id="formRegister" method="post"
                     action="<?php echo base_url('home/saveUser');?>">
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
                             <select id="country" name="customer_country" class="form-control frm-field required">
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
                     <button type="submit" class="btn-block btn hvr-hover">Register</button>
                 </form>
             </div>
             <div class="col-sm-3 col-lg-3 col-md-3 mb-3"></div>
            <!-- <form method="post" action="<?php echo base_url('home/customer_save');?>">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="customer_name" placeholder="Enter Your Name">
                                </div>

                                <div>
                                    <input type="text" name="customer_password" placeholder="Enter Your Password">

                                </div>

                                <div>
                                    <input type="text" name="customer_city" placeholder="Enter Your City">
                                </div>
                                <div>
                                    <input type="text" name="customer_phone" placeholder="Enter Your Phone">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" name="customer_email" placeholder="Enter Your Email">
                                </div>
                                        

                                <div>
                                    <input type="text" name="customer_address" placeholder="Enter Your Address">
                                </div>
                                
                                <div>
                                    <select id="country" name="customer_country" class="frm-field required">
                                        <option value="null">Select a Country</option>         
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Netherland">Netherland</option>
                                        <option value="USA">USA</option>

                                    </select>
                                </div>		

                                <div>
                                    <input type="text" name="customer_zipcode" placeholder="Enter Your ZipCode">
                                </div>
                            </td>
                        </tr> 
                    </tbody></table> 
                <div class="search"><div><button class="grey">Create Account</button></div></div>
                <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
                <div class="clear"></div>
            </form> -->
        </div>  	
        <div class="clear"></div>
    </div>
</div>