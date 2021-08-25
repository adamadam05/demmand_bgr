<?php $this->view('include/v_header'); ?>

<style>
  .form-group.required .col-form-label:after {
    content:"*";
    color:red;
  }
</style>

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
                <h2>Konsumen</h2>
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
                                        <li><a href="<?= base_url("c_konsumen/konsumen_profile"); ?>">Data Profile</a></li>
                                        <!-- <li><a href="index2.html">Dashboard2</a></li>
                                        <li><a href="index3.html">Dashboard3</a></li> -->
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i>Form Pemesanan <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    <li><a href="<?= base_url("c_konsumen/konsumen_po"); ?>">Form Pemesanan</a></li>
                                        <!-- <li><a href="form_advanced.html">Advanced Components</a></li>
                                        <li><a href="form_validation.html">Form Validation</a></li> -->
                                    </ul>
                                </li>
                            </ul>
                        </div>
               </div>
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
                      <img src="<?php echo base_url() ?>production/images/img.jpg" alt="">Konsumen
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
                    <h2>Update Pre Order</h2>
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
                  <?php echo form_open_multipart('C_Konsumen/konsumen_edit_pemesanan/' . $pemesanan['buyer_id']); ?>
                  <br>
                  <div class="field item form-group required">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">PO Date<span class="required"></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" class='po_date' type="date" name="po_date" placeholder="" required='required' value="<?php echo $pemesanan['po_date']?>" ></div>
                      </div>
                      <div class="field item form-group required">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">PO Type</label>
                          <div class="col-md-6 col-sm-6">
                            <input class="form-control" class='type' name="po_type" data-validate-length-range="5,15" type="text" required='required' value="<?php echo $pemesanan['po_type']?>"  /></div>
                          </div>
                      <div class="field item form-group required">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Province Destination<span class="required" ></span></label>
                            <div class="col-md-6 col-sm-6">
                              <input class="form-control" required="required" name='province_dest' style="width: 500px;" required='required' value="<?php echo $pemesanan['province_dest']?>"></input></div>
                            </div>
                      <div class="field item form-group required">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">City Dest</label>
                          <div class="col-md-6 col-sm-6">
                            <input class="form-control" name="city_dest" class='email' required="required" type="text" value="<?php echo $pemesanan['city_dest']?>" /></div>
                          </div>
                        
                        <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">WH Dest<span class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                            <input class="form-control" required="required" name='wh_dest' style="width: 500px;" value="<?php echo $pemesanan['wh_dest']?>"></input></div>
                             </div>
                        <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Do Date</label>
                            <div class="col-md-6 col-sm-6">
                              <input class="form-control" class='do_date' type="date" name="do_date" placeholder="" required='required' value="<?php echo $pemesanan['do_date']?>"></div>
                            </div>
                              </form>
                              <!-- <?php form_close() ?> -->
                            </div>

        <!-- footer content -->
        <footer>
          <div class="pull-right">
          BGR_LOGISTIK <a href="https://www.bgrlogistics.id/id">BUMN</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    <?php $this->view('include/v_footer'); ?>   