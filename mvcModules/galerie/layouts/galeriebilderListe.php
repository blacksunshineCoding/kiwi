<div class="galeriebilderList row">
	<?php if (isset($entries) && count($entries) > 0) foreach ($entries as $entry) { ?>
		<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="galeriebilderEintrag">
				<a href="uploads/<?php echo getFileName($entry['bild'], 0); ?>" data-lightbox="galerie" data-id="<?php echo $entry['id']; ?>" data-title="<?php echo $entry['titel']; ?>" data-text="<?php echo $entry['kurztext']; ?>">
					<img src="<?php echo resizePic(getFileName($entry['bild'], 0), 200, null); ?>">
					<span class="bildOverlay">
						<span class="overlayTitle">
							<?php echo $entry['titel']; ?>
						</span>
					</span>
				</a>
			</div>
		</div>
	<?php } ?>
	<div class="clear"></div>
</div>