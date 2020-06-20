<?php if(!defined("RUN_MODE")) die();?>
<?php
$lang->admin->common        = '後台管理';
$lang->admin->adminLicense  = '授權管理';
$lang->admin->dashboard     = '控制台';
$lang->admin->checked       = '已認證';
$lang->admin->adminLog      = '後台動態';
$lang->admin->frontLog      = '前台動態';

$lang->admin->getEmailCodeByApi  = '獲取郵箱驗證碼';
$lang->admin->getMobileCodeByApi = '獲取手機驗證碼';
$lang->admin->currentLicense     = '當前授權';
$lang->admin->validLicenses      = '可用授權';

$lang->admin->shortcuts = new stdclass();
$lang->admin->shortcuts->common             = '快捷入口';
$lang->admin->shortcuts->articleCategories  = '文章類目';
$lang->admin->shortcuts->article            = '發佈文章';
$lang->admin->shortcuts->product            = '添加產品';
$lang->admin->shortcuts->feedback           = '處理反饋';
$lang->admin->shortcuts->site               = '站點設置';
$lang->admin->shortcuts->logo               = 'LOGO設置';
$lang->admin->shortcuts->company            = '公司信息';
$lang->admin->shortcuts->contact            = '聯繫方式';

$lang->admin->chanzhiLicense   = '蟬知授權';
$lang->admin->uploadLicense    = "上傳授權包";
$lang->admin->licenseVersion   = '授權版本';
$lang->admin->versionNumber    = '授權版本號';
$lang->admin->licesenEndDate   = '到期時間';
$lang->admin->apply            = '申請授權';
$lang->admin->applyBasic       = '申請免費版授權';
$lang->admin->licenseApplied   = "您的授權申請正在審核中，請在審核通過後在我的授權頁面安裝。";
$lang->admin->buyPro           = '購買專業版';
$lang->admin->installLicense   = '安裝此授權';
$lang->admin->upgrade          = '升級';
$lang->admin->updateLicense    = '更新授權';
$lang->admin->applyBasicResult = '免費版申請結果';
$lang->admin->buyProResult     = '專業版購買結果';
$lang->admin->licenseDomain    = '綁定域名';
$lang->admin->licenseStatus    = '授權狀態';

$lang->admin->thread       = '最新帖子';
$lang->admin->order        = '最新訂單';
$lang->admin->feedback     = '最新反饋';

$lang->admin->adminEntry     = '警告：您現在的管理入口還是預設的admin.php，建議將admin.php改名以增強系統安全!';

$lang->admin->connectApiFail = "不能連接到蟬知社區，請檢查您的網絡設置後 <a href='javascritp:loaction.reload()'>重試</a>。";
$lang->admin->registerInfo   = "站點已經綁定到蟬知賬號%s，%s";
$lang->admin->registerPage   = '登記頁面';
$lang->admin->rebind         = "重新綁定";
$lang->admin->bindedInfo     = '蟬知社區賬號信息';

$lang->js->confirmRebind = "確認要重新綁定蟬知賬號？";

$lang->admin->community = new stdclass();
$lang->admin->community->common     = '蟬知社區';
$lang->admin->community->caption    = '沒有蟬知社區賬號？馬上註冊一個!';
$lang->admin->community->lblAccount = '請設置英文字母和數字的組合。';
$lang->admin->community->lblPasswd  = '請設置您的密碼。數字和字母的組合，六位以上。';
$lang->admin->community->submit     = '註冊';
$lang->admin->community->success    = "註冊賬戶成功";
$lang->admin->community->update     = "更新資料";

$lang->admin->bind = new stdclass();
$lang->admin->bind->caption = '已有蟬知社區賬號，輸入用戶名密碼進行綁定！';
$lang->admin->bind->submit  = '綁定賬號';
$lang->admin->bind->success = "關聯賬戶成功";

$lang->admin->license = new stdclass();
$lang->admin->license->domain       = '域名';
$lang->admin->license->notice       = '注意：一個授權只能綁定一個域名，域名提交後不能修改';
$lang->admin->license->customer     = '授予';
$lang->admin->license->contact      = '手機號';
$lang->admin->license->comment      = '備註';
$lang->admin->license->type         = '類型';
$lang->admin->license->reason       = '拒絶理由';
$lang->admin->license->codeDiff     = '與最新授權不一致 建議重新安裝授權';
$lang->admin->license->captchaError = '請輸入正確的驗證碼。';

$lang->admin->license->currentLicense    = "當前授權";
$lang->admin->license->currentType       = "當前版本";
$lang->admin->license->tryUser           = "試用用戶";
$lang->admin->license->tryDomain         = "未綁定";
$lang->admin->license->notBind           = "未綁定";
$lang->admin->license->communityaccount  = "社區賬戶";
$lang->admin->license->clickhere         = "點擊此處";
$lang->admin->license->notBind           = "當前社區賬戶未綁定，綁定社區賬戶後可進行賬戶認證";
$lang->admin->license->tryLabel          = "<span class='text-muted'>試用</span>";

$lang->admin->license->versions['try']        = "試用版";
$lang->admin->license->versions['personal']   = "免費版";
$lang->admin->license->versions['enterprise'] = "免費版";
$lang->admin->license->versions['basic']      = "免費版";
$lang->admin->license->versions['pro']        = "專業版";

$lang->admin->license->statusList['wait']    = '審核中';
$lang->admin->license->statusList['notpaid'] = '未支付';
$lang->admin->license->statusList['normal']  = '申請通過';
$lang->admin->license->statusList['paid']    = '已支付';
$lang->admin->license->statusList['reject']  = '申請失敗';

$lang->admin->license->redirecting      = "<span class='text-muted'><span id='countDown'>3</span>秒後跳轉到社區賬號註冊/綁定頁面......</span> <a class='btn-redirec' href='%s'><i class='icon icon-hand-right'></i>立即跳轉</a>";
$lang->admin->license->bindCommunity    = '申請授權前必須綁定蟬知社區賬號，請先註冊並綁定蟬知社區賬號後，獲取授權。';
$lang->admin->license->errorRedirect    = "<span class='text-muted'><span id='countDown'>10</span>秒後跳轉到蟬知授權頁面......</span> <a class='btn-redirec' href='%s'><i class='icon icon-hand-right'></i>立即跳轉</a>";
$lang->admin->license->licenseDirError  = "授權檔案目錄：<pre> %s</pre>不存在或者沒有寫權限，請創建此目錄並開啟目錄寫權限。";
$lang->admin->license->licenseFileError = "授權檔案沒有寫權限，請手動到伺服器執行：<br/> <pre>sudo chmod -R o=wrx %s</pre>後繼續操作。";
$lang->admin->license->packageError     = '安裝失敗，請上傳標準的蟬知授權包。';
$lang->admin->license->copyFail         = '安裝失敗，請手動安裝。';
$lang->admin->license->installSuccess   = '安裝授權成功';
$lang->admin->license->successRedirect  = "<span class='text-muted'><span id='countDown'>3</span>秒後跳轉到蟬知授權頁面......</span> <a class='btn-redirec' href='%s'><i class='icon icon-hand-right'></i>立即跳轉</a>";
$lang->admin->license->installError     = '安裝授權失敗,可能是獲取授權失敗或者寫入檔案失敗。';
