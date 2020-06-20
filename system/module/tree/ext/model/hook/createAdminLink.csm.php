<?php
if($category->type == 'request')
{
    return html::a(helper::createLink('faq', 'admin', "mode=global&objectID=$category->id"), $category->name, "id='category{$category->id}'");
}

if(strpos($category->type, 'request_c') !== false)
{
    return html::a(helper::createLink('faq', 'admin', "mode=byCategory&objectID=$category->id"), $category->name, "id='category{$category->id}'");
}

if(strpos($category->type, 'request_p') !== false)
{
    return html::a(helper::createLink('faq', 'admin', "mode=byCategory&objectID=$category->id"), $category->name, "id='category{$category->id}'");
}
