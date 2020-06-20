<?php if(!class_exists('raintpl')){exit;}?><?php if(!defined("RUN_MODE")){ ?>

<?php echo die(); ?>

<?php } ?>

<?php foreach($control->lang->user->oauth->providers as $providerCode => $providerName): ?>

  <?php if(isset($config->oauth->$providerCode)){ ?> 
    <?php $providerConfig["$providerCode"] = json_decode($config->oauth->$providerCode);?>

<?php } ?>

<?php endforeach; ?>

<?php if(!empty($providerConfig)){ ?>

  <span class='span-oauth'>
    <span class='login-heading'><?php echo $control->lang->user->oauth->lblOtherLogin;?></span>
    <?php foreach($control->lang->user->oauth->providers as $providerCode => $providerName): ?>

      <?php $providerConfig=$this->var['providerConfig'] = isset($config->oauth->$providerCode) ? json_decode($config->oauth->$providerCode) : '';?>

      <?php if(empty($providerConfig->clientID)){ ?>

<?php continue; ?>

<?php } ?>

      <?php $params=$this->var['params'] = "provider=$providerCode&fingerprint=fingerprintval";?>

      <?php if($referer and !strpos($referer, 'login') and !strpos($referer, 'oauth')){ ?>

        <?php $params=$this->var['params'] .= "&referer=" . helper::safe64Encode($referer);?>

<?php } ?>

      <?php echo html::a(helper::createLink('user', 'oauthLogin', $params), html::image(getWebRoot() . "theme/default/default/images/main/{$providerCode}" . 'login.png', "class='$providerCode'"), "class='btn-oauth'"); ?>

    <?php endforeach; ?>

  </span>
<?php } ?>

<script>
$().ready(function()
{
    $('a.btn-oauth').each(function()
    {
        fingerprint = getFingerprint();
        $(this).attr('href', $(this).attr('href').replace('fingerprintval', fingerprint) )
    })
});
</script>
<style>
.span-oauth {margin: 0; line-height:30px;}
.span-oauth a{margin: 0 3px; }
.span-oauth a > img{height: 24px; width:24px;}
.span-oauth a > img.qq{height: 18px; width:18px;}
</style>
