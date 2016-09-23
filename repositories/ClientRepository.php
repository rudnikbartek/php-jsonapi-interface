<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:42
 */

namespace Rdnk\JsonApi;

/**
 * Class ClientRepository
 * @package Rdnk\JsonApi
 */
class ClientRepository extends Repository
{

    /**
     * @param ClientGetRequest $client_get_request
     * @return ClientGetResponse
     */
    public function getClient(ClientGetRequest $client_get_request) {
        return $this->connector->sentQuery($client_get_request);
    }

    /**
     * @param ClientSaveRequest $client_save_request
     * @return ClientSaveResponse
     */
    public function saveClient(ClientSaveRequest $client_save_request) {
        return $this->connector->sentQuery($client_save_request);
    }

    /**
     * @param ClientDeleteRequest $client_delete_request
     * @return ClientDeleteResponse
     */
    public function deleteClient(ClientDeleteRequest $client_delete_request) {
        return $this->connector->sentQuery($client_delete_request);
    }


    /**
     * @param ClientsGetRequest $clients_get_request
     * @return ClientsGetResponse
     */
    public function getClients(ClientsGetRequest $clients_get_request) {
        return $this->connector->sentQuery($clients_get_request);
    }
}