<?php $this->load->view('includes/header'); ?>

<div id="login_form">

	<h1>Login, Fool!</h1>
	<?php
	echo form_open('login/validate_credentials');
	echo form_input('username', '');
	echo form_password('password', '');
	echo form_submit('submit', 'Login');
	echo anchor('login/signup', 'Create Account');
	echo form_close();

	print_r($this->input->post());
	?>

</div><!-- end login_form-->

<?php $this->load->view('includes/tut_info'); ?>

<?php $this->load->view('includes/footer'); ?>
