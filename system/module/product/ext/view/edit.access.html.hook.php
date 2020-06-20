<table id='accessTable' class='hide'>
<?php echo $this->fetch('access', 'setAccess', "objectType=product&objectID={$product->id}&style=form");?>
</table>
<script>
$(document).ready(function() { $('#ajaxForm #submit').parents('tr').before($('#accessTable tbody').html()); });
</script>
