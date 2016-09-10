<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Secate Web Portal">
    
    <title>Secate Web Portal</title>

    <link href="../../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="../../../dist/css/bootstrap.css" rel="stylesheet">
    <link href="../../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <script src="../../../dist/js/jquery-1.12.0.min.js"></script>
    <link href="../../../dist/css/styles.css" rel="stylesheet">
    <script src="../../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../dist/js/jquery.dataTables.min.js"></script>
    <script src="../../../dist/css/jquery.dataTables.min.css"></script>
    <script src="../../../dist/js/jquery.js"></script>
  </head>
 </html> 
<?php
session_start();
include("C:\wamp\www\secate\admin\admin_header.php");
include("../../../includes/functions.php");

if (!isset($_SESSION['admin'])) {
        redirect_to('../../../index.php');
    }
?>

<html>
<head>
  <style>
      rect.bordered {
        stroke: #E6E6E6;
        stroke-width:2px;   
      }

      text.mono {
        font-size: 9pt;
        font-family: Consolas, courier;
        fill: #aaa;
      }

      text.axis-workweek {
        fill: #000;
      }

      text.axis-worktime {
        fill: #000;
      }
    </style>
    <script src="http://d3js.org/d3.v3.js"></script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 </head> 
  <body>
    <!-- batchwise_d31 -->
    <!--
    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6" align="center">
        <h1>Daily</h1>
      </div>
      <div class="col-sm-3"></div>
    </div>-->
    <form action="d3_daily_vis_admin.php" method="POST" id="myform">
      <table align="center" >
        <tr>
          <th width="25%" align="center">Batch</th>
          
          <th width="25%" align="center">Gender</th>
         
          <th width="25%" align="center">Date</th>
          <th width="25%" align="center">Submit</th>
        </tr>
        <tr>
          <td><input type="checkbox" name="batchwise[]" value="2012">    <strong>2012</strong></td>
          <td><input type="checkbox" name="gender[]" value="Male">     <strong>Male</strong></td>
          <td><input type="text" id="datepicker" length="8" name="date_value" value="<?php echo date("m/d/Y");?>"></td>
         
           <td><input type="submit" id="btn-login" class="btn btn-success" name="signup" Value="Enter" onclick="myFunction()"></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="batchwise[]" value="2013">    <strong>2013</strong></td>
          <td><input type="checkbox" name="gender[]" value="Female">     <strong>Female</strong></td>
          
        </tr>
        <tr>
          <td><input type="checkbox" name="batchwise[]" value="2014">    <strong>2014</strong></td>
          <td></td>
          
        </tr>
        <tr>
          <td><input type="checkbox" name="batchwise[]" value="2015">    <strong>2015</strong></td>
          <td></td>

          
        </tr>
       
      </table>
    </form>  
    <!--
    <form action="batchwise_d31.php" method="POST">
      <select name="gender">
        <option value="both">All</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        
      </select>
      <select name="batchwise">
        <option value="all">All</option>
        <option value="2012">2012</option>
        <option value="2013">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="btech">Btech</option>
        <option value="mtech">Mtech</option>
      </select>
      <input type="date" id="datepicker" name="date_value" value="">
      <input type="submit" value="enter.." name="signup" onclick="myFunction()">
    </form>
    -->
    <div id="chart"></div>
    <div id="dataset-picker">
    </div>
    <script type="text/javascript">
      
    function myFunction(){
        
     
           }
    </script>
    
    <script>
      $(function() {
    $( "#datepicker" ).datepicker();
  });
      </script>
  </body>
</html>