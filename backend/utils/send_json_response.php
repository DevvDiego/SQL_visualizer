<?php
/**
 * 
 * @param array $data Assoc Array that contains the answer information
 *                      - "status" (string): internal code to identify the problem
 *                      - "message" (string): message to send
 * 
 */



/**
 * Answers a request made to the endpoint with a json.
 * 
 * @param int $httpCode HTTP response code
 * @param string $message message to send 
 * 
 * @return never
 */
function send_json_response($httpCode, $message="empty response") : never {
    header("Content-Type: application/json");
    http_response_code( $httpCode );
    
    // if message is a string, convert to assoc array
    if( is_string($message) ){
        $message = ["message" => $message];
    }
    
    
    echo( json_encode( $message ) );
    exit;
}


?>