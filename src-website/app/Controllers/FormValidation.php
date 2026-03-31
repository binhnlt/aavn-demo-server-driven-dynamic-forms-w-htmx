<?php

namespace App\Controllers;

class FormValidation extends BaseController
{
    public function index(): string
    {
        return view('layouts/main', [
            'title'   => 'Form Validation',
            'content' => view('form_validation/index'),
        ]);
    }

    public function reset(): string
    {
        return view('form_validation/_form', ['errors' => [], 'old' => []]);
    }

    public function submit(): string
    {
        $rules = [
            'name'     => 'required|min_length[2]|max_length[100]',
            'email'    => 'required|valid_email',
            'phone'    => 'required|regex_match[/^[0-9]{10,11}$/]',
            'message'  => 'required|min_length[10]|max_length[500]',
        ];

        $messages = [
            'name'    => [
                'required'   => 'Please enter your full name.',
                'min_length' => 'Name must be at least 2 characters.',
            ],
            'email'   => [
                'required'    => 'Please enter your email address.',
                'valid_email' => 'Please enter a valid email address.',
            ],
            'phone'   => [
                'required'    => 'Please enter your phone number.',
                'regex_match' => 'Phone number must be 10–11 digits.',
            ],
            'message' => [
                'required'   => 'Please enter your message.',
                'min_length' => 'Message must be at least 10 characters.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return view('form_validation/_form', [
                'errors'   => $this->validator->getErrors(),
                'old'      => $this->request->getPost(),
            ]);
        }

        return view('form_validation/_success', [
            'name' => $this->request->getPost('name'),
        ]);
    }
}
