<div class="ansichtDetail new col-xs-12 col-sm-8 col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $data['table']['newLabel']; ?></h3>
		</div>
		<div class="panel-body">
			<?php
				renderDetailNew($data['table']);
				renderFeedback($bildUploadFeedback);
				renderFeedback($dateiUploadFeedback);
			?>
		</div>
	</div>
</div>
<div class="clear"></div>