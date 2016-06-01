require('jquery-form');

$(function() {
    let wineName = $('#wine_name').focus();
    let loader = $('#loader').addClass('hide');
    let ajaxContent = $('#ajax_content');

    $('#wine_form').ajaxForm({
        url: 'grab.php',
        method: 'get',
        beforeSubmit: () => {
            loader.removeClass('hide');
            ajaxContent.html('');
        },
        dataType: 'json',
        success: (response) => {
            ajaxContent.html(response.html);
            loader.addClass('hide');
        }
    });
});
