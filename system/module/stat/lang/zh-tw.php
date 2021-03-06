<?php if(!defined("RUN_MODE")) die();?>
<?php
$lang->stat->common        = '統計';
$lang->stat->setting       = '設置';
$lang->stat->view          = '查看';
$lang->stat->traffic       = '流量概況';
$lang->stat->todayTraffic  = '今日流量';
$lang->stat->report        = '詳細報告';
$lang->stat->client        = '終端';
$lang->stat->guest         = '訪客人數';
$lang->stat->newGuest      = '新訪客數';
$lang->stat->newMember     = '新增會員';
$lang->stat->guestTotal    = '總訪客數';
$lang->stat->guestType     = '訪客類型';
$lang->stat->number        = '人數';
$lang->stat->summary       = '統計概況';
$lang->stat->device        = '設備類型';
$lang->stat->os            = '操作系統';
$lang->stat->browser       = '用戶終端';
$lang->stat->from          = '來源分類';
$lang->stat->keywords      = '關鍵詞統計';
$lang->stat->visitorStat   = '訪客統計';
$lang->stat->keyword       = '關鍵詞';
$lang->stat->outSite       = '來源網站統計';
$lang->stat->search        = '搜索引擎';
$lang->stat->domain        = '來路域名';
$lang->stat->clickRank     = '點擊排行';
$lang->stat->articleRank   = '文章排行';
$lang->stat->productRank   = '產品排行';
$lang->stat->link          = '連結';
$lang->stat->today         = '今天';
$lang->stat->yesterday     = '昨天';
$lang->stat->pv            = '瀏覽量(PV)';
$lang->stat->uv            = '訪客數(UV)';
$lang->stat->ipCount       = 'IP數';
$lang->stat->totalPV       = '總訪問數';
$lang->stat->searchEngine  = '搜索引擎';
$lang->stat->keywordReport = '關鍵詞詳細';
$lang->stat->domainList    = '來路域名';
$lang->stat->domainTrend   = '來路趨勢';
$lang->stat->articleTrend  = '文章趨勢';
$lang->stat->productTrend  = '產品趨勢';
$lang->stat->trendChart    = '趨勢圖';
$lang->stat->domainPage    = '來路頁面';
$lang->stat->percentage    = '百分比';
$lang->stat->ignoreKeyword = '忽略關鍵詞說明';
$lang->stat->keywordNotice = 'Google和百度取消了來路連結的關鍵詞顯示，因此無法統計其關鍵詞信息。';

$lang->stat->top10 = new stdclass();
$lang->stat->top10->pageview   = 'Top10受訪頁面';
$lang->stat->top10->article    = 'Top10文章';
$lang->stat->top10->product    = 'Top10產品';
$lang->stat->top10->forum      = 'Top10主題帖';
$lang->stat->top10->searchWrod = 'Top10搜索詞';

$lang->stat->all   = '全部';
$lang->stat->begin = '開始日期';
$lang->stat->end   = '結束日期';
$lang->stat->date  = '日期';

$lang->stat->noData    = '沒有數據';
$lang->stat->dateError = '時間錯誤';

$lang->stat->itemList = new stdclass();
$lang->stat->itemList->self    = '直接訪問';
$lang->stat->itemList->out     = '外鏈訪問';
$lang->stat->itemList->search  = '搜索引擎';
$lang->stat->itemList->desktop = '桌面端';
$lang->stat->itemList->mobile  = '移動端';

$lang->stat->trafficModes = new stdclass();
$lang->stat->trafficModes->yesterday = '昨日';
$lang->stat->trafficModes->today     = '今日';
$lang->stat->trafficModes->weekly    = '最近一周';
$lang->stat->trafficModes->monthly   = '最近30天';

$lang->stat->fromList = new stdclass();
$lang->stat->fromList->self   = '直接訪問';
$lang->stat->fromList->out    = '外鏈';
$lang->stat->fromList->search = '搜索引擎';

$lang->stat->guestTypes = new stdclass();
$lang->stat->guestTypes->guestTotal = '總訪客數';
$lang->stat->guestTypes->newGuest   = '新訪客數';

$lang->stat->dataTypes = new stdclass();
$lang->stat->dataTypes->pv = '瀏覽量(PV)';
$lang->stat->dataTypes->uv = '訪客數(UV)';
$lang->stat->dataTypes->ip = 'IP數';

$lang->stat->page = new stdclass();
$lang->stat->page->common  = '頁面訪問量';
$lang->stat->page->url     = '頁面地址';
$lang->stat->page->title   = '標題';
$lang->stat->page->name    = '產品名稱';
$lang->stat->page->author  = '作者';
$lang->stat->page->views   = '閲讀量';
$lang->stat->page->pv      = '訪問量';
$lang->stat->page->sales   = '銷量';
$lang->stat->page->message = '評論數';
$lang->stat->page->pubDate = '發佈時間';

$lang->stat->maxDays    = '概況圖顯示最大天數';
$lang->stat->maxDaysTip = '最大天數必須為為 >0 的數字。';
