$(document).ready(function() {
    $('.o-mail-Composer-attachFiles').click(function() {
        $(this).parent().next('input[type="file"]').click();
    });
});
