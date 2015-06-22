<div class="ansichtDetail edit col-xs-12 col-sm-8 col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $data['table']['singular']; ?> bearbeiten</h3>
		</div>
		<div class="panel-body">
			<?php
				renderDetailEdit($data['table'], $entry);
				renderFeedback($feedback);
			?>
		</div>
	</div>
</div>
<div class="clear"></div>