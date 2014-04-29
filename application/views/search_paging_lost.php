<!-- <div class="los_detail"> -->
<?php foreach ($lost_limit as $news_item): ?>
	<ul>
		<li name="one"><?php echo $news_item['l_kind'] ?></li>
		<li><a href="<?php echo base_url("index.php/detail/pagel_detail/".$news_item['l_id']."") ?>"><?php echo $news_item['l_name'] ?></a></li>
		<li><?php echo $news_item['l_locale'] ?></li>
		<li><?php echo $news_item['l_time'] ?></li>
		<li name="last"><?php echo strip_tags($news_item['l_describ']) ?></li>
		<li name="three"><a href="<?php echo base_url("index.php/detail/pagel_detail/".$news_item['l_id']."") ?>">[详情]</a></li>
	</ul>
<?php endforeach ?>

<div class="paging_box">
    <?php if($pre_l_btn==1){ ?>
    
   		<span class='pre_btn' name='l' style="width:50px;height:30px;line-height:30px">上一页</span>
   
   	<?php }else{ ?>
		
   	<?php } ?>
    <div class="fin_detail_span" id="detail_span">
    	<?php for($i=$default_l_start;$i<=$default_l_end;$i++){ ?>
    	<?php if($i == $cur_page){ ?>
    	 	<span class="loc_span" name='l'><?php echo $i ?></span>
    	 <?php }else{ ?>
   			<span name='l'><?php echo $i ?></span>
   		<?php }} ?>
	</div>
	<?php if($next_l_btn==1){ ?>
   		<span class='next_btn' name='l' style="width:50px;height:30px;line-height:30px">下一页</span>
   	<?php }else{ ?>
		<p>亲，没有了</p>
   	<?php } ?>
</div>

<!-- <div id="cur_page"><?php echo $cur_page ?></div>	
 -->