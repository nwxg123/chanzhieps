function setAnswerByFAQ(id)
{
    if(id)
    {
        $.get(createLink('ask', 'ajaxGetFAQ', 'id=' + id), function(answer)
        {
            keEditor.html(answer);
        });
    }
    else
    {
        keEditor.html('');
    }
}

function toggleShowReply(id, obj)
{
  replyBoxClass = $('#replyBox' + id).attr('class');
  if(typeof(replyBoxClass) != 'undefined')
  {
      if(replyBoxClass.indexOf('hide') >= 0)
      {
          $('#replyBox' + id).removeClass('hide');
      }
      else
      {
          $('#replyBox' + id).addClass('hide');
      }
  }
}

function toggleReply(id)
{
  if($('#answer' + id).find('.replyform').size() == 0) return;
  if($('#ajaxReply').size() > 0)
  {
    replyID = $('#ajaxReply').parents('div.comment').attr('id');
    $('#ajaxReply').remove();
    if(replyID == 'answer' + id) return;
  }

  var url       = createLink('ask', 'replyAnswer', 'answerID=' + id);
  var replyForm = "<form method='post' id='ajaxReply' action='" + url + "'><table class='table table-form'><tr><td class='w-p90'>" + v.replyHtml + "</td><td>" + v.buttonHtml + '</td></tr></table></form>';

  $('#answer' + id).find('.replyform').html(replyForm);
}

function toggleAnswer(id)
{
  if($('#ajaxAnswer').size() > 0)
  {
    answerID = $('#ajaxAnswer').parents('div.comment').attr('id');
    $('#ajaxAnswer').remove();
    if(answerID == 'answer' + id) return;
  }

  var url = createLink('ask', 'editAnswer', 'answerID=' + id);
  var content = $('#answer' + id).find('.td-content .content').html();
  var answerForm = "<form method='post' id='ajaxAnswer' action='" + url + "'>";
  answerForm = answerForm + "<table class='table table-form'><tr><td class='w-p90'><textarea name='content' id='content' rows=3 class='form-control'>" + content + "</textarea><td>";
  answerForm = answerForm + "<td>" + v.buttonHtml + '</td></tr></table></form>';

  $('#answerform' + id).html(answerForm);
  initKindeditor();
}

$(function()
{
    $.setAjaxJSONER('.ajaxJSON');
    $.setAjaxForm('#ajaxComment');
    $.setAjaxForm('#ajaxReply');
    $.setAjaxForm('#ajaxAnswer');
    toggleReply(v.displayAnswer);
    toggleShowReply(v.displayAnswer);
})
