$(document).ready(function() { // when DOM is ready, this will be executed
	
	$userID = $(".userRow").click(function(){
		var id = $(this).attr('id');
		id = id.substring(4);
		window.location.replace("user-profile.php?id="+id);
	});
});