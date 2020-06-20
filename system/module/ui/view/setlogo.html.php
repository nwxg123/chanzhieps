<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The logo view file of ui module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     ui
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<div id='setLogo' class='component'>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><i class='icon-certificate'></i> <?php echo $lang->ui->setLogo;?></strong>
    </div>
    <div class='panel-body row-logo'>
      <form method='post' id='logoForm' enctype='multipart/form-data' action='<?php echo $this->createLink('ui', 'setLogo');?>'>
        <div class='box'>
          <div class='card'>
          <?php if(isset($logo->webPath)) echo html::a('javascript:;', html::image($this->loadModel('file')->printFileURL($logo), "class='logo'"), "class='btn-upload'");?>
          <?php if(!isset($logo->webPath)) echo html::a('javascript:;', '<i class="icon icon-upload-cloud"></i>' . $lang->ui->uploadLogo, "class='btn btn-upload'");?>
          </div>
          <span class='actions'>
          <?php if(isset($logo->webPath)) echo html::a('javascript:;', "<i class='icon icon-lg icon-spin icon-refresh'></i><i class='icon icon-lg icon-pencil'> </i>", "class='text-info btn-editor'");?>
          <?php if(isset($logo->webPath)) commonModel::printLink('ui', 'deleteLogo', '', "<i class='icon icon-lg icon-delete'> </i>", "class='text-danger btn-deleter'");?>
          </span>
          <div class='text-important'>
            <?php if($this->app->clientDevice == 'desktop') printf($lang->ui->suitableLogoSize, '50px-80px', '80px-240px');?>
            <?php if($this->app->clientDevice == 'mobile') printf($lang->ui->suitableLogoSize, '<50px', '50px-200px');?>
            <div class='hide'><?php echo html::file('logo', "class='form-control'");?></div>
          </div>
        </div>
        <div class='box'>
          <div class='card'>
            <?php if(!empty($favicon)) $favicon->extension = 'ico';?>
            <?php
            if(isset($favicon->webPath) or $defaultFavicon)
            {
                $imagePath = isset($favicon->webPath) ? $this->loadModel('file')->printFileURL($favicon) : $config->webRoot . 'favicon.ico';
                echo html::a('javascript:;', html::image($imagePath, "class='favicon'"), "class='btn-upload'");
            }
            else
            {
                echo html::a('javascript:;', '<i class="icon icon-upload-cloud"></i>' . $lang->ui->uploadFavicon, "class='btn btn-upload'");
            }
            ?>
          </div>
          <span class='actions'>
            <?php if(isset($favicon->webPath) or $defaultFavicon) echo html::a('javascript:;', "<i class='icon icon-lg icon-pencil'> </i>", "class='btn-editor'");?>
            <?php if($favicon or $defaultFavicon) commonModel::printLink('ui', 'deleteFavicon', '', "<i class='icon icon-lg icon-delete'> </i>", "class='text-danger btn-deleter'");?>
          </span>
  
          <div class='text-important'>
          <?php $langParam = $app->clientLang == 'en' ? '&lang=en' : '';?>
          <?php printf($lang->ui->faviconHelp, "http://api.chanzhi.org/goto.php?item=help_favicon{$langParam}");?>
          </div>
          <div class='hide'><?php echo html::file('favicon', "class='form-control'");?></div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
