<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageResponseTest extends TestCase
{
    public function testPageResponse(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
