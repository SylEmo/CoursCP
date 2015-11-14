function updateValues() {
    $('.connectedSortable').each(function () {
        $(this).parents('.list').siblings('.details').find('.nb-item-value').html($(this).find('li').length);
        var points = 0;
        $(this).find('li .effort').each(function () {
            points += parseFloat($(this).attr('data-points'));
        });
        $(this).parents('.list').siblings('.details').find('.nb-pts-value').html(points);
    });
}
updateValues();
$('.list').jScrollPane({
    autoReinitialise: true,
    verticalGutter: 0
}).bind('jsp-scroll-y', function (event, scrollPositionY, isAtTop, isAtBottom) {
    if (scrollPositionY > 70) {
        $(this).siblings('.drop-top').show();
    } else {
        $(this).siblings('.drop-top').hide();
    }
});
$('.drop-top').droppable({
    accept: '.connectedSortable li',
    tolerance: 'touch',
    hoverClass: 'on-top',
    drop: function (event, ui) {
        var ul = $(this).siblings('.list').find('.connectedSortable');
        ul.addClass('dropped');
        ul.prepend(ui.draggable.clone().show());
        ui.draggable.remove();
    }
});
$('.connectedSortable').sortable({
    appendTo: document.body,
    helper: 'clone',
    cursor: 'move',
    connectWith: '.connectedSortable',
    stop: function (event, ui) {
        updateValues();
        if ($(this).hasClass('dropped')) {
            ui.helper.remove();
            $(this).sortable('cancel').removeClass('dropped');
        }
    }
}).disableSelection();
(function addCaseInsensitiveContainsSelector() {
    $.expr[':'].caseInsensitiveContains = function (a, i, m) {
        return $(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
    };
}());
$('input').keyup(function (event) {
    if (event.keyCode == 27) {
        $(this).val('');
    }
    $(this).siblings('.list').find('ul li:not(:caseInsensitiveContains(' + $(this).val() + '))').hide();
    $(this).siblings('.list').find('ul li:caseInsensitiveContains(' + $(this).val() + ')').show();
});