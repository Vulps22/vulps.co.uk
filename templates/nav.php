<nav>
    <ul>
    <?php foreach ($routes as $url => $route) { ?>
            <li><a href="<?php echo $url; ?>"><?php echo $route['title']; ?></a></li>
        <?php } ?>
    </ul>
</nav>