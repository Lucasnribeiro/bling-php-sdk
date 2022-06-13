<?php

namespace Bling\Tests\Feature;

use Bling\Tests\TestCase;
use Carbon\Carbon;

class ContractsTest extends TestCase
{
    public function testCanListContracts()
    {
        $response = $this->bling->contracts()
            ->all([
                'situacao' => 'A'
            ]);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('retorno', $response);
        $this->assertArrayHasKey('contratos', $response['retorno'] ?? []);
    }

    public function testCanFindContract()
    {
        $response = $this->bling->contracts()->find(['identificador' => '1'], '8633380464');

        $this->assertIsArray($response);
        $this->assertArrayHasKey('retorno', $response);
        $this->assertArrayHasKey('contratos', $response['retorno'] ?? []);
    }
}