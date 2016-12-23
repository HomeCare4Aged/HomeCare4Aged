<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="/1/public/css/bootstrap.css" />
	</head>
	<body>
		<div class="modal-body">
            <div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<form class="form-horizontal" id="zyn-form-assign-auth" name="announcement">
						<div class="form-group">
							<div class="col-lg-12">
							<label for="" class="col-sm-6 control-label">状态:</label>
								<div class="row">
									<input type="radio" name="announcement_check_state" value="开启"/>开启
									<input type="radio" name="announcement_check_state" value="关闭"/>关闭
								</div>
							</div>
						</div>
					</form>	
				</div>
			</div>
			<button type="button" class="btn btn-primary" id="zyn-btn-assign-auth">确定
			</button>
		</div>
	</body>
</html>