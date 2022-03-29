<?php if($record->order_file){ ?>    
    <a id="file-link" href="<?= $record->order_file->path ?>" download> 
        Кликните здесь, <br> чтобы скачать описание 
    </a>
    <script>
        document.getElementById("file-link").addEventListener("click", function(e){
            e.stopPropagation();
        })
    </script>
<?php } ?>