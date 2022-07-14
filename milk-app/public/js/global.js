const numberOnly = function (el) {
    $(el).attr('type', 'number').on("beforeinput", function (e) {
        const text = e.originalEvent.data;
        if (text == null) {
            return;
        }
        return $.inArray(text.toLowerCase(), ['e', '+', '-']) == -1;
    });
}

window.addEventListener('DOMContentLoaded', (event) => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.number-only').each(function () {
        numberOnly(this);
    });

    $(document).on("keydown", "form", function(event) {
        return event.key != "Enter";
    });

    if(typeof $.fn.datepicker != 'undefined') {
        $(".bs-datepicker").datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true,
            clearBtn: true,
            disableTouchKeyboard: true,
            readOnly: true
        });
    }
});

$.prototype.removeClassPattern = function (pattern) {
    if(pattern instanceof RegExp) {
        return this.removeClass (function (index, className) {
            return (className.match(pattern) || []).join(' ');
        });
    }
    return this;
}

$.prototype.removeClassStartWith = function (str_start) {
    const regex = new RegExp('(^|\\s)' + str_start + '\\S+', 'g');
    return this.removeClassPattern(regex);
}

if(typeof alertify != 'undefined') {
    alertify.alertSuccess = function(...params) {
        this.alert(...params);
        $('.alertify').removeClassStartWith('alertify--').addClass('alertify--success');
    }
    alertify.alertDanger = function(...params) {
        this.alert(...params);
        $('.alertify').removeClassStartWith('alertify--').addClass('alertify--danger');
    }
}
