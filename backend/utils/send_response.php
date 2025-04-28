<?php
/**
 * 
 * @param array $data Assoc Array that contains the answer information
 *                      - "status" (string): internal code to identify the problem
 *                      - "message" (string): message to send
 * 
 */



/**
 * Answers a request made to the endpoint.
 *
 * @param int $httpCode HTTP response code
 * @param string $message message to send 
 * 
 * @return none
 */
function send_response($httpCode=200, $message="empty response"){

    http_response_code( $httpCode );
    echo( json_encode( $message ) );

}


?>