
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
                '<input type="hidden" id="part_id" name="part_id[]" class="form-control input-sm" placeholder="ชื่อ-นามสกุล">'+
                '<div class="col-lg-2">'+
                    '<input type="text" class="form-control input-sm" id="fullName" name="fullName[]" placeholder="ชื่อ-นามสกุล" value="" >'+
                '</div>'+
                '<div class="col-lg-2">'+
                    '<input type="date" class="form-control input-sm" id="birdthDate" name="birdthDate[]" placeholder="วดป เกิด" value="" >'+
                '</div>'+
                '<div class="col-lg-2">'+
                    '<input type="text" class="form-control input-sm" id="education" name="education[]" placeholder="ชระดับการศึกษา" value="" >'+
                '</div>'+
                '<div class="col-lg-2">'+
                    '<input type="text" class="form-control input-sm" id="job" name="job[]" placeholder="อาชีพ" value="" >'+
                '</div>'+
                '<div class="col-lg-2">'+
                    '<input type="text" class="form-control input-sm" id="telephone" name="telephone[]" placeholder="เบอร์โทรศัพท์" value="" >'+
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
