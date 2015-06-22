<div class="ansichtDetail new col-xs-12 col-sm-8 col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Neuer <?php echo $data['table']['singular']; ?></h3>
		</div>
		<div class="panel-body">
			<?php
				renderDetailNew($data['table']);
				renderFeedback($feedback);
			?>
		</div>
	</div>
</div>
<div class="clear"></div>