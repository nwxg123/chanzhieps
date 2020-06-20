<?php if(!defined("RUN_MODE")) die();?>
<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<?php
/* Get current module and method. */
$module = $this->moduleName;
$method = $this->methodName;

if(!isset($config->$module->editor->$method)) return;

/* Export $jsRoot var. */
js::set('jsRoot', $jsRoot);
js::set('webRoot', $webRoot);

/* Get editor settings for current page. */
$editors = $config->$module->editor->$method;

$editors['id'] = explode(',', $editors['id']);
js::set('editors', $editors);

$this->app->loadLang('file');
js::set('errorUnwritable', $lang->file->errorUnwritable);

/* Get current lang. */
$editorLangs = array('en' => 'en', 'zh-cn' => 'zh_CN', 'zh-tw' => 'zh_TW');
$editorLang  = isset($editorLangs[$app->getClientLang()]) ? $editorLangs[$app->getClientLang()] : 'en';
js::set('editorLang', $editorLang);

/* Import js for kindeditor. */
js::import($jsRoot  . 'kindeditor/kindeditor.min.js');
js::import($jsRoot  . 'kindeditor/lang/' . $editorLang . '.js');

/* set uid for upload. */
$uid = uniqid('');
js::set('uid', $uid);
?>
<style>
.ke-toolbar,
.ke-edit-iframe {overflow: hidden!important}
</style>
<script>
var simple =
[ 'formatblock', 'fontsize', '|', 'bold', 'italic','underline', '|',
'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', '|',
'emoticons', 'image', 'link', '|', 'removeformat','undo', 'redo', 'source' ];

var full =
[ 'formatblock', 'fontsize', 'lineheight', '|', 'forecolor', 'hilitecolor', '|', 'bold', 'italic','underline', 'strikethrough', '|',
'justifyleft', 'justifycenter', 'justifyright', '|',
'emoticons', 'image', '|', 'link', 'unlink', 'anchor', 'flash', 'media', 'baidumap', '/',
'undo', 'redo', '|', 'cut', 'copy', '|', 'plainpaste', 'wordpaste', '|', 'removeformat', 'clearhtml','quickformat', '|',
'indent', 'outdent', 'subscript', 'superscript', 'insertorderedlist', 'insertunorderedlist', '|', 'table', 'code', 'hr', '|',
'fullscreen', 'source', 'about'];

var editorTool  = v.editors.tools === 'full' ? full : simple;
var isIEBrowser = $.zui.browser.isIE();

$.extend(KindEditor, {getOptions: function(K, editorID)
{
    return {
        width: '100%',
        items: editorTool,
        cssPath: [v.webRoot + 'zui/css/admin.min.css'],
        cssData: (isIEBrowser ? 'body{overflow:hidden}' : '') + 'html,body {background: none;}.article-content, .article-content table td, .article-content table th {line-height: 1.3846153846; font-size: 13px;} .article-content table.table-kindeditor th, .article-content table.table-kindeditor td {padding: 5px 8px;} .article-content table.ke-zeroborder.table-kindeditor td {border: 1px dotted #AAA;} .article-content .table-auto {width: auto!important; max-width: 100%;}',
        bodyClass: 'article-content',
        urlType: 'absolute',
        uploadJson: createLink('file', 'ajaxUpload', 'uid=' + v.uid),
        <?php if(RUN_MODE == 'admin'):?>
        fileManagerJson : createLink('file', 'fileManager'),
        <?php endif;?>
        imageTabIndex:1,
        filterMode: v.editors.filterMode,
        allowFileManager: true,
        langType: v.editorLang,
        htmlTags: {
        '<?php echo str_replace(array("<",">"), array('', ','), $config->allowedTags->{RUN_MODE});?>':["class","id","style"],
        video: ["id", "class", "width", "height", "src", "controls"],
        object: ["type", "data", "width", "height"], param: ["name", "value"],
        audio: ["src", "controls", "id", "class", "width", "height"],
        font:["id","class","color","size","face",".background-color"],span:["id","class",".color",".background-color",".font-size",".font-family",".background",".font-weight",".font-style",".text-decoration",".vertical-align",".line-height"],div:["id","class","align",".border",".margin",".padding",".text-align",".color",".background-color",".font-size",".font-family",
        ".font-weight",".background",".font-style",".text-decoration",".vertical-align",".margin-left"],table:["id","class","border","cellspacing","cellpadding","width","height","align","bordercolor",".padding",".margin",".border","bgcolor",".text-align",".color",".background-color",".font-size",".font-family",".font-weight",".font-style",".text-decoration",".background",".width",".height",".border-collapse"],"td,th":["id","class","align","valign","width","height","colspan","rowspan","bgcolor",".text-align",
        ".color",".background-color",".font-size",".font-family",".font-weight",".font-style",".text-decoration",".vertical-align",".background",".border"],a:["id","class","href","target","name"],embed:["id","class","src","width","height","type","loop","autostart","quality",".width",".height","align","allowscriptaccess","allowfullscreen"],img:["id","class","src","width","height","border","alt","title","align",".width",".height",".border"],"p,ol,ul,li,blockquote,h1,h2,h3,h4,h5,h6":["id","class","align",".text-align",".color",
        ".background-color",".font-size",".font-family",".background",".font-weight",".font-style",".text-decoration",".vertical-align",".text-indent",".margin-left"],pre:["id","class"],hr:["id","class",".page-break-after"],"br,tbody,thead,tr,strong,b,sub,sup,em,i,u,strike,s,del":["id","class"],iframe:["id","class","src","frameborder","width","height",".width",".height"],style:[]},
        syncAfterBlur: true,
        spellcheck: false,
        placeholderStyle: {fontSize: '14px', color: '#999'},
        pasteImage: {postUrl: createLink('file', 'ajaxPasteImage', 'uid=' + v.uid), placeholder: true}
        <?php /* fix scrollbar in ie, see https://xirang.5upm.com/bug-view-1055.html */ ?>
        ,afterCreate: isIEBrowser && function()
        {
            var $doc = $(this.edit.doc);
            $doc.one('scroll', function() {
                $doc.find('body').css('overflow', 'auto');
            });
        }
    }
}});

$(document).ready(initKindeditor);
function initKindeditor(afterInit)
{
    $(':input[type=submit]').after("<input type='hidden' id='uid' name='uid' value=" + v.uid + ">");
    var nextFormControl = 'input:not([type="hidden"]), textarea:not(.ke-edit-textarea), button[type="submit"], select';

    $.each(v.editors.id, function(key, editorID)
    {
        if(typeof(v.editors.filterMode) == 'undefined') v.editors.filterMode = true;

        var K = KindEditor, $editor = $('#' + editorID);
        var keEditor = K.create('#' + editorID, K.getOptions(K, editorID));

        try
        {
            if(!window.editor) window.editor = {};
            window.editor['#'] = window.editor[editorID] = keEditor;
            $editor.data('keditor', keEditor);
        }
        catch(e){}
    });

    if($.isFunction(afterInit)) afterInit();
}
</script>
