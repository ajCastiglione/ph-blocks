<?php

$content = [
    'title' => 'accommodations',
    'meta-title' => 'Stay awhile.',
    'desc' => 'Leave distractions behind as you arrive at our quaint village and historic resort. Nestled in the sandhills of North Carolina, Pinehurst is the perfect place to retreat and refocus.',
    'cta' => 'View all accommodations',
    'img' => './images/602x720.png',
    'side' => 'left'
];

?>

<section class="block-content-media">
    <div class="content-media" data-side="<?= $content['side'] ?>">

        <div class="content-media__container">
            <div class="content">
                <h4 class="title"><?= $content['title'] ?></h4>
                <h3 class="meta-title"><?= $content['meta-title'] ?></h3>
                <div class="desc"><?= $content['desc'] ?></div>
                <a href="#" class="btn"><?= $content['cta'] ?></a>
            </div>
            <div class="media">
                <img src="<?= $content['img'] ?>" class="img">
            </div>
        </div>

    </div>
</section>