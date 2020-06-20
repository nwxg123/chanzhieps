<?php if(!defined("RUN_MODE")) die();?>
<script>
$(document).on('click', '.plus1', function()
{
    $(this).parents('.liGrade1').after($('#grade1NavSource').html());
});

/* add grade2 memu options */
$(document).on('click', '.plus2', function()
{
    var container = $(this).parents('.liGrade2');
    if(0 == container.size())
    {
        $(this).parents('.liGrade1').find('.ulGrade2').show().prepend($('#grade2NavSource ul').html());
    }
    else
    {
        $(this).parent().after($('#grade2NavSource ul').html());
    }
});

/* delete nav. */
$(document).on('click', '.delete', function()
{
    var navCount = $(this).parent().is('.liGrade1') && $('.navList .liGrade1').size();

    if(navCount == 1)
    {
        bootbox.alert(v.cannotRemoveAll);
    }
    else
    {
        $(this).parent().parent().parent().remove();
    }
});
</script>
<tr>
  <th><?php echo $lang->block->navPosition;?></th>
  <td class='form-inline' colspan='2'>
    <ul class='navList ulGrade1' id='navList'>
      <?php
      $navs = isset($block->content->nav) ? $block->content->nav : $this->loadModel('nav')->getDefault('desktop_bottom');
      foreach($navs as $nav)
      {
          echo "<li class='liGrade1'>";
          echo $this->loadModel('nav')->createEntry(1, $nav, 'desktop_bottom');
          echo "<ul class='ulGrade2'>";
          if(isset($nav->children))
          {
              foreach($nav->children as $nav2)
              {
                  echo "<li class='liGrade2'>";
                  echo $this->nav->createEntry(2, $nav2, 'desktop_bottom');
                  echo '</li>';
              }
          }
          echo '</ul>';
          echo '</li>';
      }
      ?>
    </ul>
  </td>
</tr>