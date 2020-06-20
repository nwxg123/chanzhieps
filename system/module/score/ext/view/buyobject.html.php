{*php
/**
 * The buy object view file of score module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     score
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include TPL_ROOT . 'common/header.lite.html.php'}
{noparse}
<style>
  .bg-danger-pale {
    text-align: center;
  }
</style>
{/noparse}
  <div class='alert alert-danger bg-danger-pale' style='margin:0'>
    <h4>{$lang->score->costFail}</h4>
    <p> {if($score < $cost)} {!printf($lang->score->insufficient, $cost, $score)} {/if}</p>
    <p>
     {!html::a('', $lang->refresh, "class='btn primary' ")}
     {!html::a($control->createLink('score', 'buyScore'), $lang->user->buyScore, "target='_blank' class='btn primary' ")}
     {!html::a($control->createLink('score', 'rule'), $lang->score->getScore, "target='_blank' class='btn primary'")}
     {!html::a(getHomeRoot(), $lang->score->goHome, "class='btn primary'")}
    </p>
  </div>
</body>
</html>
