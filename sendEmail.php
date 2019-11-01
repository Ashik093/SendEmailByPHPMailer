<?php
  use PHPMailer\PHPMailer\PHPMailer;
  if ($_REQUEST['email'] && $_REQUEST['name'] && $_REQUEST['subject'] && $_REQUEST['body']) {
    $email=$_REQUEST['email'];
    $name=$_REQUEST['name'];
    $subject=$_REQUEST['subject'];
    $body=$_REQUEST['body'];

    require_once('PHPMailer/PHPMailer.php');
    require_once('PHPMailer/SMTP.php');
    require_once('PHPMailer/Exception.php');

    $mail=new PHPMailer();

    //SMTP Setting
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->SMTPAuth=true;
    $mail->Username='from@example.com';
    $mail->Password='password';
    $mail->Port=587;
    $mail->SMTPSecure='tls';

    //Email setting
    $mail->isHTML(true);
    $mail->setFrom($email,$name);
    $mail->addAddress($email);
    $mail->Subject=$subject;
    $mail->Body='<div class="container"><nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <h3>Experiment</h3> 
          </li>

      </div>
    </nav><p>'.$body.'</p>
    </div>';

    if($mail->send()){
      echo '<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Congratulation !!</h4>
            <p>An email has been sent successfully to <b>'.$email.' from <b>mdashikurrahman598619@gmail.com</b>. Check Your Inbox</b></p>
          </div>';
    }else {
      echo '<div class="alert alert-danger" role="alert">
              Failed to sent email. Try Again....
            </div>';
    }

  }

 ?>
