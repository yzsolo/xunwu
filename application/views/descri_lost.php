<div id="descri_fin_con">
	<div class="descri_fin_con_detail">
		<div class="fin_tab">
			<p>童鞋，不要桑心！赶快填写您丢失的物品的信息，我们会尽全力帮你找到的！</p>
		</div>
		    <div class="descri_fin_con">
		    		<form action="<?php echo base_url('index.php/descri_lost/imformation') ?>" method="post" name="form_one">
		    <div class="kind">
		    		<label class="label">物品类型 :</label>
		    		<select name="kind_f">
						<option value="选择类型">选择类型</option>
						<option value="书籍资料">书籍资料</option>
						<option value="衣物饰品">衣物饰品</option>
						<option value="交通工具">交通工具</option>
						<option value="随身物品">随身物品</option>
						<option value="电子数码">电子数码</option>
						<option value="卡类证件">卡类证件</option>
						<option value="其他物品">其他物品</option>
					</select>
					<div class="flag_img"></div>
		    	</div>
		    	<div class="things_style">
		    		<label class="label">物品名称 :</label>
		    		<input name="name_f" maxlength="20" placeholder="物品名" type="text">
		    		<div class="flag_img"></div>
		    	</div>
		    	<div class="things_style">
		    		<label class="label">丢失地点 :</label>
		    		<input name="locale_f" maxlength="25" placeholder="发现地点" type="text">
		    		<div class="flag_img"></div>
		    	</div>
		    	<div class="things_style">
		    		<label class="label">失主姓名 :</label>
		    		<input name="finder_f" maxlength="20" placeholder="失主姓名" type="text">
		    		<div class="flag_img"></div>
		    	</div>
		    	<!-- <div class="things_style">
		    		<label>以下三种联系方式至少填写一种:</label>
		    	</div> -->
		    	<div class="things_style">
		    		<label class="label">联系电话 :</label>
		    		<input name="telnum_f" placeholder="联系电话" type="text">
		    		<div class="flag_img"></div>
		    	</div>
		    	<!-- <div class="things_style">
		    		<label class="label">邮箱 :</label>
		    		<input name="email_f" placeholder="邮箱" type="text">
		    		<div class="flag_img"></div>
		    	</div>
		    	<div class="things_style">
		    		<label class="label">qq :</label>
		    		<input name="qq_f" placeholder="qq" type="text">
		    		<div class="flag_img"></div>
		    	</div> -->
		    	<div class="things_style_area">
		    		<label class="label">物品描述 :</label>
		    		<textarea id="editor" name="descri_f" style="visibility:hidden;"></textarea>
		    	</div>
		  		<div class="things_submit_l" name="things_sub" type="submit" value="提交">提交</div>
		  	</form>
		  		</div>
	    </div>
	</div>
</div>