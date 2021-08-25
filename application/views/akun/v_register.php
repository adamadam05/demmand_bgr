<?php $this->view('include/v_header2'); ?>

<body class="login">
    <div>
        <div class="login_wrapper">
            <div id="register" class="animate form">
                <section class="login_content">
                    <form action="<?= base_url().'C_Register/prosesRegister'; ?>" method="POST" id="reg_form" enctype="multipart/form-data">
                        <h1>Create Account</h1>
						<div id="reg_alert_container"></div>
                        <div>
                            <select id="role" name="role" style="margin: 0 0 20px" class="form-control">
								<option value="0">Pilih Role:</option>
								<?php
									foreach($roles as $role){
										
										if ($role['kode_role']!=1){

											echo '<option value="'.$role['kode_role'].'">'.ucwords($role['role']).'</option>';

										}
										
									}
								?>								
							</select>
                            <?= form_error('role','<small class="text-denger p;-3">','</small>');?>
                        </div>
                        <div>
                            <input id="email" name="email" type="text" class="form-control" placeholder="Email"
                                value="<?= set_value('email');?>" >
                            <?= form_error('email','<small class="text-denger p;-3">','</small>');?>
                        </div>
                        <div>
                            <input id="nama_perusahaan" name="nama_perusahaan" type="text" class="form-control" placeholder="Nama Mitra"
                                value="<?= set_value('nama_perusahaan');?>" >
                            <?= form_error('nama_perusahaan','<small class="text-denger p;-3">','</small>');?>
                        </div>
                        <div>
                            <input id="no_hp" name="no_hp" type="text" class="form-control" placeholder="Nomor Handphone"
                                value="<?= set_value('no_hp');?>" >
                            <?= form_error('no_hp','<small class="text-denger p;-3">','</small>');?>
                        </div>	
						<div>
                        <div>
                            <select id="jenis" name="jenis" style="margin: 0 0 20px" class="form-control">
								<option value="0">Pilih Jenis Perusahaan:</option>
								<?php
									foreach($jenis as $jn){
										echo '<option value="'.$jn['kode_perusahaan'].'">'.strtoupper($jn['jenis_perusahaan']).'</option>';
									}
								?>
							</select>
                            <?= form_error('role','<small class="text-denger p;-3">','</small>');?>
                        </div>
						</div>
                        <div>
                            <input id="password1" name="password1" type="password" class="form-control"
                                placeholder="Password" >
                            <?= form_error('password1','<small class="text-denger p;-3>','</small>');?>
                        </div>
                        <div>
                            <input id="password2" name="password2" type="password" class="form-control"
                                placeholder="Repeat Password" >
                            <?= form_error('password2','<small class="text-denger p;-3>','</small>');?>
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
                            <!-- <a class="btn btn-default submit" href="index.html">Submit</a> -->
                            <button id="register" type="submit"
                                class="btn btn-primary btn-flat m-b-60 m-t-60">Register</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Already a member ?
                                <a href="<?= site_url() . 'c_auth' ?>" class="to_register"> Log in </a>
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
    </div>
</body>


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
			
			$('#reg_form').submit(function(e) {
				e.preventDefault();
				checkCaptcha();
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
							doReg();
						} else {
							$('#reg_alert_container').html(null);
							$alert = '<div id="login_alert" class="alert alert-warning alert-dismissible fade show" role="alert">\
                                  <span id="login_msg"></span>\
                                </div>';

							$('#reg_alert_container').html($alert);
							$('#login_alert').show();
							$('#login_msg').html("CAPTCHA not valid, try again!");
							$('#login_alert').attr("class", "alert alert-danger alert-dismissible fade show");
						}
					}
				});
			}
			
			function doReg() {
				$alert = '<div id="login_alert" class="alert" role="alert">\
						<span id="login_msg"></span>\
				</div>';	
				$('#reg_alert_container').html($alert);
				//Cek semua field terisi
				if ($('#role').val() > 0 && $('#email').val().length > 0 && $('#nama_perusahaan').val().length > 0 && $('#password1').val().length > 0 && $('#password2').val().length > 0 && $('#jenis').val() > 0) {
					//Cek password1 sama dengan password2
					if($('#password1').val() == $('#password2').val()){
						$.ajax({
							url: '<?= site_url() ?>c_register/prosesRegister',
							type: 'POST',
							dataType: 'json',
							data: $('#reg_form').serialize(),
							success: function(res) {	
								if(res.success){
									$('#login_alert').attr("class", "alert alert-success alert-dismissible fade show");
								}else{
									$('#login_alert').attr("class", "alert alert-danger alert-dismissible fade show");
								}	
								$('#login_alert').show();
								$('#login_msg').html(res.result);
								$('#reg_form')[0].reset();
								loadCaptcha();
							},
							error: function(xhr, res, err) {
								$('#login_alert').attr("class", "alert alert-danger alert-dismissible fade show");
								$('#login_alert').show();
								$('#login_msg').html(err);
								loadCaptcha();
							}							
						});
						
					}else{
						$('#login_alert').attr('class', 'alert alert-danger alert-dismissible fade show');
						$('#login_alert').show();
						$('#login_msg').html('Password tidak sesuai, harap cek kembali');
					}
					
				}else{
					$('#login_alert').attr('class', 'alert alert-danger alert-dismissible fade show');
					$('#login_alert').show();
					$('#login_msg').html('Harap lengkapi data yang diperlukan');
					$('#login_alert').attr('class', 'alert alert-danger alert-dismissible fade show');
				}
			}
		});
	</script>
