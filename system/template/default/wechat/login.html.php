{if(!defined("RUN_MODE"))} {!die()} {/if}
<style>
.bind-body {width:100%;height:100%}
.bind-body .bind-title {font-size:16px;text-align:center;margin-top:20px;margin-bottom:20px}
.bind-body .bind-wechat {position:relative;height:300px;overflow:hidden;margin-bottom:20px}
.bind-body .bind-code {height:500px;border:0;left:50%;margin-left:-145px;top:-45px;position:absolute}
</style>
<div class='bind-body'>
  <div class='bind-title'>{$title}</div>
  <div class='bind-wechat'>
      <iframe src='{$oauthLoginLink}' class='bind-code'></iframe>
  </div>
</div>
