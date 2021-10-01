(function () {
    var form = document.forms['myform'];
    form.final[0].onfocus = function () {
        form.ftd.disabled = true;
        form.ftd.value = "0";
    }
    form.final[1].onfocus = function () {
        form.ftd.disabled = false;
    }
})();