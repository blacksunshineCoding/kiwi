<div class="ansichtList">
	<?php
		renderDataTable($data['table'], $data['entries']);
		renderFeedback($deleteFeedback);
		renderFeedback($copyFeedback);
	?>
</div>