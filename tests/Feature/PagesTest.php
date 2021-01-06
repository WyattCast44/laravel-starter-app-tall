<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PagesTest extends TestCase
{
    public function test_homepage()
    {
        $this->get('/')->assertOk();
    }
}
