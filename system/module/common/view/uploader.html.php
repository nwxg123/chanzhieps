<?php if(!defined("RUN_MODE")) die();?>
<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<?php
js::import($jsRoot . 'uploader/min.js');
css::import($jsRoot . 'uploader/min.css');
?>
<style>
.icon-file-text-o:before {content: '\e6d4';}
.icon-file-pdf:before {content: '\f1c1';}
.icon-file-word:before {content: '\f1c2';}
.icon-file-excel:before {content: '\f1c3';}
.icon-file-powerpoint:before {content: '\f1c4';}
.icon-file-image:before {content: '\f1c5';}
.icon-file-photo:before {content: '\f1c5';}
.icon-file-picture:before {content: '\f1c5';}
.icon-file-archive:before {content: '\f1c6';}
.icon-file-zip:before {content: '\f1c6';}
.icon-file-audio:before {content: '\f1c7';}
.icon-file-sound:before {content: '\f1c7';}
.icon-file-movie:before {content: '\f1c8';}
.icon-file-video:before {content: '\f1c8';}
.icon-file-code:before {content: '\f1c9';}
.file-list .file[data-status=queue] .file-status>.icon:before, .uploader-files .file[data-status=queue] .file-status>.icon:before {content: '\e960'}
.file-list .file-status>.icon:before, .uploader-files .file-status>.icon:before {content: '\e919'}
.file-list-grid .file-wrapper>.content {text-align: left;}
</style>
<script>
$.extend($.zui.Uploader.DEFAULTS,
{
    fileTemplate: '<div class="file"><div class="file-progress-bar"></div><div class="file-wrapper"><div class="file-icon"><i class="icon icon-file-o"></i></div><div class="content"><div class="file-name"></div><div class="file-size small text-muted">0KB</div></div><div class="actions"><div class="file-status" data-toggle="tooltip"><i class="icon"></i> <span class="text"></span></div><a data-toggle="tooltip" class="btn btn-link btn-download-file" target="_blank"><i class="icon icon-download"></i></a><button type="button" data-toggle="tooltip" class="btn btn-link btn-reset-file" title="Repeat"><i class="icon icon-reload"></i></button><button type="button" data-toggle="tooltip" class="btn btn-link btn-rename-file" title="Rename"><i class="icon icon-pencil"></i></button><button type="button" data-toggle="tooltip" title="Remove" class="btn btn-link btn-delete-file"><i class="icon icon-delete text-danger"></i></button></div></div></div>'
});
</script>
