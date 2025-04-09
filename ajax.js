$(document).ready(function (){

    $('#signUp').on('submit',function (e){
        e.preventDefault()

        let formData = new FormData(this);

        $.ajax({
            url: 'signUp.php',
            type: 'POST',
            data: formData,
            processData: false, // ← Evita que jQuery intente convertirlo a string
            contentType: false, // ← Deja que el navegador ponga el Content-Type correcto
            success: function(response) {
                alert('¡Registro exitoso!');
                console.log(response);
            },
            error: function(err) {
                alert('Hubo un error en el registro');
                console.error(err);
            }
        })
    })



})