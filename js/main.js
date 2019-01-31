/*
    PHP_Login
    JavaScript
    BootStrap 4 / HTML5 / CSS3 / JS / PHP
    /xampp/htdocs/PHP_Login/js/
    JavaScript functions - Andrew Harkins
*/

$(document).ready(function() {

    $(formsignin).submit(function() {
    //$(formsignin).on("submit", function() {

        if(validateSubmit()){
            alert("success");
            var successText = "Congratulations you have logged in";
            var alertSuccess = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" ' +
                               'class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">&times;</button>';
            $("divAlert").html(alertSuccess + successText + '</div>');
        }
    })
});

// Validation function for PHP_Login-Home.
// I could use jQuery.validate() instead of my JS() below
function validateSubmit() {
    var txtUsername = $("#txtUsername").val();
    var txtPassword = $("#txtPassword").val();
    var extraText = "";
    var alertText = "Login was <strong>Unsuccessful</strong> please <u>try again</u>";
    var alertDanger = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" ' +
                      'class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">&times;</button>'+alertText;

    if(txtUsername != "" && txtPassword != "") {

        if(txtPassword.length > 5) {
            return true;
        } else {
            extraText = "<br>" + "Password must be at least 6 characters.";
            $("#divAlert").html(alertDanger + extraText + '</div>');
            return false;
        }
    } else {
        extraText = "All fields are required to continue.";
        $("#divAlert").html(alertDanger + extraText + '</div>');
        return false;
    }
}
