<?php

namespace App\Http\Controllers;

use App\Mail\FormSubmissionMail;
use App\Models\FormData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $formData = new FormData();
        $formData->name = $validatedData['name'];
        $formData->email = $validatedData['email'];
        $formData->phone = $validatedData['phone'];
        $formData->save();

        // Send email
        $recipientEmail = 'alex.podariu@kpiinstitute.com'; // Update with the actual recipient email
        Mail::to($recipientEmail)->send(new FormSubmissionMail($formData));

        return redirect()->back()->with('success', 'Form submitted successfully.');
    }

    public function getPhoneCode(Request $request)
    {
        $country = $request->input('country');
        // Use the libphonenumber-for-php library to get the phone code for the selected country
        // Return the phone code as a JSON response
    }
}
