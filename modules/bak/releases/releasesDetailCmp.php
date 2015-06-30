<div class="releaseDetail">
	<div class="releaseDetailCover col-md-4 col-xs-12">
		<a href="<?php echo 'uploads/' . getFileName($data['release']['datei'], 0) . '" download="' . getFileName($data['release']['datei'], 1); ?>" download="<?php echo getFileName($data['release']['bild'], 1); ?>">
			<img src="<?php echo resizePic(getFileName($data['release']['bild'], 0), 400, null); ?>">
		</a>
	</div>
	<div class="releaseDetailMain col-md-8 col-xs-12">
		<div class="releaseDetailHead">
			<?php
				renderHeadline($data['release']['interpret'], 4, 'interpret');
				renderHeadline($data['release']['titel'], 3, 'titel');
			?>
		</div>
		<div class="releaseDetailText">
			<?php
				renderHeadline('Tracklist:', 5, 'tracklist');
				renderParagraph($data['release']['tracklist']);
			?>
		</div>
		<div class="releaseDetailDownload col-md-6">
			<a class="releaseDetailDownloadButton btn btn-default" href="<?php echo 'uploads/' . getFileName($data['release']['datei'], 0) . '" download="' . getFileName($data['release']['datei'], 1); ?>" download="<?php echo getFileName($data['release']['bild'], 1); ?>">Download</a>
		</div>
	</div>
	<div class="clear"></div>
</div>