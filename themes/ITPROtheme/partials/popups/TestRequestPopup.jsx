import React from 'react'
import {useState} from 'react'
import axios from 'axios'

import TextInput from '../Form/TextInput.jsx'
import Formfield from '../../components/Form/Formfield.jsx'
import FormSelect from '../../components/Form/FormSelect.jsx'
import BasicButton from '../../components/UI/BasicButton.jsx'

import '../../css/form.css'
import '../../css/popups/test-request-popup.css'

export default function TestRequestPopup({projectId, projects}) {
    let projectOptions = [];
    projects.forEach((project)=>{
        projectOptions.push({title:project.title, value: project.id});
    });
    const [formFields, updateFormFields] = useState(   
        [
            {
                title: projectId,
                value: projectId,
                fieldName: 'project_id',
                comment: '',
                options: projectOptions,
                error: false,
            },
            {
                title: 'Имя',
                fieldName: 'client_name',
                value: '',
                comment: '',
                error: false,
            },
            {
                title: 'Почта',
                fieldName: 'email',
                value: '',
                comment: '',
                error: false,
            },
 
            {
                title: 'Цели тестирования',
                fieldName: 'description',
                value: '',
                comment: '',
                error: false,
            },
        ] 
    );
    const [formErrors, updateFormErrors] = useState([]);
    
    const checkError = (fieldIndex) => {
        const {fieldName} = formFields[fieldIndex];
        let errorIndex = formErrors.findIndex(errorName => errorName === fieldName);
        if (errorIndex === -1){
            return true
        }
        return false
    }

    const addError = (fieldIndex) => {
        console.log(formFields[fieldIndex], fieldIndex);
        let {fieldName} = formFields[fieldIndex];
        let updatedFormFields = formFields;
        if (checkError(fieldIndex)){
            updateFormErrors([...formErrors , fieldName]);
            updatedFormFields[fieldIndex].error = true; 
            updateFormFields(updatedFormFields);
        }
    }

    const removeError = (fieldIndex) => {
        const {fieldName} = formFields[fieldIndex];
        let updatedFormFields = formFields;
        console.log('checkerror', !checkError(fieldIndex));
        if (!checkError(fieldIndex)){
            let errorIndex = formErrors.findIndex(errorName => errorName === fieldName);
            const updatedFormErrors = formErrors.splice(errorIndex, 1);
            updateFormErrors(updatedFormErrors);
            updatedFormFields[fieldIndex].error = false; 
            updateFormFields(updatedFormFields);
        }
    }

    const validateFilled = (fieldIndex) => {
        const {value} = formFields[fieldIndex];
            if( value.trim() === ''){
                addError(fieldIndex);
            }else {
                removeError(fieldIndex);
            }

    }

    const validateEmail = (fieldIndex) => {
        
    }

    const handleChange = (e) => {
        let updatedFormFields = formFields;
        let fieldIndex = updatedFormFields.findIndex(field=> field.fieldName === e.target.name);
        updatedFormFields[fieldIndex].value = e.target.value.trim();
        updateFormFields(updatedFormFields);
        validateFilled(fieldIndex);
        if(!formFields[fieldIndex].error & formFields.fieldName === 'email'){
            validateEmail(fieldIndex);
        }
        console.log(formFields[fieldIndex].value);

    }

    
    const handleSubmit = (e) => {
        e.preventDefault();
        console.log('submitted');
        let submittedData = new FormData;
        formFields.forEach((formField) => {
            submittedData.append(formField.fieldName, formField.value);
        });
        axios({
            method: 'post',
            url: 'http://itpro/send-test-request', 
            data: submittedData,
        })
        .then( response =>
        {
            console.log(response);


        })
        .catch(error => 
        { 
            if(error.response.message !== "Success"){
                Object.keys(error.response.data.error.errors).forEach((error)=>
                    {
                        const errorId = formFields.findIndex((field) => field.fieldName === error);
                        addError(errorId);
                    }
                );
            }
        });
    }

  return (
    <div className='test-request-popup'>
        <div className='test-request-popup__text'>
            <h2 className='popup-heading'>
                Вместе, мы сможем превратить идею в реальность!
            </h2>
            <a className='popup-text--small' href="mailto:info@itpro.moscow ">
                info@itpro.moscow 
            </a>
        </div>
        <form className='test-request-popup__form' method="post" onSubmit={handleSubmit} >
            <div className='form' >
                <Formfield formField={formFields[0]}>
                    <FormSelect 
                        fieldData={formFields[0]}
                        onChange={handleChange}
                    ></FormSelect>
                </Formfield>
                <Formfield formField={formFields[1]} >
                    <TextInput fieldData={formFields[1]} onChange={handleChange}></TextInput>
                </Formfield>
                <Formfield formField={formFields[2]} >
                    <TextInput fieldData={formFields[2]} onChange={handleChange}></TextInput>
                </Formfield>
                <Formfield formField={formFields[3]}>
                    <TextInput fieldData={formFields[3]} onChange={handleChange}></TextInput>
                </Formfield>
                <div>
                    <BasicButton title="Получить" buttonClass="basic-button--purple"></BasicButton>
                    <p className='text--small form__field__error-label'>Нажимая кнопку "Получить" Вы даёте согласие на обработку своих персональных данных.</p>
                </div>
            </div>
        </form>
    </div>
  )
}
