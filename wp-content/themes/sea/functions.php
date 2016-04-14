<?php

// Theme setup
add_action('after_setup_theme', 'sea_setup');

function sea_setup()
{

    // Automatic feed
    add_theme_support('automatic-feed-links');

    // Post thumbnails
    add_theme_support('post-thumbnails');
    add_image_size('post-image', 945, 9999);
    add_image_size('post-thumbnail', 600, 9999);

    // Post formats
    add_theme_support('post-formats', array('aside', 'image', 'link', 'video', 'quote'));

    // Custom header
    $args = array(
        'width' => 1440,
        'height' => 221,
        'default-image' => get_template_directory_uri() . '/images/bg-laptop.jpg',
        'uploads' => true,
        'header-text' => false
    );
    add_theme_support('custom-header', $args);

    // Add support for title_tag
    add_theme_support('title-tag');

    // Add support for custom background
    $args = array(
        'default-color' => '#f1f1f1'
    );
    add_theme_support("custom-background", $args);

    // Add nav menu
    register_nav_menu('primary', 'Primary Menu');
    register_nav_menu('footer', 'Footer Menu');

    // Make the theme translation ready
    load_theme_textdomain('sea', get_template_directory() . '/languages');

    $locale = get_locale();
    $locale_file = get_template_directory() . "/languages/$locale.php";
    if (is_readable($locale_file))
        require_once($locale_file);

}


