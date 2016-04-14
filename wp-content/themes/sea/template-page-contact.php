<?php
/*
Template Name: Contact
*/
?>

<?php

get_header();

?>

    <div class="wrapper section medium-padding">
        <div class="section-inner">

            <div class="content full-width">


                <div class="post">

                    <div class="post-header">

                        <h1 class="post-title"><?php the_title(); ?></h1>

                    </div> <!-- /post-header -->

                    <div class="post-content">

                        <!-- Start Contact section -->
                        <section id="contact">

                            <div class="contact">

                                <address class="single-address">
                                    <h4>Натисніть кнопку щоб написати нам в Skype:</h4>

                                    <div id="skype" class="skype">
                                        <script type="text/javascript"
                                                src="https://secure.skypeassets.com/i/scom/js/skype-uri.js"></script>
                                        <div id="SkypeButton_Call_e.salyakin_1">
                                            <script type="text/javascript">
                                                Skype.ui({
                                                    "name": "chat",
                                                    "element": "SkypeButton_Call_e.salyakin_1",
                                                    "participants": ["e.salyakin"],
                                                    "imageColor": "white",
                                                    "imageSize": 24
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </address>

                                <?php
                                $phone1 = get_theme_mod('phone1');
                                $phone2 = get_theme_mod('phone2');
                                $phone3 = get_theme_mod('phone3');
                                $phone4 = get_theme_mod('phone4');
                                $phone5 = get_theme_mod('phone5');
                                $email_sup = get_theme_mod('email_sup');
                                $email_sal = get_theme_mod('email_sal');
                                $address1 = get_theme_mod('address1');
                                $address2 = get_theme_mod('address2');
                                if (!empty($phone1) || !empty($phone2) || !empty($phone3) || !empty($phone4) || !empty($phone5) || !empty($email_sup) || !empty($email_sal) || !empty($address1) || !empty($address2)) {
                                    ?>
                                    <?php
                                    if (!empty($phone1) || !empty($phone2) || !empty($phone3) || !empty($phone4) || !empty($phone5)) {
                                        ?>
                                        <address class="single-address">
                                            <h4>Телефони:</h4>
                                            <?php if (!empty($phone1)) {
                                                ?>
                                                <p><?php echo $phone1; ?> <img class="phone-icon"
                                                                               src="<?php bloginfo('template_directory'); ?>/images/life.png"
                                                                               alt="life"/></p>
                                                <?php
                                            }
                                            if (!empty($phone2)) { ?>
                                                <p> <?php echo $phone2; ?> <img class="phone-icon"
                                                                                src="<?php bloginfo('template_directory'); ?>/images/kyivstar.png"
                                                                                alt="kyivstar"/></p>
                                                <?php
                                            }
                                            if (!empty($phone3)) { ?>
                                                <p> <?php echo $phone3; ?> <img class="phone-icon"
                                                                                src="<?php bloginfo('template_directory'); ?>/images/cdma.png"
                                                                                alt="cdma"/></p>
                                                <?php
                                            }
                                            if (!empty($phone4)) { ?>
                                                <p> <?php echo $phone4; ?></p>
                                                <?php
                                            }
                                            if (!empty($phone5)) { ?>
                                                <p> <?php echo $phone5; ?></p>
                                                <?php
                                            }
                                            ?>
                                        </address>
                                        <?php
                                    }
                                    if (!empty($email_sup) || !empty($email_sal)) {
                                        ?>
                                        <address class="single-address">
                                            <h4>E-Mail:</h4>
                                            <?php
                                            if (!empty($email_sup)) { ?>
                                                <p> <?php echo $email_sup; ?></p>
                                                <?php
                                            }
                                            if (!empty($email_sal)) { ?>
                                                <p> <?php echo $email_sal; ?></p>
                                                <?php
                                            }
                                            ?>
                                            <h3>Напишіть нам листа:</h3>
                                            <?php echo do_shortcode("[contact-form to='e.salyakin@gmail.com' subject='Forcing group'][contact-field label='Ім%26#039;я' type='name' required='1'/][contact-field label='Email' type='email' required='1'/][contact-field label='Лист' type='textarea' required='1'/][/contact-form]"); ?>
                                        </address>
                                        <?php
                                    }
                                    if (!empty($address1)) { ?>
                                        <address class="single-address">
                                            <h4>Місцезнаходження:</h4>

                                            <p><?php echo $address1; ?></p>
                                        </address>
                                        <?php
                                    }
                                    if (!empty($address2)) {
                                        ?>
                                        <address class="single-address">
                                            <h4>Юр. адреса:</h4>

                                            <p><?php echo $address2; ?></p>
                                        </address>
                                        <?php
                                    }
                                }
                                ?>
                            </div>

                        </section>
                        <!-- End Contact section -->
                        <!-- Start Google Map -->
                        <section id="google-map">
                            <div class="overlay" onClick="style.pointerEvents='none'"></div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2595.0815380300414!2d32.05199495095217!3d49.42627246840603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d14b8febf9aa21%3A0xe43a326d1c2451c2!2z0LLRg9C7LiDQnNCw0YDRiNCw0LvQsCDQmtGA0LDRgdC-0LLRgdGM0LrQvtCz0L4sIDgsINCn0LXRgNC60LDRgdC4LCDQp9C10YDQutCw0YHRjNC60LAg0L7QsdC70LDRgdGC0Yw!5e0!3m2!1suk!2sua!4v1459585422479"
                                width="100%" height="700" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </section>

                    </div> <!-- /post-content -->

                </div> <!-- /post -->


                <div class="clear"></div>

            </div> <!-- /content -->

        </div> <!-- /section-inner -->


    </div> <!-- /wrapper -->

<?php get_footer(); ?>