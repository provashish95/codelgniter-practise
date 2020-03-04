<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<style>
		.footer {
			position: fixed;
			height: 50px;
			background-color: blue;
			bottom: 0px;
			left: 0px;
			right: 0px;
			margin-bottom: 0px;
		}
		.header{
			height: 150px;
			width: 100%;
			left: 10px;
		}
		.alert-success{
			width: 41%!important;
			margin-left: 30%;
		}
	</style>
</head>
<body>

<div class="container">
	<div class="col-lg-12">
		<div class="header">
			<!--		nav bar-->
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
					</ul>
				</div>
			</nav>
			<!--		nav bar -->
		</div>
		<div class="row">
			<div class="card" style="width: 100%; margin: 20px;">
				<div class="card-body">
					<div class="row">
						<div class="col-md-2">
						</div>
						<div class="col-md-8">

							<div id='login_form'>
								<?php if ($this->session->flashdata('user_success')) { ?>
									<div class="alert alert-success" style="width: 41%!important;"> <?= $this->session->flashdata('user_success') ?> </div>
								<?php } ?>
								<div style="margin-left: 30%;">
								<form action='<?php echo base_url();?>login/login_action' method='post'>
									<h2>User Login</h2>
									<br />
									<div class="form-group">
									<label for='username'>Username:</label>
									<input type='text' name='name'  id='name' size='25' placeholder="Enter Username" required /><br />
									</div>
									<div class="form-group">
									<label for='exampleInputPassword1'>Password :</label>
									<input type='password' name='password' id='password' size='25' placeholder="Enter your password" required /><br />
									</div>
									<input type='Submit' value='Login' />
									<p><a href="<?= base_url('login/create_account') ?>">Create a new account</a></p>
								</form>
								</div>
							</div>


						</div>
						<div class="col-md-2">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<footer>
	<div class="footer">
		<div class="card">
			<div class="card-header">
				Quote
			</div>
		</div>
	</div>
</footer>
</div>
</body>
</html>
