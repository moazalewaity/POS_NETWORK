<?php
 
namespace App\Events;
 
use App\Movie;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UploadVideo
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
 
    public $movie;
 
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Movie $movie)
    {
        $this->movie = $movie;   
    }
}