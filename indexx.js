var tabla;
var idUser;
let chart;

function init() 
{
    $(document).on("click", "#Calcular", function(event) 
    {
        event.preventDefault();  
        var inversion = $('#Inversion').val();
        var retiro = $('#diaRetiro').val();    

        $('#Inversion').val(inversion); 
        $('#diaRetiro').val(retiro);
        tabla.ajax.reload(null, false); 

        
        $.ajax({
            url: 'controller/indexController.php?opcion=ObtenerResultadosTabla', 
            method: 'POST',
            data: 
            {
                inversion: inversion,
                retiro: retiro
            },
            dataType: 'json',
            success: function (response) 
            {
                const labels = [];
                const ganancias = [];
                const saldos = [];


                response.aaData.forEach((row) => 
                {
                    labels.push('Día ' + row[0]);
                    ganancias.push(parseFloat(row[8].replace('$', '').replace(',', '')));
                    saldos.push(parseFloat(row[11].replace('$', '').replace(',', '')));
                });

                // Actualizar la gráfica
                updateChart(labels, ganancias, saldos);
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
        
    });


    $(document).on("click", "#btnContactanos", function(event) 
    {
        event.preventDefault();  
        $('#ModalContactanos').modal('show');    
    });

    $(document).on("click", "#btnRegistrarse", function(event) 
    {
        event.preventDefault();  
        $('#ModalRegistro').modal('show');    
    });

    $(document).on("click", "#BntModaRegistro", function(event) 
    {
        event.preventDefault();  
        $('#ModalRegistro').modal('show');    
        $('#ModalIndex').modal('hide');  
    });

    $(document).on("click", "#btnVideos", function(event) 
    {
        event.preventDefault();  
        $('#ModalVideos').modal('show');    
    });


    $('#contacto_form').on('submit', function(e) 
    {
        e.preventDefault();
        var formData = new FormData($("#contacto_form")[0]);

        const botonB = document.getElementById("enviar");
        botonB.disabled = true; 

        $.ajax({
            url: "controller/emailController.php?opcion=EnviarMensajeContactanos",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos) 
            {
                $('#contacto_form')[0].reset(); 
                $("#ModalContactanos").modal('hide'); 
                
                swal({
                    title: "Tu mensaje ha sido enviado!",
                    text: "Nos pondremos en contacto contigo lo antes posible.",
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
    });


    $('#registro_form').on('submit', function(e) 
    {
        e.preventDefault();
        var formData = new FormData($("#registro_form")[0]);

        const botonB = document.getElementById("BtnRegistro");
        botonB.disabled = true; 

        if($('#PASSWORD').val() == $('#PASSWORD_2').val())
        {
            $.ajax({
                url: "controller/usuarioController.php?opcion=Registro",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos) 
                {
                    $('#registro_form')[0].reset(); 
                    $("#ModalRegistro").modal('hide'); 
                    
                    swal({
                        title: "¡Registro éxitoso!",
                        text: "¡Ya puedes ingresar al sistema!",
                        type: "success",
                        confirmButtonClass: "btn-success"
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) 
                {
                    console.error("Error en la petición AJAX:", textStatus, errorThrown);
                    swal({
                        title: "Error!",
                        text: "el correo ingresado ya fue registrado",
                        type: "error",
                        confirmButtonClass: "btn-danger"
                    });
                    botonB.disabled = false; 
                }
            });
        }
        else
        {
            swal({
                title: "Error!",
                text: "Las contraseñas no son iguales",
                type: "error",
                confirmButtonClass: "btn-danger"
            });
            botonB.disabled = false; 
        }
    });
}


function updateChart(labels, ganancias, saldos) 
{
    const ctx = document.getElementById('investmentChart').getContext('2d');
    
    if (chart) 
    {
        chart.destroy(); 
    }

    chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Ganancia Diaria (MXN)',
                    data: ganancias,
                    borderColor: 'rgba(72, 209, 204, 1)',
                    backgroundColor: 'rgba(72, 209, 204, 0.1)',
                    borderWidth: 2,
                    fill: true
                },
                {
                    label: 'Saldo Acumulado (MXN)',
                    data: saldos,
                    borderColor: 'rgba(186, 85, 211, 1)',
                    backgroundColor: 'rgba(186, 85, 211, 0.1)',
                    borderWidth: 2,
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Día'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Valores (MXN)'
                    },
                    beginAtZero: true
                }
            }
        }
    });
}


$(document).ready(function() 
{
   idUser = getUrlParameter('Iduser') || 1;
   $('#ModalIndex').modal('show');

    var video = document.getElementById('videoElement');
    video.play();

    $.post("controller/indexController.php?opcion=guardarContadorXuseryObtenerEnlaces", {idUser : idUser}, function (data) 
    {
        data = JSON.parse(data);
        $('#registro').attr('href', data.enlace_ews);
        $('#registro').attr('target', '_blank');
        $('#bono').attr('href', data.enlace_grupo);
        $('#bono').attr('target', '_blank');
    }); 

    $.post("controller/indexController.php?opcion=guardarYobtenerContadorGeneral", {}, function (data) 
    {
        data = JSON.parse(data);
        $('#ContadorGeneral').html("CÁLCULO DE APUESTAS DIARIAS <br> Eres el visitante Número: " + data.contador_general + ""); 
    }); 



    tabla = $('#usuario_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [
        ],
        "ajax": {
            url: 'controller/indexController.php?opcion=ObtenerResultadosTabla',
            type: "post",
            data: function(d) 
            {
                d.inversion = $('#Inversion').val();
                d.retiro = $('#diaRetiro').val();
            },
            dataType: "json",
            error: function(e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            }
        }
    });

    init(); 
});

$(document).on("click","#BntCerrar", function()
{  
    var video = document.getElementById('videoElement');
    video.pause();
    video.currentTime = 0;
});


var getUrlParameter = function(sParam) 
{
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('?'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
    return null;
};
