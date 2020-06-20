<?php
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


