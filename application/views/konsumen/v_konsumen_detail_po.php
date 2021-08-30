<?php $this->view('include/v_header'); ?>

<style>
	.form-group.required .col-form-label:after {
		content: "*";
		color: red;
	}

	.label-align {
		text-align: left;
	}

table{
    border-collapse: collapse;
    border-spacing: 0;
  }
  thead{
    border-collapse: collapse;
    border-spacing: 0;
    background-color: #d0d0d0;
    border: 0px;
	color:black;
  }
  thead tr{
    text-align: center;
    font-weight: bold;
    font-size: 11pt;
  }
  table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
    border: 0px;
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
										<li><a href="<?= base_url("C_profile"); ?>">Data Profile</a></li>
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
								<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
									data-toggle="dropdown" aria-expanded="false">
									<img src="<?php echo base_url() ?>production/images/img.jpg" alt="">Konsumen
								</a>
								<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="<?= base_url("c_produsen/produsen_profile"); ?>"> Profile</a>
									<a class="dropdown-item" href=""><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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
									<?php echo validation_errors();?>
									<h2>Detail Pre-Order <span class="badge badge-primary" style="color:white"><?php echo isset($buyer[0]["buyer_id"])?$buyer[0]["buyer_id"]:''; ?></span></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
										<div class="row">
											<div class="col-sm-12 col-md-11 text-center row-pdf">
												<a href="<?php echo site_url('c_konsumen/export_po?buyer='.$buyer[0]["buyer_id"])?>" target="_blank" class="btn btn-danger btn-sm btn-pdf"><i class="fa fa-file"></i> Download PO </a>
											</div>
										</div>
										<br>
										<div class="field item form-group required">
											<label class="col-form-label col-md-2 col-sm-3  label-align">PO Date<span
													class="required"></span></label>
											<div class="col-md-6 col-sm-6">

												<input class="form-control" class='po_date' type="date" required="required" name="po_date"
													placeholder="" required='required'
													value="<?php echo $buyer[0]['po_date']; ?>" disabled /></div>
										</div>
										<div class="field item form-group required">
											<label class="col-form-label col-md-2 col-sm-3  label-align">PO Type</label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" class='po_type' name="po_type" required="required"
													data-validate-length-range="5,15" type="text"
													value="<?php echo $buyer[0]['po_type']; ?>" disabled /></div>
										</div>
										<div class="field item form-group required">
											<label class="col-form-label col-md-2 col-sm-3  label-align">Province Destination<span
													class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" name="province_dest" class='email' required="required" type="text"
													value="<?php echo $buyer[0]['province_dest']; ?>"
													disabled /></div>
										</div>
										<div class="field item form-group required">
											<label class="col-form-label col-md-2 col-sm-3  label-align">City Destination</label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" name="city_dest" class='city' required="required" type="text"
													value="<?php echo $buyer[0]['city_dest']; ?>"
													disabled /></div>
										</div>
										<div class="field item form-group required">
											<label class="col-form-label col-md-2 col-sm-3  label-align">Subdistrict Destination</label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" name="sub_dest" class='sub' required="required" type="text"
													value="<?php echo $buyer[0]['sub_dest']; ?>"
													disabled /></div>
										</div>
										<div class="field item form-group required">
											<label class="col-form-label col-md-2 col-sm-3  label-align">Warehouse<span
													class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" name="wh_dest" class='wh' required="required" type="text"
													value="<?php echo $buyer[0]['wh_dest']; ?>"
													disabled /></div>
										</div>
										<div class="field item form-group required">
											<label class="col-form-label col-md-2 col-sm-3  label-align">Address Destination</label>
											<div class="col-md-6 col-sm-6">
												<textarea required="required" name='addr_dest' required="required" class="adress-input"
													disabled><?php echo $buyer[0]['addr_dest']; ?></textarea>
											</div>
										</div>
										<div class="mt-5">
											<h5 class="card-title">Detail Item
											</h5>
											<div class="ln_solid"></div>
										</div>
										<div class="row">
											<div class="col-md-11">
												<div class="card" style="width:100%;border:none;">
													<div class="card-body">
														<div class="col-12">
															<div class="card-box table-responsive">
																<table id="datatable-buttons" class="table table-bordered" width="100%">
																	<thead>
																		<tr style="text-align: left;">
																			<th>Name</th>
																			<th>Commodity</th>
																			<th>Fullfillment Date</th>
																			<th>Qty</th>
																			<th>UoM</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php foreach ($buyer["item"] as $brt =>$value) :?>
																		<tr>
																			<td><?= $value["nama_komoditi"];?></td>
																			<td><?= $value["nama_komoditi"];?></td>
																			<td><?= $value["fulfillment_date"];?></td>
																			<td><?= $value["qty"];?></td>
																			<td><?= $value["UoM"];?></td>
																		</tr>

								</div>
							</div>
						</div>
						<?php endforeach;?>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 offset-md-3" style="margin-top:1em">
		<?php if($buyer[0]["is_complete"] == 0 || $buyer[0]["is_complete"] == ""){ ?>
			<a href="<?php echo site_url('c_konsumen/konsumen_insert_po?buyer='.$buyer[0]["buyer_id"])?>" class="btn btn-info btn-lg btn-block btn-edit"><i class="fa fa-pencil"></i> Edit </a>
		<?php } ?>
	</div>
	</div>
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
		<script>
			$(document).ready(function () {
				$('#data-item').DataTable();
			});
		</script>
