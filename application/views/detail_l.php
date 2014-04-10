<div id="detail_con">
	<div class="detail_con_detail">
		<div class="fin_tab">
			<p>失物信息</p>
		</div>
	    <div class="detail_con">
			<div class="detail_detail">
				<ul class="detail_ul_first">
					<li>物品名称</li><li><?php echo $one_new['0']['l_name'] ?></li>
				</ul>
				<ul>
					<li>物品类型</li><li><?php echo $one_new['0']['l_kind'] ?></li>
				</ul>
				<ul>
					<li>丢失地点</li><li><?php echo $one_new['0']['l_locale'] ?></li>
				</ul>
				<ul>
					<li>发布时间</li><li><?php echo $one_new['0']['l_time'] ?></li>
				</ul>
				<ul>
					<li>失物人</li><li><?php echo $one_new['0']['l_owner'] ?></li>
				</ul>
				<ul>
					<li>详情描述</li><li class="detail_li"><p>
					<?php echo $one_new['0']['l_describ'] ?>
				</p></li>
				</ul>
				<div class="i_find_btn_box">
					<a href="#"><div class="i_find_btn">我捡到了</div></a>
				</div>
				<div class="help_find">
					<span>帮忙转发到</span>
					<ul>
						<li name="one"><a href="#"><img src="<?php echo base_url('/resource/img/renren.jpg') ?>"></a></li>
						<li name="two"><a href="#"><img src="<?php echo base_url('/resource/img/sina.jpg') ?>"></a></li>
						<li name="three"><a href="#"><img src="<?php echo base_url('/resource/img/tencent.jpg') ?>"></a></li>
					</ul>
				</div>
				<div class="i_respond_box">
					<a href="#"><div class="i_respond">我要回应</div></a>
					<p>为失主提供线索吧</p>
				</div>
				<div class="write_msg">
					<ul>
						<li>我的回应</li>
						<li><label for="your_name">姓名：</label><input name="your_name" type="text"></li>
						<li><label for="contact_imf">联系方式：</label><input name="contact_imf" type="text"></li>
						<li><textarea cols="20px" rols="3px;"></textarea></li>
					</ul>
				</div>
				<div class="send_msg_box">
					<a href="#"><div class="send_msg">发布</div></a>
				</div>
			</div>
	    </div>
	</div>
</div>