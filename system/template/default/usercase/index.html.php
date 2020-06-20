{include TPL_ROOT . 'common/header.html.php'}
{$moduleVar = isset($module) ? $module : ''; $common->printPositionBar($moduleVar)}
<div class='row'>
  <div class='col-md-2 side'>{include TPL_ROOT . 'usercase/blockleft.html.php'}</div>
  <div class='col-md-10'>
    <div class='panel'>
      <div class='panel-body'>
          <section id="caseMode" class='cards cards-borderless'>
            {foreach($cases as $case)}
              <div class='col-sm-4 col-xs-6'>
                <div class='card'>
                  {!html::a(inlink('view', "id=$case->id"), html::image($config->usercase->snapURL . $case->image->primary, "alt='{{$case->company}}' height='300'"), "class='media-wrapper'")}
                  <div class='card-heading'>
                    <span class='pull-right'>
                      <i class="icon icon-eye-open"></i> {$case->views}
                    </span>
                    <span class='pull-left w-p80 text-nowrap text-ellipsis'>
                    {!html::a(inlink('view', "id={{$case->id}}"), '<strong>' . $case->company . '</strong>')}
                    </span>
                  </div>
                </div>
              </div>
            {/foreach}
          </section>
      </div>
      <div>{$pager->show('right', 'short')}</div>
    </div>
  </div>
</div>
{include TPL_ROOT . 'common/footer.html.php'}
