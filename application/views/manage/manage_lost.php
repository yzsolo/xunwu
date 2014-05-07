<div class="fin_detail">
	<h3 class="page_num">第<span><?php echo $page_num ?></span>页</h3>
	<div class="pre_next">
		<a href="<?php echo base_url('index.php/manage/manage_pre/'.($page_num-1).'/l') ?>">上一页</a>
		<a href="<?php echo base_url('index.php/manage/manage_next/'.($page_num+1).'/l') ?>">下一页</a>
	</div>

	<?php foreach ($news as $news_item): ?>
	<ul>
		<li name="one"><?php echo $news_item['l_kind'] ?></li>
		<li><a href="<?php echo base_url("index.php/detail/pagel_detail/".$news_item['l_id']."") ?>"><?php echo $news_item['l_name'] ?></a></li>
		<li><?php echo $news_item['l_locale'] ?></li>
		<li><?php echo $news_item['l_time'] ?></li>
 		<li name="three"><a href="<?php echo base_url("index.php/detail/pagel_detail/".$news_item['l_id']."") ?>">[详情]</a></li>
 		<li name="del"><input type="button" value="删除"><?php echo $news_item['l_id'] ?></li>
	</ul>
    <?php endforeach ?>
</div>
<span name="kind" style="display:none">l</span>