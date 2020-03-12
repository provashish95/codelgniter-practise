
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Products</title>
	<meta charset="utf-8">
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/jquery-3.4.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="header">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="<?= base_url('employee')  ?>">Home</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<a class="navbar-brand" href="<?= base_url('product/product_create') ?>">Add Product</a>
					</ul>

					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>
				</div>
			</nav>
		</div>
	</div>
<!--		header..-->
		<div class="container">
			<div class="row">
				<div class="card" style="width: 100%; margin: 20px;">
					<div class="row">
							<div class="col-md-2">
							</div>
						<div class="col-md-8">

							<table class="table" id="mydata">
								<h6 style="margin-left: 40%;">Product Table</h6>
								<thead>
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Name</th>
									<th scope="col">price</th>
									<th scope="col">Description</th>
									<th scope="col">Tag</th>
									<th scope="col">Action</th>
								</tr>
								</thead>
								<tbody id="show_products">
								<?php
								$i = 1;
								foreach($products as $product) {  ?>
									<tr>
										<th scope="row"><?php echo $product->id ;?></th>
										<td><?php echo $product->name ;?></td>
										<td><?php echo $product->price ;?></td>
										<td><?php echo $product->description ;?></td>
										<td><?php echo $product->tag ;?></td>
										<td><button class="btn-up" value="<?= $product->id ?>" type="submit" id="product_button" >Edit</button></td>
										<td><button class="btn-del" value="<?= $product->id ?>" type="submit" id="product_delete" >Delete</button></td>
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


		<!-- edit product...-->
	   <form action="" method="post">
            <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			   <input type="hidden"  id="id">
	              <div class="modal-dialog modal-lg" role="document">
		                <div class="modal-content">
			                  <div class="modal-header">
				                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
				                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                      <span aria-hidden="true">&times;</span>
					                    </button>
				                  </div>
				                  <div class="modal-body">
									 <div class="form-group">
										<label for="exampleInputEmail1">Product Name</label>
										<input type="text" class="form-control" name="name" id="name" >
									</div>
						             <div class="form-group">
										<label for="exampleInputEmail1">Product Price</label>
										<input type="number" class="form-control"  id="price" >
									 </div>
									     <div class="form-group">
										   <label for="exampleInputEmail1">Description</label>
										   <input type="text" class="form-control"  id="description" >
									   </div>
								     <div class="form-group">
									   <label for="exampleInputEmail1">Tag</label>
									   <input type="text" class="form-control"  id="tag" >
									 </div>
			                    </div>
		                  <div class="modal-footer">
			                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
			              </div>
	                </div>
              </div>
            </div>
       </form>
<!--	Edit modal...-->
<!--	delete_modal-->
	 <form action="" method="post">
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
	                  <div class="modal-header">
		                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
		                  </div>
	                  <div class="modal-body">
		                       <strong>Are you sure to delete this Product?</strong>
		                  </div>
	                  <div class="modal-footer">
		                    <input type="hidden" id="id" class="form-control">
		                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
		              </div>
	                </div>
              </div>
            </div>
         </form>
<!--	delete_modal-->
<!--footer-->
<footer>
	<div class="footer">
		<div class="card">
			<div class="card-header" style="margin-left: 85%;">
				<a  href="<?= base_url('login/user_logout') ?>">Log Out</a>
			</div>
		</div>
	</div>
</footer>
	<script type="text/javascript">

            //View product by ID....
			$('.btn-up').on('click', function () {
				var id = $(this).val();
				$.ajax({
					type    : 'ajax',
					method  : 'GET',
					url     : '<?= base_url() ?>product/view_update_product',
					data    : {id: id},
					dataType: 'json',
					success: function(response){
						$('#name')       .val(response.name);
						$('#price')      .val(response.price);
						$('#description').val(response.description);
						$('#tag')        .val(response.tag);
						$('#id')         .val(response.id);
						$("#modalEdit").modal('show');
					},
				});
				//View product by ID....

               // Update product.....
				$("#btn_update").on('click', function (){
					var id          = $('#id').val();
					var name        = $('#name').val();
					var price       = $('#price').val();
					var description = $('#description').val();
					var tag         = $('#tag').val();
					$.ajax({
						type : "POST",
						url  : "<?= base_url('product/update') ?>",
						dataType : "JSON",
						data : {id:id,name:name , price:price, description:description, tag:tag},
						success: function(data){
							$('[name="name"]')       .val("");
							$('[name="price"]')      .val("");
							$('[name="description"]').val("");
							$('[name="tag"]')        .val("");
							$('#modalEdit').modal('hide');
							  alert("Product updated successfully");
						}
					});
				});
				    // Update product.....
			});

             //get data for delete...
			$('.btn-del').on('click', function (){
				var id = $(this).val();
				$('#Modal_Delete').modal('show');
				$('#id').val(id);

			});
			//get data for delete....

              //delete to database.....
				$('#btn_delete').on('click', function (){
					var id = $('#id').val();
					$.ajax({
						type : "POST",
						url  : "<?= base_url('product/delete') ?>",
						dataType : "JSON",
						data :{id:id},
						success: function(response){
							$('#id').val(response.id);
							$('#Modal_Delete').modal('hide');
							alert("Product deleted successfully");
						}
					});
				});
			   //delete to database.....

		      //Add Data........
			$('#btn_delete').on('click', function (){

			});





</script>
</body>
</html>

