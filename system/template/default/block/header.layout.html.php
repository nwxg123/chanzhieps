{if(!defined("RUN_MODE"))} {!die()} {/if}
{*php
/**
 * The header view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV12 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
*/
*}
{$isWidthSearchBar = false}
{if($setting->top->right and strpos(',searchAndLogin,search,loginAndSearch,', ',' . $setting->top->right . ',') !== false)}
  {$isWidthSearchBar = true}
{/if}
{if($setting->top->right == 'custom')}
  {foreach(array('searchAndLogin', 'search', 'loginAndSearch') as $searchItem)}
    {if(strpos($setting->topRightContent, strtoupper($searchItem)) !== false)}
      {$isWidthSearchBar = true}
      {break}
    {/if}
  {/foreach}
{/if}
{$headerClass = '';}
{if($setting->bottom)}{$headerClass .= ' without-navbar'}{/if}
{if($setting->top->right == 'custom')}{$headerClass .= ' is-tr-custom'}
{elseif($setting->top->right == 'loginAndSearch')}{$headerClass .= ' is-tr-login-search'}
{elseif($setting->top->right == 'searchAndLogin')}{$headerClass .= ' is-tr-search-login'}
{/if}
{if(strpos(',search,searchAndLogin,loginAndSearch,', ',' . $setting->top->right . ',') !== false)}{$headerClass .= ' has-tr'}{/if}
{if($config->template->desktop->theme != 'wide')}{$headerClass .= ' is-normal-width'}{/if}
{if($setting->bottom == 'navAndSearch' or ($setting->middle->center == 'nav' and $setting->middle->right == 'search'))}{$headerClass .= ' is-bmc-nav-search'}{/if}
{if($setting->top->left == 'slogan' or $setting->topLeftContent)}{$headerClass .= ' has-tl'}{/if}
{if($setting->middle->center == 'nav')}{$headerClass .= ' is-mc-nav'}{/if}
<header id='header' class='{$headerClass}'>
  {if($setting->top->left or $setting->top->right)}
  <div id='headNav' class='{if($setting->top->left == 'slogan')} {!echo 'with-slogan'} {/if} {if($isWidthSearchBar)} {!echo ' with-searchbar'} {/if}'>
    <div class='row'>
      {if($setting->top->left == 'slogan')}
        <div id='siteSlogan' class='nobr'><span>{$config->site->slogan}</span></div>
      {elseif($setting->topLeftContent)}
        <div class='nobr pull-left'><span>{!htmlspecialchars_decode($setting->topLeftContent, ENT_QUOTES)}</span></div>
      {/if}
      {if($setting->top->right == 'loginAndSearch')}
        {include $model->loadModel('ui')->getEffectViewFile('default', 'block', 'searchbar')}
        {include $model->loadModel('ui')->getEffectViewFile('default', 'block', 'sitenav')}
      {elseif($setting->top->right == 'searchAndLogin')}
        {include $model->loadModel('ui')->getEffectViewFile('default', 'block', 'sitenav')}
        {include $model->loadModel('ui')->getEffectViewFile('default', 'block', 'searchbar')}
      {elseif($setting->top->right == 'login')}
        {include $model->loadModel('ui')->getEffectViewFile('default', 'block', 'sitenav')}
      {elseif($setting->top->right == 'search')}
        {include $model->loadModel('ui')->getEffectViewFile('default', 'block', 'searchbar')}
      {/if}
      {if($setting->top->right == 'custom')}
        {if(strpos($setting->topRightContent, '$LOGIN') === false and strpos($setting->topRightContent, '$SEARCH') === false)}
          {!echo " <div class='custom-top-right'>" . htmlspecialchars_decode($setting->topRightContent, ENT_QUOTES) .  "</div> "}
        {else}
          <div class='custom-top-right'>
          {$loginPos  = strpos($setting->topRightContent, '$LOGIN')}
          {$searchPos = strpos($setting->topRightContent, '$SEARCH')}
          {if($loginPos !== false and $searchPos !== false)}
            {if($loginPos > $searchPos)}
              {!echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, $loginPos + 6), ENT_QUOTES) . "</div>"}
              {include $model->loadModel('ui')->getEffectViewFile('default', 'block', 'sitenav')}
              {!echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, $searchPos + 7, $loginPos - $searchPos - 7), ENT_QUOTES) . "</div>"}
              {include $model->loadModel('ui')->getEffectViewFile('default', 'block', 'searchbar')}
              {!echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, 0, $searchPos), ENT_QUOTES) . "</div>"}
            {else}
              {!echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, $searchPos + 7), ENT_QUOTES) . "</div>"}
              {include $model->loadModel('ui')->getEffectViewFile('default', 'block', 'searchbar')}
              {!echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, $loginPos + 6, $searchPos - $loginPos - 6), ENT_QUOTES) . "</div>"}
              {include $model->loadModel('ui')->getEffectViewFile('default', 'block', 'sitenav')}
              {!echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, 0, $loginPos), ENT_QUOTES) . "</div>"}
            {/if}
            {if($loginPos !== false)}
              {!echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, $loginPos + 6), ENT_QUOTES) . "</div>"}
              {include $model->loadModel('ui')->getEffectViewFile('default', 'block', 'sitenav')}
              {!echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, 0, $loginPos), ENT_QUOTES) . "</div>"}
            {else}
              {!echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, $searchPos + 7), ENT_QUOTES) . "</div>"}
              {include $model->loadModel('ui')->getEffectViewFile('default', 'block', 'searchbar')}
              {!echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, 0, $searchPos), ENT_QUOTES) . "</div>"}
            {/if}
          {/if}
          </div>
        {/if}
      {/if}
    </div>
  </div>
  {/if}
  <div id='headTitle' class='{if($setting->middle->center == 'nav')} {!echo 'with-navbar'} {/if} {if($setting->middle->center == 'slogan')} {!echo ' with-slogan'} {/if} '>
    <div class='row'>
      <div id='siteTitle'>
        {if($setting->middle->left == 'logo')}
          {if($logo)}
          <div id='siteLogo' data-ve='logo'>{!html::a(helper::createLink('index'), html::image($model->loadModel('file')->printFileURL($logo), "class='logo' alt='{{$config->company->name}}' title='{{$config->company->name}}'"))}</div>
          {else}
          <div id='siteName' data-ve='logo'><h2>{!html::a(helper::createLink('index'), $config->site->name)}</h2></div>
          {/if}
        {/if}
        {if($setting->middle->center == 'slogan')}
        <div id='siteSlogan' data-ve='slogan'><span>{$config->site->slogan}</span></div>
        {/if}
      </div>
      {if($setting->middle->center == 'nav')}
      <div id='navbarWrapper'>{include $model->loadModel('ui')->getEffectViewFile('default', 'block', 'nav')}</div>
      {/if}
      {if($setting->middle->right == 'search' and $setting->middle->center != 'nav')} {include $model->loadModel('ui')->getEffectViewFile('default', 'block', 'searchbar')} {/if}
    </div>
  </div>
</header>
{if(strpos(strtolower($setting->bottom), 'nav') !== false)} {include $model->loadModel('ui')->getEffectViewFile('default', 'block', 'nav')} {/if}
