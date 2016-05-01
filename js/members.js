function loginChecker(){
    var username = $('#username').val();
    if(readCookie('user')!=null){
        
    }else{
        window.location.href="login.html";
        console.log("login");
    }

}

function viewAllMembers(){
    $.ajax({
        url: "../SAD/api/index.php",
        type: "POST",
        dataType: "json",
        data: {
            'tag' : 'showallmembers'
        },
        success:function(data){
            
            var dataLength = data.data.length;  
               for(var i=0; i<dataLength; i++){
                    var rec_no = data.data[i].rec_no;
                    var surname = data.data[i].surname;
                    var firstname = data.data[i].firstname;
                    var middlename = data.data[i].middlename;
                    var familyno    =   data.data[i].familyno;
                    var Address =   data.data[i].Address;
                    var email   =   data.data[i].email;
                    var contactno = data.data[i].contact_no;
                    var gender  =   data.data[i].Gender;
                    var DOB =   data.data[i].DOB;
                    //console.log(getAge(data.data[i].DOB));
                    var ageno   =   data.data[i].Age_no;
                    var occupation = data.data[i].Occupation;
                    var religion = data.data[i].Religion;
                    var edu_no  = data.data[i].Edu_no;
                    var stat_no  = data.data[i].Stat_no;
                    var Mc_no = data.data[i].Mc_no;
                    var Mt_no = data.data[i].Mt_no;
                    var Rank_no = data.data[i].Rank_no;
                    var status = data.data[i].status;

                    $('#periodsDTT').dataTable().fnAddData([
                        rec_no,
                        surname,
                        firstname,
                        middlename,
                        familyno,
                        Address,
                        email,
                        contactno,
                        gender,
                        DOB,
                        //age,
                        ageno,
                        occupation,
                        religion,
                        edu_no,
                        stat_no,
                        Mc_no,
                        Mt_no,
                        Rank_no,
                        status
                        ]);
                }
        }
            
    });
}

$(document).ready(function(){
    
    loginChecker();
    $('#periodsDTT').DataTable();
     viewAllMembers();
     //loginChecker();
});