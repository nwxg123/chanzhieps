{*php
/**
 * The report view file of usercase module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     LGPL (http://www.gnu.org/licenses/lgpl.html)
 * @author      Congzhi Chen<CongzhiChen@cnezsoft.com>
 * @package     usercase
 * @version     $Id$
 * @link        http://www.zsite.com
 */
/php*}
{include TPL_ROOT . 'common/header.html.php'}
{include TPL_ROOT . 'common/chart.html.php'}
<div class='row'>
  <div class='col-md-2 side'>{include TPL_ROOT . 'usercase/blockleft.html.php'}</div>
  <div class='col-md-10'> 
    <div class='panel'>
      <div class='panel-heading'><strong>{$lang->usercase->reports}</strong></div>
      <table class='table active-disabled'>
        <tr class='text-top'>
          <td>
            <div class='chart-wrapper text-center'>
              <h5>{$chartOption}</h5>
              <div class='chart-canvas'><canvas id='chart-pie' width='600' height='260' data-responsive='true'></canvas></div>
            </div>
          </td>
          <td style="width: 260px;">
            <div style="overflow:auto; height: 400px;" class='table-wrapper'>
              <table class='table table-condensed table-hover table-striped table-bordered table-chart' data-chart='pie' data-target='#chart-pie' data-animation='false'>
                <thead>
                  <tr class='text-center'>
                    <th class='w-20px'></th>
                    <th>{$lang->usercase->$type}</th>
                    <th class='w-50px'>{$lang->usercase->amount}</th>
                    <th class='w-40px'>{$lang->percent}</th>
                  </tr>
                </thead>
                <tbody>
                {foreach($chartDatas as $data)}
                  <tr class='text-center'>
                    <td class='chart-color'><i class='chart-color-dot icon-circle'></i></td>
                    <td class='chart-label text-left'>{$data->name}</td>
                    <td class='chart-value'>{$data->value}</td>
                    <td>{!echo ($data->percent * 100) . '%'}</td>
                  </tr>
                {/foreach}
                </tbody>
              </table>
            </div>
          </td>
        </tr>
      </table>
    </div>
</div>
{include TPL_ROOT . 'common/footer.html.php'}

