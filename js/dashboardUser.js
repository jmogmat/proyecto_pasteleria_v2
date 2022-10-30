function dashboardProfileUser() {

    document.getElementById('dashboardUser').style.display = 'inline';
    document.getElementById('addressBilling').style.display = 'none';
    document.getElementById('textWellcomePanelUser').style.display = "inline";
    document.getElementById('p_helloUser').style.display = "inline";
}

function addressBilling() {
    document.getElementById('addressBilling').style.display = 'inline';
    document.getElementById('dashboardUser').style.display = 'none';

}

function ordersUser() {
  window.location.href = "orders.php";
   
}

function logout() {
    window.location.href = "logout.php";
}

function returnDashboard(){
     window.location.href = "userStandarPage.php";
}

function returnListOrders(){
 
    window.location.href = "orders.php";
}


