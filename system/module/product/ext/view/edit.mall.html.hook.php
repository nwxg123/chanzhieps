<?php js::set('productID', $product->id);?>
<table id='exchangeForm' class='hide'>
  <tbody>
    <tr>
      <th><?php $lang->product->isGift;?></th>
      <td><?php html::radio('isGift', $lang->product->isGiftOptions, $product->isGift, "class='checkbox'");?></td>
    </tr>
    <tr>
      <th><?php $lang->product->exchangeLimit;?></th>
      <td><?php html::radio('exchangeLimit', $product->exchangeLimit, "class='form-control' placeholder='{$lang->prodcut->placeholder->exchangeLimit}'");?></td>
    </tr>

  </tbody>
</table>
