<?php 
	$this->view('include/v_header');
	$this->view('include/v_sideleftprodusen');
	$this->view('include/v_topnav'); 
?>
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Validasi Formulir <?= ucwords($nama_role) ?></h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Lengkapi Formulir <small><?= ucwords($nama_role) ?></small></h2>
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
											<label class="col-form-label col-md-3 col-sm-3  label-align">Kode Partisipan<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="text" name="kode_profil" id="kode_profil" placeholder="" required="required" value="<?= $kode_profil ?>" readonly/>
												<input type="hidden" name="kode_user" id="kode_user" value="<?= $kode_userx ?>">
												<!-- <input class="form-control" type="text" name="kode_profil" id="kode_profil" placeholder="" disabled value="<?= $kode_profil ?>"/> -->
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Nama Kelompok<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="text" name="nama_kelompok" id="nama_kelompok" placeholder="" required="required" value="<?= $nama_kelompok ?>"/>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Nama Gudang<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="text" name="nama_gudang" id="nama_gudang" placeholder="" required="required" value="<?= $nama_gudang ?>"/>
											</div>
										</div>
										<div class="field item form-group">
										<?php $jen=explode(',',$jenis_kepemilikan);?>
											<label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Kepemilikan<span class="required"></span></label>
											<div class="col-md-6 col-sm-6 mt-2">
												<div class="form-check form-check-inline">
													<input name="jenis_kepemilikan" class="form-check-input" type="checkbox" id="bumn" value="bumn" <?= in_array('bumn',$jen)?'checked':'' ?>>
													<label class="form-check-label" for="bumn">BUMN</label>
												</div>
												<div class="form-check form-check-inline">
													<input name="jenis_kepemilikan" class="form-check-input" type="checkbox" id="bumd" value="bumd"  <?= in_array('bumd',$jen)?'checked':'' ?>>
													<label class="form-check-label" for="bumd">BUMD</label>
												</div>
												<div class="form-check form-check-inline">
													<input name="jenis_kepemilikan" class="form-check-input" type="checkbox" id="koperasi" value="koperasi" <?= in_array('koperasi',$jen)?'checked':'' ?>>
													<label class="form-check-label" for="koperasi">Koperasi</label>
												</div>
											</div>
										</div>
										<div class="field item form-group">
										<?php $kat=explode(',',$kategori_perusahaan);?>
											<label class="col-form-label col-md-3 col-sm-3  label-align">Kategori Perusahaan<span class="required"></span></label>
											<div class="col-md-6 col-sm-6 mt-2">
												<div class="form-check form-check-inline">
										<input name="kategori_perusahaan" class="form-check-input" type="checkbox" id="petani" value="petani" <?= in_array('petani',$kat)?'checked':'' ?>>
													<label class="form-check-label" for="petani">Petani</label>
												</div>
												<div class="form-check form-check-inline">
													<input name="kategori_perusahaan" class="form-check-input" type="checkbox" id="peternak" value="peternak" <?= in_array('peternak',$kat)?'checked':'' ?>>
													<label class="form-check-label" for="peternak">Peternak</label>
												</div>
												<div class="form-check form-check-inline">
													<input name="kategori_perusahaan" class="form-check-input" type="checkbox" id="nelayan" value="nelayan" <?= in_array('nelayan',$kat)?'checked':'' ?>>
													<label class="form-check-label" for="nelayan">Nelayan</label>
												</div>
											</div>
										</div>
										<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Komoditas Produksi</label>
                                            <div class="col-md-6 col-sm-6">
											<select name="jenis_komoditas" class="form-control select2" id="jenis_komoditas">
											<?php
												foreach($list_komoditas_produksi as $ln){													
													echo 
													str_replace(
													'value="'.$komoditas_produksi2.'"', 
													'value="'.$komoditas_produksi2.'" selected ', 
													'<option value="'.$ln['kode_komoditas'].'">'.ucwords($ln['jenis_komoditas']).'</option>'
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
													'value="'.$negara2.'"', 
													'value="'.$negara2.'" selected ', 
													'<option value="'.$ln['nama_negara'].'">'.ucwords($ln['nama_negara']).'</option>'
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
													'value="'.$provinsi2.'"', 
													'value="'.$provinsi2.'" selected ', 
													'<option value="'.$lp['nama_provinsi'].'">'.ucwords($lp['nama_provinsi']).'</option>'
													);
												}
											?>	
											</select>
											</div>
                                        </div>
										
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Kota/ Kabupaten</label>
                                            <div class="col-md-6 col-sm-6">
											<select name="kota_kabupaten" class="form-control select2" id="kota_kabupaten">
											<?php
												foreach($list_kota as $lk){
													echo 
													str_replace(
													'value="'.$kota_kabupaten2.'"', 
													'value="'.$kota_kabupaten2.'" selected ', 
													'<option value="'.$lk['nama_kabupatenkota'].'">'.ucwords($lk['nama_kabupatenkota']).'</option>'
													);
												}
											?>	
											</select>
											</div>
                                        </div>

										<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Kecamatan</label>
                                            <div class="col-md-6 col-sm-6">
											<select name="kecamatan" class="form-control select2" id="kecamatan">
											<?php
												foreach($list_kecamatan as $lk){
													echo 
													str_replace(
													'value="'.$kecamatan2.'"', 
													'value="'.$kecamatan2.'" selected ', 
													'<option value="'.$lk['nama_kecamatan'].'">'.ucwords($lk['nama_kecamatan']).'</option>'
													);
												}
											?>	
											</select>
											</div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Kode Pos</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="kodepos" id="kodepos" required="required" type="number" value="<?= $kodepos; ?>" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="alamat" id="alamat" required="required" value="<?= $alamat; ?>" /></div>
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
												<input class="form-control" type="text" name="longitude" id="longitude" placeholder="" required="required" value="<?= $longitude ?>"/>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Latitude<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="text" name="latitude" id="latitude" placeholder="" required="required" value="<?= $latitude ?>"/>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">No Handphone<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="text" name="telepon_perusahaan" id="telepon_perusahaan" placeholder="" required="required" value="<?= $telepon_perusahaan ?>"/>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Email Perusahaan <span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="text" name="email_perusahaan" id="email_perusahaan" placeholder="" required="required" value="<?= $email_perusahaan ?>"/>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">NPWP <span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="text" name="npwp_perusahaan" id="npwp_perusahaan" placeholder="" required="required" value="<?= $npwp_perusahaan ?>"/>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Upload NPWP Perusahaan<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<div class="fileUpload btn btn-success" style="margin-left: 10px;">
													<span class="">Size 500x500 (200Kb) <?= $upload_npwp_perusahaan ?></span>
													<input type="hidden" id="is_upload_npwp_perusahaan" name="is_upload_npwp_perusahaan" value="<?= $upload_npwp_perusahaan ?>">
													<input nama="upload_npwp_perusahaan" class="upload" type="file" id="upload_npwp_perusahaan"/>
												</div>

											</div>
										</div>										
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Nama PIC<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="text" name="nama_pic" id="nama_pic" placeholder="" required="required" value="<?= $nama_pic ?>"/>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Posisi PIC<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="text" name="posisi_pic" id="posisi_pic" placeholder="" required="required" value="<?= $posisi_pic ?>"/>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">HP PIC<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="text" name="hp_pic" id="hp_pic" placeholder="" required="required" value="<?= $hp_pic ?>"/>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Email PIC<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="text" name="email_pic" id="email_pic" placeholder="" required="required" value="<?= $email_pic ?>"/>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">KTP PIC<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="text" name="ktp_pic" id="ktp_pic" placeholder="" required="required" value="<?= $ktp_pic ?>"/>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Upload KTP PIC<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<div class="fileUpload btn btn-success" style="margin-left: 10px;">
													<span class="">Size 500x500 (200Kb) <?= $upload_ktp_pic ?></span>
													<input type="hidden" id="is_upload_ktp_pic" name="is_upload_ktp_pic" value="<?= $upload_ktp_pic ?>">
													<input nama="upload_ktp_pic" class="upload" type="file" id="upload_ktp_pic"/>
												</div>

											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">NPWP PIC<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="text" name="npwp_pic" id="npwp_pic" placeholder="" required="required" value="<?= $npwp_pic ?>"/>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Upload NPWP PIC<span class="required"></span></label>
											<div class="col-md-6 col-sm-6">
												<div class="fileUpload btn btn-success" style="margin-left: 10px;">
													<span class="">Size 500x500 (200Kb) <?= $upload_npwp_pic ?></span>
													<input type="hidden" id="is_upload_npwp_pic" name="is_upload_npwp_pic" value="<?= $upload_npwp_pic ?>">
													<input nama="upload_npwp_pic" class="upload" type="file" id="upload_npwp_pic"/>
												</div>
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
        <!--footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer-->
		
