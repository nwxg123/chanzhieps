<table id='accessTable' class='hide'>
<?php echo $this->fetch('access', 'setAccess', "objectType=$type&objectID={$article->id}&style=form");?>
</table>
<script>
$(document).ready(function() { $('#ajaxForm [name=status]').parents('tr').before($('#accessTable tbody').html()); });
</script>
