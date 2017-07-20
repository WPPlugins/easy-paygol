=== PayGol ===
Contributors: Felipe Saavedra
Donate link: https://www.paypal.com/cl/cgi-bin/webscr?cmd=_flow&SESSION=B7vSAspeluQjsFWOpEemJdKfjDCYr0_YuNBE41U2BATJSZRFFOgVAfientu&dispatch=5885d80a13c0db1f22d2300ef60a67593b79a4d03747447e1e8d0f800ad65e80
Tags: paygol, smsgol, micropayment, sms premium, banca movil, micropagos
Requires at least: 2.0
Tested up to: 2.6
Stable tag: 0.7

Este plugin permite implementar el micropago a traves de SMS y llamada telefonica, puedes cobrar por un contenido especifico en tu web.

== Description ==

Este plugin permite cobrar por un contenido especifico en tu sitio web.

Solo basta que coloques el shortcode [paygol][/paygol] y todo el contenido que esté entre los tag del shortcode, será visible solo cuando el usuario realice un pago.
Por ejemplo [paygol]Este es el contenido oculto[/paygol]

Se puede definir valores distintos para cada contenido.

Ir a  Opciones->PayGol para más información.

**Pasos**
1.- Debes registrarte en el sitio paygol.com
2.- Debes crear un servicio
3.- Debes copiar la información del servicio en el panel de administración del plugin Settings->PayGol
  - Debes copiar el ID del servicio
  - Debes copiar la imagen ejemplo: http://www.paygol.com/micropayment/img/buttons/150/pay_es_2.png
  - Debes ingresar el tipo de moneda
  - Debes ingresar el valor por defecto, este será el valor a cobrar cuando no se defina algun valor en el parametro pg_price.
4.- En tu post, debes colocar el shortcode [paygol][/paygol] Todo lo que este entre estos tag será visible una vez que se realice el pago.

== Instalción ==

1. Descargar plugin
1. Descomprimir
1. Subir a la carpeta wp-content/plugin/
1. Iniciar sesión en su blog ir a la pagina de plugin y activar el plugin Paygol
1. Ir a opciones->PayGol para configurar. 

== screenshots ==

1. screenshot-1.png
2. screenshot-2.png

