$(window).on('ajaxInvalidField', function(event, fieldElement, fieldName, errorMsg, isFirst) {
     console.log(errorMsg);   
    $(fieldElement).closest('.form__select').addClass('form__field--error');
});

$(document).on('ajaxPromise', '[data-request]', function() {
    $(this).closest('form').find('.form__select.form__field--error').removeClass('form__field--error');
});

$(window).on('ajaxSuccess', function(event, form, data, status, object) {
    console.log('success');
    console.log(event.target, $(event.target).closest('form'), $(event.target).closest('form').className);
    $(event.target).closest('form').addClass('visually-hidden');

    console.log($(event.target).closest('form').find('.submitted-popup'));
    $(event.target).closest('form').parent().find('.submitted-popup').addClass('submitted-popup--active');
});
