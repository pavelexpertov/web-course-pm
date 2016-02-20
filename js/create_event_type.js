$("#eve-type").validate({
    rules: {
        ename:{
            required: true,
            maxlength: 24
        },
        descr: "required"
    }
})
