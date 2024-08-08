$(document).ready(function() {
    $('.o-mail-Composer-attachFiles').click(function() {
        $(this).parent().next('input[type="file"]').click();
    });



    // start manage in crm priority
    $(document).on('click', '.o_priority_star', function() {
    var $this = $(this);
    var index = $this.index();
    var $stars = $this.parent().find('.o_priority_star');

    $stars.removeClass('fa-star fa-star-o');
    $stars.each(function(i) {
        $(this).addClass(i <= index ? 'fa-star' : 'fa-star-o');
    });
});
});
