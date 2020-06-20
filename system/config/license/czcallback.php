<?php
function ioncube_event_handler($err_code, $params) 
{
    $expiredate = "All Life";
    $domain     = "";
    $ip         = "%ip%";
    $mac        = "%mac%";
    $users      = "%users%";
    $account    = "%account%";
    $email      = "%email%";
    $mobile     = "%mobile%";
    $qq         = "%qq%";
    if(empty($email) or strpos($email, '%email') === 0) $email = 'co@zentao.net';
    if(empty($mobile) or strpos($mobile, '%mobile') === 0) $mobile = '4006 889923';
    if(empty($qq) or strpos($qq, '%qq') === 0) $qq = 'co@zentao.net(1492153927)';
    $expired = "
        <html>
        <head>
        <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <title>error</title>
        </head>
        <body>
        <h2 style='color:red;text-align:center'>您使用的版本已经过期</h2>
        <p>您当前使用的版本截止日期是{$expiredate}，已经过期，请联系我们购买授权。</p>
        <p>电话：$mobile</p>
        <p>QQ：$qq</p>
        <p>Email：$email</p>
        <p>网站：<a href='http://www.chanzhi.org' target='_blank'>http://www.chanzhi.org</a></p>
        <br /> <br /> <br />
        <h2 style='color:red;text-align:center'>The edition has been out of date.</h2>
        <p>The edition's end date is $expiredate, has been out of date now, please contact us to renew your license.</p>
        <p>Email：$email</p>
        <p>网站：<a href='http://www.chanzhi.org/' target='_blank'>http://www.chanzhi.org/</a></p>
        </body>
        </html>
        ";
    $server = "
        <html>
        <head>
        <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <title>error</title>
        </head>
        <body>
        <h2 style='color:red;text-align:center'>错误的IP地址或MAC地址，或错误的域名访问</h2>
        <p>软件授权的IP地址或MAC地址和当前系统的IP地址或MAC地址不一致，请使用最初授权的服务器。或你访问的域名与绑定的域名不一致。</p>
        <p>电话：$mobile</p>
        <p>QQ：$qq</p>
        <p>Email：$email</p>
        <p>网站：<a href='http://www.chanzhi.org' target='_blank'>http://www.chanzhi.org</a></p>
        <br /> <br /> <br />
        <h2 style='color:red;text-align:center'>Wrong IP, MAC address, or domains!</h2>
        <p>The IP, MAC address, or the domains of the server is not the one bound in your ChanZhi license. Contact us if any questions.</p>
        <p>Email : Max@easysoft.ltd </p>
        <p>Site : <a href='http://www.zentao.pm/' target='_blank'>http://www.zentao.pm</a></p>
        </body>
        </html>
        ";
    if($err_code == ION_LICENSE_EXPIRED)
    {
        echo $expired;
    }
    elseif($err_code == ION_LICENSE_SERVER_INVALID)
    {
        echo $server;
    }
    exit;
}
