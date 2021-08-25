<?php $this->view('include/v_header2'); ?>
  
	<body class="login">

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form class="form" class="needs-validation" novalidate="" id="login_form" >
                        <h1>Login Form</h1>
						<div id="login_alert_container"></div>
                        <div>
                            <input id="email" name="email" type="text" class="form-control" placeholder="Email"
                                <?php if (get_cookie('email') != '') { ?>
                                value="<?php echo get_cookie('email'); ?>" <?php } ?> required>
                        </div>
                        <div>
                            <input id="password" name="password" type="password" class="form-control"
                                placeholder="Password" <?php if (get_cookie('password') != '') { ?>
                                value="<?php echo get_cookie('password'); ?>" <?php } ?> required>
                        </div>
                        <div class="form-group">
                            <label for="captcha_words" class="control-label">CAPTCHA</label>
                            <div class="row mb-1">
                                <div class="col-12">
                                    <div id="img_captcha"></div>
                                </div>
                                <div class="col-2 text-left">
                                    <i title="Refresh Captcha" class="fas fa-redo-alt"
                                        style="margin-top: 7px; cursor:pointer; font-size:20px;"
                                        id="captcha_refresh"></i>
                                </div>
                            </div>
                            <input class="form-control" tabindex="3" type="text" placeholder="CAPTCHA"
                                name="captcha_words" id="captcha_words" maxlength="5"
                                oninput="let p = this.selectionStart; this.value = this.value.toUpperCase(); this.setSelectionRange(p, p);"
                                required>
                            <div class="invalid-feedback">
                                Please fill in your CAPTCHA
                            </div>
                            <center><label style="color:red;" id="captcha_warn">Captcha words not match, please try
                                    again!.</label></center>
                        </div>
                        <div>
                            <!-- <a class="btn btn-default submit" href="index.html">Log in</a> -->
                            <button type="submit" class="btn btn-success btn-flat m-b-60 m-t-60">Log in</button>
                            <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">
                                <a href="<?= site_url() . 'c_register' ?>" class="to_register">Create Account</a>	
					
								<a href="<?= site_url() . 'c_auth/resetpassword' ?>" class="to_register">Reset Password</a>
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
<script>
		$(document).ready(function() {
			var captchaField = $('#img_captcha');
			var captchaWords = $('#captcha_words');
			var captchaWarn = $('#captcha_warn');
			var recaptcha = $('#captcha_refresh');

			captchaWarn.hide();
			loadCaptcha();

			function loadCaptcha() {
				$('#captcha_words').val('');
				$.ajax({
					async: false,
					url: '<?= site_url() . "c_captcha/generateCaptcha" ?>',
					type: 'GET',
					dataType: 'html',
					success: (res) => {
						captchaField.html(res);
						$('#img_captcha').children('img').addClass('img-fluid');
					}
				});
			}

			recaptcha.click((e) => {
				e.preventDefault();
				loadCaptcha();
			});

			captchaWords.click(() => {
				captchaWarn.hide();
			});

			$('#login_form').submit(function(e) {
				e.preventDefault();
				checkCaptcha();
			});
			
			$('#reg_form').submit(function(e) {
				e.preventDefault();
				doReg();
			});

			function checkCaptcha() {
				$.ajax({
					async: false,
					url: '<?= site_url() . "c_captcha/captchaValidate" ?>',
					type: 'POST',
					dataType: 'json',
					data: {
						csrf_token: $('input[name="csrf_token"]').val(),
						captcha_words: captchaWords.val()
					},
					success: (res) => {
						if (res.is_valid) {
							doLogin();
						} else {
							$('#login_alert_container').html(null);
							$alert = '<div id="login_alert" class="alert alert-warning alert-dismissible fade show" role="alert">\
                                  <span id="login_msg"></span>\
                                </div>';

							$('#login_alert_container').html($alert);
							$('#login_alert').show();
							$('#login_msg').html("CAPTCHA not valid, try again!");
							$('#login_alert').attr("class", "alert alert-danger alert-dismissible fade show");
						}
					}
				});
			}

			function doLogin() {
				if ($('#email').val().length > 0 && $('#password').val().length > 0) {
					$('#login_alert_container').html(null);
					$alert = '<div id="login_alert" class="alert alert-warning alert-dismissible fade show" role="alert">\
              <span id="login_msg"></span>\
              </div>';

					$('#login_alert_container').html($alert);
					$('#login_alert').show();
					$('#login_msg').html("Please wait, validating login...");
					$('#login_alert').attr("class", "alert alert-primary alert-dismissible fade show");

					$('#submit').attr('disabled', 'disabled');
					$('#submit').css('background-color', 'grey');

					$.ajax({
						url: '<?= site_url() ?>c_auth/submitLogin',
						type: 'POST',
						dataType: 'json',
						data: $('#login_form').serialize(),
						success: function(res) {
							$alert = '<div id="login_alert" class="alert alert-warning alert-dismissible fade show" role="alert">\
                                  <span id="login_msg"></span>\
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                                    <span aria-hidden="true">&times;</span>\
                                  </button>\
                                </div>';

							$('#login_alert_container').html($alert);

							if (res.success) {
								$('#login_alert_container').html();
								$('#login_alert').show();
								$('#login_msg').html(res.result);
								$('#login_alert').attr("class", "alert alert-success alert-dismissible fade show");
								var n = 3;
								var timeoutID = window.setInterval(function() {
									n--;
									if (n === 0) {
										// TODO: go ahead and really log the dude out
										//alert(res.role_id);
										if(res.role_id==1){
											window.location.href = '<?= base_url('c_admin') ?>';
										}else if(res.role_id==2){
											window.location.href = '<?= base_url('c_produsen') ?>';
										}else if(res.role_id==3){
											window.location.href = '<?= base_url('c_konsumen') ?>';
										}
									}
								}, 1000);
							} else {
								$('#login_alert').show();
								$('#login_msg').html(res.result);
								$('#login_alert').attr("class", "alert alert-danger alert-dismissible fade show");

								$('#submit').removeAttr('disabled');
								$('#submit').css('background-color', '');
								recaptcha.click();
							}

							$('#unblock_link_alert').click(function() {
								window.location.href = '<?php echo site_url() ?>' + $('#login_form').attr('href');
							});

						},
						error: function(xhr, res, err) {
							$('#submit').removeAttr('disabled');
							$('#submit').css('background-color', '');
							$('#login_alert').show();
							$('#login_msg').html(err);
							$('#login_alert').attr("class", "alert alert-danger alert-dismissible fade show");
						}
					});
				}

			}
			
		});

		$(".toggle-password").click(function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	</script>
