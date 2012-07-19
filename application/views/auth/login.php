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







<div class="account-container">
	
	<div class="content clearfix">
		
				
			<h2>Sign In</h2>		
			
			<div class="login-fields">
				
				<p>Sign in using your registered account:</p>
				
					<?=form_open()?>
					
					<?=isset($message) ? $message : ''?>
					
							
							<div class="login-fields">
							
				
																
						<div class="field">
							        <label for="email">Email <span class="required">*</span></label>
							   
							      <input class="login username-field" placeholder="Email" id="name" type="text" name="name" maxlength="255" value="<?php echo set_value('name'); ?>"  />
							           <?php echo form_error('name', '<div class="alert alert-error">', '</div>'); ?>
						
							</div>
								
							<div class="field">
						
							        <label for="hashed_password">Password <span class="required">*</span></label>
							        
							        <input class="login password-field" placeholder="Password" id="password" type="password" name="password" maxlength="15" value="<?php echo set_value('password'); ?>"  />
							        <?php echo form_error('password', '<div class="alert alert-error">', '</div>'); ?>
						</div>
						
				
								     
								
								
					
								
							</div> <!-- /login-fields -->
							
							<div class="login-actions">
								
								<span class="login-checkbox">
									<input id="terms" name="terms" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
									<label class="choice" for="terms">Keep me signed in.</label>
								</span>
													   <?php
													   
											$data = array( 
											'name' => 'submit', 
											'id' => 'createUserBtn',
											'class' => 'button btn btn-warning btn-large',
											'content' => 'Login', 
											'type' => 'submit');
											echo form_button($data); ?>
													   
									
							
								
							</div> <!-- .actions -->
							
												<?=form_close()?>
						
		</div> <!-- /content -->
		
	</div> <!-- /account-container -->
	</div> <!-- /content -->
		
	</div> <!-- /account-container -->
	
	<!-- Text Under Box -->
	<div class="login-extra">
		Don't have an account? <a href="/signup">Sign up</a>
	</div> <!-- /login-extra -->
	
	




<!-- Text Under Box -->


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

//	$("#createUserBtn").attr('disabled', true);

	$("#signupForm").validate({

rules: {
  email: {
    required: true,
    email: true,
    remote: {
      url: "/registration/register_email_exists",
      type: "post",
      data: {
        email: function(){ return $("#email").val(); }
      }
    }
  },
  /*  email2: { equalTo: "#email" }
  },
  messages: {
    email1: {
      required: 'Email address is required',
      email: 'Please enter a valid email address',
      remote: 'Email already used. Log in to your existing account.'
    }*/
    
} });



});

</script>
</body>
</html>
