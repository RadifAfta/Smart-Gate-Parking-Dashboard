<?php

namespace Tests\Feature;
use Kreait\Firebase\Factory;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FirebaseIntegrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFirebaseConnection()
    {
        $factory = (new Factory)->withServiceAccount('path/to/data/firebase-credentials.json');
        $database = $factory->createDatabase();

        // Ganti '/path/to/data' dengan path yang sesuai di Firebase
        $data = $database->getReference('/path/to/data')->getValue();

        $this->assertNotNull($data);
    }
}
