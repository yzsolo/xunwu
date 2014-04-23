<div id="detail_con">
	<div class="detail_con_detail">
		<div class="fin_tab">
			<p>招领信息</p>
		</div>
	    <div class="detail_con">
			<div class="detail_detail">
				<ul class="detail_ul_first">
					<li>物品名称</li><li><?php echo $one_new['0']['f_name'] ?></li>
				</ul>
				<ul>
					<li>物品类型</li><li><?php echo $one_new['0']['f_kind'] ?></li>
				</ul>
				<ul>
					<li>拾物地点</li><li><?php echo $one_new['0']['f_locale'] ?></li>
				</ul>
				<ul>
					<li>发布时间</li><li><?php echo $one_new['0']['f_time'] ?></li>
				</ul>
				<ul>
					<li>发现人</li><li><?php echo $one_new['0']['f_finder'] ?></li>
				</ul>
				<ul>
					<li>详情描述</li><li class="detail_li"><p>
					<?php echo $one_new['0']['f_describ'] ?>
				</p></li>
				</ul>
				<div class="i_find_btn_box">
					<a href="#"><div class="i_find_btn">与Ta联系</div></a>
				</div>
				<div class="verify">
					<form action="<?php echo base_url('index.php/detail'); ?>" method="POST" id="verifyForm">
						<label for="verify-input">输入验证码查看联系方式：</label>
						<input type="text" id="verify-input" /><?php echo $image; ?><span></span>
						<!-- 此处有两个隐藏表单 -->
						<input type="hidden" id="verify-table" value="<?php echo $table; ?>">
						<input type="hidden" id="verify-id" value="<?php echo $id; ?>">
						<input type="submit" value="提交" id="send"/>
					</form>
				</div>
				<div class="help_find">
					<span>帮忙转发到</span>
					<ul class='help_find_ul'>
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