
//Add textbox
$(document).ready(function(){

    var counter = 2;
		
    $("#addButton").click(function () {
				
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
		
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
                
	newTextBoxDiv.after().html(
	      '<div class="form-group">'+
                '<div class="col-lg-2">'+
                    '<input type="text" class="form-control input-sm" name="fullName" placeholder="ชื่อ-นามสกุล" id="textbox"' + counter + '" value="" >'+
                '</div>'+
                '<div class="col-lg-2">'+
                    '<input type="date" class="form-control input-sm" name="birthDate" placeholder="วดป เกิด" id="textbox"' + counter + '" value="" >'+
                '</div>'+
                '<div class="col-lg-2">'+
                    '<input type="text" class="form-control input-sm" name="education" placeholder="ชระดับการศึกษา" id="textbox"' + counter + '" value="" >'+
                '</div>'+
                '<div class="col-lg-2">'+
                    '<input type="text" class="form-control input-sm" name="job" placeholder="อาชีพ" id="textbox"' + counter + '" value="" >'+
                '</div>'+
                '<div class="col-lg-2">'+
                    '<input type="text" class="form-control input-sm" name="telephone" placeholder="เบอร์โทรศัพท์" id="textbox"' + counter + '" value="" >'+
                '</div>'+
              '</div>'
        );
            
	newTextBoxDiv.appendTo("#TextBoxesGroup");

				
	counter++;
     });

     $("#removeButton").click(function () {
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }   
        
	counter--;
			
        $("#TextBoxDiv" + counter).remove();
			
     });
		
     $("#getButtonValue").click(function () {
		
	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
	}
    	  alert(msg);
     });
  });
  //---------------------------------------------------------------------------
