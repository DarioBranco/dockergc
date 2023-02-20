function doGraph(jTotalArray) {
		    var ctxP = document.getElementById("pieChartEMix").getContext('2d');
			var jArray = jTotalArray["Energy_Mix"]
			var lab = [];
			var dataNum = [];
			var dataNum2 = [];

			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			
			 var ctxP = document.getElementById("pieChartEMix2").getContext('2d');
			var jArray = jTotalArray["Energy_Mix"]
			var lab = [];
			var dataNum = [];
			var dataNum2 = [];

			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			
			
			var ctxP = document.getElementById("pieChartECost").getContext('2d');
			var jArray = jTotalArray["Energy_Costs"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
			
					 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
			   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
				 var ctxP = document.getElementById("pieChartECost2").getContext('2d');
			var jArray = jTotalArray["Energy_Costs"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			

			var ctxP = document.getElementById("pieChartImpExp").getContext('2d');
			var jArray = jTotalArray["Energy_import_export"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
					 var ctxP = document.getElementById("pieChartImpExp2").getContext('2d');
			var jArray = jTotalArray["Energy_import_export"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
				var ctxP = document.getElementById("piebatterySessions").getContext('2d');
			var jArray = jTotalArray["battery_sessions"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
				
					 var ctxP = document.getElementById("piebatterySessions2").getContext('2d');
			var jArray = jTotalArray["battery_sessions"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
				var ctxP = document.getElementById("pieevchdis").getContext('2d');
			var jArray = jTotalArray["ev_charging_discharging"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
					 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
						 var ctxP = document.getElementById("pieevchdis2").getContext('2d');
			var jArray = jTotalArray["ev_charging_discharging"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
				var ctxP = document.getElementById("pieweather").getContext('2d');
			var jArray = jTotalArray["weather_data"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
							 var ctxP = document.getElementById("pieweather2").getContext('2d');
			var jArray = jTotalArray["weather_data"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
						
				var ctxP = document.getElementById("piesolar_plant_sessions").getContext('2d');
			var jArray = jTotalArray["solar_plant_sessions"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			//console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
			
				var ctxP = document.getElementById("piesolar_plant_sessions2").getContext('2d');
			var jArray = jTotalArray["solar_plant_sessions"]

			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
			
			
			
			
			
			
			
			
			var ctxP = document.getElementById("piewashingsession").getContext('2d');
			var jArray = jTotalArray["washing_sessions"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
						var ctxP = document.getElementById("piewashingsession2").getContext('2d');
			var jArray = jTotalArray["washing_sessions"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
			
			
				var ctxP = document.getElementById("piereservations").getContext('2d');
			var jArray = jTotalArray["reservations_bookings"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
					 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
			
							var ctxP = document.getElementById("piereservations2").getContext('2d');
			var jArray = jTotalArray["reservations_bookings"]

			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
			
			
			
			
				var ctxP = document.getElementById("piePaymentInfo").getContext('2d');
			var jArray = jTotalArray["payment_information"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
								var ctxP = document.getElementById("piePaymentInfo2").getContext('2d');
			var jArray = jTotalArray["payment_information"]

			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
						
			
				var ctxP = document.getElementById("piehssess").getContext('2d');
			var jArray = jTotalArray["heating_cooling_sessions"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
								var ctxP = document.getElementById("piehssess2").getContext('2d');
			var jArray = jTotalArray["heating_cooling_sessions"]

			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
			
			
			
		
			
				
				var ctxP = document.getElementById("piebatmodel").getContext('2d');
			var jArray = jTotalArray["batteries_model"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
				 var ctxP = document.getElementById("piebatmodel2").getContext('2d');
			var jArray = jTotalArray["batteries_model"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
			
			
			
			
			
			
			
			
			
			
			
			
					var ctxP = document.getElementById("pieevmodel").getContext('2d');
			var jArray = jTotalArray["evs_model"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
			var ctxP = document.getElementById("pieevmodel2").getContext('2d');
			var jArray = jTotalArray["evs_model"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
							var ctxP = document.getElementById("piehcmodel").getContext('2d');
			var jArray = jTotalArray["heating_cooling_devices_model"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
				
				 var ctxP = document.getElementById("piehcmodel2").getContext('2d');
			var jArray = jTotalArray["heating_cooling_devices_model"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
			
			
			
			
			
			var ctxP = document.getElementById("pieinverters").getContext('2d');

			var jArray = jTotalArray["inverters_model"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
						 var ctxP = document.getElementById("pieinverters2").getContext('2d');
			var jArray = jTotalArray["inverters_model"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
			var ctxP = document.getElementById("piepvmodels").getContext('2d');

			var jArray = jTotalArray["pv_panels_model"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
					 var ctxP = document.getElementById("piepvmodels2").getContext('2d');
			var jArray = jTotalArray["pv_panels_model"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
				var ctxP = document.getElementById("piesensors").getContext('2d');

			var jArray = jTotalArray["sensors_model"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
					
				 var ctxP = document.getElementById("piesensors2").getContext('2d');
			var jArray = jTotalArray["sensors_model"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
			
					var ctxP = document.getElementById("piewashmodel").getContext('2d');

			var jArray = jTotalArray["washing_machines_model"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}

			var ctxP = document.getElementById("piewashmodel2").getContext('2d');
			var jArray = jTotalArray["washing_machines_model"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			var ctxP = document.getElementById("piebatind").getContext('2d');

			var jArray = jTotalArray["batteries_individual"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}			
						 var ctxP = document.getElementById("piebatind2").getContext('2d');
			var jArray = jTotalArray["batteries_individual"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
			var ctxP = document.getElementById("pieevindividual").getContext('2d');

			var jArray = jTotalArray["evs_individual"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}			
			
			
			var ctxP = document.getElementById("pieevindividual2").getContext('2d');
			var jArray = jTotalArray["evs_individual"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			var ctxP = document.getElementById("piehcind").getContext('2d');

			var jArray = jTotalArray["heating_cooling_individual"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}		
			
			
			var ctxP = document.getElementById("piehcind2").getContext('2d');
			var jArray = jTotalArray["heating_cooling_individual"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
			var ctxP = document.getElementById("piepvind").getContext('2d');

			var jArray = jTotalArray["pv_panels_individual"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}		
					
			var ctxP = document.getElementById("piepvind2").getContext('2d');
			var jArray = jTotalArray["pv_panels_individual"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
			
			
				var ctxP = document.getElementById("piewmind").getContext('2d');

			var jArray = jTotalArray["washing_machines_individual"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}		
			
								
			var ctxP = document.getElementById("piewmind2").getContext('2d');
			var jArray = jTotalArray["washing_machines_individual"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
				var ctxP = document.getElementById("pieCpind").getContext('2d');

			var jArray = jTotalArray["charge_points_individual"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
					 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}		
			
				var ctxP = document.getElementById("pieCpind2").getContext('2d');
			var jArray = jTotalArray["charge_points_individual"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
				var ctxP = document.getElementById("pieem").getContext('2d');

			var jArray = jTotalArray["energy_meters_individual"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
					 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}		
						 var ctxP = document.getElementById("pieem2").getContext('2d');
			var jArray = jTotalArray["energy_meters_individual"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
				
				var ctxP = document.getElementById("pieloc").getContext('2d');

			var jArray = jTotalArray["locations_individual"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
				 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}		
						 var ctxP = document.getElementById("pieloc2").getContext('2d');
			var jArray = jTotalArray["locations_individual"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
				var ctxP = document.getElementById("piepriceInd").getContext('2d');

			var jArray = jTotalArray["price_list_individual"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
					 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}		
							 var ctxP = document.getElementById("piepriceInd2").getContext('2d');
			var jArray = jTotalArray["price_list_individual"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			
			
				var ctxP = document.getElementById("piesoftware").getContext('2d');

			var jArray = jTotalArray["sw_sys_individual"]
			var lab = [];
			var dataNum = [];			var dataNum2 = [];

			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
					 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}		
									 var ctxP = document.getElementById("piesoftware2").getContext('2d');
			var jArray = jTotalArray["sw_sys_individual"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
					var ctxP = document.getElementById("pieTariffs").getContext('2d');

			var jArray = jTotalArray["tariffs_individual"]
			var lab = [];
			var dataNum = [];
			var dataNum2 = [];
			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
					 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}		
					 var ctxP = document.getElementById("pieTariffs2").getContext('2d');
			var jArray = jTotalArray["tariffs_individual"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
								var ctxP = document.getElementById("piesensinv").getContext('2d');

			var jArray = jTotalArray["sensors_individual"]
			var lab = [];
			var dataNum = [];
			var dataNum2 = [];
			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					 

					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
					 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}		
					 var ctxP = document.getElementById("piesensinv2").getContext('2d');
			var jArray = jTotalArray["sensors_individual"]
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
}

function doTotal(jArray) {
			
			var ctxP = document.getElementById("pieTotal").getContext('2d');
			var lab = [];
			var dataNum = [];
			var dataNum2 = [];
			console.log(jArray["Count"]);
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(jArray[key][0]);
					dataNum2.push(jArray[key][1]);

				}
			}
			
		
					 var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: lab,
					datasets: [{
						  label: 'Correct',
						  backgroundColor: "#47C431",
						  data:  dataNum

						}, {
						  label: 'Uncorrect',
						  backgroundColor: "#B22420",
						   data:  dataNum2,
						}
					]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					scales: {
						  xAxes: [{
							stacked: true,
							gridLines: {
							  display: false,
							}
						  }],
						  yAxes: [{
							stacked: true,
							ticks: {
							  beginAtZero: true,
							},
							type: 'linear',
										}]},
					plugins: {
					  datalabels: {
					
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else
			{
		   var myPieChart = new Chart(ctxP, {
				  type: 'bar',
				  data: {
					labels: ["No Data"],
					datasets: [{
					  data:  [0],
					  backgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#47AA2B", "#21587A", "#BC8B3C", "#3CBCB8", "#C65720"],
					  hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#64C644","#2C6F91", "#D19C4E", "#5DDBD5", "#E56E39" ]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},
					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}		
			var ctxP = document.getElementById("pieTotal2").getContext('2d');
			var lab = [];
			var dataNum = [];
			if(jArray["Count"] != 0){
			var keys = Object.keys(jArray);
			for(var i=0; i<keys.length; i++){
				var key = keys[i];
				if(key != "Count"){
					lab.push(key);
					dataNum.push(parseInt(jArray[key][0])+parseInt(jArray[key][1]));
				
				}
				console.log(key, jArray[key]);
			}


					 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: lab,
					datasets: [{
					  data: dataNum,
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
			else{
			 var myPieChart = new Chart(ctxP, {
				  type: 'pie',
				 data: {
					labels: ["Nodata"],
					datasets: [{
					  data: [0],
					  backgroundColor: ["#BC6E33", "#31BC63", "#C4BC30", "#2795B7", "#5C2CB7"],
					  hoverBackgroundColor: ["#D38448", "#48D87C", "#E0D841", "#39ADD1", "#7442D3"]
					}]
				  },
				  options: {
					responsive: true,
					legend: {
					  position: 'top',
					  labels: {
						padding: 20,
						boxWidth: 10
					  }
					},

		
		 					plugins: {
					  datalabels: {
						formatter: (value, ctx) => {
						  let sum = 0;
						  let dataArr = ctx.chart.data.datasets[0].data;
						  dataArr.map(data => {
							sum +=  parseInt(data);
						  });
						  let percentage = (value * 100 / sum).toFixed(2) + "%";
						  return percentage;
						},
						color: 'white',
						labels: {
						  title: {
							font: {
							  size: '12'
							}
						  }
						}
					  }
					}
				  }
				});
			}
}