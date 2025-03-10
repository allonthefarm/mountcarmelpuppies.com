<?php
/**
 * Set the title of a custom post type Pod, based on the value of other fields, in this case the fields "puppy_name" and "beverage" in the Pod "puppy"
 * 
 * Post Type = puppy
 * Field = puppy_name
 * Date
 *
 * This function only acts when a new item is created, but can be modified to act on all saves.
 */
add_filter( 'pods_api_pre_save_pod_item_puppy', 'slug_set_title', 10, 2);
function slug_set_title($pieces, $is_new_item) {
    //check if is new item, if not return $pieces without making any changes
    if ( ! $is_new_item ) {
        return $pieces;
    }
    //make sure that all three fields are active
    $fields = array( 'post_title', 'puppy_name' );
    foreach( $fields as $field ) {
        if ( ! isset( $pieces[ 'fields_active' ][ $field ] ) ) {
            array_push ($pieces[ 'fields_active' ], $field );
        }
    }
    //set variables for fields empty first for saftey's sake
    $puppy_name = '';
    //get value of "puppy_name" if possible
    if ( isset( $pieces[ 'fields' ][ 'puppy_name' ] ) && isset( $pieces[ 'fields'][ 'puppy_name' ][ 'value' ] ) && is_string( $pieces[ 'fields' ][ 'puppy_name' ][ 'value' ] ) ) {
        $puppy_name = $pieces[ 'fields' ][ 'puppy_name' ][ 'value' ];
    }

     //make a simple date
     $date = date('d-M-Y', strtotime($data['post_date']));

    //set post title using $puppy_name and $beverage
    $pieces[ 'object_fields' ][ 'post_title' ][ 'value' ] = $puppy_name . ' and ' . $date;
    //return $pieces to save
    return $pieces;
}