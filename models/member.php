<?php


/**
 * Represents the member account
 */
class Member
{
    private $id;
    private $username;
    private $password;
    private $firstName;
    private $middleName;
    private $lastName;
    private $familyNo;
    private $address;
    private $email;
    private $contactNo;
    private $religion;
    private $occupation;
    private $DOB;
    private $age; //pano pag nagbirthday
    private $ageBracket;
    private $civilStatus;
    private $gender;
    private $educationalAttainment;
    private $memCateg;
    private $memType;
    private $memRank;
    private $orgUnit;
    private $position;
    private $accesslevel;
    private $status;
    private $userLevel;
    //include username? 

    
    /**
     * 
     * @param type $id Primary key. Do not set if this is a new user.
     */
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
    
    public function getUsername(){
        return $this->$username;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    //---------firstName------------//
    public function getFirstName(){
        return $this->firstName;
    }

    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    //---------middleName-----------//
    public function getMiddleName(){
        return $this->middleName;
    }

    public function setMiddleName($middleName){
        $this->middleName = $middleName;
    }

    //---------last name---------//
    public function getLastName(){
        return $this->lastName;
    }

    public function setLastName($lastName){
        $this->lastName = $lastName;

    }

    //---------familyno-------//
    public function getFamilyNo(){
        return $this->familyNo;
    }

    public function setFamilyNo($familyNo){
        $this->familyNo = $familyNo;
    }

    //--------address-----------//
    public function getAddress(){
        return $this->address;
    }

    public function setAddress($address){
        $this->address = $address;
    }

    //---------email------------//
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    //---------contactno-------//
    public function getContactNo(){
        return $this->contactNo;
    }

    public function setContactNo($contactno){
        $this->contactNo = $contactNo;
    }

    //--------religion---------//
    public function getReligion(){
        return $this->religion;
    }

    public function setReligion($religion){
        $this->religion = $religion;
    }

    //-------occupation----------//
    public function getOccupation(){
        return $this->occupation;
    }

    public function setOccupation($occupation){
        $this->occupation = $occupation;
    }


    //---------DOB------------//
    public function getDOB(){
        return $this->DOB;
    }

    public function setDOB($DOB){
        $this->DOB = $DOB;
    }

    //--------age------------//
    public function getAge(){
        return $this->age;
    }

    public function setAge($age){
        $this->age = $age;
    }

    //------agebracket-----------//
    public function getAgeBracket(){
        return $this->ageBracket;
    }

    public function setAgeBracket($ageBracket){
        $this->ageBracket = $ageBracket;
    }

    //---------civilstatus-----------//
    public function getCivilStatus(){
        return $this->civilStatus;
    }

    public function setCivilStatus(){
        $this->civilStatus = $civilStatus;
    }

    //----------gender------------//
    public function getGender(){
        return $this->gender;
    }

    public function setGender($gender){
        $this->gender = $gender;
    }

    //------educationalAttainment-------------//
    public function getEducationalAttainment(){
        return $this->educationalAttainment;
    }

    public function setEducationAttainment($educationalAttainment){
        $this->educationalAttainment = $educationalAttainment;
    }

    //--------memcateg-----------//
    public function getMemCateg(){
        return $this->memCateg;
    }

    public function setMemCateg($memCateg){
        $this->memCateg = $memCateg;
    }

    //-------memtype------------//
    public function getMemType(){
        return $this->memType;
    }

    public function setMemType($memType){
        $this->memType = $memType;
    }

    //---------memrank-----------//
    public function getMemRank(){
        return $this->memRank;
    }

    public function setMemRank($memRank){
        $this->memRank = $memRank;
    }

    //--------orgunit-----------//
    public function getOrgUnit(){
        return $this->orgUnit;
    }

    public function setOrgUnit($orgUnit){
        $this->orgUnit = $orgUnit;
    }

    //--------position----------//
    public function getPosition(){
        return $this->position;
    }

    public function setPosition($position){
        $this->position = $position;
    }

    //-------accesslevel------------//
    public function getAccessLevel(){
        return $this->accessLevel;
    }

    public function setAccessLevel($accessLevel){
        $this->accessLevel = $accessLevel;
    }

    //---------status------------//
    public function getStatus(){
        return $this->status;
    }
 
    public function setStatus($status){
        $this->status = $status;
    }

    //---------user level------------//
    public function getUserLevel(){
        return $this->userLevel;
    }
 
    public function setUserLevel($userLevel){
        $this->userLevel = $userLevel;
    }
}