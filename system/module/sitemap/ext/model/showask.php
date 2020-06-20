<?php
public function showAsk()
{   
    return $this->loadModel('ask')->getQuestionForSitemap(); 
}   
