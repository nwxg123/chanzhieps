<?php
global $app;
helper::cd($app->getBasePath());
helper::import('D:\phpstudy_pro\WWW\chanzhieps\system\module\tree\model.php');
helper::cd();
class exttreeModel extends treeModel 
{
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

public function saveAttribute($category)
{
    return $this->loadExtension('mall')->saveAttribute($category);
}

public function getAttributesByID($category)
{
    return $this->loadExtension('mall')->getAttributesByID($category);
}

public function getAttributeNav()
{
    return $this->loadExtension('mall')->getAttributeNav();
}

public static function createUsercaseLink($category)
{
    return html::a(helper::createLink('usercase', 'browseadmin', "industry=$category->id"), $category->name, "id='category{$category->id}'");
}

/**
 * Create the video browse link.
 * 
 * @param  int      $category 
 * @access public
 * @return string
 */
public static function createVideoBrowseLink($category)
{
    $linkHtml = html::a(helper::createLink('video', 'browse', "categoryID={$category->id}", "category={$category->alias}"), $category->name, "id='category{$category->id}'");
    return $linkHtml;
}

public function getListByType($type)
{
    return array();
}


    public static function createAdminLink($category)
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


if($category->type == 'usercase')
{
    return html::a(helper::createLink('usercase', 'browseAdmin', "moduleID=$category->id"), $category->name);
}


        if($category->type == 'forum' or $category->type == 'product')
        {
            $categoryName = $category->type;
            $vars         = "categoryID=$category->id";
        }
        else
        {
            $categoryName = 'article';
            $vars         = "type=$category->type&categoryID=$category->id";
        }

        $methodName = 'admin';
        $linkHtml   = html::a(helper::createLink($categoryName, $methodName, $vars), $category->name, "id='category{$category->id}'");

        return $linkHtml;
    }

//**//
}