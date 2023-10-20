<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Cake\Http\Client;
/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));
       // $this->set('guest_token', $this->getGuestToken());
        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }


 /*   private function getAccessToken()
    {
        $http = new Client();

        $response = $http->post(
            'http://localhost:8088/api/v1/security/login',
            json_encode([
                "password" => "admin",
                "provider" => "db",
                "refresh" => true,
                "username" => "henry"
            ]),
            ['headers' => ['Content-Type' => 'application/json', 'accept' => 'application/json']]
        );

        if ($response->isOk()) {
            $json = $response->getJson();
            $access_token = $json['access_token'];
            $refresh_token = $json['refresh_token'];

            return $access_token;
        }
        return "bad request";
    }*/
 /*  private function getGuestToken()
    {
        $http = new Client();
        $payload = array(
            "user" => array(
                "username" => "admin",
                "first_name" => "henry",
                "last_name" => "ennis"
            ),
            "resources" => array(
                array(
                    "type" => "dashboard",
                    "id" => "f528af56-f588-445f-9acf-7288b3f99252"
                )
            ),
            "rls" => array()
        );

        $response = $http->post(
            "http://localhost:8088/api/v1/security/guest_token/",
            json_encode($payload),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->getAccessToken(),
                ]
            ]
        );
        if ($response) {
            $json = $response->getJson();
            $guest_token = $json;
            return $guest_token["token"];
        }
        return "bad request";
    }*/
}
