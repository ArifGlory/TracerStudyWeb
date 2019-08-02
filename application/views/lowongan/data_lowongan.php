<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Lowongan</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.html">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="sample-page.html#!">Data Lowongan</a>
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
									<h5>Data Lowongan</h5>

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
															<th>Foto</th>
															<th>Judul</th>
															<th>Deskripsi</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($lowongan as $val){
															if($val->foto != null || strlen($val->foto) > 0 ){
																$foto = $val->foto;
															}else{
																$foto = "boy.png";
															}
															 ?>
														<tr>
															<td>
																<div class="d-inline-block align-middle">
																	<img src="<?php echo base_url(); ?>foto/lowongan/<?php echo $foto; ?>"
																		alt="user image"
																		class="img-radius img-40 align-top m-r-15">
																</div>
															</td>
															<td>
																<?php echo $val->judul; ?>
															</td>
															<td>
																<?php echo $val->deskripsi; ?>
															</td>
															<td>
																<button class="btn btn-round btn-sm btn-primary">Ubah</button>
																<button class="btn btn-round btn-sm btn-danger">Hapus</button>
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
								<form id="form_simpan" action="<?php echo base_url(); ?>Lowongan/simpanLowongan"
											method="post" enctype="multipart">
								<div class="modal-header">
									<h4 class="modal-title">Tambah Lowongan</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Judul</label>
													<input type="text" name="judul" class="form-control">
												</div>
												<div class="form-group">
													<label for="">Upload foto</label>
													<input type="file" name="foto" class="form-control">
												</div>
												<div class="form-group">
													<label for="">Deskripsi</label>
													<textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
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