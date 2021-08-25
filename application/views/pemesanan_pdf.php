<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>PDF</title>

		<style>
			table {
				page-break-inside: avoid !important;
			}
			.invoice-box {
				max-width:100%;
				margin: auto;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}


			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table {
				width: auto;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 10px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 10px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}
			.table-detail{
				padding: 15px;border: 1px solid #d0d0d0;font-size: 10pt;
			}

			.head-detail{
				background: #f7f7f7;
			}
			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="details">
					<td>
						<img src="<?php echo base_url() ?>assets/bgr.png" style="width:30%"/>
					</td>
				</tr>
				<tr style="text-align: center;">
					<td style="padding:0px;">
						<h2>Data Pemesanan</h2>
					</td>
				</tr>
				<tr class="information">
					<td>
						<table>
							<tr>
								<td>
									<b>Dari Tanggal</b>
								</td>
								<td>
									<b>:</b> <?= isset($dari) ? $dari : "-"?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Sampai Tanggal</b>
								</td>

								<td>
									<b>:</b> <?= isset($sampai) ? $sampai : "-"?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr>
					<td>
						<table cellpadding="0" cellspacing="0">
						<tr class="heading">
                            <td>PO ID</td>
                            <td>PO Date</td>
                            <td>Warehouse</td>
                            <td>Commodity</td>
                            <td>Destination</td>
                            <td>Address</td>
                            <td>Status</td>
                        </tr>

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
                        </tr>
							<tr>
								<td colspan="7">
									<table class="table-detail">
									<tr class="head-detail">
										<td>Name</td>
										<td>Commodity</td>
										<td>Fullfillment Date</td>
										<td>Qty</td>
										<td>UoM</td>
									</tr>	
									<?php foreach ($pemesanan_detail as $brt2 =>$valueDetail) {?>
										
											<?php if($valueDetail->buyer_id_fk == $value->buyer_id) { ?>
												<tr>
													<td><?= $valueDetail->nama_komoditi;?></td>
													<td><?= $valueDetail->nama_komoditi;?></td>
													<td><?= $valueDetail->fulfillment_date;?></td>
													<td><?= $valueDetail->qty;?></td>
													<td><?= $valueDetail->UoM;?></td>
												</tr>
											<?php } ?>
										
									<?php } ?>
									</table>
								</td>
							</tr>
                        <?php endforeach;?>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>

