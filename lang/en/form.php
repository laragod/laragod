<?php

declare(strict_types=1);

return [
    'step_of' => 'Step :current of :total',
    'step1' => [
        'title' => 'Select Services',
        'heading' => 'What do you need?',
        'description' => 'Select all that apply',
        'error' => 'Please select at least one service.',
    ],
    'step2' => [
        'title' => 'Your Details',
        'heading' => 'Your Details',
        'description' => 'We\'ll get back to you within 24 hours',
        'error' => 'Please fill in all required fields (name, email, message).',
    ],
    'step3' => [
        'title' => 'Review & Submit',
        'heading' => 'Review & Submit',
        'description' => 'One last look before we get started',
    ],
    'field' => [
        'name' => 'Full Name',
        'company' => 'Company',
        'email' => 'Email',
        'phone' => 'Phone / WhatsApp',
        'phone_placeholder' => '+44 7XXX XXXXXX',
        'budget' => 'Budget Range',
        'budget_placeholder' => 'Select a range',
        'timeline' => 'Timeline',
        'timeline_placeholder' => 'Select a timeline',
        'message' => 'Project Description',
        'message_placeholder' => 'Tell us about your project, goals, and any specific requirements...',
        'tech_notes' => 'Tech Notes',
        'tech_notes_placeholder' => 'Existing tech stack, repo links, staging URLs, or constraints we should know about...',
    ],
    'review' => [
        'services' => 'Services',
        'contact' => 'Contact',
        'project' => 'Project',
        'tech_notes' => 'Tech Notes',
    ],
    'captcha' => 'Quick check: What is :question?',
    'captcha_error' => 'Please complete the captcha correctly.',
    'nav' => [
        'back' => 'Back',
        'continue' => 'Continue',
        'submit' => 'Send Request',
    ],
    'edit' => 'Edit',
    'optional' => '(optional)',
    'success' => [
        'title' => 'Request Received!',
        'message' => 'Thanks for reaching out! We\'ll get back to you within 24 hours.',
        'back_home' => 'Back to Home',
    ],
    'error' => [
        'csrf' => 'Session expired. Please refresh the page.',
        'network' => 'Network error. Please check your connection.',
        'csrf_token' => 'CSRF token not found. Please refresh the page.',
        'generic' => 'Something went wrong. Please try again.',
    ],
];
