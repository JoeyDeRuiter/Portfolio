<div class="wrapper">

    <div class="content">

    </div>

    <div class="featuredlist">

        <h3>Laatst gemaakte projecten</h3>

<?php

foreach ($featured as $post) {

    echo "<div class=\"featureditem\">";
    echo "<a href=\"//" . $_SERVER["SERVER_NAME"] ."/blog/" . $post->id . "\">";
    echo "<img src=\"" . $post->img . "\" alt=\"tmp\" />";
    echo "<h3>" . $post->title . "</h3>";
    echo "<div class=\"overlay\"></div>";
    echo "</a>";
    echo "</div>";

}


?>
    </div>
</div>