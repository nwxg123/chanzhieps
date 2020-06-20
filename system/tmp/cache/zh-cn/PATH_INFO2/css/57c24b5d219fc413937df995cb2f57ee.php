<?php if(!defined('RUN_MODE')) die();?>/* books */
.books {position: relative;}
.books dl{margin: 4px 0 0 10px; line-height: 20px;}
.books > dl {margin-left: 0;}
.books .article { padding: 0; border: none; box-shadow: none; margin: 0;margin-left :15px}
.book,.chapter,.books .article { line-height: 30px; padding: 4px 0; transition: all 0.3s; border-radius: 4px}
.book:before { content: '\e62a'; font-family: ZenIcon; display: inline-block; margin-right: 10px; font-weight: normal; font-size: 14px; width: 30px; height: 30px; color: #999; text-align: center; border: 1px solid #e1e1e1; border-radius: 15px; }
.book > strong,.chapter > strong,.books .article > strong { font-size: 16px; display: inline-block; }
.chapter > strong,.books .article > strong { font-size: 14px; }
.books .article > strong { font-weight: normal; }
.books .actions { display: inline-block; margin-left: 20px;}
.books .actions a { color: #999; font-weight: normal; }
.book:hover,.chapter:hover,.books .article:hover {background-color: #f6f6f6; }
.book:hover .actions a,.chapter:hover .actions a,.books .article:hover .actions a { color: #506EAF; }
.chapter, .books .article { line-height: 16px; }
.chapter .order,.books .article .order { display: inline-block; margin-right: 0; height: 20px; line-height: 20px; padding: 0 6px; text-align: center; border-radius: 5px; transition: all 0.3s;  }
.books dd:hover .order,.book:hover:before{border-color: #999}
.books dd.active > span,.books dd.active > a {font-weight:bold}

.catalog.chapter.dragging, .catalog.article.dragging {opacity: 0.25; background-color: #FFF4E5; border: 1px solid #fff}
.catalog.chapter.drag-shadow, .catalog.article.drag-shadow {background: #fff; border: 1px solid #ddd; box-shadow:0 1px 8px rgba(0,0,0,.15);}
.sort {cursor: move;}
.catalog {position: relative;}
.catalog.drop-to {background: none;}
.catalog.drop-to:before {display: block; background-color: #E48600; content: ' '; height: 1px; width: 100%; position: absolute; top: -1px}
.catalog.dragging .catalog.drop-to:before, .catalog.drop-to.dragging:before {display: none}
.catalog-empty {display: none; padding: 0; height: 10px; line-height: 5px!important}
dl.drop-area {background-color: #f1f1f1}
.show-empty-catalog .catalog-empty {display: block;}
.books > .catalog > .actions > .sort-handle {display: none}

.fullScreen-book{display: block; width: 100%; height: 100%;background-color:#fff}
.fullScreen-book > .panel{border: none; box-shadow: none;}
.fullScreen-book .fullScreen-header{height:80px;width:100%;overflow:hidden;border-bottom: 2px solid #5A66AD;}
.fullScreen-book .fullScreen-header > #siteLogo {float:left}
.fullScreen-book .fullScreen-header > #siteLogo img{max-height:60px;margin:10px 20px 10px 40px}
.fullScreen-book .fullScreen-header > #siteName {margin:0 20px;display:block;float:left;padding:0}
.fullScreen-book .fullScreen-header > #siteName > h2{margin:0;line-height:80px}
.fullScreen-book .fullScreen-catalog{position: absolute;top: 80px;left: 0; z-index: 1; width: 300px; height: 100%;overflow:hidden;padding-bottom:70px;background-color:#fff}
.fullScreen-book .fullScreen-catalog .panel-body{overflow-y:auto;width:300px;height:100%;border-right: 1px solid #F1F1F1;}
.fullScreen-book .fullScreen-content{position: absolute; top: 80px;left: 300px; height: 100%;right: 230px;overflow:hidden;overflow-y:auto;padding-bottom:20px;background-color:#fff}
.fullScreen-book .fullScreen-inner{margin: 0 auto;padding: 0px 60px;}
.fullScreen-book .fullScreen-content footer ul{background: #fafafa; display: block; position: fixed; bottom: 0; right: 20px; left: 320px; margin: 0; z-index: 1000;}
.fullScreen-book .fullScreen-nav {position:absolute;top:80px;right:0px; z-index: 1; width: 250px; height: 100%;background-color:#fff;border-left:1px solid #F1F1F1;padding-bottom:20px}
.fullScreen-book .home{margin: 0;}
.fullScreen-book .powerby{position: fixed; background: #fafafa; bottom: 0; height: 30px; line-height: 30px; left: 0; width: 282px; overflow: hidden;}
.fullScreen-book .powerby .icon-chanzhi{left: 0; position: absolute; top: 8px;}
.fullScreen-book .powerby a {display: block; margin: 0; padding-left: 36px; color: #777; position: relative;}
.fullScreen-book .powerby a > .name{display: block; overflow: hidden; position: absolute; width: 0;}

.items {padding-top:20px}
dd.closed > dl {display:none}
.panel-body .books a {color:#333}
.panel-body .books a:visited {color:#333}
.panel-body .books dd.active > a {color:#5C76DF}
.books dd > span {cursor:pointer}
.books dd > span > i {font-size:20px;color:#BCBCBC;width: 12px;display: inline-block;}
.books dd.closed > span > i:before {content: "\e6bb";}
.books dd.opened > span > i:before {content: "\e6b8";}
.books dd label {padding: 0px 5px; border: 1px solid #54a598; font-size: 12px; color: #54a598; letter-spacing: 0; text-align: center; margin-bottom: 0px; display: inline-block;line-height:16px; border-radius: 2px;margin-left:9px}
.books dd > span > label{color: #5A66AD; border-color: #5A66AD;margin-left:6px}

.book:hover, .chapter:hover, .books .article:hover {background-color:transparent}
.fullScreen-catalog .panel-heading {padding: 10px 15px;background-color:#5A66AD;color:#fff}
.fullScreen-catalog .panel-heading .dropdown-toggle{color:#fff}
.divider-line {height: 40px; margin: 20px 0px; border-left: 1px solid #F1F1F1;}
.title {color: #5A66AD; line-height: 80px;margin-left:20px}
.strong {font-size: 22px; font-weight: 600;}
.book-search {margin:auto;width:40%;margin-top:20px}
.book-search input {height:36px;padding-left:40px;}
.input-group .form-control:first-child {border-top-right-radius:3px;border-bottom-right-radius:3px}
.abstract {background-color: #F2F2F2; padding: 15px 10px;}
.book-search .input-group-btn {display:block}
.book-search .btn {position:absolute;left:0;top:1px;z-index:10;border:none;box-shadow:none;background:none;color: #808080;height:36px;padding:5px 15px}
.book-search .btn > i {font-size:18px}
.fullScreen-btn {font-size:16px;color:#333;margin-left:30px}
.header-right {line-height:80px;float:right;margin-right:50px}
.article > .article-content {padding-top: 0; }
.article-content > .content {max-width: 900px; }
.article-content > .nav-content {float: right; max-width: 360px; background-color: #fafafa; border: 1px solid #e5e5e5; margin: 10px 0 20px 20px; border-radius: 4px; padding: 10px 0;}
.article-content > .nav-content > li > a {padding:5px 20px; text-shadow: #FFF 0px 1px 0px; }
.fullScreen-nav > .nav-content {position: absolute; top: 30%; transform: translateY(-30%);margin-left:30px;list-style:disc;}
.fullScreen-nav > .nav-content > li {display:list-item}
.fullScreen-nav > .nav-content > li > a {padding:5px 0px; text-shadow: #FFF 0px 1px 0px;width: 219px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;}
.fullScreen-nav > .nav-content > li > a.active {color:#5C76DF}
#bookInfoLink{margin-left:20px;}
.activeBookInfo{font-weight:bold;}
.pull-right > .dropdown-menu {top:40px}
.previous > a, .next > a{overflow: hidden;}
.previous > a > span, .next > a > span{display: inline-block; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; vertical-align: middle;}
.icon-arrow-left, .icon-arrow-right{vertical-align: middle;}

.icon-previous {position: fixed; top: 40%; left: 310px;}
.icon-next {position: fixed; top: 40%; right: 260px;}
.icon-previous a, .icon-next a {text-decoration:none;}
.icon-previous i, .icon-next i {font-size:26px;color:#999}
.icon-previous.disabled i, .icon-next.disabled i {color:#ccc}
