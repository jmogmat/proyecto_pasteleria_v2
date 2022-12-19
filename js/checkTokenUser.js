function checkTokenUser() {

     
    
     fetch('/api/checkTokenUser.php', {
        method: 'POST',
        body: new FormData(document.getElementById('form'))


    }).then(response => response.json())
            .then(data => { 
                
                if (data.success) {
                    Swal.fire({ 
                        icon: 'success',
                        title: 'Enhorabuena...',
                        text: 'Ya puedes inciar sesión!',
                        confirmButtonText:
                                'Continuar',

                    }).then((result) => {

                        if (result.isConfirmed) {
                          
                           location.href ="/login.php";

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
