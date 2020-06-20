<div class='article'>
  <header>
    <h1><?php $case->company;?></h1>
    <div>
      <?php echo printf($lang->usercase->lblAddedDate, $case->addedDate);?>
      <?php echo printf($lang->usercase->lblAuthor,    $case->author);?>
      <?php echo printf($lang->usercase->lblViews, $case->views);?>
    </div>
  </header>
  <section class='article-content'>
    <div id='snap' class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
      <?php $i = 0;?>
      <?php foreach($case->snap['image'] as $image):?>
        <div class="item <?php if($i == 0) {echo 'active';@$i++;}?>"><img src="<?php echo $config->usercase->snapURL . $image;?>"></div>
      <?php endforeach;?>
      </div>
      <a class="left carousel-control" href="#snap" data-slide="prev">
        <span class="icon icon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#snap" data-slide="next">
        <span class="icon icon-chevron-right"></span>
      </a>
    </div>
    <ul>
      <li><strong><?php echo $lang->usercase->company   . $lang->colon;?></strong><?php echo $case->company;?></li>
      <li><strong><?php echo $lang->usercase->industry  . $lang->colon;?></strong><?php echo (isset($industries[$case->industry]) ? $industries[$case->industry] : '');?></li>
      <li><strong><?php echo $lang->usercase->area      . $lang->colon;?></strong><?php echo $this->usercase->formatArea($case->area);?></li>
      <?php if(preg_match('/[^0-9a-zA-Z_\-:\/\.]/', $case->site)) {$case->site = '';}?>
      <li>
          <strong><?php echo $lang->usercase->site      . $lang->colon;?></strong>
          <span <?php echo $case->site ? " onclick='openWindow(\"$case->site\")' style='color:#0D3D88;cursor:pointer;'" : '';?>><?php echo $case->site;?></span>
      </li>
      <li><strong><?php echo $lang->usercase->keywords . $lang->colon;?></strong><?php echo $case->keywords;?></li>
      <li><strong><?php echo $lang->usercase->desc     . $lang->colon;?></strong><br/>
      <?php echo htmlspecialchars_decode($case->desc);?>
      </li>
    </ul>
  </section>
</div>
<?php if($mode == 'front') {$control->fetch('message', 'comment', "object=usercase&id=$case->id");}?>
<script>
function openWindow(site)
{
    var tempwindow = window.open('_blank');
    tempwindow.location = site;
}
</script>
