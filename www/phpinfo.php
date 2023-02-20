<script type="text/javascript" src="http://code.highcharts.com/stock/highstock.js"></script>

<div id="container" style="height: 300px"></div>

<script>
	 $(document).ready(function() {  
						var chart = {      
						   type: 'column',
						   marginTop: 40,
						   marginRight: 40,
						       style: {
									fontFamily: ' "\"Lucida Grande\"'
								},
								
						   options3d: {
							  enabled: true,
							  alpha: 0,
							  beta: 0,
						
							  viewDistance: 25,
							  depth: 50,
							      viewDistance: 10,
								frame: {
									bottom: {
										size: 1,
										color: 'rgba(0,0,0,0.05)'
									}
								}
						   }
						};
						var title = {
						   text: 'KPI Calculated, Grouped By Month (click on Legend to Hide/Show Series)'   
						};   
						var xAxis = {
						   categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August', 'September', 'October','November','December'],
						    min: 5
							

						};
						var yAxis = {
						   allowDecimals: false,
						   min: 0,
						   title: {
							  text: 'KPI Value'
						   }
						};  
						var zAxis = {
						   allowDecimals: false,
						   min: 0
						};  
				
						var plotOptions = {
						   column: {
							  stacking: 'normal',
							  depth: 20
						   }

						};
						
						var scrollbar = {
							  scrollbar: {
									enabled: true
						}};
						
						var series = [{
							  name: 'GC 5.6',
							  data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
							  stack: '1',
							  color: '#4e73df'

						   }, {
							  name: 'GC 5.7',
							  data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
							  stack: '2',
							  color: '#1cc88a'

						   }, {
							  name: 'GC 5.1.1',
							  data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
							  stack: '3',
							  color: '#36b9cc'
						   }, {
							  name: 'GC 5.2.1',
							  data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
							  stack: '4',
							  color: '#f6c23e'
						   },
						   {
							  name: 'GC 5.2.2',
							  data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
							  stack: '4',
							  color: '#f6c23e'
						   },
						   {
							  name: 'GC 5.2.3',
							  data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
							  stack: '4',
							  color: '#f6c23e'
						   },
						    {
							  name: 'GC 5.2.4',
							  data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
							  stack: '5',
							  color: '#e74a3b'
							  
						   }
						];
							var credits= {
								enabled: false
							};
					 
						var json = {};   
						json.chart = chart; 
						json.title = title;      
						json.xAxis = xAxis;
						json.credits = credits;
						json.yAxis = yAxis;
						json.zAxis = zAxis;
						json.scrollbar = scrollbar;
						//json.tooltip = tooltip; 
						json.plotOptions = plotOptions; 
						json.series = series;
						$('#container').highcharts(json);
					 });
</script>