$(document).ready(function () {
    if (location.protocol == 'http:') {
        $("#httpPopup").show();
    } else {
        $("#httpPopup").hide();
    }
});
