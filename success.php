<?php
    $msg = "";  
    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST['submit'])){

		$name = $_POST['name'];
        $email = $_POST['email'];
        $query = $_POST['query'];
        
        if ($name == "" || $email == "")
            $msg = "Please check your inputs!";
        else {
            include_once "PHPMailer/PHPMailer.php";
            include_once 'PHPMailer/SMTP.php';

            $mail = new PHPMailer();
                //Server settings
                // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = '';                 // SMTP username
                $mail->Password = '';                           // SMTP password
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;      
                
                // users mailing code
            $mail->setFrom('amanpandey.ttb@gmail.com', 'Aman Pandey');
            $mail->addAddress($email, $name);
            $mail->Subject = "Thank You for connecting with Lazzzy Coder!";
            $mail->isHTML(true);
            $mail->Body = "
                Thank you for reaching me!!<br><br>
                I will connect with you soon to solve your query<br>
                $query<br>
                Thanks and Regards!!<br>
                <b>Aman Pandey<b><br>
                Lazzzy Coder<br>
                
            ";
            if ($mail->send())
                $msg = "You have been registered! Please verify your email!";
            else
                $msg = "Something wrong happened! Please try again!";
        
        }
    }
    else{
    header("Location: index.html");
    // die();
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">    <link rel="stylesheet" href="https://use.typekit.net/ekp8ytl.css">
    <link href="./main.css" rel="stylesheet">
    <title>Please check you email | Portfolio of Aman Pandey</title>
    <meta name="description" content="Portfolio website of Aman Pandey(Lazzzy-Coder). Website includes pervious work experiences, projects, testimonials etc.">
    <link rel="canonical" href="index.html" />
    <link rel="icon" size="" href="./images/favicon.png">
    <meta name=”robots” content=”index, follow”> 
    <meta name="theme-color" content="#962b6e">
</head>
<body>
  <section id="sucess" class="container text-center" style="padding:20vh 0;height:100vh;">
      <h2 style="color:#fff">
          Thank You <?php echo($name); ?> for connecting.
      </h2>
      <p> I will contact you soon...</p>
      <a style="color:#d459ab" href="index.html">click here to go to home page</a>
  </section>   

</body>
</html>

<?php die(); ?>