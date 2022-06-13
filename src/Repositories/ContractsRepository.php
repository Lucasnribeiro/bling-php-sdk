<?php

namespace Bling\Repositories;

use Spatie\ArrayToXml\ArrayToXml;

class ContractsRepository extends BaseRepository
{
    public function all(array $filters = [], string $situacao = null): ? array
    {
        $options = [];

        if($situacao) {
            $options['situacao'] = $situacao;
        }

        foreach ($filters as $k => $v) {
            $filters[$k] = $k.'['.$v.']';
        }

        if(count($filters)) {
            $options['filters'] = implode('; ', $filters);
        }

        return $this->client->get('contratos/json/', $options);
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

        return $this->client->get("contrato/$id/json/", $options);
    }

    public function create(array $params): ?array
    {
        $options = [];

        $rootElement = array_key_first($params);

        $xml = ArrayToXml::convert($params[$rootElement], $rootElement);

        $options['xml'] = $xml;

        return $this->client->post('contrato/json/', $options);
    }

    public function update(string $id, array $params): ?array
    {
        $options = [];

        $rootElement = array_key_first($params);

        $xml = ArrayToXml::convert($params[$rootElement], $rootElement);

        $options['xml'] = $xml;

        return $this->client->post("contrato/$id/json/", $options);
    }

    public function delete(string $id): ?array
    {
        return $this->client->delete("produto/$id/json/");
    }
}