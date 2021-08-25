<?php 
	$this->view('include/v_header');
	$this->view('include/v_sideleftadmin');
	$this->view('include/v_topnav'); 
?>
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Lengkapi Validasi Formulir</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Lengkapi Validasi Formulir <small>sub title</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                        <span class="section">Personal Info</span>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Username<span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="hidden" name="kode_user" id="kode_user" value="<?= $kode_user; ?>"/>
                                                <input class="form-control" type="text" name="username" id="username" placeholder="" required="required" value="<?= $username; ?>"/>
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Email Adress</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="email" id="email" required="required" type="email" value="<?= $email; ?>" data-validate-linked='email' /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Perusahaan</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="text" name="nama_perusahaan" id="nama_perusahaan" required='required' value="<?= $nama_perusahaan; ?>" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Perusahaan</label>
                                            <div class="col-md-6 col-sm-6">
											<select name="jenis" class="form-control select2" id="jenis">
											<?php
												foreach($list_jenis as $jenis){
													echo 
													str_replace(
													'value="'.$jenis_perusahaan.'"', 
													'value="'.$jenis_perusahaan.'" selected ', 
													'<option value="'.$jenis['kode_perusahaan'].'">'.ucwords($jenis['jenis_perusahaan']).'</option>'
													);
												}
											?>	
											</select>
											</div>
                                        </div>
										
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Negara</label>
                                            <div class="col-md-6 col-sm-6">
											<select name="negara" class="form-control select2" id="negara">
											<?php
												foreach($list_negara as $ln){													
													echo 
													str_replace(
													'value="'.$negara.'"', 
													'value="'.$negara.'" selected ', 
													'<option value="'.$ln['kode_negara'].'">'.ucwords($ln['nama_negara']).'</option>'
													);
												}
											?>	
											</select>
											</div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Provinsi</label>
                                            <div class="col-md-6 col-sm-6">
											<select name="provinsi" class="form-control select2" id="provinsi">
											<?php
												foreach($list_provinsi as $lp){
													echo 
													str_replace(
													'value="'.$provinsi.'"', 
													'value="'.$provinsi.'" selected ', 
													'<option value="'.$lp['kode_provinsi'].'">'.ucwords($lp['nama_provinsi']).'</option>'
													);
												}
											?>	
											</select>
											</div>
                                        </div>
										
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Kota/ Kabupaten</label>
                                            <div class="col-md-6 col-sm-6">
											<select name="kota" class="form-control select2" id="kota">
											<?php
												foreach($list_kota as $lk){
													echo 
													str_replace(
													'value="'.$kota_kabupaten.'"', 
													'value="'.$kota_kabupaten.'" selected ', 
													'<option value="'.$lk['kode_kabupatenkota'].'">'.ucwords($lk['nama_kabupatenkota']).'</option>'
													);
												}
											?>	
											</select>
											</div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Kode Pos</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="kode_pos" id="kode_pos" required="required" type="number" value="<?= $kode_pos; ?>" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="alamat" id="alamat" required="required" value="<?= $alamat; ?>" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">HP </label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" class='number' name="hp" id="hp" required='required' value="<?= $hp; ?>"></div>
                                        </div>
                                        <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Upload Profile</label>
                                            <div class="fileUpload btn btn-success" style="margin-left: 10px;">
                                            <span class="">Size 500x500 (200Kb)</span>
                                            <input nama="foto" class="upload" type="file" id="foto"/>
                                            </div>
                                        </div>
										<div class="ln_solid"></div>
										<div class="field item form-group">
											<div class="col-md-3 col-sm-3"></div>
											<div class="col-md-6 col-sm-6 mt-2 mb-2">
												<button type='button' id="btn_update_profile" class="btn btn-primary">Update Profile</button>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-3 col-sm-3"></div>
											<div class="col-md-6 col-sm-6 mt-2 mb-2">
												<div id="reg_alert_container"></div>
											</div>
										</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

<?php $this->view('include/v_footer'); ?>   
    <!-- Javascript functions	-->
	<script>
		function hideshow(){
			var password = document.getElementById("password1");
			var slash = document.getElementById("slash");
			var eye = document.getElementById("eye");
			
			if(password.type === 'password'){
				password.type = "text";
				slash.style.display = "block";
				eye.style.display = "none";
			}
			else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}

		}


		$(document).ready(function(){
			
			$('#frmProfile').submit(function(e) {
				e.preventDefault();
				doUpdate();
			});

			$(document).on('click','#btn_update_profile', function(){
				var dt = new FormData();
				var imgsize=0;
				dt.append('username', $('#username').val());
				dt.append('kode_user', $('#kode_user').val());
				dt.append('hp', $('#hp').val());
				dt.append('jenis_perusahaan', $('#jenis').val());
				dt.append('nama_perusahaan', $('#nama_perusahaan').val());
				dt.append('alamat', $('#alamat').val());
				dt.append('negara', $('#negara').val());
				dt.append('provinsi', $('#provinsi').val());
				dt.append('kota_kabupaten', $('#kota').val());
				dt.append('kode_pos', $('#kode_pos').val());
				dt.append('email', $('#email').val());
				dt.append('foto', $('#foto')[0].files[0]);
				//alert($('#foto_profile')[0].files[0]['name']);
					
				if (! $('#foto')[0].files[0]==''){
					imgsize =  $('#foto')[0].files[0].size;
				}				
					
				$alert = '<div id="login_alert" class="alert" role="alert">\
					<span id="login_msg"></span>\
				</div>';	
				$('#reg_alert_container').html($alert);
				if (imgsize <= 250000){
						$.ajax({
						url: '<?= site_url() ?>C_Profile/simpanProfileAdmin',
						type: 'POST',
						dataType: 'json',
						contentType: false,
						cache : false,
						processData : false,					
						data: dt,
						success: function(res) {	
							if(res.success){
								$('#login_alert').attr("class", "alert alert-success alert-dismissible fade show");
							}else{
								$('#login_alert').attr("class", "alert alert-danger alert-dismissible fade show");
							}	
							$('#login_alert').show();
							$('#login_msg').html(res.result);
							//location.reload();
						},
						error: function(xhr, res, err) {
							$('#login_alert').attr("class", "alert alert-danger alert-dismissible fade show");
							$('#login_alert').show();
							$('#login_msg').html(err);
						}							
					})
				}else{
					alert('Ukuran file tidak boleh lebih dari 120Kb!');
				}
			})
						
		})
		</script>
 