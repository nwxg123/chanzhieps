<?php if(!$file->isImage):?>
<table id='accessTable' class='hide'>
<?php echo $this->fetch('access', 'setAccess', "objectType=file&objectID={$file->id}&style=form");?>
</table>
<script>
$(document).ready(function()
{
    $('#upFile').parents('tr').after($('#accessTable tbody').html());
});
</script>
<?php endif;?>
