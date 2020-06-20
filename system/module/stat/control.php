<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The control file of stat of ChanzhiEPS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     stat
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class stat extends control
{
    /**
     * Statistics summary .
     *
     * @param  string $mode
     * @access public
     * @return void
     */
    public function summary($mode = '', $begin = '', $end = '')
    {
        if(!$mode) $mode = date("H") < 10 ? 'yesterday' : 'today';
        if(!$end)  $end  = helper::now();
        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;
        $this->view->todayReport     = $this->stat->getTodayReport();
        $this->view->yesterdayReport = $this->stat->getYesterdayReport();

        if($begin == $end)
        {
            $labels = $this->stat->getHourLabels($begin);
            $this->view->labels    = $this->stat->getHourLabels($begin, false);;
            $this->view->lineChart = $this->stat->getBasicLine('total', 'hour', $labels);
        }
        else
        {
            $labels = $this->stat->getDayLabels($begin, $end);
            foreach($labels as $label ) $this->view->labels[] = date('Y-m-d', strtotime($label));
            $this->view->lineChart = $this->stat->getBasicLine('total', 'day', $labels);
        }
        
        $this->lang->menuGroups->stat = 'summary';

        $this->app->loadClass('pager');
        $pager = new pager(20, 10, 1);

        $this->view->top10PageView = $this->stat->getPageRank($mode, $begin, $end, $pager);
        $this->view->top10Article  = $this->loadModel('article')->getList('article', '', 'views desc', $pager);
        $this->view->top10Product  = $this->loadModel('product')->getList('', 'views desc', $pager);
        $this->view->top10Forum    = $this->loadModel('thread')->getList('', 'views desc', $pager);
        $this->view->title = $this->lang->stat->traffic;
        $this->view->mode  = $mode;

        $this->display();
    }

    /**
     * From statistics report page.
     * 
     * @param  string $begin 
     * @param  string $end 
     * @access public
     * @return void
     */
    public function from($mode = '', $begin = '', $end = '')
    {
        if(!$mode) $mode = date("H") < 10 ? 'yesterday' : 'today';
        if(!$end)  $end  = helper::now();
        $type = 'from';
        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;

        $labels = array();
        if($begin == $end) 
        {
            $labels = $this->stat->getHourLabels($begin);
            $this->view->lineLabels = $this->stat->getHourLabels($begin, false);
        }
        else
        {
            $labels = $this->stat->getDayLabels($begin, $end);
            foreach($labels as $label ) $this->view->lineLabels[] = date('Y-m-d', strtotime($label));
        }

        $pieCharts  = $this->stat->getPieByType($type, $begin, $end);

        $pvTotal = $uvTotal = $ipTotal = 0;
        if($pieCharts)
        {
            foreach($pieCharts as $state => $chartDatas)
            {
                foreach($chartDatas as $chartData)
                {
                    if($state == 'pv') $pvTotal += $chartData->value;
                    if($state == 'uv') $uvTotal += $chartData->value;
                    if($state == 'ip') $ipTotal += $chartData->value;
                }
            }
        }

        $this->lang->menuGroups->stat = 'traffic';
        $timeType = $begin == $end ? 'hour' : 'day';

        $this->view->pvTotal    = $pvTotal;
        $this->view->uvTotal    = $uvTotal;
        $this->view->ipTotal    = $ipTotal;
        $this->view->lineCharts = $this->stat->getTypeLine($type, $timeType, $labels);
        $this->view->pieCharts  = $pieCharts;
        $this->view->title      = $this->lang->stat->from;
        $this->view->mode       = $mode; 
        $this->view->type       = $type;
        
        $this->display();
    }

    /**
     * Search statistics report page.
     * 
     * @param  string $begin 
     * @param  string $end 
     * @access public
     * @return void
     */
    public function search($mode = '', $begin = '', $end = '')
    {
        if(!$mode) $mode = date("H") < 10 ? 'yesterday' : 'today';
        if(!$end)  $end  = helper::now();

        $type  = 'search';
        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;
        if($begin == $end) 
        {
            $labels = $this->stat->getHourLabels($begin);
            $this->view->lineLabels = $this->stat->getHourLabels($begin, false);
        }
        else
        {
            $labels = $this->stat->getDayLabels($begin, $end);
            foreach($labels as $label ) $this->view->lineLabels[] = date('Y-m-d', strtotime($label));
        }

        $pieCharts  = $this->stat->getPieByType($type, $begin, $end);
        $pvTotal = $uvTotal = $ipTotal = 0;
        if($pieCharts)
        {
            foreach($pieCharts as $state => $chartDatas)
            {
                foreach($chartDatas as $chartData)
                {
                    if($state == 'pv') $pvTotal += $chartData->value;
                    if($state == 'uv') $uvTotal += $chartData->value;
                    if($state == 'ip') $ipTotal += $chartData->value;
                }
            }
        }

        $this->lang->menuGroups->stat = 'traffic';
        $timeType = $begin == $end ? 'hour' : 'day';

        $this->view->pvTotal    = $pvTotal;
        $this->view->uvTotal    = $uvTotal;
        $this->view->ipTotal    = $ipTotal;
        $this->view->pieCharts  = $pieCharts;

        $timeType = $begin == $end ? 'hour' : 'day';
        $this->view->lineCharts = $this->stat->getTypeLine($type, $timeType, $labels);

        $this->lang->menuGroups->stat = 'traffic';

        $this->view->title = $this->lang->stat->search;
        $this->view->mode  = $mode; 
        $this->view->type  = $type;
        
        $this->display();
    }

    /**
     * From statistics report page.
     * 
     * @param  string $begin 
     * @param  string $end 
     * @access public
     * @return void
     */
    public function client($type = 'browser', $mode = '', $begin = '', $end = '')
    {
        if(!$mode) $mode = date("H") < 10 ? 'yesterday' : 'today';
        if(!$end)  $end  = helper::now();
        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;
        if($begin == $end) 
        {
            $labels = $this->stat->getHourLabels($begin);
            $this->view->lineLabels = $this->stat->getHourLabels($begin, false);
        }
        else
        {
            $labels = $this->stat->getDayLabels($begin, $end);
            foreach($labels as $label ) $this->view->lineLabels[] = date('Y-m-d', strtotime($label));
        }
        
        $this->view->pieCharts  = $this->stat->getPieByType($type, $begin, $end);

        if(empty($this->view->lineLabels)) 
        {
            $this->view->error = $this->lang->stat->dateError;
            $this->display();
            exit;
        }

        $timeType = $begin == $end ? 'hour' : 'day';
        $this->view->totalPV = $this->dao->select('sum(pv) as pv')->from(TABLE_STATREPORT)
            ->where('type')->eq('basic')
            ->andWhere('item')->eq('total')
            ->beginIf($begin != '')->andWhere('timeValue')->ge($begin)->fi()
            ->beginIf($end != '')->andWhere('timeValue')->le($end)->fi()
            ->fetch('pv');

        $this->lang->menuGroups->stat = 'visitor';

        $this->view->title = $this->lang->stat->{$type}; 
        $this->view->mode  = $mode; 
        $this->view->type  = $type; 
        $this->display();
    }

    /**
     * stat guest info by browser 
     * 
     * @param  string $state 
     * @param  string $mode 
     * @param  string $begin 
     * @param  string $end 
     * @access public
     * @return void
     */
    public function browser($state = 'pv' ,$mode = '', $begin = '', $end = '')
    {
        $this->lang->menuGroups->stat = 'visitor';

        if(!$mode) $mode = date("H") < 10 ? 'yesterday' : 'today';
        if(!$end)  $end  = helper::now();
        $type  = 'browser';
        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;

        $pieCharts  = $this->stat->getPieByType($type, $begin, $end);
        $this->view->pieCharts = $pieCharts;

        $totalState = 0;
        if($pieCharts)
        {
            foreach($pieCharts[$state] as  $chartData)
            {
                $totalState += $chartData->value;
            }
        }

        $this->view->totalState = $totalState;
        $this->view->title      = $this->lang->stat->{$type}; 
        $this->view->state      = $state; 
        $this->view->mode       = $mode; 
        $this->view->begin      = $this->get->begin; 
        $this->view->end        = $this->get->end; 
        $this->view->type       = $type; 
        $this->display();
    }

    /**
     * stat guest info by os. 
     * 
     * @param  string $mode 
     * @param  string $begin 
     * @param  string $end 
     * @access public
     * @return void
     */
    public function os($state = 'pv' ,$mode = '', $begin = '', $end = '')
    {
        $this->lang->menuGroups->stat = 'visitor';

        if(!$mode) $mode = date("H") < 10 ? 'yesterday' : 'today';
        if(!$end)  $end  = helper::now();
        $type  = 'os';
        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;

        $pieCharts  = $this->stat->getPieByType($type, $begin, $end);
        $this->view->pieCharts = $pieCharts;

        $totalState = 0;
        if($pieCharts)
        {
            foreach($pieCharts[$state] as  $chartData)
            {
                $totalState += $chartData->value;
            }
        }

        $this->view->totalState = $totalState;
        $this->view->title      = $this->lang->stat->{$type}; 
        $this->view->state      = $state; 
        $this->view->mode       = $mode; 
        $this->view->begin      = $this->get->begin; 
        $this->view->end        = $this->get->end; 
        $this->view->type       = $type; 
        $this->display();
    }

    /**
     * stat user device. 
     * 
     * @param  string $mode 
     * @param  string $begin 
     * @param  string $end 
     * @access public
     * @return void
     */
    public function device($mode = '', $begin = '', $end = '')
    {
        $this->lang->menuGroups->stat = 'visitor';

        if(!$mode) $mode = date("H") < 10 ? 'yesterday' : 'today';
        if(!$end)  $end  = helper::now();
        $type  = 'device';
        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;

        $pieCharts  = $this->stat->getPieByType($type, $begin, $end);

        $pvTotal = $uvTotal = $ipTotal = 0;
        if($pieCharts)
        {
            foreach($pieCharts as $state => $chartDatas)
            {
                foreach($chartDatas as $chartData)
                {
                    if($state == 'pv') $pvTotal += $chartData->value;
                    if($state == 'uv') $uvTotal += $chartData->value;
                    if($state == 'ip') $ipTotal += $chartData->value;
                }
            }
        }

        $this->view->pvTotal   = $pvTotal;
        $this->view->uvTotal   = $uvTotal;
        $this->view->ipTotal   = $ipTotal;
        $this->view->pieCharts = $pieCharts;

        $this->view->title     = $this->lang->stat->{$type}; 
        $this->view->mode      = $mode; 
        $this->view->type      = $type; 
        $this->display();
    }

    /**
     * stat guest page
     * 
     * @param  string $mode 
     * @param  string $begin 
     * @param  string $end 
     * @access public
     * @return void
     */
    public function guest($mode = '', $begin = '', $end = '')
    {
        $this->lang->menuGroups->stat = 'visitor';

        if(!$mode) $mode = date("H") < 10 ? 'yesterday' : 'today';
        if(!$end)  $end  = helper::now();
        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;

        $pieBasicCharts  = $this->stat->getPieByType('basic', '', '', '', 'total');
        $pieFromCharts   = $this->stat->getPieByType('from', $begin, $end);

        $statDataList = array('guestTotal' => array('pv' => 0, 'uv' => 0, 'ip' => 0), 'newGuest' => array('pv' => 0, 'uv' => 0, 'ip' => 0));
        foreach($pieBasicCharts as $state => $chartDatas)
        {
            foreach($chartDatas as $chartData)
            {
                if($state == 'pv') $statDataList['guestTotal']['pv'] += $chartData->value;
                if($state == 'uv') $statDataList['guestTotal']['uv'] += $chartData->value;
                if($state == 'ip') $statDataList['guestTotal']['ip'] += $chartData->value;
            }
        }
        foreach($pieFromCharts as $state => $chartDatas)
        {
            foreach($chartDatas as $chartData)
            {
                if($state == 'pv') $statDataList['newGuest']['pv'] += $chartData->value;
                if($state == 'uv') $statDataList['newGuest']['uv'] += $chartData->value;
                if($state == 'ip') $statDataList['newGuest']['ip'] += $chartData->value;
            }
        }
        $this->view->newGuest     = $this->stat->getNewGuest('from', $begin, $end);
        $this->view->guestTotal   = $this->stat->getNewGuest('basic', '', '', '', 'total');

        $begin = date('Y-m-d',strtotime($begin));
        $end   = date('Y-m-d',strtotime('+1 day', strtotime($end)));
        $this->view->newMember    = $this->loadModel('user')->getRecentlyAdd($begin, $end);

        $this->view->statDataList = $statDataList; 
        $this->view->title        = $this->lang->stat->guest; 
        $this->view->mode         = $mode; 
        $this->display();
    }

    /**
     * Keywords report page.
     * 
     * @param  string $orderBy 
     * @param  int    $recTotal 
     * @param  int    $recPerPage 
     * @param  int    $pageID 
     * @access public
     * @return void
     */
    public function keywords($mode = 'today', $begin = '', $end = '', $orderBy = 'pv_desc',  $recTotal = 0, $recPerPage = 10, $pageID = 1)
    {   
        if(!$end)  $end  = helper::now();

        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;

        $keywordList = $this->stat->getKeywordsList($begin, $end, $orderBy, $pager);
        foreach($keywordList as $keyword => $reports)
        {
            $other = new stdclass();
            $other->pv = 0; 
            $other->uv = 0;
            $other->ip = 0;
            foreach($reports as $engine => $report)
            {
                if(in_array($engine, $this->config->stat->searchEngines)) continue;
                $other->pv += $report->pv;
                $other->uv += $report->uv;
                $other->ip += $report->ip;
            }
            $keywordList[$keyword]['other'] = $other;
        }

        $this->lang->menuGroups->stat = 'traffic';

        $this->view->searchEngines = $this->config->stat->searchEngines;
        $this->view->keywordList   = $keywordList;
        $this->view->title         = $this->lang->stat->keyword;
        $this->view->mode          = $mode;
        $this->view->begin         = $begin;
        $this->view->end           = $end;
        $this->view->orderBy       = $orderBy;
        $this->view->pager         = $pager;
        $this->display();
    }

    /**
     * Report page of one keyword.
     * 
     * @param  string    $keyword 
     * @param  string    $mode 
     * @param  string    $begin 
     * @param  string    $end 
     * @access public
     * @return void
     */
    public function keywordReport($keyword, $mode = 'today', $begin = '', $end = '')
    {
        if(!$end)  $end  = helper::now();
        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;

        if($begin == $end)
        { 
            $labels = $this->stat->getHourLabels($begin, false);
        }
        else
        {
            $labels = $this->stat->getDayLabels($begin, $end);
            foreach($labels as &$label) $label = date('Y-m-d', strtotime($label));
        }

        $this->view->keyword     = $keyword;
        $this->view->labels      = $labels;
        $this->view->mode        = $mode;
        $this->view->totalInfo   = $this->stat->getTrafficByKeyword($keyword, $begin, $end);
        $this->view->keywordLine = $this->stat->getItemLine('keywords', $keyword, $begin, $end);
        $this->view->pieCharts   = $this->stat->getItemExtraPie('keywords', $keyword, $begin, $end);
        $this->display();
    }

    /**
     * Domain report.
     * 
     * @param  string    $mode 
     * @param  string    $begin 
     * @param  string    $end 
     * @access public
     * @return void
     */
    public function domainList($mode = '', $begin = '', $end = '', $orderBy = 'pv_desc',  $recTotal = 0, $recPerPage = 10, $pageID = 1)
    {
        if(!$mode) $mode = date("H") < 10 ? 'yesterday' : 'today';
        if(!$end)  $end  = helper::now();

        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;

        $labels = $begin == $end ? $this->stat->getHourLabels($begin, false) : $this->stat->getDayLabels($begin, $end);

        $this->lang->menuGroups->stat = 'traffic';

        $this->view->title   = $this->lang->stat->domain;
        $this->view->labels  = $labels;
        $this->view->mode    = $mode;
        $this->view->domains = $this->stat->getDomainList($begin, $end, $orderBy, $pager);
        $this->view->pager   = $pager;

        $this->display();
    }

    /**
     * articleTrend 
     * 
     * @param  int    $articleID 
     * @param  string $mode 
     * @access public
     * @return void
     */
    public function articleTrend($articleID, $mode = 'weekly')
    {
        if(!$mode) $mode = date("H") < 10 ? 'yesterday' : 'today';
        $begin = $end = '';
        $type  = 'article';
        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;

        $labels = array();
        $labels = $this->stat->getDayLabels($begin, $end);
        foreach($labels as $label ) $this->view->lineLabels[] = date('Y-m-d', strtotime($label));

        $timeType = 'day';
        $lineCharts = $this->stat->getTypeLine($type, $timeType, $labels, 'item', $articleID);

        $pvTotal = $messageTotal = 0;
        if($lineCharts)
        {
            foreach($lineCharts as $state => $chartDatas)
            {
                foreach($chartDatas[0]->data as $number)
                {
                    if($state == 'pvChart')    $pvTotal      += $number;
                    if($state == 'extraChart') $messageTotal += $number;
                }
            }
            $lineCharts['pvChart'][0]->label = $this->lang->stat->page->views;
        }

        $newLineCharts['pvChart']    = $lineCharts['pvChart'][0];
        $newLineCharts['extraChart'] = $lineCharts['extraChart'][0];

        $this->view->title        = $this->lang->stat->trendChart;
        $this->view->lineCharts   = $newLineCharts;
        $this->view->pvTotal      = $pvTotal;
        $this->view->messageTotal = $messageTotal;
        $this->display();
    }

    /**
     * productTrend 
     * 
     * @param  int    $productID 
     * @param  string $mode 
     * @access public
     * @return void
     */
    public function productTrend($productID, $mode = 'weekly')
    {
        if(!$mode) $mode = date("H") < 10 ? 'yesterday' : 'today';
        $begin = $end = '';
        $type  = 'product';
        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;

        $labels = array();
        $labels = $this->stat->getDayLabels($begin, $end);
        foreach($labels as $label ) $this->view->lineLabels[] = date('Y-m-d', strtotime($label));

        $timeType = 'day';
        $lineCharts = $this->stat->getTypeLine($type, $timeType, $labels, 'item', $productID);

        $pvTotal = $salesTotal = 0;
        if($lineCharts)
        {
            foreach($lineCharts as $state => $chartDatas)
            {
                foreach($chartDatas[0]->data as $number)
                {
                    if($state == 'pvChart')    $pvTotal      += $number;
                    if($state == 'extraChart') $salesTotal   += $number;
                }
            }
            $lineCharts['pvChart'][0]->label = $this->lang->stat->page->pv;
        }

        $newLineCharts['pvChart']    = $lineCharts['pvChart'][0];
        $newLineCharts['extraChart'] = $lineCharts['extraChart'][0];

        $this->view->title        = $this->lang->stat->trendChart;
        $this->view->lineCharts   = $newLineCharts;
        $this->view->pvTotal      = $pvTotal;
        $this->view->salesTotal   = $salesTotal;
        $this->display();
    }

    /**
     * Domain trend report.
     * 
     * @param  string    $domain 
     * @param  string    $mode 
     * @param  string    $begin 
     * @param  string    $end 
     * @access public
     * @return void
     */
    public function domainTrend($domain, $mode = 'today', $begin = '', $end = '')
    {
        $domain = helper::safe64decode($domain);
        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;

        if($begin < $end)  $labels = $this->stat->getDayLabels($begin, $end);
        if($begin == $end) $labels = $this->stat->getHourLabels($begin, false);

        $this->lang->menuGroups->stat = 'traffic';

        $this->view->title     = $this->lang->stat->domain . ' - ' . $domain;
        $this->view->domain    = $domain;
        $this->view->labels    = $labels;
        $this->view->mode      = $mode;
        $this->view->lineChart = $this->stat->getItemLine('domain', $domain, $begin, $end);
        $this->view->pieCharts = $this->stat->getItemExtraPie('domain', $domain, $begin, $end);

        $this->display();
    }

    /**
     * Domain pages report.
     * 
     * @param  string    $domain 
     * @param  string    $mode 
     * @param  string    $begin 
     * @param  string    $end 
     * @access public
     * @return void
     */
    public function domainPage($domain, $mode = 'today', $begin = '', $end = '', $recTotal = 0, $recPerPage = 50, $pageID = 1)
    {
        $domain = helper::safe64Decode($domain);
        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;

        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $labels = $this->stat->getDayLabels($begin, $end);

        $this->lang->menuGroups->stat = 'traffic';

        $this->view->type   = $this->lang->stat->domain . ' - ' . $domain;
        $this->view->domain = $domain;
        $this->view->labels = $labels;
        $this->view->mode   = $mode;
        $this->view->pages  = $this->stat->getPageReport($domain, $begin, $end, $pager);
        $this->view->pager  = $pager;

        $this->display();
    }

   /**
     * Click ranking.
     * 
     * @param  string   $mode 
     * @param  int      $begin 
     * @param  int      $end 
     * @access public
     * @return void
     */
    public function clickRank($mode = '', $begin = '', $end = '')
    {
        if(!$mode) $mode = date("H") < 10 ? 'yesterday' : 'today';

        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;
        $pages = $this->dao->select('*, sum(pv) as pv')->from(TABLE_STATREPORT)
            ->where('type')->eq('url')
            ->andWhere('item')->ne('')
            ->beginIf($mode != 'all')
            ->andWhere('timeType')->eq('day')
            ->andWhere('timeValue')->ge($begin)
            ->andWhere('timeValue')->le($end)
            ->fi()
            ->groupBy('item')
            ->orderBy('pv_desc')
            ->limit(100)
            ->fetchAll();

        $this->lang->menuGroups->stat = 'ranking';

        $this->view->title = $this->lang->stat->clickRank;
        $this->view->mode  = $mode;
        $this->view->pages = $pages;
        $this->view->begin = $begin;
        $this->view->end   = $end;
        $this->display();
    }

    /**
     * Article views and message ranking.
     * 
     * @param  string   $mode 
     * @param  string   $state 
     * @param  int      $begin 
     * @param  int      $end 
     * @access public
     * @return void
     */
    public function articleRank($mode = '', $state = 'pv', $begin = '', $end = '')
    {
        if(!$mode) $mode = date("H") < 10 ? 'yesterday' : 'today';

        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;
        $pages = $this->dao->select("t1.*, t2.title, t2.author, t2.addedDate, sum($state) as $state")->from(TABLE_STATREPORT)->alias('t1')
            ->leftjoin(TABLE_ARTICLE)->alias('t2')->on('t1.item = t2.id')
            ->where('t1.type')->eq('article')
            ->andWhere('t1.timeType')->eq('day')
            ->andWhere('t1.timeValue')->ge($begin)
            ->andWhere('t1.timeValue')->le($end)
            ->groupBy('item')
            ->orderBy($state . '_desc')
            ->fetchAll('item');

        if($mode == 'today' || $mode == 'yesterday')
        {
            $begin = date('Ymd', strtotime('-1 day',strtotime($begin)));
            $end   = date('Ymd', strtotime('-1 day',strtotime($end)));
        }
        if($mode == 'weekly') 
        {
            $begin = date('Ymd', strtotime('-1 week',strtotime($begin)));
            $end   = date('Ymd', strtotime('-1 week',strtotime($end)));
        }
        if($mode == 'monthly') 
        {  
            $begin = date('Ymd', strtotime('-1 month',strtotime($begin)));
            $end   = date('Ymd', strtotime('-1 month',strtotime($end)));
        }

        $rank = 0;
        foreach($pages as $item => $page)
        {
            $rank ++;
            if($rank > 5) break;
            $pages[$item]->numberChange = $page->{$state};
            $oldDate = $this->dao->select("sum($state) as $state")->from(TABLE_STATREPORT)
                ->where('type')->eq('article')
                ->andWhere('timeType')->eq('day')
                ->andWhere('timeValue')->ge($begin)
                ->andWhere('timeValue')->le($end)
                ->andWhere('item')->eq($page->item)
                ->groupBy('item')
                ->fetch($state);

            if($oldDate) $pages[$item]->numberChange = $page->{$state} - $oldDate;
        }

        $this->lang->menuGroups->stat = 'ranking';

        $this->view->title = $this->lang->stat->articleRank;
        $this->view->mode  = $mode;
        $this->view->state = $state;
        $this->view->pages = $pages;
        $this->view->begin = $begin;
        $this->view->end   = $end;
        $this->display();
    }

    /**
     * Product views and message ranking.
     * 
     * @param  string   $mode 
     * @param  string   $state 
     * @param  int      $begin 
     * @param  int      $end 
     * @access public
     * @return void
     */
    public function productRank($mode = '', $state = 'pv', $begin = '', $end = '')
    {
        if(!$mode) $mode = date("H") < 10 ? 'yesterday' : 'today';

        $date  = $this->stat->parseDate($mode, $begin, $end);
        $begin = $date->begin;
        $end   = $date->end;
        $pages = $this->dao->select("t1.*, t2.name, sum($state) as $state")->from(TABLE_STATREPORT)->alias('t1')
            ->leftjoin(TABLE_PRODUCT)->alias('t2')->on('t1.item = t2.id')
            ->where('t1.type')->eq('product')
            ->andWhere('t1.timeType')->eq('day')
            ->andWhere('t1.timeValue')->ge($begin)
            ->andWhere('t1.timeValue')->le($end)
            ->groupBy('item')
            ->orderBy($state . '_desc')
            ->fetchAll('item');

        if($mode == 'today' || $mode == 'yesterday')
        {
            $begin = date('Ymd', strtotime('-1 day',strtotime($begin)));
            $end   = date('Ymd', strtotime('-1 day',strtotime($end)));
        }
        if($mode == 'weekly') 
        {
            $begin = date('Ymd', strtotime('-1 week',strtotime($begin)));
            $end   = date('Ymd', strtotime('-1 week',strtotime($end)));
        }
        if($mode == 'monthly') 
        {  
            $begin = date('Ymd', strtotime('-1 month',strtotime($begin)));
            $end   = date('Ymd', strtotime('-1 month',strtotime($end)));
        }

        $rank = 0;
        foreach($pages as $item => $page)
        {
            $rank ++;
            if($rank > 5) break;
            $pages[$item]->numberChange = $page->{$state};
            $oldDate = $this->dao->select("sum($state) as $state")->from(TABLE_STATREPORT)
                ->where('type')->eq('product')
                ->andWhere('timeType')->eq('day')
                ->andWhere('timeValue')->ge($begin)
                ->andWhere('timeValue')->le($end)
                ->andWhere('item')->eq($page->item)
                ->groupBy('item')
                ->fetch($state);

            if($oldDate) $pages[$item]->numberChange = $page->{$state} - $oldDate;
        }

        $this->lang->menuGroups->stat = 'ranking';

        $this->view->title = $this->lang->stat->productRank;
        $this->view->mode  = $mode;
        $this->view->state = $state;
        $this->view->pages = $pages;
        $this->view->begin = $begin;
        $this->view->end   = $end;
        $this->display();
    }

    /**
     * Ignore keyword notice.
     *
     * @access public
     * @return void
     */
    public function ignoreKeyword()
    {
        $result = $this->loadModel('setting')->setItems('system.common.global', array('ignoreKeyword' => true));
        if($result) $this->send(array('result' => 'success', 'locate' => inlink('keywords')));
        $this->send(array('result' => 'fail', 'message' => $this->lang->fail));
    }

    /**
     * Set log.
     * 
     * @access public
     * @return void
     */
    public function setting()
    {
        if(!empty($_POST))
        {
            $setting = fixer::input('post')->get();
            if(!$setting->saveDays or !validater::checkInt($setting->saveDays)) $this->send(array('result' => 'fail', 'message' => $this->lang->site->saveDaysTip));
            if(!$setting->maxDays or !validater::checkInt($setting->maxDays))   $this->send(array('result' => 'fail', 'message' => $this->lang->stat->maxDaysTip));

            $this->loadModel('setting');
            $this->setting->setItem('system.stat.maxDays', $setting->maxDays);
            $result = $this->setting->setItem('system.common.site.saveDays', $setting->saveDays);
            if($result) $this->send(array('result' => 'success', 'message' => $this->lang->setSuccess));
            $this->send(array('result' => 'fail', 'message' => $this->lang->fail));
        }

        $this->lang->menuGroups->stat = 'statSetting';

        $this->view->title = $this->lang->stat->setting;
        $this->display();
    }
}
