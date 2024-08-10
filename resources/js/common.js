
// auto suggestion
    window.autoInputComplate = function autoComplate(input_id, suggestions_route) {
        console.log(input_id);
        var input = $(document).find(input_id);

        // appencd <ul class="o-autocomplete--dropdown-menu dropdown-menu" style="display: none;"></ul> if not exist
        if (!input.parent().find('.o-autocomplete--dropdown-menu').length) {
            input.parent().append('<ul class="o-autocomplete--dropdown-menu dropdown-menu" style="display: none;">' +
                '</ul>');
        }
        var dropdownMenu = input.parent().find('.o-autocomplete--dropdown-menu');

        // Event listener for the input field
        $(document).on('input', input_id, function () {
            var input = $(this);
            var query = $(this).val();

            dropdownMenu.show();

            // Check if the query is not empty
            if (query.length > 0) {
                // Example AJAX request to get suggestions (replace with your actual endpoint)
                $.ajax({
                    url: suggestions_route,  // Your API endpoint to get suggestions
                    type: 'GET',
                    data: {query: query},
                    success: function (data) {
                        var dropdownMenu = $('.o-autocomplete--dropdown-menu');
                        dropdownMenu.empty();

                        if (data.length > 0) {
                            data.forEach(function (item) {
                                // Append each item to the dropdown menu
                                dropdownMenu.append('<li class="o-autocomplete--dropdown-item ui-menu-item" data-id="' + item.id + '">' + item.name + '</li>');
                            });
                            dropdownMenu.show();
                        }
                        // else {
                        //     dropdownMenu.hide(); // Hide the dropdown menu if no results
                        // }

                        // Add the "Create" and "Create and edit..." options
                        dropdownMenu.append('<li class="create-option o-autocomplete--dropdown-item ui-menu-item d-block o_m2o_dropdown_option o_m2o_dropdown_option_create"><a role="option" href="#" class="dropdown-item">Create "' + query + '"</a></li>');
                        dropdownMenu.append('<li class="create-edit-option o-autocomplete--dropdown-item ui-menu-item d-block o_m2o_dropdown_option o_m2o_dropdown_option_create_edit"><a role="option" href="#" class="dropdown-item">Create and edit...</a></li>');
                    }
                });
            } else {
                dropdownMenu.hide()
            }
        });

        // Event listener for selecting an item
        $(dropdownMenu).on('click', '.o-autocomplete--dropdown-item', function (e) {
            // var selectedText = $(this).text();
            // var selectedId = $(this).data('id');
            //
            // // Set the input field value to the selected item
            // $('#partner_id_0').val(selectedText);
            //
            // // You might want to do something with the selected ID here
            //
            // // Hide the dropdown menu after selection
            // $('.o-autocomplete--dropdown-menu').hide();


            e.preventDefault();
            var selectedText = $(this).text();
            console.log($(this));

            if ($(this).hasClass('create-option')) {
                // Handle the "Create" option
                alert('Create new: ' + selectedText);
                // You can add your logic here for creating a new entry
            } else if ($(this).hasClass('create-edit-option')) {
                // Handle the "Create and edit..." option
                alert('Create and edit: ' + selectedText);
                // You can add your logic here for creating and editing a new entry
            } else {
                // Handle the selection of a suggested item
                var selectedId = $(this).data('id');
                input.val(selectedText);

                // You might want to do something with the selected ID here
            }

            $('.o-autocomplete--dropdown-menu').hide();
        });

    }

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
