<?php

namespace Bling\Repositories;

use Spatie\ArrayToXml\ArrayToXml;

class ContactsRepository extends BaseRepository
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

        return $this->client->get('contatos/json/', $options);
    }

    public function find(array $filters = [], string $id): ?array
    {
        $options = [];

        foreach ($filters as $k => $v) {
            $filters[$k] = $k.'['.$v.']';
        }

        if(count($filters)) {
            $options['filters'] = implode('; ', $filters);
        }

        return $this->client->get("contato/$id/json/", $options);
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