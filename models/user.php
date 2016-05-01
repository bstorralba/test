<?php

class User
{
	private $id;
	private $username;
	private $password;
	private $recNo;
	private $userLevel;
	private $lastMod;

	public function __construct($id = NULL) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getUsername(){
    	return $this->username;
    }

    public function setUsername($username){
    	$this->username = $username;
    }

    public function getPassword(){
    	return $this->password;
    }

    private function setPassword($password){
    	$this->password = $password;
    }

    private function getRecNo(){
   	 	return $this->recNo;
    }

    private function setRecNo($recNo){
    	$this->recNo = $recNo;
    }

    private function getUserLeverl(){
    	return $userLevel;
    }

    private function setUserLevel($userLevel){
    	$his->userLevel = $userLevel;
    }

    private function getLasMod(){
    	return $this->lastMod;
    }

    private function setLastMoo($lastMod){
    	$this->lastMod = $lastMod;
    }

}