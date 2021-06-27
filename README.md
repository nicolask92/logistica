# TP Logistica - Programacion Web 2 - UNLAM

Problemas con autentificacion:
Si tenes mysql 8 seguramente tengas que correr:
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password
BY 'password';  

Configurando para que el ambiente pueda enviar correos electronicos:

Paso 1: ir al archivo php.ini en la ruta C:\xampp\php\php.ini
Paso 2: encontrar la línea ;extension=php_openssl.dll y quitarle el punto y coma
Paso 3: encontrar las líneas SMTP, smtp_post, sendmail_from y sendmail_path y poner lo siguiente si utilizarás gmail como smtp:
SMTP=smtp.gmail.com 
smtp_port=587
sendmail_from = tu_direccion_de_correo_electronico@gmail.com
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"
Si copias y pegas ten cuidado con las comillas porque puede que no se este insertando la comilla adecuada

Paso 4: abrir el archivo sendmail.ini se encuentra en la ruta C:\xampp\sendmail\sendmail.ini y configurarlo de la siguiente manera:
smtp_server=smtp.gmail.com
smtp_port=587
error_logfile=error.log
debug_logfile=debug.log
auth_username=tu_direccion_de_correo_electronico@gmail.com
auth_password=el_password_de_la_direccion_de_correo_electronico
force_sender=tu_direccion_de_correo_electronico@gmail.com
Paso 5: si utilizas gmail para el envio de correos de manera local debes tener el cuenta que debes activar la opción “Permitir que aplicaciones menos seguras accedan a tu cuenta”  de lo contrario no podras enviar los correos electrónicos con gmail,  dejo el link a la documentación 
https://support.google.com/accounts/answer/6010255?hl=es-419 
Si estas loggeado puedes activar las directamente en este link https://myaccount.google.com/lesssecureapps?pli=1

Paso 6: después de hacer estas configuraciones debes reinicar xampp y ya puedes probar el envio de correos

Fuente: http://albertotain.blogspot.com/2018/02/como-configurar-xampp-para-enviar.html
