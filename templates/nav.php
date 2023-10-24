<nav class="navbar navbar-expand-lg bg-body-tertiary">
	<div class="container-fluid">
		<img src="img/vulps.jpg" class="navbar-brand p-1 d-none d-lg-inline" style="width:3.5rem; height:3.5rem; border-radius: 50%;">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<?php foreach ($routes as $url => $route) { ?>
					<?php if (!$route['hidden']) {?>
					<li class="nav-item"><a href="<?php echo $url; ?>" class="nav-link <?php if ($route['title'] === $selectedRoute['title']) echo 'active' ?>"><?php echo $route['title']; ?></a></li>
				<?php }
			} ?>
			</ul>
		</div>
	</div>
</nav>