<!DOCTYPE html>
<html ng-app>

  <head>
<base href="<?= base_url() ?>"  />
    <meta charset="utf-8">
    <title><?= $title ?> - Base Admin</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="public/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="public/css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="public/css/base-admin.css" rel="stylesheet" type="text/css">
<link href="public/css/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="public/">
				Sydney Writers Room				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
					<li class="">						
						<a href="<?= $menuUrl ?>" class="">
							<?= $menuItem ?>
						</a>
						
					</li>
					
					<li class="">						
						<a href="<?= base_url() ?>" class="">
							<i class="icon-chevron-left"></i>
							Back to Homepage
						</a>
						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container register">
	
	<div class="content clearfix">
		

		
			<h1>Create Your Account</h1>			
			
		<!--	<div class="login-social">
				<p>Sign in using social network:</p>
				
				<div class="twitter">
					<a href="#" class="btn_1">Login with Twitter</a>				
				</div>
				
				<div class="fb">
					<a href="#" class="btn_2">Login with Facebook</a>				
				</div>
			</div> -->
			
			<?php // Change the css classes to suit your needs    
			
			$attributes = array( 'class' => '', 'id' => '');
			echo form_open('signup', $attributes); ?>
			
			<div class="login-fields">
				
				<p>Create your free account:</p>

				<div class="field">
				        <label for="name">Name <span class="required">*</span></label>
				      
				        <input id="name" class="login" placeholder="Name" type="text" name="name" maxlength="100" value="<?php echo set_value('name'); ?>"  />
				          <?php echo form_error('name', '<div class="alert alert-error">', '</div>'); ?>
				</div>
				
			<div class="field">
				        <label for="email">Email <span class="required">*</span></label>
				   
				      <input class="login" placeholder="Email" id="username" type="text" name="username" maxlength="255" value="<?php echo set_value('username'); ?>"  />
				           <?php echo form_error('username', '<div class="alert alert-error">', '</div>'); ?>
			
				</div>
					
				<div class="field">
			
				        <label for="hashed_password">Password <span class="required">*</span></label>
				        
				        <input class="login" placeholder="Password" id="hashed_password" type="password" name="hashed_password" maxlength="15" value="<?php echo set_value('hashed_password'); ?>"  />
				        <?php echo form_error('hashed_password', '<div class="alert alert-error">', '</div>'); ?>
			</div>
				

				     
				<div class="field">
				
					        <label for="password2">Password <span class="required">*</span></label>
					        
					        <input class="login" placeholder="Retype Password" id="password2" type="password" name="password2" maxlength="15" value="<?php echo set_value('password2'); ?>"  />
					        <?php echo form_error('password2', '<div class="alert alert-error">', '</div>'); ?>
				</div>
					
				
	
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="terms" name="terms" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="terms">I have read and agree with the Terms of Use.</label>
				</span>
									   <?php
									   
							$data = array( 
							'name' => 'submit', 
							'id' => 'createUserBtn',
							'class' => 'button btn btn-warning btn-large',
							'content' => 'Register', 
							'type' => 'submit');
							echo form_button($data); ?>
									   
					
			
				
			</div> <!-- .actions -->
			
		<?= form_close(); ?>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">
	Already have an account? <a href="/login">Login</a>
</div> <!-- /login-extra -->



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/additional-methods.min.js"></script>
-->

<script src="public/js/jquery-1.7.2.min.js"></script>
<script type="public/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="public/js/additional-methods.min.js"></script>


<script src="public/js/bootstrap.js"></script>
<script>


jQuery(document).ready(function($) {	

	$("#createUserBtn").attr('disabled', true);

	$('#terms').change(function() {
	  if ($(this).attr('checked')) { $("#createUserBtn").attr('disabled', false); } else { $("#createUserBtn").attr('disabled', true); }
	});  

});

</script>
</body>
</html>