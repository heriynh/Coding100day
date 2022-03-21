<!DOCTYPE html>
<html>

<head>
	<meta chartset="utf-8">
	<title>Speed Chart</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style type="text/css">
		.container {
			width: 50%;
			height: 30%;
		}
	</style>
	<script src="js/Chart.js"></script>
	<script src="js/Gauge.js"></script>
</head>

<body>
	<div class="container">
		<div class="row" align="center">
			<canvas id="canvas" width="100" height="100%"></canvas>
		</div>
	</div>
</body>

</html>

<?php $angka = 100; ?>

<script type="text/javascript">
	var ctx = document.getElementById("canvas").getContext("2d");
	new Chart(ctx, {
		type: "tsgauge",
		data: {
			datasets: [{
				backgroundColor: ['#ff0000', '#ffff00', '#008000'],
				borderWidth: 0,
				gaugeData: {
					value: <?php echo $angka; ?>,
					valueColor: "#ff7143"
				},
				gaugeLimits: [0, 35, 70, 100]
			}]
		},
		options: {
			events: [],
			showMarkers: true
		}
	});
</script>