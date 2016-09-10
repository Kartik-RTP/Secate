<?php
session_start();
include("../includes/connection.php");
include("../includes/functions.php");
include("admin_header.php"); 
?>

<?php
//echo $_POST['admin_email'];

	if (!isset($_SESSION['admin'])) {
        redirect_to('../index.php');
    }

  $rows_per_page = 15;

	
	if (isset($_GET['pageno'])){
		$pageno_regular = $_GET['pageno'];
	}
	else{
  		$pageno = 1;
  	}


?>

	<div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="bs-example">
	    				<ul class="nav nav-tabs">
		        				<li class="active"><a data-toggle="tab" href="#regular">Regular</a></li>
						        <li><a data-toggle="tab" href="#home">Home</a></li>
						        <li class="dropdown">
            						<a data-toggle="dropdown" class="dropdown-toggle" href="#">Batch<b class="caret"></b></a>
            						<ul class="dropdown-menu">
							            <li><a data-toggle="tab" href="#batch_2012">2012</a></li>
							            <li><a data-toggle="tab" href="#batch_2013">2013</a></li>
							            <li><a data-toggle="tab" href="#batch_2014">2014</a></li>
							            <li><a data-toggle="tab" href="#batch_2015">2015</a></li>
            						</ul>
        						</li>
        						<li class="dropdown">
            						<a data-toggle="dropdown" class="dropdown-toggle" href="#">Late<b class="caret"></b></a>
            						<ul class="dropdown-menu">
							            <li><a data-toggle="tab" href="#late_regular">Regular</a></li>
							            <li><a data-toggle="tab" href="#late_home">Home</a></li>
							        </ul>
        						</li>
        						<li class="dropdown">
            						<a data-toggle="dropdown" class="dropdown-toggle" href="#">Gender<b class="caret"></b></a>
            						<ul class="dropdown-menu">
							            <li><a data-toggle="tab" href="#male">Male</a></li>
							            <li><a data-toggle="tab" href="#female">Female</a></li>
							        </ul>
        						</li>

					    </ul>
					    
					    <div class="tab-content">
					    	<div id="regular" class="tab-pane fade in active">
							    <div class="table-responsive">	
							    	<table class="table table-striped" id="myTable">
							    		<thead>
							    			<tr>
					      						<th>Entry Number</th>
					      						<th>Time Out</th>
					      						<th>Date Out</th>
					      						<th>Time In</th>
					      						<th>Date In</th>
					      						
					      					</tr>
					      				</thead>
					      				<tbody>
					      					<?php
					      						$q1 = "SELECT count(*) FROM entry_exit_table WHERE place='null' ";
										    	$r1 = mysqli_query($conn,$q1);
										    	$qd1 = mysqli_fetch_row($r1);
										    	$n1 = $qd1[0]; 
										    	$lastpage = ceil($n1/$rows_per_page);

										    	$pageno = (int)$pageno;
										    	if ($pageno > $lastpage){
										    		$pageno = $lastpage;
										    	}
										    	if ($pageno < 1){
										    		$pageno = 1;
										    	}
										    	$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;
										    	$q2 = "SELECT * from entry_exit_table WHERE place='null' ORDER BY date_out DESC,time_out DESC $limit ";
										    	$r2 = mysqli_query($conn,$q2);
										      	while ($row = mysqli_fetch_row($r2))
					      						{
					      					?>	
					      					<tr>
						      					<td><?php echo $row[1];?></td>
						      					<td><?php echo $row[2];?></td>
						      					<td><?php echo $row[3];?></td>
						      					<td><?php echo $row[4];?></td>
						      					<td><?php echo $row[5];?></td>
						      					
					      					</tr>
					      						<?php } 

					      						?>
					      					<tr>
					      						<td colspan="2" align="center">
					      							<?php 
					      								if ($pageno == 1){
							    							echo "FIRST PREV";
							    						}
							    						else{
							    							echo "<a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno=1'>FIRST</a> ";
												    		$prevpage = $pageno - 1;
												    		echo "<a  id='pagi' href='{$_SERVER['PHP_SELF']}?pageno=$prevpage'>PREV</a> ";
												    	}					
					      							?>
					      						</td>
					      						<td colspan="3" align="center">
					      							<?php
					      								if ($pageno == $lastpage){
							   								echo " NEXT LAST ";
														} 
														else{
							   								$nextpage = $pageno+1;
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno=$nextpage'>NEXT</a> ";
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno=$lastpage'>LAST</a> ";
															}
					      							?>
					      						</td>
					      					</tr>	
										</tbody>
					      			</table>
					      		</div>
							</div>
					    <div id="home" class="tab-pane fade">
							<div class="table-responsive">
					    		<table class="table table-striped">
						    		<thead>
				      					<tr>
				      						<th>Entry Number</th>
				      						<th>Time Out</th>
				      						<th>Date Out</th>
				      						<th>Time In</th>
				      						<th>Date In</th>
				      						<th>Place</th>
				      					</tr>
				      				</thead>
				      				<tbody>
				      					<?php

					      						$q1 = "SELECT count(*) FROM entry_exit_table WHERE place != 'null' ";
										    	$r1 = mysqli_query($conn,$q1);
										    	$qd1 = mysqli_fetch_row($r1);
										    	$n1 = $qd1[0]; 
										    	$lastpage = ceil($n1/$rows_per_page);

										    	$pageno = (int)$pageno;
										    	if ($pageno > $lastpage){
										    		$pageno = $lastpage;
										    	}
										    	if ($pageno < 1){
										    		$pageno = 1;
										    	}
										    	$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;
										    	$q2 = "SELECT * from entry_exit_table WHERE place != 'null' ORDER BY date_out DESC,time_out DESC $limit ";
										    	$r2 = mysqli_query($conn,$q2);
										      	while ($row = mysqli_fetch_row($r2))
					      						{
					      					?>	
					      					<tr>
						      					<td><?php echo $row[1];?></td>
						      					<td><?php echo $row[2];?></td>
						      					<td><?php echo $row[3];?></td>
						      					<td><?php echo $row[4];?></td>
						      					<td><?php echo $row[5];?></td>
						      					<td><?php echo $row[6];?></td>
						      					
					      					</tr>
					      						<?php } 

					      						?>
					      					<tr>
					      						<td colspan="3" align="center">
					      							<?php 
					      								if ($pageno == 1){
							    							echo "FIRST PREV";
							    						}
							    						else{
							    							echo "<a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno=1'>FIRST</a> ";
												    		$prevpage = $pageno - 1;
												    		echo "<a  id='pagi' href='{$_SERVER['PHP_SELF']}?pageno=$prevpage'>PREV</a> ";
												    	}					
					      							?>
					      						</td>
					      						<td colspan="3" align="center">
					      							<?php
					      								if ($pageno == $lastpage){
							   								echo " NEXT LAST ";
														} 
														else{
							   								$nextpage = $pageno+1;
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno=$nextpage'>NEXT</a> ";
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno=$lastpage'>LAST</a> ";
															}
					      							?>
					      						</td>
					      					</tr>	
				      				</tbody>
				      			</table>
					    	</div>	
	      				</div> 
	      				<div id="batch_2012" class="tab-pane fade">
							<div class="table-responsive">
					    		<table class="table table-striped">
						    		<thead>
				      					<tr>
				      						<th>Entry Number</th>
				      						<th>Time Out</th>
				      						<th>Date Out</th>
				      						<th>Time In</th>
				      						<th>Date In</th>
				      					</tr>
				      				</thead>
				      				<tbody>
				      					<?php
					      						$q1 = "SELECT count(*) FROM entry_exit_table WHERE place = 'null' AND entry_no LIKE '2012%' ";
										    	$r1 = mysqli_query($conn,$q1);
										    	$qd1 = mysqli_fetch_row($r1);
										    	$n1 = $qd1[0]; 
										    	$lastpage = ceil($n1/$rows_per_page);

										    	$pageno = (int)$pageno;
										    	if ($pageno > $lastpage){
										    		$pageno = $lastpage;
										    	}
										    	if ($pageno < 1){
										    		$pageno = 1;
										    	}
										    	$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;
										    	$q2 = "SELECT * from entry_exit_table WHERE place = 'null' AND entry_no LIKE '2012%' 
										    	ORDER BY date_out DESC,time_out DESC $limit ";
										    	$r2 = mysqli_query($conn,$q2);
										      	while ($row = mysqli_fetch_row($r2))
					      						{
					      					?>	
					      					<tr>
						      					<td><?php echo $row[1];?></td>
						      					<td><?php echo $row[2];?></td>
						      					<td><?php echo $row[3];?></td>
						      					<td><?php echo $row[4];?></td>
						      					<td><?php echo $row[5];?></td>
						      					
						      					
					      					</tr>
					      						<?php } 

					      						?>
					      					<tr>
					      						<td colspan="2" align="center">
					      							<?php 
					      								if ($pageno == 1){
							    							echo "FIRST PREV";
							    						}
							    						else{
							    							echo "<a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno=1'>FIRST</a> ";
												    		$prevpage = $pageno - 1;
												    		echo "<a  id='pagi' href='{$_SERVER['PHP_SELF']}?pageno=$prevpage'>PREV</a> ";
												    	}					
					      							?>
					      						</td>
					      						<td colspan="3" align="center">
					      							<?php
					      								if ($pageno == $lastpage){
							   								echo " NEXT LAST ";
														} 
														else{
							   								$nextpage = $pageno+1;
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno=$nextpage'>NEXT</a> ";
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno=$lastpage'>LAST</a> ";
															}
					      							?>
					      						</td>
					      					</tr>	
				      					
				      				</tbody>
				      			</table>
					    	</div>	
	      				</div> 
	      				<div id="batch_2013" class="tab-pane fade">
							<div class="table-responsive">
					    		<table class="table table-striped">
						    		<thead>
				      					<tr>
				      						<th>Entry Number</th>
				      						<th>Time Out</th>
				      						<th>Date Out</th>
				      						<th>Time In</th>
				      						<th>Date In</th>
				      					</tr>
				      				</thead>
				      				<tbody>
				      					<?php
					      						$q1 = "SELECT count(*) FROM entry_exit_table WHERE place = 'null' AND entry_no LIKE '2013%' ";
										    	$r1 = mysqli_query($conn,$q1);
										    	$qd1 = mysqli_fetch_row($r1);
										    	$n1 = $qd1[0]; 
										    	$lastpage = ceil($n1/$rows_per_page);

										    	$pageno  = (int)$pageno ;
										    	if ($pageno  > $lastpage){
										    		$pageno  = $lastpage;
										    	}
										    	if ($pageno  < 1){
										    		$pageno  = 1;
										    	}
										    	$limit = 'LIMIT ' .($pageno  - 1) * $rows_per_page .',' .$rows_per_page;
										    	$q2 = "SELECT * from entry_exit_table WHERE place = 'null' AND entry_no 
										    	LIKE '2013%' ORDER BY date_out DESC,time_out DESC $limit ";
										    	$r2 = mysqli_query($conn,$q2);
										      	while ($row = mysqli_fetch_row($r2))
					      						{
					      					?>	
					      					<tr>
						      					<td><?php echo $row[1];?></td>
						      					<td><?php echo $row[2];?></td>
						      					<td><?php echo $row[3];?></td>
						      					<td><?php echo $row[4];?></td>
						      					<td><?php echo $row[5];?></td>
						      					
						      					
					      					</tr>
					      						<?php } 

					      						?>
					      					<tr>
					      						<td colspan="2" align="center">
					      							<?php 
					      								if ($pageno  == 1){
							    							echo "FIRST PREV";
							    						}
							    						else{
							    							echo "<a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =1'>FIRST</a> ";
												    		$prevpage = $pageno  - 1;
												    		echo "<a  id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =$prevpage'>PREV</a> ";
												    	}					
					      							?>
					      						</td>
					      						<td colspan="3" align="center">
					      							<?php
					      								if ($pageno  == $lastpage){
							   								echo " NEXT LAST ";
														} 
														else{
							   								$nextpage = $pageno +1;
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =$nextpage'>NEXT</a> ";
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =$lastpage'>LAST</a> ";
															}
					      							?>
					      						</td>
					      					</tr>	
				      				</tbody>
				      			</table>
					    	</div>	
	      				</div> 
	      				<div id="batch_2014" class="tab-pane fade">
							<div class="table-responsive">
					    		<table class="table table-striped">
						    		<thead>
				      					<tr>
				      						<th>Entry Number</th>
				      						<th>Time Out</th>
				      						<th>Date Out</th>
				      						<th>Time In</th>
				      						<th>Date In</th>
				      					</tr>
				      				</thead>
				      				<tbody>
				      					<?php
					      						$q1 = "SELECT count(*) FROM entry_exit_table WHERE place = 'null' AND entry_no LIKE '2014%' ";
										    	$r1 = mysqli_query($conn,$q1);
										    	$qd1 = mysqli_fetch_row($r1);
										    	$n1 = $qd1[0]; 
										    	$lastpage = ceil($n1/$rows_per_page);

										    	$pageno  = (int)$pageno ;
										    	if ($pageno  > $lastpage){
										    		$pageno  = $lastpage;
										    	}
										    	if ($pageno  < 1){
										    		$pageno  = 1;
										    	}
										    	$limit = 'LIMIT ' .($pageno  - 1) * $rows_per_page .',' .$rows_per_page;
										    	$q2 = "SELECT * from entry_exit_table WHERE place = 'null' AND entry_no 
										    	LIKE '2014%' ORDER BY date_out DESC,time_out DESC $limit ";
										    	$r2 = mysqli_query($conn,$q2);
										      	while ($row = mysqli_fetch_row($r2))
					      						{
					      					?>	
					      					<tr>
						      					<td><?php echo $row[1];?></td>
						      					<td><?php echo $row[2];?></td>
						      					<td><?php echo $row[3];?></td>
						      					<td><?php echo $row[4];?></td>
						      					<td><?php echo $row[5];?></td>
						      					
						      					
					      					</tr>
					      						<?php } 

					      						?>
					      					<tr>
					      						<td colspan="2" align="center">
					      							<?php 
					      								if ($pageno  == 1){
							    							echo "FIRST PREV";
							    						}
							    						else{
							    							echo "<a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =1'>FIRST</a> ";
												    		$prevpage = $pageno  - 1;
												    		echo "<a  id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =$prevpage'>PREV</a> ";
												    	}					
					      							?>
					      						</td>
					      						<td colspan="3" align="center">
					      							<?php
					      								if ($pageno  == $lastpage){
							   								echo " NEXT LAST ";
														} 
														else{
							   								$nextpage = $pageno +1;
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =$nextpage'>NEXT</a> ";
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =$lastpage'>LAST</a> ";
															}
					      							?>
					      						</td>
					      					</tr>	
				      				</tbody>
				      			</table>
					    	</div>	
	      				</div> 
	      				<div id="batch_2015" class="tab-pane fade">
							<div class="table-responsive">
					    		<table class="table table-striped">
						    		<thead>
				      					<tr>
				      						<th>Entry Number</th>
				      						<th>Time Out</th>
				      						<th>Date Out</th>
				      						<th>Time In</th>
				      						<th>Date In</th>
				      					</tr>
				      				</thead>
				      				<tbody>
				      					<?php
					      						$q1 = "SELECT count(*) FROM entry_exit_table WHERE place = 'null' AND entry_no LIKE '2015%' ";
										    	$r1 = mysqli_query($conn,$q1);
										    	$qd1 = mysqli_fetch_row($r1);
										    	$n1 = $qd1[0]; 
										    	$lastpage = ceil($n1/$rows_per_page);

										    	$pageno  = (int)$pageno ;
										    	if ($pageno  > $lastpage){
										    		$pageno  = $lastpage;
										    	}
										    	if ($pageno  < 1){
										    		$pageno  = 1;
										    	}
										    	$limit = 'LIMIT ' .($pageno  - 1) * $rows_per_page .',' .$rows_per_page;
										    	$q2 = "SELECT * from entry_exit_table WHERE place = 'null' AND entry_no 
										    	LIKE '2015%' ORDER BY date_out DESC,time_out DESC $limit ";
										    	$r2 = mysqli_query($conn,$q2);
										      	while ($row = mysqli_fetch_row($r2))
					      						{
					      					?>	
					      					<tr>
						      					<td><?php echo $row[1];?></td>
						      					<td><?php echo $row[2];?></td>
						      					<td><?php echo $row[3];?></td>
						      					<td><?php echo $row[4];?></td>
						      					<td><?php echo $row[5];?></td>
						      					
						      					
					      					</tr>
					      						<?php } 

					      						?>
					      					<tr>
					      						<td colspan="2" align="center">
					      							<?php 
					      								if ($pageno  == 1){
							    							echo "FIRST PREV";
							    						}
							    						else{
							    							echo "<a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =1'>FIRST</a> ";
												    		$prevpage = $pageno  - 1;
												    		echo "<a  id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =$prevpage'>PREV</a> ";
												    	}					
					      							?>
					      						</td>
					      						<td colspan="3" align="center">
					      							<?php
					      								if ($pageno  == $lastpage){
							   								echo " NEXT LAST ";
														} 
														else{
							   								$nextpage = $pageno +1;
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =$nextpage'>NEXT</a> ";
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =$lastpage'>LAST</a> ";
															}
					      							?>
					      						</td>
					      					</tr>	
				      				</tbody>
				      			</table>
					    	</div>	
	      				</div> 
	      				<div id="late_home" class="tab-pane fade">
							<div class="table-responsive">
					    		<table class="table table-striped">
						    		<thead>
				      					<tr>
				      						<th>Entry Number</th>
				      						<th>Time Out</th>
				      						<th>Date Out</th>
				      						<th>Time In</th>
				      						<th>Date In</th>
				      					</tr>
				      				</thead>
				      				<tbody>
				      					<?php
					      						$q1 = "SELECT count(*) FROM entry_exit_table WHERE place != 'null' AND flag = 1 ";
										    	$r1 = mysqli_query($conn,$q1);
										    	$qd1 = mysqli_fetch_row($r1);
										    	$n1 = $qd1[0]; 
										    	$lastpage = ceil($n1/$rows_per_page);

										    	$pageno = (int)$pageno;
										    	if ($pageno > $lastpage){
										    		$pageno = $lastpage;
										    	}
										    	if ($pageno < 1){
										    		$pageno = 1;
										    	}
										    	$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;
										    	$q2 = "SELECT * from entry_exit_table WHERE place != 'null' 
										    	AND flag = 1 ORDER BY date_out DESC,time_out DESC $limit ";
										    	$r2 = mysqli_query($conn,$q2);
										      	while ($row = mysqli_fetch_row($r2))
					      						{
					      					?>	
					      					<tr>
						      					<td><?php echo $row[1];?></td>
						      					<td><?php echo $row[2];?></td>
						      					<td><?php echo $row[3];?></td>
						      					<td><?php echo $row[4];?></td>
						      					<td><?php echo $row[5];?></td>
						      					
						      					
					      					</tr>
					      						<?php } 

					      						?>
					      					<tr>
					      						<td colspan="2" align="center">
					      							<?php 
					      								if ($pageno == 1){
							    							echo "FIRST PREV";
							    						}
							    						else{
							    							echo "<a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno=1'>FIRST</a> ";
												    		$prevpage = $pageno - 1;
												    		echo "<a  id='pagi' href='{$_SERVER['PHP_SELF']}?pageno=$prevpage'>PREV</a> ";
												    	}					
					      							?>
					      						</td>
					      						<td colspan="3" align="center">
					      							<?php
					      								if ($pageno == $lastpage){
							   								echo " NEXT LAST ";
														}
														else{
															echo " NEXT LAST ";	
														} /*
														else{
							   								$nextpage = $pageno+1;
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno=$nextpage'>NEXT</a> ";
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno=$lastpage'>LAST</a> ";
															}*/
					      							?>
					      						</td>
					      					</tr>	
				      				</tbody>
				      			</table>
					    	</div>	
	      				</div>
	      				<div id="late_regular" class="tab-pane fade">
							<div class="table-responsive">
					    		<table class="table table-striped">
						    		<thead>
				      					<tr>
				      						<th>Entry Number</th>
				      						<th>Time Out</th>
				      						<th>Date Out</th>
				      						<th>Time In</th>
				      						<th>Date In</th>
				      					</tr>
				      				</thead>
				      				<tbody>
				      					<?php
					      						$q1 = "SELECT count(*) FROM entry_exit_table WHERE place = 'null' AND flag = 1 ";
										    	$r1 = mysqli_query($conn,$q1);
										    	$qd1 = mysqli_fetch_row($r1);
										    	$n1 = $qd1[0]; 
										    	$lastpage = ceil($n1/$rows_per_page);

										    	$pageno  = (int)$pageno ;
										    	if ($pageno  > $lastpage){
										    		$pageno  = $lastpage;
										    	}
										    	if ($pageno  < 1){
										    		$pageno  = 1;
										    	}
										    	$limit = 'LIMIT ' .($pageno  - 1) * $rows_per_page .',' .$rows_per_page;
										    	$q2 = "SELECT * from entry_exit_table WHERE place = 'null' AND flag = 1 
										    	ORDER BY date_out DESC,time_out DESC $limit ";
										    	$r2 = mysqli_query($conn,$q2);
										      	while ($row = mysqli_fetch_row($r2))
					      						{
					      					?>	
					      					<tr>
						      					<td><?php echo $row[1];?></td>
						      					<td><?php echo $row[2];?></td>
						      					<td><?php echo $row[3];?></td>
						      					<td><?php echo $row[4];?></td>
						      					<td><?php echo $row[5];?></td>
						      					
						      					
					      					</tr>
					      						<?php } 

					      						?>
					      					<tr>
					      						<td colspan="2" align="center">
					      							<?php 
					      								if ($pageno  == 1){
							    							echo "FIRST PREV";
							    						}
							    						else{
							    							echo "<a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =1'>FIRST</a> ";
												    		$prevpage = $pageno  - 1;
												    		echo "<a  id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =$prevpage'>PREV</a> ";
												    	}					
					      							?>
					      						</td>
					      						<td colspan="3" align="center">
					      							<?php
					      								if ($pageno  == $lastpage){
							   								echo " NEXT LAST ";
														} 
														else{
							   								$nextpage = $pageno +1;
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =$nextpage'>NEXT</a> ";
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =$lastpage'>LAST</a> ";
															}
					      							?>
					      						</td>
					      					</tr>	
				      				</tbody>
				      			</table>
					    	</div>	
	      				</div>
	      				<div id="male" class="tab-pane fade">
							<div class="table-responsive">
					    		<table class="table table-striped">
						    		<thead>
				      					<tr>
				      						<th>Entry Number</th>
				      						<th>Time Out</th>
				      						<th>Date Out</th>
				      						<th>Time In</th>
				      						<th>Date In</th>
				      					</tr>
				      				</thead>
				      				<tbody>
				      					<?php

					      						$q1 = "SELECT count(*) 
					      								FROM entry_exit_table,usr_details 
					      								WHERE  entry_exit_table.entry_no=usr_details.entry_no AND gender='Male' AND place='null' ";
										    	$r1 = mysqli_query($conn,$q1);
										    	$qd1 = mysqli_fetch_row($r1);
										    	$n1 = $qd1[0]; 
										    	$lastpage = ceil($n1/$rows_per_page);

										    	$pageno  = (int)$pageno ;
										    	if ($pageno  > $lastpage){
										    		$pageno  = $lastpage;
										    	}
										    	if ($pageno  < 1){
										    		$pageno  = 1;
										    	}
										    	$limit = 'LIMIT ' .($pageno  - 1) * $rows_per_page .',' .$rows_per_page;
												$q2 = "SELECT entry_exit_table.entry_no,entry_exit_table.time_out,entry_exit_table.date_out,entry_exit_table.time_in,entry_exit_table.date_in,usr_details.gender,usr_details.role 
				      								FROM entry_exit_table,usr_details
				      								WHERE entry_exit_table.entry_no=usr_details.entry_no 
				      								AND gender='Male' AND place='null' ORDER BY date_out DESC,time_out DESC $limit";
				      							$r2 = mysqli_query($conn,$q2);
										      	while ($row = mysqli_fetch_row($r2))
					      						{
					      					?>	
					      					<tr>
						      					<td><?php echo $row[0];?></td>
						      					<td><?php echo $row[1];?></td>
						      					<td><?php echo $row[2];?></td>
						      					<td><?php echo $row[3];?></td>
						      					<td><?php echo $row[4];?></td>
						      					
						      					
					      					</tr>
					      						<?php } 

					      						?>
					      					<tr>
					      						<td colspan="2" align="center">
					      							<?php 
					      								if ($pageno  == 1){
							    							echo "FIRST PREV";
							    						}
							    						else{
							    							echo "<a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =1'>FIRST</a> ";
												    		$prevpage = $pageno  - 1;
												    		echo "<a  id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =$prevpage'>PREV</a> ";
												    	}					
					      							?>
					      						</td>
					      						<td colspan="3" align="center">
					      							<?php
					      								if ($pageno  == $lastpage){
							   								echo " NEXT LAST ";
														} 
														else{
							   								$nextpage = $pageno +1;
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =$nextpage'>NEXT</a> ";
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno =$lastpage'>LAST</a> ";
															}
					      							?>
					      						</td>
					      					</tr>	
										</tbody>
				      			</table>
					    	</div>	
	      				</div>  
	      				<div id="female" class="tab-pane fade">
							<div class="table-responsive">
					    		<table class="table table-striped">
						    		<thead>
				      					<tr>
				      						<th>Entry Number</th>
				      						<th>Time Out</th>
				      						<th>Date Out</th>
				      						<th>Time In</th>
				      						<th>Date In</th>
				      					</tr>
				      				</thead>
				      				<tbody>
				      					<?php

					      						$q1 = "SELECT count(*) 
					      								FROM entry_exit_table,usr_details 
					      								WHERE  entry_exit_table.entry_no=usr_details.entry_no AND gender='Female' 
					      								AND place='null'";
										    	$r1 = mysqli_query($conn,$q1);
										    	$qd1 = mysqli_fetch_row($r1);
										    	$n1 = $qd1[0]; 
										    	$lastpage = ceil($n1/$rows_per_page);

										    	$pageno   = (int)$pageno  ;
										    	if ($pageno   > $lastpage){
										    		$pageno   = $lastpage;
										    	}
										    	if ($pageno   < 1){
										    		$pageno   = 1;
										    	}
										    	$limit = 'LIMIT ' .($pageno   - 1) * $rows_per_page .',' .$rows_per_page;
												$q2 = "SELECT entry_exit_table.entry_no,entry_exit_table.time_out,entry_exit_table.date_out,entry_exit_table.time_in,entry_exit_table.date_in,usr_details.gender,usr_details.role 
				      								FROM entry_exit_table,usr_details
				      								WHERE entry_exit_table.entry_no=usr_details.entry_no AND gender='Female' 
				      								AND place='null' ORDER BY date_out DESC,time_out DESC $limit";
				      							$r2 = mysqli_query($conn,$q2);
										      	while ($row = mysqli_fetch_row($r2))
					      						{
					      					?>	
					      					<tr>
						      					<td><?php echo $row[0];?></td>
						      					<td><?php echo $row[1];?></td>
						      					<td><?php echo $row[2];?></td>
						      					<td><?php echo $row[3];?></td>
						      					<td><?php echo $row[4];?></td>
						      					
						      					
					      					</tr>
					      						<?php } 

					      						?>
					      					<tr>
					      						<td colspan="2" align="center">
					      							<?php 
					      								if ($pageno   == 1){
							    							echo "FIRST PREV";
							    						}
							    						else{
							    							echo "<a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno  =1'>FIRST</a> ";
												    		$prevpage = $pageno   - 1;
												    		echo "<a  id='pagi' href='{$_SERVER['PHP_SELF']}?pageno  =$prevpage'>PREV</a> ";
												    	}					
					      							?>
					      						</td>
					      						<td colspan="3" align="center">
					      							<?php
					      								if ($pageno   == $lastpage){
							   								echo " NEXT LAST ";
														} 
														else{
							   								$nextpage = $pageno  +1;
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno  =$nextpage'>NEXT</a> ";
							   								echo " <a id='pagi' href='{$_SERVER['PHP_SELF']}?pageno  =$lastpage'>LAST</a> ";
															}
					      							?>
					      						</td>
					      					</tr>
				      				</tbody>
				      			</table>
					    	</div>	
	      				</div>  
	    			</div>
	    		</div>

		        
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
	    $('#myTable').DataTable();
	});

</script>
</body>

</html>

