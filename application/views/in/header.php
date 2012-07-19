<!DOCTYPE html>
<html>

  <head>
<base href="<?= base_url() ?>"  />
    <meta charset="utf-8">
    <title><?= $title ?> - Sydney Writers Room</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
     
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
     <link href="public/css/font-awesome.css" rel="stylesheet">

    <link href="public/css/base-admin.css" rel="stylesheet">
    <link href="public/css/base-admin-responsive.css" rel="stylesheet">
        <link href="public/css/plans.css" rel="stylesheet"> 
    <link href="public/css/dashboard.css" rel="stylesheet">   
     <link href="public/css/style.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      
    <![endif]-->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

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
			
			<a class="brand" href="">
				Sydney Writers Room	- <?= $title ?>			
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<!-- <li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
							Settings
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Account Settings</a></li>
							<li><a href="javascript:;">Privacy Settings</a></li>
							<li class="divider"></li>
							<li><a href="javascript:;">Help</a></li>
						</ul>
						
					</li> -->
			
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
							<?= $name ?>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="account/">My Details</a></li>
							
							<li class="divider"></li>
							<li><a href="<?= site_url("auth/logout") ?>">Logout</a></li>
						</ul>
						
					</li>
				</ul>
			
			<!--	<form class="navbar-search pull-right">
					<input type="text" class="search-query" placeholder="Search">
				</form> -->
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
    



    
<div class="subnavbar">

	<div class="subnavbar-inner">
	
		<div class="container">

			<ul class="mainnav">
			
					
			
				<li id="dashboard" >
					<a href="">
						<i class="icon-calendar"></i>
						<span>Book Months</span>
					</a>	    				
				</li>
				
				<li id="invoices">
					<a href="/invoices">
						<i class="icon-pushpin"></i>
						<span>Invoices</span>
					</a>	    				
				</li>
				
				<li id="pricing">
					<a href="dashboard/pricing">
						<i class="icon-money"></i>
						<span>Pricing Plans</span>
					</a>    				
				</li>
				<!--	
				<li id="rules">					
					<a href="dashboard/pricing" class="dropdown-toggle">
						<i class="icon-file"></i>
						<span>Rules of Use</span>
					</a>	  				
				</li>
				
		
				
			<li>					
					<a href="guidely.html">
						<i class="icon-facetime-video"></i>
						<span>Guided Tour</span>
					</a>  									
				</li>
				
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-share-alt"></i>
						<span>More Pages</span>
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
						<li><a href="charts.html">Charts</a></li>
						<li><a href="account.html">User Account</a></li>
						<li class="divider"></li>
						<li><a href="login.html">Login</a></li>
						<li><a href="signup.html">Signup</a></li>
						<li><a href="error.html">Error</a></li>
					</ul>    				
				</li>-->
			
			</ul>

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    
