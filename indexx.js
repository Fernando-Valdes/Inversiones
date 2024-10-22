var tabla;
var idUser;
let chart;

function init() 
{
    $('#login_form').on('submit', function(e) 
    {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "controller/usuarioController.php?opcion=login",
            data: formData,
            success: function(response) 
            {
                if (response.Validar == 1) 
                {
                    window.location.href = 'view/Calculadora/calculadoraPro.php';
                } 
                else if (response.Validar == 0) 
                {
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "Usuario o contraseña incorrectos",
                      });
                } 
            }
        });
    });


    $(document).on("click", "#btnRegistrarse", function(event) 
    {
        event.preventDefault();  
        $('#ModalRegistro').modal('show');    
    });


    $('#registro_form').on('submit', function(e) 
    {
        e.preventDefault();
        var formData = $(this).serialize();

        const botonB = document.getElementById("BtnRegistro");
        botonB.disabled = true; 


        if($('#PASSWORD').val() === $('#PASSWORD_2').val())
        {
            $.ajax({
                type: "POST",
                url: "controller/usuarioController.php?opcion=Registro",
                data: formData,
                success: function(response) 
                {
                    if (response.Validar == 1) 
                    {
                        $('#registro_form')[0].reset(); 
                        $("#ModalRegistro").modal('hide'); 

                        Swal.fire({
                            title: "¡Registro éxitoso!",
                            text: "Ya puedes ingresar al sistema!",
                            icon: "success"
                          });

                        botonB.disabled = false; 

                    } 
                    else if (response.Validar == 0) 
                    {
                        Swal.fire({
                            icon: "error",
                            title: "Error...",
                            text: "El correo ya fué registrado",
                          });
                    } 
                }
            });
        }
        else
        {
            Swal.fire({
                icon: "error",
                title: "Error...",
                text: "Las contraseñas no son iguales",
              });

            botonB.disabled = false; 
        }

    });


    $(document).on("click","#BntCerrar", function()
    {  
        var video = document.getElementById('videoElement');
        video.pause();
        video.currentTime = 0;
    });

    $(document).on("click", "#BntModaRegistro", function(event) 
    {
        event.preventDefault();  
        $('#ModalRegistro').modal('show');    
        $('#ModalIndex').modal('hide');  
    });
}


$(document).ready(function() 
{    init(); 
    $('#ModalIndex').modal('show');  

    var video = document.getElementById('videoElement');
    video.play();
});
