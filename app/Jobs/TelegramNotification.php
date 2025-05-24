<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use App\Models\Contact;

class TelegramNotification implements ShouldQueue
{
    use Queueable;

    public Contact $contact;
    
    /**
     * Create a new job instance.
     */
    public function __construct($contact_id)
    {
        $this->contact = Contact::find($contact_id);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //Log::info("Created {$this->contact->name}");
        Log::channel('telegram')->info("Created {$this->contact->name}");
    }
}
