//Adding validation rules
$("#create-usr-account").validate({
    rules: {
        usrname: {
            required: true,
            maxlength: 25
        }
    },
    messages: {
        usrname: {
            required: "It needs to be filled in",
            maxlength: "Username must be 25 characters long"
        }
    }
}//End of outer validate function
)
