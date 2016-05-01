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
            'tag' : 'showallorgmembers'
        },
        success:function(data){
            
            var dataLength = data.data.length;  
               for(var i=0; i<dataLength; i++){
                    var id      = data.data[i].id;
                    var rec_no = data.data[i].rec_no;
                    var surname = data.data[i].surname;
                    var firstname = data.data[i].firstname;
                    var middlename = data.data[i].middlename;
                    var organization    =   data.data[i].organization;
                    var position =   data.data[i].position;

                    $('#orgMemsDTT').dataTable().fnAddData([
                        id,
                        organization,
                        rec_no,
                        surname,
                        firstname,
                        middlename,
                        position
                        ]);
                }
        }
            
    });
}

$(document).ready(function(){
    
    loginChecker();
    $('#orgMemsDTT').DataTable();
     viewAllMembers();
     //loginChecker();
});