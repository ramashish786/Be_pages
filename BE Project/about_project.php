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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>About Project</title>

    <style>
    .block_container {
        display: flex;
        justify-content: center;
        border: 5px solid #000;
    }

    .text_edit {
        text-align: center;
        font-size: 0.5cm;
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
                <li class="nav-item">
                    <a class="nav-link" href="./allvalue.php">All Value<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./about_project.php">About Project<span
                            class="sr-only">(current)</span></a>
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
    <h1><u><b>Block Diagram</b></u></h1>
    <div class="block_container">
        <img src="./assets/img/block_diagram.jpg" style="width: 900px" alt="block_diagram">
    </div>
    <br></br>
    <div>
        <p class="text_edit">
            <b><i> Water quality is an important parameter for fish farming.Differences in factors such as inputs,
                    climate,
                    management, technology, markets, social environment, and institutions might be reasons for the
                    disparities in
                    growth. India is also an important country that produces fish through aquaculture in the world.
                    India is home
                    to more than 10 percent of the global fish diversity. Presently, the country ranks second in the
                    world in
                    total fish production with an annual fish production of about 9.06 million metric tonnes.The
                    requirement of
                    water changes with the type of fish we want to breed. Sometimes changes in the quality of water
                    happen all of
                    sudden and it is very harmful to the aquaculture. So we are designing a system that monitors the
                    parameters of
                    water such as temperature ,PH value ,turbidity and total dissolved solids(TDS).It also records data
                    in a
                    database that can be used for data analysis like dashboard and comparison of data. If a sudden
                    change occurs
                    in the water parameter then the system will notify the user so that the user can take necessary
                    action on it.
                    The user can see previously collected data and do the analysis and make the necessary
                    changes.</i></b>

        </p>
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