function showPassword() {
    
    var key_attr = $('#password').attr('type');
    
    if(key_attr != 'text') {
        
        $('.checkbox').addClass('show');
        $('#password').attr('type', 'text');
        
    } else {
        
        $('.checkbox').removeClass('show');
        $('#password').attr('type', 'password');
        
    }
    
}

function loginChecker(){
	var username = $('#username').val();
	if(readCookie('user')!=null){
        window.location.href = "PBMAHome.html";
        // console.log(readCookie());
	}//else{

}

$(document).ready(function (){

	$('#btn-login').click(login);
	loginChecker();

});

function login(){

	var username = $('#username').val();
	var password = $('#password').val(); 
	console.log(username + " " + password);
		$.ajax({
        	url: 'api/index.php',
        	dataType: "JSON",
        	method: "POST",
        	data :{
            	'tag': 'login',
            	'username' : username,
            	'password' : password
        	},

        	success: function(data){
        		console.log(data.statusCode);
        		if(data.statusCode == 0){
        			//redirect page
        			window.location.href = "PBMAHome.html";
        			createCookie("user", username, 1);
        		}
        		else{
        			console.log(data.statusDescription);
        			$('#errorMessage').text(data.statusDescription);
        			$('#errordiv').slideDown();
        			setInterval(function (){
        			$('#errordiv').fadeOut();
        				
        			},3000);
        		}
        	}
        });
}
