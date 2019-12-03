<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * Usuario não deve ver tela de home se não está logado.
     *
     * @return void
     */
    public function testUsuarioNaoPodeVerHome()
    {
        $response = $this->get('/home');
        $response->assertRedirect();
    }
}
