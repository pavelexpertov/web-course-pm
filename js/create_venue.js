$("#venue-form").validate({
    rules: {
        vname:{
            required: true,
            maxlength: 24
        },
        town:{
            required: true,
            maxlength: 24
        },
        country:{
            required: true,
            maxlength: 24
        },
        cap:{
            required: true,
            maxlength: 11
        },
        addrss: "required"
    }
})
