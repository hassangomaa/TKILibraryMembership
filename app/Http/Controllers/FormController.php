<?php

namespace App\Http\Controllers;

use App\Mail\FormSubmissionMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormSubmission;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberType;
use Exception;
use App\Http\Requests\SubmitFormRequest;
use App\Http\Requests\GetPhoneCodeRequest;
use App\Repositories\FormDataRepository;

class FormController extends Controller
{
    protected $formDataRepository;

    public function __construct(FormDataRepository $formDataRepository)
    {
        $this->formDataRepository = $formDataRepository;
    }

    public function showForm()
    {
        return view('welcome');
    }

    public function submitForm(SubmitFormRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $form = $this->formDataRepository->create($validatedData);

            // Send email with form data
            $recipientEmail = 'hassan.gomaa.dev@gmail.com'; // Change to your desired email address
             Mail::to($recipientEmail)->send(new FormSubmissionMail($form));

            // Set success message in session
            $request->session()->flash('success', 'Form submitted successfully.');


            return redirect()->route("file.download-brochure");
        } catch (Exception $e) {
            // Set error message in session
            $request->session()->flash('error', 'An error occurred during form submission.');

            return redirect()->back();
        }
    }


    public function getPhoneCode(GetPhoneCodeRequest $request)
    {
        $countryCode = $request->input('country_code');

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
