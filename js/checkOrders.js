function checkOrders() {

    let id = document.getElementById("userId").value;

    return $.ajax({
        url: 'api/checkOrders.php',
        type: 'POST',
        data: {
            userId: id

        },
        datatype: 'JSON',
        success:
                function (res) {
                    let result = typeof res === "string" ? JSON.parse(res) : res;
                    if (result.success) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ups',
                            text: 'No tienes ningún pedido!',
                            confirmButtonText:
                                    'Continuar',

                        }).then((result) => {

                            if (result.isConfirmed) {
                                document.location.reload();
                            }
                        })
                        // Fin script success
                        return


                    } else {
                       window.location = "orders.php";
                    }
                }

    })


}







