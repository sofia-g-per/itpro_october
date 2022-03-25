import React from 'react'
import '../../css/contacts-popup.css'
import logo from "../../img/Logo.svg";
import SocialLinks from '../../components/SocialLinks.jsx';

<div class='contacts-popup__content'>
    <img class='contacts-popup__logo' src="{'assets/img/Logo.svg'|theme}" alt="Логотип ITPRO" />
    <div class="contacts-popup__mail contacts-popup__item">
        <p class='contacts-popup__mail__text'>Свяжитесь с нами</p>
        <a class='contacts-popup__mail__link popup-heading' href="mailto:info@itpro.moscow">info@itpro.moscow</a>
    </div>
    <div class="contacts-popup__socials contacts-popup__item">
        <p class='contacts-popup__socials__text popup-text--small'>Мы в социальных сетях</p>
        {% partial "SocialLinks" %}
    </div>
</div>

