<?php if(!defined("RUN_MODE")) die();?>
<?php
$lang->admin->common        = '后台管理';
$lang->admin->adminLicense  = '授权管理';
$lang->admin->dashboard     = '控制台';
$lang->admin->checked       = '已认证';
$lang->admin->adminLog      = '后台动态';
$lang->admin->frontLog      = '前台动态';

$lang->admin->getEmailCodeByApi  = '获取邮箱验证码';
$lang->admin->getMobileCodeByApi = '获取手机验证码';
$lang->admin->currentLicense     = '当前授权';
$lang->admin->validLicenses      = '可用授权';

$lang->admin->shortcuts = new stdclass();
$lang->admin->shortcuts->common             = '快捷入口';
$lang->admin->shortcuts->articleCategories  = '文章类目';
$lang->admin->shortcuts->article            = '发布文章';
$lang->admin->shortcuts->product            = '添加产品';
$lang->admin->shortcuts->feedback           = '处理反馈';
$lang->admin->shortcuts->site               = '站点设置';
$lang->admin->shortcuts->logo               = 'LOGO设置';
$lang->admin->shortcuts->company            = '公司信息';
$lang->admin->shortcuts->contact            = '联系方式';

$lang->admin->chanzhiLicense   = '蝉知授权';
$lang->admin->uploadLicense    = "上传授权包";
$lang->admin->licenseVersion   = '授权版本';
$lang->admin->versionNumber    = '授权版本号';
$lang->admin->licesenEndDate   = '到期时间';
$lang->admin->apply            = '申请授权';
$lang->admin->applyBasic       = '申请免费版授权';
$lang->admin->licenseApplied   = "您的授权申请正在审核中，请在审核通过后在我的授权页面安装。";
$lang->admin->buyPro           = '购买专业版';
$lang->admin->installLicense   = '安装此授权';
$lang->admin->upgrade          = '升级';
$lang->admin->updateLicense    = '更新授权';
$lang->admin->applyBasicResult = '免费版申请结果';
$lang->admin->buyProResult     = '专业版购买结果';
$lang->admin->licenseDomain    = '绑定域名';
$lang->admin->licenseStatus    = '授权状态';

$lang->admin->thread       = '最新帖子';
$lang->admin->order        = '最新订单';
$lang->admin->feedback     = '最新反馈';

$lang->admin->adminEntry     = '警告：您现在的管理入口还是默认的admin.php，建议将admin.php改名以增强系统安全!';

$lang->admin->connectApiFail = "不能连接到蝉知社区，请检查您的网络设置后 <a href='javascritp:loaction.reload()'>重试</a>。";
$lang->admin->registerInfo   = "站点已经绑定到蝉知账号%s，%s";
$lang->admin->registerPage   = '登记页面';
$lang->admin->rebind         = "重新绑定";
$lang->admin->bindedInfo     = '蝉知社区账号信息';

$lang->js->confirmRebind = "确认要重新绑定蝉知账号？";

$lang->admin->community = new stdclass();
$lang->admin->community->common     = '蝉知社区';
$lang->admin->community->caption    = '没有蝉知社区账号？马上注册一个!';
$lang->admin->community->lblAccount = '请设置英文字母和数字的组合。';
$lang->admin->community->lblPasswd  = '请设置您的密码。数字和字母的组合，六位以上。';
$lang->admin->community->submit     = '注册';
$lang->admin->community->success    = "注册账户成功";
$lang->admin->community->update     = "更新资料";

$lang->admin->bind = new stdclass();
$lang->admin->bind->caption = '已有蝉知社区账号，输入用户名密码进行绑定！';
$lang->admin->bind->submit  = '绑定账号';
$lang->admin->bind->success = "关联账户成功";

$lang->admin->license = new stdclass();
$lang->admin->license->domain       = '域名';
$lang->admin->license->notice       = '注意：一个授权只能绑定一个域名，域名提交后不能修改';
$lang->admin->license->customer     = '授予';
$lang->admin->license->contact      = '手机号';
$lang->admin->license->comment      = '备注';
$lang->admin->license->type         = '类型';
$lang->admin->license->reason       = '拒绝理由';
$lang->admin->license->codeDiff     = '与最新授权不一致 建议重新安装授权';
$lang->admin->license->captchaError = '请输入正确的验证码。';

$lang->admin->license->currentLicense    = "当前授权";
$lang->admin->license->currentType       = "当前版本";
$lang->admin->license->tryUser           = "试用用户";
$lang->admin->license->tryDomain         = "未绑定";
$lang->admin->license->notBind           = "未绑定";
$lang->admin->license->communityaccount  = "社区账户";
$lang->admin->license->clickhere         = "点击此处";
$lang->admin->license->notBind           = "当前社区账户未绑定，绑定社区账户后可进行账户认证";
$lang->admin->license->tryLabel          = "<span class='text-muted'>试用</span>";

$lang->admin->license->versions['try']        = "试用版";
$lang->admin->license->versions['personal']   = "免费版";
$lang->admin->license->versions['enterprise'] = "免费版";
$lang->admin->license->versions['basic']      = "免费版";
$lang->admin->license->versions['pro']        = "专业版";

$lang->admin->license->statusList['wait']    = '审核中';
$lang->admin->license->statusList['notpaid'] = '未支付';
$lang->admin->license->statusList['normal']  = '申请通过';
$lang->admin->license->statusList['paid']    = '已支付';
$lang->admin->license->statusList['reject']  = '申请失败';

$lang->admin->license->redirecting      = "<span class='text-muted'><span id='countDown'>3</span>秒后跳转到社区账号注册/绑定页面......</span> <a class='btn-redirec' href='%s'><i class='icon icon-hand-right'></i>立即跳转</a>";
$lang->admin->license->bindCommunity    = '申请授权前必须绑定蝉知社区账号，请先注册并绑定蝉知社区账号后，获取授权。';
$lang->admin->license->errorRedirect    = "<span class='text-muted'><span id='countDown'>10</span>秒后跳转到蝉知授权页面......</span> <a class='btn-redirec' href='%s'><i class='icon icon-hand-right'></i>立即跳转</a>";
$lang->admin->license->licenseDirError  = "授权文件目录：<pre> %s</pre>不存在或者没有写权限，请创建此目录并开启目录写权限。";
$lang->admin->license->licenseFileError = "授权文件没有写权限，请手动到服务器执行：<br/> <pre>sudo chmod -R o=wrx %s</pre>后继续操作。";
$lang->admin->license->packageError     = '安装失败，请上传标准的蝉知授权包。';
$lang->admin->license->copyFail         = '安装失败，请手动安装。';
$lang->admin->license->installSuccess   = '安装授权成功';
$lang->admin->license->successRedirect  = "<span class='text-muted'><span id='countDown'>3</span>秒后跳转到蝉知授权页面......</span> <a class='btn-redirec' href='%s'><i class='icon icon-hand-right'></i>立即跳转</a>";
$lang->admin->license->installError     = '安装授权失败,可能是获取授权失败或者写入文件失败。';
