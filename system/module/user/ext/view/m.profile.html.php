{*php
/**
 * The profile view file of user for mobile template of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV12 (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     user
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{!js::import($control->config->webRoot . 'js/fingerprint/fingerprint.js')}
<style>
.user-control-nav > li > a > label {margin-left: 10px; font-size: 1.2rem; background: #7fbf00; color: #fff; padding: 2px 5px; border-radius: 10px 10px; margin-bottom: 0px;}
</style>
{foreach($control->config->user->infoGroups->mobile as $group => $items)}
<ul class='nav nav-primary user-control-nav nav-stacked'>
  {$navs = explode(',', $items)}
  {foreach($navs as $nav)}
    {$url  = $control->createLink('user', 'edit', 'account=&field=' . $nav)}
    {$html = '<span>' . $user->$nav . '</span>'}
    {$certifiedHtml = ''}
    {if($nav == 'avatar')}
      {$html = html::image($config->webRoot . 'theme/mobile/common/img/default-head.png')}
      {$attr = "class='btn avatar default'"} 
    {elseif($nav == 'email')}
      {$url  = $control->createLink('user', 'setemail', 'account=&field=' . $nav)}
      {$attr = "class='btn default' data-toggle='modal'"} 
      {if($user->emailCertified)}
        {$certifiedHtml = "<label class='certified'>" . $lang->user->certified . "</label>"}
      {/if}
    {elseif($nav == 'mobile')}
      {if(commonModel::isAvailable('mobileCertify'))}
        {$url  = $control->createLink('user', 'setmobile', 'account=&field=' . $nav)}
        {$attr = "class='btn default' data-toggle='modal'"} 
        {if($user->mobileCertified)}
          {$certifiedHtml = "<label class='certified'>" . $lang->user->certified . "</label>"}
        {/if}
      {else}
        {$attr = "class='btn default'"} 
      {/if}
    {else}
      {$attr = "class='btn default'"} 
    {/if}
    <li>{!html::a($url, $lang->user->$nav . $certifiedHtml . '<i class="icon-chevron-right"></i>' . $html, $attr)}</li>
  {/foreach}
</ul>
{/foreach}{include TPL_ROOT . 'common/form.html.php'}
