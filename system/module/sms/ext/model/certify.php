<?php
/**
 * Send code to phone 
 * 
 * @param  int    $phone 
 * @param  string    $code 
 * @access public
 * @return void
 */
public function sendSMSCode($phone, $code)
{
    $url = 'http://sendcloud.sohu.com/smsapi/send';

    $params['smsUser']    = $this->config->sendcloud->smsUser;
    $params['templateId'] = $this->config->sendcloud->templateId;
    $params['msgType']    = '0';
    $params['phone']      = $phone;
    $params['vars']       = '{"%' . $this->config->sendcloud->vars . '%":"' . $code . '"}';
    ksort($params);

    $sParamStr = '';
    foreach($params as $sKey => $sValue) $sParamStr .= $sKey . '=' . $sValue . '&';
    $sParamStr  = trim($sParamStr, '&');
    $smsKey     = $this->config->sendcloud->key;
    $sSignature = md5($smsKey . "&" . $sParamStr . "&" . $smsKey);

    $params['signature'] = $sSignature;
    $data = http_build_query($params);

    $options['http']['method']  = 'POST';
    $options['http']['header']  = 'Content-Type:application/x-www-form-urlencoded';
    $options['http']['content'] = $data;

    $context = stream_context_create($options);
    $result  = file_get_contents($url, FILE_TEXT, $context);
    return json_decode($result);
}
