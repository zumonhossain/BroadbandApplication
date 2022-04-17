//Modal code start
$(document).ready(function(){
	$(document).on("click", "#softDelete", function () {
		 var deleteID = $(this).data('id');
		 $(".modal-body #modal_id").val( deleteID );
	});

	$(document).on("click", "#restore", function () {
		var restoreID = $(this).data('id');
		$(".modal-body #modal_id").val( restoreID );
   });

   $(document).on("click", "#delete", function () {
	var deleteID = $(this).data('id');
	$(".modal-body #modal_id").val( deleteID );
   });
});


//Single Image Upload Script
function mainThambUrl(input){
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e){ 
			$('#mainThmb').attr('src',e.target.result).width(80)
				.height(80);
		};
		reader.readAsDataURL(input.files[0]);
	}
}
function mainThambUrl2(input){
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e){ 
			$('#mainThmb2').attr('src',e.target.result).width(80)
				.height(80);
		};
		reader.readAsDataURL(input.files[0]);
	}
}
function mainThambUrl3(input){
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e){ 
			$('#mainThmb3').attr('src',e.target.result).width(80)
				.height(80);
		};
		reader.readAsDataURL(input.files[0]);
	}
}
