$(document).ready(function (){

    $('#signUp').on('submit',function (e){
        e.preventDefault()

        let formData = new FormData(this);

        $.ajax({
            url: 'signUp.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'error') {
                    if (response.errors.includes('errorUserExist')) {
                        $('#userExistError').text("User already exists").show();
                    }

                    if (response.errors.includes('errorPasswordNotMatch')) {
                        $('#passwordNotMachError').text("Passwords didn't match").show();
                    }

                    if (response.errors.includes('errorEmailExist')) {
                        $('#emailExistError').text("Email already exists").show();
                    }
                } else if (response.status === 'success') {
                    alert("Registration successful!");
                }
            },
            error: function(err) {
                alert('Hubo un error en el registro');
                console.error(err);
            }
        })
    })

    $('#login').on('submit',function (e){
        e.preventDefault()

        let formData = new FormData(this);

        $.ajax({
            url: 'login.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response){
                if(response.status === "error"){
                    $('#error').text("Incorrect user or password").show()
                }else if(response.status === "loged"){
                    window.location.href = "../dashboard/dashboardView.php"
                }
            },
            error: function(err) {
                alert('Hubo un error en el registro');
                console.error(err);
            }
        })
    })

    $('#passwordRecovery').on('submit', function (e) {
        e.preventDefault();

        $('#loader').show()
        let formData = new FormData(this);

        $.ajax({
            url: 'passwordRecovery.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                console.log("Success");
                $('#passwordRecovery').hide()
                $('#loader').hide()
                $('#enterCode').show()
                if (response.status === "emailNotFound") {
                    $('#error').text("Email doesn't exist").show();
                } else if (response.status === "success") {
                    $('#success').text("A verification code has been sent to your email.").show();
                }
            },
            error: function (err) {
                alert('Hubo un error en la solicitud AJAX');
                console.error(err);
            }
        });
    });

})