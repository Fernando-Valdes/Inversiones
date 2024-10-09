function init() 
{
    $('#login_form').on('submit', function(e) 
    {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "../../controller/usuarioController.php?opcion=login",
            data: formData,
            success: function(response) 
            {
                if (response.Validar == 1) 
                {
                    window.location.href = '../Home/home.php';
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
}


$(document).ready(function() {
    init();
});