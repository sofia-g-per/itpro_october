import React from 'react'
import '../../css/popups/form-submitted-popup.css'
import checkmark from '../../img/checkmark.png'

export default function FormSubmittedPopup() {
  return (
    <div className='submitted-popup'>
        <img className='submitted-popup__checkmark' src={checkmark} alt="" />
        <h2 className='submitted-popup__title popup-heading'>Сообщение отправлено!</h2>
        <p className='submitted-popup__text popup-text--small'>
            Наши специалисты обработуют заявку и постараются ответить вам в ближайшее время ! 
        </p>
    </div>
  )
}
