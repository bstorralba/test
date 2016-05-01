<?php

class MemberDatabase{

    private $sql_host;
    private $sql_user;
    private $sql_pass;
    private $sql_db_login;
    private $sql_db_members;

    public function setupDb($host, $user, $pass, $db_login, $db_members){
    	$this->sql_host = $host; 
    	$this->sql_user	= $user;
    	$this->sql_pass = $pass;
    	$this->sql_db_login	= $db_login;
    	$this->sql_db_members = $db_members;
    }	

    /////////MYAACCOUNT///////
    //LOGIN
    public function logIn($user, $pass){
    	$sql = new mysqli($this->sql_host,$this->sql_user, $this->sql_pass, $this->sql_db_members);
    	$query = "Select * from users where username = '$user' and password = '$pass'";
       $sql->query($query);
       $affected = $sql->affected_rows > 0;
       $sql->close();

       return $affected;
    }//end login function

    //CHANGE USERNAME
    public function updateUsername($rec_no, $usernameNew){
        $sql = new mysqli($this->sql_host, $this->sql_user, $this->sql_pass, $this->sql_db_members);
        if ($sql->error){
            echo $sql->error;
            die();
        }

        if (!$usernameNew) return false;
        $query = "UPDATE users set username = '$usernameNew' where rec_no = '$rec_no'"; //or id no na lang? lol

        $sql->query($query);
        $affected = $sql->affected_rows > 0;
        $sql->close();

        return $affected;
    } //end update username

    //CHANGE PASSWORD
    public function updatePassword($id, $passwordNew){
    	$sql = new mysqli($this->sql_host, $this->sql_user, $this->sql_pass, $this->sql_db_members);
        if ($sql->error){
            echo $sql->error;
            die();
        }

        if (!$passwordNew) return false;
        $query = "UPDATE users set password = '$passwordNew' where id = '$id'"; //or id no na lang? lol

        $sql->query($query);
        $affected = $sql->affected_rows > 0;
        $sql->close();

        return $affected;
    } //end update password


    public function getCurrentUser($rec_no){
            $sql = new mysqli($this->sql_host, $this->sql_user, $this->sql_pass, $this->sql_db_members);
        if ($sql->error){
            echo $sql->error;
            die();
        }

        $query = "SELECT profile.*, age_bracket.Age_bracket, educational_attainment.Educational_attainment, status.Status_desc, membership_category.Mc_desc, membership_type.Mt_desc, membership_rank.Rank_Desc from profile JOIN age_bracket on profile.Age_no = age_bracket.Age_no JOIN educational_attainment on profile.Edu_no = educational_attainment.Edu_no JOIN status on profile.Stat_no = status.Stat_no JOIN membership_category on profile.Mc_no = membership_category.Mc_no JOIN membership_type on profile.Mt_no = membership_type.Mt_no JOIN membership_rank on profile.Rank_no=membership_rank.Rank_no where Rec_no='$rec_no'";


        $result = $sql->query($query);
        $member = array();
        //$membersData['data']=array();
        while ($row = $result->fetch_array())
        {
            $member = array(
                'rec_no'     => $row['Rec_no'],
                'surname'    => $row['Surname'],
                'firstname'  => $row['First_name'],
                'middlename' => $row['Middle_name'],
                'familyno'   => $row['family_no'],
                'Address'    => $row['Address'],
                'email'      => $row['email'],
                'contact_no' => $row['contact_no'], 
                'Gender'     => $row['Gender'],
                'DOB'        => $row['Date_Of_Birth'],  
                'Age_no'     => $row['Age_bracket'],    //
                'Occupation' => $row['Occupation'],     
                'Religion'   => $row['Religion'],
                'Edu_no'     => $row['Educational_attainment'],         //
                'Stat_no'    => $row['Status_desc'],        //
                'Mc_no'      => $row['Mc_desc'],          //
                'Mt_no'      => $row['Mt_desc'],          //
                'Rank_no'    => $row['Rank_Desc'],        //
                'status'     => $row['status']);    
            
            // $members[] = $member;
           // array_push($membersData['data'],$members);
        }
        
        $result->close();
        $sql->close();
        
        return $member;
        //return $membersData;

    }

