$(document).ready(function(){
            $('#idCard').keyup(function(){ // Keyup function for check the user action in input
                var idCard = $(this).val(); // Get the username textbox using $(this) or you can use directly $('#username')
                var idCardAvailResult = $('#idCard_avail_result'); // Get the ID of the result where we gonna display the results
                if(idCard.length > 12) { // check if greater than 2 (minimum 3)
                    idCardAvailResult.html('Loading..'); // Preloader, use can use loading animation here
                    var UrlToPass = 'action=idCard_availability&idCard='+idCard;
                    $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
                    type : 'POST',
                    data : UrlToPass,
                    url  : 'function/function.php',
                    success: function(responseText){ // Get the result and asign to each cases
                        if(responseText == 0){
                            idCardAvailResult.html('<span class="success">สามารถเพิ่มข้อมูลได้</span>');
                        }
                        else if(responseText > 0){
                            idCardAvailResult.html('<span class="error">ข้อมูลบุคคลนี้มีอยู่แล้ว</span>');
                        }
                        else{
                            alert('Problem with sql query');
                        }
                    }
                    });
                }else{
                    idCardAvailResult.html('<span class="error">กรุณากรอข้อมูลให้ครบ</span>');
                }
                if(idCard.length == 0) {
                    idCardAvailResult.html('');
                }
            });

        });