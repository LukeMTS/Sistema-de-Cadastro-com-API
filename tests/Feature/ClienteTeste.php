<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClienteTest extends TestCase
{
  public function test_retorna_ok_para_rota_clientes()
  {
    $response = $this->get('/api/clientes');

    $response->assertStatus(200);
  }
}
