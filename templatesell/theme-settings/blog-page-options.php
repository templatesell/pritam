<?php
/*Blog Page Options*/
$wp_customize->add_section('pritam_blog_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Blog Settings', 'pritam'),
    'panel' => 'pritam_panel',
));
/*Blog Page Sidebar Layout*/

$wp_customize->add_setting('pritam_options[pritam-sidebar-blog-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-sidebar-blog-page'],
    'sanitize_callback' => 'pritam_sanitize_select'
));

$wp_customize->add_control( new Pritam_Radio_Image_Control(
        $wp_customize,
    'pritam_options[pritam-sidebar-blog-page]', array(
    'choices' => pritam_blog_sidebar_position_array(),
    'label' => __('Blog and Archive Sidebar', 'pritam'),
    'description' => __('This sidebar will work blog and archive pages.', 'pritam'),
    'section' => 'pritam_blog_page_section',
    'settings' => 'pritam_options[pritam-sidebar-blog-page]',
    'type' => 'select',
    'priority' => 15,
)));


/*Blog Page column number*/
$wp_customize->add_setting('pritam_options[pritam-column-blog-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-column-blog-page'],
    'sanitize_callback' => 'pritam_sanitize_select'
));

$wp_customize->add_control('pritam_options[pritam-column-blog-page]', array(
    'choices' => array(
        'one-column' => __('Single Layout', 'pritam'),
        'masonry-post' => __('Masonry Layout', 'pritam'),
    
    ),
    'label' => __('Blog Layout Options', 'pritam'),
    'description' => __('Change your blog or archive page layout.', 'pritam'),
    'section' => 'pritam_blog_page_section',
    'settings' => 'pritam_options[pritam-column-blog-page]',
    'type' => 'select',
    'priority' => 15,
));


/*Image Layout Options For Blog Page*/
$wp_customize->add_setting('pritam_options[pritam-blog-image-layout]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-blog-image-layout'],
    'sanitize_callback' => 'pritam_sanitize_select'
));

$wp_customize->add_control('pritam_options[pritam-blog-image-layout]', array(
    'choices' => array(
        'full-image' => __('Full Layout', 'pritam'),
        'left-image' => __('Grid Layout', 'pritam'),
    
    ),
    'label' => __('Blog Page Layout', 'pritam'),
    'description' => __('This will work only on Full layout Option', 'pritam'),
    'section' => 'pritam_blog_page_section',
    'settings' => 'pritam_options[pritam-blog-image-layout]',
    'type' => 'select',
    'priority' => 15,
));

/*Blog Page Show content from*/
$wp_customize->add_setting('pritam_options[pritam-content-show-from]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-content-show-from'],
    'sanitize_callback' => 'pritam_sanitize_select'
));

$wp_customize->add_control('pritam_options[pritam-content-show-from]', array(
    'choices' => array(
        'excerpt' => __('Show from Excerpt', 'pritam'),
        'content' => __('Show from Content', 'pritam'),
        'no-content' => __('No Content', 'pritam'),
    ),
    'label' => __('Select Content Display From', 'pritam'),
    'description' => __('You can enable excerpt from Screen Options inside post section of dashboard', 'pritam'),
    'section' => 'pritam_blog_page_section',
    'settings' => 'pritam_options[pritam-content-show-from]',
    'type' => 'select',
    'priority' => 15,
));


/*Blog Page excerpt length*/
$wp_customize->add_setting('pritam_options[pritam-excerpt-length]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-excerpt-length'],
    'sanitize_callback' => 'absint'

));

$wp_customize->add_control('pritam_options[pritam-excerpt-length]', array(
    'label' => __('Excerpt Length', 'pritam'),
    'description' => __('Enter the number per Words to show the content in blog page.', 'pritam'),
    'section' => 'pritam_blog_page_section',
    'settings' => 'pritam_options[pritam-excerpt-length]',
    'type' => 'number',
    'priority' => 15,
));

/*Exclude Category in Blog Page*/
$wp_customize->add_setting('pritam_options[pritam-blog-exclude-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-blog-exclude-category'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('pritam_options[pritam-blog-exclude-category]', array(
    'label' => __('Exclude categories in Blog Listing', 'pritam'),
    'description' => __('Enter categories ids with comma separated eg: 2,7,14,47.', 'pritam'),
    'section' => 'pritam_blog_page_section',
    'settings' => 'pritam_options[pritam-blog-exclude-category]',
    'type' => 'text',
    'priority' => 15,
));

