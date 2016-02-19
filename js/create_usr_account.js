$.validator.addMethod("usrnameRegex", function(value, element) {
       return this.optional(element) || /^[a-zA-Z]\w{1,24}$/i.test(value);
}, "Username must contain only letters, numbers, or dashes.");
$.validator.addMethod("pwdRegex", function(value, element) {
       return this.optional(element) || /^[a-zA-Z]\w{3,14}$/i.test(value);
}, "Username must contain only letters, numbers, or dashes.");
//Adding validation rules
$("#create-usr-account").validate({
    rules: {
        fname: {
            required: true,
            maxlength: 25
        },
        lname: {
            required: true,
            maxlength: 25
        },
        email: {
            required: true,
            email: true
        },
        job: {
            required: true,
            maxlength: 25
        },
        usrname: {
            required: true,
            maxlength: 25,
            minlength: 2,
            usrnameRegex: true
        },
        usrpwd: {
            required: true,
            maxlength: 15,
            minlength: 4,
            pwdRegex: true
        },
        reppwd: {
            required: true,
            equalTo: "#usrpwd"
        }
    },
    messages: {
        usrname: {
            required: "It needs to be filled in",
            maxlength: "Username must be at most 25 characters long",
            usrnameRegex: "First character must be a letter"
        },
        usrpwd: {
            required: "You must enter your password",
            maxlength: "Your password must be 15 characters long",
            minlength: "Password must be at least 4 characters",
            pwdRegex: "First character must be a letter"
        },
        reppwd: {
            required: "You msut re-enter the password",
            equalTo: "Passwords do not match"
        }
    }
}//End of outer validate function
)
