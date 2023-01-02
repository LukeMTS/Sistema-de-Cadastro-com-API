<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Endereco;

class EnderecoTest extends TestCase
{
    public function test_latitude_longitude_preenchidos()
    {
        $count = Endereco::whereNull('latitude')->orWhereNull('longitude')
            ->get();

        $this->assertCount(0, $count);
    }
}
