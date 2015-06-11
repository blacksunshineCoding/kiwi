<ul class="navigation sideNavigation sideUsers">
	<li class="all">
		<a href="index.php?navigation=users&sub=all">
			<i class="fa fa-users"></i>
			<span class="title">Alle <?php echo $main['tables']['users']['plural']; ?></span>
		</a>
	</li>
	<li class="own">
		<a href="index.php?navigation=users&sub=own">
			<i class="fa fa-user"></i>
			<span class="title">Eigener <?php echo $main['tables']['users']['singular']; ?></span>
		</a>
	</li>
	<li class="new">
		<a href="index.php?navigation=users&sub=new">
			<i class="fa fa-user-plus"></i>
			<span class="title">Neuer <?php echo $main['tables']['users']['singular']; ?></span>
		</a>
	</li>
</ul>