<?php
/**
 * The create view file of article module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com> 
 * @package     article
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../../common/view/header.admin.html.php';?>
<?php include '../../../common/view/datepicker.html.php';?>
<?php include '../../../common/view/kindeditor.html.php';?>  
<?php js::set('type', $type);?>
<?php js::set('categoryID', $currentCategory);?>
<?php $colorPlates = helper::getColorPlates($lang->colorPlates);?>
<section class='main-form'>
  <header>
    <ol class="breadcrumb">
      <li><?php commonModel::printLink('article', 'admin', "type={$type}", $lang->$type->common);?></li>
      <li class="active">
        <?php echo $type == 'blog' ? $lang->blog->create : ($type == 'page' ? $lang->page->create : $lang->article->create);?>
      </li>
    </ol>
  </header>
  <form method='post' role='form' id='ajaxForm'>
    <table class='table table-form'>
      <tr><th class='w-80px'></th><td class='w-p25'></td><td class='w-p25'></td><td class='w-p50'></td></tr>
      <tr>
        <th class='w-80px'><?php echo $lang->article->title;?></th>
        <td colspan='2'>
          <div class='input-group'>
            <div class='input-control has-icon-right'>
              <?php if($type != 'video'):?>
              <div class='colorpicker input-control-icon-right'>
                <button type='button' class='btn btn-link dropdown-toggle' data-toggle='dropdown'><span class='cp-title'></span><span class='color-bar'></span><i class='ic'></i></button>
                <ul class='dropdown-menu clearfix'>
                  <li class='heading'><?php echo $lang->color;?><i class='icon icon-close'></i></li>
                </ul>
                <input type='hidden' class='colorpicker' id='titleColor' name='titleColor' value='' data-colors='<?php echo $colorPlates;?>' data-icon='palette' data-wrapper='input-control-icon-right' data-update-color='#title'  data-provide='colorpicker'>
              </div>
              <?php endif;?>
              <?php echo html::input('title', '', "class='form-control'");?>
            </div>
            <?php if(strpos('page,video', $type) !== false):?>
            <div class='table-col w-120px'>
              <div class='input-group'>
                <span class="input-group-addon fix-border"><?php echo $lang->article->order;?></span>
                <?php echo html::input('order', $order, "class='form-control'");?>
              </div>
            </div>
            <?php endif;?>
            <?php if($type != 'video'):?>
            <div class="input-group-addon w-70px">
              <div class="checkbox-primary">
                <input type="checkbox" name="isLink" value="1" id="isLink"><label for="isLink" class="no-margin"><?php echo $lang->article->isLink;?></label>
              </div>
            </div>
            <?php endif;?>
          </div>
        </td>
        <td></td>
      </tr>
      <tbody class='articleInfo'>
        <tr>
          <th><?php echo $lang->article->alias;?></th>
          <td colspan='2'>
            <div class='input-group'>
              <?php if($type == 'page'):?>
              <span class="input-group-addon"><?php echo isset($this->config->site->scheme) ? $this->config->site->scheme: "http"?>://<?php echo $this->server->http_host . $config->webRoot?>page/</span>
              <?php else:?>
              <span class="input-group-addon"><?php echo isset($this->config->site->scheme) ? $this->config->site->scheme: "http"?>://<?php echo $this->server->http_host . $config->webRoot . $type?>/</span>
              <?php endif;?>
              <?php echo html::input('alias', '', "class='form-control' placeholder='{$lang->alias}'");?>
              <span class="input-group-addon w-70px">-id.html</span>
            </div>
          </td>
          <td></td>
        </tr>
      </tbody>
      <?php if($type != 'video'):?>
      <tr class='link'>
        <th><?php echo $lang->article->link;?></th>
        <td colspan='2'>
          <div class='required required-wrapper'></div>
          <?php echo html::input('link', '', "class='form-control' placeholder='{$lang->article->placeholder->link}'");?>
        </td>
        <td></td>
      </tr>
      <?php endif;?>
      <?php if($type != 'page'):?>
      <tr>
        <th><?php echo $lang->article->category;?></th>
        <td colspan='2'><?php echo html::select("categories[]", $categories, $currentCategory, "multiple='multiple' class='form-control chosen'");?></td>
        <td></td>
      </tr>
      <tbody class='articleInfo'> 
        <tr>
          <th><?php echo $lang->article->author;?></th>
          <td><?php echo html::input('author', $app->user->realname, "class='form-control'");?></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->article->source;?></th>
          <?php array_pop($lang->article->sourceList);?>
          <td><?php echo html::select('source', $lang->article->sourceList, 'original', "class='form-control chosen'");?></td>
          <td>
            <div class='row' id='copyBox'>
              <div class='col-sm-4'><?php echo html::input('copySite', '', "class='form-control' placeholder='{$lang->article->copySite}'");?></div>
              <div class='col-sm-8'><?php echo html::input('copyURL',  '', "class='form-control' placeholder='{$lang->article->copyURL}'");?></div>
            </div>
          </td>
          <td></td>
        </tr>
      </tbody>
      <?php endif; ?>
      <tbody class='articleInfo'>
        <tr>
          <th><?php echo $lang->article->keywords;?></th>
          <td colspan='2'><?php echo html::input('keywords', '', "class='form-control' placeholder='{$lang->keywordsHolder}'");?></td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->article->summary;?></th>
          <td colspan='2'><?php echo html::textarea('summary', '', "rows='2' class='form-control'");?></td>
          <td></td>
        </tr>
      </tbody>
      <tbody class='articleInfo'>
      <tr>
        <th><?php echo $lang->article->content;?></th>
        <td colspan='3'> <?php echo html::textarea('content', '', "rows='20' class='form-control'");?> </td>
      </tr>
      <?php if($type == 'video'):?>
      <tr class='required'>
        <th><?php echo $lang->video->link;?></th>
        <td colspan='3'>
          <div class='row'>
            <div class='col-sm-5'>
              <?php echo html::input('videoLink', '', "class='form-control' placeholder='{$lang->video->linkTips}'");?>
            </div>
            <div class='col-sm-1'>
              <?php commonModel::printLink('video', 'upload', "uid=$uid", $lang->video->uploadLocally, "data-toggle='modal' class='form-control' id='radius-btn'");?> 
            </div>
            <div class='col-sm-6'>
              <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->video->width;?></span>
                <?php echo html::input('width', '', "class='form-control' placeholder='{$lang->video->sizeTips}'");?>
                <span class='input-group-addon fix-border'><?php echo $lang->video->height;?></span>
                <?php echo html::input('height', '', "class='form-control' placeholder='{$lang->video->sizeTips}'");?>
                <span class="input-group-addon w-100px">
                  <label class='checkbox-inline'>
                    <input type="checkbox" name="autoplay" id="autoplay" value="1" /><span><?php echo $lang->video->autoplay;?></span>
                  </label>
                </span>
              </div>
            </div>
          </div>
        </td>
        <td></td>
      </tr>
      <?php endif;?>
      <tr>
        <th><?php echo $lang->article->status;?></th>
        <td>
          <?php foreach ($lang->article->statusList as $key => $value):?>
          <div class='radio-primary inline-block'><input type='radio' value='<?php echo $key?>' <?php if($key=='normal') echo 'checked';?> name='status' id='satus-radio-<?php echo $key;?>'><label for='satus-radio-<?php echo $key;?>'><?php echo $value;?></label></div>
          <?php endforeach;?>
        </td>
        <td></td>
      </tr>
      <tr class = 'timed'>
        <th><?php echo $lang->article->addedDate;?></th>
        <td>
          <div class='input-control has-icon-right'>
            <?php echo html::input('addedDate', date('Y-m-d H:i'), "class='form-control form-datetime' data-picker-position='top-right'");?>
            <label for="addedDate" class="input-control-icon-right"><i class="icon icon-calendar"></i></label>
          </div>
        </td>
        <td><span class="help-inline"><?php echo $lang->article->placeholder->addedDate;?></span></td>
        <td></td>
      </tr>
      <?php if($type == 'page'):?>
      <tr>
        <th></th>
        <td colspan='2'>
          <div class="checkbox-primary">
            <input type='checkbox' name='onlyBody' id='onlyBody' value='1'/><label for="onlyBody" class="no-margin"><?php echo $lang->article->onlyBody;?></label>
          </div>
        </td>
      </tr>
      <?php endif;?>
      </tbody>
      <tr>
        <td></td>
        <td colspan='3' class='text-left'>
          <?php echo html::submitButton($lang->article->publish);?>
          <?php echo html::backButton();?>
        </td>
      </tr>
    </table>
  </form>
</section>
<?php include '../../../common/view/footer.admin.html.php';?>
