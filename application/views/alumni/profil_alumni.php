<?php 
if($alumni[0]['foto'] != null || $alumni[0]['foto'] != "" ){
	$foto = $alumni[0]['foto'];
}else{
	$foto = "boy.png";
}
 ?>
<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Profil</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.html">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="sample-page.html#!">Profil Alumni</a>
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
						<div class="col-lg-12">
							<div class="cover-profile">
								<div class="profile-bg-img">
									<img class="profile-bg-img img-fluid"
										src="<?php echo base_url(); ?>asset/assets/images/user-profile/bg-img1.jpg"
										alt="bg-img">
									<div class="card-block user-info">
										<div class="col-md-12">
											<div class="media-left">
												<a href="user-profile.html#" class="profile-image">
													<img class="user-img img-radius" width="120" height="120"
														src="<?php echo base_url(); ?>asset/assets/images/<?php echo $foto; ?>"
														alt="user-img">
												</a>
											</div>
											<div class="media-body row">
												<div class="col-lg-12">
													<div class="user-title">
														<h2><?php echo $alumni[0]['nama_alumni']; ?></h2>
														<span
															class="text-white"><?php echo $alumni[0]['pekerjaan']; ?></span>
													</div>
												</div>
												<div>
													<div class="pull-right cover-btn">
														<!-- <button type="button" class="btn btn-primary m-r-10 m-b-10"><i
																class="feather icon-edit"></i> Edit</button> -->
														<button data-toggle="modal" data-target="#modalConfirm" type="button" class="btn btn-danger m-b-10"><i
																class="feather icon-trash"></i> Hapus</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-header-text">Tentang</h5>
									<button id="edit-btn" type="button"
										class="btn btn-sm btn-primary waves-effect waves-light float-right">
										<i class="icofont icofont-edit"></i>
									</button>
								</div>
								<div class="card-block">
									<div class="view-info">
										<div class="row">
											<div class="col-lg-12">
												<div class="general-info">
													<div class="row">
														<div class="col-lg-12 col-xl-6">
															<div class="table-responsive">
																<table class="table m-0">
																	<tbody>
																		<tr>
																			<th scope="row">Nama Lengkap</th>
																			<td><?php echo $alumni[0]['nama_alumni']; ?>
																			</td>
																		</tr>
																		<tr>
																			<th scope="row">NIS</th>
																			<td><?php echo $alumni[0]['nis']; ?></td>
																		</tr>
																		<tr>
																			<th scope="row">NISN</th>
																			<td><?php echo $alumni[0]['nisn']; ?></td>
																		</tr>
																		<tr>
																			<th scope="row">Alamat</th>
																			<td><?php echo $alumni[0]['alamat']; ?></td>
																		</tr>
																		<tr>
																			<th scope="row">Tahun Lulus</th>
																			<td><?php echo $alumni[0]['tahun_lulus']; ?>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
														<!-- end of table col-lg-6 -->
														<div class="col-lg-12 col-xl-6">
															<div class="table-responsive">
																<table class="table">
																	<tbody>
																		<tr>
																			<th scope="row">Email</th>
																			<td><a
																					href="#"><?php echo $alumni[0]['email']; ?></a>
																			</td>
																		</tr>
																		<tr>
																			<th scope="row">No Hape</th>
																			<td><?php echo $alumni[0]['no_hape']; ?>
																			</td>
																		</tr>
																		<tr>
																			<th scope="row">Pekerjaan</th>
																			<td><?php echo $alumni[0]['pekerjaan']; ?>
																			</td>
																		</tr>

																	</tbody>
																</table>
															</div>
														</div>
														<!-- end of table col-lg-6 -->
													</div>
													<!-- end of row -->
												</div>
												<!-- end of general info -->
											</div>
											<!-- end of col-lg-12 -->
										</div>
										<!-- end of row -->
									</div>
									<!-- end of view-info -->
									<div class="edit-info" style="display: none;">
										<div class="row">
											<div class="col-lg-12">
												<div class="general-info form-material">
													<div class="row">
														<div class="col-lg-6 ">



															<div class="material-group">
																<div class="material-addone">
																	<i class="icofont icofont-user"></i>
																</div>
																<div class="form-group form-primary">
																	<input type="text" name="footer-email"
																		class="form-control" required="">
																	<span class="form-bar"></span>
																	<label class="float-label">Full Name</label>
																</div>
															</div>
															<div class="material-group">
																<div class="material-addone">
																	<i class="fa fa-mars-double"></i>
																</div>
																<div class="form-group form-primary">
																	<div class="form-radio">
																		<div class="group-add-on">
																			<div class="radio radiofill radio-inline">
																				<label>
																					<input type="radio" name="radio"
																						checked=""><i
																						class="helper"></i> Male
																				</label>
																			</div>
																			<div class="radio radiofill radio-inline">
																				<label>
																					<input type="radio" name="radio"><i
																						class="helper"></i> Female
																				</label>
																			</div>
																		</div>
																	</div>
																</div>
															</div>


															<div class="material-group">
																<div class="material-addone">
																	<i class="fa fa-birthday-cake"></i>
																</div>
																<div class="form-group form-primary">
																	<input type="text" name="footer-email"
																		class="form-control" required="">
																	<span class="form-bar"></span>
																	<label class="float-label">Select Your Birth
																		Date</label>
																</div>
															</div>


															<div class="material-group">
																<div class="material-addone">
																	<i class="fa fa-heart"></i>
																</div>
																<div class="form-group form-primary">
																	<select id="hello-single" class="form-control">
																		<option value="">---- Marital Status ----
																		</option>
																		<option value="married">Married</option>
																		<option value="unmarried">Unmarried</option>
																	</select>
																	<span class="form-bar"></span>

																</div>
															</div>



															<div class="material-group">
																<div class="material-addone">
																	<i class="icofont icofont-location-pin"></i>
																</div>
																<div class="form-group form-primary">
																	<input type="text" name="footer-email"
																		class="form-control" required="">
																	<span class="form-bar"></span>
																	<label class="float-label">Address</label>
																</div>
															</div>


														</div>
														<!-- end of table col-lg-6 -->
														<div class="col-lg-6">

															<div class="material-group">
																<div class="material-addone">
																	<i class="icofont icofont-mobile-phone"></i>
																</div>
																<div class="form-group form-primary">
																	<input type="text" name="footer-email"
																		class="form-control" required="">
																	<span class="form-bar"></span>
																	<label class="float-label">Mobile Number</label>
																</div>
															</div>


															<div class="material-group">
																<div class="material-addone">
																	<i class="icofont icofont-social-twitter"></i>
																</div>
																<div class="form-group form-primary">
																	<input type="text" name="footer-email"
																		class="form-control" required="">
																	<span class="form-bar"></span>
																	<label class="float-label">Twitter Id</label>
																</div>
															</div>



															<div class="material-group">
																<div class="material-addone">
																	<i class="icofont icofont-social-skype"></i>
																</div>
																<div class="form-group form-primary">
																	<input type="text" name="footer-email"
																		class="form-control" required="">
																	<span class="form-bar"></span>
																	<label class="float-label">Skype Id</label>
																</div>
															</div>




															<div class="material-group">
																<div class="material-addone">
																	<i class="icofont icofont-earth"></i>
																</div>
																<div class="form-group form-primary">
																	<input type="text" name="footer-email"
																		class="form-control" required="">
																	<span class="form-bar"></span>
																	<label class="float-label">website</label>
																</div>
															</div>



														</div>
														<!-- end of table col-lg-6 -->
													</div>
													<!-- end of row -->
													<div class="text-center">
														<a href="user-profile.html#!"
															class="btn btn-primary waves-effect waves-light m-r-20">Save</a>
														<a href="user-profile.html#!" id="edit-cancel"
															class="btn btn-default waves-effect">Cancel</a>
													</div>
												</div>
												<!-- end of edit info -->
											</div>
											<!-- end of col-lg-12 -->
										</div>
										<!-- end of row -->
									</div>
									<!-- end of edit-info -->
								</div>
								<!-- end of card-block -->
							</div>
						</div>
					</div>


					<!-- [ page content ] end -->
					<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-md">
							<div class="modal-content">
								<form id="form_hapus" action="<?php echo base_url(); ?>Alumni/hapusAlumni"
											method="post" enctype="multipart">
								<div class="modal-header">
									<h4 class="modal-title">Hapus Alumni</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="row">
											<div class="col-md-12 text-center">
												<h5>Anda yakin menghapus data ini ?</h5>
												<div class="form-group">
													<input type="hidden" name="id" value="<?php echo $alumni[0]['id_alumni']; ?>" class="form-control">
												</div>
											</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default waves-effect "
										data-dismiss="modal">Batal</button>
									<button type="submit"
										class="btn btn-danger waves-effect waves-light">hapus</button>
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
<!-- [ style Customizer ] start -->
<!-- <div id="styleSelector">
					</div> -->
<!-- [ style Customizer ] end -->
</div>
</div>
</div>
</div>
<script>
	$(document).ready(function(){
		console.log("radyy");

		$("#form_hapus").submit(function (e) {
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