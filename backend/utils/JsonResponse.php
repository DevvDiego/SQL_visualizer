<?php

class JsonResponse {

    /**
     *  if message is a string, convert to assoc array
     * @param string $message
     * @return array
     */
    private static function validateAssoc($message ) : array {
        
        if( is_string($message) ){
            $message = ["message" => $message];
        }

        return $message;
    }

    /**
     * Answers a request made to the endpoint with a json and ends the script.
     * @param int $httpCode HTTP response code
     * @param string $message message to send 
     * 
     * @return never
     */
    public static function send_and_exit($httpCode, $message="empty response") : never {
        header("Content-Type: application/json");
        http_response_code( $httpCode );
        
        $message = JsonResponse::validateAssoc($message);
        
        echo( json_encode( $message ) );
        exit;
    }

    
    /**
     * Answers a request made to the endpoint with a json and continues the script.
     * @param int $httpCode HTTP response code
     * @param string $message message to send 
     * 
     * @return void
     */
    public static function send_and_continue($httpCode, $message="empty response") : void {
        header("Content-Type: application/json");
        http_response_code( $httpCode );
        
        $message = JsonResponse::validateAssoc($message);
        
        echo( json_encode( $message ) );
        
        return;
    }

};

?>