// import './bootstrap';

$(document).ready(function () {
    $('.select2').select2();
});

$('.modal').on('shown.bs.modal', function () {
    $(this).find('.select2').each(function () {
        $(this).select2({
            dropdownParent: $(this).closest('.modal')
        });
    });
});

$('.btn-loading').on('click', function () {
    var loadingText = $(this).data('loading-text');
    $(this).html(loadingText);
});
