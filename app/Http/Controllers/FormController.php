<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionFormRequest;
use App\Models\submissions;
use Illuminate\Http\Request;


class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }
    public function submitForm(SubmissionFormRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $filename, 'public');
        }

        $submission = new submissions();
        $submission->name = $validatedData['name'];
        $submission->email = $validatedData['email'];
        $submission->message = $validatedData['message'];
        $submission->file_path = $filePath ?? null;
        $submission->save();

        return redirect()->route('form.show')->with('success', 'Form submitted successfully!');
    }
}
