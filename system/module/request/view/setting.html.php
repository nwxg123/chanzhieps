<?php if(isset($menuGroup)) js::set('menuGroup', $menuGroup);?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-body'>
    <form id='ajaxForm' method='post' class='form-inline'>
      <table class='table table-form'>
        <tr>
          <th class='w-120px requestTitle'><?php echo $lang->request->categoryRule;?></th>
          <td colspan='2'><?php echo html::radio('categoryRule', $lang->request->categoryRuleList, $category);?></td>
        </tr>
        <tr>
          <th class='w-120px requestTitle'><?php echo $lang->request->defaultTime;?></th>
          <td class='w-140px'>
            <div class='input-group'>
            <?php echo html::input('defaultTime', zget($this->config->request, 'defaultTime', ''), "class='form-control'");?>
            <span class='input-group-addon'><?php echo $lang->request->year;?></span>
            </div>
          </td>
          <td></td>
        </tr>
        <tr>
          <th></th>
          <td><?php echo html::submitButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
