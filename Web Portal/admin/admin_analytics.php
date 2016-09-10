<?php 
session_start();
include("admin_header.php");
include("../includes/functions.php");
?>

<?php
if (!isset($_SESSION['admin'])) {
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
		<div class="col-sm-3"></div>
		<div class="col-sm-3" align="center" >
			<a href="d3_monthly_admin.php" class="btn btn-info" id="analytics_button_admin" role="button">Month</a>
		</div>
		<div class="col-sm-3" align="center">
			<a href="vis/daily/d3_daily_admin.php" class="btn btn-info" id="analytics_button_admin" role="button">Daily</a>
		</div>
		<div class="col-sm-3"></div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>	
		<div class="col-sm-3" align="center">
			<a href="d3_entrynumber_admin.php" class="btn btn-info" id="analytics_button_admin" role="button">Entry Number</a>
		</div>
		<div class="col-sm-3" align="center">
			<a href="d3_home_admin.php" class="btn btn-info" id="analytics_button_admin" role="button">Home</a>
		</div>
		<div class="col-sm-3"></div>
	</div>


	
</body>
</html>
