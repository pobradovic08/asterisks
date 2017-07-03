<?php


namespace Asterisks\Controller;

use \Interop\Container\ContainerInterface as ContainerInterface;
use Asterisks\Response;

class BaseController {
    /**
     * Container interfaces provided by Slim framework
     *
     * @var ContainerInterface
     */
    protected $ci;

    /**
     * Contains function that all Controllers have:
     * - Sets the local Container Interface
     * - Initializes Elloquent Capsule (Database)
     * - Creates custom Response instance
     *
     * @param ContainerInterface $ci
     */
    public function __construct( ContainerInterface $ci ) {
        $this->ci = $ci;
        $this->ci->capsule;
        $this->r = new Response();
    }
}