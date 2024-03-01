jQuery(document).ready(function($) {
    $('#publicform').submit(function(e) {
        e.preventDefault();
        // Make AJAX request
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'your_action',
                parameter1: 'value1',
                parameter2: 'value2'
            },
            success: function(response) {
                // handle the response data
                console.log(response);
            },
            error: function(xhr, status, error) {
                // handle any errors
            }
        });

    });

});