<?php $this->view('include/v_header'); ?>


<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                    <a href="" class="site_title"> <span>BGR LOGISTIK|BUMN</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?php echo base_url() ?>production/images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>John Doe</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

             <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Profile <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?= base_url("c_produsen/produsen_profile"); ?>">Data Profile</a></li>
                                        <!-- <li><a href="index2.html">Dashboard2</a></li>
                                        <li><a href="index3.html">Dashboard3</a></li> -->
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i>Info Stock Gudang <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    <li><a href="<?= base_url("c_produsen/produsen_stock_gudang"); ?>"> Stock Gudang MDC + SDC</a></li>
                                        <!-- <li><a href="form_advanced.html">Advanced Components</a></li>
                                        <li><a href="form_validation.html">Form Validation</a></li> -->
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-table"></i> Pemesanan Produk<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <!-- <li><a href="tables.html">Lakukan Pemesanan</a></li> -->
                                        <li><a href="<?= base_url("c_produsen/produsen_pemesanan"); ?>">Informasi Pemesanan</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-bar-chart-o"></i> Data Inbond <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?= base_url("c_produsen/produsen_data_inbond"); ?>">Inbond</a></li>
                                        <!-- <li><a href="chartjs2.html">Chart JS2</a></li> -->
                                    </ul>
                                </li>
                            </ul>
                        </div>

               </div>
              <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a> -->
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
                                    <img src="<?php echo base_url() ?>production/images/img.jpg" alt="">Produsen
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;"> Profile</a>
                                    <a class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Formulir<small>Validasi Formulir</small></h2>
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
        <div class="col-md-3 col-sm-3  profile_left">
          <div class="profile_img">
            <div id="crop-avatar">
              <!-- Current avatar -->
              <!-- <img class="img-responsive avatar-view" src="<?php echo base_url() ?>production/images/picture.jpg" alt="Avatar" title="Change the avatar"> -->
              <!-- <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/uploads/images/foto_profil/'.$userdata->photo); ?>" style="width:125px; height:125px"> -->
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url() ?>production/images/picture.jpg" style="width:125px; height:125px">
            </div>
          </div>
          <h3>Samuel Doe</h3>

          <ul class="list-unstyled user_data">
            <li>
              <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
            </li>
          </ul>
          <br />

        </div>
        <div class="col-md-9 col-sm-9 ">

          <div class="profile_title">
            <div class="col-md-6">
              <h2>IDENTITAS</h2>
            </div>
          </div>
          <!-- start of user-activity-graph -->


          <!-- end of user-activity-graph -->

          <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
              <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Profile</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Ubah Password</a>
              </li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                 <!-- start profile -->
                 <ul class="messages">
                    <div class="x_content">
                                    <form class="" action="" method="post" novalidate>
                                        <!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a> -->
                                        </p>
                                        <span class="section">Data Perusahaan</span>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Username<span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Kelompok Badan<span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" required="required" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3  label-align"> Jenis Kepemilikan</label>
											<div class="col-md-6 col-sm-6">
												<select class="form-control">
													<option value="1">BUMN</option>
													<option value="2">BUMD</option>
													<option value="3">KOPERASI</option>
												</select>
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Kategori Perusahaan</label>
											<div class="col-md-6 col-sm-6">
												<select class="form-control">
													<option value="1">Petani</option>
													<option value="2">Peternak</option>
													<option value="3">Nelayan</option>
												</select>
											</div>
										</div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Negara</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="negara" class='negara' required="required" type="text" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Provinsi :</label>
                                            <div class="col-md-6 col-sm-6">
                                            <select class="form-control" name="prov" class="form-control" id="provinsi">
                                            <?php 
                                                foreach($provinsi as $prov)
                                                {
                                                    echo '<option value="'.$prov->id.'">'.$prov->nama.'</option>';
                                                }
                                            ?>
											</select>
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Kota/Kabupaten</label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="kab" class="form-control" id="kabupaten">
                                                <option value=''>Select Kota/Kabupaten</option>
                                                <?php 
                                                foreach($kabupaten as $kab)
                                                {
                                                    echo "<option value='".$kab->id."'>".$kab->nama."</option>";
                                                }
                                            ?>
												</select>
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Kecamatan</label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="kec" class="form-control" id="kecamatan">
                                                <option value=''>Select Kecamatan</option>
												</select>
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Desa</label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="des" class="form-control" id="desa">
                                                <option value=''>Select Desa</option>
												</select>
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="alamat" class='alamat' required="required" type="text" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Kode Pos</label>
                                            <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="number" class='number' name="number" data-validate-minmax="10,100" required='required'></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Longitude</label>
                                            <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="number" class='number' name="number" data-validate-minmax="10,100" required='required'></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Latitude</label>
                                            <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="number" class='number' name="number" data-validate-minmax="10,100" required='required'></div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">No Telpon</label>
                                            <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="number" class='number' name="number" data-validate-minmax="10,100" required='required'></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="email" class='email' required="required" type="email" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Gudang<span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="email" class='email' required="required" type="email" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">No NPWP</label>
                                            <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="number" class='number' name="number" data-validate-minmax="10,100" required='required'></div>
                                        </div>

                                        <div>
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Upload NPWP</label>
                                            <div class="fileUpload btn btn-success" style="margin-left: 10px;">
                                            <span class=""></span>
                                            <input class="upload" type="file" />
                                            </div>
                                        </div>

                                        <span class="section">Data PIC</span>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap<span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" required="required" />
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Posisi<span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" required="required" />
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">HP </label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" class='number' name="number" data-validate-minmax="10,100" required='required'></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="email" class='email' required="required" type="email" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">No KTP </label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" class='number' name="number" data-validate-minmax="10,100" required='required'></div>
                                        </div>

                                        <div>
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Upload KTP</label>
                                            <div class="fileUpload btn btn-success" style="margin-left: 10px;">
                                            <span class=""></span>
                                            <input class="upload" type="file" />
                                            </div>
                                        </div>

                                        <div>
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Upload Profile</label>
                                            <div class="fileUpload btn btn-success" style="margin-left: 10px;">
                                            <span class="">Size Foto 100x100px</span>
                                            <input class="upload" type="file" />
                                            </div>
                                        </div>

                                        
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary">Submit</button>
                                                    <button type='reset' class="btn btn-success">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                    </div>

                </ul>
                <!-- end profile -->

              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                <!-- Reset Password -->
                <ul class="messages">
                    <div class="x_content">
                                    <form class="" action="" method="post" novalidate>
                                        <!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a> -->
                                        </p>
                                        <span class="section">Ubah Password</span>
                                        <div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Password Lama<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="password" id="password1" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="Minimum 8 Characters Including An Upper And Lower Case Letter, A Number And A Unique Character" required />
												
												<span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
													<i id="slash" class="fa fa-eye-slash"></i>
													<i id="eye" class="fa fa-eye"></i>
												</span>
											</div>
										</div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Repeat password<span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="password" name="password2" data-validate-linked='password' required='required' /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Repeat password<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="password" name="password2" data-validate-linked='password' required='required' /></div>
                                        </div>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary">Submit</button>
                                                    <button type='reset' class="btn btn-success">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                    </div>

                </ul>
                <!-- Reset Password -->

              </div>
            </div>
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
                 |   BGR LOGISTIK | <a href="https://www.bgrlogistics.id/id">| BUMN |</a>
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

    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);

    </script>

<script>
		$(document).ready(function () {
			// $("#provinsi").change(function (){
			//     var url = "<?php echo site_url('C_Produsen/add_ajax_kab');?>/"+$(this).val();
			//     $('#kabupaten').load(url);
			//     return false;
			// })
			$("#provinsi").on('change', function () {
				var value = $("#provinsi").val();
				var url = "<?php echo site_url('C_Produsen/add_ajax_kab');?>/" + $(this).val();
				$.ajax({
					url : url,
					type: "GET",
					async: true,
					success: function (res) {
						$('#kabupaten').html(res);
						// pakai jika ada library select2$('#kabupaten').select2();
					}
				});
			});

			$("#kabupaten").change(function () {
				var url = "<?php echo site_url('C_Produsen/add_ajax_kec');?>/" + $(this).val();
				$('#kecamatan').load(url);
				return false;
			})

			$("#kecamatan").change(function () {
				var url = "<?php echo site_url('C_Produsen/add_ajax_des');?>/" + $(this).val();
				$('#desa').load(url);
				return false;
			})
		});
	</script>

</body>


<?php $this->view('include/v_footer'); ?>   