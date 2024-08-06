<body style="
    background: url('../assets/img/admin.jpg');
    background-size: cover;">
	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-md-8 col-md-8 mt-4 ">
				<div class="container">
					<div class="card  my-4 mt-4 p-3" style="background: rgba(255, 255, 255, .2);
            			box-shadow: 0 5px 15px rgba(0, 0, 0, .4);">
						<div class="div">
							<?=$this->session->flashdata('flashhh');?>
						</div>
						<div class="card-body p-0">
							<div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash');?>">
							</div>
							<div class="container col-md-10 p-5">
							<?php if ($this->session->flashdata('pesan')) : ?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										Username/Password Salah!
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											<span class="sr-only">Close</span>
										</button>
									</div>
								<?php endif; ?>
								<div class="text-center">
									<h1 class="h4 text-gray-100 mb-4">Administrator Login</h1>
								</div>
								<form action="<?=base_url('admin_auth/admin_login')?>" method="post">
									<div class="form-group">
										<input type="text" class="form-control form-control-user"  id="username" name="username" placeholder="Username">
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
									</div>
									<button type="submit" class="btn btn-primary btn-user btn-block">
										Login
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>



		</div>

	</div>
