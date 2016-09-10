<?php 
session_start();
include("student_header.php");
include("../includes/functions.php");

if (!isset($_SESSION['student'])) {
        redirect_to('../index.php');
    }
?>

<html>

<body>
	
	<div class="row" align="center">
		<div class="col-sm-12">
			<h2>Search by</h2>
		</div>
	</div>
	<div class="row">
		
		<div class="col-sm-4" align="center" >
			<a href="vis/monthly/d3_monthly_student.php" class="btn btn-info" id="analytics_button_student" role="button">Month</a>
		</div>
		<div class="col-sm-4" align="center">
			<a href="vis/daily/d3_daily_student.php" class="btn btn-info" id="analytics_button_student" role="button">Daily</a>
		</div>
		<div class="col-sm-4" align="center">
			<a href="vis/home/d3_home_student.php" class="btn btn-info" id="analytics_button_student" role="button">Home</a>
		</div>
	</div>
		
</body>
</html>