  <h3 class="floated" style="float:left"><?php i18n(BLOGFILE.'/MANAGE_POSTS'); ?></h3>
  <div class="edit-nav">
    <p class="text 1">
      <a href="load.php?id=<?php echo BLOGFILE; ?>&create_post"><?php i18n(BLOGFILE.'/NEW_POST_BUTTON'); ?></a>
      <?php if(!empty($all_posts) && !isset($_GET['search'])) { ?><a href="#" id="metadata_toggle"><?php i18n(BLOGFILE.'/SEARCH'); ?></a><?php } ?>
    </p>
    <div class="clear"></div>
  </div>
  <p class="text 2"><?php i18n(BLOGFILE.'/MANAGE_POSTS_DESC'); ?></p>
  <style>#metadata_window p {margin: 0 0 10px 0;}</style>
  <?php $search_display = (isset($_GET['search'])) ? 'block' : 'none'; ?>
  <div id="metadata_window" style="display:<?php echo $search_display; ?>;text-align:left;padding:10px 15px;">
    <form class="largeform" action="load.php" method="get">
      <input type="hidden" name="id" value="<?php echo BLOGFILE; ?>" />
      <label for="page-url"  style="display:inline;margin-right:15px;"><?php i18n(BLOGFILE.'/SEARCH'); ?>:</label>
      <input class="text" type="text" name="search" value="" style="height:16px;width:150px;margin-right:15px !important;" />
      <input class="submit" type="submit" name="" value="<?php i18n(BLOGFILE.'/SEARCH'); ?>" style="width:auto;height:24px;padding:3px 10px;" />
      <a href="load.php?id=<?php echo BLOGFILE; ?>" class="button" style="padding:5px 10px;font-size:11px;"><?php i18n(BLOGFILE.'/CANCEL'); ?></a>
    </form>
    <div class="clear"></div>
  </div>
  <?php
  if (isset($_GET['search'])) {
    echo '<h4 style="text-align:center;font-weight:bold;margin-bottom:15px;">'.i18n_r(BLOGFILE.'/NO_POSTS_MATCH_SEARCH').'<h4>';
  } elseif (empty($all_posts)) {
		echo '<h5 style="text-align:center;">'.i18n_r(BLOGFILE.'/NO_POSTS').' <a href="load.php?id='.BLOGFILE.'&create_post">'.i18n_r(BLOGFILE.'/CLICK_TO_CREATE').'</a>.</h5>';
	} else {
  ?>
		<table class="edittable highlight paginate" id="datatable">
			<tr>
				<th><?php i18n(BLOGFILE.'/PAGE_TITLE'); ?></th>
				<th><?php i18n(BLOGFILE.'/DATE'); ?></th>
				<th></th>
			</tr>
		<?php
		foreach($all_posts as $post_name) {
			$post = $Blog->getPostData($post_name['filename']);
			?>
				<tr>
					<td><a title="<?php echo $post->title; ?>" href="load.php?id=<?php echo BLOGFILE; ?>&edit_post=<?php echo $post->slug; ?>" ><?php echo getExcerpt($post->title,80,false,' ...',false,false); ?></a></td>
					<td style="width:135px;"><?php $date=(string)$post->date; echo $Blog->get_locale_date(strtotime($date), i18n_r(BLOGFILE.'/DATE_FORMAT')); ?></td>
					<td class="delete"><a class="delconfirm" href="load.php?id=<?php echo BLOGFILE; ?>&delete_post=<?php echo $post->slug; ?>" title="<?php i18n(BLOGFILE.'/DELETE'); ?>: <?php echo $post->title; ?>" >&times;</a></td>
				</tr>
			<?php
		}
		echo '</table>';
	} 
  
  if(!empty($all_posts)) {
  
  ?>
  <div id="metadata_window" style="margin:0;padding:5px;">
    <div style="text-align:center;line-height:23px;">
      <div id="pageNavPosition"></div>
    </div>
    <div class="clear"></div>
  </div>
  
  <script type="text/javascript"><!--
    var pager;
    document.addEventListener("DOMContentLoaded", function(event) { 
      pager = new Pager('datatable', <?php echo $Blog->getSettingsData("postperpage"); ?>); 
      pager.init(); 
      pager.showPageNav('pager', 'pageNavPosition'); 
      pager.showPage(1);
    });
  //--></script>
  <?php } ?>
