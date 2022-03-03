<?php if($record->project_icon){ ?>
    <img src="<?= $record->project_icon->getThumb(80, 80) ?>">
<?php } ?>