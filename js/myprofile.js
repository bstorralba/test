function loginChecker(){
    var username = $('#username').val();
    if(readCookie('user')!=null){
        console.log("no");
    }else{
        window.location.href="login.html";
        console.log("login");
    }
}

function populateData(){
    console.log(readCookie('user'));
    $.ajax({
        url: "../PBMA/api/index.php",
        type: "POST",
        dataType: "json",
        data: {
            'tag' : 'showuserdetails',
            'rec_no': ''+readCookie('user')+''
        },
        success:function(data){
                var rec_no = data.rec_no;
                var surname = data.surname;
                var firstname = data.firstname;
                var middlename = data.middlename;
                var familyno    =  data.familyno;
                var Address =   data.Address;
                var email   =   data.email;
                var contactno = data.contact_no;
                var gender  =   data.Gender;
                var DOB =   data.DOB;
                var ageno   =   data.Age_no;
                var occupation = data.Occupation;
                var religion = data.Religion;
                var edu_no  = data.Edu_no;
                var stat_no  = data.Stat_no;
                var Mc_no = data.Mc_no;
                var Mt_no = data.Mt_no;
                var Rank_no = data.Rank_no;
                var status = data.status;

                $('#membershipIDTxt').text(rec_no);
                $('#fnameTxt').text(firstname);
                $('#mNameTxt').text(middlename);
                $('#lNameTxt').text(surname);
                $('#genderTxt').text(gender);
                $('#dobTxt').text(DOB);
                $('#ageTxt').text("text");
                $('#ageBracketTxt').text(ageno);
                $('#addressTxt').text(Address);
                $('#contactNoTxt').text(contactno);
                $('#emailTxt').text(email);
                $('#educAttTxt').text(edu_no);
                $('#civStatTxt').text(stat_no);
                $('#religionTxt').text(religion);
                $('#occuTxt').text(occupation);
                $('#memTypeTxt').text(Mt_no);
                $('#memRankTxt').text(Rank_no);
                $('#memCatTxt').text(Mc_no);
                $('#regNoTxt').text("test");
                $('#regDateTxt').text("test");
                $('#volNoTxt').text("test");
                $('#pageNoTxt').text("test");
                $('#idNOTxt').text("test");
            },
            error:function(data){
                console.log(data);
            }

    });
}
$(document).ready(function() {
    console.log("test");
    loginChecker();
    populateData();

    // var panels = $('.user-infos');
    // var panelsButton = $('.dropdown-user');
    // panels.hide();
    // // populateData();
    // //Click dropdown
    // panelsButton.click(function() {
    //     //get data-for attribute
    //     var dataFor = $(this).attr('data-for');
    //     var idFor = $(dataFor);

    //     //current button
    //     var currentButton = $(this);
    //     idFor.slideToggle(400, function() {
    //         //Completed slidetoggle
    //         if(idFor.is(':visible'))
    //         {
    //             currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
    //         }
    //         else
    //         {
    //             currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
    //         }
    //     })
    // });


    // $('[data-toggle="tooltip"]').tooltip();
});




