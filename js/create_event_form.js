//Adding validation rules
$("form").validate({
    rules: {
        evename: "required",
        descr: "required"
    }
});

//Adding a date picker
$("#date").datepicker(
        {
            dateFormat: "dd/mm/yy"
        }
);
