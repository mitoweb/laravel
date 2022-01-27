<?php
/*
package: miroku01
filename: functions.php
*/

if(!function_exists('miroku01_start')): 
    function miroku01_start()
    {
        //アイキャッチ
        add_theme_support('post-thumbnails');

        //タイトル
        add_theme_support('title-tag');

        //feed
        add_theme_support('automatic-feed-links');

        //タグ
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        //メニュー
        register_nav_menus(
            array(
                'global'  => 'グローバルメニュー',
                'utility' => 'ユーティリティメニュー',
                'drawer'  => 'ドロワーメニュー',
            )
        );
    }
endif;
add_action('init', 'miroku01_start');

function change_title_separator($separator)
{
    $separator = '|';
    return $separator;
}
add_filter('document_title_separator', 'change_title_separator');

add_action('widgets_init', function () {
    register_sidebar(
        [
            'name' => 'Main SideBar',
            'id' => 'main-sidebar'
        ]
    );
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('miroku01-reset', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_script('jquery');
});

add_image_size('my_thumbnail', 300, 300, true);