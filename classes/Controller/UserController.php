<?php


namespace Asterisks\Controller;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;


class UserController extends BaseController {

    /***
     * Fetch all Users from database
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param $args
     * @return mixed
     */
    public function get_users( ServerRequestInterface $request, ResponseInterface $response, $args ) {
        //TODO: complete method
        return $response->withStatus( $this->r->getCode() )->withJson( $this->r );
    }

    /***
     * Fetch a single User from database
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param $args
     * @return mixed
     */
    public function get_user( ServerRequestInterface $request, ResponseInterface $response, $args ) {
        $user_id = (int)$args['user_id'];
        $this->r->setData( $user_id );
        //TODO: complete method
        return $response->withStatus( $this->r->getCode() )->withJson( $this->r );
    }
}