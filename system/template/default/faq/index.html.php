{*php
/**
 * The request view file of request module of XiRangCSM.
 *
 * @copyright   Copyright 2009-2011 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     request
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include TPL_ROOT . 'common/header.html.php'}
{!js::set('show', $lang->faq->show)}
{!js::set('id', $objectID)}
{!js::set('orderBy', $orderBy)}
{$common->printPositionBar($parent, $category)}
<div class='row' >
  <div class='col-md-3'>
    <div class='panel faq-category'>
      <div class='panel-heading'><strong>{$lang->faq->category}</strong></div>
      <div class='panel-body'>
        {if(isset($config->request->categoryRule) and $config->request->categoryRule == 'global')}
          {$categories}
        {elseif($config->request->categoryRule == 'byCategory')}
          {!$control->loadModel('tree')->getTreeMenu('product', 0, array('exttreeModel', 'createFaqBrowseLink'))}
        {else}
        <ul class='tree'>
          {foreach($categories as $id => $category)}
            <li>
              {if(isset($config->request->categoryRule) and $config->request->categoryRule == 'byCategory')}
                {!html::a(inlink('index', "mode=byCategory&objectID=$id"), $category)}
              {elseif(isset($config->request->categoryRule) and $config->request->categoryRule == 'byProduct')}
                {!html::a(inlink('index', "mode=byProduct&objectID=$id"), $category)}
              {/if}
            </li>
          {/foreach}
        </ul>
        {/if}
      </div>
    </div>
  </div>
  <div class='col-md-9'>
    <div class='panel'>
      <div class='panel-heading'>
        <ul id='faqTab' class='nav nav-tabs'>
          <li class='faqList active'>{!html::a(inlink('index', "mode=$mode&objectID=$objectID"), $lang->faq->faqList, "data-type='internal'")}</li>
          <li class='hotFaqList'>{!html::a(inlink('index', "mode=$mode&objectID=$objectID&orderBy=views"), $lang->faq->hot, "data-type='internal'")}</li>
        </ul>
      </div>
      <table class='table table-form'>
        <tr>
          <td>
            <div id='top'>
              <h2>{$lang->faq->catalog}</h2>
                <a id='toggleToc' href='#' onclick='toggleToc()'><span>{$lang->hide}</span></a>
            </div>
            <ol class='faqList'>
              {foreach($faqs as $id => $faq)}
              <li><a href='{!echo "#faq{{$faq->id}}"}' data-id="{$faq->id}">{$faq->request}</a></li>
              {/foreach}
            </ol>
          </td>
        </tr>
      </table>  
      <table class='table table-form'>
        {foreach($faqs as $id => $faq)}
          <tr>
            <td></td>
            <td><strong id ='faq{$faq->id}'>{$faq->request}</strong></td>
          </tr>
          <tr>  
            <td></td>
            <td>{$faq->answer}<hr /></td>
          </tr>
        {/foreach}
      </table>
    </div>
  </div>
</div>
{include TPL_ROOT . 'common/footer.html.php'}
