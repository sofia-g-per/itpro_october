import React from 'react'
import { useState } from 'react'
import '../../css/UI/popup.css';
import xSVG from '../../img/x-button.svg'

({containerClass, children, onClosePopup}) 
    // const [isOpen, toggleIsOpen] = useState(true);
    // const closePopup = () => {
    //     toggleIsOpen(false);
    // }

<div class='page-overlay'></div>
<dialog class="{'popup'~ containerClass}">
  {/* onClick={onClosePopup} */}
    <button class='x-button'>
        <img src="{'assets/img/x-button.svg|theme'}" alt="закрыть попап" />
    </button>
    {children}
</dialog>

