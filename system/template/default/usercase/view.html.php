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
{include TPL_ROOT .'common/header.html.php'}
{$common->printPositionBar($module, $case)}
<div class='row'>
  <div class='col-md-2 side'>{include TPL_ROOT . 'usercase/blockleft.html.php'}</div>
  <div class='col-md-10'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong> {!echo $case->company . ' - ' . $case->name}</strong>
      </div>
      <div class='panel-body'>
        <section class="cards">
          {foreach($images as $image)}
            {if(strpos($image, 'upload') !== false)}
              <div class="col-md-3 card-item">
                {!html::a($image, html::image($image), "class='card'data-toggle='lightbox' data-group='image-group-1'")}
              </div>
            {else}
              {$image = '//snap.cnezsoft.com' . $image}
              <div class="col-md-3 card-item">
                {!html::a($image, html::image($image), "class='card'data-toggle='lightbox' data-group='image-group-1'")}
              </div>
            {/if}
          {/foreach}
        </section>
        <div class='content-box'>
          <table class='table table-borderless table-condensed'>
            <tr>
              <td class='w-70px'>{$lang->usercase->company}</td>
              <td class='text-left'>{$case->company}</td>
            </tr>
            <tr>
              <td class='w-70px'>{$lang->usercase->industry}</td>
              <td class='text-left'>{!isset($industries[$case->industry]) ? $industries[$case->industry] : ''}</td>
            </tr>
            <tr>
              <td class='w-70px'>{$lang->usercase->area}</td>
              <td class='text-left'>{$control->usercase->formatArea($case->area)}</td>
            </tr>
            <tr>
              <td class='w-70px'>{$lang->usercase->site}</td>
              <td class='text-left'>{if(strpos($case->site, 'http') !== false and strpos($case->site, '<a') === false)} {!html::a($case->site, $case->site)} {/if}</td>
            </tr>
            {if(!empty($case->keywords))}
              <tr>
                <td class='w-70px'>{$lang->usercase->keywords}</td>
                <td class='text-left'>{$case->keywords}</td>
              </tr>
            {/if}
          </table>
          <div class='desc'>{!htmlspecialchars_decode($case->desc)}</div>
        </div>
      </div>
    </div>
  </div>
</div>
{$control->fetch('message', 'comment', "object=usercase&id=$case->id")}
{include TPL_ROOT .'common/footer.html.php'}
