<?php
/**
 * Get layouts for wmp.
 * 
 * @param  string    $moduleName 
 * @param  string    $methodName 
 * @access public
 * @return array
 */
public function getWmpLayouts($moduleName, $methodName)
{
    return $this->loadExtension('wmp')->getWmpLayouts($moduleName, $methodName);
}

/**
 * Process data of a block.
 * 
 * @param  object    $block 
 * @access public
 * @return object
 */
public function processData($block)
{
    return $this->loadExtension('wmp')->processData($block);
}

/**
 * Process Html Data.
 * 
 * @param  object    $block 
 * @access public
 * @return object
 */
public function processHtmlData($block)
{
    return $this->loadExtension('wmp')->processHtmlData($block);
}

/**
 * Process Htmlcode Data.
 * 
 * @param  object    $block 
 * @access public
 * @return object
 */
public function processHtmlcodeData($block)
{
    return $this->loadExtension('wmp')->processHtmlcodeData($block);
}

/**
 * Process about data.
 * 
 * @param  object    $block 
 * @access public
 * @return object
 */
public function processAboutData($block)
{
    return $this->loadExtension('wmp')->processAboutData($block);
}

/**
 * Process contact Data.
 * 
 * @param  object    $block 
 * @access public
 * @return object
 */
public function processContactData($block)
{
    return $this->loadExtension('wmp')->processContactData($block);
}

/**
 * Process header Data.
 * 
 * @param  int    $block 
 * @access public
 * @return void
 */
public function processHeaderData($block)
{
    return $this->loadExtension('wmp')->processHeaderData($block);
}

/**
 * Process LatestArticle Data 
 * 
 * @param  object    $block 
 * @access public
 * @return object
 */
public function processLatestArticleData($block)
{
    return $this->loadExtension('wmp')->processLatestArticleData($block);
}

/**
 * Process hotArticle data.
 * 
 * @param  object    $block 
 * @access public
 * @return object
 */
public function processHotArticleData($block)
{
    return $this->loadExtension('wmp')->processHotArticleData($block);
}

/**
 * Process latestProduct data.
 * 
 * @param  object    $block 
 * @access public
 * @return object
 */
public function processLatestProductData($block)
{
    return $this->loadExtension('wmp')->processLatestProductData($block);
}

/**
 * Process hotProduct data.
 * 
 * @param  object    $block 
 * @access public
 * @return object
 */
public function processHotProductData($block)
{
    return $this->loadExtension('wmp')->processHotProductData($block);
}

/**
 * Process latestBlog data 
 * 
 * @param  object    $block 
 * @access public
 * @return object
 */
public function processLatestBlogData($block)
{
    return $this->loadExtension('wmp')->processLatestBlogData($block);
}

/**
 * Process slide data.
 * 
 * @param  int    $block 
 * @access public
 * @return void
 */
public function processSlideData($block)
{
    return $this->loadExtension('wmp')->processSlideData($block);
}

/**
 * Process featuredProduct data .
 * 
 * @param  object    $block 
 * @access public
 * @return object
 */
public function processFeaturedProductData($block)
{
    return $this->loadExtension('wmp')->processFeaturedProductData($block);
}

/**
 * Process pagelist Data 
 * 
 * @param  object    $block 
 * @access public
 * @return object
 */
public function processpagelistData($block)
{
    return $this->loadExtension('wmp')->processpagelistData($block);
}
