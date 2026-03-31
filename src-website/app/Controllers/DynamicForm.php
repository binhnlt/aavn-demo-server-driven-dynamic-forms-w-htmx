<?php

namespace App\Controllers;

use App\Models\PlatformModel;
use App\Models\StackLanguageModel;
use App\Models\StackFrameworkModel;

class DynamicForm extends BaseController
{
    public function index(): string
    {
        $platformModel = new PlatformModel();

        return view('layouts/main', [
            'title'   => 'Dynamic Form',
            'content' => view('dynamic_form/index', [
                'platforms' => $platformModel->findAll(),
            ]),
        ]);
    }

    /**
     * Level 1 → 2: hx-include sends ?platform_id=X via the select's name.
     * Returns the Language group div — which already contains the next
     * level's hx-get wired for frameworks, so the chain self-propagates.
     *
     * Demonstrates: UI State (language group appears) +
     *               Validation State (language select gets `required`)
     */
    public function languages(): string
    {
        $platformId = (int) $this->request->getGet('platform_id');
        $model      = new StackLanguageModel();
        $languages  = $model->getByPlatform($platformId);

        return view('dynamic_form/_languages', [
            'languages' => $languages,
        ]);
    }

    /**
     * Level 2 → 3: hx-include sends ?language_id=X.
     * Returns Framework group — with tools hx-get wired inside.
     */
    public function frameworks(): string
    {
        $languageId = (int) $this->request->getGet('language_id');
        $model      = new StackFrameworkModel();
        $frameworks = $model->getByLanguage($languageId);

        return view('dynamic_form/_frameworks', [
            'frameworks' => $frameworks,
        ]);
    }

    /**
     * Level 3 → info card: hx-include sends ?framework_id=X.
     * Returns a rich setup card — no extra DB model needed,
     * all data is on the framework row itself.
     */
    public function tools(): string
    {
        $frameworkId = (int) $this->request->getGet('framework_id');
        $model       = new StackFrameworkModel();
        $framework   = $model->find($frameworkId);

        if (! $framework) {
            return '';
        }

        return view('dynamic_form/_tools', [
            'framework' => $framework,
        ]);
    }

    /**
     * Final submit: collect all cascade values via hx-include="#stack-form".
     * language_id and framework_id were dynamically injected — hx-include
     * captures them anyway, demonstrating HTMX's ability to collect
     * dynamically-added form fields.
     */
    public function submit(): string
    {
        $platformId  = (int) $this->request->getPost('platform_id');
        $languageId  = (int) $this->request->getPost('language_id');
        $frameworkId = (int) $this->request->getPost('framework_id');
        $email       = $this->request->getPost('email');

        $platform  = $platformId  ? (new PlatformModel())->find($platformId)  : null;
        $language  = $languageId  ? (new StackLanguageModel())->find($languageId)  : null;
        $framework = $frameworkId ? (new StackFrameworkModel())->find($frameworkId) : null;

        return view('dynamic_form/_summary', compact('platform', 'language', 'framework', 'email'));
    }

    /**
     * Interaction Mode: validate email on blur (not on submit).
     */
    public function validateEmail(): string
    {
        $email = $this->request->getPost('email');
        $valid = filter_var($email, FILTER_VALIDATE_EMAIL);

        return view('dynamic_form/_email_feedback', [
            'email' => $email,
            'valid' => $valid,
        ]);
    }
}
