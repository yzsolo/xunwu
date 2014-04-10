<!-- <div class="fin_detail"> -->
<?php foreach ($find_limit as $news_item): ?>
	<ul>
		<li name="one"><?php echo $news_item['f_kind'] ?></li>
		<li><a href="<?php echo base_url("index.php/detail/pagef_detail/".$news_item['f_id']."") ?>"><?php echo $news_item['f_name'] ?></a></li>
		<li><?php echo $news_item['f_locale'] ?></li>
		<li><?php echo $news_item['f_time'] ?></li>
		<li name="last"><?php echo $news_item['f_describ'] ?></li>
		<li name="three"><a href="<?php echo base_url("index.php/detail/pagef_detail/".$news_item['f_id']."") ?>">[详情]</a></li>
	</ul>
<?php endforeach ?>
	<div class="fin_detail_span" id="detail_span">
			<?php for($i=1;$i<=$find_num;$i++){ ?>
			<?php if($i == $cur_page){ ?>
				<div name="f" class="loc_a"><span class="loc_span"><?php echo $i ?></span></div>
			 <?php }else{ ?>
			<div name="f"><span><?php echo $i ?></span></div>
			<?php }} ?>
	</div>
	<div id="cur_page"><?php echo $cur_page ?></div>
	<?php echo $find_num ?>
<!-- </div> -->