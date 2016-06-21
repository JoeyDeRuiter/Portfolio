<nav class="header">
	<div class="inner">
		<div class="logo">
			<a href="//<?= $_SERVER["SERVER_NAME"];?>">Joey <span>de Ruiter</span></a>
		</div>

		<div class="menu">
			<ul>
				<li><a href="/projects">Projecten</a></li>
				<li><a href="/blog">Blog</a></li>
				<li><a href="/contact">Contact</a></li>
			</ul>
		</div>

		<div class="hamburger">
			<label for="mobile-menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></label>
		</div>
	</div>
</nav>
<input type="checkbox" id="mobile-menu-toggle">
<div class="mobile-menu">
    <div class="exit">
        <label for="mobile-menu-toggle"><i class="fa fa-times" aria-hidden="true"></i></i></label>
    </div>

    <div class="menu">
        <ul>
            <li><a href="/projects">Projecten</a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </div>
</div>