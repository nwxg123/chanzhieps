{*php
/**
 * The view file of usercase module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     usercase
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header')}
<div class='panel panel-section'>
  <div class='panel-heading'>
    <div class='title strong'>{$case->company . ' - ' . $case->name}</div>
  </div>
  <div class='panel-body'>
    {if(!empty($images))}
      {if(count($images) > 1)}
        <div id='caseSlide' class='carousel slide' data-ride='carousel'>
          <div class='carousel-inner'>
            {$imgIndex = 0}
            {$indicators = ''}
            {foreach($images as $image)}
              <div class="item{if($imgIndex === 0)} {!echo ' active'} {/if}">
                {if(strpos($image, 'upload') === false)} {$image = '//snap.cnezsoft.com' . $image} {/if}
                {!html::image($image, "alt='{{$case->name}}'")}
              </div>
              {$indicators .= "<li data-target='#caseSlide' data-slide-to='{{$imgIndex}}' class='" . ($imgIndex === 0 ? 'active' : '') . "'></li>"}
              {@$imgIndex++}
            {/foreach}
          </div>
          <ol class='carousel-indicators fix-top-right'>{$indicators}</ol>
          <a class='left carousel-control' href='#caseSlide' data-slide='prev'>
            <i class='icon icon-chevron-left'></i>
          </a>
          <a class='right carousel-control' href='#caseSlide' data-slide='next'>
            <i class='icon icon-chevron-right'></i>
          </a>
        </div>
      {else}
        <div class='text-center'>
          {$image = current($images)}
          {if(strpos($image, 'upload') === false)} {$image = '//snap.cnezsoft.com' . $image} {/if}
          {!html::image($image, "alt='{{$case->name}}'")}
        </div>
      {/if}
    {/if}

    <table class='table table-layout small'>
      <tr>
        <th>{$lang->usercase->company}</td>
        <td>{$case->company}</td>
      </tr>
      <tr>
        <th>{$lang->usercase->industry}</td>
        <td>{!isset($industries[$case->industry]) ? $industries[$case->industry] : ''}</td>
      </tr>
      <tr>
        <th>{$lang->usercase->area}</td>
        <td>{$control->usercase->formatArea($case->area)}</td>
      </tr>
      <tr>
        <th>{$lang->usercase->site}</td>
        <td>{if(strpos($case->site, 'http') !== false && strpos($case->site, '<a') === false)} {!html::a($case->site, $case->site)} {/if}</td>
      </tr>
      {if(!empty($case->keywords))}
      <tr>
        <th>{$lang->usercase->keywords}</td>
        <td>{$case->keywords}</td>
      </tr>
      {/if}
      {if(!empty($case->desc))}
      <tr><td colspan='2'>{!htmlspecialchars_decode($case->desc)}</td></tr>
      {/if}
    </table>
  </div>
</div>
{if(commonModel::isAvailable('message'))}
  <div id='commentBox'> {$control->fetch('message', 'comment', "objectType=usercase&objectID={{$case->id}}")} </div>
{/if}
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
