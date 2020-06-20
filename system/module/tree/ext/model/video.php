<?php
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
