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

function versana_plugin_bulk_register_patterns() {

    $dir   = VERSANA_COMPANION_PATH . '/patterns/';
    $files = glob( $dir . '*.php' );

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
add_action( 'init', 'versana_plugin_bulk_register_patterns' );