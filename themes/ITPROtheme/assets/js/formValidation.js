const sleep = ms => new Promise(r => setTimeout(r, ms));

const onSuccess = async function(event, form, data, status, object) {
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

                await sleep(5000);

                popupContent.classList.remove('visually-hidden');
                popupEl.querySelector('.submitted-popup').classList.remove('submitted-popup--active');
                popupEl.classList.add('test-request-popup-wrapper');
                popupEl.classList.remove('submitted-popup-wrapper');
            }
        }

    }else{
        formEl.addClass('visually-hidden');
        const submittedPopup = formEl.parent().find('.submitted-popup');
        submittedPopup.addClass('submitted-popup--active');

        await sleep(5000);

        formEl.removeClass('visually-hidden');
        submittedPopup.removeClass('submitted-popup--active');

    }

}

// on submit ajax validation
$(window).on('ajaxInvalidField', function(event, fieldElement, fieldName, errorMsg, isFirst) {
    $(fieldElement).closest('.field').addClass('form__field--error');
});

$(document).on('ajaxPromise', '[data-request]', function() {
    $(this).closest('form').find('.field.form__field--error').removeClass('form__field--error');
});

$(window).on('ajaxSuccess', onSuccess);

// JS валидация
const fields = document.querySelectorAll('.field');
const validateEmail = (email) => {
    return String(email)
    .toLowerCase()
    .match(
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
}
const jsValidation = (field) => {
    if(field.value){
        if(field.classList.contains('form__field--error')){
            // дополнительная валидация для полей почты
            if(field.name === 'email'){
                if(validateEmail(field.value)){
                    field.classList.remove('form__field--error');
                }
            }else{
                field.classList.remove('form__field--error');
            }
        }
    }else {
        if(!field.classList.contains('form__field--error')){
            field.classList.add('form__field--error');
        }
    }
}

for(const field of fields){
    field.addEventListener('keydown', jsValidation.bind(null, field));
}

// Изменение стилей поля для файла при прикреплении
const fileInputs =  document.querySelectorAll("input[name='file']");
const fileUpload = (fileInput) => {
    const fileWrapper = fileInput.closest(".field");
    const labelWrapper = fileWrapper.querySelector('.form__file-label-wrapper')
    // const uploadedLabel = fileWrapper.querySelector('file-uploaded-label')
    // const uploadLabel = fileWrapper.querySelector('file-upload-label')
    if(fileInput.value){
        if(fileWrapper.classList.contains("form__field--error")){
            fileWrapper.classList.remove("form__field--error")
        }

        if(!labelWrapper.classList.contains("js-file-uploaded")){
            !labelWrapper.classList.add("js-file-uploaded")
        }
    }else{
        if(!fileWrapper.classList.contains("form__field--error")){
            fileWrapper.classList.add("form__field--error")
        }

        if(labelWrapper.classList.contains("js-file-uploaded")){
            !labelWrapper.classList.remove("js-file-uploaded")
        }
    }
}

for(const fileInput of fileInputs){
    fileInput.addEventListener('change', fileUpload.bind(null, fileInput));
}

//Стилизация селекта

$('select').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
  
    $this.addClass('select-hidden'); 
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());
  
    var $list = $('<ul />', {
        'class': 'select-options'
    }).insertAfter($styledSelect);
  
    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
        //if ($this.children('option').eq(i).is(':selected')){
        //  $('li[rel="' + $this.children('option').eq(i).val() + '"]').addClass('is-selected')
        //}
    }
  
    var $listItems = $list.children('li');
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active').not(this).each(function(){
            $(this).removeClass('active').next('ul.select-options').hide();
        });
        $(this).toggleClass('active').next('ul.select-options').toggle();
    });
  
    $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
    });
  
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });
});