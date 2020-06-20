<?php if(!class_exists('raintpl')){exit;}?><?php if($control->moduleName == 'form' && $control->methodName == 'view'){ ?>

  <script>
  var formId = '#form' + '<?php echo md5($form->id); ?>';
  var fingerprint = getFingerprint();
  $(formId).append("<input type='hidden' id='fingerprint' name='fingerprint' value='" + fingerprint + "'>");
  
  $.post(createLink('misc', 'ping'), {id: <?php echo $form->id;?>, fingerprint: fingerprint});

  if(v.type == 'exam')
  {
      $.get(createLink('form', 'ajaxGetTimeLeft', 'formID=' + v.formID), function(timeLeft)
      {
          if(!timeLeft) return false;
          
          interval = setInterval(function()
          {
              var hour   = Math.floor(timeLeft / 3600);
              var minute = Math.floor(timeLeft % 3600 / 60);
              var second = timeLeft % 60;

              if(hour   < 10) hour   = '0' + hour;
              if(minute < 10) minute = '0' + minute;
              if(second < 10) second = '0' + second;

              if(timeLeft >  0) $('.timeLeft').html('<i class="icon icon-time"> </i>' + hour + ':' + minute + ':' + second);
              if(timeLeft <= 0)
              {
                  $('#submit').closest('form').submit();
                  clearInterval(interval);
              }

              timeLeft--;
          }, 1000);
      });
  }
  </script>
<?php } ?>

