<?php
/**
 * The request module zh-cn file of XiRangCSM
 *
 * @copyright   Copyright 2009-2011 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Congzhi Chen<congzhi@cnezsoft.com>
 * @package     request
 * @version     $Id: zh-cn.php 1914 2011-06-24 10:11:25Z yidong@cnezsoft.com $
 * @link        http://www.chanzhi.org
 */
$lang->request->common          = '工单管理';
$lang->request->admin           = '工单管理';
$lang->request->browse          = '我的工单';
$lang->request->view            = '工单详情';
$lang->request->create          = '提交工单';
$lang->request->editRequset     = '编辑工单';
$lang->request->comment         = '主管点评';
$lang->request->changeStatus    = '更改状态';
$lang->request->setCategory     = '工单分类';
$lang->request->editReply       = '编辑回复';
$lang->request->year            = '年';
$lang->request->productCategory = '产品分类';
$lang->request->productList     = '产品列表';

$lang->request->setting         = '工单设置';
$lang->request->categoryRule    = '分类规则';
$lang->request->defaultTime     = '默认服务周期';

$lang->request->categoryRuleList = new stdclass();
$lang->request->categoryRuleList->global     = '统一分类';
$lang->request->categoryRuleList->byCategory = '按产品分类设置';
$lang->request->categoryRuleList->byProduct  = '按产品设置';

$lang->request->confirmClose = '您确定要关闭该问题吗？';
$lang->request->pleaseSelect = '请选择...';
$lang->request->emptyWarning = '内容不能为空，请重新填写!';
$lang->request->emptyValuate = '请选择评价';
$lang->request->servicer     = '客服';
$lang->request->noServices   = '对不起，您没有权限提交一个工单。';

$lang->request->id          = '编号';
$lang->request->title       = '标题';
$lang->request->product     = '产品';
$lang->request->category    = '分类';
$lang->request->customer    = '提交人';
$lang->request->addedDate   = '提交时间';
$lang->request->status      = '状态';
$lang->request->assignedTo  = '指派给';
$lang->request->repliedDate = '回复时间';
$lang->request->repliedBy   = '由谁回复';
$lang->request->closedDate  = '关闭时间';
$lang->request->closedBy    = '由谁关闭';

$lang->request->ask           = '提问';
$lang->request->category      = '分类';
$lang->request->title         = '标题';
$lang->request->desc          = '描述';
$lang->request->answer        = '回答';
$lang->request->selectFAQ     = '选择常见问题';
$lang->request->replyList     = '回复列表';
$lang->request->categoryList  = '分类列表';
$lang->request->inputCategory = '请选择分类';

$lang->request->actionList         = '问题记录';
$lang->request->valuate            = '评价';
$lang->request->valuateNotice      = '（评价后，问题将自动关闭）';
$lang->request->valuateResult      = '用户评价:';
$lang->request->valuateContent     = '评价详情:';
$lang->request->valuatePlaceholder = '请填写您的评价';
$lang->request->subRating          = '评价';
$lang->request->file               = '附件';

$lang->request->valuates['good']        = '非常满意';
$lang->request->valuates['satisfied']   = '满意';
$lang->request->valuates['unsatisfied'] = '不满意';

$lang->request->assignedToMe  = '指派给我';
$lang->request->all           = '所有';
$lang->request->repliedByMe   = '由我回复';
$lang->request->allowedClosed = '可关闭';
$lang->request->search        = '搜索';

$lang->request->statusList['all']           = '所有';
$lang->request->statusList['wait']          = '未处理';
$lang->request->statusList['viewed']        = '已查阅';
$lang->request->statusList['replied']       = '已回复';
$lang->request->statusList['doubted']       = '追问中';
$lang->request->statusList['allowedClosed'] = '可关闭';
$lang->request->statusList['closed']        = '已关闭';
$lang->request->statusList['assignedToMe']  = '指派给我';
$lang->request->statusList['repliedByMe']   = '由我回复';

$lang->request->statusTabs = ',all,wait,viewed,replied,';

$lang->request->close           = '关闭';
$lang->request->reply           = '回复';
$lang->request->edit            = '编辑';
$lang->request->doubt           = '追问';
$lang->request->assign          = '指派';
$lang->request->transfer        = '转交产品';
$lang->request->transfered      = '已转交';
$lang->request->transferSuccess = '该问题已转交产品';
$lang->request->commentReply    = '点评';

$lang->request->productReply = "产品回复内容";
