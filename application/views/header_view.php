<html>
<head>
<title>CI-Doctrine Sample</title>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url();?>assets/css/default.css">
</head>
<body>
<div class="header_content">
	<div class="navigation">
	<?php if(!$this->session->userdata('logged_in')) :?>
		<a href="login">Login </a>&nbsp;
		<a href="register">Register </a>
	<?php else:?>
		<a href="logout">Logout </a>&nbsp;
	<?php endif;?>
	</div>
</div>