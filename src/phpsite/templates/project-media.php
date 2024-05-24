<h3>
    <?php
        if ($project['media-type'] == 'image') {
            echo '<i class="icon-file-image-1"></i>';
        } else if ($project['media-type'] == 'video') {
            echo '<i class="icon-movie-play-4"></i>';
        }
    ?>
    <a href="<?= $project['link'] ?>" target="_blank" title="<?= $project['title'] ?>"><?= $project['title'] ?></a>
</h3>
