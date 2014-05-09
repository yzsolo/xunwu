<div id="descri_fin_con">
	<div class="descri_fin_con_detail">
		<div class="fin_tab">
			<p>童鞋，好银有好报哇！填写您所找到的物品的信息！</p>
		</div>
		    <div class="descri_fin_con">
		    	<form action="<?php echo base_url('index.php/descri_find/imformation') ?>" method="post" name="form_one">
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
			    		<input name="name_f" placeholder="物品名" type="text">
			    		<div class="flag_img"></div>
			    	</div>
			    	<div class="things_style">
			    		<label class="label">发现地点 :</label>
			    		<input name="locale_f" placeholder="发现地点" type="text">
			    		<div class="flag_img"></div>
			    	</div>
			    	<div class="things_style">
			    		<label class="label">拾物者姓名 :</label>
			    		<input name="finder_f" placeholder="拾物者姓名" type="text">
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
			    		<input name="email_f" placeholder="邮箱" type="email" required>
			    		<div class="flag_img"></div>
			    	</div>
			    	<div class="things_style">
			    		<label class="label">qq :</label>
			    		<input name="qq_f" placeholder="qq" type="text">
			    		<div class="flag_img"></div>
			    	</div> -->
			    	<div class="things_style_area">
			    		<label class="label">物品描述 :</label>
			    		<!-- <textarea name="descri_f" rows="3" cols="20"></textarea> -->
			    	
			    		<textarea id="editor" name="descri_f" style="display:none;"></textarea>
			    	</div>
			  			<div class="things_submit_f" name="things_sub" value="提交">提交</div>
		  		</form>
	  		</div>
	    </div>
	</div>
</div>