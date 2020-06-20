<?php
/**
 * The html template file of download method of file module of RanZhi.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     RanZhi
 * @version     $Id$
 */
?>
<?php include '../../../../common/view/header.lite.html.php';?>
<div class='row' style='margin-top:100px'>
  <div class='col-md-8 col-md-offset-2'>
  <?php echo $this->fetch('score', 'noscore', array('method' => 'download', 'score' => $score));?>
  </div>
</div>
</body>
</html>
