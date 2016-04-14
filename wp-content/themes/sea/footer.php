

<div class="credits section bg-dark small-padding">

    <div class="credits-inner section-inner contact-sm">
        <div class="row">
        <div class="column one-third">
            <?php
            $phone = get_theme_mod('phone');

            if (!empty($phone)) {
                ?>
                <a name="skype" href="<?php echo esc_url( get_permalink(432)); ?>"><i class="fa fa-phone"></i>
                    <?php echo $phone; ?></a>
                <?php
            }
            ?>
        </div>
        <div class="column one-third">
            <?php
            $skype = get_theme_mod('skype');

            if (!empty($skype)) {
                ?>
                <a href="<?php echo esc_url( get_permalink(432)); ?>"><i class="fa fa-skype"></i>
                    <?php echo $skype; ?></a>
                <?php
            }
            ?>

        </div>
        <div class="column one-third">
            <?php
            $fb = get_theme_mod('fb');

            if (!empty($fb)) {
                ?>
                <a href="https://www.facebook.com/profile.php?id=100008216388274"><i class="fa fa-facebook"></i>
                    <?php echo $fb; ?></a>
                <?php
            }
            ?>

        </div>
        </div>   <!-- /row-->
    </div> <!-- /credits-inner -->

</div> <!-- /credits -->
<div class="footer section medium-padding bg-graphite">


    <div class="section-inner row">

        <?php if (is_active_sidebar('footer-a')) : ?>

            <div class="column column-1 one-third">

                <div class="widgets">

                    <?php dynamic_sidebar('footer-a'); ?>

                </div>

            </div>

        <?php else : ?>

            <div class="column column-1 one-third">

                <div class="widgets">

                    <div id="search" class="widget widget_search">

                        <div class="widget-content">

                            <h3 class="widget-title"><?php _e('Пошук на сайті:', 'sea'); ?></h3>
                            <?php get_search_form(); ?>

                        </div>

                    </div>

                </div>

            </div>

        <?php endif; ?> <!-- /footer-a -->

        <?php if (is_active_sidebar('footer-b')) : ?>

            <div class="column column-2 one-third">

                <div class="widgets">

                    <?php dynamic_sidebar('footer-b'); ?>

                </div> <!-- /widgets -->

            </div>

        <?php else : ?>

            <div class="column column-2 one-third">

                <div class="widgets">

                    <div class="widget widget_recent_entries">

                        <div class="widget-content">

                            <h3 class="widget-title"><?php _e('Останні публікації:', 'sea'); ?></h3>

                            <ul>
                                <?php
                                $args = array('numberposts' => '5', 'post_status' => 'publish');
                                $recent_posts = wp_get_recent_posts($args);
                                foreach ($recent_posts as $recent) {
                                    echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="' . esc_attr($recent["post_title"]) . '" >' . $recent["post_title"] . '</a> </li> ';
                                }
                                ?>
                            </ul>

                        </div>

                    </div>

                </div> <!-- /widgets -->

            </div>

        <?php endif; ?> <!-- /footer-b -->

        <?php if (is_active_sidebar('footer-c')) : ?>

            <div class="column column-3 one-third">

                <div class="widgets">

                    <?php dynamic_sidebar('footer-c'); ?>

                </div> <!-- /widgets -->

            </div>

        <?php else : ?>

            <div class="column column-3 one-third">

                <div id="meta" class="widget widget_text">
                    <div class="widget-content">



                    </div>
                </div>

            </div>

        <?php endif; ?> <!-- /footer-c -->

        <div class="clear"></div>

    </div> <!-- /footer-inner -->

</div> <!-- /footer -->

<div class="credits section bg-dark small-padding">

    <div class="credits-inner section-inner">

        <p class="credits-left fleft">

            &copy; <?php echo date("Y") ?> <a href="<?php echo home_url(); ?>"
                                              title="<?php bloginfo('name'); ?>"><img class="logo-icon-sm" src="<?php bloginfo('template_directory'); ?>/images/fg_logo_sm.png" alt="logo"/><?php bloginfo('name'); ?></a><span> &mdash; <?php printf(__('Theme by <a href="%s">Zlata S.</a>', 'sea'), 'https://www.facebook.com/profile.php?id=100008318047466'); ?></span>

        </p>
        <p class="credits-right fright">
            <a class="tothetop" title="<?php _e('To the top', 'sea'); ?>" href="#"><i class="fa fa-arrow-circle-up"></i></a>

        </p>

        <div class="clear"></div>

    </div> <!-- /credits-inner -->

</div> <!-- /credits -->

<?php wp_footer(); ?>

</body>
</html>