    ////////MEMBERS PROFILE PAGE/////////
    //FUNCTION INSERT MEMBER 
    public function addMember(Member $member){
        $sql = new mysqli($this->sql_host, $this->sql_user, $this->sql_pass, $this->db_members);
        if ($sql->error){
            echo $sql->error;
            die();
        }

        $userLevel = $member->getUserLevel();

        $username = $member->getUsername();
        $password = $member->getPassword();
        $firstname = $member->getFirstName();
        $middlename = $member->getMiddleName();
        $surname = $member->getSurname();
        $familyno = $member->getFamilyNo();
        $DOB = $member->getDOB();
        $age = $member->getAge();
        $agebracket = $member->getAgeBracket();
        $gender = $member->getGender();
        $civilstatus = $member->getCivilStatus();
        $occupation = $member->getOccupation();
        $educationalattainment = $member->getEducationalAttainment();
        $religion = $member->getReligion();
        $address = $member->getAddress();
        $email = $member->getEmail();
        $contactno = $member->getContactNo();
        $status = $member->getStatus();
        $memcateg = $member->getMemCateg();
        $memtype = $member->getMemType();
        $memrank = $member->getMemRank();
            //$orgunit = $member->getOrgUnit(); //  
            //$position - $member->getPosition(); //

        $query = "INSERT INTO members (username, password, firstname, middlename, surname, familyno, dob, age, agebracket, gender, civilstatus, occupation, educattain, religion
        address, email, contactno, status, memcateg, memtype, memrank) VALUES ('$username', '$password', '$firstname', '$middlename', '$surname', '$familyno',
        '$DOB', '$age', '$agebracket', '$gender', '$civilstatus', '$occupation', '$educationalattainment', '$religion', '$address', '$email', '$contactno', '$status',
        '$memcateg', '$memtype', '$memrank')";


        $sql->query($query);

        $affected = $sql->affected_rows > 0;
        $sql->close();
        return $affected;
    } 

     public function getAge($dob){
        $currDate = date("Y");
        //$dob = substr($dob, 0, 3);
        $dob = DateTime::createFromFormat("Y-m-d", $dob);
        $age = $currDate - $dob->format("Y");
        return $age;
    }

    public function viewAll(){
        // Retrieve student's detailed data
        $sql = new mysqli($this->sql_host, $this->sql_user, $this->sql_pass, $this->sql_db_members);
        if ($sql->error){
            echo $sql->error;
            die();
        }
        
        $query = "SELECT profile.*, age_bracket.Age_bracket, educational_attainment.Educational_attainment, status.Status_desc, membership_category.Mc_desc, 
                    membership_type.Mt_desc, membership_rank.Rank_Desc from profile JOIN age_bracket on profile.Age_no = age_bracket.Age_no 
                    JOIN educational_attainment on profile.Edu_no = educational_attainment.Edu_no JOIN status on profile.Stat_no = status.Stat_no 
                    JOIN membership_category on profile.Mc_no = membership_category.Mc_no JOIN membership_type on profile.Mt_no = membership_type.Mt_no 
                    JOIN membership_rank on profile.Rank_no=membership_rank.Rank_no";
        
        $result = $sql->query($query);
        $members = array();
        $membersData['data']=array();
        while ($row = $result->fetch_array())
        {
            $members = array(
                'rec_no'     => $row['Rec_no'],
                'surname'    => $row['Surname'],
                'firstname'  => $row['First_name'],
                'middlename' => $row['Middle_name'],
                'familyno'   => $row['family_no'],
                'Address'    => $row['Address'],
                'email'      => $row['email'],
                'contact_no' => $row['contact_no'], 
                'Gender'     => $row['Gender'],
                'DOB'        => $row['Date_Of_Birth'], 
                'Age_no'     => $row['Age_bracket'],    //
                'Occupation' => $row['Occupation'],     
                'Religion'   => $row['Religion'],
                'Edu_no'     => $row['Educational_attainment'],         //
                'Stat_no'    => $row['Status_desc'],        //
                'Mc_no'      => $row['Mc_desc'],          //
                'Mt_no'      => $row['Mt_desc'],          //
                'Rank_no'    => $row['Rank_Desc'],        //
                'status'     => $row['status']);    
            
            // $members[] = $member;
            array_push($membersData['data'],$members);
        }
        
        $result->close();
        $sql->close();
        
        return $membersData;
    }

        public function viewAllOrgMembers(){
        // Retrieve student's detailed data
        $sql = new mysqli($this->sql_host, $this->sql_user, $this->sql_pass, $this->sql_db_members);
        if ($sql->error){
            echo $sql->error;
            die();
        }
        
        $query = "SELECT org_mem.*, org_units.org_desc, position.position_desc, profile.Rec_no, profile.Surname, profile.First_name, profile.Middle_name from org_mem 
        JOIN org_units on org_mem.Coor_no = org_units.Coor_no 
        JOIN position on org_mem.position_no = position.position_no 
        JOIN profile on org_mem.Rec_no = profile.Rec_no";
        
        $result = $sql->query($query);
        $members = array();
        $membersData['data']=array();
        while ($row = $result->fetch_array())
        {
            $members = array(
                'id'          =>$row['Coor_no'],
                'rec_no'     => $row['Rec_no'],
                'organization'    => $row['org_desc'],
                'firstname'  => $row['First_name'],
                'middlename' => $row['Middle_name'],
                'surname'   => $row['Surname'],
                'position'    => $row['position_desc']);    
            
            // $members[] = $member;
            array_push($membersData['data'],$members);
        }
        
        $result->close();
        $sql->close();
        
        return $membersData;
    }
    
}
