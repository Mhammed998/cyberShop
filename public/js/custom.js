$(document).ready(function() {


 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

    var amount = document.getElementById('amount');
    const cost= document.getElementById('cost');

   amount.addEventListener('input', function() {
       cost.value *= amount.value;
    });

   // preview product when it's being creating









});


function repeatTypeFunction() {
    var inputNameProduct = document.getElementById('pname').value;
    document.getElementById("productName").innerHTML = inputNameProduct;
    var inputDescProduct = document.getElementById('pdesc').value;
    document.getElementById("productDesc").innerHTML = inputDescProduct;
    var inputPriceProduct = document.getElementById('pprice').value;
    document.getElementById("productPrice").innerHTML = inputPriceProduct + " L.E";

}
