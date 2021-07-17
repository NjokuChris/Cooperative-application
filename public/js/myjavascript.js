

  function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
    }
    else document.getElementById('ifYes').style.visibility = 'hidden';
    document.getElementById('ifYes').value = "";

    if (document.getElementById('noCheck').checked) {
        document.getElementById('ifYes').style.visibility = 'hidden';
    document.getElementById('ifYes').value = '';
    }


}

//Date picker
$('#reservationdate').datetimepicker({
    format: 'L'
});

 //Date picker
 $('#reservationdate1').datetimepicker({
    format: 'L'
});

function callsweetalert(e) {

}

