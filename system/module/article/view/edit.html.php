<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The edit view file of article module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     article
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<?php js::set('type',$type);?>
<?php $colorPlates = helper::getColorPlates($lang->colorPlates);?>
<section class='main-form'>
  <header>
    <ol class="breadcrumb">
      <li><?php echo $article->title;?></li>
      <li class="active">
        <?php echo $type == 'blog' ? $lang->blog->edit : ($type == 'page' ? $lang->page->edit : $lang->article->edit);?>
      </li>
    </ol>
  </header>
  <form method='post' id='ajaxForm' class='ve-form'>
    <table class='table table-form'>
      <tr><th class='w-80px'></th><td class='w-p25'></td><td class='w-p25'></td><td class='w-p50'></td></tr>
      <tr>
        <th class='w-80px'><?php echo $lang->article->title;?></th>
        <td colspan='2'>
          <div class='input-group'>
            <div class='input-control has-icon-right'>
              <div class='colorpicker input-control-icon-right'>
                <button type='button' class='btn btn-link dropdown-toggle' data-toggle='dropdown'><span class='cp-title'></span><span class='color-bar'></span><i class='ic'></i></button>
                <ul class='dropdown-menu clearfix'>
                  <li class='heading'><?php echo $lang->color;?><i class='icon icon-close'></i></li>
                </ul>
                <input type='hidden' class='colorpicker' id='titleColor' name='titleColor' value='<?php echo $article->titleColor;?>' data-colors='<?php echo $colorPlates;?>' data-icon='palette' data-wrapper='input-control-icon-right' data-update-color='#title'  data-provide='colorpicker'>
              </div>
              <?php echo html::input('title', $article->title, "class='form-control'");?>
            </div>
            <?php if($type == 'page'):?>
            <div class='table-col w-120px'>
              <div class='input-group'>
                <span class="input-group-addon fix-border"><?php echo $lang->article->order;?></span>
                <?php echo html::input('order', $article->order == '0' ? $article->id : $article->order, "class='form-control'");?>
              </div>
            </div>
            <?php endif;?>
            <div class="input-group-addon w-70px">
              <div class="checkbox-primary">
                <?php $checked = $article->link ? 'checked' : '';?>
                <input type="checkbox" name="isLink" value="1" id="isLink" <?php echo $checked?>><label for="isLink" class="no-margin"><?php echo $lang->article->isLink;?></label>
              </div>
            </div>
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
              <?php echo html::input('alias', $article->alias, "class='form-control' placeholder='{$lang->alias}'");?>
              <span class='input-group-addon w-70px'>-<?php echo $article->id?>.html</span>
            </div>
          </td>
          <td></td>
        </tr>
      </tbody>
      <tr class='link'>
        <th><?php echo $lang->article->link;?></th>
        <td colspan='2'>
          <div class='required required-wrapper'></div>
          <?php echo html::input('link', $article->link, "class='form-control' placeholder='{$lang->article->placeholder->link}'");?>
        </td>
        <td></td>
      </tr>
      <?php if($type != 'page'):?>
      <tr>
        <th><?php echo $lang->article->category;?></th>
        <td colspan='2'><?php echo html::select("categories[]", $categories, array_keys($article->categories), "multiple='multiple' class='form-control chosen'");?></td>
        <td></td>
      </tr>
      <tbody class='articleInfo'>
      <tr>
        <th><?php echo $lang->article->author;?></th>
        <td><?php echo html::input('author', $article->author, "class='form-control'");?></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->article->source;?></th>
        <?php if($article->source != 'article') array_pop($lang->article->sourceList);?>
        <td><?php echo html::select('source', $lang->article->sourceList, $article->source, "class='form-control chosen'");?></td>
        <td>
          <div id='copyBox' class='row'>
            <div class='col-sm-4'><?php echo html::input('copySite', $article->copySite, "class='form-control' placeholder='{$lang->article->copySite}'"); ?> </div>
            <div class='col-sm-8'><?php echo html::input('copyURL',  $article->copyURL, "class='form-control' placeholder='{$lang->article->copyURL}'"); ?></div>
          </div>
        </td>
        <td></td>
      </tr>
      </tbody>
      <?php endif; ?>
      <tbody class='articleInfo'>
      <tr>
        <th><?php echo $lang->article->keywords;?></th>
        <td colspan='2'> <?php echo html::input('keywords', $article->keywords, "class='form-control' placeholder='{$lang->keywordsHolder}'");?></td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->article->summary;?></th>
        <td colspan='2'><?php echo html::textarea('summary', $article->summary, "rows='2' class='form-control'");?></td>
        <td></td>
      </tr>
      </tbody>
      <tbody class='articleInfo'>
      <tr>
        <th><?php echo $lang->article->content;?></th>
        <td colspan='3'><?php echo html::textarea('content', htmlspecialchars($article->content), "rows='20' class='form-control'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->article->status;?></th>
        <td>
          <?php foreach ($lang->article->statusList as $key => $value):?>
          <div class='radio-primary inline-block'><input type='radio' value='<?php echo $key?>' name='status' id='satus-radio-<?php echo $key;?>' <?php if($key == $article->status) echo 'checked="checked"';?>><label for='satus-radio-<?php echo $key;?>'><?php echo $value;?></label></div>
          <?php endforeach;?>
        </td>
      </tr>
      <tr class = 'timed'>
        <th><?php echo $lang->article->addedDate;?></th>
        <td>
          <div class='input-control has-icon-right'>
            <?php echo html::input('addedDate', formatTime($article->addedDate), "class='form-control form-datetime' data-picker-position='top-right'");?>
            <label for="addedDate" class="input-control-icon-right"><i class="icon icon-calendar"></i></label>
          </div>
        </td>
        <td><span class='help-inline'><?php echo $lang->article->placeholder->addedDate;?></span></td>
        <td></td>
      </tr>
      <?php if($type == 'page'):?>
      <tr>
        <th></th>
        <?php $checked = $article->onlyBody ? 'checked' : '';?>
        <td colspan='2'>
          <div class="checkbox-primary">
            <input type='checkbox' name='onlyBody' id='onlyBody' value='1' <?php echo $checked;?>/><label for="onlyBody" class="no-margin"><?php echo $lang->article->onlyBody;?></label>
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

<?php include '../../common/view/footer.admin.html.php';?>
