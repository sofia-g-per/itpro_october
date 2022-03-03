<?php if($record->technology_icon){ ?>
    <img src="<?= $record->technology_icon->getThumb(80, 80) ?>">
<?php } ?>