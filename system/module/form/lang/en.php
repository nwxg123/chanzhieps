<?php
foreach($lang->formModules as $type => $name)
{
    $lang->$type->common = $name;
    $lang->$type->admin  = "Manage {$name}";
    $lang->$type->list   = "{$name} List";
    $lang->$type->create = "Create {$name}";
    $lang->$type->edit   = "Edit {$name}";
    $lang->$type->delete = "Delete {$name}";
}

$lang->form->release     = 'Release';
$lang->form->cancel      = 'Cancel';
$lang->form->finish      = 'Finish';
$lang->form->submit      = 'Submit';
$lang->form->manageItems = 'Manage Items';
$lang->form->report      = 'Report';

$lang->form->id          = 'ID';
$lang->form->title       = 'Title';
$lang->form->type        = 'Type';
$lang->form->timeLimit   = 'Post Limit';
$lang->form->endAmount   = 'User Limit'; 
$lang->form->endTime     = 'Time Limit'; 
$lang->form->fullScreen  = 'Full Screen';
$lang->form->desc        = 'Description'; 
$lang->form->status      = 'Status'; 
$lang->form->createdBy   = 'Created By'; 
$lang->form->createdDate = 'Created Date'; 
$lang->form->editedBy    = 'Edited By'; 
$lang->form->editedDate  = 'Edited Date'; 

$lang->form->endCondition    = 'End Condition';
$lang->form->postLimit       = 'Post Condition';
$lang->form->endAmountBefore = 'Number of participants reached';
$lang->form->endTimeBefore   = 'Time Limit';

$lang->form->hour   = 'hours';
$lang->form->minute = 'minutes';
$lang->form->second = 'seconds';

$lang->form->answers     = 'Answered <strong>%s</strong> times.';
$lang->form->options     = 'Options';
$lang->form->optionCount = 'Count';
$lang->form->optionRate  = 'Rate';

$lang->form->confirmSubmit  = 'Are you sure to submit?';
$lang->form->submitSuccess  = 'Submit success.';
$lang->form->timeLimitTips  = 'Automatically hand over the exam pager when the tima out.'; 
$lang->form->score          = 'Your score is <strong>%s</strong>.';
$lang->form->examTips       = 'The exam time limit of %s, automatically submitted after the time. Please fill in the required information in advance, so as not to affect the submission.';

$lang->form->prev = 'Prev';
$lang->form->next = 'Next';

$lang->form->fullScreenList[0] = 'Off';
$lang->form->fullScreenList[1] = 'On';

$lang->form->modeList['byUser'] = 'By User';
$lang->form->modeList['byItem'] = 'By Item';

$lang->form->statusList['draft']    = 'Draft';
$lang->form->statusList['normal']   = 'Normal';
$lang->form->statusList['finished'] = 'Finished';

$lang->form->postLimitList['needLogin']   = 'Must login.';
$lang->form->postLimitList['ipUnique']    = 'Each IP post once.';
$lang->form->postLimitList['fingerprint'] = 'Each pc or mobile post once.';

$lang->form->error = new stdclass();
$lang->form->error->notExist           = 'Request object does not exist.';
$lang->form->error->draft              = '%s has not started yet.';
$lang->form->error->finished           = '%s has finished.';
$lang->form->error->submitSuccess      = 'Thanks for participating.';
$lang->form->error->needLogin          = 'You have to log in.';
$lang->form->error->emptyAmountAndTime = '<strong>Number of participants</strong> and <strong>end time</strong> must not be empty at the same time.';
$lang->form->error->notInt             = '<strong>%s</strong> should be number.';
$lang->form->error->noAnswer           = 'No answer.';

$lang->formuser = new stdclass();
$lang->formuser->view        = 'View';
$lang->formuser->id          = 'ID';
$lang->formuser->account     = 'Account';
$lang->formuser->ip          = 'IP';
$lang->formuser->createdDate = 'Created Date';
$lang->formuser->answer      = 'Answer';
$lang->formuser->score       = 'Score';
$lang->formuser->count       = 'Completion count';
$lang->formuser->rate        = 'Completion rate';
