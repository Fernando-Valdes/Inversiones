var tabla;

function init()
{
    $("#configuracion_form").on("submit",function(e) 
    {
        guardar(e);	
    });
}

function guardar(e) 
{ 
    e.preventDefault();
    var formData = new FormData($("#configuracion_form")[0]);

    $.ajax({
        url: "../../controller/usuarioController.php?opcion=guardar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos) 
        {
            $.post("../../controller/usuarioController.php?opcion=DatosDelUserLogin", function (data) 
            {
                $('#id_Configuracion').val(data.id);
                $('#NOMBRE').val(data.nombre);
                $('#CORREO').val(data.email);  
                $('#TELEFONO').val(data.telefono);   
                $('#ENLACE_EWINSCORE').val(data.enlace_ews);
                $('#ENLACE_GRUPO_WHATSAPP').val(data.enlace_grupo);  
                $('#ENLACE').val(data.comparte_enlace + data.id);  
        
                if(data.realizo_pago ==0)
                {
                    const botonB = document.getElementById("Guardar");
                    botonB.disabled = true;   
                }
            });  
            
            swal({
                title: "Inversiones!",
                text: "Guardado con éxito.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            console.error("Error en la petición AJAX:", textStatus, errorThrown);
            swal({
                title: "Error!",
                text: "Hubo un error al guardar los datos.",
                type: "error",
                confirmButtonClass: "btn-danger"
            });
        }
    });
}


$(document).ready(function()
{     
    $.post("../../controller/usuarioController.php?opcion=DatosDelUserLogin", function (data) 
    {
        $('#id_Configuracion').val(data.id);
        $('#NOMBRE').val(data.nombre);
        $('#CORREO').val(data.email);  
        $('#TELEFONO').val(data.telefono);   
        $('#ENLACE_EWINSCORE').val(data.enlace_ews);
        $('#ENLACE_GRUPO_WHATSAPP').val(data.enlace_grupo);  
        $('#ENLACE').val(data.comparte_enlace + data.id);  

        if(data.autorizacion =='cfcd208495d565ef66e7dff9f98764da')
        {
            const botonB = document.getElementById("Guardar");
            botonB.disabled = true;   
        }
    });  
});

function editar(idUser)
{   
    $('#mdltitulo').html('Editar Registro'); 

    $.post("../../controller/usuarioController.php?opcion=UserXid", {idUser : idUser}, function (data) 
    {
        $('#usu_id').val(data.id);
        $('#Ewinscore').val(data.enlace_registro);
        $('#WhatsApp').val(data.enlace_grupo);    
    }); 

    $('#modalnuevo').modal('show');
}

init();