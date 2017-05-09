$("#save-user-password").click(function() { // when want to save changes
	var password1 = $("#form-field-pass1").val();
	var password2 = $("#form-field-pass2").val();
	
	var id = getUrlParameter("id");
	
	if(password1 == password2)
	{
		$.ajax({ // start an ajax POST 
			type	: "post",
			url		: "C:/wamp64/www/shp/Facade/UserHandler.php",
			data	:  { 
				"function" : "changePassword",
				"userID" : id, 
				"pass": password1 
			},
			success : function(reply) { // when ajax executed successfully
				if(reply == 1)
					alert("password is changed succesfully");
				
			},
			error   : function(err) { // some unknown error happened
				alert(" There is an error! Please try again. " + err); 
			}
		});
	}
	else
		alert("þifreler uyuþmuyor");
});


$("#save-user-basic-info").click(function() { // when want to save changes
	var id = getUrlParameter("id");
	
	var hata = [];
	
	var name = $("#form-field-first").val().trim();
	if(name.length < 3)
		hata.push("name cannot be shorter than 3 characters\n");
	var surname = $("#form-field-last").val().trim();
	if(surname.length < 2)
		hata.push("surname cannot be shorter than 2 characters\n");
	var gender = "Female"
	
	if(document.getElementById('gender-male').checked) {
		gender = "Male"
	} 
	
	var email = $("#form-field-email").val().trim();
	if(email.length < 5 && !email.includes("@"))
		email = null;
	var phone = $("#form-field-phone").val().replace( /\D+/g, '');
	if(phone.length != 10 && phone.length != 0)
		hata.push("please enter valid a phonenumber\n");
	if(hata.length == 0)
	{
		$.ajax({ // start an ajax POST 
			type	: "post",
			url		: "../Facade/UserHandler.php", //C:/wamp64/www/shp/Facade/UserHandler.php
			data	:  { 
				"function" : "change-user-basic-info",
				"userID" : id, 
				"name": name,
				"surname": surname,
				"gender": gender,
				"email": email,
				"phone": phone
			},
			success : function(reply) { // when ajax executed successfully
				
				if(reply == 1)
					alert("entries is changed succesfully");
				else
					alert("An error is happened!\n"+reply);
				
			},
			error   : function(err) { // some unknown error happened
				alert(" There is an error! Please try again. " + err); 
			}
		});
	}
	else
		alert(hata);
});

function updateBasicInfo(){
	
	
}

function updateAddressInfo(){
	
	
}

function updateCardInfo(){
	
	
}

function updatePasswordInfo(id){
	
}

$("#new-address").click(function(){
	$("#modal-address").modal("show");
	
	return false;
});

$("#new-credit-card").click(function(){
	$("#modal-credit-card").modal("show");
	
	return false;
});

function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};