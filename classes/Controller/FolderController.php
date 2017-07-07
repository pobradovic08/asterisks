<?php


namespace Asterisks\Controller;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;


class FolderController extends BaseController {

    /***
     * Fetch all Folders from database
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param $args
     * @return mixed
     */
    public function get_folders (ServerRequestInterface $request, ResponseInterface $response, $args) {
        //TODO: complete method
        return $response->withStatus($this->r->getCode())->withJson($this->r);
    }

    /***
     * Fetch a single Folder from database
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param $args
     * @return mixed
     */
    public function get_folder (ServerRequestInterface $request, ResponseInterface $response, $args) {
        $folder_id = (int)$args['folder_id'];
        $this->r->setData( $folder_id );
        //TODO: complete method
        return $response->withStatus( $this->r->getCode() )->withJson( $this->r );
    }
}