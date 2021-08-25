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
									<h2>Form Add Pre-Order</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<?php if(!isset($buyer)){ ?>
									<form action="<?php echo base_url().'C_Konsumen/insert_po';?>" method="POST">
										<input type="hidden" name="kode_user"
											value="<?php echo isset($userdata[0]["kode_user"])?$userdata[0]["kode_user"]:''; ?>">
										<?php } ?>
										<br>
										<div class="field item form-group required">
											<label class="col-form-label col-md-2 col-sm-3  label-align">PO Date<span
													class="required"></span></label>
											<div class="col-md-6 col-sm-6">

												<input class="form-control" class='po_date' type="date" required="required" name="po_date"
													placeholder="" required='required'
													value="<?php echo !isset($buyer) ? date('Y-m-d') : $buyer[0]['po_date']; ?>" disabled /></div>
										</div>
										<div class="field item form-group required">
											<label class="col-form-label col-md-2 col-sm-3  label-align">PO Type</label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" class='po_type' name="po_type" required="required"
													data-validate-length-range="5,15" type="text"
													value="<?php echo !isset($buyer) ? "PO" : $buyer[0]['po_type']; ?>" disabled /></div>
										</div>
										<div class="field item form-group required">
											<label class="col-form-label col-md-2 col-sm-3  label-align">Province Destination<span
													class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" name="province_dest" class='email' required="required" type="text"
													value="<?php echo isset($userdata[0]["provinsi"]) && !isset($buyer) ?$userdata[0]["provinsi"]: $buyer[0]['province_dest']; ?>"
													disabled /></div>
										</div>
										<div class="field item form-group required">
											<label class="col-form-label col-md-2 col-sm-3  label-align">City Destination</label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" name="city_dest" class='city' required="required" type="text"
													value="<?php echo isset($userdata[0]["kota_kabupaten"]) && !isset($buyer) ?$userdata[0]["kota_kabupaten"]:$buyer[0]['city_dest']; ?>"
													disabled /></div>
										</div>
										<div class="field item form-group required">
											<label class="col-form-label col-md-2 col-sm-3  label-align">Subdistrict Destination</label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" name="sub_dest" class='sub' required="required" type="text"
													value="<?php echo isset($userdata[0]["kecamatan"]) && !isset($buyer) ?$userdata[0]["kecamatan"]:$buyer[0]['sub_dest']; ?>"
													disabled /></div>
										</div>
										<div class="field item form-group required">
											<label class="col-form-label col-md-2 col-sm-3  label-align">Warehouse<span
													class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" name="wh_dest" class='wh' required="required" type="text"
													value="<?php echo isset($userdata[0]["nama_gudang"]) && !isset($buyer) ?$userdata[0]["nama_gudang"]:$buyer[0]['wh_dest']; ?>"
													disabled /></div>
										</div>
										<div class="field item form-group required">
											<label class="col-form-label col-md-2 col-sm-3  label-align">Address Destination</label>
											<div class="col-md-6 col-sm-6">
												<textarea required="required" name='addr_dest' required="required" style="width: 500px;"
													disabled><?php echo isset($userdata[0]["alamat"]) && !isset($buyer) ?$userdata[0]["alamat"]:$buyer[0]['addr_dest']; ?></textarea>
											</div>
										</div>
										<?php if(isset($buyer) && !empty($buyer)){ ?>
										<div class="mt-5">
											<h5 class="card-title">Detail Item <span
													class="badge badge-primary"><?php echo isset($buyer[0]["buyer_id"])?$buyer[0]["buyer_id"]:''; ?></span>
											</h5>
											<div class="ln_solid"></div>
										</div>
										<div class="row">
											<div class="col-md-11">
												<div class="card" style="width: 100%;border:none">
													<div class="card-body">
														<div class="row">
															<?php if($buyer[0]["is_complete"] == 0 || $buyer[0]["is_complete"] == ""){ ?>
															<div class="col align-self-end" style="margin-bottom: 2em;">
																<button type="button" class="btn btn-primary" data-toggle="modal"
																	data-target="#myModal">Add Item</button>
															</div>
															<?php } ?>
														</div>
														<div class="row">
															<div class="col-12">
																<table id="data-item" class="display table" width="100%">
																	<thead>
																		<tr style="text-align: left;">
																			<th>Name</th>
																			<th>Commodity</th>
																			<th>Fullfillment Date</th>
																			<th>Qty</th>
																			<th>UoM</th>
																			<th>Action</th>
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
																			<td>
																				<center>
																					<?php if($buyer[0]["is_complete"] == 0 || $buyer[0]["is_complete"] == ""){ ?>
																					<a href="#" data-toggle="modal"
																						data-target="#myModalEdit<?php echo $value["id"] ?>"
																						class="btn btn-info"><i class="fa fa-pencil"></i></a>
																					<a href="<?php echo site_url('c_konsumen/delete_item?id='.$value["id"].'&buyer='.$value["buyer_id_fk"]) ?>"
																						class="btn btn-danger" onclick="return confirm('Are you sure?')"><i
																							class="fa fa-trash-o"></i></a>
																					<center>
																						<?php } ?>
																			</td>
																		</tr>

																		<!-- Modal Edit -->
																		<div class="modal fade" id="myModalEdit<?php echo $value["id"] ?>" tabindex="-1"
																			role="dialog">
																			<div class="modal-dialog modal-lg" role="document">
																				<div class="modal-content">
																					<div class="modal-header">
																						<h5 class="modal-title">Detail Item</h5>
																						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>

																					<div class="modal-body">
																						<form id="formItem" action="<?php echo base_url().'C_Konsumen/edit_item';?>"
																							method="POST">
																							<div class="field item form-group required">
																								<label
																									class="col-form-label col-md-3 col-sm-3  label-align">Commodity</label>
																								<div class="col-md-6 col-sm-6">
																									<select name="kode_komoditi" class="form-control select-komoditi-edit"
																										id="" required>
																										<option value=""></option>
																										<?php foreach ($komoditi as $brt =>$kom) :?>
																										<?php if($kom["kode_komoditi"] == $value["kode_komoditi"]){ ?>
																										<option value="<?php echo $kom["kode_komoditi"] ?>" selected>
																											<?php echo $kom["nama_komoditi"] ?></option>
																										<?php }else{ ?>
																										<option value="<?php echo $kom["kode_komoditi"] ?>">
																											<?php echo $kom["nama_komoditi"] ?></option>
																										<?php } ?>
																										<?php endforeach;?>
																									</select>
																								</div>
																							</div>
																							<div class="field item form-group required">
																								<label
																									class="col-form-label col-md-3 col-sm-3  label-align">Fullfillment
																									Date<span class="required"></span></label>
																								<div class="col-md-6 col-sm-6">
																									<input class="form-control" name="fullfillment" class='fullfillment'
																										required="required"
																										min="<?php echo date('Y-m-d',strtotime("+3 weeks")); ?>" type="date"
																										value="<?php echo $value["fulfillment_date"] ?>" /></div>
																							</div>
																							<div class="field item form-group required">
																								<label class="col-form-label col-md-3 col-sm-3  label-align">Qty</label>
																								<div class="col-md-6 col-sm-6">
																									<input class="form-control" class='qty' name="qty" required="required"
																										type="number" min="0" value="<?php echo $value["qty"] ?>" /></div>
																							</div>
																							<div class="field item form-group required">
																								<label class="col-form-label col-md-3 col-sm-3  label-align">UoM<span
																										class="required"></span></label>
																								<div class="col-md-6 col-sm-6">
																									<input class="form-control uom-text-edit" required="required"
																										type="text" value="<?php echo $value["UoM"] ?>" disabled />
																									<input class="form-control uom-edit" name="uom" required="required"
																										type="hidden" value="<?php echo $value["UoM"] ?>" />
																									<input class="form-control buyer-edit" name="buyer"
																										required="required" type="hidden"
																										value="<?php echo isset($buyer[0]["buyer_id"])?$buyer[0]["buyer_id"]:''; ?>" />
																								</div>
																								<input class="form-control id-edit" name="id" required="required"
																									type="hidden" value="<?php echo $value["id"] ?>" />
																							</div>
																					</div>
																					<div class="modal-footer mt-10">
																						<button type="submit" class="btn btn-primary">Save</button>
																						<button type="button" class="btn btn-secondary"
																							data-dismiss="modal">Close</button>
																					</div>
									</form>
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
	</div>
	</div>
	<div class="ln_solid"></div>
	<div class="row">
		
		<div class="col-md-2 offset-md-7" style="margin-top:1em">
		<a href="<?= base_url("c_konsumen/konsumen_po"); ?>"><button type='button'
				class="btn btn-secondary btn-block">Exit</button></a>																									
		</div>	
		<div class="col-md-2" style="margin-top:1em">
			<button type='button' data-toggle="modal" data-target="#myModalComplete"
				class="btn btn-success btn-block">Submit</button>
		</div>																								
	</div>
	<?php }else{ ?>
	<div class="field item form-group">
		<label class="col-form-label col-md-2 col-sm-3  label-align"></label>
		<label class="col-md-6 col-sm-6" style="margin-left: 1.5em;"><input type="checkbox" class="form-check-input" id="agree"> I have read and accept that my information is right</label>
	</div>
	<div class="">
		<div class="form-group">
			<div class="col-md-6 offset-md-5">
				<button type='submit' class="btn btn-primary btn-simpan-buyer">Submit</button>
			</div>
		</div>
	</div>
	<?php } ?>
	</form>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Demmand Item Information</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form id="formItem" action="<?php echo base_url().'C_Konsumen/insert_item';?>" method="POST">
						<div class="field item form-group required">
							<label class="col-form-label col-md-3 col-sm-3  label-align">Commodity</label>
							<div class="col-md-6 col-sm-6">
								<select name="kode_komoditi" class="form-control select-komoditi" id="" required>
									<option value=""></option>
									<?php foreach ($komoditi as $brt =>$value) :?>
									<option value="<?php echo $value["kode_komoditi"] ?>"> <?php echo $value["nama_komoditi"] ?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
						<div class="field item form-group required">
							<label class="col-form-label col-md-3 col-sm-3  label-align">Fullfillment Date<span
									class="required"></span></label>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" name="fullfillment" class='fullfillment' required="required"
									min="<?php echo date('Y-m-d',strtotime("+3 weeks")); ?>" type="date" /></div>
						</div>
						<div class="field item form-group required">
							<label class="col-form-label col-md-3 col-sm-3  label-align">Qty</label>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" class='qty' name="qty" required="required" type="number" min="0" /></div>
						</div>
						<div class="field item form-group required">
							<label class="col-form-label col-md-3 col-sm-3  label-align">UoM<span class="required"></span></label>
							<div class="col-md-6 col-sm-6">
								<input class="form-control uom-text" required="required" type="text" disabled />
								<input class="form-control uom" name="uom" required="required" type="hidden" />
								<input class="form-control buyer" name="buyer" required="required" type="hidden"
									value="<?php echo isset($buyer[0]["buyer_id"])?$buyer[0]["buyer_id"]:''; ?>" /></div>
						</div>
				</div>
				<div class="modal-footer mt-10">
					<button type="submit" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="myModalComplete" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Complete Action</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<section class="login_content">
						<form class="form" class="needs-validation" novalidate="" id="login_form">
							<div id="login_alert_container"></div>
							<div>
								<input id="email" name="email" type="text" class="form-control" placeholder="Email"
									<?php if (get_cookie('email') != '') { ?> value="<?php echo get_cookie('email'); ?>" <?php } ?>
									required>
							</div>
							<div>
								<input id="password" name="password" type="password" class="form-control" placeholder="Password"
									<?php if (get_cookie('password') != '') { ?> value="<?php echo get_cookie('password'); ?>" <?php } ?>
									required>
							</div>
              <div>
                <label><input type="checkbox" class="form-check-input" id="agree-complete">Saya menyetujui semua pesanan yang telah dibuat. Dikarenakan data pemesanan tidak bisa diubah kembali.</label>
              </div>
							<div class="modal-footer mt-10">
								<button type="button" onclick="doLogin()" class="btn btn-complete btn-success" disabled>Complete</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</form>
          </section>
				</div>
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
			var komoditi = <?php echo json_encode($komoditi); ?> ;
			$('.select-komoditi').on('change', function () {
				$(".uom-text").val(komoditi[this.value - 1]["UoM"]);
				$(".uom").val(komoditi[this.value - 1]["UoM"]);
			});

			$('.select-komoditi-edit').on('change', function () {
				$(".uom-text-edit").val(komoditi[this.value - 1]["UoM"]);
				$(".uom-edit").val(komoditi[this.value - 1]["UoM"]);
			});

			$(document).ready(function () {
				$('#data-item').DataTable();
				$('.btn-simpan-buyer').attr("disabled", true);
			});

			$('#agree').change(function () {
				if ($(this).is(":checked")) {
					$('.btn-simpan-buyer').attr("disabled", false);
				} else {
					$('.btn-simpan-buyer').attr("disabled", true);
				}
			});

      $('#agree-complete').change(function () {
				if ($(this).is(":checked")) {
					$('.btn-complete').attr("disabled", false);
				} else {
					$('.btn-complete').attr("disabled", true);
				}
			});
      function doLogin() {
				if ($('#email').val().length > 0 && $('#password').val().length > 0) {
					$('#login_alert_container').html(null);
					$alert = '<div id="login_alert" class="alert alert-warning alert-dismissible fade show" role="alert">\
              <span id="login_msg"></span>\
              </div>';

					$('#login_alert_container').html($alert);
					$('#login_alert').show();
					$('#login_msg').html("Please wait, validating login...");
					$('#login_alert').attr("class", "alert alert-primary alert-dismissible fade show");

					$('#submit').attr('disabled', 'disabled');
					$('#submit').css('background-color', 'grey');

					$.ajax({
						url: '<?= site_url() ?>c_auth/submitLogin',
						type: 'POST',
						dataType: 'json',
						data: $('#login_form').serialize(),
						success: function(res) {
							$alert = '<div id="login_alert" class="alert alert-warning alert-dismissible fade show" role="alert">\
                                  <span id="login_msg"></span>\
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                                    <span aria-hidden="true">&times;</span>\
                                  </button>\
                                </div>';

							$('#login_alert_container').html($alert);

							if (res.success) {
								$('#login_alert_container').html();
								$('#login_alert').show();
								$('#login_msg').html("Verifikasi Berhasil");
								$('#login_alert').attr("class", "alert alert-success alert-dismissible fade show");
								var n = 3;
								var timeoutID = window.setInterval(function() {
									n--;
									if (n === 0) {
										// TODO: go ahead and really log the dude out
										//alert(res.role_id);
										window.location.href = '<?php echo site_url('c_konsumen/complete_pemesanan?buyer='.$buyer[0]["buyer_id"]) ?>';
									}
								}, 1000);
							} else {
								$('#login_alert').show();
								$('#login_msg').html(res.result);
								$('#login_alert').attr("class", "alert alert-danger alert-dismissible fade show");

								$('#submit').removeAttr('disabled');
								$('#submit').css('background-color', '');
							}

							$('#unblock_link_alert').click(function() {
								window.location.href = '<?php echo site_url() ?>' + $('#login_form').attr('href');
							});

						},
						error: function(xhr, res, err) {
							$('#submit').removeAttr('disabled');
							$('#submit').css('background-color', '');
							$('#login_alert').show();
							$('#login_msg').html(err);
							$('#login_alert').attr("class", "alert alert-danger alert-dismissible fade show");
						}
					});
				}

			}
			//     var dataSet = [];

			// $(document).ready(function() {
			//     $('#data-item').DataTable( {
			//         data: dataSet,
			//         columnDefs: [ {
			//             "targets": -1,
			//             "data": null,
			//             "defaultContent": "<button type='button' class='btn btn-danger btn-sm'>Delete</button>"
			//         } ],
			//         columns: [
			//             { title: "Commodity" },
			//             { title: "Fullfillment Date" },
			//             { title: "Qty" },
			//             { title: "Price" },
			//             { title: "Action" }
			//         ]
			//     });


			// });

			//   $('#formItem').on('submit', function () {
			//       lengthData = dataSet.length
			//       dataSet.push([
			//         $("input[name=commodity]").val(),
			//         $("input[name=fullfillment]").val(),
			//         $("input[name=qty]").val(),
			//         $("input[name=uom]").val(),
			//         lengthData+1
			//       ])

			//       $("input[name=commodity]").val(""),
			//       $("input[name=fullfillment]").val(""),
			//       $("input[name=qty]").val(""),
			//       $("input[name=uom]").val(""),

			//       $('#myModal').modal('hide');
			//       $('#data-item').DataTable().clear().draw();
			//       $('#data-item').DataTable().rows.add(dataSet).draw();
			//       return false;
			//   });

			//     $('#data-item').on('click', 'button', function () {
			//         var data = $('#data-item').DataTable().row( $(this).parents('tr') ).data();
			//         indexDelete = 0;
			//         for(var i = 0; i < dataSet.length; i++) {
			//           if(dataSet[i][4] == data[4]){
			//             indexDelete = i;
			//             break;
			//           }
			//         }
			//         dataSet.splice(indexDelete, 1);
			//         $('#data-item').DataTable().clear().draw();
			//         $('#data-item').DataTable().rows.add(dataSet).draw();
			//     } );

		</script>
