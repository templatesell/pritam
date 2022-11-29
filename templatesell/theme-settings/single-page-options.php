<?php
$GLOBALS['pritam_theme_options'] = pritam_get_options_value();

/*Single Page Options*/
$wp_customize->add_section('pritam_single_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Single Page Settings', 'pritam'),
    'panel' => 'pritam_panel',
));

/*Featured Image Option*/
$wp_customize->add_setting('pritam_options[pritam-single-page-featured-image]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-single-page-featured-image'],
    'sanitize_callback' => 'pritam_sanitize_checkbox'
));

$wp_customize->add_control('pritam_options[pritam-single-page-featured-image]', array(
    'label' => __('Enable Featured Image on Single Posts', 'pritam'),
    'description' => __('You can hide images on single post from here.', 'pritam'),
    'section' => 'pritam_single_page_section',
    'settings' => 'pritam_options[pritam-single-page-featured-image]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Single Page Sidebar Layout*/
$wp_customize->add_setting('pritam_options[pritam-sidebar-single-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-sidebar-single-page'],
    'sanitize_callback' => 'pritam_sanitize_select'
));

/*Related Post Options*/
$wp_customize->add_setting('pritam_options[pritam-single-page-related-posts]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-single-page-related-posts'],
    'sanitize_callback' => 'pritam_sanitize_checkbox'
));

$wp_customize->add_control('pritam_options[pritam-single-page-related-posts]', array(
    'label' => __('Related Posts', 'pritam'),
    'description' => __('2 posts of same category will appear.', 'pritam'),
    'section' => 'pritam_single_page_section',
    'settings' => 'pritam_options[pritam-single-page-related-posts]',
    'type' => 'checkbox',
    'priority' => 15,
));


/*callback functions related posts*/
if (!function_exists('pritam_related_post_callback')) :
    function pritam_related_post_callback()
    {
        global $pritam_theme_options;
        $related_posts = absint($pritam_theme_options['pritam-single-page-related-posts']);
        if (1 == $related_posts) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Related Post Title*/
$wp_customize->add_setting('pritam_options[pritam-single-page-related-posts-title]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('pritam_options[pritam-single-page-related-posts-title]', array(
    'label' => __('Related Posts Title', 'pritam'),
    'description' => __('Enter the suitable title.', 'pritam'),
    'section' => 'pritam_single_page_section',
    'settings' => 'pritam_options[pritam-single-page-related-posts-title]',
    'type' => 'text',
    'priority' => 15,
    'active_callback' => 'pritam_related_post_callback'
));

/*Social Share Options*/
$wp_customize->add_setting('pritam_options[pritam-single-social-share]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-single-social-share'],
    'sanitize_callback' => 'pritam_sanitize_checkbox'
));

$wp_customize->add_control('pritam_options[pritam-single-social-share]', array(
    'label' => __('Social Sharing', 'pritam'),
    'description' => __('Enable Social Sharing on Single Posts.', 'pritam'),
    'section' => 'pritam_single_page_section',
    'settings' => 'pritam_options[pritam-single-social-share]',
    'type' => 'checkbox',
    'priority' => 15,
));
