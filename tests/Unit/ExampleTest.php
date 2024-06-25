<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_if_livewire_api_is_visitable(): void
    {
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/livewire_implementation')
                    ->assertPathIs('/livewire_implementation');
        });
    }
}
