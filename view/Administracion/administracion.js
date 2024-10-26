function init()
{
   
}

$(document).ready(function()
{
    $.post("../../controller/usuarioController.php?opcion=GetContadorGeneral", function (data) 
    {
        $('#lbltotal').html(data.TOTAL);
        
    }); 
});


init();