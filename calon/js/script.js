// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#country_id').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'function/ajax_refresh.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#country_list_id').show();
				$('#country_list_id').html(data);
			}
		});
	} else {
		$('#country_list_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#country_id').val(item);
	// hide proposition list
	$('#country_list_id').hide();
}
//------------------------------------------------------------------------------------------------

function autocomplet2() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#country_id2').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'function/ajax_refresh2.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#country_list_id2').show();
				$('#country_list_id2').html(data);
			}
		});
	} else {
		$('#country_list_id2').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item2(item) {
	// change input value
	$('#country_id2').val(item);
	// hide proposition list
	$('#country_list_id2').hide();
}
//------------------------------------------------------------------------------------------------

function autocomplet3() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#country_id3').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'function/ajax_refresh3.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#country_list_id3').show();
				$('#country_list_id3').html(data);
			}
		});
	} else {
		$('#country_list_id3').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item3(item) {
	// change input value
	$('#country_id3').val(item);
	// hide proposition list
	$('#country_list_id3').hide();
}