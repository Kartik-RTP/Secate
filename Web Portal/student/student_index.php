<?php
session_start();
include("../includes/connection.php");
include("../includes/functions.php");
include("student_header.php");
//include("index.php");


if (!isset($_SESSION['student'])) {
        redirect_to('../index.php');
    }
?>

<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="bs-example">
	    				<ul class="nav nav-tabs">
		        				<li class="active"><a data-toggle="tab" href="#regular">Regular</a></li>
						        <li><a data-toggle="tab" href="#home">Home</a></li>
						        <li class="dropdown">
            						<a data-toggle="dropdown" class="dropdown-toggle" href="#">Late<b class="caret"></b></a>
            						<ul class="dropdown-menu">
							            <li><a data-toggle="tab" href="#late_regular">Regular</a></li>
							            <li><a data-toggle="tab" href="#late_home">Home</a></li>
							        </ul>
        						</li>
        						
					    </ul>
					     <div class="tab-content">
					    	<div id="regular" class="tab-pane fade in active">
					    		<div class="table-responsive">	
							    	<table class="table table-striped" id="myTable">
							    		<thead>
							    			<tr>
							    				<th>Time Out</th>
					      						<th>Date Out</th>
					      						<th>Time In</th>
					      						<th>Date In</th>
							    			</tr>
							    		</thead>
							    		<tbody>
							    		
							    				<?php
							    					$email = $_SESSION['student'];
							    					$query = "SELECT * FROM entry_exit_table,usr_details 
							    							WHERE entry_exit_table.entry_no = usr_details.entry_no 
							    							AND email='{$email}' AND entry_exit_table.place='null' ";
							    					$result = mysqli_query($conn,$query);
							    					while($row = mysqli_fetch_row($result)){
							    						?>
							    			<tr>
							    				<td><?php echo $row[2];?></td>
							    				<td><?php echo $row[3];?></td>
							    				<td><?php echo $row[4];?></td>
							    				<td><?php echo $row[5];?></td>
							    			</tr>
							    			<?php } 

					      						?>
							    		</tbody>

							    	</table>
					    		</div>
					    	</div>
					    	<div id="home" class="tab-pane fade">
					    		<div class="table-responsive">	
							    	<table class="table table-striped" id="myTable">
							    		<thead>
							    			<tr>
							    				<th>Time Out</th>
					      						<th>Date Out</th>
					      						<th>Time In</th>
					      						<th>Date In</th>
					      						<th>Place</th>
							    			</tr>
							    		</thead>
							    		<tbody>
							    		
							    				<?php
							    					$email = $_SESSION['student'];
							    					$query = "SELECT * FROM entry_exit_table,usr_details 
							    							WHERE entry_exit_table.entry_no = usr_details.entry_no 
							    							AND email='{$email}' AND entry_exit_table.place != 'null' ";
							    					$result = mysqli_query($conn,$query);
							    					while($row = mysqli_fetch_row($result)){
							    						?>
							    			<tr>
							    				<td><?php echo $row[2];?></td>
							    				<td><?php echo $row[3];?></td>
							    				<td><?php echo $row[4];?></td>
							    				<td><?php echo $row[5];?></td>
							    				<td><?php echo $row[6];?></td>

							    			</tr>
							    			<?php } 

					      						?>
							    		</tbody>

							    	</table>
					    		</div>
					    	</div>
					    	<div id="late_home" class="tab-pane fade">
					    		<div class="table-responsive">	
							    	<table class="table table-striped" id="myTable">
							    		<thead>
							    			<tr>
							    				<th>Time Out</th>
					      						<th>Date Out</th>
					      						<th>Time In</th>
					      						<th>Date In</th>
					      						<th>Place</th>
							    			</tr>
							    		</thead>
							    		<tbody>
							    		
							    				<?php
							    					$email = $_SESSION['student'];
							    					$query = "SELECT * FROM entry_exit_table,usr_details 
							    							WHERE entry_exit_table.entry_no = usr_details.entry_no 
							    							AND email='{$email}' AND entry_exit_table.place != 'null' 
							    							AND flag=1 ";
							    					$result = mysqli_query($conn,$query);
							    					while($row = mysqli_fetch_row($result)){
							    						?>
							    			<tr>
							    				<td><?php echo $row[2];?></td>
							    				<td><?php echo $row[3];?></td>
							    				<td><?php echo $row[4];?></td>
							    				<td><?php echo $row[5];?></td>
							    				<td><?php echo $row[6];?></td>

							    			</tr>
							    			<?php } 

					      						?>
							    		</tbody>

							    	</table>
					    		</div>
					    	</div>
					    	<div id="late_regular" class="tab-pane fade">
					    		<div class="table-responsive">	
							    	<table class="table table-striped" id="myTable">
							    		<thead>
							    			<tr>
							    				<th>Time Out</th>
					      						<th>Date Out</th>
					      						<th>Time In</th>
					      						<th>Date In</th>
					      						
							    			</tr>
							    		</thead>
							    		<tbody>
							    		
							    				<?php
							    					$email = $_SESSION['student'];
							    					$query = "SELECT * FROM entry_exit_table,usr_details 
							    							WHERE entry_exit_table.entry_no = usr_details.entry_no 
							    							AND email='{$email}' 
							    							AND entry_exit_table.place = 'null' 
							    							AND flag=1 ";
							    					$result = mysqli_query($conn,$query);
							    					while($row = mysqli_fetch_row($result)){
							    						?>
							    			<tr>
							    				<td><?php echo $row[2];?></td>
							    				<td><?php echo $row[3];?></td>
							    				<td><?php echo $row[4];?></td>
							    				<td><?php echo $row[5];?></td>
							    				

							    			</tr>
							    			<?php } 

					      						?>
							    		</tbody>

							    	</table>
					    		</div>
					    	</div>
					    
					   
						</div>
					</div>
				</div>
			</div>

