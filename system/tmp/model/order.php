<?php
global $app;
helper::cd($app->getBasePath());
helper::import('D:\phpstudy_pro\WWW\chanzhieps\system\module\order\model.php');
helper::cd();
class extorderModel extends orderModel 
{
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

public function getList($type = 'all', $mode, $value, $orderBy = 'id_desc', $pager = null)
{
    return $this->loadExtension('mall')->getList($type, $mode, $value, $orderBy, $pager);
}

public function getPostedProducts($product, $count = 0)
{
    return $this->loadExtension('mall')->getPostedProducts($product, $count);
}

public function create()
{
    return $this->loadExtension('mall')->create();
}

public function cancel($orderID)
{
    return $this->loadExtension('mall')->cancel($orderID);
}

public function processOrder($order)
{
    if($order->payStatus == 'paid') return true;
    $this->loadExtension('mall')->processOrder($order);
    if(is_callable(array($this, "process{$order->type}Order"))) call_user_func(array($this, "process{$order->type}Order"), $order);
    return true;
}

public function delivery($orderID)
{
    return $this->loadExtension('mall')->delivery($orderID);
}

public function printActions($order, $btnLink = false, $source = '')
{
    $this->loadExtension('mall')->printActions($order, $btnLink, $source);
    if(is_callable(array($this, "print{$order->type}Actions"))) call_user_func(array($this, "print{$order->type}Actions"), $order, $btnLink, $source);
}

public function printShopActions($order, $btnLink = false, $source = '')
{
    $this->loadExtension('mall')->printShopActions($order, $btnLink, $source);
}

public function printScoreActions($order, $btnLink = false)
{
    $this->loadExtension('mall')->printScoreActions($order, $btnLink);
}

public function printRechargeActions($order, $btnLink = false)
{
    $this->loadExtension('mall')->printRechargeActions($order, $btnLink);
}

public function editPrice($orderID)
{
    return $this->loadExtension('mall')->editPrice($orderID);
}

public function getApiByID($id)
{
    return $this->loadExtension('mall')->getApiByID($id);
}

public function getApiList($orderBy = 'id_desc', $pager = null)
{
    return $this->loadExtension('mall')->getApiList($orderBy, $pager);
}

public function getApiListByAction($action)
{
    return $this->loadExtension('mall')->getApiListByAction($action);
}

public function createApi()
{
    return $this->loadExtension('mall')->createApi();
}

public function updateApi($apiID)
{
    return $this->loadExtension('mall')->updateApi($apiID);
}

public function notice($action, $order)
{
    return $this->loadExtension('mall')->notice($action, $order);
}

public function processRechargeOrder($order)
{
    return $this->loadExtension('mall')->processRechargeOrder($order);
}

public function edit($orderID)
{
    return $this->loadExtension('mall')->edit($orderID);
}

public function expressInfo($order = '')
{
    return $this->loadExtension('mall')->expressInfo($order);
}
public function printScoreGoods($order)
{
    return $this->loadExtension('mall')->printScoreGoods($order);
}

public function saveSetting()
{
    return $this->loadExtension('mall')->saveSetting();
}

public function createAlipayLink($order, $type = '')
{
    return $this->loadExtension('mall')->createAlipayLink($order, $type);
}

/**
 * Create PayPal link 
 * 
 * @param  int    $order 
 * @access public
 * @return void
 */
public function createPaypalLink($order)
{
    return inlink('paypalcheckout', "orderID={$order->id}");
}

/**
 * Get order from paypal.
 * 
 * @access public
 * @return void
 */
public function getOrderFromPaypal()
{
    $this->app->loadClass('paypal', true);
    $paypal = new paypal($this->config->paypal->mode);
    $result = $paypal->check();
    if(!$result) return false;
    if($result['result'] == 'paid') 
    {
        $orderID = $this->getRawOrder($result['invoice']);
        $order   = $this->getByID($orderID); 
        if(empty($order)) return false;
        $order->sn = $result['txn_id'];
        return $order;
    }

    return false;
}

/**
 * Save paypal log 
 * 
 * @access public
 * @return void
 */
public function savePaypalLog()
{
    $content = date('Y-m-d H:i:s') . "\n";
    foreach($_POST as $key => $val) $content .= "$key = $val\n";
    $content .= "----------------\n";
    $logFile = $this->app->getTmpRoot() . 'log/paypal.' . date('Ymd')  .  '.log';
    $handle = fopen($logFile, 'a');
    fwrite($handle, $content);
    fclose($handle);
}


//**//
}