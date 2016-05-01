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
    
    /**
     * Gets the primary key
     * @return int
     */
    public function getId() {
        return $this->id;
    }



}