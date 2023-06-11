<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormSubmission;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberType;

class FormController extends Controller
{
    public function showForm()
    {
        return view('welcome');
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $form = new FormData();
        $form->name = $validatedData['name'];
        $form->email = $validatedData['email'];
        $form->phone = $validatedData['phone'];
        $form->save();

        // Send email with form data
        $recipientEmail = 'alex.podariu@kpiinstitute.com'; // Change to your desired email address
        Mail::to($recipientEmail)->send(new FormSubmission($form));

        return redirect()->route('file.download');
    }


    public function getPhoneCode(Request $request)
    {
        $countryCode = $request->get('country_code');

        $phoneUtil = PhoneNumberUtil::getInstance();
        $phoneNumber = $phoneUtil->getExampleNumberForType($countryCode, PhoneNumberType::MOBILE);
        $phonePrefix = $phoneNumber ? $phoneUtil->getCountryCodeForRegion($countryCode) : '';
        $phoneNumber = $phoneNumber ? $phoneUtil->getNationalSignificantNumber($phoneNumber) : '';

        return response()->json([
            'phone_prefix' => $phonePrefix,
            'phone_number' => $phoneNumber
        ]);
    }


}
