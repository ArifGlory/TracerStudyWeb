<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Alumni</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.html">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="sample-page.html#!">Data Alumni</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- [ breadcrumb ] end -->
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-body">
					<!-- [ page content ] start -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h5>Data Alumni</h5>

									<div class="card-header-right">
										<button data-toggle="modal" data-target="#modalAdd"
											class="btn btn-primary btn-out-dashed btn-sm">New</button>
									</div>
								</div>
								<div class="card-block">
									<div class="table-responsive">
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<table id="table_alumni" class="table table-hover">
													<thead>
														<tr role="row">
															<th>Nama</th>
															<th>NIS</th>
															<th>Alamat</th>
															<th>Tahun Lulus</th>
															<th>Pekerjaan</th>
															<th>Jurusan</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($alumni as $val){
															if($val->foto != null || strlen($val->foto) > 0 ){
																$foto = $val->foto;
															}else{
																$foto = "boy.png";
															}
															 ?>
														<tr>
															<td>
																<div class="d-inline-block align-middle">
																	<img src="<?php echo base_url(); ?>asset/assets/images/<?php echo $foto; ?>"
																		alt="user image"
																		class="img-radius img-40 align-top m-r-15">
																	<div class="d-inline-block">
																		<h6><?php echo $val->nama_alumni; ?></h6>
																	</div>
																</div>
															</td>
															<td>
																<?php echo $val->nis; ?>
															</td>
															<td>
																<?php echo $val->alamat; ?>
															</td>
															<td>
																<?php echo $val->tahun_lulus; ?>
															</td>
															<td>
																<?php echo $val->pekerjaan; ?>
															</td>
															<td>
																<?php echo $val->nama_jurusan; ?>
															</td>
															<td>
																<a href="<?php echo base_url(); ?>Alumni/profil/<?php echo $val->id_alumni; ?>"
																	class="btn btn-round btn-sm btn-primary">Detail</a>
															</td>
														</tr>
														<?php }?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- [ page content ] end -->
					<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<form id="form_simpan" action="<?php echo base_url(); ?>Alumni/simpanAlumni"
											method="post" enctype="multipart">
								<div class="modal-header">
									<h4 class="modal-title">Tambah Alumni</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="">NIS</label>
													<input type="text" name="nis" class="form-control">
												</div>
												<div class="form-group">
													<label for="">Nama Alumni</label>
													<input type="text" name="nama" class="form-control">
												</div>
												<div class="form-group">
													<label for="">Tahun Lulus</label>
													<input type="text" name="thn_lulus" class="form-control">
												</div>
												<div class="form-group">
													<label for="">No Handphone</label>
													<input type="text" name="nope" class="form-control">
												</div>
												<div class="form-group">
													<label for="">Email</label>
													<input type="text" name="email" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">NISN</label>
													<input type="text" name="nisn" class="form-control">
												</div>
												<div class="form-group">
													<label for="">Jurusan</label>
													<select class="form-control" name="jurusan" id="jurusan">
														<?php foreach($jurusan as $val){ ?>
														<option value="<?php echo $val->id_jurusan; ?>">
															<?php echo $val->nama_jurusan; ?></option>
														<?php } ?>

													</select>
												</div>
												<div class="form-group">
													<label for="">Pekerjaan</label>
													<input type="text" name="pekerjaan" class="form-control">
												</div>
												<div class="form-group">
													<label for="">Password Sementara</label>
													<input type="password" name="pass" class="form-control">
												</div>
												<div class="form-group">
													<label for="">Alamat</label>
													<textarea class="form-control" name="alamat" id="alamat"></textarea>
												</div>
											</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default waves-effect "
										data-dismiss="modal">Batal</button>
									<button type="submit"
										class="btn btn-primary waves-effect waves-light">Simpan</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>
</div>
</div>
</div>
</div>


<script type="text/javascript">
	$(document).ready(function () {
		var myTable = $("#table_alumni").DataTable();

		$("#form_simpan").submit(function (e) {
    		e.preventDefault();
    		var form = $(this);
    		var btnHtml = form.find("[type='submit']").html();
    		var url = form.attr("action");
    		var data = new FormData(this);
            
            console.log("diklik");
    		$.ajax({
                
    			beforeSend: function () {
    				form.find("[type='submit']").addClass("disabled").html("Loading ... ");
    			},
    			cache: false,
    			processData: false,
    			contentType: false,
    			type: "POST",
    			url: url,
    			data: data,
    			dataType: 'JSON',
    			success: function (response) {
    				form.find("[type='submit']").removeClass("disabled").html(btnHtml);
    				if (response.status == "success") {
    					swal("Berhasil", response.message, "success");
    					console.log(response);
    					setTimeout(function () {
    						swal.close();
    						window.location.replace(response.redirect);
    					}, 1000);

    				} else {
    					swal("Gagal", response.message, "error");
    				}
    			}

    		});

    	});
	});
</script>