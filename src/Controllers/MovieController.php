<?php

namespace App\Controllers;

use Slim\Http\{Response, Request};

/**
 * This Controller assumes you are connected to the database with a movies table
 * I have included the SQL script used to generate the table in the [root_dir]/sql folder
 * Remember, this is for demo purposes
 *
 * Class MovieController
 *
 * @package App\Controllers
 */
class MovieController extends Controller
{

    /**
     * Fetches Articles from the database
     *
     * @param \Slim\Http\Response $response
     * @param \Slim\Http\Request  $request
     * @param null|int            $id
     *
     * @return Response
     */
    function getMovies(Response $response, Request $request, $id = null): Response
    {
        // If an ID is specified, return that specific article
        // else return all articles
        if ($id) {
            $articles = $this->db->select(
                'movies',
                [
                    'id',
                    'title',
                    'description',
                ],
                [
                    'id' => $id,
                ]
            );
        } else {
            $articles = $this->db->select(
                'movies',
                [
                    'id',
                    'title',
                    'description',
                ]
            );
        }

        return $response->withJson($articles, 200);
    }
}