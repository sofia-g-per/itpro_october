$(window).on('ajaxInvalidField', function(event, fieldElement, fieldName, errorMsg, isFirst) {
     console.log(fieldElement);   
    $(fieldElement).closest('.form__select').addClass('form__field--error');
});

$(document).on('ajaxPromise', '[data-request]', function() {
    $(this).closest('form').find('.form__select.form__field--error').removeClass('form__field--error');
});