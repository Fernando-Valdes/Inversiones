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

        
    }); 

    $.post("../../controller/usuarioController.php?opcion=DatosDelUserLogin", function (data) 
    {
        if(data.autorizacion =='cfcd208495d565ef66e7dff9f98764da')
        {
            $('#ModalNoPago').modal('show');

           
        }
    });  
});


init();