<?php
include_once 'dbex.php';
?>

<?php
$temp= mysqli_real_escape_string($connect , $_POST['temp']);
$ph_value =mysqli_real_escape_string($connect , $_POST['ph_value']);
$turbidity = mysqli_real_escape_string($connect , $_POST['turbidity']);
$tds = mysqli_real_escape_string($connect , $_POST['tds']);
if($temp > 30){
    $to = "ramashishsahani786@gmail.com";
    $sub = "Warnninf !";
    $msg = "Temperaure is high! [$temp]";
    $header = "FROM: ramashishsahani786@gmail.com";
    if(mail($to,$sub,$msg,$header)){
        echo "Success";
    }

    else{
        echo "Failed";
    }

}
//$user_pass = mysqli_real_escape_string($connect , $_POST['user_pass']);

    $sql = "INSERT INTO sensors(temp,ph_value,turbidity,tds) 
    VALUES('$temp','$ph_value','$turbidity','$tds');";
    if(mysqli_query($connect,$sql)){
        echo "Successful";
    }
    else{
        echo "Failed";
    }
    
   // header("Location:../ex03.php?submit=suscess");
?>