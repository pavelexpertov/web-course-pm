        /*var stime = $("#stime option:selected").val();
        var ftime = $("#ftime option:selected").val();
        var stime = stime.split(":");
        var ftime = ftime.split(":");
        var stime = (Number(stime[0])*60) + Number(stime[1]);
        var ftime = (Number(ftime[0])*60) + Number(ftime[1]);
        alert((stime < ftime));*/
//alert($('#ftime').text);
//alert($("#ftime option:selected").val());
$.validator.addMethod("usrnameRegex", function(value, element) {
       return this.optional(element) || /^[a-zA-Z]\w{1,24}$/i.test(value);
}, "Username must contain only letters, numbers, or dashes.");
$.validator.addMethod("checkDate", function(value, element){
        var stime = $("#stime option:selected").val();
        var ftime = $("#ftime option:selected").val();
        var stime = stime.split(":");
        var ftime = ftime.split(":");
        var stime = (Number(stime[0])*60) + Number(stime[1]);
        var ftime = (Number(ftime[0])*60) + Number(ftime[1]);
        return (stime < ftime);
}, "The start time needs to be earlier than finish time!");

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
        },
        stime: {
            checkDate: true
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
