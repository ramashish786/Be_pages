<?php
    include_once './includes/dbex.php';

    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/global.css">
    <title>All Value</title>
    <style>
    .table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .table td,
    .table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tr:hover {
        background-color: #ddd;
    }

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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: sticky; top: 0px; z-index: 20;">
        <a class="navbar-brand" href="./index.php">Aquaculture</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./allvalue.php">All Value<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./about_project.php">About Project<span
                            class="sr-only">(current)</span><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./aboutus.php">About Us<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <span class="text-white"> Welcome,
                    <?php echo explode(" ", $_SESSION['name'])[0]  ?>
                </span>
                <a class="btn btn-outline-danger my-2 my-sm-0 ml-2" href="./logout.php">Logout</a>
            </form>
        </div>
    </nav>
    <div class="table-responsive">
        <table class="table">

            <?php
         $userId = $_SESSION['id'];
         $sql = "SELECT temp,ph_value,turbidity,tds,createdat FROM sensors WHERE user=$userId;";
         $result = mysqli_query($connect,$sql);
         if($result){
            $isresult = mysqli_num_rows($result);
            }
         else{
            $isresult = -1;
        }
         if($isresult > 0){
           echo '<tr>
            <th><a href="./temp.php" class="text-dark" >Temperature</a></th>
            <th><a href="./phvalue.php" class="text-dark" >Ph value</a></th>
            <th><a href="./turbidity.php" class="text-dark" >Turbidity</a></th>
            <th><a href="./tds.php" class="text-dark" >TDS</a></th>
            <th><span class="text-dark">Timestamp</span></th>
       </tr>';
             while($row = mysqli_fetch_assoc($result)){
                 echo "<tr><td>".$row['temp']."</td><td>".$row['ph_value']."</td><td>".$row['turbidity']
                 ."</td><td>".$row['tds']."</td><td>".$row['createdat']."</td></tr>";

             }
             echo "</table>";
         }
         else{
             echo "<h3 class='text-center mt-3' >No Data Available.</h3>";
         }
         $connect-> close();

        ?>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>