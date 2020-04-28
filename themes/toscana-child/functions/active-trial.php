<?php
/**
 * Active trial pojo forms integration
 *
 * @author		HTMLine
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


define('ACTIVETRAIL_API_URL',               'http://webapi.mymarketing.co.il');
define('AT_ENDPOINT_CONTACTS',				'/api/contacts');
define('AT_ENDPOINT_CONTACTS_IMPORT',		'/api/contacts/Import');
define('AT_ENDPOINT_ACCOUNT_BALANCE',		'/api/account/balance');
define('AT_ENDPOINT_GET_CONTACT_FIELDS',	'/api/account/contactFields');

define('APP_TOKEN_ID',                  	'0X0E7F823F0009A10C709FAF058B144967FBED305CAF5E0E52CD2071388FC93D571283BED12745BA6D496AE7850EAC155F');
define('AT_GROUP_ID' ,                  	'381104');




/**
 * The active trail API connector class.
 *
 * Defines the plugin name, version, 
 *
 * @package	Activetrail_Cf7
 * @subpackage Activetrail_Cf7/admin
 * @author	 ActiveTrail <contact@activetrail.com>
 */
class Activetrail_Api {

	private $credentials = null;
	
	public function __construct($credentials = null) {}
	
	public function get_contact_fields(){
		$url = ACTIVETRAIL_API_URL . AT_ENDPOINT_GET_CONTACT_FIELDS;
		
		$args = array(
			'headers' => array(
				'Authorization' => 'Basic '. APP_TOKEN_ID,
				'Content-Type' => 'application/json'                                                                                
			)
		);
		
		$response = wp_remote_get( $url, $args );
		$body = wp_remote_retrieve_body( $response );
		
		return $body;
	}
	
	public function get_contact($data = array()){
		
		$url = ACTIVETRAIL_API_URL . AT_ENDPOINT_CONTACTS;
		
		$url = sprintf("%s?%s", $url, http_build_query($data));
		
		$args = array(
			'headers' => array(
				'Authorization' => 'Basic '. APP_TOKEN_ID,
				'Content-Type' => 'application/json'                                                                                
			)
		);
		
		$response = wp_remote_get( $url, $args );
		$body = wp_remote_retrieve_body( $response );
		
		return $body;
	}
	
	
	public function import_contacts($data){
		
		$url = ACTIVETRAIL_API_URL . AT_ENDPOINT_CONTACTS_IMPORT;
		
		$data_string = '';
		if($data)
			$data_string = json_encode($data);
		
		$args = array(
			'headers' => array(
				'Authorization' => 'Basic '. APP_TOKEN_ID,
				'Content-Type' => 'application/json; charset=utf-8',
				'Content-Length' => strlen($data_string)
			),
			'method' => 'POST',
			'body' => $data_string,
			'timeout' => '5',
			'redirection' => '5',
			'httpversion' => '1.0',
			'blocking' => true,
			'cookies' => array()
		);
				
		$response = wp_remote_post( $url, $args );
        
        // Error handling
	    if ( is_wp_error( $response ) ) {
            // Enable Debug logging to the /wp-content/debug.log file
    		if ( defined( 'WP_DEBUG_LOG' ) && WP_DEBUG_LOG ) {
    			error_log( $response->get_error_message() );
    		}
            
            return -1;
	   }
        
		$body = wp_remote_retrieve_body( $response );
		
		return $body;
	}
	
}



function htmline_send_user_to_active_trial( $form_id, $field_values ) {
        
    // Get Pojo's form fields	
	$fields = wp_list_pluck( $field_values, 'value', 'title' );
    
    // ActiveTrial Fields to send
    $basic_fields = array( 'email' => sanitize_email($fields['Email']) );

	$data = array(
					//'mailing_list' => $list_id,
					'group' => AT_GROUP_ID,
					'contacts' => array($basic_fields)
		);
	
	$activetrail_api = new Activetrail_Api();
	
	$res_json = $activetrail_api->import_contacts($data);
	
    //error_log( print_r($res_json,true) );
	
    return $res_json;
}


add_action( 'pojo_forms_mail_sent','htmline_send_user_to_active_trial', 10, 2 );