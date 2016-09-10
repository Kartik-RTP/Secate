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
          
          <td><input type="checkbox" name="gender[]" value="Male"><strong>    Male</strong></td>
          <td><input type="radio" name="month" value="01"><strong>Jan</strong</td>
          <td><input type="submit" id="btn-login" class="btn btn-success" name="signup" Value="Enter" onclick="myFunction()"></td>
        </tr>
        <tr>
          
          <td><input type="checkbox" name="gender[]" value="Female"><strong>   Female</strong></td>
          <td><input type="radio" name="month" value="02"><strong>Feb</strong></td>
        </tr>
        <tr>
          
          <td></td>
          <td><input type="radio" name="month" value="03"><strong>Mar</strong></td>
        </tr>
        <tr>
         
          <td></td>
          <td><input type="radio" name="month" value="04"><strong>Apr</strong></td>
        </tr>
        <tr>
        
          <td></td>
          <td><input type="radio" name="month" value="05"><strong>May</strong></td>
        </tr>
        <tr>
       
          <td></td>
          <td><input type="radio" name="month" value="06"><strong>Jun</strong></td>
        </tr>
        <tr>
        
          <td></td>
          <td><input type="radio" name="month" value="07"><strong>Jul</strong></td>
        </tr>
        <tr>
         
          <td></td>
          <td><input type="radio" name="month" value="08"><strong>Aug</strong></td>
        </tr>
        <tr>
    
          <td></td>
          <td><input type="radio" name="month" value="09"><strong>Sep</strong></td>
        </tr>
        <tr>
         
          <td></td>
          <td><input type="radio" name="month" value="10"><strong>Oct</strong></td>
        </tr>
        <tr>
     
          <td></td>
          <td><input type="radio" name="month" value="11"><strong>Nov</strong></td>
        </tr>
        <tr>
        
          <td></td>
          <td><input type="radio" name="month" value="12"><strong>Dec</strong></td>
        </tr>
      </table>
    </form>  
  
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