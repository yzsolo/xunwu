
<?php foreach ($news as $news_item): ?>
		<ul>
			<li name="one"><?php echo $news_item['f_kind'] ?></li>
			<li><a href="<?php echo base_url("index.php/detail/pagef_detail/".$news_item['f_id']."") ?>"><?php echo $news_item['f_name'] ?></a></li>
			<li><?php echo $news_item['f_locale'] ?></li>
			<li><?php echo $news_item['f_time'] ?></li>
			<li name="last"><?php echo $news_item['f_describ'] ?></li>
			<li name="three"><a href="<?php echo base_url("index.php/detail/pagef_detail/".$news_item['f_id']."") ?>">[详情]</a></li>
		</ul>
	    <?php endforeach ?>

	    <div class="paging_box">
		    <?php if($pre_btn==1){ ?>
		   		<a class="pre_btn" href="<?php echo base_url("index.php/find/find_part_paging/".urlencode($kind)."/".($cur_page-1)."") ?>">上一页</a>
		   	<?php }else{ ?>
				
		   	<?php } ?>
		 <div class="fin_detail_span" id="detail_span">
		 	<?php $kind = (string)$news[0]['f_kind'] ?>
	   		<?php for($i=$default_start;$i<=$default_end;$i++){ ?>
	   		<?php if($i == $cur_page){ ?>
	    	 	<a class="loc_a" href="<?php echo base_url("index.php/find/find_part_paging/".urlencode($kind)."/".$i."") ?>"><span class="loc_span"><?php echo $i ?></span></a>
	    	 <?php }else{ ?>
	   			<a href="<?php echo base_url("index.php/find/find_part_paging/".urlencode($kind)."/".$i."") ?>"><span><?php echo $i ?></span></a>
	   		<?php }} ?>
		</div>
		<?php if($next_btn==1){ ?>
		   		<a class="next_btn" href="<?php echo base_url("index.php/find/find_part_paging/".urlencode($kind)."/".($cur_page+1)."") ?>">下一页</a>
		   <?php }elseif($next_btn==0){ ?>
				<p>亲，没有了</p>
		   	<?php }else{}?>
		</div>
		<?php echo $kind ?>
		<div id="cur_page"><?php echo $cur_page ?></div>

	