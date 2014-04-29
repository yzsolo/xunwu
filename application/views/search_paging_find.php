<!-- <div class="fin_detail"> -->
<?php foreach ($find_limit as $news_item): ?>
	<ul>
		<li name="one"><?php echo $news_item['f_kind'] ?></li>
		<li><a href="<?php echo base_url("index.php/detail/pagef_detail/".$news_item['f_id']."") ?>"><?php echo $news_item['f_name'] ?></a></li>
		<li><?php echo $news_item['f_locale'] ?></li>
		<li><?php echo $news_item['f_time'] ?></li>
		<li name="last"><?php echo strip_tags($news_item['f_describ']) ?></li>
		<li name="three"><a href="<?php echo base_url("index.php/detail/pagef_detail/".$news_item['f_id']."") ?>">[详情]</a></li>
	</ul>
<?php endforeach ?>

 <div class="paging_box">
    <?php if($pre_f_btn==1){ ?>
    
   		<span class='pre_btn' name='f' style="width:50px;height:30px;line-height:30px">上一页</span>
   
   	<?php }else{ ?>
		
   	<?php } ?>
    <div class="fin_detail_span" id="detail_span">
    	<?php for($i=$default_f_start;$i<=$default_f_end;$i++){ ?>
    	<?php if($i == $cur_page){ ?>
    	 	<span class="loc_span" name='f'><?php echo $i ?></span>
    	 <?php }else{ ?>
   			<span name='f'><?php echo $i ?></span>
   		<?php }} ?>
	</div>
	<?php if($next_f_btn==1){ ?>
   		<span class='next_btn' name='f' style="width:50px;height:30px;line-height:30px">下一页</span>
   	<?php }else{ ?>
		<p>亲，没有了</p>
   	<?php } ?>
</div>
 		
<!-- <div id="cur_page"><?php echo $cur_page ?></div>
 -->