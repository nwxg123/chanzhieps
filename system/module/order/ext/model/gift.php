<?php
/**
 * Print gift actions 
 * 
 * @param  object    $order 
 * @param  string    $btnLink 
 * @access public
 * @return string
 */
public function printGiftActions($order, $btnLink)
{
    if(RUN_MODE == 'front' and $order->status == 'normal') 
    {
        $isMobile = ($this->app->clientDevice == 'mobile');
        $class    = $isMobile ? "  btn btn-link " : "";
        
        /* Edit link. */
        $disabled = ($order->deliveryStatus == 'not_send') ? '' : "disabled='disabled'";
        echo $disabled ? '' : html::a(inlink('edit', "orderID={$order->id}"), $this->lang->order->edit, "data-toggle='modal' class='{$class}'");
        
        /* Track link. */
        $disabled = ($order->deliveryStatus != 'not_send') ? '' : "disabled='disabled'";
        echo $disabled ? '' : html::a(inlink('track', "orderID={$order->id}"), $this->lang->order->track, "data-rel='" . helper::createLink('order', 'confirmDelivery', "orderID=$order->id") . "' data-toggle='modal' class='{$class}'");
        
        /* Confirm link. */
        $disabled = ($order->deliveryStatus == 'send') ? '' : "disabled='disabled'";
        echo $disabled ? '' : html::a('javascript:;', $this->lang->order->confirmReceived, "data-rel='" . helper::createLink('order', 'confirmDelivery', "orderID=$order->id") . "' class='confirmDelivery {$class}'");
    }
    
    if(RUN_MODE == 'admin')
    {
        $class = $btnLink ? 'btn' : '';
        
        /* Send the goods link */
        $disabled = ($order->status == 'normal' and $order->deliveryStatus == 'not_send') ? '' : "disabled='disabled'"; 
        echo $disabled ? html::a('javascript:;', $this->lang->order->delivery, "$disabled class='$class'") : html::a(helper::createLink('order', 'delivery', "orderID=$order->id"), $this->lang->order->delivery, "data-toggle='modal' class='$class'");
        
        /* Track the express link */ 
        $disabled = ($order->status == 'normal' and $order->deliveryStatus == 'send') ? "" : "disabled='disabled'";
        echo $disabled ? html::a('javascript:;', $this->lang->order->track, "$disabled class='$class'") : html::a(helper::createLink('order', 'track', "orderID={$order->id}"), $this->lang->order->track, "class='$class' data-toggle='modal'");
        
        /* Finish link. */
        $disabled = ($order->status == 'normal' and $order->payStatus == 'paid' and $order->deliveryStatus == 'confirmed') ? '' : "disabled='disabled'";
        echo $disabled ? html::a('javascript:;', $this->lang->order->finish, "$disabled class='$class'") : html::a('javascript:;', $this->lang->order->finish, "data-rel='" . helper::createLink('order', 'finish', "orderID=$order->id") . "' class='finisher $class'");
        
        /* Delete order link. */
        $disabled = ($order->status == 'expired' or $order->status == 'canceled' or $order->status == 'finished') ? '' : "disabled='disabled'";
        echo $disabled ? html::a('javascript:;', $this->lang->order->delete, "$disabled class='$class'") : html::a(inlink('delete', "orderID=$order->id"), $this->lang->order->delete, "data-toggle='modal' class='$class deleter'"); 
    }

    $this->commonLink['savePayment'] = false;
}

/**
 * Print goods info of gift order.
 * 
 * @param  object    $order 
 * @access public
 * @return string
 */
public function printGiftGoods($order)
{
    foreach($order->products as $product)
    {
        $goods  = "<div class='text-left'>";
        $goods .= '<span>' . html::a(commonModel::createFrontLink('product', 'view', "id={$product->productID}"), $product->productName, "target='_blank'") . '</span>';
        $goods .= "<i class='icon icon-certificate text-muted'></i>" .  $product->score . ' &times; ' . $product->count . '</div>';
    }
    return $goods;
}
