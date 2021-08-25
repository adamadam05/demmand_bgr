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
                <h2>Produsen</h2>
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
                                        <li><a href="<?= base_url("c_profile"); ?>">Data Profile</a></li>
                                    </ul>
                                </li>
                                <!-- <li><a><i class="fa fa-edit"></i>Info Stock Gudang <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    <li><a href="<?= base_url("c_produsen/produsen_stock_gudang"); ?>"> Stock Gudang MDC + SDC</a></li>
                                    </ul>
                                </li> -->
                                <li><a><i class="fa fa-bar-chart-o"></i> Data Inbond <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?= base_url("c_produsen/produsen_data_inbond"); ?>">Inbond</a></li>
                                        <!-- <li><a href="chartjs2.html">Chart JS2</a></li> -->
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i>Data Outbound <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    <li><a href="<?= base_url("c_produsen/produsen_data_outbound"); ?>"> Outbound</a></li>
                                    </ul>
                                </li>
                                <!-- <li><a><i class="fa fa-edit"></i>Storage <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    <li><a href="<?= base_url("c_produsen/produsen_stock_gudang"); ?>"> Storage</a></li>
                                    </ul>
                                </li> -->
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
                      <img src="<?php echo base_url() ?>production/images/img.jpg" alt="">Produsen
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="<?= base_url("c_produsen/produsen_profile"); ?>"> Profile</a>
                      <a class="dropdown-item"  href=""><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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


             

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Produk <small></small></h2>
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

                <!-- tes formulir -->
                <div class="x_content">
								
                <form class="" action="<?php echo base_url(). 'C_Produsen/input_produk';?>" method="POST" novalidate>
																		<!-- <?php $i = 0; foreach ($inbound as $brt=>$value) : { if(++$i > 1) break; }?> -->
                                        <!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a> -->
                                        </p>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Kode Produk</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="kode_penyambung_produk_inbound" id="kode_penyambung_produk_inbound" required="required" placeholder="" value="" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">No GR</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="no_gr" id="no_gr" required="required" placeholder="" value="" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Produk</label>
                                            <div class="col-md-6 col-sm-6">
                                            <select name="kode_barang" class="form-control select2" id="kode_barang">
                      <?php

                      foreach ($sembako as $value) {
                echo "<option value='$value->kode_sembako'>$value->nama_sembako</option>";
            }
            ?>
											</select>
                                          </select>
                                        </div>
                                        </div>

										
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">QTY </label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" class='number' name="qty" id="qty" required='required' value="" placeholder=""></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">UoM</label>
                                            <div class="col-md-6 col-sm-6">
                                            <select name="kode_uom" class="form-control select2" id="kode_uom">
                      <?php

                      foreach ($uom as $value) {
                echo "<option value='$value->jenis_uom'>$value->jenis_uom</option>";
            }
            ?>
											</select>
                                        </div>
                                        </div>

            
                                        <div class="ln_solid">

                                        <br> 

                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary">Submit</button>
                                                    <!-- <button type='reset' class="btn btn-success">Reset</button> -->
                                                </div>
                                            </div>
                                        </div>
																				<!-- <?php endforeach;?>									 -->
                                    </form>
                                </div>
                <!-- tes formulir -->
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
