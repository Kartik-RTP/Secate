<!DOCTYPE html>
<meta charset="utf-8">
<?php 

session_start();
include("admin_header.php");
include("../includes/functions.php");
if (!isset($_SESSION['admin'])) {
        redirect_to('../index.php');
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
    <form action="d3_home_vis_admin.php" method="POST" id="myform">
      <table class="table-bordered" align="center">
        <tr>
       
          <th>Gender</th>
          <th>Month</th>
          <th>Submit</th>
        </tr>
        <tr>
          
          <td><input type="checkbox" name="gender[]" value="Male">Male</td>
          <td><input type="radio" name="month" value="01">Jan</td>
          <td><input type="submit" value="enter.." name="signup" onclick="myFunction()"></td>
        </tr>
        <tr>
          
          <td><input type="checkbox" name="gender[]" value="Female">Female</td>
          <td><input type="radio" name="month" value="02">Feb</td>
        </tr>
        <tr>
          
          <td></td>
          <td><input type="radio" name="month" value="03">Mar</td>
        </tr>
        <tr>
         
          <td></td>
          <td><input type="radio" name="month" value="04">Apr</td>
        </tr>
        <tr>
        
          <td></td>
          <td><input type="radio" name="month" value="05">May</td>
        </tr>
        <tr>
       
          <td></td>
          <td><input type="radio" name="month" value="06">Jun</td>
        </tr>
        <tr>
        
          <td></td>
          <td><input type="radio" name="month" value="07">Jul</td>
        </tr>
        <tr>
         
          <td></td>
          <td><input type="radio" name="month" value="08">Aug</td>
        </tr>
        <tr>
    
          <td></td>
          <td><input type="radio" name="month" value="09">Sep</td>
        </tr>
        <tr>
         
          <td></td>
          <td><input type="radio" name="month" value="10">Oct</td>
        </tr>
        <tr>
     
          <td></td>
          <td><input type="radio" name="month" value="11">Nov</td>
        </tr>
        <tr>
        
          <td></td>
          <td><input type="radio" name="month" value="12">Dec</td>
        </tr>
      </table>
    </form>  
  
    <div id="chart"></div>
    <div id="dataset-picker">
    </div>
    <script type="text/javascript">
      
    function myFunction(){
        
       alert("hello");
           }
    </script>
    
    <script>
      $(function() {
    $( "#datepicker" ).datepicker();
  });
      </script>
  </body>
</html>