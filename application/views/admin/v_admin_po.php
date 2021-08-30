<?php $this->view('include/v_header'); ?>

<style>
  table{
    border-collapse: collapse;
    border-spacing: 0;
  }
  thead{
    border-collapse: collapse;
    border-spacing: 0;
    background-color: #d0d0d0;
    border: 0px;
  }
  thead tr{
    text-align: center;
    font-weight: bold;
    font-size: 11pt;
  }
  table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
    border: 0px;
  }

  .btn-group, .btn-group-vertical {
    display: none;
  }

  .btn-group, .btn-group-vertical {
    border: 1px color #d0d0d0;
  }

  /* #datatable-buttons_previous a{
    background: white !important;
    border-color: #d0d0d0 !important;
  }
  #datatable-buttons_next a{
    background: white !important;
    border-color: #d0d0d0 !important;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button:active {
      background: none;
      color: black!important;
    } */

</style>

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
                                <li><a><i class="fa fa-user"></i> Profile <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?= base_url("c_profile"); ?>">Data Profile</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-home"></i> Gudang <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?= base_url("c_gudang"); ?>">Data Gudang</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-home"></i> Pemesanan <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    <li><a href="<?= base_url("c_konsumen/konsumen_po"); ?>">Data Pemesanan</a></li>
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
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Pemesanan <small></small></h2>
                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix">
                    </div>
                  </div>              
                  <div class="x_content">
                  <div class="row">
                    <div class="col-12 text-right">
                            <a href="<?= base_url("c_konsumen/delete_konsumen_po")?>" class="btn btn-danger">Delete Data Process</a>   
                    </div>
                    <form action="<?= base_url("c_konsumen/konsumen_po")?>" method="GET">
                      <input class="form-control" name="dari" type="hidden" value="<?= isset($dari) ? $dari : null?>">
                      <input class="form-control" name="sampai" type="hidden" value="<?= isset($sampai) ? $sampai : null?>">
                      <input class="form-control" name="export" type="hidden" value="csv">
                      <button type="submit" class="btn btn-warning">Export CSV</button>    
                    </form>
                    <form action="<?= base_url("c_konsumen/konsumen_po")?>" method="GET">
                      <input class="form-control" name="dari" type="hidden" value="<?= isset($dari) ? $dari : null?>">
                      <input class="form-control" name="sampai" type="hidden" value="<?= isset($sampai) ? $sampai : null?>">
                      <input class="form-control" name="export" type="hidden" value="pdf">
                      <button type="submit" class="btn btn-info">Export PDF</button>    
                    </form>
                    <form action="<?= base_url("c_konsumen/konsumen_po")?>" method="GET">
                      <input class="form-control" name="dari" type="hidden" value="<?= isset($dari) ? $dari : null?>">
                      <input class="form-control" name="sampai" type="hidden" value="<?= isset($sampai) ? $sampai : null?>">
                      <input class="form-control" name="export" type="hidden" value="print">
                      <button type="submit" class="btn btn-secondary">Print PDF</button>    
                    </form>
                  </div>
                  <div class="row">
                  <div class="col-10 text-left">
                      <form action="<?= base_url("c_konsumen/konsumen_po")?>" method="GET">
                        <div class="input-group input-group-sm m-4 btn-cari">
                          <input class="form-control" name="dari" type="date" value="<?= isset($dari) ? $dari : null?>">
                          <div class="input-group-prepend input-group-append" style="margin-left: 1%;margin-right: 1%;height: 100%;">
                            <div class="input-group-text">-</div>
                          </div>
                          <input class="form-control" name="sampai" type="date" value="<?= isset($sampai) ? $sampai : null?>"></input>
                          <button type="submit" class="btn btn-primary btn-sm"  style="margin-left: 1%;">Cari</a>  
                        </div>
                      </form>
                    </div>
                  </div>  
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <td>PO ID</td>
                          <td>PO Date</td>
                          <td>Warehouse</td>
                          <td>Commodity</td>
                          <td>Destination</td>
                          <td>Address</td>
                          <td>Status</td>
                          <td>Action</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($konsumen as $brt=>$value) :?>
                        <tr>
                          <td><?= $value->buyer_id;?></td>
                          <td><?= $value->po_date;?></td>
                          <td><?= $value->wh_dest;?></td>
                          <td><?= $value->count_comodity;?></td>
                          <td><?= $value->province_dest;?></td>
                          <td><?= (strlen($value->addr_dest) > 20 ) ? substr($value->addr_dest,0,20).".." : $value->addr_dest ?></td>
                          <td><center><?php 
                          if($value->is_complete > 0) {
                            echo "<span class='badge badge-success'> Completed </span>";
                          }else{
                            echo "<span class='badge badge-warning'> Processed </span>";
                          }?></center></td>
                          <td><center>
                            <a href="<?php echo site_url('c_konsumen/konsumen_detail_po?buyer='.$value->buyer_id)?>" class="btn btn-info"><i class="fa fa-eye"></i></a> 
                              
                            <center>
                          </td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
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
    <script>
    $(document).ready( function () {
        $('#datatable-buttons').DataTable();
    });
    </script>