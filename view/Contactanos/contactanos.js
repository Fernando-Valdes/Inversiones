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
   //$('#ModalIndex').modal('show');
    $('#ContadorGeneral').html("INGRESA TUS DATOS DE CONTACTO, Y TUS DUDAS"); 




    tabla = $('#usuario_data').DataTable({
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


var getUrlParameter = function(sParam) 
{
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
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
