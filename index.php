<!DOCTYPE HTML>
<html lang="en">
	<head>
 	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/sb-admin.css" rel="stylesheet">
	 <link href="css/font-awesome.min.css" rel="stylesheet" >

		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/bootstrap-dropdown.js"></script>
  <script type="text/javascript" language="javascript" src="js/iframe.js"></script>
 </head>
 <body>

		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	  <div class="container-fluid">
    <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
     </button>
     <a href="http://release.ean.karmalab.net" class="navbar-brand">Expedia Affiliate Network</a>
    </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
     <ul class="nav navbar-nav top-nav">
      <li class="active"><a href="pages/releases.php"	target="iframe">Releases</a></li>
      <li><a href="pages/techorg.php" target="iframe">Tech Org Chart</a></li>
      <li><a href="pages/bookings.php" target="iframe">Booking Map</a></li>
						<li class="dropdown messages-dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-dashboard"></i> Dashboards <b class="caret"></b></a>
	       <ul class="dropdown-menu">
									<li><a href="pages/dashboards.php" target="iframe"> Defect Dashboards</a></li>
       </ul>
      </li>
						<script language="javascript">
							$("ul li").click(function()
							{
							$("ul .active").removeClass("active");
							$(this).addClass("active");
							});						
						</script>
						<li class="dropdown messages-dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Links <b class="caret"></b></a>
	       <ul class="dropdown-menu">
	        <li><a href="https://bamboo.ean" target="_blank">Bamboo</a></li>
	        <li><a href="https://confluence/display/EAN/EAN+Technology+PMO" target="_blank">Confluence</a></li>
	        <li><a href="https://jira.ean/secure/Dashboard.jspa" target="_blank">Jira</a></li>
	        <li class="divider"></li>
	        <li><a href="https://expedia.service-now.com/sys_report_template.do?jvar_report_id=b11d05dabc2259c8a6a3fbd7895a84f6" target="_blank">EAN Change Requests</a></li>
       </ul>
      </li>
						</li>
     </ul>
					<ul class="nav navbar-nav navbar-right navbar-user">
						<li class="dropdown messages-dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">0</span> <b class="caret"></b></a>
<!--
								<ul class="dropdown-menu">
										<li class="dropdown-header">2 Messages</li>
										<li class="message-preview">
											<a href="#">
												<span class="avatar"><img src="http://placehold.it/50x50"></span>
												<span class="name">Change Freeze Dates:</span>
												<span class="message">Hey there, I wanted to ask you something...</span>
												<span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
											</a>
										</li>
										<li class="divider"></li>
										<li class="message-preview">
											<a href="#">
												<span class="avatar"><img src="http://placehold.it/50x50"></span>
												<span class="name">John Smith:</span>
												<span class="message">Hey there, I wanted to ask you something...</span>
												<span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
											</a>
										</li>
								</ul>
-->
						</li>

						<li class="dropdown alerts-dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alerts <span class="badge">0</span> <b class="caret"></b></a>
<!--
							<ul class="dropdown-menu">
								<li><a href="#">Default <span class="label label-default">Default</span></a></li>
								<li><a href="#">Primary <span class="label label-primary">Primary</span></a></li>
								<li><a href="#">Success <span class="label label-success">Success</span></a></li>
								<li><a href="#">Info <span class="label label-info">Info</span></a></li>
								<li><a href="#">Warning <span class="label label-warning">Warning</span></a></li>
								<li><a href="#">Danger <span class="label label-danger">Danger</span></a></li>
								<li class="divider"></li>
								<li><a href="#">View All</a></li>
							</ul>
-->
						</li>
						<li class="dropdown user-dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Anonymous <b class="caret"></b></a>
<!--
							<ul class="dropdown-menu">
								<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
								<li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
								<li class="divider"></li>
								<li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
							</ul>
-->
						</li>
					</ul>
				</div>
	  </div>
		</nav>
		<div class="iframe">
			<iframe src="pages/releases.php" width=100% height=1000px frameborder="0" scrolling="no" id="iframe" onload='javascript:resizeIframe(this);' />	
		</div>
	</body>
</html>