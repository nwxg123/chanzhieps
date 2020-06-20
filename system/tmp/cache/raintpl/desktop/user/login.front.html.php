<?php if(!class_exists('raintpl')){exit;}?><?php if(!defined("RUN_MODE")){ ?>

<?php echo die(); ?>

<?php } ?>

<?php $formOnly=$this->var['formOnly'] = (isset($control->config->site->front) and $control->config->site->front == 'login');?>

<?php if($formOnly){ ?>

  <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'common', 'header.lite'));?>

<?php }else{ ?>

  <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'common', 'header'));?>

<?php } ?>

<?php echo js::import($jsRoot . 'md5.js'); ?>

<?php echo js::import($jsRoot . 'fingerprint/fingerprint.js'); ?>

<?php echo js::set('random', $control->session->random); ?>

<div class='panel panel-body' id='login'>
  <div class='row'>
    <div class='panel' id='login-pure'>
      <div id='login-region'>
        <div class='panel-heading'><span><?php echo $lang->user->login->welcome;?></span></div>
        <div class='panel-body'>
          <form method='post' id='ajaxForm' role='form' data-checkfingerprint='1'>
            <div class='form-group hiding'><div id='formError' class='alert alert-danger'></div></div>
            <div class='form-group'><?php echo html::input('account','',"placeholder='{$lang->user->inputAccountOrEmail}' class='form-control input-lg'"); ?></div>
            <div class='form-group'><?php echo html::password('password','',"placeholder='{$lang->user->inputPassword}' class='form-control input-lg'"); ?></div>
            <?php if(zget($control->config->site, 'captcha', 'auto') == 'open'){ ?>

            <div class='form-group'>
              <div class='row' id='captchaBox'><?php echo $control->loadModel('guarder')->create4Comment(false); ?></div>
            </div>
            <?php } ?>

            <?php echo html::submitButton($lang->user->login->common, 'btn btn-primary btn-wider btn-lg btn-block'); ?> 
            <?php echo html::hidden('referer', $referer); ?>

            <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw(TPL_ROOT . 'user/oauthlogin.html.php');?>

            <span class='regAndReset pull-right'>
            <?php if($config->mail->turnon and $control->config->site->resetPassword == 'open'){ ?>

              <?php echo html::a(inlink('resetpassword'), $lang->user->recoverPassword, "id='reset-pass'"); ?>

<?php } ?>

            <?php if(!$formOnly){ ?>

              <?php echo html::a(inlink('register'), $lang->user->register->instant, "id='register'"); ?>

<?php } ?>

            </span>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php if($formOnly){ ?>

  <?php if($config->debug){ ?>

    <?php echo js::import($jsRoot . 'jquery/form/min.js'); ?>

<?php } ?>

  <?php if(isset($pageJS)){ ?>

    <?php echo js::execute($pageJS); ?>

<?php } ?>

  <style>
    html{height: 100%}
    body{height: 100%}
    #login{height: 100%; background-color: #F7F7F7; box-shadow: none; margin: 0; border: none;}
  </style>
  </body>
  </html>
<?php }else{ ?>

  <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'common', 'footer'));?>

<?php } ?>

