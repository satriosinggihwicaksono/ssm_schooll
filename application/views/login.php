
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login SSM TBID</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=base_url()?>components/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>components/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>components/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>components/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>components/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>components/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>components/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>components/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>components/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>components/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>components/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form action="<?=site_url('Auth/post_login')?>" class="login100-form validate-form flex-sb flex-w" method="post">
					<span class="login100-form-title p-b-5">
						<?=$konfigurasi['data']['name'] ?>
					</span>
					<span class="login100-form-title p-b-30" style="font-size:15px;">
						<?=$konfigurasi['data']['subname'] ?>
					</span>
					<div style="display: block; width:100%;">
						<div style="text-align:center;">
							<img src="<?=base_url().'assets/img/unlock.png'?>" width="100px;"/>
						</div>
					</div>
					<div style="margin-top:5px; text-align:center;">
					<?php echo $this->session->flashdata('pesan'); ?>
					</div>
					<span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username harus diisi">
						<input class="input100 holderpunya" type="text" name="username" placeholder="USERNAME" style="font-weight: bold; color: #505961;">
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password harus diisi">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100 holderpunya" type="password" name="pass" placeholder="PASSWORD" style="font-weight: bold;">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="login" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
				<div style="margin-top:20px;">
					<span class="login100-form-title" style="font-size:13px; text-align:center;">@2018 EXPOS SOFTWARE SMART SCHOOL MANAGER</span>
				<div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?=base_url()?>components/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>components/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>components/logi/nvendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url()?>components/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>components/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>components/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=base_url()?>components/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>components/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>components/login/js/main.js"></script>

</body>
</html>
