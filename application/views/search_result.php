<div id="search_box">
	<div class="search_top">
		<div class="search_f">失物招领栏</div>
		<div class="search_l">失物发布栏</div>
	</div>
<!-- 	<div class="search_thekind">f</div>
 --><!--<?php foreach ($find as $news_item): ?>
			<ul>
				<li>商品编号：<?php echo $news_item['f_time'] ?></a></li>
				<li>库存数量：<?php echo $news_item['f_name'] ?></li>
			</ul>
<?php endforeach ?>-->
	<div class="search_con">
		<div class="search_find_con">
			<div class="search_fin_con">
		    	<div class="search_fin_nav">
					<ul>
						<li>物品类型</li>
						<li>物品名称</li>
						<li>丢失地点</li>
						<li>发布时间</li>
						<li>详情描述</li>
					</ul>
				</div> 
				<div class="fin_detail">
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
				    	 	<!--<a class="loc_a" name="f" href="<?php echo base_url("index.php/defaults/search_paging/".$i."/f") ?>">-->
				    	 	<div class="loc_a" name="f">
				    	 		<span class="loc_span"><?php echo $i ?></span>
				    	 	</div>
				    	 <?php }else{ ?>
				   		<div name="f">
				   			<span><?php echo $i ?></span>
				   		</div>
				   		<?php }} ?>
					</div>
					<div id="cur_page"><?php echo $cur_page ?></div>
					<?php echo $find_num ?>
				</div>
		    </div>
		</div>
		<div class="search_lost_con">
				    <div class="search_los_con">
		    	<div class="search_los_nav">
					<ul>
						<li>物品类型</li>
						<li>物品名称</li>
						<li>丢失地点</li>
						<li>发布时间</li>
						<li>详情描述</li>
					</ul>
				</div>
				<div class="los_detail">
					<?php foreach ($lost_limit as $news_item): ?>
					<ul>
						<li name="one"><?php echo $news_item['l_kind'] ?></li>
						<li><a href="<?php echo base_url("index.php/detail/pagel_detail/".$news_item['l_id']."") ?>"><?php echo $news_item['l_name'] ?></a></li>
						<li><?php echo $news_item['l_locale'] ?></li>
						<li><?php echo $news_item['l_time'] ?></li>
						<li name="last"><?php echo $news_item['l_describ'] ?></li>
						<li name="three"><a href="<?php echo base_url("index.php/detail/pagel_detail/".$news_item['l_id']."") ?>">[详情]</a></li>
					</ul>
				    <?php endforeach ?>
				    <div class="fin_detail_span" id="detail_span">
				    	<?php for($i=1;$i<=$lost_num;$i++){ ?>
				    	<?php if($i == $cur_page){ ?>
				    	 	<!--<a class="loc_a" href="<?php echo base_url("index.php/defaults/search_paging/".$i."/l") ?>"><span class="loc_span"><?php echo $i ?></span></a>-->
				    	 <div class="loc_a" name="l"><span class="loc_span"><?php echo $i ?></span></div>
				    	 <?php }else{ ?>
				   		<div name="l"><span><?php echo $i ?></span></div>
				   		<?php }} ?>
					</div>
					<div id="cur_page"><?php echo $cur_page ?></div>
				</div>
		    	
		    </div>
		</div>
	</div>
</div>