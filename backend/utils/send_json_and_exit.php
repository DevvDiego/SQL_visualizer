<?php
/**
 * Answers a request made to the endpoint with a json.
 * 
 * @param int $httpCode HTTP response code
 * @param string $message message to send 
 * 
 * @return never
 */
function send_json_and_exit($httpCode, $message="empty response") : never {
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