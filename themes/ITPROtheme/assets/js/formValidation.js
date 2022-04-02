$(window).on('ajaxInvalidField', function(event, fieldElement, fieldName, errorMsg, isFirst) {
    $(fieldElement).closest('.form__select').addClass('form__field--error');
});

$(document).on('ajaxPromise', '[data-request]', function() {
    $(this).closest('form').find('.form__select.form__field--error').removeClass('form__field--error');
});

$(window).on('ajaxSuccess', function(event, form, data, status, object) {
    const formEl = $(event.target.closest('form'));
    const popupEl = formEl.closest('.popup--active')[0];
    if(popupEl){
        
        if(popupEl.classList.contains('test-request-popup-wrapper')){
            const popupContent = popupEl.querySelector('.test-request-popup');
            if(popupContent){
                popupContent.classList.add('visually-hidden');
                popupEl.querySelector('.submitted-popup').classList.add('submitted-popup--active');
                popupEl.classList.remove('test-request-popup-wrapper');
                popupEl.classList.add('submitted-popup-wrapper');
        
            }
        }

    }else{
        formEl.addClass('visually-hidden');
        formEl.parent().find('.submitted-popup').addClass('submitted-popup--active');
    }
});
