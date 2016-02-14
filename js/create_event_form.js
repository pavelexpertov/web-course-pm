//Adding validation rules
$("#create-event").validate({
    rules: {
        evename: {
            required: true,
            maxlength: 24
        },
        descr: "required",
        date: {
            required: true,
            date: true
        }
    },
    messages: {
        evename: {
            required: "You must type in name for the event",
            maxlength: "you can only type up to 24 characters"
        },
        descr: "You must enter event description",
        date: {
            required: "you must enter a date for your event",
            date: "You must enter in dd/mm/yyyy format"
        }
    }
});



//Adding a date picker
$("#date").datepicker(
        {
            dateFormat: "dd/mm/yy"
        }
);
