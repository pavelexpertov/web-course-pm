$.validator.addMethod("usrnameRegex", function(value, element) {
       return this.optional(element) || /^[a-zA-Z]\w{1,24}$/i.test(value);
}, "Username must contain only letters, numbers, or dashes.");
$.validator.addMethod("pwdRegex", function(value, element) {
       return this.optional(element) || /^[a-zA-Z]\w{3,14}$/i.test(value);
}, "Password must contain only letters, numbers, or dashes and at most 15 characters long.");
//Adding validation rules
$("#change-pwd").validate({
    rules: {
        oldpwd:{
            required: true,
            pwdRegex: true
        },
        newpwd:{
            required: true,
            pwdRegex: true
        },
        reppwd:{
            equalTo: "#newpwd"
        }
    }
})
