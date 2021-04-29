<?php
$title = 'Itineraries for an Unforgettable Experience';
$slides = [
    [
        'title' => 'Golf',
        'desc' => 'Buddies weekend',
        'card_img' => "./images/523x495.png",
        'card_title' => 'Your Buddies Trip Itinerary',
        'card_desc' => 'Here\'s how to spend 3 days in the Cradle of American golf.'
    ],
    [
        'title' => 'Family',
        'desc' => 'First time In Pinehurst',
        'card_img' => "./images/523x495.png",
        'card_title' => 'Your Family Trip Itinerary',
        'card_desc' => 'Here\'s how to spend 3 days in the Cradle of American golf.'
    ],
    [
        'title' => 'Couples',
        'desc' => 'Spa & golf',
        'card_img' => "./images/523x495.png",
        'card_title' => 'Your Couples Trip Itinerary',
        'card_desc' => 'Here\'s how to spend 3 days in the Cradle of American golf.'
    ]
];
?>

<section class="block-vertical-slider">
    <div class="vertical-slider">

        <h2 class="vertical-slider__title"><?= $title ?></h2>

        <div class="vertical-slider__sliders">

            <div class="vertical-slides">
                <?php foreach ($slides as $index => $slide) :
                    // Workaround to match slick indexing
                    $index = $index + 1;
                ?>
                    <div class="vslide<?= $index == 1 ? ' active' : '' ?>" data-slide="<?= $index ?>">
                        <h3 class="vslide-title"><?= $slide['title'] ?></h3>
                        <p class="vslide-desc"><?= $slide['desc'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="content-slides">
                <?php $slide = $slides[0]  ?>
                <div class="cslide">
                    <div class="cslide-img-container">
                        <img src="<?= $slide['card_img'] ?>" class="cslide-img">
                    </div>
                    <div class="cslide-content">
                        <h3 class="cslide-title"><?= $slide['card_title'] ?></h3>
                        <p class="cslide-desc"><?= $slide['card_desc'] ?></p>
                        <a href="#" class="cslide-btn">learn more</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>