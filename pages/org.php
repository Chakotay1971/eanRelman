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
		<script type="text/javascript" src="../js/orgchart.js"></script>
		<script type="text/javascript">
			function saveAsPng(id){
				var img = document.getElementById(id).toDataURL("image/png");
			        document.location.href = img.replace("image/png", "image/octet-stream");
			}
		</script>
	</head>

	<body onload="expl_init();">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	  <div class="container-fluid">
    <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
     </button>
     <a class="navbar-brand">Expedia Affiliate Network</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <ul class="nav navbar-nav">
      <li><a href="http://release.ean.karmalab.net">Releases</a></li>
      <li class="active"><a href="org.php">Tech Org Chart</a></li>
      <li><a href="bookings.php">Booking Map</a></li>
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
<!--
     <form class="navbar-form navbar-right" role="search">
       <div class="form-group">
         <input type="text" class="form-control" placeholder="Search">
       </div>
       <button type="submit" class="btn btn-default">Submit</button>
     </form>
-->
    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
		</nav>

		<div class="container">
				<canvas id="canvas1" width="5500" height="2250"></canvas>
						<script type="text/javascript">
							var o = new orgChart();
					
							o.setSize(200, 40);
						
							o.setColor('#ddf0da', '#ddf0da');
							o.setFont('Arial', 16);
							o.addNode( 0, '', '', 'Arthur Hoffman\nPresident, EAN', 1);
					
							o.setFont('Arial', 14);
							o.addNode(1,  0, 'r', 'Stuart Silberg\nVP, Technology/Product');
							o.addNode(2,  0, 'l', 'Malin Emara\nSnr Executive Assistant');
					
							o.setFont('Arial', 18);
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(20, 1, 'u', 'ARCHITECTURE', 1);
							o.addNode(21, 1, 'u', 'DEVELOPMENT', 1);
							o.addNode(22, 1, 'u', 'PROGRAMME MANAGEMENT', 1);
							o.addNode(23, 1, 'u', 'PARTNER SOLUTIONS', 1);
							o.addNode(24, 1, 'u', 'PRODUCT', 1);
					
							o.setColor('#ddf0da', '#ddf0da');
							o.setFont('Arial', 14);
							o.addNode(40,  20, 'u', 'Daniel Creswell\nArchitecture Director', 1);
					
							o.setFont('Arial', 12);
							o.addNode(50,  40, 'l', 'Dave Kennedy\nSoftware Engineer');
							o.addNode(51,  40, 'l', 'Andrew Mulholland\nOperations Architect');
							o.addNode(52,  40, 'l', 'Ian Kershaw\nSr Software Architect');
							o.setColor('#f4dede', '#f4dede');
							o.addNode(53,  40, 'l', 'Tommy Ortega\nInformation Security Architect');
					
							o.setFont('Arial', 14);
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(60,  40, 'u', 'APPLICATION ENGINEERING', 1);
					
							o.setFont('Arial', 12);
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(70,  60, 'l', 'Sam Kesterson\nApplication Engineer');
							o.addNode(71,  60, 'l', 'Thom May\nApplication Engineer');
							o.addNode(72,  60, 'l', 'Dale Lovelace\nApplication Engineer');
							o.addNode(73,  60, 'l', 'David Symons\nApplication Engineer');
							o.setColor('#f4dede', '#f4dede');
							o.addNode(74,  60, 'l', 'Patrick Steward\nDev Ops Engineer');
							o.addNode(75,  60, 'l', 'Open\nDev Ops Engineer');
					
							o.setColor('#ddf0da', '#ddf0da');
							o.setFont('Arial', 14);
							o.addNode(100,  22, 'u', 'Gaynor Rethinasamy\nSnr. Director PMO & Strategy', 1);
					
							o.setFont('Arial', 14);
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(110,  100, 'u', 'AGILE DELIVERY', 1);
					
							o.setFont('Arial', 12);
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(120,  110, 'u', 'Alexandra Gee\nChief Scrum Master');
					
							o.setColor('#d7edf6', '#d7edf6');
							o.addNode(130,  120, 'l', 'David Houchens\nScrum Master');
							o.setColor('#f4dede', '#f4dede');
							o.addNode(131,  120, 'l', 'David Myers\nScrum Master');
							o.setColor('#d7edf6', '#d7edf6');
							o.addNode(132,  120, 'l', 'Brian Speight\nScrum Master');
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(133,  120, 'l', 'Nick Wood\nScrum Master');
					
							o.setFont('Arial', 14);
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(170,  100, 'u', 'PROJECT SERVICES', 1);
					
							o.setFont('Arial', 12);
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(181,  170, 'l', 'Samantha Wu\nSenior Project Manager');
							o.addNode(182,  170, 'l', 'Joe Thompson\nV-Project Manager');
							o.setColor('#ffffff', '#ffffff');
							o.addNode(183,  170, 'l', 'OPEN\nFraud PM');
							o.addNode(184,  170, 'l', 'OPEN\nPM');
					
							o.setFont('Arial', 14);
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(150,  100, 'u', 'RELEASE & CHANGE MANAGEMENT', 1);
					
							o.setFont('Arial', 12);
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(160,  150, 'u', 'Tim Annan\nSnr. Release Manager');
					
							o.setColor('#ddf0da', '#ddf0da');
							o.setFont('Arial', 14);
							o.addNode(200,  23, 'r', 'Mike Cartwright\nSr Dir, Global Partner Group', 1);
				
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(201,  200, 'u', 'STRATEGIC PARTNERS', 1);
					
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(202,  201, 'l', 'Chris Lynch\nDirector of Strategic Partners');
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(205,  200, 'u', 'OPTIMIZATION TEAM', 1);
					
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(210,  205, 'l', 'Phil Astall\nHead of Optimization', 1);
					
							o.addNode(211,  210, 'l', 'Jon Arce\nSenior Consultant', 1);
							o.addNode(212,  210, 'l', 'Christian Heiler\nSenior Consultant', 1);
							o.addNode(213,  210, 'l', 'Rob De Feo\nSenior Consultant');
							o.addNode(216,  210, 'l', 'Gian Caprini\nStrategy Analyst ');
							o.addNode(215,  210, 'l', 'Shinji Nakashima\nPrincipal Consultant', 1);
							o.addNode(217,  210, 'l', 'Jeff Slipko\nStrategy Analyst ');
				
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(220,  200, 'u', 'SUPPORT TEAM', 1);
					
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(225,  220, 'l', 'Jamie Byers\nHead of Support', 1);
				
							o.addNode(226,  225, 'l', 'Arron Rylaarsdam\nSupport Analyst', 1);
							o.addNode(227,  225, 'l', 'DJ Sethi\nTechnical Integration Mgr', 1);
							o.addNode(228,  225, 'l', 'Alex Villarreal\nIntegration Consultant', 1);
							o.addNode(229,  225, 'l', 'Alberto Cardoso \nSenior Consultant', 1);
							o.setColor('#ffffff', '#ffffff');
							o.addNode(230,  225, 'l', 'OPEN\nSenior Consultant', 1);
							o.addNode(231,  225, 'l', 'OPEN\nSenior Consultant', 1);
							o.addNode(232,  225, 'l', 'OPEN\nSenior Consultant', 1);
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(234,  200, 'u', 'PLATFORMS', 1);
					
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(235,  234, 'l', 'Ben Moss\nPartner Platform Mgr', 1);
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(240,  200, 'l', 'LAUNCH TEAM', 1);
					
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(241,  240, 'l', 'Todd Benatovich\nHead of Launch Management', 1);
				
							o.addNode(242,  241, 'l', 'Jessica Lee\nAPAC Launch Manager', 1);
							o.addNode(243,  241, 'l', 'Khaled Moustafa\nEMEA Launch Manager', 1);
				
							o.setColor('#ffffff', '#ffffff');
							o.setFont('Arial', 14);
							o.addNode(300,  21, 'u', 'OPEN\nDev Ops Snr. Director', 1);
					
							o.setFont('Arial', 16);
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(310,  300, 'u', 'SHOP & SEARCH', 1);
					
							o.setColor('#d7edf6', '#d7edf6');
							o.setFont('Arial', 14);
							o.addNode(350,  310, 'l', 'Karen Bolda\nDirector, Development AMER');
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(360,  350, 'l', 'CONTENT', 1);
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(380,  360, 'l', 'Development', 1);
							o.setColor('#d7edf6', '#d7edf6');
							o.addNode(391,  380, 'l', 'Brandon Hubbell\nSnr. Development Eng');
							o.addNode(392,  380, 'l', 'Jerry Yoakum\nSnr. Development Eng');
							o.addNode(393,  380, 'l', 'Jimmie Maggard\nDevelopment Eng');
							o.addNode(394,  380, 'l', 'Adam Hutson\nDatabase Developer II');
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(430,  360, 'l', 'Test', 1);
					
							o.setColor('#d7edf6', '#d7edf6');
							o.addNode(441,  430, 'l', 'David Hay\nQA Engineer');
							o.setColor('#ffffff', '#ffffff');
							o.addNode(442,  430, 'l', 'OPEN\nTest Engineer');
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(500,  350, 'l', 'SEARCH', 1);
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(520,  500, 'l', 'Development', 1);
					
							o.setColor('#d7edf6', '#d7edf6');
							o.addNode(531,  520, 'l', 'Aaron Klor\nDevelopment Eng II');
							o.addNode(532,  520, 'l', 'Benjamin Dow\nDevelopment Eng');
							o.addNode(533,  520, 'l', 'Hal Hogue\nDevelopment Eng');
							o.addNode(534,  520, 'l', 'Nick Weibel\nDatabase Developer II');
							o.addNode(535,  520, 'l', 'Ross Burgess\nData Eng');
							o.addNode(536,  520, 'l', 'Tyler Walters\nDevelopment Eng');
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(550,  500, 'l', 'Test', 1);
					
							o.setColor('#d7edf6', '#d7edf6');
							o.addNode(562,  550, 'l', 'Nathan England\nQA Engineer');
							o.addNode(563,  550, 'l', 'Tyler Reid\nQA/Test Engineer');
					
							o.setFont('Arial', 16);
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(311,  300, 'u', 'TOOLS & TEMPLATES', 1);
					
							o.setColor('#d7edf6', '#d7edf6');
							o.setFont('Arial', 14);
							o.addNode(600,  311, 'l', 'Steve Baugus\nDirector, Development');
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(610,  600, 'l', 'TOOLS', 1);
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(620,  610, 'l', 'Development', 1);
							o.setColor('#d7edf6', '#d7edf6');
							o.addNode(651,  620, 'l', 'Ryan Scudder\nDevelopment Eng II');
							o.addNode(652,  620, 'l', 'William Jackson\nDevelopment Eng');
							o.setColor('#ffffff', '#ffffff');
							o.addNode(653,  620, 'l', 'OPEN\nJava Developer');
							o.setColor('#d7edf6', '#d7edf6');
							o.addNode(654,  620, 'l', 'Raju Venkataraman\nSnr. Data Eng');
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(680,  610, 'l', 'Test', 1);
					
							o.setColor('#d7edf6', '#d7edf6');
							o.addNode(691,  680, 'l', 'Steve Courter\nQA/Test Engineer');
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(700,  600, 'l', 'TEMPLATE', 1);
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(720,  700, 'l', 'Development', 1);
					
							o.setColor('#d7edf6', '#d7edf6');
							o.addNode(731,  720, 'l', 'Tara Fortune\nManager Template Team Lead');
							o.addNode(732,  720, 'l', 'Luke Mayes\nSnr. Development Eng');
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(750,  700, 'l', 'Test', 1);
					
							o.setColor('#d7edf6', '#d7edf6');
							o.addNode(764,  750, 'l', 'David Conaway\nQuality Engineer');
					
							o.setFont('Arial', 16);
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(810,  300, 'u', 'CORE', 1);
					
							o.setColor('#ddf0da', '#ddf0da');
							o.setFont('Arial', 14);
							o.addNode(850,  810, 'l', 'Paul Denning\nDirector, Development');
					
							o.addNode(851,  850, 'l', 'Dinakar Mushini\nTPM');
							o.addNode(852,  850, 'l', 'Vipul Khurana\nProduct Manager');
				
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(860,  850, 'r', 'CORE RIGHT', 1);
					
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(870,  860, 'r', 'Joshua Baird\nSnr. Database Developer');
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(880,  860, 'l', 'Development', 1);
					
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(901,  880, 'l', 'Phani Hari\nDevelopment Eng');
							o.addNode(902,  880, 'l', 'Neeraj Bhardwaj\nDevelopment Eng');
							o.addNode(903,  880, 'l', 'Rob Evans\nDevelopment Eng');
							o.addNode(904,  880, 'l', 'Tom Reay\nDevelopment Eng I');
							o.setColor('#ffffff', '#ffffff');
							o.addNode(905,  880, 'l', 'OPEN\nDevelopment Eng I');
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(920,  860, 'l', 'Test', 1);
					
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(940,  920, 'l', 'Sai Kodali\nQA Engineer');
							o.addNode(941,  920, 'l', 'Loan Todoran\nQuality Engineer');
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(980,  850, 'u', 'CORE LEFT', 1);
					
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(1000,  980, 'l', 'Roxana Diaconescu\nSoftware Eng. Team Lead');
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(1010,  980, 'l', 'Development', 1);
					
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(1020,  1010, 'l', 'Gareth Davis\nDevelopment Eng');
							o.addNode(1021,  1010, 'l', 'Shaibaz Khan\nSoftware Eng');
							o.addNode(1022,  1010, 'l', 'Jake Collins\nSoftware Eng');
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(1040,  980, 'l', 'Test', 1);
					
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(1051,  1040, 'l', 'Maryam Umar\nSnr. QA Engineer');
					
							o.setFont('Arial', 16);
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(1100,  300, 'u', 'BOOK & PAY', 1);
					
							o.setColor('#f4dede', '#f4dede');
							o.setFont('Arial', 14);
							o.addNode(1120,  1100, 'l', 'Eric Jelinek\nDirector, Development');
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(1130,  1120, 'l', 'Development', 1);
					
							o.setColor('#f4dede', '#f4dede');
							o.addNode(1140,  1130, 'l', 'Narayana Reddy\nSnr. Development Eng');
							o.addNode(1141,  1130, 'l', 'Nithin Cheruku\nDevelopment Eng II');
							o.setColor('#ffffff', '#ffffff');
							o.addNode(1142,  1130, 'l', 'OPEN\nData Eng');
							o.setColor('#f4dede', '#f4dede');
							o.addNode(1143,  1130, 'l', 'Ram Mittala\nSnr. Development Eng');
							o.addNode(1144,  1130, 'l', 'Srinath Ramasubramanian\nSnr. Development Eng');
							o.addNode(1145,  1130, 'l', 'Andy Beltran\nSnr. Development Eng');
					
							o.setColor('#fcf8e5', '#fcf8e5');
							o.addNode(1160,  1120, 'l', 'Test', 1);
					
							o.setColor('#f4dede', '#f4dede');
							o.addNode(1061,  1160, 'l', 'Deepak Mettem\nQA/Test Engineer');
							o.addNode(1062,  1160, 'l', 'Pavan Parikh\nQA Engineer');
					
							o.setColor('#ddf0da', '#ddf0da');
							o.setFont('Arial', 14);
							o.addNode(1500,  24, 'u', 'Steven Humphries\nSnr. Director of Product', 1);
					
							o.setColor('#ddf0da', '#ddf0da');
							o.setFont('Arial', 14);
							o.addNode(1511,  1500, 'l', 'Jonathan Webster\nSnr. Mgr Template & Price');
					
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(1512,  1511, 'l', 'Louise King\nSnr. Process/Business Analyst');
							o.setColor('#d7edf6', '#d7edf6');
							o.addNode(1513,  1511, 'l', 'Satyen Barve\nSnr. TPM');
							o.setColor('#ffffff', '#ffffff');
							o.addNode(1514,  1511, 'l', 'OPEN\nTPM Pricing');
					
							o.setColor('#f4dede', '#f4dede');
							o.setFont('Arial', 14);
							o.addNode(1519,  1500, 'l', 'Finny Samuel\nDirector Book and Pay');
					
							o.addNode(1520,  1519, 'l', 'Chandrika Duggirala\nProduct Manager');
							o.setColor('#ffffff', '#ffffff');
							o.addNode(1521,  1519, 'l', 'OPEN\nTPM Book & Pay');
				
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(1620,  1500, 'l', 'Jim Emerson\nSnr. Prod Mgr EMEA');
				
							o.setColor('#ffffff', '#ffffff');
							o.addNode(1621,  1620, 'l', 'OPEN\nTPM Tools');
				
							o.setColor('#ffffff', '#ffffff');
							o.addNode(1622,  1500, 'l', 'OPEN\nProduct Manager EMEA');
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(1623,  1622, 'l', 'Charles Ranlett\nTechnical Writer');
					
							o.setColor('#ffffff', '#ffffff');
							o.addNode(1660,  1500, 'l', 'OPEN\nHead of Design');
							o.setColor('#ddf0da', '#ddf0da');
							o.addNode(1661,  1660, 'l', 'Chris Govias\nSenior Designer');
							o.addNode(1662,  1660, 'l', 'Cassio Camanho\nSnr. Interaction Designer');
							o.setColor('#ffffff', '#ffffff');
							o.addNode(1664,  1660, 'l', 'OPEN\nInformation Architect');
				
							o.setColor('#ffffff', '#ffffff');
							o.addNode(1701,  1500, 'l', 'OPEN\nSnr. Product Manager');
				
							o.setColor('#ffffff', '#ffffff');
							o.addNode(1702,  1701, 'l', 'OPEN\nTPM Shop & Search');
				
					
							o.drawChart('canvas1');
						</script>
						<a href = "javascript:saveAsPng('canvas1');">Click here to save the image as png</a><BR>
					<footer>
						<p>&copy; http://release.ean.karmalab.net</p>
					</footer>
				</div>
			</body>
	</html>
	
