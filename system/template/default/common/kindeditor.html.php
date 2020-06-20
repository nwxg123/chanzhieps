{if(!defined("RUN_MODE"))} {!die()} {/if}
{$module = $control->moduleName}
{$method = $control->methodName}

{if(!isset($config->$module->editor->$method))} {@return ;} {/if}

{* Export $jsRoot var. *}
{!js::set('jsRoot', $jsRoot)}
{!js::set('webRoot', $webRoot)}

{* Get editor settings for current page. *}
{$editors = $config->{{$module}}->editor->$method}
{$temp = $editors['id'] = explode(',', $editors['id'])}
{!js::set('editors', $editors)}

{$control->app->loadLang('file')}
{!js::set('errorUnwritable', $lang->file->errorUnwritable)}

{* Get current lang. *}
{$editorLangs = array('en' => 'en', 'zh-cn' => 'zh_CN', 'zh-tw' => 'zh_TW')}
{$editorLang  = isset($editorLangs[$app->getClientLang()]) ? $editorLangs[$app->getClientLang()] : 'en'}
{!js::set('editorLang', $editorLang)}

{* Import js for kindeditor. *}
{!js::import($jsRoot  . 'kindeditor/kindeditor.min.js')}
{!js::import($jsRoot  . 'kindeditor/lang/' . $editorLang . '.js')}

{* set uid for upload. *}
{$uid = uniqid('')}
{!js::set('uid', $uid)}

<script>
{noparse}
var simple =
[ 'formatblock', 'fontsize', '|', 'bold', 'italic','underline', '|',
'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', '|',
'emoticons', 'image', 'media', 'link', '|', 'removeformat','undo', 'redo', 'source' ];

var full =
[ 'formatblock', 'fontsize', 'lineheight', '|', 'forecolor', 'hilitecolor', '|', 'bold', 'italic','underline', 'strikethrough', '|',
'justifyleft', 'justifycenter', 'justifyright', '|',
'emoticons', 'image', '|', 'link', 'unlink', 'anchor', 'flash', 'media', 'baidumap', '/',
'undo', 'redo', '|', 'cut', 'copy', '|', 'plainpaste', 'wordpaste', '|', 'removeformat', 'clearhtml','quickformat', '|',
'indent', 'outdent', 'subscript', 'superscript', 'insertorderedlist', 'insertunorderedlist', '|',
'table', 'code', 'hr', '|',
'fullscreen', 'source', 'about'];

$(document).ready(initKindeditor);
function initKindeditor(afterInit)
{
    $(':input[type=submit]').after("<input type='hidden' id='uid' name='uid' value=" + v.uid + ">");
    var nextFormControl = 'input:not([type="hidden"]), textarea:not(.ke-edit-textarea), button[type="submit"], select';

    $.each(v.editors.id, function(key, editorID)
    {
        if(typeof(v.editors.filterMode) == 'undefined') v.editors.filterMode = true;
        editorTool = eval(v.editors.tools);
        var K = KindEditor, $editor = $('#' + editorID);
        keEditor = K.create('#' + editorID,
        {
            width:'100%',
            items:editorTool,
            cssPath:[v.webRoot + 'zui/css/min.css'],
            bodyClass:'article-content',
            urlType:'absolute',
            uploadJson: createLink('file', 'ajaxUpload', 'uid=' + v.uid),
            imageTabIndex:1,
            filterMode:v.editors.filterMode,
            allowFileManager:false,
            langType:v.editorLang,
            htmlTags:{
            {/noparse}
            '{!str_replace(array("<",">"), array('', ','), $config->allowedTags->{{RUN_MODE}})}':["class","id","style"],
            {noparse}
            video: ["id", "class", "width", "height", "src", "controls"],
            object: ["type", "data", "width", "height"], param: ["name", "value"],
            audio: ["src", "controls", "id", "class", "width", "height"],
            font:["id","class","color","size","face",".background-color"],span:["id","class",".color",".background-color",".font-size",".font-family",".background",".font-weight",".font-style",".text-decoration",".vertical-align",".line-height"],div:["id","class","align",".border",".margin",".padding",".text-align",".color",".background-color",".font-size",".font-family",
            ".font-weight",".background",".font-style",".text-decoration",".vertical-align",".margin-left"],table:["id","class","border","cellspacing","cellpadding","width","height","align","bordercolor",".padding",".margin",".border","bgcolor",".text-align",".color",".background-color",".font-size",".font-family",".font-weight",".font-style",".text-decoration",".background",".width",".height",".border-collapse"],"td,th":["id","class","align","valign","width","height","colspan","rowspan","bgcolor",".text-align",
            ".color",".background-color",".font-size",".font-family",".font-weight",".font-style",".text-decoration",".vertical-align",".background",".border"],a:["id","class","href","target","name"],embed:["id","class","src","width","height","type","loop","autostart","quality",".width",".height","align","allowscriptaccess","allowfullscreen"],img:["id","class","src","width","height","border","alt","title","align",".width",".height",".border"],"p,ol,ul,li,blockquote,h1,h2,h3,h4,h5,h6":["id","class","align",".text-align",".color",
            ".background-color",".font-size",".font-family",".background",".font-weight",".font-style",".text-decoration",".vertical-align",".text-indent",".margin-left"],pre:["id","class"],hr:["id","class",".page-break-after"],"br,tbody,tr,strong,b,sub,sup,em,i,u,strike,s,del":["id","class"],iframe:["id","class","src","frameborder","width","height",".width",".height"],style:[]},

            {/noparse}
            {if(!$control->loadModel('file')->canUpload())} {!echo "showLocal:false, imageTabIndex:0,"} {/if}
            {noparse}
            syncAfterBlur: true,
            spellcheck: false,
            placeholderStyle: {fontSize: '14px', color: '#999'},
            pasteImage: {postUrl: createLink('file', 'ajaxPasteImage', 'uid=' + v.uid), placeholder: true}
        });
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
{/noparse}
</script>
