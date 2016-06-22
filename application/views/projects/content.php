<div class="wrapper">

    <div class="content">

        <h1>PROJECTEN</h1>

        <?php
        if(!empty($projects)) {

            foreach ($projects as $post) {
                echo "<div class=\"post\">";
                echo "<a href=\"//" . $_SERVER["SERVER_NAME"] . "/projects/" . $post->id . "\"><h3>" . $post->title . "</h3></a>";
                echo "<a href=\"//" . $_SERVER["SERVER_NAME"] . "/projects/" . $post->id . "\"><img src=\"" . $post->img . "\" alt=\"" . $post->title . "\" /></a>";
                echo $post->post;

                echo "<div class=\"footer\">";
                echo "<h4>Gepost door: $post->poster_name</h4>";
                echo "<a class=\"more\" href=\"//" . $_SERVER["SERVER_NAME"] . "/projects/" . $post->id . "\">Lees meer &gt;</a>";
                echo "</div>";
                echo "</div>";
                echo "<hr>";
            }
        }


        if(!empty($projects_game)) {

            foreach ($projects_game as $post) {
                echo "<div class=\"post\">";
                echo "<a href=\"//" . $_SERVER["SERVER_NAME"] . "/projects/" . $post->id . "\"><h3>" . $post->title . "</h3></a>";
                echo "<a href=\"//" . $_SERVER["SERVER_NAME"] . "/projects/" . $post->id . "\"><img src=\"" . $post->img . "\" alt=\"" . $post->title . "\" /></a>";
                echo $post->post;

                echo "<div class=\"footer\">";
                echo "<h4>Gepost door: $post->poster_name</h4>";
                echo "<a class=\"more\" href=\"//" . $_SERVER["SERVER_NAME"] . "/projects/" . $post->id . "\">Lees meer &gt;</a>";
                echo "</div>";
                echo "</div>";
                echo "<hr>";
            }
        }

        if(!empty($projects_other)) {

            echo "<h2>Niet game gerelateerde projecten</h2>";

            foreach ($projects_other as $post) {
                echo "<div class=\"post\">";
                echo "<a href=\"//" . $_SERVER["SERVER_NAME"] ."/projects/" . $post->id . "\"><h3>" . $post->title . "</h3></a>";
                echo "<a href=\"//" . $_SERVER["SERVER_NAME"] ."/projects/" . $post->id . "\"><img src=\"" . $post->img . "\" alt=\"" . $post->title . "\" /></a>";
                echo $post->post;

                echo "<div class=\"footer\">";
                echo "<h4>Gepost door: $post->poster_name</h4>";
                echo "<a class=\"more\" href=\"//" . $_SERVER["SERVER_NAME"] ."/projects/" . $post->id . "\">Lees meer &gt;</a>";
                echo "</div>";
                echo "</div>";
                echo "<hr>";
            }
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