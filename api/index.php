
<?php require_once 'init.php'; 


$tag = $_POST['tag'];
	//login
if($tag == 'login'){
	$user = $_POST['username'];
	$pass = $_POST['password'];

	//$_pass=md5($pass);

	$rows = $member_db->logIn($user, $pass);
	if($rows){
		echo json_encode(array(
			"statusCode"=>0,
			"statusDescription" => "Successful"
			));
	}
	else{
		echo json_encode(array(
			"statusCode" => 1,
			"statusDescription" => "Invalid usernamer or password"
			));

	}
}
// }
	//view all members
if($tag == 'showallmembers'){

	$rows =  $member_db->viewAll();
	if($rows){
		$members= array();
		$membersData['data']=array();

		echo json_encode(
			$rows
			);
	}
}

if($tag == 'showuserdetails'){
	$rec_no = $_POST['rec_no'];

	$rows =  $member_db->getCurrentUser($rec_no);
	if($rows){
		$members= array();
		$membersData['data']=array();

		echo json_encode(
			$rows
			);
	}
}

if($tag == 'showallorgmembers'){
	$rows =  $member_db->viewAllOrgMembers();
	if($rows){
		$members= array();
		$membersData['data']=array();

		echo json_encode(
			$rows
			);
	}
}


?>