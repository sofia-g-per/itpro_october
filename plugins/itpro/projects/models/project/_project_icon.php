<?php if($record->project_icon){ ?>
    <img src="<?= $record->project_icon->getThumb(30, 30) ?>">
<?php } ?>