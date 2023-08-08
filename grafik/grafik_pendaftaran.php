<?php
include('koneksi.php');
$label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

for($bulan = 1;$bulan < 13;$bulan++)
{
	$query = mysqli_query($koneksi,"select  COUNT(IF(pendaftaran = 'online', pendaftaran, NULL)) as online,COUNT(IF(pendaftaran = 'offline', pendaftaran, NULL)) as offline from pengguna where MONTH(tgl_daftar)='$bulan'");
	$row = $query->fetch_array();
	$online[] = $row['online'];
	$offline[] = $row['offline'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pendaftaran</title>
	<script type="text/javascript" src="Chart.js"></script>
	
</head>
<style>
  #judul{
    text-align:center;
  }
  #right {
    text-align:right;
  }
  #left {
    text-align:left;
  }

  #halaman{
    width: auto; 
    height: auto; 
    position: absolute; 
    border: 0px solid; 
    padding-top: 20px; 
    padding-left: 30px; 
    padding-right: 30px; 
    padding-bottom: 80px;
  }
  #halaman2{
    width: auto; 
    height: auto; 
    position: absolute; 
    border: 0px solid; 
    padding-top: 0px; 
    padding-left: 0px;  
  }
#head{
    width: auto; 
    height: auto; 
    
    border: 0px solid; 
    padding-top: 20px; 
    padding-left: 1000px; 
    padding-right: 0px; 
    padding-bottom: 80px;
  }
</style>
<body>
<!-- 	<div>
	<a href="" >Print</a>
	</div> -->
	<table style="width: 100%;">
            <tr>
                <td > <img src="../assets/dist/img/jamkrida2.png" height="100"></td>
                <td id="left"><p><h1><b>TriffBook</b></h1><br/> <h5> </h5></p></td>
                
            </tr>
        </table>
        <hr style="height:1px; width:100%; border-width:4; color:black; background-color:black">

	<h5 id="judul"><b>Grafik Pendaftaran</b></h5> <br>
	<div id="judul" style="width: 1000px;height: 800px">
		<canvas id="myChart"></canvas>
		<canvas id="myChart2"></canvas>

	</div>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [{
					label: 'Grafik Pendaftaran Online',
					data: <?php echo json_encode($online); ?>,
					 backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                 'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                             borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
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
				}
			}
		});
	</script>
	<script>
		var ctx = document.getElementById("myChart2").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [{
					label: 'Grafik Pendaftaran offline',
					data: <?php echo json_encode($offline); ?>,
					 backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
								'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
								'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                             borderColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
								'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
								'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
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
				}
			}
		});
	</script>

</body>
</html>
