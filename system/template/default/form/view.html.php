{*php
/**
 * The view view file of form module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/form/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     form 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{if(!empty($form->fullScreen))}
  {include TPL_ROOT . 'common/header.lite.html.php'}
{else}
  {include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'header')}
{/if}
{!js::set('formLayout', $control->block->getLayoutScope('form_view', $formID))}
{include TPL_ROOT . 'common/chosen.html.php'}
{include TPL_ROOT . 'common/datepicker.html.php'}
{!js::import($jsRoot . 'fingerprint/fingerprint.js')}
{!css::import($jsRoot . 'uploader/min.css')}
{!js::set('confirm', $lang->form->confirmSubmit)}
{!js::set('fullScreen', $form->fullScreen)}
{!js::set('type', $form->type)}
{!js::set('formID', $form->id)}
{if(empty($form->fullScreen))}
  {$common->printPositionBar($form)}
  <div class='row blocks' data-region='form_view-topBanner'>{$control->block->printRegion($layouts, 'form_view', 'topBanner', true)}</div>
  <div class='row' id='columns' data-form='form_view'>
    {if(!empty($layouts['form_view']['side']) and !empty($sideFloat) && $sideFloat != 'hidden')}
      <div class="col-md-{!echo 12 - $sideGrid} col-main{if($sideFloat === 'left')} {!echo ' pull-right'} {/if}">
    {else}
      <div class="col-md-12">
    {/if}
      <div class='row blocks' data-region='form_view-top'>{$control->block->printRegion($layouts, 'form_view', 'top', true)}</div>
{/if}
    <div class='article' id='form{$formID}' data-ve='form'>
      {$itemTotal = 0}
      {$pageTotal = 0}
      {if($form->denied)}
        <h1 class='text-center'>
          {$form->reason}
          {if($form->needLogin && $control->app->user->account == 'guest')}
            {!html::a($control->createLink('user', 'login', 'referer=' . helper::safe64Encode($control->server->request_uri)), $lang->login, "class='btn btn-primary'")}
          {/if}
        </h1>
      {else}
        <header>
          <h1 class='text-center'>{$form->title}</h1>
          {if($form->type == 'exam')}
            <h4 class='text-center'>
              <span class='text-danger'>{!printf($lang->form->examTips, $form->timeLimitLabel)}</span>
              <span class='timeLeft pull-right'><i class='icon icon-time'> </i>{$form->timeLeft}</span>
            </h4>
          {/if}
        </header>
        <form id='form{!md5($form->id)}' method='post' autocomplete='off'>
          {$pageTotal = count($items)}
          {foreach($items as $page => $pageItems)}
            <section class='form-content hide' id='pageContent{$page}' data-id='{$page}'>
              <div class='items'>
                {foreach($pageItems as $item)}
                  <div class='item'>
                    <div class='item-heading'>
                      {if($item->control == 'section')}
                        <h1>{$item->title}</h1>
                        <p>{$item->desc}</p>
                      {else}
                        {@$itemTotal++}
                        <h4>
                          <span class='order'>{if($pageTotal > 1 or count($pageItems) > 1)} {$itemTotal} {/if}</span>
                          {$item->title}
                          {if($form->type == 'exam' && $item->type == 'common')} ({$item->score}{$lang->formitem->scoreUnit}) {/if}
                          {if(strpos(",$item->rule,", ',notempty,') !== false)}
                            <span class='required'></span>
                          {/if}
                        </h4>
                      {/if}
                    </div>
                    {if($item->control != 'section')}
                      <div class='item-content' id='item{$item->id}'>
                        {$name = 'item' . $item->id}
                        {if($item->control == 'radio' or $item->control == 'checkbox')}
                          {$func = $item->control}
                          {if($item->optionType == 'text')} {!html::$func($name, $item->options, '', '', $item->display)} {/if}
                          {if($item->optionType == 'image')} {$control->formitem->printOptionImages($item, $name)} {/if}
                        {elseif($item->control == 'select')}
                          <div class='w-p40'>{!html::select($name, array('' => '') + $item->options, '', "class='form-control chosen'")}</div>
                        {elseif($item->control == 'input')}
                          <div class='w-p40'>
                            {$value = ''}
                            {foreach(array('realname', 'mobile', 'phone', 'email', 'address', 'qq') as $type)}
                            {if($item->type == $type)} {$value = $control->app->user->$type} {/if}
                            {/foreach}
                            {!html::input($name, $value, "class='form-control'")}
                          </div>
                        {elseif($item->control == 'date')}
                          <div class='w-p40'>{!html::input($name, '', "class='form-control form-{{$item->format}}'")}</div>
                        {elseif($item->control == 'textarea')}
                          {!html::textarea($name, '', "rows='3' class='form-control'")}
                        {/if}
                      </div>
                    {/if}
                  </div>
                {/foreach}
              </div>
            </section>
          {/foreach}
          <footer id='pageFooter'>
            <div class='col-md-12 progressbar'>
              <div class='progress'>
                <div class='progress-bar' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' style='width: 0%'></div>
              </div>
              <div class='percent text-center'></div>
            </div>
            <ul class='pager pager-justify text-center'>
              <li class='previous' title='{$lang->form->prev}'>{!html::a('javascript:;', '<i class="icon-arrow-left"></i> <span>' . $lang->form->prev. '</span>', "onclick=changePage('prev')")}</li>
              <li class='previous disabled'><a href='###'><i class='icon-arrow-left'></i>{!print($lang->form->prev)}</a></li>
              <li class='submit'>{!html::commonButton($lang->form->submit, 'btn btn-primary', "id='submit'" . (empty($form->preview) ? '' : " disabled='disabled'"))}</li>
              <li class='next' title='{$lang->form->next}'>{!html::a('javascript:;', '<span>' . $lang->form->next. '</span> <i class="icon-arrow-right"></i>', "onclick=changePage('next')")}</li>
              <li class='next disabled'><a href='###'>{!print($lang->form->next)}<i class='icon-arrow-right'></i></a></li>
            </ul>
          </footer>
        </form>
      {/if}
    </div>
{!js::set('itemTotal', $itemTotal)}
{!js::set('pageTotal', $pageTotal)}
{!js::set('page', 1)}
{if(!empty($form->fullScreen))}
  {include TPL_ROOT . 'common/footer.html.php'}
{else}
      <div class='row blocks' data-region='form_view-bottom'>{$control->block->printRegion($layouts, 'form_view', 'bottom', true)}</div>
    </div>
    {if(!empty($layouts['form_view']['side']) and !(empty($sideFloat) || $sideFloat === 'hidden'))}
      <div class='col-md-{$sideGrid} col-side'><side class='form-side blocks blocks' data-region='form_view-side'>{$control->block->printRegion($layouts, 'form_view', 'side')}</side></div>
    {/if}
  </div>
  <div class='row blocks' data-region='form_view-bottomBanner'>{$control->block->printRegion($layouts, 'form_view', 'bottomBanner', true)}</div>
  {include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'footer')}
{/if}
