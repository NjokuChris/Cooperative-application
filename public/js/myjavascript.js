
function myFunction() {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck");
    // Get the output text
    var text = document.getElementById("text");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
      text.style.display = "block";
    } else {
      text.style.display = "none";
      text.value = "";
    }
  }

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

