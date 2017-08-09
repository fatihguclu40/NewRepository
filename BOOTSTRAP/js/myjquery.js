

$(document).ready(function () {
    $('#selectBox').click(function (e) {
        $('.selectBox').stop(true).slideToggle();
    });
    $(document).click(function (e) {
        if (!$(e.target).closest('#selectBox, .selectBox').length) {
            $('.selectBox').stop(true).slideUp();
        }
    });
});