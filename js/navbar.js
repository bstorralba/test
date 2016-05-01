function loginChecker(){
	var username = $('#username').val();
	if(readCookie('user')!=null){
		
	}else{
		window.location.href="login.html";
		console.log("login");
		// window.location.href = "login.html";
		// redirect window.location.href="path";
	}
	// if(readCookie('user')!=null){
		
	// }else{
	// 	window.location.href="login.html";
	// 	console.log("login");
	// 	// window.location.href = "login.html";
	// 	// redirect window.location.href="path";
	// }

}

function populateUserNav(){

 $.ajax({
        url: "../PBMA/api/index.php",
        type: "POST",
        dataType: "json",
        data: {
            'tag' : 'showuserdetails',
            'rec_no': ''+readCookie('user')+''
        },
        success:function(data){

                var surname = data.surname;
                var firstname = data.firstname;

                var name = " " + firstname + " " + surname
                $('#nameTxt').text(name);
            }

    });
}

$(document).ready(function() {   
	console.log("nametext");
	loginChecker();
	populateUserNav();

	// $('#logout').click(function(){
	// 	logOut();
	// });
        });