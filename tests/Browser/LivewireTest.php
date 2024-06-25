<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LivewireTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_if_livewire_api_is_visitable(): void
    {
        $this->browse(function (Browser $browser)  {
            $browser->visit('/livewire_implementation')
                    ->assertPathIs('/livewire_implementation');
        });
    }

    public function test_if_uploaded_wrong_file(): void
    {
        $this->browse(function (Browser $browser)  {
           $browser->visit('/livewire_implementation')
            ->attach('myFile',storage_path('app/public/test.txt'))
            ->assertDialogOpened('The file must be a video format');
        });
    }
    //you can select files 150MB and higher, and please edit the seconds to wait for the Dialog, it will depend how big the file is
    public function test_if_file_is_succesfully_uploaded(): void
    {
        $this->browse(function (Browser $browser)  {
           $browser->visit('/livewire_implementation')
            ->attach('myFile',storage_path('app/public/150_mb.mp4'))
            ->waitForDialog(50)
            ->assertDialogOpened('File Uploaded Successfully');
        });
    }  

    
}
