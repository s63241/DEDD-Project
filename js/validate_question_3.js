/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function calculateAll() {
    var totalAmt = 0;
    var scores = $('input[data-id="score"]');
    $.each(scores, function (key, value) {
        var score = value.value;
        //console.log(score);
        if (score !== '') {
            score = parseFloat(value.value);
            totalAmt = totalAmt + score;
        }
    });
    console.log(totalAmt);
    $('#total').val(totalAmt);
}

$(document).ready(function () {


    $('input[data-id="score"]').on('change', function () {
        console.log(this.value);
        var score = parseFloat(this.value);
        if (score > parseFloat(this.max) || score < parseFloat(this.min)) {
            this.value = $(this).attr('data-value');
            alert('คะแนนต้องอยู่ระหว่าง ' + parseFloat(this.min) + '-' + parseFloat(this.max));

        }
        calculateAll();
    });



    $('#bt_submit').on('click', function () {
        var isCorrect = true;
        var tables = $("#main_tb").find('table');
        $.each(tables, function (key, table) {
            var inputs = $(this).find('input[data-id="score"]');
            var count = 0;
            $.each(inputs, function (key2, input) {
                var score = input.value;
                if (score === '') {
                    isCorrect = false;
                    count++;
                    return false;
                }

            });
            if (count > 0) {
                isCorrect = false;
                alert('กรุณากรอกให้ครบทุกข้อ');
                return false;
            }

        });
        if (isCorrect === true) {
            if (confirm('ยืนยันการประเมิน')) {
                $('#frm').submit();
            }
        }


    });
});