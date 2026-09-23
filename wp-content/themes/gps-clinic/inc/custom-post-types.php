<?php
/**
 * Custom Post Types: Hardware Products + Software Solutions
 */

function gpsclinic_register_cpts() {

    // Hardware Products
    register_post_type( 'hardware', [
        'labels' => [
            'name'               => 'Hardware Products',
            'singular_name'      => 'Hardware Product',
            'add_new_item'       => 'Add New Hardware Product',
            'edit_item'          => 'Edit Hardware Product',
            'new_item'           => 'New Hardware Product',
            'view_item'          => 'View Hardware Product',
            'search_items'       => 'Search Hardware Products',
            'not_found'          => 'No hardware products found',
            'not_found_in_trash' => 'No hardware products in trash',
        ],
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => [ 'slug' => 'hardware' ],
        'menu_icon'          => 'dashicons-admin-generic',
        'menu_position'      => 5,
        'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'show_in_rest'       => true,
    ] );

    // Software Solutions
    register_post_type( 'solution', [
        'labels' => [
            'name'               => 'Software Solutions',
            'singular_name'      => 'Software Solution',
            'add_new_item'       => 'Add New Solution',
            'edit_item'          => 'Edit Solution',
            'new_item'           => 'New Solution',
            'view_item'          => 'View Solution',
            'search_items'       => 'Search Solutions',
            'not_found'          => 'No solutions found',
            'not_found_in_trash' => 'No solutions in trash',
        ],
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => [ 'slug' => 'solutions' ],
        'menu_icon'          => 'dashicons-laptop',
        'menu_position'      => 6,
        'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'show_in_rest'       => true,
    ] );
}
add_action( 'init', 'gpsclinic_register_cpts' );


/**
 * Meta boxes for Hardware Products
 */
function gpsclinic_hardware_meta_boxes() {
    add_meta_box(
        'hardware_details',
        'Product Details',
        'gpsclinic_hardware_meta_box_html',
        'hardware',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'gpsclinic_hardware_meta_boxes' );

function gpsclinic_hardware_meta_box_html( $post ) {
    wp_nonce_field( 'gpsclinic_save_hardware_meta', 'gpsclinic_hardware_nonce' );
    $tagline      = get_post_meta( $post->ID, '_hw_tagline', true );
    $tags         = get_post_meta( $post->ID, '_hw_tags', true );       // comma-separated
    $band_items   = get_post_meta( $post->ID, '_hw_band_items', true ); // comma-separated
    $icon_svg     = get_post_meta( $post->ID, '_hw_icon_svg', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="hw_tagline">Short Tagline</label></th>
            <td><input type="text" id="hw_tagline" name="hw_tagline" value="<?php echo esc_attr($tagline); ?>" class="widefat" placeholder="e.g. Live location, geofencing, overspeed alerts..."></td>
        </tr>
        <tr>
            <th><label for="hw_tags">Product Tags</label></th>
            <td><input type="text" id="hw_tags" name="hw_tags" value="<?php echo esc_attr($tags); ?>" class="widefat" placeholder="Cars & SUVs, Bikes & Scooters, Trucks & HCV (comma-separated)"></td>
        </tr>
        <tr>
            <th><label for="hw_band_items">Orange Band Features</label></th>
            <td><input type="text" id="hw_band_items" name="hw_band_items" value="<?php echo esc_attr($band_items); ?>" class="widefat" placeholder="1–2 Hour Installation, No SIM Required, AIS 140 Compliant (comma-separated)"><p class="description">Shown in the orange band below the hero. Up to 5 items.</p></td>
        </tr>
        <tr>
            <th><label for="hw_icon_svg">Card Icon SVG Path</label></th>
            <td><input type="text" id="hw_icon_svg" name="hw_icon_svg" value="<?php echo esc_attr($icon_svg); ?>" class="widefat" placeholder='e.g. M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10...'><p class="description">SVG path data for the product card icon on the home page.</p></td>
        </tr>
    </table>
    <?php
}

function gpsclinic_save_hardware_meta( $post_id ) {
    if ( ! isset( $_POST['gpsclinic_hardware_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['gpsclinic_hardware_nonce'], 'gpsclinic_save_hardware_meta' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = [ 'hw_tagline' => '_hw_tagline', 'hw_tags' => '_hw_tags', 'hw_band_items' => '_hw_band_items', 'hw_icon_svg' => '_hw_icon_svg' ];
    foreach ( $fields as $input => $meta_key ) {
        if ( isset( $_POST[ $input ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $input ] ) );
        }
    }
}
add_action( 'save_post_hardware', 'gpsclinic_save_hardware_meta' );


/**
 * Meta boxes for Software Solutions
 */
function gpsclinic_solution_meta_boxes() {
    add_meta_box(
        'solution_details',
        'Solution Details',
        'gpsclinic_solution_meta_box_html',
        'solution',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'gpsclinic_solution_meta_boxes' );

function gpsclinic_solution_meta_box_html( $post ) {
    wp_nonce_field( 'gpsclinic_save_solution_meta', 'gpsclinic_solution_nonce' );
    $tagline    = get_post_meta( $post->ID, '_sol_tagline', true );
    $tags       = get_post_meta( $post->ID, '_sol_tags', true );
    $industry   = get_post_meta( $post->ID, '_sol_industry', true );
    $icon_svg   = get_post_meta( $post->ID, '_sol_icon_svg', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="sol_tagline">Short Tagline</label></th>
            <td><input type="text" id="sol_tagline" name="sol_tagline" value="<?php echo esc_attr($tagline); ?>" class="widefat" placeholder="e.g. Student boarding alerts, parent app, school dashboard..."></td>
        </tr>
        <tr>
            <th><label for="sol_tags">Solution Tags</label></th>
            <td><input type="text" id="sol_tags" name="sol_tags" value="<?php echo esc_attr($tags); ?>" class="widefat" placeholder="Schools, RFID, Parent App (comma-separated)"></td>
        </tr>
        <tr>
            <th><label for="sol_industry">Primary Industry</label></th>
            <td><input type="text" id="sol_industry" name="sol_industry" value="<?php echo esc_attr($industry); ?>" class="widefat" placeholder="e.g. Schools & Buses, Fleet Management"></td>
        </tr>
        <tr>
            <th><label for="sol_icon_svg">Card Icon SVG Path</label></th>
            <td><input type="text" id="sol_icon_svg" name="sol_icon_svg" value="<?php echo esc_attr($icon_svg); ?>" class="widefat" placeholder="SVG path data for the solution card icon"></td>
        </tr>
    </table>
    <?php
}

function gpsclinic_save_solution_meta( $post_id ) {
    if ( ! isset( $_POST['gpsclinic_solution_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['gpsclinic_solution_nonce'], 'gpsclinic_save_solution_meta' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = [ 'sol_tagline' => '_sol_tagline', 'sol_tags' => '_sol_tags', 'sol_industry' => '_sol_industry', 'sol_icon_svg' => '_sol_icon_svg' ];
    foreach ( $fields as $input => $meta_key ) {
        if ( isset( $_POST[ $input ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $input ] ) );
        }
    }
}
add_action( 'save_post_solution', 'gpsclinic_save_solution_meta' );
