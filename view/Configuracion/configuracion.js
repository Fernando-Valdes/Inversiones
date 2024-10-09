var tabla;

function init()
{
    $("#usuario_form").on("submit",function(e) 
    {
        guardar(e);	
    });
}

function guardar(e) 
{ 
    e.preventDefault();
    var formData = new FormData($("#usuario_form")[0]);

    $.ajax({
        url: "../../controller/usuarioController.php?opcion=guardar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos) 
        {
            //onsole.log(datos); 
            $('#usuario_form')[0].reset(); 
            $("#modalnuevo").modal('hide'); 
            $('#usuario_data').DataTable().ajax.reload(); 
            
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
    tabla=$('#usuario_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
                ],
        "ajax":{
            url: '../../controller/configuracionController.php?opcion=Enlaces',
            type : "post",
            data: function(d) 
            {
                d.idUser = $('#user_idx').val();
            },
            dataType : "json",						
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }     
    }).DataTable(); 
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