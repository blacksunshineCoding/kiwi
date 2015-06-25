<div class="releasesList">
	<?php if (isset($entries) && count($entries) > 0) foreach ($entries as $entry) { ?>
		<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="releaseEintrag">
				<div class="releaseEintragBild">
					<a href="index.php?nodesId=<?php echo $_GET['nodesId']; ?>&releasesId=<?php echo $entry['id']; ?>">
						<img src="<?php echo resizePic(getFileName($entry['bild'], 0), 200, null); ?>">
						<span class="bildOverlay"></span>
					</a>
				</div>
				<div class="releaseEintragTitel">
					<h3>
						<a href="index.php?nodesId=<?php echo $_GET['nodesId']; ?>&releasesId=<?php echo $entry['id']; ?>">
							<span class="interpret">
								<?php
									echo $entry['interpret'];
								?>
							</span>
							<span class="title">
								<?php
									echo $entry['titel'];
								?>
							</span>
						</a>
					</h3>
				</div>
			</div>
		</div>
	<?php } ?>
	<div class="clear"></div>
</div>