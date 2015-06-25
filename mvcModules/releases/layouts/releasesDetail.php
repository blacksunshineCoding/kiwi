<div class="releaseDetail">
	<div class="releaseDetailCover col-md-4 col-xs-12">
		<a href="index.php?nodesId=<?php echo $_GET['nodesId']; ?>&releasesId=<?php echo $_GET['releasesId']; ?>&download=1" target="_blank">
			<img src="<?php echo resizePic(getFileName($entry['bild'], 0), 400, null); ?>">
		</a>
	</div>
	<div class="releaseDetailMain col-md-8 col-xs-12">
		<div class="releaseDetailHead">
			<?php
				renderHeadline($entry['interpret'], 4, 'interpret');
				renderHeadline($entry['titel'], 3, 'titel');
			?>
		</div>
		<div class="releaseDetailText">
			<?php
				renderHeadline('Tracklist:', 5, 'tracklist');
				renderParagraph($entry['tracklist']);
			?>
		</div>
		<div class="releaseDetailDownload col-md-6">
			<a class="releaseDetailDownloadButton btn btn-default" href="index.php?nodesId=<?php echo $_GET['nodesId']; ?>&releasesId=<?php echo $_GET['releasesId']; ?>&download=1" target="_blank">
				<i class="fa fa-download"></i>&nbsp;
				<span>Download</span>
			</a>
		</div>
	</div>
	<div class="clear"></div>
	<div class="col-md-12 releaseDetailBackButton">
		<a class="btn btn-default" href="index.php?nodesId=<?php echo $_GET['nodesId']; ?>">
			<i class="fa fa-angle-double-left"></i>&nbsp;
			<span>Zurück zu den Releases</span>
		</a>
	</div>
	<div class="clear"></div>
</div>