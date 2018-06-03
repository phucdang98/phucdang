
<!DOCTYPE html>
<html>
<head>
	<!-- Font Awesome -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<title>CHART</title>
	<style type="text/css">
		#chart-container{
			width: 800px;
			margin: 100px auto;
		}
	</style>
</head>
<body>
 <a href="index.php"><img src="images/logo.png" border="0" class="vertical" style="width: 100px;height: 100px;"></a>
 <a href="product.php"><i class="fa fa-motorcycle fa-3x" aria-hidden="true" style="padding-left: 50px">MOTO</i></a>
 <a href="product1.php"><i class="fa fa-newspaper-o fa-3x" aria-hidden="true" style="padding-left: 50px" >NEWS</i></a>
  <a href="chart.php"><i class="fa fa-bar-chart fa-3x" aria-hidden="true" style="padding-left: 50px">CHART</i></a>
  <a href="product2.php"><i class="fa fa-user fa-3x" aria-hidden="true" style="padding-left: 50px" >USER</i></a>
 <a href="index.php"><i class="fa fa-sign-out fa-2x" aria-hidden="true" style="padding-left: 50px">LEAVE</i></a>
<div id="chart-container">
<canvas id="myChart"></canvas>
</div>
<!-- JQuery -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"
		integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

		<script>
			$(document).ready(function(){
				$.ajax({
					url: 'getChartData.php',
					method: 'POST',
					dataType: 'json',
				//data
				}).done(function(data){
					if(data.result){
						var categories = [];
						var numOfProduct = [];
						$.each(data.products, function(index, row){
							categories.push(row.Name);
							numOfProduct.push(row.NumOfProduct);
						})


						var ctx = document.getElementById("myChart").getContext('2d');

						var myChart = new Chart(ctx, {
					   		type: 'bar',
					    data: {
					        labels: categories,
					        datasets: [{
					            label: '# of Products',
					            data: numOfProduct,
					            backgroundColor: getRandomColorArray(categories.length),
					            borderColor: [
					                'rgba(255,99,132,1)',
					                'rgba(54, 162, 235, 1)',
					                'rgba(255, 206, 86, 1)',
					                'rgba(75, 192, 192, 1)',
					                'rgba(153, 102, 255, 1)',
					                'rgba(255, 159, 64, 1)'
					            ],
					            borderWidth: 1
					        }]
					    },
					    options: {
					        scales: {
					            yAxes: [{
					                ticks: {
					                    beginAtZero:true
					                }
					            }]
					        },
					        plugins: {
							datalabels: {
								color: 'white',
								display: function(context) {
									return context.dataset.data[context.dataIndex] > 15;
								},
								
								font: {
									weight: 'bold'
								},
								formatter: Math.round,
								anchor: 'end',
								align: 'start'
							}
						}
					    }
					});
						

					}else{
						console.log(data,message);
					}

				}).fail(function(jqXHR, statusText, errorThrown){
					console.log("Fail:"+jqXHR.responseText);
					console.log(statusText);
				}).always(function(){

				})

			})
			function getRandomColor(){
				var characters = "0123456789ABCDEF".split('');
				var color = '#';
				for (var i=0; i <3;i++) {
					color += characters[Math.floor(Math.random()*16)];
				}
				return color;
			}
			function getRandomColorArray(num){
				var colors =[]
				for(var i =0 ; i< num;i++) {
					colors.push(getRandomColor());
				}
				return colors;
			}

</script>
</body>
</html>
