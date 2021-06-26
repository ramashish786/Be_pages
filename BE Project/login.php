<?php
  session_start();

  if(isset($_SESSION['loggedin']) &&  $_SESSION['loggedin']==true){
  header("location: ./index.php");
  exit;
  }

$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include './includes/dbex.php';
    $email = $_POST["email"];
    $password = $_POST["password"]; 

      $sql = "Select * from users where email='$email';";
      $result = mysqli_query($connect, $sql);
      if($result){
        $num = mysqli_num_rows($result);
      }
      else{
        $num = 0;
      }
    
    if ($num == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            $login = true;
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            header("location: ./index.php");
        }
    else{
        $showError = "Invalid Credentials";
    }

    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/css/global.css">
    <title>Login</title>
</head>

<body>
    <div class="container-fluid bg">
        <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"> </div>
            <!-- Start form-->

            <div class="col-md-4 col-sm-4 col-xs-12">
                <form class=" form-container" action="./login.php" method="POST">
                    <p>Login</p>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" max_length="30" class="form-control" id="email" name="email"
                            placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" max_length="30" class="form-control" id="password" name="password"
                            placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Login</button>
                    <a href="./signup.php" class="btn btn-info btn-block">Signup</a>
                </form>
                <!-- End form-->
            </div>



            <div class=" col-md-4 col-sm-4 col-xs-12">
            </div>

        </div>
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
    <script src="global.js"></script>
</body>

</html>