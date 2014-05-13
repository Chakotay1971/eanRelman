<!DOCTYPE HTML>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="description" content="">
 <meta name="author" content="">

 <title>EAN Release Management Dashboard</title>

 <link href="../css/bootstrap.css" rel="stylesheet">
 <link href="../css/sb-admin.css" rel="stylesheet">
 <link rel="stylesheet" href="../css/font-awesome.min.css">
 <link rel="stylesheet" href="../css/morris-0.4.3.min.css">

 <script type="text/javascript" language="javascript" src="../js/iframe.js"></script>
	<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../js/bootstrap.js"></script>

	<style>
		.cntainer {
		  padding-right: 150px;
		  padding-left: 15px;
		  margin-right: 15px;
		  margin-left: 15px;
		}
	</style>
</head>

<body onload='javascript:resizeIframe(this);'>
	<div class="cntainer">
		<div id="wrapper">
		 <div class="row">
		   <div class="col-lg-16">
		    <ol class="breadcrumb">
		      <li class="active"><i class="fa fa-dashboard"></i> Defect Dashboard</li>
		    </ol>
		    <div class="alert alert-success alert-dismissable">
		      Welcome to the EAN Defect Dashboard. This page shows defect stats for all Components that are released to Production. Currently these are updated manually during a release event (when defects are fixed or introduced.)
		    </div>
		   </div>
		 </div>
		
		 <div class="row">
		  <div class="col-lg-12">
		   <div class="panel panel-success">
		    <div class="panel-heading">
		     <div class="row">
		      <div class="col-xs-6">
		        <i class="fa fa-comments fa-5x"></i>
		        V3. API
		      </div>
		      <div class="col-xs-6 text-right">
		        <p class="announcement-heading">29</p>
		        <p class="announcement-text">Open Defects!</p>
		      </div>
		    </div>
		   </div>
				</div>
			</div>
		 <div class="row">
		  <div class="col-lg-12">
		   <div class="panel panel-primary">
		     <div class="panel-heading">
		       <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> V3. API Statistics:</h3>
		     </div>
		     <div class="panel-body">
		       <div id="v3api-chart-area"></div>
		     </div>
		   </div>
		  </div>
			</div>

		 <div class="row">
		  <div class="col-lg-12">
		   <div class="panel panel-success">
		    <div class="panel-heading">
		     <div class="row">
		      <div class="col-xs-6">
		        <i class="fa fa-comments fa-5x"></i>
		        Templates
		      </div>
		      <div class="col-xs-6 text-right">
		        <p class="announcement-heading">108</p>
		        <p class="announcement-text">Open Defects!</p>
		      </div>
		    </div>
		   </div>
				</div>
			</div>

		 <div class="row">
		  <div class="col-lg-12">
		   <div class="panel panel-primary">
		     <div class="panel-heading">
		       <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Templates Statistics:</h3>
		     </div>
		     <div class="panel-body">
		       <div id="templates-chart-area"></div>
		     </div>
		   </div>
		  </div>
			</div>
		</div>
 </div>

 <script src="../js/jquery.js"></script>
 <script src="../js/bootstrap.js"></script>
 <script src="../js/raphael-min.js"></script>
 <script src="../js/morris-0.4.3.min.js"></script>
 <script src="../js/chartdata/chart-data-api.js"></script>

</body>
</html>