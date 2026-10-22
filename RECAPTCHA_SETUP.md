# Configuración privada del formulario

Antes de desplegar, el proceso PHP del sitio debe recibir `RECAPTCHA_SECRET_KEY` con el mismo secreto de reCAPTCHA que usaba el formulario. No rotar la clave ni cambiar la sitekey pública.

En cPanel, una opción es configurar `auto_prepend_file` en la configuración PHP específica del sitio, apuntando a un archivo PHP privado fuera de TODAS las raíces públicas y del checkout Git. Ese archivo puede proporcionar la variable mediante `putenv()`. Revisar primero cualquier auto_prepend_file existente: no reemplazarlo sin integrar su comportamiento. No guardar el valor en .htaccess, .user.ini, este documento ni otros archivos versionados. Un archivo .env solo no se carga.

Ejemplo conceptual del contenido del archivo PRIVADO (sustituir el marcador únicamente en el servidor):

```php
<?php
putenv('RECAPTCHA_SECRET_KEY=VALOR_PRIVADO_EXISTENTE');
```

Configurar cada sitio por separado. Conservar copia privada de la configuración previa. Comprobar desde PHP que la variable llega sin imprimir su valor. Antes de publicar, verificar que el formulario activo utiliza la clave esperada.

Si falta la variable o está vacía, el formulario devuelve un error temporal antes de contactar Google o enviar correo. Mantiene el tipo de respuesta habitual: JSON o alerta con redirección. La validación reCAPTCHA, destinatarios y contenido de los correos se conservan.

Comprobar tras el despliegue: petición incompleta rechazada, CAPTCHA inválido rechazado y envío legítimo con CAPTCHA resuelto por una persona y correo recibido en un destino acordado. No publicar un archivo de diagnóstico ni volcar variables del servidor.

Este cambio retira el secreto del código actual; la limpieza del historial de GitHub queda como etapa separada.

`ejemplo_mail/contacto.php` usa `RECAPTCHA_EXAMPLE_SECRET_KEY`, con el secreto propio de ese ejemplo (distinto del principal). Configurar ambas variables si se publica el ejemplo.
