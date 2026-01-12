<?php

namespace App\Http\Controllers;

use App\Services\NotificationManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function __construct(
        private readonly NotificationManager $notificationManager,
    ) {}

    /**
     * Handle contact form submission.
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email:rfc', 'max:200'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        $sent = $this->notificationManager->sendContactNotification(
            $validated['name'],
            $validated['email'],
            $validated['message']
        );

        if (!$sent) {
            return response()->json([
                'ok' => false,
                'message' => 'Failed to send message. Please try again later.',
            ], 500);
        }

        return response()->json([
            'ok' => true,
            'message' => 'Thank you! Your message has been sent.',
        ]);
    }
}
