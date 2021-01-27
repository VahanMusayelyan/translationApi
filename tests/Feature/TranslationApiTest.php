<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TranslationApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_translation_example()
    {
        $text = [
            'translate' => 'Do you want coffee?',
        ];

        $response = $this->post(route('translation'),$text);


    }
}
