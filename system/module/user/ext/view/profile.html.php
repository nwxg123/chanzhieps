{include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'header')}
{!js::set('confirmUnbind', $lang->user->confirmUnbind)}
{$idcard = $control->user->getUserImage('idcard')}
{if(isset($control->session->uploadedFiles['idcard']))} {$idcard = $control->loadModel('file')->getByID($control->session->uploadedFiles['idcard'])} {/if}

{$license = $control->user->getUserImage('businessLicense')}
{if(isset($control->session->uploadedFiles['businessLicense']))} {$license = $control->loadModel('file')->getByID($control->session->uploadedFiles['businessLicense'])} {/if}

{$setMobileBtn = html::a(inlink('setMobile'), $lang->user->setMobile, "class='btn'")}
{$emailLabel   = $user->emailCertified ? " <i class='text text-success icon icon-check'> {{$lang->user->certified}}</i>" : " <i class='text text-muted icon'> {{$lang->user->uncertified}}</i>"} 
{$mobileLabel  = $user->mobileCertified ? " <i class='text text-success icon icon-check'> {{$lang->user->certified}}</i>" : " <i class='text text-muted icon'> {{$lang->user->uncertified}}</i>"}
<div class='page-user-control'>
  <div class='row'>
    {include TPL_ROOT . 'user/side.html.php'}
    <div class='col-md-10'>
      <div class='panel borderless' id='certifyPanel'>
        <div class='panel-heading borderless'>
          <strong><i class='icon-user'></i> {$lang->user->profile}</strong>
        </div>
        <table class='table table-form' id="profileTable">
          <tr>
            <th class='w-100px text-right'>{$lang->user->realname}</th>
            <td>
              {$user->realname}
              {if(isset($user->provider) and isset($user->openID) and strpos($user->account, "{{$user->provider}}_") === false)}
                <span class='label label-info'>{$lang->user->oauth->typeList[$user->provider]}</span>
              {/if}
            </td>
          </tr>
          <tr>
            <th class='text-right'>{$lang->user->email}</th>
            <td id='emailTD'>{$user->email}</td>
          </tr>
          {if(!commonModel::isAvailable('companyCertify'))}
          <tr>
            <th class='text-right'>{$lang->user->company}</th>
            <td>{$user->company}</td>
          </tr>
          {/if}
          {if(!commonModel::isAvailable('mobileCertify'))}
          <tr>
            <th class='text-right'>{$lang->user->mobile}</th>
            <td id='mobileTD'>{$user->mobile}</td>
          </tr>
          {/if}
          <tr>
            <th class='text-right'>{$lang->user->qq}</th>
            <td>{$user->qq}</td>
          </tr>
          <tr>
            <th></th>
            <td id='btnBox'>
              {!html::a(inlink('edit'), $lang->user->editProfile, "class='btn'")}
              {if(isset($user->provider) and isset($user->openID))} 
                {if(strpos($user->account, "{{$user->provider}}_") === false)}
                  {!html::a(inlink('oauthUnbind', "account=$user->account&provider=$user->provider&openID=$user->openID"), $lang->user->oauth->lblUnbind, "class='btn unbind'")}
                {else}
                  {!html::a(inlink('oauthRegister'), $lang->user->oauth->lblProfile, "class='btn'")}
                  {!html::a(inlink('oauthBind'), $lang->user->oauth->lblBind, "class='btn'")}
                {/if}
              {/if}
            </td>
          </tr>
        </table>

        <div class='panel-body profile-panel'>

           <div class='col-md-6'>
              <div class='card'>
                <div class='panel-body'>
                  <strong class='icon icon-envelope-alt'> {$lang->user->profileTitle->email} </strong>
                  <span class='pull-right'>{$emailLabel}</span>
                  <div class='div-profile'> {$user->email} </div>
                  {!html::a(inlink('setemail'), $control->lang->user->setEmail, "class='btn btn-default pull-right' data-toggle='modal'")}
                </div>
              </div>
           </div>

          {if(commonModel::isAvailable('mobileCertify'))}
          <div class='col-md-6'>
            <div class='card'>
              <div class='panel-body'>
                <strong class='icon icon-tablet'> {$lang->user->profileTitle->mobile} </strong>
                <span class='pull-right'>{$mobileLabel}</span>
                <div class='div-profile'> {$user->mobile} </div>
                {!html::a(inlink('setMobile'), $control->lang->user->setMobile, "class='btn btn-default pull-right' data-toggle='modal'")}
              </div>
            </div>
          </div>
          {/if}

          {if(commonModel::isAvailable('realnameCertify'))}
          <div class='col-md-6'>
            <div class='card'>
              <div class='panel-body'>
                <strong class='icon icon-user'> {$lang->user->profileTitle->personal} </strong>
                <span class='pull-right'> {$lang->user->certifyStatusLabels[$user->realnameCertified]} </span>
                {if($user->realnameCertified != 'normal')}
                <form id='idCertifyForm' action="{!inlink('saveidcard')}" method='post' {if($user->realnameCertified == 'wait')} {!"class='hide'"} {/if}>
                  <table class='table table-form'>
                    <tr>
                      <th class='w-80px'>{$lang->user->realname}</th>
                      <td>{!html::input('realname', $user->realname, "class='form-control'")}</td>
                    </tr>
                    <tr>
                      <th>{$lang->user->idcard}</th>
                      <td>{!html::input('idcard', $user->idcard, "class='form-control'")}</td>
                    </tr>
                    <tr>
                      <th>{$lang->user->idcardImage}</th>
                      <td>
                        {if(!empty($idcard))}
                        <div class='card'>{!html::image($control->loadModel('file')->printFileURL($idcard))}</div>
                        {else}
                        <div class='card hidden'></div>
                        {/if}
                        {!html::a('javascript:;', $lang->user->uploadIdcard, "class='btn btn-xs' id='idcardUploader'")}
                      </td>
                    </tr>
                    <tr>
                      <th></th>
                      <td>{!html::submitButton($lang->user->submit)}</td>
                    </tr>
                  </table>
                </form>
                {else}
                <table class='table table-form'>
                  <tr>
                    <th class='w-80px'>{$lang->user->realname}</th>
                    <td>{$user->realname}</td>
                  </tr>
                  <tr>
                    <th>{$lang->user->idcard}</th>
                    <td>{$user->idcard}</td>
                  </tr>
                  <tr>
                    <th>{$lang->user->idcardImage}</th>
                    <td>
                      {if(!empty($idcard))}
                        <div class='card'>{!html::image($control->loadModel('file')->printFileURL($idcard))}</div>
                      {/if}
                    </td>
                  </tr>
                </table>
                {/if}
              </div>
            </div>
          </div>
          {/if}

          {if(commonModel::isAvailable('companyCertify'))}
          <div class='col-md-6'>
            <div class='card'>
              <div class='panel-body'>
                <strong class='icon icon-group'> {$lang->user->profileTitle->business} </strong>
                <span class='pull-right'>{$lang->user->certifyStatusLabels[$user->companyCertified]}</span>
                {if($user->companyCertified != 'normal')}
                <form id='businessForm' action="{!inlink('savebusiness')}" method='post' {if($user->companyCertified == 'wait')} {!echo "class='hide'"} {/if}>
                  <table class='table table-form'>
                    <tr>
                      <th class='w-80px'>{$lang->user->company}</th>
                      <td>{!html::input('company', $user->company, "class='form-control'")}</td>
                    </tr>
                    <tr>
                      <th>{$lang->user->companySN}</th>
                      <td>{!html::input('companySN', $user->companySN, "class='form-control'")}</td>
                    </tr>
                    <tr>
                      <th>{$lang->user->businessLicense}</th>
                      <td>
                        {if(!empty($license))}
                        <div class='card'>{!html::image($control->loadModel('file')->printFileURL($license))}</div>
                        {else}
                        <div class='card hidden'></div>
                        {/if}
                        {!html::a('javascript:;', $lang->user->uploadLicense, "class='btn btn-xs' id='licenseUploader'")}
                      </td>
                    </tr>
                    <tr>
                      <th></th>
                      <td>{!html::submitButton($lang->user->submit)}</td>
                    </tr>
                  </table>
                </form>
                {else}
                <table class='table table-form'>
                  <tr>
                    <th class='w-80px'>{$lang->user->company}</th>
                    <td>{$user->company}</td>
                  </tr>
                  <tr>
                    <th>{$lang->user->companySN}</th>
                    <td>{$user->companySN}</td>
                  </tr>
                  <tr>
                    <th>{$lang->user->businessLicense}</th>
                    <td>
                      {if(!empty($license))}
                      <div class='card'>{!html::image($control->loadModel('file')->printFileURL($license))}</div>
                      {/if}
                    </td>
                   </tr>
                </table>
                {/if}
              </div>
            </div>
          </div>
          {/if}

        </div>
      </div>
    </div>
  </div>
</div>

<form id='idcardForm' action="{!inlink('upload', 'type=idcard')}" method='post' class='hide' enctype='multipart/form-data'>
  {!html::file('idcard')}
</form>
<form id='licenseForm' action="{!inlink('upload', 'type=businessLicense')}" method='post' class='hide' enctype='multipart/form-data'>
  {!html::file('businessLicense')}
</form>

{include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'footer')}
