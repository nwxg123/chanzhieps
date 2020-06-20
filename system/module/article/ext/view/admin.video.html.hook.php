<?php
    js::set('type', $type);
    $antiUrl = "<div class='text-center'>" . html::a(helper::createLink('guarder', 'antiSteelingLink'), $lang->video->antiSteelingLink, "class='btn'") . "</div>";
    js::set('antiUrl', $antiUrl);
?>
<script>
$().ready(function()
{
  if(v.type === 'video')
  {
      $('#mainSidebar .actions').attr('class', 'actions text-center');
      $('#mainSidebar .actions').css('margin-bottom', '10px');
      $('#mainSidebar .actions').after(v.antiUrl);
  }
});
</script>
