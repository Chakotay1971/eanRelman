<html lang="en">
	<head>
 	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="shortcut icon" href="ico/eanicon.jpg">

  <title>Expedia Affiliate Network Release & Change Management</title>

  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/DT_	bootstrap.css" rel="stylesheet">
  <link href="css/template.css" rel="stylesheet">
	
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<style>

			table {
			    font-size:1em;
			}

		</style>

		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/bootstap-modal.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="js/bootstrap-dropdown.js"></script>

		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#test').dataTable();
			} );
		</script>

		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
			  var oTable = $('#test').dataTable();
			  oTable.fnSort( [ [7,'desc'] ] );
			} );
		</script>

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

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Releases</a></li>
      <li><a href="pages/org.php">Tech Org Chart</a></li>
      <li><a href="pages/bookings.php">Booking Map</a></li>
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">Links <b class="caret"></b></a>
       <ul class="dropdown-menu">
        <li><a href="https://bamboo.ean" target="_blank">Bamboo</a></li>
        <li><a href="https://confluence/display/EAN/EAN+Technology+PMO" target="_blank">Confluence</a></li>
        <li><a href="https://jira/jira/secure/Dashboard.jspa" target="_blank">Jira</a></li>
        <li class="divider"></li>
        <li><a href="https://expedia.service-now.com/sys_report_template.do?jvar_report_id=b11d05dabc2259c8a6a3fbd7895a84f6" target="_blank">EAN Change Requests</a></li>
       </ul>
      </li>
     </ul>
    </div>
	  </div>
		</nav>

		<div class="container">
			<div class="brand-template">
				<h1>Release Management Portal</h1>
				<p class="lead"><b>Welcome to the Expedia Affiliate Network.</b></p>
			</div>
			<div class="alert alert-warning" style="text-align:center;">
				Due to a DR change freeze, Production releases are frozen between Tuesday, April 22nd 8:00pm to Thursday, April 24th 8:00pm PST
			</div>
			
			<div class="jumbotron">
				<p>This page details all change activity in our Production environment, important to our teams and affiliates. If you require a change in the environment, please raise an <button data-controls-modal="rfc" data-backdrop="true" data-keyboard="true" class="btn danger label label-default">RFC</button> or email the <a href="mailto:eanrelman@expedia.com">Release Team</a>. All times are UTC</p>
				<p>
			</div>
			<hr>
		</div>

		<div id="rfc" class="modal fade">
			<div class="rfc-template"
				<div class="plane-template">
					<div class="well">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
							<iframe src="pages/rfc.php" width="500" height="800" frameborder="0"></iframe>		
					</div>
				</div>
			</div>
		</div>

		<?php	
			$con=mysqli_connect("127.0.0.1","read","readPa55word","ean");

			if (mysqli_connect_errno())
			  {
			  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }

		?>

		<div class="container" style="margin-top: 10px">
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover table-bordered" id="test">
				<thead>
					<tr>

						<?php	

							$query = "SELECT * from events ORDER BY End DESC";

							if ($result = $con->query($query)) {
					
								$row_cnt = $result->num_rows;
							
							    /* Get field information for all columns */
							    $finfo = $result->fetch_fields();
							
							    $isFirst = true;
							    foreach ($finfo as $val) {
												if ($isFirst) {
								        $isFirst = false;
								        continue;
								    }   
							        echo '<th>';
							        echo $val->name;
							        echo '</th>';
					
							    }

							}

					?>

				</tr>
			</thead>
			<tbody>

				<?php	
			
					while($row = $result->fetch_array())
			
					{
						$rows[] = $row;
					}
					
					foreach($rows as $row)
			
					{
			   echo '<tr class="odd gradeA">';
			   echo '<td>';
						echo $row['Change'];
			   echo '</td>';
			
			   echo '<td>';
						echo $row['Service'];
			   echo '</td>';
			
			   echo '<td>';
						echo $row['Version'];
			   echo '</td>';
			
			   echo '<td>';
						echo $row['Build'];
			   echo '</td>';
			
			   echo '<td>';
						echo $row['Feature'];
			   echo '</td>';
			
			   echo '<td>';
						echo $row['Contact'];
			   echo '</td>';
			
			   echo '<td class="center">';
						echo $row['Start'];
			   echo '</td>';
			
			   echo '<td class="center">';
						echo $row['End'];
			   echo '</td>';
			
			   echo '<td class="center">';
						echo $row['Status'];
			   echo '</td>';
			
						$value = $row['Info'];
						if (isset($value)) {
			
				   echo '<td class="center">';
							echo '<button data-controls-modal="';
							echo $row['Change'];
							echo '" data-backdrop="true" data-keyboard="true" class="btn danger label label-default">Info</button>';
				   echo '</td>';
				   echo '</tr>';
				
							echo '	<div id="';
							echo $row['Change'];
							echo '" class="modal fade">';
							echo '	<div class="release-template">';
							echo '	<div class="plane-template">';
							echo '	<div class="well">';
							echo '	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
							echo '	<iframe src="https://bamboo.ean/deploy/viewDeploymentVersion.action?';
							echo $row['Info'];
							echo '" width="1000" height="1200" frameborder="0"></iframe>';		
							echo '	</div>';
							echo '	</div>';
							echo '	</div>';
							echo '	</div>';
							
						}
						
						else {
							
				   echo '<td class="center">';
				   echo '</td>';
				   echo '</tr>';
							
						}
			
					}
			
					echo '</tbody>';
					echo '</table>';
			
					$result->free();
					$con->close();
			
				?>

		<div class="plane-template">
		</div>

		<div class="well">
			<p>As we refine and continuously improve services to our customers on this site, we would welcome any feedback you have with regards what you would like to see. Please contact the <a href="mailto:eanrelman@expedia.com">Release Team</a> for any assistance or comments with regards the site or release activity planned.</p>
		</div>

		<hr>
			<footer>
					<p>&copy; http://release.ean.karmalab.net</p>
			</footer>
		</div>
	</body>
</html>