<?php $this->view('include/v_footer'); ?>   
 
 <!-- Javascript functions	-->
	<script>
		var long2= <?= $longitude ?>;
		var lat2 = <?= $latitude ?>;
		var nama = "<?= $nama_gudang ?>";
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

		$(document).ready(function(){	
			$('#frmProfile').submit(function(e) {
				e.preventDefault();
				doUpdate();
			});
			

			$(document).on('click','#btn_update_profile', function(){
				var dt = new FormData();
				var kat_perusahaan=[];
				var jen_kepemilikan=[];
				
				$.each($("input[name='kategori_perusahaan']:checked"), function(){
					kat_perusahaan.push($(this).val());
				});
				
				$.each($("input[name='jenis_kepemilikan']:checked"), function(){
					jen_kepemilikan.push($(this).val());
				});
				
				dt.append('id_profil', $('#id_profil').val());
				dt.append('kode_user', $('#kode_user').val());
				dt.append('kode_profil', $('#kode_profil').val());
				dt.append('nama_kelompok', $('#nama_kelompok').val());
				dt.append('nama_gudang', $('#nama_gudang').val());
				dt.append('jenis_kepemilikan', jen_kepemilikan);
				dt.append('kategori_perusahaan',kat_perusahaan);
				dt.append('komoditas_produksi', $('#jenis_komoditas').val());
				dt.append('negara', $('#negara').val());
				dt.append('provinsi', $('#provinsi').val());
				dt.append('kota_kabupaten', $('#kota_kabupaten').val());
				dt.append('kecamatan', $('#kecamatan').val());
				dt.append('alamat', $('#alamat').val());
				dt.append('kodepos', $('#kodepos').val());
				dt.append('longitude', $('#longitude').val());
				dt.append('latitude', $('#latitude').val());
				dt.append('telepon_perusahaan', $('#telepon_perusahaan').val());
				dt.append('email_perusahaan', $('#email_perusahaan').val());
				dt.append('npwp_perusahaan', $('#npwp_perusahaan').val());
				dt.append('upload_npwp_perusahaan', $('#upload_npwp_perusahaan')[0].files[0]);
				dt.append('nama_pic', $('#nama_pic').val());
				dt.append('posisi_pic', $('#posisi_pic').val());
				dt.append('hp_pic', $('#hp_pic').val());
				dt.append('email_pic', $('#email_pic').val());
				dt.append('ktp_pic', $('#ktp_pic').val());
				dt.append('upload_ktp_pic', $('#upload_ktp_pic')[0].files[0]);
				dt.append('npwp_pic', $('#npwp_pic').val());
				dt.append('upload_npwp_pic', $('#upload_npwp_pic')[0].files[0]);
				dt.append('status', $('#status').val());
				dt.append('is_upload_ktp_pic', $('#is_upload_ktp_pic').val());
				dt.append('is_upload_npwp_perusahaan', $('#is_upload_npwp_perusahaan').val());
				dt.append('is_upload_npwp_pic', $('#is_upload_npwp_pic').val());
				
				$alert = '<div id="login_alert" class="alert" role="alert">\
					<span id="login_msg"></span>\
				</div>';	
				$('#reg_alert_container').html($alert);
							
				$.ajax({
					url: '<?= site_url() ?>C_Profile/simpanProfileUser',
					type: 'POST',
					dataType: 'json',
					contentType: false,
					cache : false,
					processData : false,					
					data: dt,
					success: function(res) {	
						if(res.success){
							location.reload();							
						}else{
							$('#login_alert').attr("class", "alert alert-danger alert-dismissible fade show");
						}	
						$('#login_alert').show();
						$('#login_msg').html(res.result);
					},
					error: function(xhr, res, err) {
						$('#login_alert').attr("class", "alert alert-danger alert-dismissible fade show");
						$('#login_alert').show();
						$('#login_msg').html(err);
					}							
				})
			})
						
		})
		</script>
 