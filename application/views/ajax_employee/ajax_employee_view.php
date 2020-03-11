<!--Show all employee....-->
<div class="container">
	<h3>Employee Lists</h3>
	<div class="alert alert-success" style="display: none;">
	</div>
	<button id="btnAdd" class="btn btn-success">Add New</button>
	<table class="table table-bordered table-responsive" style="margin-top: 20px;">
		<thead>
		<tr style="text-align: center;">
			<td>ID</td>
			<td>Employee Name</td>
			<td>Address</td>
			<td>Action</td>
		</tr>
		</thead>
		<tbody id="showdata">

		</tbody>
	</table>
</div>
<!--Show all employee....-->
<!--Add modal.........-->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
              <!--form here....-->
				<form id="myForm" action="" method="post" class="form-horizontal">
					<input type="hidden" name="id" value="0">
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Employee Name</label>
						<div class="col-md-8">
							<input type="text" name="name" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="address" class="label-control col-md-4">Address</label>
						<div class="col-md-8">
							<textarea class="form-control" name="address"></textarea>
						</div>
					</div>
				</form>
				<!--form here....-->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" id="btnSave" class="btn btn-primary">Save</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--Add modal.........-->

<script>
	$(document).ready(function() {
		show_all_employee();
		function show_all_employee(){
			$.ajax({
				type  : 'ajax',
				url   : '<?php echo base_url('ajax_employee/show_all_employee')?>',
				dataType : 'json',
				success : function(data){
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
						html += '<tr>'+
							'<td style="text-align: center">'+data[i].id+'</td>'+
							'<td>'+data[i].name+'</td>'+
							'<td>'+data[i].address+'</td>'+
							'<td style="text-align: center">'+
							'<a href="" class="btn btn-info item-edit" data="'+data[i].id+'">Edit</a>'+
							'<a href="" class="btn btn-danger item-delete" data="'+data[i].id+'">Delete</a>'+
							'</td>'+
							'</tr>';
					}
					$('#showdata').html(html);
				}

			});
		}
		//Open modal for add employee......
		$('#btnAdd').click(function(){
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Add New Employee');
		});
		//Open modal for add employee......

		//Add employee.....
		$('#btnSave').on('click',function(){
			var name = $('input[name=name]');
			var address = $('textarea[name=address]');
			$.ajax({
				type : "POST",
				url  : "<?= base_url('ajax_employee/add_employee')?>",
				dataType : "JSON",
				data : {name:name , address:address},
				success: function(data){
					$('[name="name"]').val("");
					$('[name="address"]').val("");
					$('#myModal').modal('hide');
					show_all_employee();
				}
			});
			return false;
		});
		//Add employee.....
	});






	// $(function(){
	// 	show_all_employee();

		//Add New
		//$('#btnAdd').click(function(){
		//	$('#myModal').modal('show');
		//	$('#myModal').find('.modal-title').text('Add New Employee');
		//	$('#myForm').attr('action', '<?php //echo base_url() ?>//ajax_employee/add_employee');
		//});


		// $('#btnSave').click(function(){
		// 	var url = $('#myForm').attr('action');
		// 	var data = $('#myForm').serialize();
		// 	//validate form
		// 	var employeeName = $('input[name=name]');
		// 	var address = $('textarea[name=address]');
		// 	var result = '';
		// 	if(employeeName.val()==''){
		// 		employeeName.parent().parent().addClass('has-error');
		// 	}else{
		// 		employeeName.parent().parent().removeClass('has-error');
		// 		result +='1';
		// 	}
		// 	if(address.val()==''){
		// 		address.parent().parent().addClass('has-error');
		// 	}else{
		// 		address.parent().parent().removeClass('has-error');
		// 		result +='2';
		// 	}

			// if(result=='12'){
			// 	$.ajax({
			// 		type: 'ajax',
			// 		method: 'post',
			// 		url: url,
			// 		data: data,
			// 		async: false,
			// 		dataType: 'json',
			// 		success: function(response){
			// 			if(response.success){
			// 				$('#myModal').modal('hide');
			// 				$('#myForm')[0].reset();
			// 				if(response.type=='add'){
			// 					var type = 'added'
			// 				}else if(response.type=='update'){
			// 					var type ="updated"
			// 				}
			// 				$('.alert-success').html('Employee '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');
			// 				show_all_employee();
			// 			}else{
			// 				alert('Not updated!');
			// 			}
			// 		},
		// 			error: function(){
		// 				alert('Could not add data');
		// 			}
		// 		});
		// 	}
		// });

		//edit//edit/
		//$('#showdata').on('click', '.item-edit', function(){
		//	var id = $(this).attr('data');
		//	$('#myModal').modal('show');
		//	$('#myModal').find('.modal-title').text('Edit Employee');
		//	$('#myForm').attr('action', '<?php //echo base_url() ?>//ajax_employee/update_employee');
		//	$.ajax({
		//		type: 'ajax',
		//		method: 'get',
		//		url: '<?php //echo base_url() ?>//ajax_employee/edit_employee',
		//		data: {id: id},
		//		async: false,
		//		dataType: 'json',
		//		success: function(data){
		//			$('input[name=name]').val(data.name);
		//			$('textarea[name=address]').val(data.address);
		//			$('input[name=id]').val(data.id);
		//		},
		//		error: function(){
		//			alert('Could not Edit Data');
		//		}
		//	});
		//});
		//edit

		//delete-employee...
		//$('#showdata').on('click', '.item-delete', function(){
		//	var id = $(this).attr('data');
		//	$('#deleteModal').modal('show');
		//	//prevent previous handler - unbind()
		//	$('#btnDelete').unbind().click(function(){
		//		$.ajax({
		//			type: 'ajax',
		//			method: 'get',
		//			async: false,
		//			url: '<?php //echo base_url() ?>//ajax_employee/delete_employee',
		//			data:{id:id},
		//			dataType: 'json',
		//			success: function(response){
		//				if(response.success){
		//					$('#deleteModal').modal('hide');
		//					$('.alert-success').html('Employee Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
		//					show_all_employee();
		//				}else{
		//					alert('Error');
		//				}
		//			},
		//			error: function(){
		//				alert('Error deleting');
		//			}
		//		});
		//	});
		//});
//delete-employee....

		//function..//function

	// });
	//function//function//
</script>
