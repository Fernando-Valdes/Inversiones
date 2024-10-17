function init()
{
   
}

$(document).ready(function()
{
    var idUser = $('#user_idx').val();

    $.post("../../controller/usuarioController.php?opcion=obtenerContadorXuser", {idUser:idUser}, function (data)
    {
        //data = JSON.parse(data);
        $('#lbltotal').html(data.contador_visitas);
    }); 

     $.post("../../controller/usuarioController.php?opcion=graficoXid", {idUser:idUser},function (data) 
     { 
        //data = JSON.parse(data);
        
        new Morris.Bar({
            element: 'divgrafico',
            data: data,
            xkey: 'nombre',
            ykeys: ['contador_visitas'],
            labels: ['Total de visitas'],
            barColors: ["#1AB244"], 
        });

        const mp = new MercadoPago('', 
        {
            locale: 'es-MX' 
        });

        mp.checkout({
            preference: {
                id: '<?php echo $preference->id; ?>' // ID de la preferencia creada
            },
            render: {
                container: '.cho-container', // Selector del botón de pago
                label: 'Pagar', // Texto del botón de pago
            }
        });
    }); 

    $.post("../../controller/usuarioController.php?opcion=DatosDelUserLogin", function (data) 
    {
        if(data.autorizacion =='cfcd208495d565ef66e7dff9f98764da')
        {
            $('#ModalNoPago').modal('show');

            const mp = new MercadoPago('APP_USR-2968dd6c-c1d3-4081-b69a-b2a17f2be926',{
                    locale: 'es-MX'
                });

            mp.bricks();create("wallet", "Wallet_boton", {
                initialization: {
                    preferenceId: '1'
                }
            })
        }
    });  
});


init();