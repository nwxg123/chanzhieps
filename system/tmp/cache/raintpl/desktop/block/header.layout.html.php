<?php if(!class_exists('raintpl')){exit;}?><?php if(!defined("RUN_MODE")){ ?>

<?php echo die(); ?>

<?php } ?>


<?php $isWidthSearchBar=$this->var['isWidthSearchBar'] = false;?>

<?php if($setting->top->right and strpos(',searchAndLogin,search,loginAndSearch,', ',' . $setting->top->right . ',') !== false){ ?>

  <?php $isWidthSearchBar=$this->var['isWidthSearchBar'] = true;?>

<?php } ?>

<?php if($setting->top->right == 'custom'){ ?>

  <?php foreach(array('searchAndLogin', 'search', 'loginAndSearch') as $searchItem): ?>

    <?php if(strpos($setting->topRightContent, strtoupper($searchItem)) !== false){ ?>

      <?php $isWidthSearchBar=$this->var['isWidthSearchBar'] = true;?>

      <?php break; ?>

<?php } ?>

  <?php endforeach; ?>

<?php } ?>

<?php $headerClass=$this->var['headerClass'] = '';;?>

<?php if($setting->bottom){ ?>

<?php $headerClass=$this->var['headerClass'] .= ' without-navbar';?>

<?php } ?>

<?php if($setting->top->right == 'custom'){ ?><?php $headerClass=$this->var['headerClass'] .= ' is-tr-custom';?>

<?php }elseif($setting->top->right == 'loginAndSearch'){ ?><?php $headerClass=$this->var['headerClass'] .= ' is-tr-login-search';?>

<?php }elseif($setting->top->right == 'searchAndLogin'){ ?><?php $headerClass=$this->var['headerClass'] .= ' is-tr-search-login';?>

<?php } ?>

<?php if(strpos(',search,searchAndLogin,loginAndSearch,', ',' . $setting->top->right . ',') !== false){ ?>

<?php $headerClass=$this->var['headerClass'] .= ' has-tr';?>

<?php } ?>

<?php if($config->template->desktop->theme != 'wide'){ ?>

<?php $headerClass=$this->var['headerClass'] .= ' is-normal-width';?>

<?php } ?>

<?php if($setting->bottom == 'navAndSearch' or ($setting->middle->center == 'nav' and $setting->middle->right == 'search')){ ?>

<?php $headerClass=$this->var['headerClass'] .= ' is-bmc-nav-search';?>

<?php } ?>

<?php if($setting->top->left == 'slogan' or $setting->topLeftContent){ ?>

<?php $headerClass=$this->var['headerClass'] .= ' has-tl';?>

<?php } ?>

<?php if($setting->middle->center == 'nav'){ ?>

<?php $headerClass=$this->var['headerClass'] .= ' is-mc-nav';?>

<?php } ?>

<header id='header' class='<?php echo $headerClass;?>'>
  <?php if($setting->top->left or $setting->top->right){ ?>

  <div id='headNav' class='<?php if($setting->top->left == 'slogan'){ ?>

<?php echo 'with-slogan'; ?>

<?php } ?>

