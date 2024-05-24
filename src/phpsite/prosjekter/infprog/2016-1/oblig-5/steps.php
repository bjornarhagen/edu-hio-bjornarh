<ul id="steps">
    <li><a href="./">Oppgaver:</a></li>
    <?php
        for ($i=1; $i <= 2; $i++) { 
            if ($activeStep == 1 && $i == 1) {
                echo '<li class="active"><a href="oppgave-1-2-3.php">1, 2 & 3</a></li>';
            } else if ($i == 1) {
                echo '<li><a href="oppgave-1-2-3.php">1, 2 & 3</a></li>';
            } else if ($activeStep == 2 && $i == 2) {
                echo '<li class="active"><a href="oppgave-4.php">4</a></li>';
            } else {
                echo '<li><a href="oppgave-4.php">4</a></li>';
            }
        }
    ?>
</ul>