<?PHP
require './PHPMailer/class.phpmailer.php';
require './PHPMailer/PHPMailerAutoload.php';


$nombre = $_POST['nombre'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

$mail = new PHPMailer();
$mail->IsSMTP(); //telling the class to use SMTP
$mail->isHTML(true);
$mail->Host         = "smtpout.secureserver.net"; //also tried "relay-hosting.secureserver.net"
//$mail->Host = "smtp.gmail.com";
$mail->WordWrap     = 50;
$mail->SMTPAuth     = true;
$mail->SMTPSecure   = "ssl";
$mail->Port         = 465; //25, 80, 3535, 465 (Gmail)
$mail->SMTPDebug = 0; //Debug al momento del envío del correo

//Correo del que sale el mail
$mail->Username     = "spods@isamarina.com";
//Password de donde sale el mail
$mail->Password     = "Spods123!";
//Nombre que se muestra del remitente
$mail->SetFrom("spods@isamarina.com","F.B. Programadores");  

//Asunto del Correo
$mail->Subject = "F.B. Programadores - Nuevo mensaje desde formulario web"; //Asunto del Correo
//Cuerpo del Correo (Formato HTML)
$cuerpo = "<h3>Ha recibido un nuevo mensaje desde el formulario de contacto de la página <a href='http://fbsection.com'>F.B. Programadores</a></h3>
<h4>A continuación, se presentan los datos ingresados en el formulario de contacto:</h4>
<p><strong>Nombre:</strong></p><p>".$nombre."</p>
<p><strong>Email:</strong></p><p><a href='mailto:".$email."'>".$email."</a></p>
<p><strong>Asunto:</strong></p><p>".$asunto."</p>
<p><strong>Mensaje:</strong></p><p>".$mensaje."</p>
<br>
<p><span style='font-size:10px'><span style='color:#FF0000'>Si tiene pensado eliminar el mensaje,recuerde que estos datos no han sido guardados en ningún lugar. Esta información se encuentra únicamente&nbsp;en este correo.</span></span></p>";

$mail->Body = $cuerpo;//"<hr><p>Nombre: "+$nombre+"</p><p>Email: </p><a href='mailtto:"+$email+"'>"+$email+"</a><p>Asunto: "+$asunto+"</p><p>Mensaje: "+$mensaje+"</p>";//'Este es el cuerpo del mensaje. Especiales: á é í ó ú ñ <b>Texto en negrita de prueba!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//Correo a donde llega el mail. Se pueden agregar varios de la misma forma. El segundo parámetro es opcional, es el nombre que figura en la lista de correos.
$mail->addAddress('fbprogramadores@gmail.com', 'F.B. Programadores');
//Correo con copia oculta. Se pueden agregar varios de la misma forma.
$mail->addBCC('bdiaz@bigcheese.com.uy');
$mail->addBCC('fsperonip@gmail.com');

if(!$mail->send()) {
    //echo 'El mensaje no pudo ser enviado.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
	echo "El mensaje no pudo ser enviado.";
} else {
    echo 'El mensaje ha sido enviado.';
}

?>