<?php


namespace Asterisks\Controller;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;


class RecordController extends BaseController {

    /***
     * Fetch all Records from database
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param $args
     * @return mixed
     */
    public function get_records (ServerRequestInterface $request, ResponseInterface $response, $args) {
        //TODO: complete method
        return $response->withStatus($this->r->getCode())->withJson($this->r);
    }

    /***
     * Fetch a single Record for database
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param $args
     * @return mixed
     */
    public function get_record (ServerRequestInterface $request, ResponseInterface $response, $args) {
        $record_id = (int) $args['record_id'];
        $this->r->setData($record_id);
        //TODO: complete method
        return $response->withStatus($this->r->getCode())->withJson($this->r);
    }
}