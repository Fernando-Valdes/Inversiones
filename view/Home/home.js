function init()
{
   
}

$(document).ready(function()
{
    var idUser = $('#user_idx').val();

    $.post("../../controller/usuarioController.php?opcion=obtenerContadorXuser", {idUser:idUser}, function (data) {
        //data = JSON.parse(data);
        $('#lbltotal').html(data.contador_visitas);
    }); 

     $.post("../../controller/usuarioController.php?opcion=graficoXid", {idUser:idUser},function (data) 
     { 
        //data = JSON.parse(data);
        
        new Morris.Bar({
            element: 'divgrafico',
            data: data,
            xkey: 'username',
            ykeys: ['contador_visitas'],
            labels: ['Total de visitas'],
            barColors: ["#1AB244"], 
        });
    }); 

});

init();