// Enqueue Javascript files
function sea_load_javascript_files()
{

    if (!is_admin()) {
        wp_register_script('sea_imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.js', array('jquery'), '', true);
        wp_register_script('sea_global', get_template_directory_uri() . '/js/global.js', array('jquery'), '', true);
        wp_enqueue_script('sea_skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

        wp_enqueue_script('jquery');
        wp_enqueue_script('masonry');
        wp_enqueue_script('sea_imagesloaded');
        wp_enqueue_script('sea_global');
        wp_enqueue_script('sea_skip-link-focus-fix');
    }
}

add_action('wp_enqueue_scripts', 'sea_load_javascript_files');


// Enqueue styles
function sea_load_style()
{
    if (!is_admin()) {
        wp_register_style('sea_googleFonts', '//fonts.googleapis.com/css?family=Roboto+Slab:400,700|Niconne|Roboto:400,300,400italic,700,700italic&subset=latin,cyrillic');
        wp_register_style('sea-styleAwesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
        wp_register_style('sea_style', get_stylesheet_uri());

        wp_enqueue_style('sea_googleFonts');
        wp_enqueue_style('sea-styleAwesome');
        wp_enqueue_style('sea_style');
    }
}

add_action('wp_print_styles', 'sea_load_style');


// Add footer widget areas
add_action('widgets_init', 'sea_sidebar_reg');

function sea_sidebar_reg()
{
    register_sidebar(array(
        'name' => __('Footer A', 'sea'),
        'id' => 'footer-a',
        'description' => __('left column in the footer', 'sea'),
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
        'after_widget' => '</div><div class="clear"></div></div>'
    ));
    register_sidebar(array(
        'name' => __('Footer B', 'sea'),
        'id' => 'footer-b',
        'description' => __('middle column in the footer', 'sea'),
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
        'after_widget' => '</div><div class="clear"></div></div>'
    ));
    register_sidebar(array(
        'name' => __('Footer C', 'sea'),
        'id' => 'footer-c',
        'description' => __('right column in the footer', 'sea'),
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
        'after_widget' => '</div><div class="clear"></div></div>'
    ));
    register_sidebar(array(
        'name' => __('Sidebar', 'sea'),
        'id' => 'sidebar',
        'description' => __('in the sidebar', 'sea'),
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
        'after_widget' => '</div><div class="clear"></div></div>'
    ));
}

// Set content-width
if (!isset($content_width)) $content_width = 676;


// Add classes to next_posts_link and previous_posts_link
add_filter('next_posts_link_attributes', 'sea_posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'sea_posts_link_attributes_2');

function sea_posts_link_attributes_1()
{
    return 'class="post-nav-older fleft"';
}

function sea_posts_link_attributes_2()
{
    return 'class="post-nav-newer fright"';
}


// Menu walker adding "has-children" class to menu li's with children menu items
class sea_nav_walker extends Walker_Nav_Menu
{
    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        $id_field = $this->db_fields['id'];
        if (!empty($children_elements[$element->$id_field])) {
            $element->classes[] = 'has-children';
        }
        Walker_Nav_Menu::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}


// Add class to body if the post/page has a featured image
add_action('body_class', 'sea_if_featured_image_class');

function sea_if_featured_image_class($classes)
{
    global $post;
    if (isset($post) && has_post_thumbnail()) {
        $classes[] = 'has-featured-image';
    } else {
        $classes[] = 'no-featured-image';
    }
    return $classes;
}


// Add class to body if it's viewed on mobile
add_action('body_class', 'sea_if_is_mobile');

function sea_if_is_mobile($classes)
{
    global $post;
    if (wp_is_mobile()) {
        $classes[] = 'is_mobile';
    }
    return $classes;
}


// Add class to body if it's a single page
add_action('body_class', 'sea_if_page_class');

function sea_if_page_class($classes)
{
    global $post;
    if (is_page() || is_404() || is_attachment()) {
        $classes[] = 'single single-post';
    }
    return $classes;
}

// Add class to body if it's a single page
add_action('body_class', 'sea_if_page_class');


// Change the length of excerpts
function custom_excerpt_length($length)
{
    return 20;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);


// Add more-link text to excerpt
function new_excerpt_more($more)
{
    return '... <a class="more-link" href="' . get_permalink(get_the_ID()) . '">' . __('', 'sea') . ' <span class="fa fa-arrow-circle-right"></span>
</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

function sea_meta()
{ ?>

    <div class="post-meta">

        <a class="post-date" href="<?php the_permalink(); ?>"
           title="<?php the_title_attribute(); ?>"> <?php the_time('d/m/Y'); ?></a>

        <?php

        if (comments_open()) {
            comments_popup_link('0', '1', '%', 'post-comments');
        }

        edit_post_link();

        ?>

        <div class="clear"></div>

    </div> <!-- /post-meta -->

    <?php
}


// Style the admin area
function sea_custom_colors()
{
    echo '<style type="text/css">

#postimagediv #set-post-thumbnail img {
	max-width: 100%;
	height: auto;
}

         </style>';
}

add_action('admin_head', 'sea_custom_colors');


// sea comment function
if (!function_exists('sea_comment')) :
function sea_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
switch ($comment->comment_type) :
case 'pingback' :
case 'trackback' :
    ?>

    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

        <?php __('Пінгбек:', 'sea'); ?><?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', 'sea'), '<span class="edit-link">', '</span>'); ?>

    </li>
    <?php
    break;
default :
global $post;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

    <div id="comment-<?php comment_ID(); ?>" class="comment">

        <?php echo get_avatar($comment, 80); ?>

        <div class="comment-inner">

            <div class="comment-header">

                <?php printf('<cite class="fn">%1$s</cite>',
                    get_comment_author_link()
                ); ?>

                <p>
                    <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)) ?>">Опубліковано <?php echo get_comment_date() . ' / ' . get_comment_time() ?></a>
                </p>

                <div class="comment-actions">

                    <?php edit_comment_link(__('Редагувати', 'sea'), '', ''); ?>

                    <?php comment_reply_link(array_merge($args, array('reply_text' => __('Відповісти', 'sea'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>

                    <div class="clear"></div>

                </div> <!-- /comment-actions -->

            </div> <!-- /comment-header -->

            <div class="comment-content">

                <?php if ('0' == $comment->comment_approved) : ?>

                    <p class="comment-awaiting-moderation"><?php _e('Чекає модерації.', 'sea'); ?></p>

                <?php endif; ?>

                <?php comment_text(); ?>

            </div><!-- /comment-content -->

            <div class="comment-actions-below hidden">

                <?php edit_comment_link(__('Редагувати', 'sea'), '', ''); ?>

                <?php comment_reply_link(array_merge($args, array('reply_text' => __('Відповідь', 'sea'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>

                <div class="clear"></div>

            </div> <!-- /comment-actions -->

        </div> <!-- /comment-inner -->

    </div><!-- /comment-## -->
    <?php
    break;
    endswitch;
    }
    endif;


    // Add Twitter field to user profiles
    function sea_modify_contact_methods($profile_fields)
    {

        // Add new fields
        $profile_fields['twitter'] = 'Twitter-username (without the @)';

        return $profile_fields;
    }

    add_filter('user_contactmethods', 'sea_modify_contact_methods');


    // Add the option to show or hide the email address for post authors
    add_action('show_user_profile', 'show_extra_profile_fields');
    add_action('edit_user_profile', 'show_extra_profile_fields');

    function show_extra_profile_fields($user)
    { ?>

        <h3>Extra profile information</h3>

        <table class="form-table">


            <tr>
                <th><label for="showemail"><?php _e('Показати Е-mail', 'sea'); ?></label></th>

                <td>
                    <input type="checkbox" name="showemail" id="showemail"
                           value="yes" <?php if (esc_attr(get_the_author_meta("showemail", $user->ID)) == "yes") echo "checked"; ?> />
                    <span
                        class="description"><?php _e('Перевірте, чи ви хочете відобразити адресу своєї електронної пошти в повідомленнях і шаблонах сторінки.', 'sea'); ?></span>
                </td>
            </tr>

        </table>
    <?php }

    add_action('personal_options_update', 'save_extra_profile_fields');
    add_action('edit_user_profile_update', 'save_extra_profile_fields');

    function save_extra_profile_fields($user_id)
    {

        if (!current_user_can('edit_user', $user_id))
            return false;

        update_user_meta($user_id, 'showemail', $_POST['showemail']);

    }


    // Add small contact information
    function contact_customize($wp_customize_sm)
    {
        $wp_customize_sm->add_section('contact-sm', array(
            'title' => __('Contact small footer', 'sea'),
            'priority' => 25,
            'description' => 'Add your small contacts!',
        ));


        //Phone
        $wp_customize_sm->add_setting('phone', array(
            'title' => __('Phone', 'sea'),
            'description' => 'Phone',
            'default' => ''
        ));
        $wp_customize_sm->add_control(
            new WP_Customize_Control($wp_customize_sm, 'phone',
                array(
                    'label' => __('Phone', 'sea'),
                    'section' => 'contact-sm',
                    'settings' => 'phone',
                    'type' => 'text',
                )
            )
        );

        //Skype
        $wp_customize_sm->add_setting('skype', array(
            'title' => __('Skype', 'sea'),
            'description' => 'Skype',
            'default' => ''
        ));
        $wp_customize_sm->add_control(
            new WP_Customize_Control($wp_customize_sm, 'skype',
                array(
                    'label' => __('Skype', 'sea'),
                    'section' => 'contact-sm',
                    'settings' => 'skype',
                    'type' => 'text',
                )
            )
        );

        //Facebook
        $wp_customize_sm->add_setting('fb', array(
            'title' => __('fb', 'sea'),
            'description' => 'fb',
            'default' => ''
        ));
        $wp_customize_sm->add_control(
            new WP_Customize_Control($wp_customize_sm, 'fb',
                array(
                    'label' => __('fb', 'sea'),
                    'section' => 'contact-sm',
                    'settings' => 'fb',
                    'type' => 'text',
                )
            )
        );
    }

    add_action('customize_register', 'contact_customize');


    // Add contact information
    function contact_customize_register($wp_customize)
    {
        $wp_customize->add_section('contact', array(
            'title' => __('Сontact page', 'sea'),
            'priority' => 25,
            'description' => 'Add your contacts!',
        ));

        //Address 1
        $wp_customize->add_setting('address1', array(
            'title' => __('address1', 'sea'),
            'description' => 'address1',
            'default' => ''
        ));
        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize, 'address1',
                array(
                    'label' => __('address1', 'sea'),
                    'section' => 'contact',
                    'settings' => 'address1',
                    'type' => 'text',
                )
            )
        );

        //Address 2
        $wp_customize->add_setting('address2', array(
            'title' => __('address2', 'sea'),
            'description' => 'address2',
            'default' => ''
        ));
        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize, 'address2',
                array(
                    'label' => __('address2', 'sea'),
                    'section' => 'contact',
                    'settings' => 'address2',
                    'type' => 'text',
                )
            )
        );


        //Phone 1
        $wp_customize->add_setting('phone1', array(
            'title' => __('Phone 1', 'sea'),
            'description' => 'Phone 1',
            'default' => ''
        ));
        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize, 'phone1',
                array(
                    'label' => __('Phone Number 1', 'sea'),
                    'section' => 'contact',
                    'settings' => 'phone1',
                    'type' => 'text',
                )
            )
        );


        //Phone 2
        $wp_customize->add_setting('phone2', array(
            'title' => __('Phone 2', 'sea'),
            'description' => 'Phone 2',
            'default' => ''
        ));
        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize, 'phone2',
                array(
                    'label' => __('Phone Number 2', 'sea'),
                    'section' => 'contact',
                    'settings' => 'phone2',
                    'type' => 'text',
                )
            )
        );

        //Phone 3
        $wp_customize->add_setting('phone3', array(
            'title' => __('Phone 3', 'sea'),
            'description' => 'Phone 3',
            'default' => ''
        ));
        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize, 'phone3',
                array(
                    'label' => __('Phone Number 3', 'sea'),
                    'section' => 'contact',
                    'settings' => 'phone3',
                    'type' => 'text',
                )
            )
        );

        //Phone 4
        $wp_customize->add_setting('phone4', array(
            'title' => __('Phone 4', 'sea'),
            'description' => 'Phone 4',
            'default' => ''
        ));
        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize, 'phone4',
                array(
                    'label' => __('Phone Number 4', 'sea'),
                    'section' => 'contact',
                    'settings' => 'phone4',
                    'type' => 'text',
                )
            )
        );

        //Phone 5
        $wp_customize->add_setting('phone5', array(
            'title' => __('Phone 5', 'sea'),
            'description' => 'Phone 5',
            'default' => ''
        ));
        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize, 'phone5',
                array(
                    'label' => __('Phone Number 5', 'sea'),
                    'section' => 'contact',
                    'settings' => 'phone5',
                    'type' => 'text',
                )
            )
        );

        //Email support
        $wp_customize->add_setting('email_sup', array(
            'title' => __('Support E-mail', 'sea'),
            'description' => 'Support E-mail',
            'default' => ''
        ));
        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize, 'email_sup',
                array(
                    'label' => __('E-Mail Support', 'sea'),
                    'section' => 'contact',
                    'settings' => 'email_sup',
                    'type' => 'text',
                )
            )
        );

        //Email sales
        $wp_customize->add_setting('email_sal', array(
            'title' => __('Sales E-mail', 'sea'),
            'description' => 'Sales E-mail',
            'default' => ''
        ));
        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize, 'email_sal',
                array(
                    'label' => __('E-mail Sales', 'sea'),
                    'section' => 'contact',
                    'settings' => 'email_sal',
                    'type' => 'text',
                )
            )
        );
    }

    add_action('customize_register', 'contact_customize_register');

    ?>
