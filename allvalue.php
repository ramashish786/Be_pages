
<?php
    include_once '../includes/dbex.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
        .table td, .table th {
                border: 1px solid #ddd;
                padding: 8px;
          }

       .table tr:nth-child(even) { background-color: #f2f2f2;}
       .table tr:hover {background-color: #ddd;}
      .table th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
             }


    </style>

</head>
<body>
    <table class="table">
        <tr>
             <th>Temperature</th>
            <th>Ph value</th>
            <th>Turbidity</th>
            <th>TDS</th>
        </tr>
        <?php
         $sql = "SELECT temp,ph_value,turbidity,tds FROM sensors;";
         $result = mysqli_query($connect,$sql);
         $isresult = mysqli_num_rows($result);
         if($isresult > 0){
             while($row = mysqli_fetch_assoc($result)){
                 echo "<tr><td>".$row['temp']."</td><td>".$row['ph_value']."</td><td>".$row['turbidity']
                 ."</td><td>".$row['tds']."</td></tr>";

             }
             echo "</table>";
         }
         else{
             echo "No result:";
         }
         $connect-> close();

        ?>
    </table>
</body>
</html>
