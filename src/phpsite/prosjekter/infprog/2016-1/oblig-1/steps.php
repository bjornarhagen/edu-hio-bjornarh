<ul id="steps">
    <li><a href="./">Oppgaver:</a></li>
    <?php
        for ($i=1; $i < 10; $i++) { 
            if ($i == $activeStep) {
                echo '<li class="active"><a href="oppgave-' . $i . '.php">' . $i . '</a></li>';
            } else {
                echo '<li><a href="oppgave-' . $i . '.php">' . $i . '</a></li>';
            }
        }
    ?>
</ul>