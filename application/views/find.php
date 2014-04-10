<div id="fin_con">
	<div class="fin_con_detail">
		<div class="fin_tab">
			<p>所有招领信息<span>按物品类型查询</span></p>
			<select class='fin_tab_select'>
				<a href="#"><option value="选择类型">选择类型</option></a>
				<a href="#"><option value="书籍资料">书籍资料</option></a>
				<a href="#"><option value="衣物饰品">衣物饰品</option></a>
				<a href="#"><option value="交通工具">交通工具</option></a>
				<a href="#"><option value="随身物品">随身物品</option></a>
				<a href="#"><option value="电子数码">电子数码</option></a>
				<a href="#"><option value="卡类证件">卡类证件</option></a>
				<a href="#"><option value="其他物品">其他物品</option></a>
			</select>
		</div>
		<div class="fin_con_box">
		    <div class="fin_con">
		    	<div class="fin_nav">
					<ul>
						<li>物品类型</li>
						<li>物品名称</li>
						<li>丢失地点</li>
						<li>发布时间</li>
						<li>详情描述</li>
					</ul>
				</div> 
				<div class="fin_detail">
					<?php foreach ($news as $news_item): ?>
					<ul>
						<li name="one"><?php echo $news_item['f_kind'] ?></li>
						<li><a href="<?php echo base_url("index.php/detail/pagef_detail/".$news_item['f_id']."") ?>"><?php echo $news_item['f_name'] ?></a></li>
						<li><?php echo $news_item['f_locale'] ?></li>
						<li><?php echo $news_item['f_time'] ?></li>
						<li name="last"><nobr><?php echo $news_item['f_describ'] ?></nobr></li>
						<li name="three"><a href="<?php echo base_url("index.php/detail/pagef_detail/".$news_item['f_id']."") ?>">[详情]</a></li>
					</ul>
				    <?php endforeach ?>

				    <div class="paging_box">
				    <?php if($pre_btn==1){ ?>
				   		<a class="pre_btn" href="<?php echo base_url("index.php/find/pagef_paging/".($cur_page-1)."") ?>">上一页</a>
				   	<?php }else{ ?>
						
				   	<?php } ?>
				    <div class="fin_detail_span" id="detail_span">
				    	<?php for($i=$default_start;$i<=$default_end;$i++){ ?>
				    	<?php if($i == $cur_page){ ?>
				    	 	<a class="loc_a" href="<?php echo base_url("index.php/find/pagef_paging/".$i."") ?>"><span class="loc_span"><?php echo $i ?></span></a>
				    	 <?php }else{ ?>
				   		<a href="<?php echo base_url("index.php/find/pagef_paging/".$i."") ?>"><span><?php echo $i ?></span></a>
				   		<?php }} ?>
					</div>
					<?php if($next_btn==1){ ?>
				   		<a class="next_btn" href="<?php echo base_url("index.php/find/pagef_paging/".($cur_page+1)."") ?>">下一页</a>
				   	<?php }else{ ?>
						<p>亲，没有了</p>
				   	<?php } ?>
				   </div>
					<!-- <div id="cur_page"><?php echo $cur_page ?></div> -->
				</div>
		    </div>
	    </div>
	</div>
</div>