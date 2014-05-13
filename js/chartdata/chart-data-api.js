// First Chart Example - Area Line Chart

Morris.Area({
  // ID of the element in which to draw the chart.
  element: 'v3api-chart-area',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
	{ d: '2014-05-01', Defects: 29 },
	{ d: '2014-04-17', Defects: 20 },
	{ d: '2014-04-14', Defects: 20 },
  ],
  // The name of the data record attribute that contains x-visitss.
  xkey: 'd',
  // A list of names of data record attributes that contain y-visitss.
  ykeys: ['Defects'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Defects'],
  // Disables line smoothing
  smooth: true,
});

Morris.Area({
  // ID of the element in which to draw the chart.
  element: 'templates-chart-area',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
	{ d: '2014-03-31', Defects: 108 },
  ],
  // The name of the data record attribute that contains x-visitss.
  xkey: 'd',
  // A list of names of data record attributes that contain y-visitss.
  ykeys: ['Defects'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Defects'],
  // Disables line smoothing
  smooth: true,
});

