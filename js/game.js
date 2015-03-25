$(function(){
	console.log("Game page loaded");

	// Hide review form
	$('._reviewForm').hide();
	// Add a review
	$('._addReview').on("click", function(e){
		$('._reviewForm').toggle();
		if($('._addReview').text() == "Add Review"){
			$('._addReview').text("Close");
		}else {
			$('._addReview').text("Add Review");	
		}
	});
});