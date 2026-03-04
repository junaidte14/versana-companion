<?php
/**
 * Versana Theme Block Patterns
 *
 * @package Versana Companion
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function versana_companion_register_pattern_categories() {
    register_block_pattern_category(
        'versana-companion',
        array( 'label' => __( 'Versana Companion Patterns', 'versana-companion' ) )
    );
}
add_action( 'init', 'versana_companion_register_pattern_categories' );

/**
 * Register block patterns from a specific directory
 *
 * @param string $directory Full path to the directory containing pattern files
 * @return void
 */
function versana_register_patterns_from_directory( $directory ) {
    
    if ( ! is_dir( $directory ) ) {
        return;
    }

    $files = glob( $directory . '*.php' );

    if ( ! $files ) {
        return;
    }

    foreach ( $files as $file ) {

        $data = get_file_data( $file, array(
            'title'       => 'Title',
            'slug'        => 'Slug',
            'categories'  => 'Categories',
            'description' => 'Description',
            'keywords'    => 'Keywords',
            'blockTypes'  => 'Block Types',
        ) );

        if ( empty( $data['slug'] ) || empty( $data['title'] ) ) {
            continue;
        }

        ob_start();
        include $file;
        $content = ob_get_clean();

        register_block_pattern(
            $data['slug'],
            array(
                'title'       => $data['title'],
                'description' => $data['description'],
                'content'     => trim( $content ),
                'categories'  => array_map( 'trim', explode( ',', $data['categories'] ) ),
                'keywords'    => array_map( 'trim', explode( ',', $data['keywords'] ) ),
                'blockTypes'  => array_map( 'trim', explode( ',', $data['blockTypes'] ) ),
            )
        );
    }
}

/**
 * Bulk register patterns from common folder and active demo folder
 *
 * @return void
 */
function versana_plugin_bulk_register_patterns() {

    $base_dir = VERSANA_COMPANION_PATH . '/patterns/';

    // Register common patterns from root patterns folder
    versana_register_patterns_from_directory( $base_dir );

    // Get active demo
    $active_demo = get_option( 'versana_active_demo' );

    // If there's an active demo, register demo-specific patterns
    if ( ! empty( $active_demo ) ) {
        $demo_dir = $base_dir . trailingslashit( sanitize_file_name( $active_demo ) );
        versana_register_patterns_from_directory( $demo_dir );
    }
}
add_action( 'init', 'versana_plugin_bulk_register_patterns' );

/**
 * Get available demo pattern folders
 *
 * @return array List of available demo folders
 */
function versana_get_available_demo_patterns() {
    $base_dir = VERSANA_COMPANION_PATH . '/patterns/';
    $demos    = array();

    if ( ! is_dir( $base_dir ) ) {
        return $demos;
    }

    $items = scandir( $base_dir );

    foreach ( $items as $item ) {
        if ( $item === '.' || $item === '..' ) {
            continue;
        }

        $full_path = $base_dir . $item;
        
        if ( is_dir( $full_path ) ) {
            $demos[] = $item;
        }
    }

    return $demos;
}