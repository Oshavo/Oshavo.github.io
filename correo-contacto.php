<?php
    if(isset($_POST['enviar'])){
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['message'])){
            $name = $_POST['name'];
            $message = $_POST['message'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $header = "From: noreply@example.com" . "\r\n";
            $header.= "Reply-To: noreply@example.com" . "\r\n";
            $header.= "X-Mailer: PHP/" . phpversion();
            $mail = @mail($email, $message, $header);
            if($mail) {
                echo'
                <script>
                    alert("Correo enviado con éxito");
                    window.location = "contact.php";
                </script>
                ';
            }
        }
    }
?>