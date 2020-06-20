<?php
public static function createUsercaseLink($category)
{
    return html::a(helper::createLink('usercase', 'browseadmin', "industry=$category->id"), $category->name, "id='category{$category->id}'");
}
