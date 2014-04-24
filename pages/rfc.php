<html lang="en">
	<head>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <meta name="description" content="">
	 <meta name="author" content="">
	 <link rel="shortcut icon" href="../ico/eanicon.jpg">
	
	 <title>Expedia Affiliate Network Release & Change Management</title>
	 <link href="../css/bootstrap.css" rel="stylesheet">
	 <link href="../css/DT_	bootstrap.css" rel="stylesheet">
	 <link href="../css/template.css" rel="stylesheet">

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="../js/bootstrap-dropdown.js"></script>
		<script type="text/javascript" charset="utf-8">

			$(document).ready(function() {
				$('#test').dataTable();
			} );
		</script>

		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
			  var oTable = $('#test').dataTable();
			  oTable.fnSort( [ [4,'desc'] ] );
			} );
		</script>
	</head>

	<?php
	if(isset($_POST['submit'])) {
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactname']) == '') {
			$hasError = true;
		} else {
			$name = trim($_POST['contactname']);
		}
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['weburl']) == '') {
			$hasError = true;
		} else {
			$weburl = trim($_POST['weburl']);
		}
	
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) == '')  {
			$hasError = true;
		} else if (!filter_var( trim($_POST['email'], FILTER_VALIDATE_EMAIL ))) {
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
	
		//Check to make sure comments were entered
		if(trim($_POST['message']) == '') {
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['message']));
			} else {
				$comments = trim($_POST['message']);
			}
		}
	

		$msg = "Name: $name \n\nEmail: $email \n\nComponent: $weburl \n\nComments: $comments";
		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);
		// send email
		mail("eanrelman@expedia.com,$email","Request For Change",$msg);
		$emailSent = true;
	}
	?>

 <body>
		<div class="container">
   <div class="row">
    <div class="col-md-6 col-md-push-3">
      <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">
        <fieldset>
          <legend>Request for change in the EAN Production Environment</legend>
		
           <?php if(isset($hasError)) { //If errors are found ?>
             <p class="alert alert-danger">Please check if you've filled all the fields with valid information and try again. Thank you.</p>
           <?php } ?>
		
	           <?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
             <div class="alert alert-success">
              <p><strong>Message Successfully Sent!</strong></p>
              <p>Thank you for using our contact form, <strong><?php echo $name;?></strong>! Your RFC was successfully sent and we&rsquo;ll be in touch with you soon.</p>
													</div>
													<?php } ?>
		
	            <div class="form-group">
              <label for="name">Your Name<span class="help-required">*</span></label>
              <input type="text" name="contactname" id="contactname" value="" class="form-control required" role="input" aria-required="true" />
	            </div>
		
	            <div class="form-group">
              <label for="email">Your Email<span class="help-required">*</span></label>
              <input type="text" name="email" id="email" value="" class="form-control required email" role="input" aria-required="true" />
	            </div>
	
	            <div class="form-group">
              <label for="weburl">Your Service<span class="help-required">*</span></label>
              <input type="text" name="weburl" id="weburl" value="" class="form-control required url" role="input" aria-required="true" />
	            </div>
	
	            <div class="form-group">
              <label for="message">Message<span class="help-required">*</span></label>
              <textarea rows="20" name="message" id="message" class="form-control required" role="textbox" aria-required="true">
Date for production implementation:
Required Start Time (GMT)?
Required End Time (GMT)?

Urgency:
Is this deployment related to PCI or Legal?
If Expedited (less than 2 days notice) why?
What is the priority to release on given date?

Resources:
Ops Support contact?
Dev Support contact?
Test Support contact?

Please Provide Summary of Release?

What is the Version being deployed?

Are there any associated changes that need to go out to support this?

Risk Questions:
Has this been validated in Milan?
Has the test sign-off been sent?
Are any external teams required to assist in implementation?
Are restarts or cache rebuilds required to any downstream system?
How many Services/Applications are affected?
Does this change require approval/validation/notification to any other OU? 
What is the Version to rollback to?
 
[Applications/Services]:
What component(s) are being updated?
 
[Database Changes]
What Database is this change going to use/impact?
PLEASE EMAIL THE DART SCRIPTS ASAP TO EANRELMAN@expedia.com !!!
              </textarea>
	            </div>
	
	            <div class="actions">
              <input type="submit" value="Send Your RFC" name="submit" id="submitButton" class="btn btn-primary" title="Click here to submit your Request For Change!" />
              <input type="reset" value="Clear Form" class="btn btn-danger" title="Remove all the data from the form." />
	            </div>
	          </fieldset>
	        </form>
	      </div><!-- col -->
	    </div><!-- row -->
		<hr>
		<footer>
			<p>&copy; http://release.ean.karmalab.net</p>
		</footer>
	</div>
  </body>
</html>
