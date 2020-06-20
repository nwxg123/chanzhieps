{*php
/**
 * The deny view file of access module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     access
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include TPL_ROOT . 'common/header.lite.html.php'}
{noparse}
<style>
  .bg-primary-pale {
    text-align: center;
  }
</style>
{/noparse}
<div class='alert bg-primary-pale'>
 <h3>{$lang->access->denied}</h3>
 {foreach($access->titleList as $accessTitle)}
   <p>{$accessTitle}</p>
 {/foreach}
 <p>{!printf($lang->access->require->contactUs, helper::createLink('company', 'contact'))}</p>
 <p>
   {if(in_array('login', $access->require) or $control->app->user->account == 'guest')}
     {!html::a(helper::createLink('user', 'login'), $lang->user->login->common, "class='btn btn-primary'")}
   {else}
     {if(in_array('higherLevel', $access->require))}
       {!html::a(helper::createLink('score', 'buyScore'), $lang->score->methods['buyscore'], "class='btn primary'")}
       {!html::a(helper::createLink('user', 'logout'), $lang->user->relogin, "class='btn primary'")}
     {/if}

     {if(in_array('costScore', $access->require))}
       {!html::a(helper::createLink('score', 'buyObject', "objectType=$objectType&objectID=$objectID&objectURI=$objectURI"), $lang->access->payByScore, "class='btn primary'")}
     {/if}

     {if(in_array('certification', $access->require) !== false)}
       {!html::a(helper::createLink('user', 'certify'), $lang->user->certification, "class='btn primary'")}
     {/if}
   {/if}
 
 {!html::a(getHomeRoot(), $lang->score->goHome, "class='btn default'")}
 </p>
</div>
</body>
</html>
