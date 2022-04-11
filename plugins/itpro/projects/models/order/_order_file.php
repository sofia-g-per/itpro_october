<?php if($record->order_file){   
    ?>
    <p>Кликните на надпись, чтобы скачать</br></p>
    <?php
    foreach( $order_file as $file){
    ?>
    <a class="file-link" href="<?= $record->order_file->path ?>" download> 
        <?= 
            $record->order_file->mime_content_type == 'png' || 
            $record->order_file->mime_content_type == 'jpeg' || 
            $record->order_file->mime_content_type == 'jpg' ?
            'фото': 'текстовый файл'
        ?> </br>
    </a>

<?php 
    }
    ?>
    <script>
        const fileLinks = document.querySelectorAll(".file-link");
        fileLinks.forEach((fileLink)=> {
            fileLink.addEventListener("click", function(e){e.stopPropagation();})
        })

    </script>
 <?php } 
 ?>