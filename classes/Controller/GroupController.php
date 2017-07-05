<?php


namespace Asterisks\Controller;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;


class GroupController extends BaseController {

    /***
     * Fetch all Groups from database
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param $args
     * @return mixed
     */
    public function get_groups (ServerRequestInterface $request, ResponseInterface $response, $args) {
        //TODO: complete method
        return $response->withStatus($this->r->getCode())->withJson($this->r);
    }

    /***
     * Fetch a single Group from database
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param $args
     * @return mixed
     */
    public function get_group (ServerRequestInterface $request, ResponseInterface $response, $args) {
        $group_id = (int) $args['group_id'];
        $this->r->setData($group_id);
        //TODO: complete method
        return $response->withStatus($this->r->getCode())->withJson($this->r);
    }
}