<?php if($isWidthSearchBar){ ?>

<?php echo ' with-searchbar'; ?>

<?php } ?>'>
    <div class='row'>
      <?php if($setting->top->left == 'slogan'){ ?>

        <div id='siteSlogan' class='nobr'><span><?php echo $config->site->slogan;?></span></div>
      <?php }elseif($setting->topLeftContent){ ?>

        <div class='nobr pull-left'><span><?php echo htmlspecialchars_decode($setting->topLeftContent, ENT_QUOTES); ?></span></div>
      <?php } ?>

      <?php if($setting->top->right == 'loginAndSearch'){ ?>

        <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($model->loadModel('ui')->getEffectViewFile('default', 'block', 'searchbar'));?>

        <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($model->loadModel('ui')->getEffectViewFile('default', 'block', 'sitenav'));?>

      <?php }elseif($setting->top->right == 'searchAndLogin'){ ?>

        <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($model->loadModel('ui')->getEffectViewFile('default', 'block', 'sitenav'));?>

        <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($model->loadModel('ui')->getEffectViewFile('default', 'block', 'searchbar'));?>

      <?php }elseif($setting->top->right == 'login'){ ?>

        <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($model->loadModel('ui')->getEffectViewFile('default', 'block', 'sitenav'));?>

      <?php }elseif($setting->top->right == 'search'){ ?>

        <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($model->loadModel('ui')->getEffectViewFile('default', 'block', 'searchbar'));?>

<?php } ?>

      <?php if($setting->top->right == 'custom'){ ?>

        <?php if(strpos($setting->topRightContent, '$LOGIN') === false and strpos($setting->topRightContent, '$SEARCH') === false){ ?>

          <?php echo " <div class='custom-top-right'>" . htmlspecialchars_decode($setting->topRightContent, ENT_QUOTES) .  "</div> "; ?>

        <?php }else{ ?>

          <div class='custom-top-right'>
          <?php $loginPos=$this->var['loginPos']  = strpos($setting->topRightContent, '$LOGIN');?>

          <?php $searchPos=$this->var['searchPos'] = strpos($setting->topRightContent, '$SEARCH');?>

          <?php if($loginPos !== false and $searchPos !== false){ ?>

            <?php if($loginPos > $searchPos){ ?>

              <?php echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, $loginPos + 6), ENT_QUOTES) . "</div>"; ?>

              <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($model->loadModel('ui')->getEffectViewFile('default', 'block', 'sitenav'));?>

              <?php echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, $searchPos + 7, $loginPos - $searchPos - 7), ENT_QUOTES) . "</div>"; ?>

              <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($model->loadModel('ui')->getEffectViewFile('default', 'block', 'searchbar'));?>

              <?php echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, 0, $searchPos), ENT_QUOTES) . "</div>"; ?>

            <?php }else{ ?>

              <?php echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, $searchPos + 7), ENT_QUOTES) . "</div>"; ?>

              <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($model->loadModel('ui')->getEffectViewFile('default', 'block', 'searchbar'));?>

              <?php echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, $loginPos + 6, $searchPos - $loginPos - 6), ENT_QUOTES) . "</div>"; ?>

              <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($model->loadModel('ui')->getEffectViewFile('default', 'block', 'sitenav'));?>

              <?php echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, 0, $loginPos), ENT_QUOTES) . "</div>"; ?>

<?php } ?>

            <?php if($loginPos !== false){ ?>

              <?php echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, $loginPos + 6), ENT_QUOTES) . "</div>"; ?>

              <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($model->loadModel('ui')->getEffectViewFile('default', 'block', 'sitenav'));?>

              <?php echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, 0, $loginPos), ENT_QUOTES) . "</div>"; ?>

            <?php }else{ ?>

              <?php echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, $searchPos + 7), ENT_QUOTES) . "</div>"; ?>

              <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($model->loadModel('ui')->getEffectViewFile('default', 'block', 'searchbar'));?>

              <?php echo "<div class='custom-top-right-content'>" . htmlspecialchars_decode(substr($setting->topRightContent, 0, $searchPos), ENT_QUOTES) . "</div>"; ?>

<?php } ?>

          <?php } ?>

          </div>
        <?php } ?>

<?php } ?>

    </div>
  </div>
  <?php } ?>

  <div id='headTitle' class='<?php if($setting->middle->center == 'nav'){ ?>

<?php echo 'with-navbar'; ?>

<?php } ?>

<?php if($setting->middle->center == 'slogan'){ ?>

<?php echo ' with-slogan'; ?>

<?php } ?> '>
    <div class='row'>
      <div id='siteTitle'>
        <?php if($setting->middle->left == 'logo'){ ?>

          <?php if($logo){ ?>

          <div id='siteLogo' data-ve='logo'><?php echo html::a(helper::createLink('index'), html::image($model->loadModel('file')->printFileURL($logo), "class='logo' alt='{$config->company->name}' title='{$config->company->name}'")); ?></div>
          <?php }else{ ?>

          <div id='siteName' data-ve='logo'><h2><?php echo html::a(helper::createLink('index'), $config->site->name); ?></h2></div>
          <?php } ?>

<?php } ?>

        <?php if($setting->middle->center == 'slogan'){ ?>

        <div id='siteSlogan' data-ve='slogan'><span><?php echo $config->site->slogan;?></span></div>
        <?php } ?>

      </div>
      <?php if($setting->middle->center == 'nav'){ ?>

      <div id='navbarWrapper'><?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($model->loadModel('ui')->getEffectViewFile('default', 'block', 'nav'));?></div>
      <?php } ?>

      <?php if($setting->middle->right == 'search' and $setting->middle->center != 'nav'){ ?>

<?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($model->loadModel('ui')->getEffectViewFile('default', 'block', 'searchbar'));?>

<?php } ?>

    </div>
  </div>
</header>
<?php if(strpos(strtolower($setting->bottom), 'nav') !== false){ ?>

<?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($model->loadModel('ui')->getEffectViewFile('default', 'block', 'nav'));?>

<?php } ?>

