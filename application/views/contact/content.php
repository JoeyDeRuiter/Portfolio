<div class="wrapper">

    <div class="content">

        <h1>CONTACT</h1>

        <p><i class="fa fa-envelope" aria-hidden="true"></i>Email: <a href="mailto:contact@joeyderuiter.me">contact@joeyderuiter.me</a></p>
        <p><i class="fa fa-phone" aria-hidden="true"></i>Telefoon nummer: +31 6 36 49 02 06</p>
        <p><i class="fa fa-github" aria-hidden="true"></i>GitHub: <a href="https://github.com/JoeyDeRuiter/">link</a></p>
    </div>

    <div class="featuredlist">
        <h3>Laatst gemaakte projecten</h3>
        <?php
        foreach ($featured as $post) {
            echo "<div class=\"featureditem\">";
            echo "<a href=\"//" . $_SERVER["SERVER_NAME"] ."/projects/" . $post->id . "\">";
            echo "<img src=\"" . $post->img . "\" alt=\"" . $post->title . "\" />";
            echo "<h3>" . $post->title . "</h3>";
            echo "<div class=\"overlay\"></div>";
            echo "</a>";
            echo "</div>";
        }
        ?>
    </div>
</div>