<link rel="stylesheet" href="css/styles.css">
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    if(isset($_POST['name']) && isset($_POST['email'])){
        $nom     = $_POST['name'];
        $email   = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        require_once("./PHPMailer/src/Exception.php");
        require_once("./PHPMailer/src/PHPMailer.php");
        require_once("./PHPMailer/src/SMTP.php");

        $mail = new PHPMailer(true);

        $mail ->isSMTP();
        $mail ->Host = 'smtp.gmail.com';
        $mail ->SMTPAuth = true;
        $mail ->Username = "centrebtsm6@gmail.com";
        $mail ->Password = 'kqyioabmoenzawky'; 
        $mail ->SMTPSecure = 'tls';
        $mail ->Port = '587';
        $mail ->setFrom("$email");
        $mail ->addAddress('centrebtsm6@gmail.com');
        $mail ->isHTML(true);
        $mail ->Subject = 'Message received from contact '.$nom;
        $mail ->Body = 'Nom Complet : '. $nom. '<br>'.'Email :'.$email.'<br>'.'Sujet :'.$subject.'<br>'.'Votre Message :'.$message ;
        if($mail ->send()){ 
            $response = "<p class='alert alert-success'>Votre est message est envoyer avec succes";
        }
        else{ 
            $response = "<p class='alert alert-danger'>Votre message n'est pas envoyer !" . $mail ->ErrorInfo;
        }
        exit(json_encode(($response)));
    
    }
    ?>