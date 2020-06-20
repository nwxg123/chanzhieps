<?php foreach($attributeList as $category => $attributes):?>
<?php foreach($attributes as $attribute):?>
<tr class='attribute-tr'>
  <th><?php echo $attribute->name;?></th>
  <td><?php echo $this->attribute->printInput($attribute, $product);?>
</tr>
<?php endforeach;?>
<?php endforeach;?>
