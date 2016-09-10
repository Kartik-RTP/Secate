<!DOCTYPE html>
<meta charset="UTF-8">
<?php
session_start();
include("student_daily_header.php");

if (!isset($_SESSION['student'])) {
        redirect_to('../../../index.php');
    }


function main_func(){
include("../../../includes/connection.php");
if (isset($_POST['signup'])){
  

     $fp = fopen('data_'.$_SESSION['student'].'.csv','w');
    fwrite($fp,"day,hour,value");
    fwrite($fp,"\n");

    $arr = array_fill(0, 2, array_fill(0, 25, 0));
    $date = $_POST['date_value'];
    $x = strtotime($date);
    $start_date = date('d-m-Y',$x);
    $email=$_SESSION['student'];

      $query = "SELECT entry_exit_table.entry_no,entry_exit_table.date_out,entry_exit_table.time_out
                FROM entry_exit_table,usr_details  
                WHERE entry_exit_table.entry_no = usr_details.entry_no 
                AND entry_exit_table.place = 'null' AND entry_exit_table.date_out  = '{$start_date}' AND usr_details.email='{$email}'";  
     
         
        

         $result = mysqli_query($conn,$query);
          $cc=0;
          while($row = mysqli_fetch_row($result)){
            $date_val = $row[1];
            $time_val = $row[2];
            $time_interval = intval($time_val[0].$time_val[1]);
            $arr[0][$time_interval-1] += 1;
          }
          for($i=0;$i<1;$i++){
            for($j=0;$j<24;$j++){
              $r = $i + 1;
              $t = $j + 1;
              $p = $arr[$i][$j];
              fwrite($fp,"$r,$t,$p");
              fwrite($fp,"\n");
          }
        }

	}
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
      div.tooltip { 
      position: absolute;     
      text-align: center;     
      width: 85px;          
      height: 28px;         
      padding: 2px;       
      font: 12px sans-serif;    
      background:lightsteelblue; 
      border: 0px;    
      border-radius: 8px;     
      pointer-events: none; 
      } 

    </style>
    <script src="http://d3js.org/d3.v3.js"></script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 </head> 
  <body>
    
    <div id="chart"></div>
    <div id="dataset-picker">
    </div>
    <script type="text/javascript">
     var x = "<?php echo main_func(); ?>" ;
   
      <?php
        $date = $_POST['date_value'];
        $x = strtotime($date);
        $start_date = date('d-m-Y',$x);
      ?>
       var margin = { top: 70, right: 10, bottom: 100, left: 80 },
          width = 960 - margin.left - margin.right,
          height = 430 - margin.top - margin.bottom,
          gridSize = Math.floor(width / 24),
          legendElementWidth = gridSize*2,
          buckets = 9,
          colors = ["#ffffd9","#edf8b1","#c7e9b4","#7fcdbb","#41b6c4","#1d91c0","#225ea8","#253494","#081d58"],
          days = ["<?php echo $start_date;?>" ],
          times = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20","21", "22", "23", "24"];
          datasets = ["data_"+"<?php echo $_SESSION['student'];?>"+".csv"];
            
      var heatmapChart = function(csvFile) {

        d3.csv(csvFile,
        function(d) {
          return {
            day: +d.day,
            hour: +d.hour,
            value: +d.value
          };
        },
        function(error, data) {
          
          var svg = d3.select("#chart").append("svg")
          .attr("width", width + margin.left + margin.right)
          .attr("height", height + margin.top + margin.bottom)
          .append("g")
          .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

      var dayLabels = svg.selectAll(".dayLabel")
          .data(days)
          .enter().append("text")
            .text(function (d) { return d; })
            .attr("x", 0)
            .attr("y", function (d, i) { return i * gridSize; })
            .style("text-anchor", "end")
            .attr("transform", "translate(-6," + gridSize / 1.5 + ")")
            .attr("class", function (d, i) { return ((i >= 0 && i <= 6) ? "dayLabel mono axis axis-workweek" : "dayLabel mono axis"); });

      var timeLabels = svg.selectAll(".timeLabel")
          .data(times)
          .enter().append("text")
            .text(function(d) { return d; })
            .attr("x", function(d, i) { return i * gridSize; })
            .attr("y", 0)
            .style("text-anchor", "middle")
            .attr("transform", "translate(" + gridSize / 2 + ", -6)")
            .attr("class", function(d, i) { return ((i >= 0 && i <= 24) ? "timeLabel mono axis axis-worktime" : "timeLabel mono axis"); });
    
      var div = d3.select("body").append("div") 
                .attr("class", "tooltip")       
                .style("opacity", 0);  

          var colorScale = d3.scale.quantile()
              .domain([0, buckets - 1, d3.max(data, function (d) { return d.value; })])
              .range(colors);

          var cards = svg.selectAll(".hour")
              .data(data, function(d) {return d.day+':'+d.hour;});

          cards.append("title");

          cards.enter().append("rect")
              .attr("x", function(d) { return (d.hour - 1) * gridSize; })
              .attr("y", function(d) { return (d.day - 1) * gridSize; })
              .attr("rx", 4)
              .attr("ry", 4)
              .attr("class", "hour bordered")
              .attr("width", gridSize)
              .attr("height", gridSize)
              .style("fill", colors[0])
              .on("mouseover",function(d){
              div.transition()    
                .duration(200)    
                .style("opacity", .9);    
                  div.html(" No of times: " +"<br/><b>"  + d.value)  
                      
                      .style("left", (d3.event.pageX) + "px")   
                      .style("top", (d3.event.pageY - 28) + "px");
                    })
              .on("mouseout",function(d){
                div.transition()   
                .duration(300)    
                .style("opacity", 0);
              });

          cards.transition().duration(1000)
              .style("fill", function(d) { return colorScale(d.value); });

          cards.select("title").text(function(d) { return d.value; });
          
          cards.exit().remove();

          var legend = svg.selectAll(".legend")
              .data([0].concat(colorScale.quantiles()), function(d) { return d; });

          legend.enter().append("g")
              .attr("class", "legend");

          legend.append("rect")
            .attr("x", function(d, i) { return legendElementWidth * i; })
            .attr("y", height)
            .attr("width", legendElementWidth)
            .attr("height", gridSize / 2)
            .style("fill", function(d, i) { return colors[i]; });

          legend.append("text")
            .attr("class", "mono")
            .text(function(d) { return "≥ " + Math.round(d); })
            .attr("x", function(d, i) { return legendElementWidth * i; })
            .attr("y", height + gridSize);

          legend.exit().remove();

        });  
      };

      heatmapChart(datasets[0]);
      
      

        
    </script>
    
    
  </body>

</html>


