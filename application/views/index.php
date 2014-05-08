<div id="ind_con">
	<div class="ind_con_detail">
		<div class="ind_tab">
			<div class="ind_tab_lost">最新失物信息</div>
			<div class="ind_tab_find">最新招领信息</div>
		</div>
		<div class="ind_tab_con_box">
		    <div class="ind_tab_find_con">
		    	<div class="ind_tab_find_nav">
					<ul>
						<li>物品类型</li>
						<li>物品名称</li>
						<li>丢失地点</li>
						<li>发布时间</li>
						<li>详情描述</li>
					</ul>
				</div>
				<div class="ind_tab_find_detail">
					<?php foreach ($f_news as $ind_fnews): ?>
					<ul>
						<li><?php echo $ind_fnews['f_kind'] ?></li>
						<li><a class="li_hidden" href="<?php echo base_url("index.php/detail/pagef_detail/".$ind_fnews['f_id']."") ?>"><nobr><?php echo $ind_fnews['f_name'] ?></nobr></a></li>
						<li class="li_hidden"><nobr><?php echo $ind_fnews['f_locale'] ?></nobr></li>
						<li><?php echo $ind_fnews['f_time'] ?></li>
						<li name="last" class="li_hidden"><nobr><?php echo strip_tags($ind_fnews['f_describ']) ?></nobr></li>
					</ul>
					<?php endforeach ?>
					<span><a href="<?php echo base_url('index.php/find/page_find') ?>">更多信息</a></span>
				</div>
		    </div>
		    <div class="ind_tab_lost_con">
				<div class="ind_tab_lost_nav">
					<ul>
						<li>物品类型</li>
						<li>物品名称</li>
						<li>丢失地点</li>
						<li>发布时间</li>
						<li>详情描述</li>
					</ul>
				</div>
				<div class="ind_tab_lost_detail">
					<?php foreach ($l_news as $ind_lnews): ?>
					<ul>
						<li><?php echo $ind_lnews['l_kind'] ?></li>
						<li><a class="li_hidden" href="<?php echo base_url("index.php/detail/pagel_detail/".$ind_lnews['l_id']."") ?>"><nobr><?php echo $ind_lnews['l_name'] ?></nobr></a></li>
						<li class="li_hidden"><nobr><?php echo $ind_lnews['l_locale'] ?></nobr></li>
						<li><?php echo $ind_lnews['l_time'] ?></li>
						<li name="last" class="li_hidden"><nobr><?php echo strip_tags($ind_lnews['l_describ']) ?></nobr></li>
					</ul>
					<?php endforeach ?>
					<span><a href="<?php echo base_url('/index.php/lost/page_lost') ?>">更多信息</a></span>
				</div>

		    </div>
	    </div>
	</div>
	<div id="enter_ad">
		<div class="enter">
			<p>欢迎来到民大寻物网，快来发布你的失物招领信息吧！</p>
			<a href="<?php echo base_url('/index.php/descri_lost/page_descri_l') ?>"><div class="i_lost">我丢东西了</div></a>
			<a href="<?php echo base_url('/index.php/descri_find/page_descri_f') ?>"><div class="i_find">我捡东西了</div></a>
		</div>
	    <div class="ad_one">
	    	<!-- <a target="_blank" href="http://www.stuzone.com/zixunminda/blog/" title="资讯民大微信公众平台"><img src="<?php echo base_url('/resource/img/zixunminda.jpg') ?>" alt=""></a> -->
	    </div>
		<div class="ad_two"></div>
	</div>
</div>