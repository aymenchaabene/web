<!DOCTYPE html>
<html>
<head>


  <?php

    include ("crudClient.php"); // crud mte3i badel crud mte3ek 

 
// el requête mte3ek eli t affichi biha 
 
 $cc=new crudProm();
 $liste=$cc->affiche($cc->conn);  





  // num el colonne f table ( mithel gangant wala faza haka ) ena colonne 2 
   $x = 6 ;   
      
  // les valeurs eli hachtek bihom 
  $arr2 = array("bizerte","tunis") ;
 
  // nafess eli kablou ema kolou zerowet  
  $arr = array(0,0,0) ;   
      

// t7eseb khdech tetaawed me nmarra 
       foreach ($liste as $l)
 
 {
    for ($i = 0; $i < sizeof($arr2) ; $i ++)
     {
         if ($l[$x] == $arr2[$i] )
          
          { 
             $arr[$i] =  $arr[$i] + 1 ;  
          } 
 
     }  
  }

 
?>



<!-- matbadel chay juste  win hatet ******  -->
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">


      google.load('visualization', '1.0', {'packages':['corechart']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

     
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Topping'); /**   Topping          *****  */ 
      data.addColumn('number', 'Slices'); /**   Slices        *****  */ 

<?php
for ($c = 0; $c< sizeof($arr2); $c++) {
  ?>
  
     var V1 = <?php echo json_encode($arr2[$c]); ?>  
     var V2 = <?php echo json_encode($arr[$c]); ?>  
      data.addRows([
        [V1, V2]
       
      ]);
<?php
 }
 ?>
     
      var options = {'title':'How Much Pizza I Ate Last Night', /**   How Much Pizza I Ate Last Night      *****  */ 
                     'width':400,
                     'height':300};

   
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
      var chart2 = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart2.draw(data, options);
      var chart3 = new google.visualization.LineChart(document.getElementById('curve_chart'));
      chart3.draw(data, options);
    }
</script>


 

 
  
</head>





<body >

  <div id="columnchart_values" style="width: 300px; height: 500px;"></div>
  <div id="chart_div" style="width: 300px; height: 500px;"></div>
  <div id="curve_chart" style="width: 300px; height: 500px;"></div>



 
</body>
</html>