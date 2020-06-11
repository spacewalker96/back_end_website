
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Perfect Cup - Contact</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

    <div class="brand">The Perfect Cup</div>
    <div class="address-bar">3481 Melrose Place | Beverly Hills, CA 90210 | 123.456.7890</div>

    <!-- Navigation -->
    <?php include 'nav.php';?>


    <?php
        

        $msg = "";
        if (isset($_POST['send'])) {
            $fname = $_POST['fname'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $subject = 'contact form';
            $to = "hosni96.ht@gmail.com";
            $headers = "From :". $email;
            $email_msg = "New e-mail from ".$fname." ".$email.".\r\n".$message;

            if (strlen($fname)<2){

                $msg = "<div class='alert alert-danger'>Your Name must be longer</div>";
    
            }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

                $msg = "<div class='alert alert-danger'>Please write an valid email!!</div>";
    
            }else if ($message == ""){

                $msg = "<div class='alert alert-danger'>You can not send empty messag </div>";
    
            }else{

                require 'phpmailer/PHPMailerAutoload.php';
                //     $mail = new PHPMailer;

                //     // $mail->SMTPDebug = 4;                               // Enable verbose debug output

                //     $mail->isSMTP();                                      // Set mailer to use SMTP
                //     $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
                //     $mail->SMTPAuth = true;                               // Enable SMTP authentication
                //     $mail->Username = 'php.allah.test@gmail.com';                 // SMTP username
                //     $mail->Password = 'AZERTY123';                           // SMTP password
                //     $mail->SMTPSecure = 'tls'; 
                //     // $mail->SMTPAutoTLS = false;                           // Enable TLS encryption, `ssl` also accepted
                //     $mail->Port = 587;                                    // TCP port to connect to

                //     $mail->setFrom($email);
                //     $mail->addAddress('hosni96.ht@gmail.com');     // Add a recipient
                 

                    
                //     $mail->isHTML(true);                                  // Set email format to HTML

                //     $mail->Subject = $subject;
                //     $mail->Body    = $email_msg;
                   

                    // if(!$mail->send()) {
                    //     echo 'Message could not be sent.';
                    //     echo 'Mailer Error: ' . $mail->ErrorInfo;
                    // } else {
                    //     $msg = "<div class='alert alert-success'>your message has been sent successfully</div>";
                    // }
                // }
                

            

            define ('GUSER','php.allah.test@gmail.com');
            define ('GPWD','AZERTY123');
            
            
            // make a separate file and include this file in that. call this function in that file.
            
            function smtpmailer($to, $email, $fname, $subject, $email_msg) { 
                global $error;
                $mail = new PHPMailer();  // create a new object
                $mail->IsSMTP(); // enable SMTP
                $mail->SMTPDebug = 2;  // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true;  // authentication enabled
                $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
                $mail->SMTPAutoTLS = false;
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
            
                $mail->Username = GUSER;  
                $mail->Password = GPWD;           
                $mail->SetFrom($email, $fname);
                $mail->Subject = $subject;
                $mail->Body = $email_msg;
                $mail->AddAddress($to);
                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    $msg = "<div class='alert alert-success'>your message has been sent successfully</div>";
                }
            }

            }

        }
    
    
    ?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>The Perfect Cup</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-8">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3304.4557903780455!2d-118.33880764857918!3d34.08346238050228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2b8d3b1e0287d%3A0x9cc32be17df028b8!2sMelrose+Ave%2C+Beverly+Hills%2C+CA+90210%2C+USA!5e0!3m2!1sen!2sca!4v1458950947899"
                        width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-4">
                    <p>Phone:
                        <strong>123.456.7890</strong>
                    </p>
                    <p>Email:
                        <strong><a href="mailto:info@theperfectcup.com">info@theperfectcup.com</a></strong>
                    </p>
                    <p>Address:
                        <strong>3481 Melrose Place
                            <br>Beverly Hills, CA 90210 <?php echo $msg; ?></strong>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>form</strong>
                    </h2>
                    <hr>
                    <?php echo $msg; ?>
                    <div id="add_err2"></div>
                    <p style="color:#FF0000; font-size:12px;">
                    <form role="form" action ="contact.php" method = "post">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Name</label>
                                <input type="text" id="fname" name="fname" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Email Address</label>
                                <input type="email" id="email" name="email" maxlength="25" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Message</label>
                                <textarea class="form-control" id="message" name="message" maxlength="100" rows="6"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <button type="submit" id="contact" name="send" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; The Perfect Cup 2019</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>