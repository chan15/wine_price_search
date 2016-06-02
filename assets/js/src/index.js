require('jquery-form');
require('jsrender')($);

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
            let html = '';

            if (response.html.length === 0) {
                html = '<li>沒有相關結果</li>';
            } else {
                html = $('#myTemplate').render(response.html);
            }

            ajaxContent.html(html);
            loader.addClass('hide');
        },
        error: () => {
            alert('搜尋發生錯誤');
            loader.addClass('hide');
        }
    });
});
