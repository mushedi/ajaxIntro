/*
 *Name: Azul Lanas
  Date: 10/10/2020
  Purpose: Validate calc input for better UX
 */

"use strict";

function validNum(str) {
    var re = /^(-?\d+\.\d+)$|^(-?\d+)$/;
    return re.test(str);
}

function sendData(n1, n2, oper){
    $.ajax({
        url: 'calc.php',
        type: 'POST',
        data: {n1: n1, n2: n2, oper: oper},
        success: function(val){
            $("#msg").css("color", "black");

            if(oper === 'mul'){
                $("#msg").html(n1 + " * " + n2 + " = " + val);
            }else if (oper === 'sub'){
                $("#msg").html(n1 + " - " + n2 + " = " + val);
            }else if (oper === 'div'){
                $("#msg").html(n1 + " / " + n2 + " = " + val);
            } else {
                $("#msg").html(n1 + " + " + n2 + " = " + val);
            }
            

        },
        error: function(val){
            $("#msg").html("Please make sure you enter proper data into the calculator.");
        }
    })
}

function validate(){

    let errMsg = '';
    let n1 = $('#num1').val().trim();
    let n2 = $('#num2').val().trim();
    let operList = $('div.radio-padding').find("input[name='oper']");
    let oper;

    for (const c of operList){
        if (c.checked){
            oper = c.value;
            break;
        }
    }

    $('#num1').val(n1);
    $('#num2').val(n2);

    if( n1 == '' || n2 == ''){
        errMsg += "Inputs cannot be empty! Please enter a number.";
    } else if(!validNum(n1)){
        errMsg += "Please enter a valid number. EX: 8756";
    } else if(!validNum(n2)){
        errMsg += "Please enter a valid number. EX: 8756";
    }

    if(errMsg === "") {
        sendData(n1, n2, oper);
    } else {
        $("#msg").html(errMsg);
    }
    return;

}

$(document).ready(function() {
    $("#calculate").click(function() {
        validate();
    });
});