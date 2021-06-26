<?php
include('smtp/PHPMailerAutoload.php');
include_once './includes/dbex.php';

    $temp = $_GET['temp'];
    $turbidity = $_GET['turbidity'];
    $tds = $_GET['tds'];
    $phvalue = $_GET['phvalue'];
    $user = $_GET['user'];

    $insertSql = "INSERT INTO `sensors` ( `temp`, `ph_value`, `turbidity`, `tds`, `user`) VALUES ('$temp', '$phvalue', '$turbidity', '$tds', '$user'); ";
    $insertResult = mysqli_query($connect, $insertSql);

    if($insertResult){
        $toSendMail = false;
        $message = '<html><body>';
        $message .= '<span>Hi, Please check your readings now by clicking <a href="https://aquaculture2021.000webhostapp.com/allvalue.php">here</a></span>';
        $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
        if($temp < 25 || $temp > 30){
            $message .= "<tr><td><strong>Temperature:</strong> </td><td>" . $temp . "</td></tr>";
            $toSendMail = true;
        }
        if($turbidity < 10 || $turbidity > 25){
            $message .= "<tr><td><strong>Turbidity:</strong> </td><td>" . $turbidity . "</td></tr>";
            $toSendMail = true;
        }
        if($phvalue < 6 || $phvalue > 9){
            $message .= "<tr><td><strong>Ph Value</strong> </td><td>" . $phvalue . "</td></tr>";
            $toSendMail = true;
        }
        if($tds > 0.13){
            $message .= "<tr><td><strong>TDS</strong> </td><td>" . $tds . "</td></tr>";
            $toSendMail = true;
        }
        $message .= "</table>";
        $message .= "</body></html>";

        if($toSendMail){
            $sqlQuery = "SELECT * from users where id='$user'";
            $result = mysqli_query($connect, $sqlQuery);
            $userRow = mysqli_fetch_assoc($result);

            $mail = new PHPMailer(); 
	        $mail->SMTPDebug  = 0;
	        $mail->IsSMTP(); 
	        $mail->SMTPAuth = true; 
	        $mail->SMTPSecure = 'tls'; 
	        $mail->Host = "smtp.gmail.com";
	        $mail->Port = 587; 
	        $mail->IsHTML(true);
	        $mail->CharSet = 'UTF-8';
	        $mail->Username = "prabhu334630@gmail.com";
	        $mail->Password = "Prabhu@334630";
	        $mail->SetFrom("prabhu334630@gmail.com");
	        $mail->Subject = "Fish Farm Monitoring Report";
	        $mail->Body = $message;
	        $mail->AddAddress($userRow['email']);
	        $mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		echo 'Mail Sent Successfully.';
	}
        }
        
    }

?>