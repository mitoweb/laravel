<?php
/*
package: miroku01
filename: index.php
*/

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <!-- font awesome -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- ローディング用 -->
    <div id="loading">
        <div class="spinner-box">
            <div class="pulse-container">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <div id="page">
        <header></header>
        <div id="contents">
            <div class="container">
                <div id="wrapper">
                    <main>
                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="mb-4 d-flex justify-content-between align-items-top">
                                    <div><?php the_content(); ?></div>
                                    <div><?php the_post_thumbnail('thumbnail'); ?></div>
                                </div>
                                <p class="text-right">[ <?php the_title(); ?> ]</p>
                        <?php
                                break;
                            endwhile;
                            the_posts_navigation();
                        endif;
                        ?>
                    </main>
                    <aside><?php get_sidebar(); ?></aside>
                </div>
            </div>
            <p id="pagetop"><a href="#"><i class="fas fa-arrow-alt-circle-up fa-2x" title="TOP"></i></a></p>
        </div>
        <footer>
            <p class="footer_copy"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a> 2021</p>
            <div class="footer_sns">
                <ul>
                    <li><a href="https://ja-jp.facebook.com/" target="_blank"><i class="fab fa-2x fa-facebook w3-hover-opacity mr-2"></i></a></li>
                    <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-2x fa-twitter w3-hover-opacity mr-2"></i></a></li>
                </ul>
            </div>
        </footer>
    </div>

    <?php wp_footer(); ?>

    <script>
        var $ = jQuery.noConflict();
        $(window).on('load', function() {
            $('#loading').delay(1500).fadeOut(300);
        });

        function stopload() {
            $('#loading').delay(1000).fadeOut(700);
        }
        setTimeout('stopload()', 10000);

        $("#toggle_ham").click(function() {
            $("#header_menu_place").fadeToggle();
        });

        var topBtn = $("#pagetop");
        topBtn.hide();

        $(window).scroll(function() {
            if ($(this).scrollTop() > 500) {
                topBtn.fadeIn();
            } else {
                topBtn.fadeOut();
            }

        });

        $('a[href^="#"]').click(function() {
            var time = 500;
            var href = $(this).attr("href");
            var target = $(href == "#" ? 'html' : href);
            var distance = target.offset().top;
            $("html, body").animate({
                scrollTop: distance
            }, time, "swing");
            return false;
        });

        $(function() {

            var w = 600;
            var h = 600;
            var l = (screen.availWidth - w) / 2;
            var t = (screen.availHeight - t) / 2;
            $(".popup").click(function() {
                window.open(this.href, "window", "width=" + w + ", height=" + h + ", left=" + l + ", top=" + t + ", scrollbars=auto");
                return false;
            });
        });
    </script>
</body>

</html>