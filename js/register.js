/*
    PHP_Login
    JavaScript
    BootStrap 4 / HTML5 / CSS3 / JS / PHP
    /xampp/htdocs/PHP_Login/js/
    JavaScript functions - Andrew Harkins
*/

$(document).ready(function () {

    //$("#terms").on("click", termsAccept());

    $("#formregister").submit(function(e) {
        //if(!$("#chkTerms").is(":checked")) {

            if(validationRegister()) {
                alert("Success Register");
                var successText = "Congratulations you have registered correctly";
                var alertSuccess = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" ' +
                                   'class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">&times;</button>';
                $("#divAlert").html(alertSuccess + successText + '</div>');
            }
        //} else {
            //e.preventDefault();
        //}
    })
    // $("#btnRegister").click(function(event){
    //     event.preventDefault();
    // })
});

function validationRegister() {
    var txtName = $("#txtName").val();
    var txtUsername = $("#txtUsername").val();
    var txtPassword = $("#txtPassword").val();
    var txtPassword2 = $("#txtPassword2").val();
    var extraText = "";
    var alertText = "Create was <strong>Unsuccessful</strong> please <u>try again</u>";
    var alertDanger = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" ' +
                      'class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">&times;</button>'+ alertText;
//go 1 by 1
    if(txtName != "" && txtUsername != "" && txtPassword != "" && txtPassword2 != "") {

        if(txtName == "") {
            extraText = "<br>A <b>Name</b> <u>Must</u> be entered to continue.";
            var nameAlert = alertDanger + extraText + '</div>';
            $("#alertArea").html(nameAlert);
            return false;
        }
        if(txtUsername == "") {
            extraText = "<br>A <b>Username</b> is <u>required</u> to continue";
            var userAlert = alertDanger + extraText + '</div>';
            $("#alertArea").html(userAlert);
            return false;
        }
        if(txtPassword != "") {
            if(txtPassword.length < 5) {
                extraText = "<br>Password is too <b>Short</b> must be min <u>6 characters</u>.";
                var pAlert = alertDanger + extraText + '</div>';
                $("#alertArea").html(pAlert);
                return false;
            }
        } else {
            extraText = "<br>A <b>Password</b> is <u>required</u> to continue";
            var pemptyAlert = alertDanger + extraText + '</div>';
            $("#alertArea").html(pemptyAlert);
            return false;
        }
        if(txtPassword2 != "") {
            if(txtPassword != txtPassword2) {
                extraText = "<br>Passwords <b>do not</b> <u>match</u>!";
                var pass2Alert = alertDanger + extraText + '</div>';
                $("#alertArea").html(pass2Alert);
                return false;
            }
        } else {
            extraText = "<br>A <b>Password Confirm</b> is <u>required</u> to continue";
            var pconfirmAlert = alertDanger + extraText + '</div>';
            $("#alertArea").html(pconfirmAlert);
            return false;
        }
    } else {
        extraText = "<br>All fields are required to continue.";
        $("#alertArea").html(alertDanger + extraText + '</div>');
        return false;
    }
}

function clearControls() {
    $("#txtName").val("");
    $("#txtUsername").val();
    $("#txtPassword").val();
    $("#txtPassword2").val();
}

function termsAccept() {
    alert("You have agreed to the terms of PHP_Login"+"\n"+
          "Some terms for a checkbox click.");
}
