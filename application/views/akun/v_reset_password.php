<?php $this->view('include/v_header2'); ?>
  
	<body class="login">

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form class="form" class="needs-validation" novalidate="" id="login_form" action="<?= base_url('C_Auth/resetPassword')?>">
                        <h1>Reset Password</h1>
						<div id="login_alert_container"></div>
                        <div>
                            <input id="email" name="email" type="text" class="form-control" placeholder="Masukan Email"
                                <?php if (get_cookie('email') != '') { ?>
                                value="<?php echo get_cookie('email'); ?>" <?php } ?> required>
                        </div>

                        <div>
                            <!-- <a class="btn btn-default submit" href="index.html">Log in</a> -->
                            <button type="submit" class="btn btn-success btn-flat m-b-60 m-t-60">Reset</button>
                            <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">New to site?
                                <a href="<?= site_url() . 'c_register' ?>" class="to_register"> Create Account </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="ftr"></i> BGR LOGISTIK | BUMN</h1>
                                <p>©2021 All Rights Reserved. BGR LOGISTIK. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
			</div>



<?php $this->view('include/v_footer'); ?>   
<!-- Page JS Script -->

