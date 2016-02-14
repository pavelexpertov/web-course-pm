//Adding validation rules
$("#create-event").validate({
    rules: {
        evename: {
            required: true,
            maxlength: 24
        },
        descr: "required"
    },
    messages: {
        evename: {
            required: "You must type in name for the event",
            maxlength: "you can only type up to 24 characters"
        },
        descr: "You must enter event description"
    }
});



//Adding a date picker
$("#date").datepicker(
        {
            dateFormat: "dd/mm/yy"
        }
);
