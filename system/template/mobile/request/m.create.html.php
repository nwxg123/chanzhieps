{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
<div class='panel-section'>
  <div class='panel-body'>
    <form class='box' method='post' id='requestAjaxForm'>
      <div class='control'>
        <label for='product'>{$lang->request->product}</label>
        <div class="select">
          {!html::select('product', $productList, $productID, "class='form-control product-options'")}
        </div>
      </div>
      {if(!empty($categories))}
      <div class='control'>
        <label for='category'>{$lang->request->category}</label>
        {!html::select('category', $categories, '', "class='form-control'")}
      </div>
      {/if}
      <div class='control'>
        <label for='title'>{$lang->request->title}</label>
        {!html::input('title', '', "class='form-control'")}
      </div>
      <div class='control'>
        <label for='desc'>{$lang->request->desc}</label>
        {!html::textarea('desc', '', "class='form-control' rows=5")}
      </div>
      <div class='control'>
        {!html::submitButton('', 'btn block primary')}
      </div>
    </form>
  </div>
</div>
{if(isset($pageJS))} {!js::execute($pageJS)} {/if}