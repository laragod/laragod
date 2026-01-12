<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet">

    @vite(['resources/css/app.css'])
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
                    Get in Touch
                </h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Send us a message and we'll get back to you soon.
                </p>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 py-8 px-6 shadow-lg rounded-lg">
                <form id="contact-form" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Name
                        </label>
                        <div class="mt-1">
                            <input
                                id="name"
                                name="name"
                                type="text"
                                required
                                maxlength="100"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                placeholder="John Doe"
                            >
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Email
                        </label>
                        <div class="mt-1">
                            <input
                                id="email"
                                name="email"
                                type="email"
                                required
                                maxlength="200"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                placeholder="john@example.com"
                            >
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Message
                        </label>
                        <div class="mt-1">
                            <textarea
                                id="message"
                                name="message"
                                rows="4"
                                required
                                maxlength="2000"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                placeholder="Your message here..."
                            ></textarea>
                        </div>
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-150"
                        >
                            <span id="submit-text">Send Message</span>
                            <span id="submit-spinner" class="hidden">
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                        </button>
                    </div>

                    <div id="form-message" class="hidden">
                        <div id="success-message" class="hidden rounded-md bg-green-50 dark:bg-green-900/20 p-4">
                            <p class="text-sm font-medium text-green-800 dark:text-green-400"></p>
                        </div>
                        <div id="error-message" class="hidden rounded-md bg-red-50 dark:bg-red-900/20 p-4">
                            <p class="text-sm font-medium text-red-800 dark:text-red-400"></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script defer>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contact-form');
            const submitButton = form.querySelector('button[type="submit"]');
            const submitText = document.getElementById('submit-text');
            const submitSpinner = document.getElementById('submit-spinner');
            const formMessage = document.getElementById('form-message');
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');

            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                formMessage.classList.add('hidden');
                successMessage.classList.add('hidden');
                errorMessage.classList.add('hidden');

                submitButton.disabled = true;
                submitText.classList.add('hidden');
                submitSpinner.classList.remove('hidden');

                const formData = {
                    name: form.name.value.trim(),
                    email: form.email.value.trim(),
                    message: form.message.value.trim()
                };

                try {
                    const csrfMeta = document.querySelector('meta[name="csrf-token"]');
                    if (!csrfMeta) {
                        throw new Error('CSRF token not found. Please refresh the page.');
                    }
                    const csrfToken = csrfMeta.getAttribute('content');

                    const response = await fetch('/contact', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify(formData)
                    });

                    const data = await response.json();

                    if (response.ok && data.ok) {
                        successMessage.querySelector('p').textContent = data.message || 'Message sent successfully!';
                        successMessage.classList.remove('hidden');
                        formMessage.classList.remove('hidden');
                        form.reset();
                    } else {
                        let errorText = 'An error occurred. Please try again.';
                        if (response.status === 419) {
                            errorText = 'Your session has expired. Please refresh the page and try again.';
                        } else if (data.errors) {
                            errorText = Object.values(data.errors).flat().join(' ');
                        } else if (data.message) {
                            errorText = data.message;
                        }
                        errorMessage.querySelector('p').textContent = errorText;
                        errorMessage.classList.remove('hidden');
                        formMessage.classList.remove('hidden');
                    }
                } catch (error) {
                    const errorText = error.message || 'Network error. Please check your connection and try again.';
                    errorMessage.querySelector('p').textContent = errorText;
                    errorMessage.classList.remove('hidden');
                    formMessage.classList.remove('hidden');
                }

                submitButton.disabled = false;
                submitText.classList.remove('hidden');
                submitSpinner.classList.add('hidden');
            });
        });
    </script>
</body>
</html>
