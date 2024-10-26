<?php
    require '../../vendor/autoload.php'; 
    MercadoPago\SDK::setAccessToken("APP_USR-4581388744575532-102613-96c2c2e2eff1c52036049f47f07c4fb4-692215791");
    $preference = new MercadoPago\Preference();
    $conexion = new Conectar();
    $DireccionUrlPagoExito = $conexion->ruta() . "controller/pagoController.php";


    
    $item = new MercadoPago\Item();
    $item->id = $_SESSION['id'];
    $item->title = 'Pago Suscripción VIP';
    $item->quantity = 1;
    $item->unit_price = $_SESSION['costo'];
    $preference->items = array($item);

    $preference->back_urls = array(
        "success" => "".$DireccionUrlPagoExito."",
        "failure" => "",
        "pending" => ""
    );

    $preference->auto_return = "approved";
    $preference->save();
?>


<header class="site-header">
    <div class="container-fluid">
        <a href="#" class="site-logo">
            <img class="hidden-md-down" src="../../public/img/logo-2.png" alt="">
            <img class="hidden-lg-up" src="../../public/img/logo-2-mob.png" alt="">
        </a>
        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
            <span>toggle menu</span>
        </button>
        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>
        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                    <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../../public/img/0.ico" alt="">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a class="dropdown-item" href="../Configuracion/configuracion.php"><span class="font-icon glyphicon glyphicon-user"></span>Perfil</a>
                            <!--<a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Contactanos</a>-->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../Logout/logout.php"><span class="font-icon glyphicon glyphicon-log-out"></span>Cerrar Sesion</a>
                        </div>
                    </div>
                </div>

                <div class="mobile-menu-right-overlay"></div>
                <input type="hidden" id="user_idx" value="<?php echo $_SESSION["id"] ?>"><!-- ID del Usuario-->
                <div class="dropdown dropdown-typical" Id="Wallet_boton">
                    <a href="#" class="dropdown-toggle no-arr">

                        <?php 
                            if($_SESSION['autorizacion']=='cfcd208495d565ef66e7dff9f98764da')
                            {?>
                                <span class="label label-pill label-warning">Versión Gratuita</span>


                                <!-- Inicio Botón para pagar MercadoPago -->
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                    const container = document.querySelector('#Wallet_boton');
                                    if (container) {
                                    const mp = new MercadoPago('APP_USR-4ca16517-8840-4104-a74c-38cf9a94f637', {
                                    locale: 'es-AR' 
                                    });

                                    mp.checkout({
                                    preference: {
                                    id: '<?php echo $preference->id; ?>'
                                    },
                                    render: {
                                    container: '#Wallet_boton', 
                                    label: 'Pagar MercadoPago', 
                                    }
                                    });
                                    } else {
                                    console.error("El contenedor #Wallet_boton no fue encontrado en el DOM");
                                    }
                                    });
                                </script>
                                <!-- Fin Botón para pagar MercadoPago -->

                            <?php
                            }
                            else
                            {?>
                                <span class="label label-pill label-success">Suscripción VIP pagada</span>
                            <?php
                            }
                        ?>


                        <!-- Botón donar en Paypal
                        <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
                        <script>
                        PayPal.Donation.Button({
                        env:'production',
                        hosted_button_id:'N4AE6MD8PGUQ2',
                        image: {
                        src:'https://www.paypalobjects.com/es_XC/MX/i/btn/btn_donateCC_LG.gif',
                        alt:'Donar con el botón PayPal',
                        title:'PayPal - The safer, easier way to pay online!',
                        }
                        }).render('#Wallet_boton');
                        </script>
                        Fin de Botón donar en Paypal-->


                    </a>
                </div>
            </div>
        </div>
    </div>
</header>