<div id="detail_con">
	<div class="detail_con_detail">
		<div class="fin_tab">
			<p>失物信息</p>
		</div>
	    <div class="detail_con">
			<div class="detail_detail">
				<ul class="detail_ul_first">
					<li>物品名称：</li><li><?php echo $one_new['0']['l_name'] ?></li>
				</ul>
				<ul>
					<li>物品类型：</li><li><?php echo $one_new['0']['l_kind'] ?></li>
				</ul>
				<ul>
					<li>丢失地点：</li><li><?php echo $one_new['0']['l_locale'] ?></li>
				</ul>
				<ul>
					<li>发布时间：</li><li><?php echo $one_new['0']['l_time'] ?></li>
				</ul>
				<ul>
					<li>失物人：</li><li><?php echo $one_new['0']['l_owner'] ?></li>
				</ul>
				<ul>
					<li>详情描述：</li><li class="detail_li"><p>
					<?php echo $one_new['0']['l_describ'] ?>
				</p></li>
				</ul>
				<div class="help_find">
					<span>帮忙转发到</span>
					<div class="bdsharebuttonbox">
						<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
						<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
						<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
						<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
						<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
						<a href="#" class="bds_more" data-cmd="more"></a>
					</div>
				</div>
				<div class="i_find_btn_box">
					<a href="#"><div class="i_find_btn">我捡到了</div></a>
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
				<div class="i_respond_box">
					<div class="i_respond">我要回应</div>
				</div>
				<div id="SOHUCS"></div>
			</div>
	    </div>
	</div>
</div>