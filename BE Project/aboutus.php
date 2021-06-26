<?php
    include_once './includes/dbex.php';

    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
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
    <!-- <link rel="stylesheet"  href="./assets/css/myData.css"> -->
    <title>About Us</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="./allvalue.php">All Value<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./about_project.php">About Project <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
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
    <div class="container" style="padding:30px;">
        <div class="row">
            <div class="col-lg-4">
                <img src="./assets/img/ram.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140">
                <h2>Ramashish Sahani</h2>
                <p><b>Mobile No: </b>9152595187</p>
                <p><b>Email: </b> ramashishsahani786@gmail.com</p>
                <p><a class="btn btn-secondary" href="mailto:ramashishsahani786@gmail.com" role="button">Email »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img src="./assets/img/rushikesh.jpeg" class="bd-placeholder-img rounded-circle" width="140"
                    height="140">
                <h2>Rushikesh Khochare</h2>
                <p><b>Mobile No: </b>7738636191</p>
                <p><b>Email: </b> rushikeshkhocare81@gmail.com</p>
                <p><a class="btn btn-secondary" href="mailto:rushikeshkhocare81@gmail.com" role="button">Email »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img src="./assets/img/prabhunath.jpeg" class="bd-placeholder-img rounded-circle" width="140"
                    height="140">

                <h2>Prabhunath Yadav</h2>
                <p><b>Mobile No: </b>9769653964</p>
                <p><b>Email: </b> prabhu19982@gmail.com</p>
                <p><a class="btn btn-secondary" href="mailto:prabhu19982@gmail.com" role="button">Email »</a></p>
            </div><!-- /.col-lg-4 -->
        </div>
    </div>
    <div class="container">
        <form action="to_send_email.php" method="POST" autocomplete="off">
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" id="to_send" name="to_send" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Complaint</label>
                <select class="form-control" id="sub" name="sub">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">In Short Explanation</label>
                <textarea class="form-control" id="msg" name="msg" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-block" style="width: 100px;">Submit</button>
        </form>
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