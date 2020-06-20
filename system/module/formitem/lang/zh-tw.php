<?php
$lang->formitem->common  = '題目';
$lang->formitem->admin   = '維護題目';
$lang->formitem->list    = '題目列表';
$lang->formitem->create  = '創建題目';
$lang->formitem->edit    = '編輯題目';
$lang->formitem->delete  = '刪除題目';
$lang->formitem->insert  = '插入';

$lang->formitem->usual   = '常用題型';
$lang->formitem->profile = '個人信息';

$lang->formitem->id          = '編號';
$lang->formitem->form        = '所屬表單';
$lang->formitem->title       = '標題';
$lang->formitem->type        = '類型';
$lang->formitem->control     = '題型';
$lang->formitem->optionType  = '選項類型';
$lang->formitem->options     = '選項';
$lang->formitem->display     = '顯示方式';
$lang->formitem->format      = '顯示格式';
$lang->formitem->rule        = '檢查規則';
$lang->formitem->answer      = '標準答案';
$lang->formitem->score       = '分數';
$lang->formitem->scoreRule   = '得分規則';
$lang->formitem->order       = '順序';
$lang->formitem->desc        = '描述';
$lang->formitem->createdBy   = '由誰創建';
$lang->formitem->createdDate = '創建日期';
$lang->formitem->editedBy    = '由誰編輯';
$lang->formitem->editedDate  = '最後編輯';

$lang->formitem->content      = '內容';
$lang->formitem->selectImages = '選擇圖片';
$lang->formitem->upload       = '開始上傳';
$lang->formitem->fileSize     = '檔案大小';
$lang->formitem->setAnswer    = '設為答案';
$lang->formitem->scoreUnit    = '分';

$lang->formitem->sort  = '排序';
$lang->formitem->pager = '第 %s 頁';

$lang->formitem->controlList['radio']    = '單選';
$lang->formitem->controlList['checkbox'] = '多選';
$lang->formitem->controlList['select']   = '下拉';
$lang->formitem->controlList['input']    = '填空';
$lang->formitem->controlList['textarea'] = '多行填空';
$lang->formitem->controlList['date']     = '日期';
$lang->formitem->controlList['section']  = '分段';
$lang->formitem->controlList['pager']    = '分頁';

$lang->formitem->ruleList['notempty'] = '必填';
$lang->formitem->ruleList['date']     = '日期';
$lang->formitem->ruleList['email']    = 'email';
$lang->formitem->ruleList['float']    = '數字';
$lang->formitem->ruleList['phone']    = '電話';
$lang->formitem->ruleList['ip']       = 'IP';

$lang->formitem->scoreRuleList['checkbox']['full']    = '全部答對得滿分，否則零分';
$lang->formitem->scoreRuleList['checkbox']['half']    = '全部答對得滿分，部分答對得一半分數';
$lang->formitem->scoreRuleList['checkbox']['percent'] = '全部答對得滿分，部分答對按答對比例得分';

$lang->formitem->scoreRuleList['input']['full']       = '和標準答案一致得滿分，否則零分';
$lang->formitem->scoreRuleList['input']['any']        = '包含任意一個標準答案得滿分，否則零分';
$lang->formitem->scoreRuleList['input']['half']       = '包含全部標準答案得滿分，包含部分標準答案得一半分數';
$lang->formitem->scoreRuleList['input']['percent']    = '包含全部標準答案得滿分，包含部分標準答案答按包含比例得分';

$lang->formitem->scoreRuleList['textarea']['full']    = '和標準答案一致得滿分，否則零分';
$lang->formitem->scoreRuleList['textarea']['any']     = '包含任意一個標準答案得滿分，否則零分';
$lang->formitem->scoreRuleList['textarea']['half']    = '包含全部標準答案得滿分，包含部分標準答案得一半分數';
$lang->formitem->scoreRuleList['textarea']['percent'] = '包含全部標準答案得滿分，包含部分標準答案答按包含比例得分';

$lang->formitem->scoreRuleList['date']['full']        = '和標準答案一致得滿分，否則零分';
$lang->formitem->scoreRuleList['date']['any']         = '包含任意一個標準答案得滿分，否則零分';
$lang->formitem->scoreRuleList['date']['half']        = '包含全部標準答案得滿分，包含部分標準答案得一半分數';
$lang->formitem->scoreRuleList['date']['percent']     = '包含全部標準答案得滿分，包含部分標準答案答按包含比例得分';

$lang->formitem->optionTypeList['text']  = '文字';
$lang->formitem->optionTypeList['image'] = '圖片';

$lang->formitem->displayList['inline'] = '所有選項在一行顯示';
$lang->formitem->displayList['block']  = '每個選項單獨顯示一行';

$lang->formitem->formatList['date']     = '日期，如 ' . date('Y-m-d');
$lang->formitem->formatList['time']     = '時間，如 ' . date('H:i:s');
$lang->formitem->formatList['datetime'] = '日期加時間，如 ' . date('Y-m-d H:i:s');

$lang->formitem->typeList['realname'] = '姓名';
$lang->formitem->typeList['sex']      = '性別';
$lang->formitem->typeList['age']      = '年齡';
$lang->formitem->typeList['mobile']   = '手機';
$lang->formitem->typeList['phone']    = '電話';
$lang->formitem->typeList['email']    = '郵箱';
$lang->formitem->typeList['address']  = '地址';
$lang->formitem->typeList['qq']       = 'QQ';
$lang->formitem->typeList['wechat']   = '微信';
$lang->formitem->typeList['weibo']    = '微博';

$lang->formitem->titleList['realname'] = '您的姓名：';
$lang->formitem->titleList['sex']      = '您的性別：';
$lang->formitem->titleList['age']      = '您的年齡：';
$lang->formitem->titleList['mobile']   = '您的手機：';
$lang->formitem->titleList['phone']    = '您的電話：';
$lang->formitem->titleList['email']    = '您的郵箱：';
$lang->formitem->titleList['address']  = '您的地址：';
$lang->formitem->titleList['qq']       = '您的QQ：';
$lang->formitem->titleList['wechat']   = '您的微信：';
$lang->formitem->titleList['weibo']    = '您的微博：';

$lang->formitem->optionList['sex']['m'] = '男';
$lang->formitem->optionList['sex']['f'] = '女';

$lang->formitem->optionList['age'][1] = '18歲以下';
$lang->formitem->optionList['age'][2] = '18 ～ 25';
$lang->formitem->optionList['age'][3] = '26 ～ 30';
$lang->formitem->optionList['age'][4] = '31 ～ 40';
$lang->formitem->optionList['age'][5] = '41 ～ 50';
$lang->formitem->optionList['age'][6] = '50 ～ 60';
$lang->formitem->optionList['age'][7] = '60歲以上';

$lang->formitem->tips = new stdclass();
$lang->formitem->tips->profile = '該項作為個人信息的 【%s】 進行統計，請勿做其它用途。';
$lang->formitem->tips->images  = '多圖上傳可以快速生成多個選項。';
$lang->formitem->tips->answers = '多個標準答案以逗號分隔';

$lang->formitem->error = new stdclass();
$lang->formitem->error->exist    = '此類型的題目已經存在。';
$lang->formitem->error->noAnswer = '<strong>選項</strong>不能沒有答案。';
