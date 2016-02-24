//Adding extra methods to validate username and password
$.validator.addMethod("usrnameRegex", function(value, element) {
       return this.optional(element) || /^[a-zA-Z]\w{1,24}$/i.test(value);
}, "First letter must be a character.");
$.validator.addMethod("pwdRegex", function(value, element) {
       return this.optional(element) || /^[a-zA-Z]\w{3,14}$/i.test(value);
}, "Username must contain only letters, numbers, or dashes.");

$("#login-form").validate({
    rules: {
        usr:{
            required: true,
            maxlength: 25,
            usrnameRegex: true
        },
        pwd:{
            required: true,
            maxlength: 15
            //pwdRegex: true
        },
        code:{
            required: true,
            maxlength: 10
        }
    }
})
