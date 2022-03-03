<?php if($record->platform_icon){ ?>
    <img src="<?= $record->platform_icon->getThumb(80, 80) ?>">
<?php } ?>