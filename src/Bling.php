<?php

namespace Bling;

use Bling\API\Client;
use Bling\Repositories\CTeRepository;
use Bling\Repositories\LogisticsRepository;
use Bling\Repositories\NFCeRepository;
use Bling\Repositories\NFeRepository;
use Bling\Repositories\OrderRepository;
use Bling\Repositories\ProductRepository;
use Bling\Repositories\ContractsRepository;
use Bling\Repositories\ContactsRepository;
use Bling\Repositories\NFSeRepository;
use Bling\Repositories\InvoicesToReceiveRepository;
use Bling\Repositories\InvoicesToPayRepository;

class Bling {

    /**
     * @var Client
     */
    protected $client;

    public function __construct(string $apiKey)
    {
        $this->client = new Client($apiKey);
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    public function products(): ProductRepository
    {
        return new ProductRepository($this->client);
    }

    public function contracts(): ContractsRepository
    {
        return new ContractsRepository($this->client);
    }

    public function contacts(): ContactsRepository
    {
        return new ContactsRepository($this->client);
    }

    public function orders(): OrderRepository
    {
        return new OrderRepository($this->client);
    }

    public function logistics(): LogisticsRepository
    {
        return new LogisticsRepository($this->client);
    }

    public function nfes(): NFeRepository
    {
        return new NFeRepository($this->client);
    }

    public function nfces(): NFCeRepository
    {
        return new NFCeRepository($this->client);
    }

    public function nfses(): NFSeRepository
    {
        return new NFSeRepository($this->client);
    }

    public function invoicestoreceive(): InvoicesToReceiveRepository
    {
        return new InvoicesToReceiveRepository($this->client);
    }

    public function invoicestopay(): InvoicesToPayRepository
    {
        return new InvoicesToPayRepository($this->client);
    }
}