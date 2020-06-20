<div class='panel' id="usercaseSide">
  <div class='panel-heading'>
    <ul id="typeNav" class="nav nav-tabs">
      <li data-type="internal" class="active"> <a href='###'><?php echo $lang->usercase->byIndustry;?></a> </li>
      <li data-type="internal"> <a href='###'><?php echo $lang->usercase->byArea;?></a> </li>
    </ul>
  </div>
  <div class='panel-body f-14px'>
    <?php $aliases = $this->dao->select('id,alias')->from(TABLE_CATEGORY)->where('type')->eq('usercase')->fetchPairs();?>
    <?php foreach($industries as $industryID => $industryName):?>
      <?php $industryID = empty($aliases[$industryID]) ? $industryID : $aliases[$industryID];?>
      <?php echo html::a(inlink('browse', "type=industry&id=$industryID"), trim($industryName, '/'));?><br/>
    <?php endforeach;?>
    <?php echo html::a(inlink('index'), $lang->usercase->allIndustry, "class='red'");?>
    <?php echo html::a(inlink('report', 'type=industry'), $lang->usercase->industryReport, "class='report'");?>
  </div>
  <div class='panel-body f-14px'>
    <?php $i = 1;?>
    <?php foreach($lang->usercase->areas as $areaCode => $areaName):?> 
      <?php echo html::a(inlink('browse', "type=area&code=$areaCode"), $this->usercase->formatArea($areaCode));?>
      <?php if($i % 4 == 0) {echo '<br />';}?>
      <?php @$i ++;?>
    <?php endforeach;?>
    <br />
    <?php echo html::a(inlink('index'), $lang->usercase->allArea, "class='red'");?>
    <?php echo html::a(inlink('report', 'type=area'), $lang->usercase->areaReport, "class='report'");?>
  </div>
</div>
<style>
#usercaseSide > .panel-heading{padding:0; border:0;}
#usercaseSide > .panel-heading > ul.nav > li > a:link{font-size:14px; color:#333;}
#usercaseSide > .panel-heading > ul.nav > li:first-child > a:link{border-left:0;font-size:14px;}
#usercaseSide > .panel-heading > ul.nav > li.active > a{ font-weight:bold; border-top:none; padding-top:9px;}
a.report:link, a.report:visited, a.report:hover{ font-weight:bold; color:rgb(197, 82, 82) !important; }
</style>
<script>
$(document).ready(function()
{
    $('#usercaseSide .panel-heading li').click(function()
    {
        $('#usercaseSide .panel-heading li').removeClass('active');
        $(this).addClass('active');
        $('#usercaseSide .panel-body').hide();
        $('#usercaseSide .panel-body').eq($(this).index()).show();
    });
    $('#usercaseSide .panel-heading li').first().click();
});
</script>
