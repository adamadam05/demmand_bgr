<?php
$this->view('include/v_header');
?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <a href="<?=base_url("c_admin"); ?>" class="site_title"> <span>BGR LOGISTIK|BUMN</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url() ?>production/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

               <!-- sidebar menu -->
               <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-user"></i> Profile <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=base_url("c_profile"); ?>">Data Profile</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-home"></i> Gudang <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=base_url("c_gudang"); ?>">Data Gudang</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
               </div>
              <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
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
              </a>
            </div> -->
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
                    <a class="dropdown-item"  href="<?=base_url("C_Profile"); ?>"> Profile</a>
					<a class="dropdown-item"  href="<?=site_url('C_Auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>

                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
   
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail Gudang</h2>
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
                                    <form class="" action="" method="post" novalidate>
                                        <!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a> -->
                                        </p>																				
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Kode Profil<span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
																						<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="<?=$gudang->kode_profil; ?>" required="required" />
                                            </div>
                                        </div>
																				
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Kelompok</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="occupation" data-validate-length-range="5,15" type="text" placeholder="<?=$gudang->nama_kelompok; ?>" /></a></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Gudang</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="occupation" data-validate-length-range="5,15" type="text" placeholder="<?=$gudang->nama_gudang; ?>" /></a></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="occupation" data-validate-length-range="5,15" type="text" placeholder="<?=$gudang->alamat; ?>" /></a></div>
                                        </div>

                  
                                        <div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Maps<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<div id="map_container" style=" width: 100%;height: 300px; padding: 10px;"></div>
											</div>
										</div>
										
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Longitude<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="text" name="longitude" id="longitude" placeholder="<?=$gudang->longitude ?>"/>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Latitude<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="text" name="latitude" id="latitude" placeholder="<?=$gudang->latitude ?>"/>
											</div>
										</div>

                                        </div>

                                        <br>

                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                <a href="<?=base_url("c_gudang"); ?>" class="btn btn-primary "></i> Kembali </a>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                <!-- tes formulir -->

                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">


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
          BGR_LOGISTIK <a href="https://www.bgrlogistics.id/id">BUMN</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
 
    <?php $this->view('include/v_footer'); ?>

 <!-- Javascript functions	-->
	<script>
		var long2= <?=$gudang->longitude ?>;
		var lat2 = <?=$gudang->latitude ?>;
		var nama = "<?=$gudang->nama_gudang ?>";
		var map = L.map('map_container').setView([lat2,long2], 13);

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

		var marker = L.marker([lat2,long2],{
				draggable: true
			  }).addTo(map)
			.bindPopup(nama)
			.openPopup();

		marker.on('dragend', function (e) {
		 var coords = e.target.getLatLng();
		 var lat = coords.lat;
		 var lng = coords.lng;
		 document.getElementById('longitude').value=lng;
		document.getElementById('latitude').value=lat;
		});	
    
	</script>

