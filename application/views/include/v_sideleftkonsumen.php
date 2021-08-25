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
                <img src="<?= base_url() ?>production/images/img.jpg" alt="..." class="img-circle profile_img">
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
                                <li><a><i class="fa fa-user"></i> Profile <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?= base_url("c_profile"); ?>">Data Profile</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i> Form Pemesanan <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    <li><a href="<?= base_url("c_konsumen/konsumen_po"); ?>"> Form PO</a></li>
                                    </ul>
                                </li>
                                <!-- <li><a><i class="fa fa-table"></i> Pemesanan Produk<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="tables.html">Lakukan Pemesanan</a></li> -->
                                        <!-- <li><a href="<?= base_url("c_konsumen/konsumen_pemesanan"); ?>">Informasi Pemesanan</a></li>
                                    </ul>
                                </li> --> 
                                <!-- <li><a><i class="fa fa-bar-chart-o"></i> Data Outbond <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?= base_url("c_konsumen/konsumen_data_outbond"); ?>">Outbond</a></li>
                                        <li><a href="chartjs2.html">Chart JS2</a></li> -->
                                    <!-- </ul>
                                </li> -->
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
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>