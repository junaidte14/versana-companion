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

    // Add trailing slash if not present
    $directory = trailingslashit( $directory );

    // Get all PHP files in the directory
    $files = glob( $directory . '*.php' );

    if ( ! $files ) {
        return;
    }

    foreach ( $files as $file ) {

        // Extract pattern metadata from file headers
        $data = get_file_data( $file, array(
            'title'       => 'Title',
            'slug'        => 'Slug',
            'categories'  => 'Categories',
            'description' => 'Description',
            'keywords'    => 'Keywords',
            'blockTypes'  => 'Block Types',
        ) );

        // Skip if missing required metadata
        if ( empty( $data['slug'] ) || empty( $data['title'] ) ) {
            continue;
        }

        // Get the pattern content
        ob_start();
        include $file;
        $content = ob_get_clean();

        // Register the block pattern
        register_block_pattern(
            $data['slug'],
            array(
                'title'       => $data['title'],
                'description' => $data['description'],
                'content'     => trim( $content ),
                'categories'  => array_filter( array_map( 'trim', explode( ',', $data['categories'] ) ) ),
                'keywords'    => array_filter( array_map( 'trim', explode( ',', $data['keywords'] ) ) ),
                'blockTypes'  => array_filter( array_map( 'trim', explode( ',', $data['blockTypes'] ) ) ),
            )
        );
    }
}

/**
 * Bulk register patterns from all demo folders
 * Registers patterns from:
 * 1. Root /patterns/ folder (common patterns)
 * 2. All subdirectories in /patterns/ (demo-specific patterns)
 *
 * @return void
 */
function versana_plugin_bulk_register_patterns() {

    $base_dir = VERSANA_COMPANION_PATH . '/patterns/';

    // First, register common patterns from root patterns folder
    versana_register_patterns_from_directory( $base_dir );

    // Get all subdirectories (demo folders)
    $demo_folders = versana_get_pattern_subdirectories( $base_dir );

    // Register patterns from each demo folder
    if ( ! empty( $demo_folders ) ) {
        foreach ( $demo_folders as $demo_folder ) {
            $demo_dir = $base_dir . trailingslashit( $demo_folder );
            versana_register_patterns_from_directory( $demo_dir );
        }
    }
}
add_action( 'init', 'versana_plugin_bulk_register_patterns' );

/**
 * Get all subdirectories in the patterns folder
 *
 * @param string $base_dir Base patterns directory path
 * @return array List of subdirectory names
 */
function versana_get_pattern_subdirectories( $base_dir ) {
    $subdirectories = array();

    if ( ! is_dir( $base_dir ) ) {
        return $subdirectories;
    }

    $items = scandir( $base_dir );

    foreach ( $items as $item ) {
        // Skip current and parent directory markers
        if ( $item === '.' || $item === '..' ) {
            continue;
        }

        $full_path = $base_dir . $item;
        
        // Only include directories
        if ( is_dir( $full_path ) ) {
            $subdirectories[] = $item;
        }
    }

    return $subdirectories;
}

/**
 * Get available demo pattern folders (for admin/settings use)
 *
 * @return array List of available demo folders with metadata
 */
function versana_get_available_demo_patterns() {
    $base_dir = VERSANA_COMPANION_PATH . '/patterns/';
    $demos    = array();

    $subdirectories = versana_get_pattern_subdirectories( $base_dir );

    foreach ( $subdirectories as $folder ) {
        $pattern_count = count( glob( $base_dir . $folder . '/*.php' ) );
        
        $demos[ $folder ] = array(
            'name'          => ucfirst( $folder ),
            'folder'        => $folder,
            'pattern_count' => $pattern_count,
        );
    }

    return $demos;
}