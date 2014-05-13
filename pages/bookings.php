<!DOCTYPE html>
<html>
  <head>
		 <title>EAN Real Time Booking Map</title>
		 <link rel="shortcut icon" href="../ico/eanicon.jpg">
		
		 <title>Expedia Affiliate Network Release & Change Management</title>
		 <link href="../css/bootstrap.css" rel="stylesheet">
		 <link href="../css/template.css" rel="stylesheet">
		
			<meta http-equiv="content-type" content="text/html; charset=utf-8" />
			<meta http-equiv="refresh" content="65" />
		
			<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
			<script type="text/javascript" language="javascript" src="../js/iframe.js"></script>
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
		
	  <meta charset="utf-8">
		  <style>
			  html {
			   width: 100%;
			   height: 100%;
			  }
			  #browserWarning{
			   font-weight:bold;
			   color:red;
			   margin:.5em;
			  }
			  path {
			    stroke: white;
			    stroke-width: 0.25px;
			    fill: rgb(8,49,75);
			  }
			  svg{
			    background-color:rgba(84,108,170,1);
			  }
			  body{
			    width: 100%;
			    height: 100%;
			    margin: 0;
			    background-color:rgba(84,108,170,1);
			    color:rgba(255, 255, 255, 0.7);
			    overflow:hidden;
			  }
			  .geo-globe {
			    fill: rgba(250,250,250,0.1);
			  }
			  .geo-path {
			    fill: #7185b8; 
			    stroke: #c0c0c0;
			    stroke-width: 0.5;
			  }
			  .geo-path:hover {
			  /*fill: #3B5998;*/
			  }
			  .geo-node {
			    stroke-width: 0.0;
			    stroke: rgba(255, 0, 10, 0.66); 
			    fill: rgba(255, 0, 10, 0.66); 
			    cursor: pointer;                
			  }
			  .geo-node:hover {
						stroke: #a00;
			    fill: #a00;*/
			  }
	
			  @font-face {font-family: ExpediaIcons; src: url('../fonts/ExpediaIcons.ttf');}
			  @font-face {font-family: ExpediaStraightPlanes; src: url('../fonts/ExpediaStraightPlanes.ttf');}
			  @font-face {font-family: ExpediaIcons2; src: url('../fonts/ExpediaIcons2.ttf');}

			  .Apip {
			    color:rgba(255, 210, 0, 1);
			  }
			  .EMain { 
			    color:rgba(231,231,231,1);
			  }
			  .Chameleon { 
			    color:rgba(198,255,202,1);
			  }
			  .Mobile { 
			    color:rgba(255, 191, 153,1);
			  }
			  p { padding:0;margin:0;}
			  h1 {padding:5px;margin:0;font-size:125%;font-weight:normal;}
			  #infoBox {padding:0.5em;margin:0.5em;display:none;}
			  #infoBox p{padding-left:1em;}
			  #versionBox {
			    display:none;
			    width:50em;
			    background: rgba(255, 240, 0, 0.85);
			    border-radius: 10px;
			    border-style:solid;
			    border-color:rgba(255, 255, 255, 0.75);
			    border-width:4px;
			    padding:1em;
			    color:black;
			    position:absolute;
			    left:25%;
			    top:100%;
			    opacity:0;
			    }
			  #legend {text-align:center;}
			  #contactText{margin-top:1em;}
			  #versionText{margin-top:1em;font-size:75%;}
			  #reset a{float:right;margin-top:-4.5em;padding:2em 1em 1em 6em;}
			  #about {float:right;margin-top:-1.75em;padding-right:.5em;cursor:pointer;}
		  </style>

		  <script type="text/javascript" src="../js/d3.min.js"></script>
		  <script type="text/javascript" src="../js/topojson.v0.min.js"></script>

  </head>

		<body onload='javascript:resizeIframe(this);'>
	  <script>
	
	  var indexIncrement1 = 'drawPing1';
	  var indexIncrement2 = 'drawPing2';
	
	  var element = 'body'
	
	  var originPings;
	  var destPings;
	  var destPingsSubType1;
	  var destPingsSubType2;
	  var LOB;
	  var pingData;
	  var movingPings;
	  var movingLines;
	  var numberOfBookingsLastMinute;
	  var dateOfLastBooking;
	  var TEALEAFTIMESTAMPPST;
	  var version;
	  var stale = "";
	  var displayAbout = 0;
	  var versionBox;
	
	  var ApipColor = "rgba(255, 210, 0, 0.6)";
	  var EMainColor = "rgba(255,10,0,0.6)";
	  var MobileWebColor = "rgba(140,0,200,1)";
	  var E3ColorOrigin = "rgba(255, 210, 0, 0.6)";
	
	  var refreshRate = 62;
	
	  var projection = d3.geo.mercator()
	      .scale(250)
	      .translate([775,500]);
	
	  var path = d3.geo.path()
	      .projection(projection);
	
	  var longitude = function(d) { 
	                     LOB = [d.LOB]+"";
	                     if(LOB=='hot'||LOB=='car') {
	                      return projection([d.LONGITUDE, d.LATITUDE])[0]-15;
	                     } else if (LOB=='flt'||LOB.match(/pkg/)=='pkg') {
	                      return projection([d.ORIG_LONGITUDE, d.ORIG_LATITUDE])[0]-15;
	                     }
	                  };
	             
	  var latitude= function(d) { 
	                     LOB = [d.LOB]+"";
	                    if(LOB=='hot'||LOB=='car') {
	                      return projection([d.LONGITUDE, d.LATITUDE])[1]+5;
	                     } else if (LOB=='flt'||LOB.match(/pkg/)=='pkg') {
	                      return projection([d.ORIG_LONGITUDE, d.ORIG_LATITUDE])[1]+5;
	                     }
	                  };
	
	  var destLongitude = function(d) {
	                     LOB = [d.LOB]+"";
	                    if (LOB=='flt'||LOB.match(/pkg/)=='pkg') {
	                      return projection([d.DEST_LONGITUDE, d.DEST_LATITUDE])[0];
	                     }
	                  };
	
	  var destLatitude= function(d) { 
	                    LOB = [d.LOB]+"";
	                    if (LOB=='flt'||LOB.match(/pkg/)=='pkg') {
	                      return projection([d.DEST_LONGITUDE, d.DEST_LATITUDE])[1];
	                      }
	                    };
	
	  var svg = d3.select("body").append("svg:svg")
	            .attr("width", "100%")
	            .attr("height", "90%");
	
	  var world = svg.append('svg:g');
	  var zoomScale = 1; // default  
	
	  var bookings = svg.append('svg:g')
	                  .attr('id', 'bookings');
	  var draw1 = bookings.append('g')
	                .attr('id', 'bookings-'+indexIncrement1);
	  var draw2 = bookings.append('g')
	              .attr('id', 'bookings-'+indexIncrement2);
	
	  d3.json('../json/world-countries.json', function(collection) { 
	          features = world.selectAll('path')
	            .data(collection.features)
	            .enter()
	            .append('svg:path')
	              .attr('class', 'geo-path')
	              .attr('d', path); 
	
	          features.append('svg:title')
	            .text( function(d) { return d.properties.name; });
	        });
	
	  var zoom = d3.behavior.zoom()
	      .on("zoom",function() {
	          features.attr("transform","translate("+ 
	              d3.event.translate.join(",")+")scale("+d3.event.scale+")");
	          features.selectAll("path")  
	              .attr("d", path.projection(projection)); 
	              
	          bookings.attr("transform","translate("+ 
	              d3.event.translate.join(",")+")scale("+d3.event.scale+")");
	          bookings.selectAll("path")  
	              .attr("d", path.projection(projection));
	  });
	
	  var lineTransition = function lineTransition(path) {
	      path.transition()
	          .duration(5500)
	          .attrTween("stroke-dasharray", tweenDash)
	          .each("end", function(d,i) { 
	              ////Uncomment following line to re-transition
	              //d3.select(this).call(transition); 
	              
	              //We might want to do stuff when the line reaches the target,
	              //  like start the pulsating or add a new point or tell the
	              //  NSA to listen to this guy's phone calls
	              //doStuffWhenLineFinishes(d,i);
	          });
	  };
	  var tweenDash = function tweenDash() {
	      //This function is used to animate the dash-array property, which is a
	      //  nice hack that gives us animation along some arbitrary path (in this
	      //  case, makes it look like a line is being drawn from point A to B)
	      var len = this.getTotalLength(),
	          interpolate = d3.interpolateString("0," + len, len + "," + len);
	          
	       var dash ="8,3,5,5";   
	        return function(t) { return  dash};
	        //return function(t) { return dash+","+interpolate(t) };
	  };
	
	  svg.call(zoom)
	
	  var timerAboutClose;
	
	  function showAbout(){
	    versionBox = d3.select("#versionBox");
	    legendBox = d3.select("#legendBox");
	    if (displayAbout == 0) {
	      timerAboutClose = setTimeout(function(){displayAbout = 1;showAbout()}, 30000);
	      versionBox.transition().duration(500).style({opacity:'1.0'}).style("display","block");
	      legendBox.transition().duration(500).style({opacity:'1.0'}).style("display","block");
	      displayAbout = 1;
	      timerAboutClose; // I don't know if this is the best way to do it, but this will automatically close the about pop-up after a given time
	    } else {
	      versionBox.transition().duration(500).style({opacity:'0.0'});
	      versionBox.transition().delay(500).style("display","none");
	      legendBox.transition().duration(500).style({opacity:'0.0'});
	      legendBox.transition().delay(500).style("display","none");
	      displayAbout = 0;
	      clearTimeout(timerAboutClose);
	    }
	  }
	
	  // We want to be able to force a page refresh when the bookingmap is updated. 
	  // Some people will leave this map running on a monitor 24/7, and we don't want to deal with manual update notifications.
	  // the map should just know to refresh itself when there is a new version
	  /*
	function versionCheck(currentVersion){
	            d3.csv("version.csv", function(error, data) {
	              version = data[0].version;
	              changeLog = data[0].changeLog;
	              date = data[0].date;
	              d3.select("#versionText").text("Current Version "+version+" ("+date+"): "+changeLog);
	              if (currentVersion == null) {return;} //if versionCheck is called with no version #, do nothing
	                else if (version == currentVersion) {return;} // if the current version is the same, do nothing
	                else {location.reload();} // if the current version is different from the version # on the server, refresh the page
	            })
	  }
	*/
	
	 /*
	 function drawPing(lastTimeStamp, currentVersion){
	          versionCheck(currentVersion);
	          
	          d3.csv("../data/bookings.csv", function(error, data) {
	          // we don't want to animate a data set we just finished animating. To make sure that never happens, when we call the new drawPing function,
	          // we pass it the first timestamp of the file we just finished animating. If the file is stale, the timestamps will match and it will check for a new file
	          
	          currentVersion = version;
	
	          if(error){ // if the bookings.csv file is unavailable, the function errors. We then update the infobox with an error message and start checking for the file every few seconds.
	            setTimeout(function(){refreshData(lastTimeStamp)}, 4500);
	            d3.select("#numberOfBookingsLastMinute").text("Data file unavailable");
	            return; // return to break out of the function, so we don't keep going through the code.
	          } else {
	            var dataLength = data.length;
	          }
	
	          if(dataLength<1){ // if the bookings.csv file is available but empty, then update the infobox with an error message and start checking for the file every few seconds.
	            setTimeout(function(){refreshData(lastTimeStamp)}, 4500);
	            d3.select("#numberOfBookingsLastMinute").text("Data file empty");
	            return;
	          } else {
	            TEALEAFTIMESTAMPPST = data[0].TEALEAFTIMESTAMPPST; 
	          }
	
	          if (lastTimeStamp == TEALEAFTIMESTAMPPST){ // if the data file is stale, we can message that fact but then go ahead and re-animate it.
	            stale = " (stale data) ";
	          } else {
	            stale = "";
	          }
	
	          var movingLine = [];
	          var delayTime = (refreshRate*1000)/dataLength; // Controls the duration of each ping's animation, in milliseconds. By setting the value to the 'refreshRate / total number of pings', it is forced to take exactly the duration of the refreshRate to animate all the data.
	
	          pingData = draw1.selectAll("g")
	                .data(data)
	                .enter()
	                .append("g")
	                .attr('id',function(d,i){return "g"+"-"+indexIncrement1+"-"+i})
	                .attr('class',function(d,i){return indexIncrement1});
	               
	            originPings = pingData.append("text")
	              .text(function(d) {
	                     LOB = [d.LOB]+"";
	                     if(LOB.match(/flt/)=='flt'){ // only flights get origin pings
	                                  if(LOB.match(/pkg/)=='pkg'){return "";} // standalone package
	                     else return "";} // standalone flight
	             })
	             .style("font-family","ExpediaIcons")
	             .style("font-size","25px")
	             .style("fill", function(d) {
	                     if([d.ISMOBILE]==1){return MobileWebColor;} // faded red
	                     if([d.E3ID]>1){return E3ColorOrigin;} // faded yellow
	                     if([d.EMAINID]>1){return EMainColorOrigin;} // faded red
	             })
	             .attr('class', 'geo-node')
	             .attr('class', 'origin')
	             .attr("x", longitude)
	             .attr("y", latitude)
	             .attr('id',function(d,i){return "O"+"-"+indexIncrement1+"-"+i})
	             .attr('class',function(d,i){return indexIncrement1})
	             .style({opacity:'0.0'})
	             ;
	            
	           destPings = pingData
	             .append("text")
	             .text(function(d) {
	                     LOB = [d.LOB]+"";
	                     if(LOB=='hot'){return "";} // the ExpediaIcons are graphics like cars and planes
	                     if(LOB=='car'){return "";}
	                     if(LOB=='flt'){return "";}
	                     if(LOB.match(/pkg/)=='pkg'){return "";} // standalone package
	             })
	             .style("font-family","ExpediaIcons")
	             .style("font-size","25px")
	             .style("fill", function(d) {
	                     if([d.ISMOBILE]==1){return MobileWebColor;} // purple
	                     if([d.E3ID]>1){return ApipColor;} // yellow
	                     if([d.EMAINID]>1){return EMainColor;} // red
	             })
	             .attr('class', 'geo-node')
	             .attr('class', 'destination')
	             .attr("x", function(d) { LOB = [d.LOB]+""; if (LOB.match(/flt/)=='flt') { return projection([d.DEST_LONGITUDE, d.DEST_LATITUDE])[0]-15; }else return projection([d.LONGITUDE, d.LATITUDE])[0]-20;}) // the -20 and -5 are added to try to line the ping up on the center of the coordinates
	             .attr("y", function(d) { LOB = [d.LOB]+""; if (LOB.match(/flt/)=='flt') { return projection([d.DEST_LONGITUDE, d.DEST_LATITUDE])[1]+5;}else return projection([d.LONGITUDE, d.LATITUDE])[1]-5;})
	             .attr('id',function(d,i){return "D"+"-"+indexIncrement1+"-"+i})
	             .attr('class',function(d,i){return indexIncrement1})
	             .style({opacity:'0.0'})
	             ;
	
	            destPingsSubType1 = pingData.append("text")
	              .text(function(d) {
	                     LOB = [d.LOB]+"";
	                       if(LOB.match(/pkg/)=='pkg'){
	                        if(LOB.match(/car/)=='car') {return ""} // package + car
	                       }
	             })
	             .style("font-family","ExpediaIcons")
	             .style("font-size","15px")
	             .style("fill", function(d) {
	                     if([d.ISMOBILE]==1){return MobileWebColor;} // faded red
	                     if([d.E3ID]>1){return E3ColorOrigin;} // faded yellow
	                     if([d.EMAINID]>1){return EMainColorOrigin;} // faded red
	             })
	             .attr('class', 'geo-node')
	             .attr('class', 'origin')
	             .attr("x", function(d){return projection([d.LONGITUDE, d.LATITUDE])[0]+11}) //offset the subtype so it is next to the main LOB icon
	             .attr("y", function(d) {return projection([d.LONGITUDE, d.LATITUDE])[1]+10;})
	             .attr('id',function(d,i){return "DS1"+"-"+indexIncrement1+"-"+i})
	             .attr('class',function(d,i){return indexIncrement1})
	             .style({opacity:'0.0'})
	             ;
	
	            destPingsSubType2 = pingData.append("text")
	              .text(function(d) {
	                     LOB = [d.LOB]+"";
	                       if(LOB.match(/pkg/)=='pkg'){
	                        if(LOB.match(/lx/)=='lx') {return ""} // package + lx
	                       }
	             })
	             .style("font-family","ExpediaIcons2")
	             .style("font-size","15px")
	             .style("fill", function(d) {
	                     if([d.ISMOBILE]==1){return MobileWebColor;} // faded red
	                     if([d.E3ID]>1){return E3ColorOrigin;} // faded yellow
	                     if([d.EMAINID]>1){return EMainColorOrigin;} // faded red
	             })
	             .attr('class', 'geo-node')
	             .attr('class', 'origin')
	             .attr("x", function(d){return projection([d.LONGITUDE, d.LATITUDE])[0]+11}) //offset the subtype so it is next to the main LOB icon
	             .attr("y", function(d) {return projection([d.LONGITUDE, d.LATITUDE])[1]-7;})
	             .attr('id',function(d,i){return "DS1"+"-"+indexIncrement1+"-"+i})
	             .attr('class',function(d,i){return indexIncrement1})
	             .style({opacity:'0.0'})
	             ;
	
	      numberOfBookingsLastMinute="Bookings last minute: "+data.length+stale;
	      dateOfLastBooking=data[0].TEALEAFTIMESTAMPPST;
	      infoBox = d3.select("#infoBox");
	      
	      updateNumberOfBookingsLastMinute = infoBox.selectAll("#numberOfBookingsLastMinute").text(numberOfBookingsLastMinute);
	
	      updateDateOfLastBooking = infoBox.selectAll("#dateOfLastBooking")
	                    .text(function(d,i) {return ""+dateOfLastBooking.replace(/\.0$/,'')})
	
	   for(var i=0, len=data.length; i<len; i++){
	    LOB = [data[i].LOB]+"";
	    if(LOB.match(/flt/)=='flt') { 
	          movingLine.push({
	              type: "LineString",
	              coordinates: [
	                          [[data[i].ORIG_LONGITUDE], [data[i].ORIG_LATITUDE]]
	                          , [[data[i].DEST_LONGITUDE], [data[i].DEST_LATITUDE]]
	              ],
	              properties:"properties",
	                E3ID: [
	                            [[data[i].E3ID]]
	                ],
	                EMAINID: [
	                            [[data[i].EMAINID]]
	                ]
	          });
	      } else { // if it isn't a flight or pkg product, then it doesn't have two points to draw a line to. So we 'draw a line' with no length. This is required to keep the 'for loop' of the line drawing function in synch with the rest of the data loop.
	          movingLine.push({
	              type: "LineString",
	              coordinates: [
	                          [[data[i].LONGITUDE], [data[i].LATITUDE]]
	                          , [[data[i].LONGITUDE], [data[i].LATITUDE]]
	              ],
	              properties:"properties",
	                E3ID: [
	                            [[data[i].E3ID]]
	                ],
	                EMAINID: [
	                            [[data[i].EMAINID]]
	                ],
	                Date: [
	                            [[data[i].TEALEAFTIMESTAMPPST]]
	                ]
	          });
	      }
	  }
	
	*/
	
	function drawPing(){
	
	          d3.csv("../data/bookings.csv", function(error, data) {
	          // we don't want to animate a data set we just finished animating. To make sure that never happens, when we call the new drawPing function,
	          // we pass it the first timestamp of the file we just finished animating. If the file is stale, the timestamps will match and it will check for a new file
	 
											var dataLength = data.length;                   
	
	          var movingLine = [];
	          var delayTime = (refreshRate*1000)/dataLength; // Controls the duration of each ping's animation, in milliseconds. By setting the value to the 'refreshRate / total number of pings', it is forced to take exactly the duration of the refreshRate to animate all the data.
	
	          pingData = draw1.selectAll("g")
	                .data(data)
	                .enter()
	                .append("g")
	                .attr('id',function(d,i){return "g"+"-"+indexIncrement1+"-"+i})
	                .attr('class',function(d,i){return indexIncrement1});
	               
	            originPings = pingData.append("text")
	              .text(function(d) {
	                     LOB = [d.LOB]+"";
	                     if(LOB.match(/flt/)=='flt'){ // only flights get origin pings
	                                  if(LOB.match(/pkg/)=='pkg'){return "";} // standalone package
	                     else return "";} // standalone flight
	             })
	             .style("font-family","ExpediaIcons")
	             .style("font-size","25px")
	             .style("fill", function(d) {
	                     if([d.ISMOBILE]==1){return MobileWebColor;} // faded red
	                     if([d.E3ID]>1){return E3ColorOrigin;} // faded yellow
	                     if([d.EMAINID]>1){return EMainColorOrigin;} // faded red
	             })
	             .attr('class', 'geo-node')
	             .attr('class', 'origin')
	             .attr("x", longitude)
	             .attr("y", latitude)
	             .attr('id',function(d,i){return "O"+"-"+indexIncrement1+"-"+i})
	             .attr('class',function(d,i){return indexIncrement1})
	             .style({opacity:'0.0'})
	             ;
	            
	           destPings = pingData
	             .append("text")
	             .text(function(d) {
	                     LOB = [d.LOB]+"";
	                     if(LOB=='hot'){return "";} // the ExpediaIcons are graphics like cars and planes
	                     if(LOB=='car'){return "";}
	                     if(LOB=='flt'){return "";}
	                     if(LOB.match(/pkg/)=='pkg'){return "";} // standalone package
	             })
	             .style("font-family","ExpediaIcons")
	             .style("font-size","25px")
	             .style("fill", function(d) {
	                     if([d.ISMOBILE]==1){return MobileWebColor;} // purple
	                     if([d.E3ID]>1){return ApipColor;} // yellow
	                     if([d.EMAINID]>1){return EMainColor;} // red
	             })
	             .attr('class', 'geo-node')
	             .attr('class', 'destination')
	             .attr("x", function(d) { LOB = [d.LOB]+""; if (LOB.match(/flt/)=='flt') { return projection([d.DEST_LONGITUDE, d.DEST_LATITUDE])[0]-15; }else return projection([d.LONGITUDE, d.LATITUDE])[0]-20;}) // the -20 and -5 are added to try to line the ping up on the center of the coordinates
	             .attr("y", function(d) { LOB = [d.LOB]+""; if (LOB.match(/flt/)=='flt') { return projection([d.DEST_LONGITUDE, d.DEST_LATITUDE])[1]+5;}else return projection([d.LONGITUDE, d.LATITUDE])[1]-5;})
	             .attr('id',function(d,i){return "D"+"-"+indexIncrement1+"-"+i})
	             .attr('class',function(d,i){return indexIncrement1})
	             .style({opacity:'0.0'})
	             ;
	
	            destPingsSubType1 = pingData.append("text")
	              .text(function(d) {
	                     LOB = [d.LOB]+"";
	                       if(LOB.match(/pkg/)=='pkg'){
	                        if(LOB.match(/car/)=='car') {return ""} // package + car
	                       }
	             })
	             .style("font-family","ExpediaIcons")
	             .style("font-size","15px")
	             .style("fill", function(d) {
	                     if([d.ISMOBILE]==1){return MobileWebColor;} // faded red
	                     if([d.E3ID]>1){return E3ColorOrigin;} // faded yellow
	                     if([d.EMAINID]>1){return EMainColorOrigin;} // faded red
	             })
	             .attr('class', 'geo-node')
	             .attr('class', 'origin')
	             .attr("x", function(d){return projection([d.LONGITUDE, d.LATITUDE])[0]+11}) //offset the subtype so it is next to the main LOB icon
	             .attr("y", function(d) {return projection([d.LONGITUDE, d.LATITUDE])[1]+10;})
	             .attr('id',function(d,i){return "DS1"+"-"+indexIncrement1+"-"+i})
	             .attr('class',function(d,i){return indexIncrement1})
	             .style({opacity:'0.0'})
	             ;
	
	            destPingsSubType2 = pingData.append("text")
	              .text(function(d) {
	                     LOB = [d.LOB]+"";
	                       if(LOB.match(/pkg/)=='pkg'){
	                        if(LOB.match(/lx/)=='lx') {return ""} // package + lx
	                       }
	             })
	             .style("font-family","ExpediaIcons2")
	             .style("font-size","15px")
	             .style("fill", function(d) {
	                     if([d.ISMOBILE]==1){return MobileWebColor;} // faded red
	                     if([d.E3ID]>1){return E3ColorOrigin;} // faded yellow
	                     if([d.EMAINID]>1){return EMainColorOrigin;} // faded red
	             })
	             .attr('class', 'geo-node')
	             .attr('class', 'origin')
	             .attr("x", function(d){return projection([d.LONGITUDE, d.LATITUDE])[0]+11}) //offset the subtype so it is next to the main LOB icon
	             .attr("y", function(d) {return projection([d.LONGITUDE, d.LATITUDE])[1]-7;})
	             .attr('id',function(d,i){return "DS1"+"-"+indexIncrement1+"-"+i})
	             .attr('class',function(d,i){return indexIncrement1})
	             .style({opacity:'0.0'})
	             ;
	
	      numberOfBookingsLastMinute="Bookings last minute: "+dataLength;
	      dateOfLastBooking=data[0].TEALEAFTIMESTAMPPST;
	      infoBox = d3.select("#infoBox");
	      
	      updateNumberOfBookingsLastMinute = infoBox.selectAll("#numberOfBookingsLastMinute").text(numberOfBookingsLastMinute);
	
	   for(var i=0, len=data.length; i<len; i++){
	    LOB = [data[i].LOB]+"";
	    if(LOB.match(/flt/)=='flt') { 
	          movingLine.push({
	              type: "LineString",
	              coordinates: [
	                          [[data[i].ORIG_LONGITUDE], [data[i].ORIG_LATITUDE]]
	                          , [[data[i].DEST_LONGITUDE], [data[i].DEST_LATITUDE]]
	              ],
	              properties:"properties",
	                E3ID: [
	                            [[data[i].E3ID]]
	                ],
	                EMAINID: [
	                            [[data[i].EMAINID]]
	                ]
	          });
	      } else { // if it isn't a flight or pkg product, then it doesn't have two points to draw a line to. So we 'draw a line' with no length. This is required to keep the 'for loop' of the line drawing function in synch with the rest of the data loop.
	          movingLine.push({
	              type: "LineString",
	              coordinates: [
	                          [[data[i].LONGITUDE], [data[i].LATITUDE]]
	                          , [[data[i].LONGITUDE], [data[i].LATITUDE]]
	              ],
	              properties:"properties",
	                E3ID: [
	                            [[data[i].E3ID]]
	                ],
	                EMAINID: [
	                            [[data[i].EMAINID]]
	                ],
	                Date: [
	                            [[data[i].TEALEAFTIMESTAMPPST]]
	                ]
	          });
	      }
	  }
	
	          // Standard enter / update 
	          var pathArcs = draw1.selectAll(".arc")
	              .data(movingLine);
	
	          //enter
	          pathArcs.enter()
	              .append("path")
	              .attr('id',function(d,i){return "movingLine"+"-"+indexIncrement1+"-"+i})
	              .attr('class',function(d,i){return indexIncrement1})
	              .attr('class',function(d,i){return indexIncrement1 + ' arc'})
	              .style({ 
	                  fill: "none",
	              });
	
	          //update
	          pathArcs.attr({
	                  //d is the points attribute for this path, we'll draw
	                  //  an arc between the points using the arc function
	                  d: path
	              })
	              .style({
	                  'stroke-width': '2px',
	                  opacity:'0.0'
	              })
	             .style("stroke", function(d) {
	                     if([d.ISMOBILE]==1){return MobileWebColor;} // purple
	                     if([d.E3ID]>1){return ApipColor;} // yellow
	                     if([d.EMAINID]>1){return EMainColor;} // red
	             });
	
	        var movingPingsPath = draw1.selectAll(".textPath")
	        .data(data)
	        .enter().append("text")
	        .attr('id',function(d,i){return "text"+"-"+indexIncrement1+"-"+i})
	        .attr('class',function(d,i){return indexIncrement1 + ' pathText'})
	        .style("font-family","ExpediaStraightPlanes")
	        .style("font-size","166%")
	        .style({opacity:'0.0'})
	        .style("fill", function(d) {
	                     if([d.ISMOBILE]==1){return MobileWebColor;} // purple
	                     if([d.E3ID]>1){return ApipColor;} // yellow
	                     if([d.EMAINID]>1){return EMainColor;} // red
	             })
	         .attr("dy",8) // the dy 8 moves the plane icon so it is on the line instead of above it.
	         ;
	        
	        var movingPingsTextPath = movingPingsPath
	              .append("textPath")
	              .attr("xlink:href",function(d,i){return "#movingLine"+"-"+indexIncrement1+"-"+i})
	              .attr("startOffset",0)
	              .text(function(d) {
	                     LOB = [d.LOB]+"";
	                     if(LOB=='flt'){return "";} // the ExpediaIcons are graphics like cars and planes
	                     if(LOB.match(/pkg/)=='pkg'){return "";}
	                     //return "V"
	             });
	           
	           originPings.transition()
	             .style({opacity:'1.0'})
	             .duration(1500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime; });
	
	           originPings.transition()
	             .style({opacity:'0.0'})
	             .duration(1000) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime+3000; });
	
	           movingPingsPath.transition()
	             .style({opacity:'1.0'})
	             .duration(250) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime; });
	             
	           movingPingsTextPath.transition()
	             .duration(2500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime+250; })
	             .attr("startOffset",1);
	
	           movingPingsPath.transition()
	             .style({opacity:'0.0'})
	             .duration(1500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime+5000; });
	
	           pathArcs.transition()
	             .style({opacity:'1.0'})
	             .duration(3000) // the total time each data point will remain on screen in milliseconds
	             //.styleTWeen("stroke-dasharray", ("3, 3, 5, 5"))
	             .attrTween("stroke-dasharray", tweenDash)
	             .delay(function(d, i) { return i * delayTime; });
	
	           pathArcs.transition()
	             .style({opacity:'0.0'})
	             .duration(500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime+3250; });
	
	            destPings.transition()
	             .style({opacity:'1.0'})
	             .duration(1500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime; })
	             .each("end",function(d, i){
	                  dateOfLastBooking = [d.TEALEAFTIMESTAMPPST]+""; // convert the value to a string so the replace works
	                  infoBox.selectAll("#dateOfLastBooking").text(function() {return ""+dateOfLastBooking.replace(/\.0$/,'');})
	                });
	
	             destPings.transition()
	             .style({opacity:'0.0'})
	             .duration(500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime+4500; })
	             .each("end",function(d, i){if (i == Math.round((dataLength-1)*.95)){ // if a very small number of pings are returned, like 2, then this math makes sure the lastish ping will fire off a new request. Likewise if a very large number of pings is returned.
	                        drawPing2(TEALEAFTIMESTAMPPST, currentVersion); // I want the 'almost last' ping to refresh the data with the parallel drawPing function.
	                        } else if (i == dataLength-1) {
	                        bookings.selectAll(".drawPing1").remove(); // I want the last ping to clear all of the current functions pings.
	                        }
	                        });
	
	            destPingsSubType1.transition()
	             .style({opacity:'1.0'})
	             .duration(1500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime; });
	
	             destPingsSubType1.transition()
	             .style({opacity:'0.0'})
	             .duration(500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime+4500; });
	
	            destPingsSubType2.transition()
	             .style({opacity:'1.0'})
	             .duration(1500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime; });
	
	             destPingsSubType2.transition()
	             .style({opacity:'0.0'})
	             .duration(500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime+4500; });
	
	             pingData
	             .transition()
	             .duration(2000) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime+4000; })
	             .remove();
	         });
	  }
	
	  // in order to achieve a fluid animation with no pause in between data collections, I want to have two drawPings running side by side.
	  // the idea is that the first drawPing will call the second drawPing when it is almost out of pings to draw. The second draw ping will load the next data
	  // and start drawing its pings before the first drawPing has entirely run out. The second drawPing will then call the first and the cycle will continue.
	  // when the first drawPing just calls itself, it has to wait for all of its current pings to clear, which results in the map going dead for a fraction of a second.
	  // in order to avoid element ID collisions, drawPing2 prepends a number to all of its IDs. This can probably be better done with one function that recursively calls
	  // itself, but I have not been able to get that to work smoothly.
	  function drawPing2(lastTimeStamp, currentVersion){
	          versionCheck(currentVersion);
	          
	          d3.csv("data/bookings.csv", function(error, data) {
	          // we don't want to animate a data set we just finished animating. To make sure that never happens, when we call the new drawPing function,
	          // we pass it the first timestamp of the file we just finished animating. If the file is stale, the timestamps will match and it will check for a new file
	          
	          window.alert(error);
	          
	          currentVersion = version;
	
	          if(error){ // if the bookings.csv file is unavailable, the function errors. We then update the infobox with an error message and start checking for the file every few seconds.
	            setTimeout(function(){refreshData(lastTimeStamp)}, 4500);
	            d3.select("#numberOfBookingsLastMinute").text("Data file unavailable");
	            return; // return to break out of the function, so we don't keep going through the code.
	          } else {
	            var dataLength = data.length;
	          }
	
	          if(dataLength<1){ // if the bookings.csv file is available but empty, then update the infobox with an error message and start checking for the file every few seconds.
	            setTimeout(function(){refreshData(lastTimeStamp)}, 4500);
	            d3.select("#numberOfBookingsLastMinute").text("Data file empty");
	            return;
	          } else {
	            TEALEAFTIMESTAMPPST = data[0].TEALEAFTIMESTAMPPST; 
	          }
	
	          if (lastTimeStamp == TEALEAFTIMESTAMPPST){ // if the data file is stale, we can message that fact but then go ahead and re-animate it.
	            stale = " (stale data) ";
	          } else {
	            stale = "";
	          }
	
	          var movingLine = [];
	          var delayTime = (refreshRate*1000)/dataLength; // Controls the duration of each ping's animation, in milliseconds. By setting the value to the 'refreshRate / total number of pings', it is forced to take exactly the duration of the refreshRate to animate all the data.
	
	          pingData = draw2.selectAll("g")
	                .data(data)
	                .enter()
	                .append("g")
	                .attr('id',function(d,i){return "g"+"-"+indexIncrement2+"-"+i})
	                .attr('class',function(d,i){return indexIncrement2});
	               
	            originPings = pingData.append("text")
	              .text(function(d) {
	                     LOB = [d.LOB]+"";
	                     if(LOB.match(/flt/)=='flt'){ // only flights get origin pings
	                                  if(LOB.match(/pkg/)=='pkg'){return "";} // standalone package
	                     else return "";} // standalone flight
	             })
	             .style("font-family","ExpediaIcons")
	             .style("font-size","25px")
	             .style("fill", function(d) {
	                     if([d.ISMOBILE]==1){return MobileWebColor;} // faded red
	                     if([d.E3ID]>1){return E3ColorOrigin;} // faded yellow
	                     if([d.EMAINID]>1){return EMainColorOrigin;} // faded red
	             })
	             .attr('class', 'geo-node')
	             .attr('class', 'origin')
	             .attr("x", longitude)
	             .attr("y", latitude)
	             .attr('id',function(d,i){return "O"+"-"+indexIncrement2+"-"+i})
	             .attr('class',function(d,i){return indexIncrement2})
	             .style({opacity:'0.0'})
	             ;
	             
	           destPings = pingData
	             .append("text")
	             .text(function(d) {
	                     LOB = [d.LOB]+"";
	                     if(LOB=='hot'){return "";} // the ExpediaIcons are graphics like cars and planes
	                     if(LOB=='car'){return "";}
	                     if(LOB=='flt'){return "";}
	                     if(LOB.match(/pkg/)=='pkg'){return "";} // standalone package
	             })
	             .style("font-family","ExpediaIcons")
	             .style("font-size","25px")
	             .style("fill", function(d) {
	                     if([d.ISMOBILE]==1){return MobileWebColor;} // purple
	                     if([d.E3ID]>1){return ApipColor;} // yellow
	                     if([d.EMAINID]>1){return EMainColor;} // red
	             })
	             .attr('class', 'geo-node')
	             .attr('class', 'destination')
	             .attr("x", function(d) { LOB = [d.LOB]+""; if (LOB.match(/flt/)=='flt') { return projection([d.DEST_LONGITUDE, d.DEST_LATITUDE])[0]-15; }else return projection([d.LONGITUDE, d.LATITUDE])[0]-20;}) // the -20 and -5 are added to try to line the ping up on the center of the coordinates
	             .attr("y", function(d) { LOB = [d.LOB]+""; if (LOB.match(/flt/)=='flt') { return projection([d.DEST_LONGITUDE, d.DEST_LATITUDE])[1]+5;}else return projection([d.LONGITUDE, d.LATITUDE])[1]-5;})
	             .attr('id',function(d,i){return "D"+"-"+indexIncrement2+"-"+i})
	             .attr('class',function(d,i){return indexIncrement2})
	             .style({opacity:'0.0'})
	             ;
	
	            destPingsSubType1 = pingData.append("text")
	              .text(function(d) {
	                     LOB = [d.LOB]+"";
	                     if(LOB.match(/pkg/)=='pkg'){
	                      if(LOB.match(/car/)=='car') {return ""} // package + car
	                     }
	             })
	             .style("font-family","ExpediaIcons")
	             .style("font-size","15px")
	             .style("fill", function(d) {
	                     if([d.ISMOBILE]==1){return MobileWebColor;} // faded red
	                     if([d.E3ID]>1){return E3ColorOrigin;} // faded yellow
	                     if([d.EMAINID]>1){return EMainColorOrigin;} // faded red
	             })
	             .attr('class', 'geo-node')
	             .attr('class', 'origin')
	             .attr("x", function(d){return projection([d.LONGITUDE, d.LATITUDE])[0]+11}) //offset the subtype so it is next to the main LOB icon
	             .attr("y", function(d) {return projection([d.LONGITUDE, d.LATITUDE])[1]+10;})
	             .attr('id',function(d,i){return "DS1"+"-"+indexIncrement2+"-"+i})
	             .attr('class',function(d,i){return indexIncrement2})
	             .style({opacity:'0.0'})
	             ;
	
	            destPingsSubType2 = pingData.append("text")
	              .text(function(d) {
	                     LOB = [d.LOB]+"";
	                       if(LOB.match(/pkg/)=='pkg'){
	                        if(LOB.match(/lx/)=='lx') {return ""} // package + lx
	                       }
	             })
	             .style("font-family","ExpediaIcons2")
	             .style("font-size","15px")
	             .style("fill", function(d) {
	                     if([d.ISMOBILE]==1){return MobileWebColor;} // faded red
	                     if([d.E3ID]>1){return E3ColorOrigin;} // faded yellow
	                     if([d.EMAINID]>1){return EMainColorOrigin;} // faded red
	             })
	             .attr('class', 'geo-node')
	             .attr('class', 'origin')
	             .attr("x", function(d){return projection([d.LONGITUDE, d.LATITUDE])[0]+11}) //offset the subtype so it is next to the main LOB icon
	             .attr("y", function(d) {return projection([d.LONGITUDE, d.LATITUDE])[1]-7;})
	             .attr('id',function(d,i){return "DS1"+"-"+indexIncrement2+"-"+i})
	             .attr('class',function(d,i){return indexIncrement2})
	             .style({opacity:'0.0'})
	             ;
	
	      numberOfBookingsLastMinute="Bookings last minute: "+data.length+stale;
	      dateOfLastBooking=data[0].TEALEAFTIMESTAMPPST;
	      infoBox = d3.select("#infoBox");
	      
	      updateNumberOfBookingsLastMinute = infoBox.select("#numberOfBookingsLastMinute").text(numberOfBookingsLastMinute);
	
	      updateDateOfLastBooking = infoBox.selectAll("#dateOfLastBooking")
	                    .text(function(d,i) {return ""+dateOfLastBooking})
	
	   for(var i=0, len=data.length; i<len; i++){
	    LOB = [data[i].LOB]+"";
	    if(LOB.match(/flt/)=='flt') { 
	          movingLine.push({
	              type: "LineString",
	              coordinates: [
	                          [[data[i].ORIG_LONGITUDE], [data[i].ORIG_LATITUDE]]
	                          , [[data[i].DEST_LONGITUDE], [data[i].DEST_LATITUDE]]
	              ],
	              properties:"properties",
	                E3ID: [
	                            [[data[i].E3ID]]
	                ],
	                EMAINID: [
	                            [[data[i].EMAINID]]
	                ]
	          });
	      } else { // if it isn't a flight or pkg product, then it doesn't have two points to draw a line to. So we 'draw a line' with no length. This is required to keep the 'for loop' of the line drawing function in synch with the rest of the data loop.
	          movingLine.push({
	              type: "LineString",
	              coordinates: [
	                          [[data[i].LONGITUDE], [data[i].LATITUDE]]
	                          , [[data[i].LONGITUDE], [data[i].LATITUDE]]
	              ],
	              properties:"properties",
	                E3ID: [
	                            [[data[i].E3ID]]
	                ],
	                EMAINID: [
	                            [[data[i].EMAINID]]
	                ],
	                Date: [
	                            [[data[i].TEALEAFTIMESTAMPPST]]
	                ]
	          });
	      }
	  }
	
	          // Standard enter / update 
	          var pathArcs = draw2.selectAll(".arc")
	              .data(movingLine);
	
	          //enter
	          pathArcs.enter()
	              .append("path")
	              .attr('id',function(d,i){return "movingLine"+"-"+indexIncrement2+"-"+i})
	              .attr('class',function(d,i){return indexIncrement2})
	              .attr('class',function(d,i){return indexIncrement2 + ' pathText'})
	              .style({ 
	                  fill: "none",
	              });
	
	          //update
	          pathArcs.attr({
	                  //d is the points attribute for this path, we'll draw
	                  //  an arc between the points using the arc function
	                  d: path
	              })
	              .style({
	                  'stroke-width': '2px',
	                  opacity:'0.0'
	              })
	             .style("stroke", function(d) {
	                     if([d.ISMOBILE]==1){return MobileWebColor;} // purple
	                     if([d.E3ID]>1){return ApipColor;} // yellow
	                     if([d.EMAINID]>1){return EMainColor;} // red
	             });
	
	        var movingPingsPath = draw2.selectAll(".textPath")
	        .data(data)
	        .enter().append("text")
	        .attr('id',function(d,i){return "text"+"-"+indexIncrement2+"-"+i})
	        .attr('class',function(d,i){return indexIncrement2 + ' pathText'})
	        .style("font-family","ExpediaStraightPlanes")
	        .style("font-size","166%")
	        .style({opacity:'0.0'})
	        .style("fill", function(d) {
	                     if([d.ISMOBILE]==1){return MobileWebColor;} // purple
	                     if([d.E3ID]>1){return ApipColor;} // yellow
	                     if([d.EMAINID]>1){return EMainColor;} // red
	             })
	         .attr("dy",8) // the dy 8 moves the plane icon so it is on the line instead of above it.
	         ;
	
	        var movingPingsTextPath = movingPingsPath
	              .append("textPath")
	              .attr("xlink:href",function(d,i){return "#movingLine"+"-"+indexIncrement2+"-"+i})
	              .attr("startOffset",0)
	              .text(function(d) {
	                     LOB = [d.LOB]+"";
	                     if(LOB=='flt'){return "";} // the ExpediaIcons are graphics like cars and planes
	                     if(LOB.match(/pkg/)=='pkg'){return "";}
	                     //return "V"
	             });
	
	           originPings.transition()
	             .style({opacity:'1.0'})
	             .duration(1500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime; });
	
	              originPings.transition()
	             .style({opacity:'0.0'})
	             .duration(1000) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime+3000; });
	
	           movingPingsPath.transition()
	             .style({opacity:'1.0'})
	             .duration(250) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime; });
	             
	           movingPingsTextPath.transition()
	             .duration(2500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime+250; })
	             .attr("startOffset",1);
	
	           movingPingsPath.transition()
	             .style({opacity:'0.0'})
	             .duration(1500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime+5000; });
	
	           pathArcs.transition()
	             .style({opacity:'1.0'})
	             .duration(4250) // the total time each data point will remain on screen in milliseconds
	             //.styleTWeen("stroke-dasharray", ("3, 3, 5, 5"))
	             .attrTween("stroke-dasharray", tweenDash)
	             .delay(function(d, i) { return i * delayTime; });
	             
	           pathArcs.transition()
	             .style({opacity:'0.0'})
	             .duration(500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime+3250; });
	
	            destPings.transition()
	             .style({opacity:'1.0'})
	             .duration(1500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime; })
	             .each("end",function(d, i){
	                  dateOfLastBooking = [d.TEALEAFTIMESTAMPPST]+""; // convert the value to a string so the replace works
	                  infoBox.selectAll("#dateOfLastBooking").text(function() {return ""+dateOfLastBooking.replace(/\.0$/,'');})
	                });
	
	             destPings.transition()
	             .style({opacity:'0.0'})
	             .duration(500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime+4500; })
	             .each("end",function(d, i){if (i == Math.round((dataLength-1)*.95)){ // if a very small number of pings are returned, like 2, then this math makes sure the lastish ping will fire off a new request. Likewise if a very large number of pings is returned.
	                        drawPing(TEALEAFTIMESTAMPPST, currentVersion); // I want the 'almost last' ping to refresh the data with the parallel drawPing function.
	                        } else if (i == dataLength-1) {
	                        bookings.selectAll(".drawPing2").remove(); // I want the last ping to clear all of the current functions pings.
	                        }});
	
	            destPingsSubType1.transition()
	             .style({opacity:'1.0'})
	             .duration(1500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime; });
	
	             destPingsSubType1.transition()
	             .style({opacity:'0.0'})
	             .duration(500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime+4500; });
	
	            destPingsSubType2.transition()
	             .style({opacity:'1.0'})
	             .duration(1500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime; });
	
	             destPingsSubType2.transition()
	             .style({opacity:'0.0'})
	             .duration(500) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime+4500; });
	
	             pingData
	             .transition()
	             .duration(2000) // the total time each data point will remain on screen in milliseconds
	             .delay(function(d, i) { return i * delayTime+4000; })
	             .remove();
	         });
	  }
	       function refreshData(lastTimeStamp, currentVersion) {
	               bookings.selectAll(".drawPing1").remove();
	               bookings.selectAll(".drawPing2").remove();
	               drawPing(lastTimeStamp, currentVersion);
	    }
	  </script>
	  <p id="browserWarning">Your browser is not compatible with this awesome global animation. Please use Safari or Chrome. Internet Explorer does not like this page, and Firefox has some minor issues, too.</p>
	  <div id="infoBox">
	 <!--
	   <P><span class="Apip"><b>Partners</b></span> |
	    <span class="EMain"><b>Expedia</b></span> |
	    <span class="Chameleon"><b>Chameleon</b></span> |
	    <span class="Mobile"><b>Mobile</b></span></p>
	-->
	    <p><span id="numberOfBookingsLastMinute">No booking data available</span></p>
	    <p id="reset" title="reset"><a href="./">&nbsp;</a></p>
	  </div>
	
	 <script>
	    d3.select("#browserWarning").remove();
	    d3.select("#infoBox").style("display","inline");
	    drawPing();
	 </script>
	</body>
</html>