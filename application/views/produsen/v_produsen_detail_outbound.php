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
       <!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <!-- <button type="button" class="btn btn-primary">Tambah Data Inbound</button> -->
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Outbond <small></small></h2>
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
                                    <form class="" action="" method="POST" novalidate>
                                      
                                      <br>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">NO GI<span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
																						<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="no_gr" placeholder="<?= $outbound->no_gi; ?>" required="required" />
                                            </div>
                                        </div>
																				
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">No DO</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='No_do' name="no_do" data-validate-length-range="5,15" type="text" placeholder="<?= $outbound->no_do; ?>" /></a></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal DO</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="do_date" class='date' required="requered" type="date=yyyy/mm/dd" placeholder="<?= $outbound->do_date; ?>" /></div>
                                        </div>
                                       
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">DO Type<span class="required"></span></label>
																				<div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="do_type" class='Do Type' required="required" placeholder="<?= $outbound->do_type; ?>" type="text" /></div>
                                        </div>

                                        <!-- <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ID Supplier<span class="required"></span></label>
																				<div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="supplier_id" class='message' required="required" placeholder="<?= $outbound->supplier_id; ?>" type="text" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Negara</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="Negara" class='Negara' required="required" placeholder="<?= $outbound->country_dest; ?>" type="text" /></div>
                                        </div> -->

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Provinsi</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="Provinsi" class='Provinsi' required="required" placeholder="<?= $outbound->province_dest; ?>" type="text" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Kota/Kabupaten</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="Kota/Kabupaten" class='Kota/Kabupaten' required="required" placeholder="<?= $outbound->city_dest; ?>" type="text" /></div>
                                        </div>

                                        <!-- <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat</label>
																				<div class="col-md-6 col-sm-6">
                                                <textarea class="form-control" name="alamat" required="required" placeholder="<?= $outbound->wh_dest; ?>" style="width: 500px;"></textarea></div>
                                        </div> -->
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ETD<span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date=yyyy/mm/dd" name="date" placeholder="<?= $outbound->etd; ?>" required='required'></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ETA<span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date=yyyy/mm/dd" name="date" placeholder="<?= $outbound->eta; ?>" required='required'></div>
                                        </div>


                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">

                                                <br>

                                                    <button type='submit' class="btn btn-primary">Submit</button>
                                                    <button type='reset' class="btn btn-success">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                <!-- tes formulir -->

                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                            <br>
                            <br>
                            <h2>Detail Produk <small></small></h2>
                            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                        
                          <th>No</th>
                          <th>No GR</th>
                          <th>Kode Barang</th>
                          <th>Kode UoM</th>
                          <th>Qty</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php foreach ($produk as $brt=>$value) :?>

                        <tr>

                         <td><?= $value->kode_penyambung_produk_inbound;?></td>
                         <td><?= $value->no_gr;?></td>
												 <td><?= $value->kode_barang;?></td>
												 <td><?= $value->kode_uom;?></td>
                         <td><?= $value->qty;?></td>
                          <td><center>
                            <a href="<?= base_url("c_produsen/produsen_edit_produk"); ?>" class="btn btn-info"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="#" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </a>
                            </center></td>

                        </tr>
                        <?php endforeach;?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="ln_solid">
                <div class="form-group">
                 <div class="col-md-6 offset-md-3">
                    <!-- <center><button type='submit' class="btn btn-primary">Tambah Data Produk</button></center> -->
                    <center> <a href="<?= base_url("c_produsen/produsen_insert_produk"); ?>" class="btn btn-info"><i class="fa fa-pencil"></i> Tambah Data Produk </a></center>
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
      

    <?php $this->view('include/v_footer'); ?>   
