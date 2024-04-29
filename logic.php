<?php
require 'utils.php';
use function CompareSlider\Utility\feature_absolute_dir;
use function CompareSlider\Utility\feature_dir;

add_shortcode('imgcompare', 'image_compare');
function image_compare($atts = array())
{
    wp_enqueue_style('compare-slider-style', feature_dir('compare-slider.css'), array(), filemtime(feature_absolute_dir('compare-slider.css')));
    wp_enqueue_script('compare-slider-script', feature_dir('compare-slider.js'), array(), filemtime(feature_absolute_dir('compare-slider.js')), true);

    $args = shortcode_atts(
        array(
            'imgafter' => 'null',
            'imgbefore' => 'null',
        ), $atts);
    $after_img = $args['imgafter'];
    $before_img = $args['imgbefore'];

    ob_start();
    ?>
    <div class="container-compare">
        <div class="image-container-compare">
            <img class="image-before slider-compare-image" src="<?= $before_img ?>" alt="before image" />
            <img class="image-after slider-compare-image" src="<?= $after_img ?>" alt="after image" />
        </div>
        <!-- step="10" -->
        <input type="range" min="0" max="100" value="50" aria-label="Percentage of before photo shown"
            class="slider-compare" />
        <div class="slider-compare-line" aria-hidden="true"></div>
        <div class="slider-compare-button" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 256 256">
                <rect width="256" height="256" fill="none"></rect>
                <line x1="128" y1="40" x2="128" y2="216" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="16"></line>
                <line x1="96" y1="128" x2="16" y2="128" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="16"></line>
                <polyline points="48 160 16 128 48 96" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="16"></polyline>
                <line x1="160" y1="128" x2="240" y2="128" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="16"></line>
                <polyline points="208 96 240 128 208 160" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="16"></polyline>
            </svg>
        </div>
    </div>
    <?php
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}
