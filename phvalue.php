
<?php
    include_once '../includes/dbex.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ph value</title>
    <style>
        .table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100px;
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
             <th>Ph value</th>
            
        </tr>
        <?php
         $sql = "SELECT ph_value FROM sensors;";
         $result = mysqli_query($connect,$sql);
         $isresult = mysqli_num_rows($result);
         if($isresult > 0){
             while($row = mysqli_fetch_assoc($result)){
                 echo "<tr><td>".$row['ph_value']."</td></tr>";
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
