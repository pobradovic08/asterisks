<?php

namespace Asterisks;

class Response {
    /**
     * DhcpResponse constructor.
     */
    public function __construct() {
        $this->success = false;
        $this->code = 400;
        $this->messages = array();
        $this->data = array();
    }

    public function clearMessages() {
        $this->messages = array();
    }

    public function addMessage( $message ) {
        try {
            $this->messages[] = strval( $message );
        } catch ( \Exception $e ) {
            throw new \InvalidArgumentException( "Message must be a string" );
        }
    }

    public function getMessages() {
        return $this->messages;
    }

    public function success( $message = null ) {
        $this->success = true;
        $this->setCode( 200 );
        if ( $message ) {
            $this->addMessage( $message );
        }
    }

    public function isSuccessful() {
        return $this->success;
    }

    public function fail( $code = 400, $message = null ) {
        $this->success = false;
        $this->setCode( $code );
        if ( $message ) {
            $this->addMessage( $message );
        }
    }

    public function setCode( $code ) {
        if ( self::validateHttpCode( $code ) ) {
            $this->code = (int)$code;
        } else {
            throw new \InvalidArgumentException( "Invalid status code" );
        }
    }

    public function getCode( $default_code = 200 ) {
        if ( $this->code ) {
            return $this->code;
        } elseif ( self::validateHttpCode( $default_code ) ) {
            return $default_code;
        } else {
            return 500;
        }
    }

    public function setData( $data ) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    static function validateHttpCode( $code ) {
        return is_int( $code ) and ( $code >= 100 ) and ( $code < 600 );
    }
}