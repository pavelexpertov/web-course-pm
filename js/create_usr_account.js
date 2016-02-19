//Adding validation rules
$("#create-usr-account").validate({
    rules: {
        usrname: {
            required: true,
            maxlength: 25
        },
        usrpwd: {
            required: true,
            maxlength: 25
        },
        reppwd: {
            equalTo: "#usrpwd"
        }
    },
    messages: {
        usrname: {
            required: "It needs to be filled in",
            maxlength: "Username must be 25 characters long"
        },
        usrpwd: {
            required: "You must enter your password",
            maxlength: "Your password must be 25 characters long"
        },
        reppwd: {
            equalTo: "Passwords do not match"
        }
    }
}//End of outer validate function
)
