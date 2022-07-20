<script>
	function select_data($id, $nama, $jabatan, $unit, $agt, $mka, $validity) {
		$("#id").val($id);
		$("#nama").val($nama);
		$("#jabatan").val($jabatan);
		$("#unit").val($unit);
		$("#agt").val($agt);
		$("#mka").val($mka);
		$("#validity").val($validity);

	}

	function select_ubah($id, $nama, $jabatan, $unit, $agt, $mka, $validity) {
		$("#id2").val($id);
		$("#nama2").val($nama);
		$("#jabatan2").val($jabatan);
		$("#unit2").val($unit);
		$("#agt2").val($agt);
		$("#mka2").val($mka);
		$("#validity2").val($validity);
	} 

	

	function refresh($id, $nama, $jabatan, $unit, $agt, $mka, $validity) {
		$("#id").val("");
		$("#nama").val("");
		$("#jabatan").val("");
		$("#unit").val("");
		$("#agt").val("");
		$("#mka").val("");
		$("#validity").val("");

	}

</script>
<?php 
	$data =$this->session->flashdata('suksess');
	if ($data!="") { ?>
<div class="alert alert-success" role="alert"><strong>Sukses!!</strong>
	<?php echo $data; ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="close"></button>
	<span aria-hidden="true"></span>
</div>
<?php }
?>
<div class="row">
	<!-- left column -->
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="pull-left">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"
						onclick="refresh()">
						<i class="fa fa-plus-circle"></i> &nbsp;Tambah Data
					</button>
				</div>
				<div class="pull-right">
					<!-- <a href="< ?php echo base_url("index.php/crew/form"); ?>" class="btn btn-success">	 -->
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-import"
						onclick="refresh()">
						<i class="glyphicon glyphicon-floppy-open"></i> &nbsp;Import Data
					<!-- </a> -->
					</button>
					<a href="<?php echo base_url(); ?>assets/file/Format Excel.xlsx"
					class="btn btn-success"><i class="glyphicon glyphicon glyphicon-floppy-save"></i>
					&nbsp; Format Excel</a>
				</div>
			</div>
			<div class="box-body">
				<div class="table table-responsive">
				<table class="table table-bordered table-striped" id="table1" style="width:100%">
						<thead>
							<tr>
								<th style="text-align:center" width="50px">No</th>
								<th style="text-align:center" width="90px">No Pegawai</th>
								<th style="text-align:center" width="120px">Nama Pegawai</th>
								<th style="text-align:center" width="90px">Jabatan</th>
								<th style="text-align:center" width="250px">Unit Pegawai</th>
								<th style="text-align:center" width="120px">Nama Anggota Keluarga</th>
								<th style="text-align:center" width="120px">Tanggal MKA 30 Tahun</th>
								<th style="text-align:center" width="120px">Validity Pengambilan</th>
								<th style="text-align:center" width="150px">Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no =1;
								$datalaporan = $this->db->query("SELECT * FROM crew");
								foreach ($datalaporan->result() as $l) { ?>
							<tr>
								<td style="text-align:center"><?php echo $no++ ?></td>
								<td style="text-align:center"><?php echo $l->id ?></td>
								<td><?php echo $l->nama ?></td>
								<td style="text-align:center"><?php echo $l->jabatan ?></td>
								<td style="text-align:center"><?php echo $l->unit ?></td>
								<td style="text-align:center"><?php echo $l->agt_klrg ?></td>
								<td style="text-align:center"><?php echo $l->tgl_30 ?></td>
								<td style="text-align:center"><?php echo $l->tgl_validity ?></td>
								<td style="text-align:center">
									<a style="cursor: pointer;" onclick="select_ubah(
												'<?php echo $l->id ?>',
												'<?php echo $l->nama ?>',
												'<?php echo $l->jabatan ?>',
												'<?php echo $l->unit ?>',
												'<?php echo $l->agt_klrg ?>',
												'<?php echo $l->tgl_30 ?>',
												'<?php echo $l->tgl_validity ?>'

											)" data-toggle="modal" data-target="#modal-ubah">
										<button class="btn btn-info btn-xs">
											<i class="fa fa-edit"></i>Edit
										</button>
									</a>
									
									<a href="<?php base_url()?>crew/hapus/<?php echo $l->id; ?>"  
									onClick="return confirm('Anda Yakin Ingin Menghapus Data ?')">
										<button class="btn btn-danger btn-xs">
											<i class="fa fa-trash-o"></i>Delete
										</button>
									</a>
								</td>
							</tr>
							<?php }
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-tambah" role="dialog">
	<div class="modal-dialog">
		<form action="<?php echo site_url('crew/simpan') ?>" method="post" accept-charset="utf-8">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal"></button>
					<h4 class="modal-title">Tambah Data</h4>
				</div>

				<div class="modal-body">
					<div class="col-md-12">
						<div class="form-horizontal">
							<div class="box-body">
								<div class="form-group">
									<label for="" class="col-sm-3 control-label">No Pegawai</label>
									<div class="col-sm-4">
										<input type="text" name="id" id="id" class="form-control" value=""
											placeholder="Masukkan No Pegawai" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-3 control-label">Nama Pegawai</label>
									<div class="col-sm-7">
										<input type="text" name="nama" id="nama" class="form-control" value=""
											placeholder="Masukkan Nama Pegawai" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-3 control-label">Jabatan</label>
									<div class="col-sm-5">
										<input type="text" name="jabatan" id="jabatan" class="form-control" value=""
											placeholder="Masukkan Jabatan" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-3 control-label">Unit Pegawai</label>
									<div class="col-sm-5">
										<input type="text" name="unit" id="unit" class="form-control" value=""
											placeholder="Masukkan Unit Pegawai" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-3 control-label">Nama Anggota Keluarga</label>
									<div class="col-sm-5">
										<input type="text" name="agt" id="agt" class="form-control" value=""
											placeholder="Masukkan Anggota Keluarga" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-3 control-label">Tanggal MKA 30Th</label>
									<div class="col-sm-5">
										<input type="date" name="mka" id="mka" class="form-control" value=""
											placeholder="Masukkan Tanggal MKA 30Th" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-3 control-label">Validity</label>
									<div class="col-sm-5">
										<input type="date" name="validity" id="validity" class="form-control" 
										value=""
											placeholder="Masukkan Tanggal Validity" required="" >
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">
						<i class="glyphicon glyphicon-ok"></i> &nbsp; Simpan
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="modal fade" id="modal-ubah" role="dialog">
	<div class="modal-dialog">
		<form action="<?php echo site_url('crew/ubah') ?>" method="post" accept-charset="utf-8">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal"></button>
					<h4 class="modal-title">Ubah Data</h4>
				</div>

				<div class="modal-body">
					<div class="col-md-12">
						<div class="form-horizontal">
							<div class="box-body">
								<div class="form-group">
									<label for="" class="col-sm-3 control-label">No Pegawai</label>
									<div class="col-sm-4">
										<input type="text" name="id" id="id2" class="form-control" value=""
											placeholder="Masukkan No Pegawai" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-3 control-label">Nama Pegawai</label>
									<div class="col-sm-7">
										<input type="text" name="nama" id="nama2" class="form-control" value=""
											placeholder="Masukkan Nama Pegawai" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-3 control-label">Jabatan</label>
									<div class="col-sm-5">
										<input type="text" name="jabatan" id="jabatan2" class="form-control" value=""
											placeholder="Masukkan Jabatan" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-3 control-label">Unit Pegawai</label>
									<div class="col-sm-5">
										<input type="text" name="unit" id="unit2" class="form-control" value=""
											placeholder="Masukkan Unit Pegawai" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-3 control-label">Nama Anggota Keluarga</label>
									<div class="col-sm-5">
										<input type="text" name="agt" id="agt2" class="form-control" value=""
											placeholder="Masukkan Anggota Keluarga" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-3 control-label">Tanggal MKA 30Th</label>
									<div class="col-sm-5">
										<input type="date" name="mka" id="mka2" class="form-control" value=""
											placeholder="Masukkan Tanggal MKA 30Th" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-3 control-label">Validity</label>
									<div class="col-sm-5">
										<input type="date" name="validity" id="validity2" class="form-control" 
										value=""
											placeholder="Masukkan Tanggal Validity" required="" >
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">
						<i class="glyphicon glyphicon-ok"></i> &nbsp; Simpan
					</button>
				</div>
			</div>
		</form>
	</div>
</div>



<div class="modal fade" id="modal-import" role="dialog">
	<div class="modal-dialog">
		<form action="<?php echo site_url('crew/import') ?>" method="post" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal"></button>
					<h4 class="modal-title">Import Data</h4>
				</div>

				<div class="modal-body">
					<div class="col-md-12">
						<div class="input-group form-group">
							<span class="input-group-addon" id="sizing-addon2">
								<i class="fa fa-file-text"></i>
							</span>
							<input type="file" class="form-control" name="file" aria-describedby="sizing-addon2">
						</div>
					</div>
				</div>
				<div class="modal-footer">
				<div class="pull-left"><br>!! Pastikan data yang di Import tidak sama dengan data yang sudah ada
				</div>
					<button type="submit" class="btn btn-primary" value="Import File">
						<i class="glyphicon glyphicon-floppy-open"></i> &nbsp;&nbsp;Import
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
