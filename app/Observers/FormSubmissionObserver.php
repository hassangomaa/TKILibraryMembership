<?php

namespace App\Observers;

use App\Models\FormData;
use App\Mail\FormSubmissionMail;
use Illuminate\Support\Facades\Mail;
class FormSubmissionObserver
{
    /**
     * Handle the FormData "created" event.
     */
    public function created(FormData $form)
    {
        // Send email with form data
        $recipientEmail = 'hassan.gomaa.dev@gmail.com'; // Change to your desired email address
        Mail::to($recipientEmail)->send(new FormSubmissionMail($form));
    }
    /**
     * Handle the FormData "updated" event.
     */
    public function updated(FormData $formData): void
    {
        //
    }

    /**
     * Handle the FormData "deleted" event.
     */
    public function deleted(FormData $formData): void
    {
        //
    }

    /**
     * Handle the FormData "restored" event.
     */
    public function restored(FormData $formData): void
    {
        //
    }

    /**
     * Handle the FormData "force deleted" event.
     */
    public function forceDeleted(FormData $formData): void
    {
        //
    }
}
