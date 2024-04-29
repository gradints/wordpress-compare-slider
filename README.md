# wordpress-compare-slider
This feature make compare image slider


# HOW TO USE
- copy folder to child-theme asset

- open function.php in child theme n copy this code
    ```php
    require_once('wordpress-compare-slider/logic.php');
    ```
- implementation => display compare slider using shortcode 
    ```php
    do_shortcode('[imgcompare imgafter="<IMG_SRC>" imgbefore="<IMG_SRC>"]'); or [imgcompare imgafter="<IMG_SRC>" imgbefore="<IMG_SRC>"]
    ```