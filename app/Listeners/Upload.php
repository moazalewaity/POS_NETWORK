<?php
 
namespace App\Listeners;

use App\Events\UploadVideo;
use Illuminate\Support\Facades\Artisan;
use Mail;
 
class Upload
{
    
     
    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UploadVideo $event)
    {
        Artisan::call('queue:work');
    }
}