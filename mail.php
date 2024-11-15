<?php
if (!$_POST) exit;

// Configuración del destinatario y asunto
$to = "JOHANMESPINOSA@gmail.com";  // Cambia este correo a donde quieres que lleguen los mensajes
$subject = "Nueva Reserva";

// Captura de datos del formulario
$form_name = filter_var($_POST['form_name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
$no_of_persons = filter_var($_POST['no_of_persons'], FILTER_SANITIZE_STRING);
$date = filter_var($_POST['date-picker'], FILTER_SANITIZE_STRING);
$time = filter_var($_POST['time-picker'], FILTER_SANITIZE_STRING);
$preferred_food = filter_var($_POST['preferred_food'], FILTER_SANITIZE_STRING);
$occasion = filter_var($_POST['occasion'], FILTER_SANITIZE_STRING);

// Verificación de campos obligatorios
if (empty($form_name) || !$email || empty($date) || empty($time)) {
    echo "Por favor, completa todos los campos obligatorios.";
    exit;
}

// Construcción del mensaje
$message = "Nombre: $form_name\n";
$message .= "Email: $email\n";
$message .= "Teléfono: $phone\n";
$message .= "No. de Personas: $no_of_persons\n";
$message .= "Fecha: $date\n";
$message .= "Hora: $time\n";
$message .= "Comida Preferida: $preferred_food\n";
$message .= "Ocasión: $occasion\n";

// Encabezados del correo
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

// Envía el correo
if (mail($to, $subject, $message, $headers)) {
    echo "Correo enviado exitosamente.";
} else {
    echo "Error al enviar el correo.";
}
?>
<?php
if (!$_POST) {
    echo "Formulario no enviado.";
    exit;
}
echo "El formulario se envió correctamente.";
?>
