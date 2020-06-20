<?php
public function fixMenu($type = 'article')
{
    return $this->loadExtension('csm')->fixMenu($type);
}

public static function createFaqLink($category)
{
    return html::a(helper::createLink('faq', 'admin', "mode=byCategory&categoryID={$category->id}"), $category->name, "id='category{$category->id}'");
}

public static function createAskLink($category)
{
    return html::a(helper::createLink('ask', 'managequestions', "categoryID={$category->id}"), $category->name, "id='category{$category->id}'");
}

public static function createFaqBrowseLink($category)
{   
    if($category->type == 'request')
    {
        $linkHtml = html::a(helper::createLink('faq', 'index', "mode=global&categoryID={$category->id}"), $category->name, "id='category{$category->id}'");
    }
    else
    {
        $linkHtml = html::a(helper::createLink('faq', 'index', "mode=byCategory&categoryID={$category->id}"), $category->name, "id='category{$category->id}'");
    }
    return $linkHtml;
}   

public static function createAskBrowseLink($category)
{   
    $linkHtml = html::a(helper::createLink('ask', 'index', "categoryID={$category->id}", "name={$category->alias}"), $category->name, "id='category{$category->id}'");
    return $linkHtml;
}   

public static function createFaqAdminLink($category)
{
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
}

public static function createAskAdminLink($category)
{
    return html::a(helper::createLink('ask', 'managequestions', "categoryID=$category->id"), $category->name, "id='category{$category->id}'");
}
