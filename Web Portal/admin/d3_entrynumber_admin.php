<!DOCTYPE html>
<meta charset="utf-8">
<html>
<?php
session_start();
include("admin_header.php");
include("../includes/functions.php");
if (!isset($_SESSION['admin'])) {
        redirect_to('../index.php');
    }
?>
<!-- check placeholder -->
<!-- check values remian in histroy -->
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
    
    <div class="col">
      <div class="row-sm-3"></div>
      <div class="row-sm-9">
          <form action="d3_entrynumber_admin_vis.php" method="POST" id="myform">
      <table class="table-bordered" align="center">
        <tr>
          <th colspan="2">Entry Number</th>
          <th colspan="2"></th>
          <th colspan="2">Date</th>
          <th colspan="2">Submit</th>
        </tr>
        <tr>
         
          <td colspan="2"><input type="text"  class="form-control" name="e_no_box" size="11" placeholder="entry number"></td>
        <td  colspan="2"></td>
          <td colspan="2"><input type="text"  class="form-control" id="datepicker" name="date_value" value="<?php echo date("m/d/Y");?>"></td>
         
          <td colspan="2"><input type="submit" id="btn-login" class="btn btn-success" name="signup" Value="Enter" onclick="myFunction()"></td>
        </tr>
        
          
       
       
      </table>
    </form>
        </div>
    </div>
      
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