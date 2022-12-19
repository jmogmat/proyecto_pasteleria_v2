
function registerUser() {


    fetch('api/upsertUser.php', {
        method: 'POST',
        body: new FormData(document.getElementById("registerUserForm"))


    }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Bienvenido...',
                        text: 'Su registro fue exitoso, verifique el SMS que se le ha enviado a su teléfono móvil!',
                        confirmButtonText:
                                'Continuar'

                    }).then((result) => {

                        if (result.isConfirmed) {
                            location.href ="PhpProject1/login.php";
                        }
                    })
                    
                    return;
                }
                if (data.error && data.msg) {
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Ups...',
                        text: data.msg
                    })

                }
            })


}