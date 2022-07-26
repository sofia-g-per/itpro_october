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

    const formElement = event.target.closest('form');
    formElement.querySelectorAll('input').forEach((input)=>
        input.value = ''
    );

}


// on submit ajax validation
// adding errors to fields on error
$(window).on('ajaxInvalidField', function(event, fieldElement, fieldName, errorMsg, isFirst) {
    $(fieldElement).closest('.field').addClass('form__field--error');
});

//removing all errors on a submit
$(document).on('ajaxPromise', '[data-request]', function() {
    $(this).closest('form').find('.field.form__field--error').removeClass('form__field--error');
});

//on successful submit
$(window).on('ajaxSuccess', onSuccess);


// JS валидация
const fields = document.querySelectorAll('.field');
const technologySelectField = document.querySelector('select[name="technology_id"]');
let selectFieldWrapper = technologySelectField.closest('.form__field--select');
const styledSelect = technologySelectField.querySelector('.styled-select');

const validateEmail = (email) => {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
const jsValidation = (field) => {
    console.log(field.value)
    if(field.value){
        //removing errors
        if(field.classList.contains('form__field--error')){
            console.log('contains')
            // дополнительная валидация для полей почты
            if(field.name === 'email'){
                console.log('email')
                console.log('valid', validateEmail(field.value))
                if(validateEmail(field.value)){
                    field.classList.remove('form__field--error');
                }
            //доп валидация для селекта технологий с дефолтным значением
            }else if(field.name === 'technology_id'){
                if(isNan(field.value)){
                    console.log('is number')
                    selectFieldWrapper.classList.remove('form__field--error');
                }
            }
            else{
                field.classList.remove('form__field--error');
            }
        //adding errors for fields that have values but contain errors
        //доп валидация для селекта технологий с дефолтным значением
        }else if(field.name === 'technology_id'){
            if(!isNan(field.value)){
                console.log('is not number')
                selectFieldWrapper.classList.add('form__field--error');
            }
        }
        // дополнительная валидация для полей почты
        else if(field.name === 'email'){
            if(!validateEmail(field.value)){
                field.classList.add('form__field--error');
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

//Стилизация + валидация селекта
$('select').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
  
    $this.addClass('select-hidden'); 
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled "></div>');

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

        //валидация селекта
        if(selectFieldWrapper && selectFieldWrapper.classList.contains('form__field--error')){
            if($.isNumeric($(this).attr('rel')) ){
                selectFieldWrapper.classList.remove('form__field--error');
            }
        }else{
            if(!$.isNumeric($(this).attr('rel')) ){
                selectFieldWrapper.classList.add('form__field--error');
            }
        }

        $list.hide();
    });
  
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });
});