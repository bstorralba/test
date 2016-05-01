function logOut(){
	eraseCookie('user');
	window.location.href = "login.html";
	console.log('user')
}

$(document).ready(function(){ //window.onload
	// init();
	$('#membersProfile').click(function(){
		// showMembersProfileContent();
		$('.dynamicContent').load('viewall.html');
	});
	// console.log();
	// $('.main-header').on('click','#myProfile',function(){
	// 	console.log("Test");
	// });
		$('#myProfile').click(function(){
			console.log("test");
		// showMembersProfileContent();
		$('.dynamicContent').load('myprofile.html');
	});

		$('#logout').click(function(){
		logOut();
	});

		$('#orgmembers').click(function(){
		$('.dynamicContent').load('orgmembers.html');
	});


});