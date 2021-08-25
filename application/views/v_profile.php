<?php $this->view('include/v_header'); ?>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
					  <a href="index.html" class="site_title">
						<img style="width:100%; padding-right:10px;margin:auto" src="<?= base_url() ?>production/images/bgr_logo.png">
					  </a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?php echo base_url() ?>production/images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
							<h2><?= $nama_perusahaan ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="index.html">Dashboard</a></li>
                                        <li><a href="index2.html">Dashboard2</a></li>
                                        <li><a href="index3.html">Dashboard3</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="form.html">General Form</a></li>
                                        <li><a href="form_advanced.html">Advanced Components</a></li>
                                        <li><a href="form_validation.html">Form Validation</a></li>
                                        <li><a href="form_wizards.html">Form Wizard</a></li>
                                        <li><a href="form_upload.html">Form Upload</a></li>
                                        <li><a href="form_buttons.html">Form Buttons</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="general_elements.html">General Elements</a></li>
                                        <li><a href="media_gallery.html">Media Gallery</a></li>
                                        <li><a href="typography.html">Typography</a></li>
                                        <li><a href="icons.html">Icons</a></li>
                                        <li><a href="glyphicons.html">Glyphicons</a></li>
                                        <li><a href="widgets.html">Widgets</a></li>
                                        <li><a href="invoice.html">Invoice</a></li>
                                        <li><a href="inbox.html">Inbox</a></li>
                                        <li><a href="calendar.html">Calendar</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="tables.html">Tables</a></li>
                                        <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="chartjs.html">Chart JS</a></li>
                                        <li><a href="chartjs2.html">Chart JS2</a></li>
                                        <li><a href="morisjs.html">Moris JS</a></li>
                                        <li><a href="echarts.html">ECharts</a></li>
                                        <li><a href="other_charts.html">Other Charts</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= site_url('C_Auth/logout') ?>">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url() ?>production/images/img.jpg" alt="">Admin
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item"  href="<?= base_url("C_Profile"); ?>"> Profile</a>
								<a class="dropdown-item"  href="<?= site_url('C_Auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

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

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>


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
	</script>
</body>
<?php $this->view('include/v_footer'); ?>  
	<script>
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
						url: '<?= site_url() ?>C_Profile/updateProfile',
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
 