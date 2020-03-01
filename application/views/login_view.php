<div id='login_form'>
	<form action='<?php echo base_url();?>pages/process' method='post' name='process'>
		<h2>User Login</h2>
		<br />
		<label for='username'>Username</label>
		<input type='text' name='name' id='name' size='25' /><br />

		<label for='password'>Password</label>
		<input type='password' name='password' id='password' size='25' /><br />

		<input type='Submit' value='Login' />
	</form>
</div>
