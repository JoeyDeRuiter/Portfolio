<?php include_once(ROOT . DS . 'application' . DS . 'analyticstracking.php'); ?>
<div class="wrapper">
    <div class="content">

        <h1>CONTACT</h1>

        <p><i class="fa fa-envelope" aria-hidden="true"></i>Email: <a href="mailto:contact@joeyderuiter.me">contact@joeyderuiter.me</a></p>
        <p><i class="fa fa-phone" aria-hidden="true"></i>Telefoon nummer: +31 6 36 49 02 06</p>
        <p><i class="fa fa-github" aria-hidden="true"></i>GitHub: <a href="https://github.com/JoeyDeRuiter/">link</a></p>

        <div class="mail">
            <form action="mailto:contact@joeyderuiter.me?subject=Contactformulier - Joeyderuiter.me" enctype="text/plain" method="post">
            <table>
                <tr>
                    <td><input name="Naam" type="text" placeholder="Naam"></td>
                </tr>
                <tr>
                   <td><input name="Email" type="email" placeholder="Email"></td>
                </tr>
                <tr>
                    <td><textarea name="Bericht" placeholder="Bericht"></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Verstuur"></td>
                </tr>
            </table>
            </form>
        </div>
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