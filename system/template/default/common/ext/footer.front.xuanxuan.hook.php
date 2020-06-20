<?php if(!empty($config->xuanxuan->status)):?>
<style>
#xuanxuanDocker {position: fixed; top: 50%; margin-top: 5px; right: 0;}
#xuanxuanBtn {border-radius: 4px 0 0 4px; margin-top: 2px; padding: 8px 12px; display: block;}
.popover > .popover-content > form > table {width: 230px;}
.icon-chat-dot:before {content: '\e750'; font-size: 22px;}
</style>
<script src='/xuanxuan/xxc-mini.min.js?t=<?php echo time();?>' type='text/javascript'></script>
<script src='<?php echo $this->createLink('chat', 'registerComponent', 'referer=' . helper::safe64Encode($this->server->request_uri) . '&version=' . time());?>' type='text/javascript'></script>
<?php endif;?>
