<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Collect form data safely
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = htmlspecialchars(trim($_POST['email']));
    $phone   = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate required fields
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        die("Error: Todos los campos son obligatorios.");
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Email no válido.");
    }

    // Email settings
    $to = "youremail@example.com"; // <-- Replace with your email
    $subject = "Nuevo mensaje del formulario de contacto";

    $body = "
    Nombre: $name
    Email: $email
    Teléfono: $phone

    Mensaje:
    $message
    ";

    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado correctamente. ¡Gracias por contactarnos!";
    } else {
        echo "Error al enviar el mensaje. Inténtalo nuevamente.";
    }
}
?>