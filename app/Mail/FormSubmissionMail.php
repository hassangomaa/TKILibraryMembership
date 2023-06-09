<?php

namespace App\Mail;

use App\Models\FormData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormSubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    public function __construct(FormData $formData)
    {
        $this->formData = $formData;
    }

    public function build()
    {
        return $this->view('emails.form-submission')
            ->subject('New Form Submission')
            ->with(['formData' => $this->formData]);
    }
}
