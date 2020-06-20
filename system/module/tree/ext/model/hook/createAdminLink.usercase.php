<?php
if($category->type == 'usercase')
{
    return html::a(helper::createLink('usercase', 'browseAdmin', "moduleID=$category->id"), $category->name);
}

