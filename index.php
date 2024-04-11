<?php
/*
Plugin Name: Email List Verify Plugin
Description: A plugin to verify email addresses using EmailListVerify API.
Version: 1.0
Author: Kirt Perez
*/

if(class_exists('GFAPI')) {
    echo "forms exists";
     add_filter( 'gform_field_validation', function ( $result, $value, $form, $field ) {
        if ( $field->get_input_type() === 'email' && $result['is_valid'] ) {
    
            $email = $value;
            $key = 'MyXfsOi1WGzLARyZoMjzB';
            $query_args = array(
                'secret' => $key,
                'email' => $email,
                'timeout' => 15
            );
    
            $request_url = add_query_arg( $query_args, 'https://apps.emaillistverify.com/api/verifyEmail' );
            echo $request_url;
    
            // True to submit, False to decline
            //Code 200 returns ok = true, Code 401 returns email_disabled = false
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $request_url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
    
            $response = curl_exec($ch);
            echo $response;
            curl_close($ch);
    
            if ($response !== 'ok') {
                $result['is_valid'] = false;
            }
        }
      
        return $result;
    }, 10, 4 );
    }