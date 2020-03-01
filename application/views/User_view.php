
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
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
	</style>
</head>
<body>

<div class="container">
	<div class="col-lg-12">
		<div class="header">
			<!--		nav bar-->
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="#">Home</a>
				<a class="navbar-brand" href="<?php echo base_url('pages');  ?>">Show Users</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<a class="navbar-brand" href="<?php echo base_url('pages/create_user');?>">Add Users</a>
						<a class="navbar-brand" href="#">Product</a>
					</ul>
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>
				</div>
			</nav>
			<!--		nav bar -->
		</div>
		<div class="row">
			<div class="card" style="width: 100%; margin: 20px;">
					<div class="row">
						<div class="col-md-2">
						</div>
						<div class="col-md-8">
							<?php if ($this->session->flashdata('user_success')) { ?>
								<div class="alert alert-success"> <?= $this->session->flashdata('user_success') ?> </div>
							<?php } ?>

							<table class="table">
								<thead>
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Name</th>
									<th scope="col">Email</th>
									<th scope="col">Password</th>
									<th scope="col">Action</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$i = 1;
								foreach($users as $row) {  ?>
								<tr>
									<th scope="row"><?php echo $row->id ;?></th>
									<td><?php echo $row->name ;?></td>
									<td><?php echo $row->email ;?></td>
									<td><?php echo $row->password ;?></td>
									<td><a href="<?php echo base_url('pages/delete_data/'.$row->id) ;?>">Delete</a></td>
									<td><a href='<?php echo base_url('pages/update_data/'.$row->id) ;?>'>Update</a></td>
								</tr>
								<?php }?>
								</tbody>
							</table>


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
