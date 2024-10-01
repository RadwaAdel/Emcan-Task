<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmissionFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter your name.',
            'name.max' => 'Your name cannot exceed 255 characters.',
            'email.required' => 'Please provide your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Your email cannot exceed 255 characters.',
            'message.required' => 'Please enter your message.',
            'file.required' => 'Please upload a file.',
            'file.file' => 'The uploaded file is not valid.',
            'file.mimes' => 'The file must be a PDF, DOC, DOCX, JPG, JPEG, or PNG.',
            'file.max' => 'The file size must not exceed 2MB.',
        ];
    }
}
