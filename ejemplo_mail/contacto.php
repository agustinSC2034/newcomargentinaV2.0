<?php
/**
 * Script de envío de formulario de contacto - iTTel
 * Este archivo procesa el formulario y envía el email
 */

// Configuración
$destinatario = 'administracion@it-tel.com.ar';
$asunto_prefijo = '[Web iTTel] Nuevo mensaje de contacto de ';
$recaptcha_secret = '6LeK7VIsAAAAACXajgXzTiXkUql3lOALWK2Ekw9s';

// Headers para respuesta JSON
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Solo aceptar POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

// Obtener datos del formulario
$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$telefono = isset($_POST['asunto']) ? trim($_POST['asunto']) : ''; // El campo 'asunto' es el teléfono
$mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';
$recaptcha_response = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';

// Debug: Log de datos recibidos (eliminar en producción)
error_log("iTTel Form - Nombre: $nombre, Email: $email, reCAPTCHA length: " . strlen($recaptcha_response));

// Validaciones básicas
if (empty($nombre) || empty($email) || empty($mensaje)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Por favor completa todos los campos obligatorios (nombre, email y mensaje)']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'El email no es válido']);
    exit;
}

// Verificar reCAPTCHA
if (empty($recaptcha_response)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Por favor completa el reCAPTCHA']);
    exit;
}

// Validar reCAPTCHA con Google usando cURL
$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
$recaptcha_data = [
    'secret' => $recaptcha_secret,
    'response' => $recaptcha_response,
    'remoteip' => $_SERVER['REMOTE_ADDR']
];

// Usar cURL (más compatible con la mayoría de hostings)
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $recaptcha_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($recaptcha_data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$recaptcha_verify = curl_exec($ch);
$curl_error = curl_error($ch);
curl_close($ch);

// Log para debug
error_log("iTTel reCAPTCHA - Response: " . $recaptcha_verify . " | cURL Error: " . $curl_error);

if ($recaptcha_verify === false || !empty($curl_error)) {
    // Si falla la verificación con Google, loguear pero permitir el envío
    error_log("iTTel - Error al verificar reCAPTCHA: " . $curl_error);
    // Opción: permitir envío si Google no responde (descomentar las 2 líneas siguientes para bloquear)
    // http_response_code(500);
    // echo json_encode(['success' => false, 'message' => 'Error al verificar reCAPTCHA. Intenta más tarde.']);
    // exit;
}

$recaptcha_result = json_decode($recaptcha_verify);

if (!$recaptcha_result || !$recaptcha_result->success) {
    $error_codes = isset($recaptcha_result->{'error-codes'}) ? implode(', ', $recaptcha_result->{'error-codes'}) : 'unknown';
    error_log("iTTel - reCAPTCHA falló. Códigos: " . $error_codes);
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Verificación reCAPTCHA fallida. Por favor intenta de nuevo. (Error: ' . $error_codes . ')']);
    exit;
}

// Sanitizar datos para el email
$nombre = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$telefono = htmlspecialchars($telefono, ENT_QUOTES, 'UTF-8');
$mensaje = htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8');

// Construir el asunto
$asunto = $asunto_prefijo . $nombre;

// Construir el cuerpo del email en HTML
$cuerpo_html = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 8px 8px 0 0; }
        .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #555; }
        .value { margin-top: 5px; padding: 10px; background: white; border-radius: 4px; }
        .footer { text-align: center; padding: 15px; font-size: 12px; color: #888; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2 style='margin:0;'>📧 Nuevo mensaje de contacto</h2>
            <p style='margin:5px 0 0 0;'>Sitio Web iTTel</p>
        </div>
        <div class='content'>
            <div class='field'>
                <div class='label'>👤 Nombre:</div>
                <div class='value'>{$nombre}</div>
            </div>
            <div class='field'>
                <div class='label'>📧 Email:</div>
                <div class='value'><a href='mailto:{$email}'>{$email}</a></div>
            </div>
            <div class='field'>
                <div class='label'>📞 Teléfono:</div>
                <div class='value'>" . (!empty($telefono) ? $telefono : 'No proporcionado') . "</div>
            </div>
            <div class='field'>
                <div class='label'>💬 Mensaje:</div>
                <div class='value'>" . nl2br($mensaje) . "</div>
            </div>
        </div>
        <div class='footer'>
            Este mensaje fue enviado desde el formulario de contacto del sitio web iTTel<br>
            Fecha: " . date('d/m/Y H:i:s') . "
        </div>
    </div>
</body>
</html>
";

// Versión texto plano
$cuerpo_texto = "
===========================================
NUEVO MENSAJE DE CONTACTO - iTTel
===========================================

Nombre: {$nombre}
Email: {$email}
Teléfono: " . (!empty($telefono) ? $telefono : 'No proporcionado') . "

Mensaje:
-------------------------------------------
{$mensaje}
-------------------------------------------

Fecha: " . date('d/m/Y H:i:s') . "
";

// Generar boundary para email multipart
$boundary = md5(time());

// Headers del email
$headers = [
    'From: Sitio Web iTTel <noreply@it-tel.com.ar>',
    'Reply-To: ' . $nombre . ' <' . $email . '>',
    'MIME-Version: 1.0',
    'Content-Type: multipart/alternative; boundary="' . $boundary . '"',
    'X-Mailer: PHP/' . phpversion()
];

// Cuerpo multipart (texto + HTML)
$cuerpo = "--{$boundary}\r\n";
$cuerpo .= "Content-Type: text/plain; charset=UTF-8\r\n";
$cuerpo .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
$cuerpo .= $cuerpo_texto . "\r\n\r\n";
$cuerpo .= "--{$boundary}\r\n";
$cuerpo .= "Content-Type: text/html; charset=UTF-8\r\n";
$cuerpo .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
$cuerpo .= $cuerpo_html . "\r\n\r\n";
$cuerpo .= "--{$boundary}--";

// Enviar email
$enviado = mail($destinatario, $asunto, $cuerpo, implode("\r\n", $headers));

if ($enviado) {
    echo json_encode([
        'success' => true, 
        'message' => '¡Mensaje enviado exitosamente! Te contactaremos pronto.'
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => 'Error al enviar el mensaje. Por favor intenta más tarde o contáctanos directamente por teléfono.'
    ]);
}
?>
