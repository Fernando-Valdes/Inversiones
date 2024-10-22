<?php
// Cargar el SDK de Mercado Pago
require __DIR__ . '/../vendor/autoload.php'; // Ruta corregida

// Autenticación en Mercado Pago con tu Access Token
MercadoPago\SDK::setAccessToken("APP_USR-4381823441007119-101621-bea5a3214947203bdbbcb905af5ec2c0-2034927598");

// Crear preferencia
$preference = new MercadoPago\Preference();

// Crear ítem de la preferencia
$item = new MercadoPago\Item();
$item->title = 'VIP Cálculo EWS';
$item->quantity = 1;
$item->unit_price = 50.00; // Precio del producto
$preference->items = array($item);

// URL de retorno (donde redirigir después del pago)
$preference->back_urls = array(
    "success" => "pagoExitosoController",
    "failure" => "https://tu-sitio.com/pago_fallido",
    "pending" => "https://tu-sitio.com/pago_pendiente"
);
$preference->auto_return = "approved";

// Guardar y generar la preferencia
$preference->save();
?>
