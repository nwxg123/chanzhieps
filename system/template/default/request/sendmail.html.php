{*php
/**
 * The mail file of request module of ZenTaoAMS.
 *
 * @copyright   Copyright 2009-2013 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Yidong Wang <wangyidong@cnezsoft.com>
 * @package     requset
 * @version     $Id: sendmail.html.php 867 2010-06-17 09:32:58Z yuren_@126.com $
 * @link        http://www.chanzhi.org
 */
/php*}
<table width='98%' align='center'>
  <tr class='header'>
    <td>
      REQUEST #{!echo $request->id . "=>$request->assignedTo " . html::a($control->loadModel('common')->getSysURL() . $control->createLink('request', 'view', "requestID=$request->id"), $request->title)}
    </td>
  </tr>
  <tr>
    <td>
    <fieldset>
      <legend>{$lang->request->desc}</legend>
      <div class='content'>
      {if(strpos($request->desc, 'src="data/upload'))}
        {$request->desc = str_replace('<img src="', '<img src="http://' . $server->http_host . $config->webRoot, $request->desc)}
        {$request->desc = str_replace('<img alt="" src="', '<img src="http://' . $server->http_host . $config->webRoot, $request->desc)}
      {/if}
      {$request->desc}
      </div>
    </fieldset>
    </td>
  </tr>
  <tr>
    <td>{include '../../common/view/mail.html.php'}</td>
  </tr>
</table>
