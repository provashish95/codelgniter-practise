<div id='login_form'>
	<?php if ($this->session->flashdata('user_success')) { ?>
		<div class="alert alert-success"> <?= $this->session->flashdata('user_success') ?> </div>
	<?php } ?>
	<form action='<?php echo base_url();?>users/login_action' method='post'>
		<h2>User Login</h2>
		<br />
		<label for='username'>Username</label>
		<input type='text' name='name' id='name' size='25' placeholder="Enter Username" required /><br />

		<label for='password'>Password</label>
		<input type='password' name='password' id='password' size='25' placeholder="Enter your password" required /><br />

		<input type='Submit' value='Login' />
	</form>
</div>
