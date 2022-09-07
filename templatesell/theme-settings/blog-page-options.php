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

/*Blog Page Pagination Options*/
$wp_customize->add_setting('pritam_options[pritam-pagination-options]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-pagination-options'],
    'sanitize_callback' => 'pritam_sanitize_select'

));

$wp_customize->add_control('pritam_options[pritam-pagination-options]', array(
    'choices' => array(
        'numeric' => __('Numeric Pagination', 'pritam'),
        'ajax' => __('Ajax Pagination', 'pritam'),
    ),
    'label' => __('Pagination Types', 'pritam'),
    'description' => __('Choose Required Pagination Type', 'pritam'),
    'section' => 'pritam_blog_page_section',
    'settings' => 'pritam_options[pritam-pagination-options]',
    'type' => 'select',
    'priority' => 15,
));

/*Blog Page read more text*/
$wp_customize->add_setting('pritam_options[pritam-read-more-text]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('pritam_options[pritam-read-more-text]', array(
    'label' => __('Read More Text', 'pritam'),
    'description' => __('Read more text for blog and archive page.', 'pritam'),
    'section' => 'pritam_blog_page_section',
    'settings' => 'pritam_options[pritam-read-more-text]',
    'type' => 'text',
    'priority' => 15,
));


/*Social Share in blog page*/
$wp_customize->add_setting('pritam_options[pritam-show-hide-share]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-show-hide-share'],
    'sanitize_callback' => 'pritam_sanitize_checkbox'
));

$wp_customize->add_control('pritam_options[pritam-show-hide-share]', array(
    'label' => __('Show Social Share', 'pritam'),
    'description' => __('Options to Enable Social Share in blog and archive page.', 'pritam'),
    'section' => 'pritam_blog_page_section',
    'settings' => 'pritam_options[pritam-show-hide-share]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Category Show hide*/
$wp_customize->add_setting('pritam_options[pritam-show-hide-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-show-hide-category'],
    'sanitize_callback' => 'pritam_sanitize_checkbox'
));

$wp_customize->add_control('pritam_options[pritam-show-hide-category]', array(
    'label' => __('Show Category', 'pritam'),
    'description' => __('Option to hide the category on the blog page.', 'pritam'),
    'section' => 'pritam_blog_page_section',
    'settings' => 'pritam_options[pritam-show-hide-category]',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Date Show hide*/
$wp_customize->add_setting('pritam_options[pritam-show-hide-date]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-show-hide-date'],
    'sanitize_callback' => 'pritam_sanitize_checkbox'
));

$wp_customize->add_control('pritam_options[pritam-show-hide-date]', array(
    'label' => __('Show Date', 'pritam'),
    'description' => __('Option to hide the date on the blog page.', 'pritam'),
    'section' => 'pritam_blog_page_section',
    'settings' => 'pritam_options[pritam-show-hide-date]',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Author Show hide*/
$wp_customize->add_setting('pritam_options[pritam-show-hide-author]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-show-hide-author'],
    'sanitize_callback' => 'pritam_sanitize_checkbox'
));

$wp_customize->add_control('pritam_options[pritam-show-hide-author]', array(
    'label' => __('Show Author', 'pritam'),
    'description' => __('Option to hide the author on the blog page.', 'pritam'),
    'section' => 'pritam_blog_page_section',
    'settings' => 'pritam_options[pritam-show-hide-author]',
    'type' => 'checkbox',
    'priority' => 15,
));

