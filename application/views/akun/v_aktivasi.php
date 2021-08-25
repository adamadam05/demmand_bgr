<?php $this->view('include/v_header2'); ?>

<body class="login">
        <div class="login_wrapper">
                <section class="login_content" style="padding:0px;">
					<h1 style="position: relative">Verifikasi Email</h1>
						<?= $result ?>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Already have an activated account?
                                <a href="<?= site_url() . 'c_auth' ?>" class="to_register"> Sign In </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="ftr"></i> BGR LOGISTIK | BUMN</h1>
                                <p>©2021 All Rights Reserved. BGR LOGISTIK. Privacy and Terms</p>
                            </div>
                        </div>
                </section>
        </div>
</body>


<?php $this->view('include/v_footer'); ?>   
