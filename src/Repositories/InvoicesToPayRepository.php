<?php

namespace Bling\Repositories;

use Spatie\ArrayToXml\ArrayToXml;

class InvoicesToPayRepository extends BaseRepository
{
    public function all(array $filters = []): ? array
    {
        $options = [];

        foreach ($filters as $k => $v) {
            $filters[$k] = $k.'['.$v.']';
        }

        if(count($filters)) {
            $options['filters'] = implode('; ', $filters);
        }

        return $this->client->get('contaspagar/json/', $options);
    }

    public function find(string $id, int $tipo): ?array
    {

        return $this->client->get("contaspagar/$id/json/", ['identificador' => $tipo] );
        
    }

    public function create(array $params): ?array
    {
        $options = [];

        $rootElement = array_key_first($params);

        $xml = ArrayToXml::convert($params[$rootElement], $rootElement);

        $options['xml'] = $xml;

        return $this->client->post('contato/json/', $options);
    }

    public function update(string $id, array $params): ?array
    {
        $options = [];

        $rootElement = array_key_first($params);

        $xml = ArrayToXml::convert($params[$rootElement], $rootElement);

        $options['xml'] = $xml;

        return $this->client->post("contato/$id/json/", $options);
    }

    public function delete(string $id): ?array
    {
        return $this->client->delete("contato/$id/json/");
    }
}