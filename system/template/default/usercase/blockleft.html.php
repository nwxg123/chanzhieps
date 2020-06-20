<div class='panel' id="usercaseSide">
  <div class='panel-heading'>
    <ul id="typeNav" class="nav nav-tabs">
      <li data-type="internal" class="active"> <a href='###'>{$lang->usercase->byIndustry}</a> </li>
      <li data-type="internal"> <a href='###'>{$lang->usercase->byArea}</a> </li>
    </ul>
  </div>
  <div class='panel-body f-14px'>
    {$aliases = $control->dao->select('id,alias')->from(TABLE_CATEGORY)->where('type')->eq('usercase')->fetchPairs()}
    {foreach($industries as $industryID => $industryName)}
      {$industryID = empty($aliases[$industryID]) ? $industryID : $aliases[$industryID]}
      {!html::a(inlink('browse', "type=industry&id=$industryID"), trim($industryName, '/'))}<br />
    {/foreach}
    {!html::a(inlink('index'), $lang->usercase->allIndustry, "class='red'")}
    {!html::a(inlink('report', 'type=industry'), $lang->usercase->industryReport, "class='report'")}
  </div>
  <div class='panel-body f-14px'>
    {$i = 1}
    {foreach($lang->usercase->areas as $areaCode => $areaName)} 
      {!html::a(inlink('browse', "type=area&code=$areaCode"), $control->usercase->formatArea($areaCode))}
      {if($i % 4 == 0)} <br /> {/if}
      {@$i ++}
    {/foreach}
    <br />
    {!html::a(inlink('index'), $lang->usercase->allArea, "class='red'")}
    {!html::a(inlink('report', 'type=area'), $lang->usercase->areaReport, "class='report'")}
  </div>
</div>
{noparse}
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
{/noparse}
