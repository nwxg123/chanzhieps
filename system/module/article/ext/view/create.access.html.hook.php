<table id='accessTable' class='hide'>
<?php echo $this->fetch('access', 'setaccess', "objectType=$type&objectID=0&style=form");?>
</table>
<script>
$(document).ready(function() { $('#ajaxForm [name=status]').parents('tr').before($('#accessTable tbody').html()); });
</script>
