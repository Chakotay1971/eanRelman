<html lang="en">
	<head>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <meta name="description" content="">
	 <meta name="author" content="">
	 <link rel="shortcut icon" href="../ico/eanicon.jpg">

	 <title>Expedia Affiliate Network Release & Change Management</title>
	 <link href="../css/bootstrap.css" rel="stylesheet">
	 <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	 <link href="../css/font-awesome.min.css" rel="stylesheet" >
  <link href="../css/bootstrap-combined.min.css" rel="stylesheet">

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="../js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" language="javascript" src="../js/bootstrap.min-2.2.js"></script>

		<style>

			body {
			  padding-top: 0px;
			  background-color: #f4f3f4;
			}
		
			input[type=text], input[type=password] {
			 height: 28px !important;
			}		

			.add-on {
				height: 28px !important;
				
			}

		</style>
	</head>

	<?php
	if(isset($_POST['submit'])) {

		$name = trim($_POST['contactname']);
		$email = trim($_POST['email']);
		$component = trim($_POST['component']);
		$version = trim($_POST['version']);
		$build = trim($_POST['build']);
		$bamboo = trim($_POST['bamboo']);
		$date = trim($_POST['date']);
		$start = trim($_POST['start']);
		$end = trim($_POST['end']);
		$pci = trim($_POST['pci']);
		$external = trim($_POST['external']);
		$restarts = trim($_POST['restarts']);
		$dependencies = trim($_POST['dependencies']);
		$devname = trim($_POST['devname']);
		$testname = trim($_POST['testname']);
		$summary = trim($_POST['summary']);
		$impact = trim($_POST['impact']);
		$notes = trim($_POST['notes']);
  
		$msg = "Name: $name \n\nEmail: $email \n\nComponent: $component \n\nComponent: $version \n\nComponent: $build \n\nBamboo: $bamboo \n\nDate: $date \n\nStart: $start \n\nEnd: $end \n\nPCI/Legal: $pci \n\nExternal: $external \n\nResarts: $restarts \n\ndependencies: $dependencies \n\nDeveloper Name: $devname \n\nTest Name: $testname \n\nSummary: $summary \n\nImpact: $impact \n\nNotes: $notes";

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);
		// send email
		mail("tannan@expedia.com","Request For Change",$msg);
		$emailSent = true; 
	}
	?>

 <body>
		<div class="container">
   <div class="row">
     <div class="col-lg-12">
       <div class="panel panel-primary">
         <div class="panel-heading">
           <i class="fa fa-edit"></i> EAN Request for Change Form</li>
         </div>
         <div class="panel-body">
           <div id="morris-chart-area"></div>
												<form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">
													<fieldset>
				          <legend>Request for change in the EAN Production Environment</legend>
				           <?php if(isset($emailSent) && $emailSent == true) { ?>
				             <div class="alert alert-success">
				              <p><strong>Message Successfully Sent!</strong></p>
				              <p>Thank you for using our contact form <strong><?php echo $name;?></strong>! Your RFC was successfully sent and we&rsquo;ll be in touch with you soon.</p>
																	</div>
																	<?php } ?>
							          <div class="col-lg-3">
						            <div class="form-group">
					              <label for="name">Your Name<span class="help-required"></span></label>
					              <input type="text" name="contactname" id="contactname" value="" class="form-control required" role="input" aria-required="true" />
							
					              <label for="email">Your Email<span class="help-required"></span></label>
					              <input type="text" name="email" id="email" value="" class="form-control required email" role="input" aria-required="true" />
						
					              <label for="weburl">Component<span class="help-required"></span></label>
					              <input type="text" name="component" id="component" value="" class="form-control required url" role="input" aria-required="true" />

					              <label for="weburl">Version<span class="help-required"></span></label>
					              <input type="text" name="version" id="version" value="" class="form-control required url" role="input" aria-required="true" />
	
					              <label for="weburl">Build<span class="help-required"></span></label>
					              <input type="text" name="build" id="build" value="" class="form-control required url" role="input" aria-required="true" />
	
					              <label for="weburl">Bamboo Release Plan<span class="help-required"></span></label>
					              <input type="text" name="bamboo" id="bamboo" value="" class="form-control required url" role="input" aria-required="true" />
																		</div>		
							          </div>		
						          <div class="col-lg-3">
					            <div class="form-group">
														    <div id="datetimepicker" class="input-append date">
														      <label for="weburl">Preferred Date<span class="help-required"></span></label>
														      <input type="text" name="date" id="date"></input>
														      <span class="add-on">
														        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
														      </span>
														    </div>
														    <script type="text/javascript">
														      $('#datetimepicker').datetimepicker({
														        format: 'dd/MM/yyyy',
														        pickTime: false,
														        language: 'pt-UK'
														      });
														    </script>
														    <div id="datetimepicker1" class="input-append date">
														      <label for="weburl">Start Time UTC<span class="help-required"></span></label>
														      <input type="text" name="start" id="start"></input>
														      <span class="add-on">
														        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
														      </span>
														    </div>
														    <script type="text/javascript">
														      $('#datetimepicker1').datetimepicker({
														        format: 'HH:mm',
														        pickDate: false,
														        language: 'pt-UK'
														      });
														    </script>
														    <div id="datetimepicker2" class="input-append date">
														      <label for="weburl">End Time UTC<span class="help-required"></span></label>
														      <input type="text" name="end" id="end"></input>
														      <span class="add-on">
														        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
														      </span>
														    </div>
														    <script type="text/javascript">
														      $('#datetimepicker2').datetimepicker({
														        format: 'HH:mm',
														        pickDate: false,
														        language: 'pt-UK'
														      });
														    </script>

				              <label for="weburl">PCI or Legal<span class="help-required"></span></label>
				              <input type="text" name="pci" id="pci" value="" class="form-control required url" role="input" aria-required="true" />

				              <label for="weburl">External Resources<span class="help-required"></span></label>
				              <input type="text" name="external" id="external" value="" class="form-control required url" role="input" aria-required="true" />

				              <label for="weburl">Cache Downstream Impact<span class="help-required"></span></label>
				              <input type="text" name="restarts" id="restarts" value="" class="form-control required url" role="input" aria-required="true" />

				              <label for="weburl">Dependencies<span class="help-required"></span></label>
				              <input type="text" name="dependencies" id="dependencies" value="" class="form-control required url" role="input" aria-required="true" />

																		</div>		
							          </div>		
						          <div class="col-lg-3">
					            <div class="form-group">
				              <label for="name">Developer Resource<span class="help-required"></span></label>
				              <input type="text" name="devname" id="devname" value="" class="form-control required" role="input" aria-required="true" />
						
				              <label for="name">Test Resource<span class="help-required"></span></label>
				              <input type="text" name="testname" id="testname" value="" class="form-control required" role="input" aria-required="true" />
																
					              <label for="message">Release Summary<span class="help-required"></span></label>
					              <textarea rows="5" name="summary" id="summary" class="form-control required" role="textbox" aria-required="true"></textarea>

					              <label for="message">Partner Impact / Changed Behavior<span class="help-required"></span></label>
					              <textarea rows="2" name="impact" id="impact" class="form-control required" role="textbox" aria-required="true"></textarea>
																	</div>		
						          </div>		
																<div class="col-lg-3">
					            <div class="form-group">
						            <div class="form-group">
					              <label for="message">Notes<span class="help-required"></span></label>
					              <textarea rows="5" name="notes" id="notes" class="form-control required" role="textbox" aria-required="true">
					              </textarea>
						            </div>
																	</div>		
				            <div class="actions">
			              <input type="submit" value="Send Your RFC" name="submit" id="submitButton" class="btn btn-primary" title="Click here to submit your Request For Change!" />
			              <input type="reset" value="Clear Form" class="btn btn-danger" title="Remove all the data from the form." />
				            </div>
					          </fieldset>
														</form>
													</div>
												</div>
         	</div>
									</div>
							</div>
					</div>
			</div>
	</body>
</html>
