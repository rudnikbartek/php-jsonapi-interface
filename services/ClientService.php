<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:41
 */

namespace Rdnk\JsonApi;


use Rdnk\JsonApi\Connectors\Connector;

class ClientService extends Service
{

    public $repository;

    /**
     * ClientService constructor.
     * @param Connector $connector
     */
    public function __construct(Connector $connector)
    {
        $this->repository = new ClientRepository($connector);
    }


    /**
     * @param ClientGetRequest $client_get_request
     * @return ClientGetResponse
     */
    public function getClient(ClientGetRequest $client_get_request) {
        return $this->repository->getClient($client_get_request);
    }

    /**
     * @param ClientSaveRequest $client_save_request
     * @return ClientSaveResponse
     */
    public function saveClient(ClientSaveRequest $client_save_request) {
        return $this->repository->saveClient($client_save_request);
    }

    /**
     * @param ClientDeleteRequest $client_delete_request
     * @return ClientDeleteResponse
     */
    public function deleteClient(ClientDeleteRequest $client_delete_request) {
        return $this->repository->deleteClient($client_delete_request);
    }
    
    /**
     * @param ClientsGetRequest $clients_get_request
     * @return ClientsGetResponse
     */
    public function getClients(ClientsGetRequest $clients_get_request) {
        return $this->repository->getClients($clients_get_request);
    }

}