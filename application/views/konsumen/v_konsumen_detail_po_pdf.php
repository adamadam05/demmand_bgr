<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>PDF</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
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
						<h2>Demmand Information</h2>
					</td>
				</tr>
				<tr>
					<td style="text-align: center; font-size:12pt;"><?php echo $buyer[0]['buyer_id']; ?><br /><br></td>
				</tr>
				<tr class="information">
					<td>
						<table>
							<tr>
								<td>
									<b>PO Date</b>
								</td>
								<td>
									<b>:</b> <?php echo $buyer[0]['po_date']; ?>
								</td>
							</tr>
							<tr>
								<td>
									<b>PO Type</b>
								</td>

								<td>
									<b>:</b> <?php echo $buyer[0]['po_type']; ?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Warehouse</b>
								</td>

								<td>
									<b>:</b> <?php echo $buyer[0]['wh_dest']; ?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Province Destination</b>
								</td>

								<td>
									<b>:</b> <?php echo $buyer[0]['province_dest']; ?>
								</td>
							</tr>
							<tr>
								<td>
									<b>City Destination</b>
								</td>

								<td>
									<b>:</b> <?php echo $buyer[0]['city_dest']; ?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Subdistrict Destination</b>
								</td>

								<td>
									<b>:</b> <?php echo $buyer[0]['sub_dest']; ?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Address Destination</b>
								</td>

								<td>
									<b>:</b> <?php echo $buyer[0]['addr_dest']; ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="details">
					<td>
						<h4>Detail Item</h4>
						<hr>
					</td>
				</tr>
				<tr>
					<td>
						<table cellpadding="0" cellspacing="0">
						<tr class="heading">
							<td>Name</td>
							<td>Commodity</td>
							<td>Fullfillment Date</td>
							<td>Qty</td>
							<td>UoM</td>
						</tr>

						<?php foreach ($buyer["item"] as $brt =>$value) :?>
							<tr class="item">
								<td><?= $value["nama_komoditi"];?></td>
								<td><?= $value["nama_komoditi"];?></td>
								<td><?= $value["fulfillment_date"];?></td>
								<td><?= $value["qty"];?></td>
								<td><?= $value["UoM"];?></td>
							</tr>
						<?php endforeach;?>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>

