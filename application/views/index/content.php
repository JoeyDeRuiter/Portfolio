<div class="wrapper">

    <div class="content">
        <h1>Hallo!</h1>

        <img src="//<?= $_SERVER["SERVER_NAME"]; ?>/img/profile.png" alt="Joey de Ruiter" />

        <p>Ik ben Joey de Ruiter, 18 jaar oud en een mediatechnologie student aan het Grafisch Lyceum Rotterdam. Op dit moment ben ik op zoek naar een stageplek in de gamedevelopment of webdevelopment industrie zodat ik volgend jaar succesvol kan afstuderen. Tevens ben ik in mijn vrijetijd bezig met gamedevelopment en webdevelopment.</p>
        <br/><b>Favoriete quote:</b><br/>
        <p>"Programmer - an organism that turns coffee into software."<br/>
        - Author Unknown<br/></p>
        <br/>
        <b>Recente projecten:</b><br/>
        <p>Paintboy is één van mijn afgemaakte projecten. Zelf ben ik erg tevreden met het resultaat van de gameplay. De gameplay voelt vloeiend aan en is leuk om mee te spelen. Dit project was ook een goede leerervaring omdat ik met een andere developer en een art team kon samenwerken.</p>

        <div class="video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/GCbbYTN4PbU" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>

    <div class="featuredlist">

        <h3>Laatst gemaakte projecten</h3>

<?php
foreach ($featured as $post) {
    echo "<div class=\"featureditem\">";
    echo "<a href=\"//" . $_SERVER["SERVER_NAME"] ."/projects/" . $post->id . "\">";
    echo "<img src=\"" . $post->img . "\" alt=\"tmp\" />";
    echo "<h3>" . $post->title . "</h3>";
    echo "<div class=\"overlay\"></div>";
    echo "</a>";
    echo "</div>";
}
?>
    </div>
</div>