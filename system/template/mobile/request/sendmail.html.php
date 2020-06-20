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
</table>
