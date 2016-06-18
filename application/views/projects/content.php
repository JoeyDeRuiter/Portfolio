<div class="wrapper">

    <div class="content">

        <?php
        foreach ($featured as $post) {
            echo "<div class=\"post\">";
            echo "<a href=\"//" . $_SERVER["SERVER_NAME"] ."/projects/" . $post->id . "\"><h3>" . $post->title . "</h3></a>";
            echo "<a href=\"//" . $_SERVER["SERVER_NAME"] ."/projects/" . $post->id . "\"><img src=\"" . $post->img . "\" alt=\"" . $post->title . "\" /></a>";
            echo $post->post;
            echo "<h4>Gepost door: $post->poster</h4>";
            echo "<a class=\"more\" href=\"//" . $_SERVER["SERVER_NAME"] ."/projects/" . $post->id . "\">Lees meer</a>";
            echo "</div>";
        }
        ?>
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