<?php

namespace App\Http\Controllers;

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
        dd($request->all());
        return response()->json($request->all());


        // Validate form inputs
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'country' => 'required',
            'prefix' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
        ]);

        // Save form data to the database
        $formData = new FormData;
        $formData->name = $validatedData['first_name'] . ' ' . $validatedData['last_name'];
        $formData->email = $validatedData['email'];
        $formData->phone = $validatedData['prefix'] . $validatedData['phone_number'];
        $formData->save();

        // Send email with the form data
        $emailData = [
            'name' => $validatedData['first_name'] . ' ' . $validatedData['last_name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['prefix'] . $validatedData['phone_number'],
            'company' => $validatedData['company'],
            'country' => $validatedData['country'],
        ];
//        Mail::to('alex.podariu@kpiinstitute.com')->send(new FormDataEmail($emailData));

        // Redirect to a thank you page or any other appropriate response
        return redirect()->route('thank-you');
    }

    public function getPhoneCode(Request $request)
    {
        $country = $request->input('country');

        // Lookup the phone code associated with the country
        $phoneCode = $this->lookupPhoneCode($country);

        // Return the phone code as a response
        return response()->json(['phone_code' => $phoneCode]);
    }

    private function lookupPhoneCode($country)
    {
        // Perform lookup to get the phone code based on the country
        // Replace this with your own logic to retrieve the phone code

        // Dummy phone codes for demonstration
        $phoneCodes = [
            'USA' => '+1',
            'UK' => '+44',
            'Germany' => '+49',
            'France' => '+33',
            // Add more country-phone code mappings as needed
        ];

        if (isset($phoneCodes[$country])) {
            return $phoneCodes[$country];
        }

        return '';
    }
}

