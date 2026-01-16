<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\NotificationManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * @var array<string, string>
     */
    public const SERVICE_LABELS = [
        'web-app' => 'Web App',
        'mobile-app' => 'Mobile App',
        'internal-tool' => 'Internal Tool',
        'automation-ai' => 'Automation / AI',
        'api-integration' => 'API / Integration',
        'legacy-rescue' => 'Rescue a Legacy Project',
        'fixed-contract' => 'Fixed Contract Work',
        'mvp' => 'Build an MVP',
        'ongoing-support' => 'Ongoing Support',
        'audit-review' => 'Audit & Code Review',
        'mentoring-training' => 'Mentoring & Training',
        'other' => 'Other',
    ];

    /**
     * @var array<string, string>
     */
    public const BUDGET_LABELS = [
        'under-5k' => 'Under £5,000',
        '5k-10k' => '£5,000 - £10,000',
        '10k-25k' => '£10,000 - £25,000',
        '25k-50k' => '£25,000 - £50,000',
        '50k-plus' => '£50,000+',
        'not-sure' => 'Not sure yet',
    ];

    /**
     * @var array<string, string>
     */
    public const TIMELINE_LABELS = [
        'asap' => 'ASAP',
        '1-3-months' => '1 - 3 months',
        '3-6-months' => '3 - 6 months',
        '6-plus-months' => '6+ months',
        'flexible' => 'Flexible',
    ];

    public function __construct(
        private readonly NotificationManager $notificationManager,
    ) {}

    public function index()
    {
        return view('contact', [
            'services' => self::SERVICE_LABELS,
            'budgetOptions' => self::BUDGET_LABELS,
            'timelineOptions' => self::TIMELINE_LABELS,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'services' => ['required', 'array', 'min:1'],
            'services.*' => ['string', 'in:' . implode(',', array_keys(self::SERVICE_LABELS))],
            'name' => ['required', 'string', 'max:100'],
            'company' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'email:rfc', 'max:200'],
            'phone' => ['nullable', 'string', 'max:50'],
            'budget' => ['nullable', 'string', 'in:' . implode(',', array_keys(self::BUDGET_LABELS))],
            'timeline' => ['nullable', 'string', 'in:' . implode(',', array_keys(self::TIMELINE_LABELS))],
            'message' => ['required', 'string', 'max:2000'],
            'tech_notes' => ['nullable', 'string', 'max:1000'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        /**
         * @var array{services: array<string,string>, budget: string, company: string, timeline: string, phone: string, message: string, tech_notes: string} $validated
         */
        $validated = $validator->validated();

        // Format message with all details
        $formattedMessage = $this->formatMessage($validated);

        $sent = $this->notificationManager->sendContactNotification(
            $validated['name'],
            $validated['email'],
            $formattedMessage,
        );

        if (!$sent) {
            return response()->json([
                'ok' => false,
                'message' => 'Failed to send message. Please try again later.',
            ], 500);
        }

        return response()->json([
            'ok' => true,
            'message' => "Thank you! Your request has been received. We'll get back to you within 24 hours.",
        ]);
    }

    /**
     * @param array{services: array<string,string>, budget: string, company: string, timeline: string, phone: string, message: string, tech_notes: string} $data
     */
    private function formatMessage(array $data): string
    {
        $services = array_map(
            fn (string $service): string => self::SERVICE_LABELS[$service] ?? $service,
            $data['services'],
        );

        $lines = [];

        // Services
        $lines[] = 'Services Needed: ' . implode(', ', $services);
        $lines[] = '';

        // Contact details
        if (!empty($data['company'])) {
            $lines[] = 'Company: ' . $data['company'];
        }

        if (!empty($data['phone'])) {
            $lines[] = 'Phone: ' . $data['phone'];
        }

        // Budget & Timeline
        if (!empty($data['budget'])) {
            $lines[] = 'Budget: ' . (self::BUDGET_LABELS[$data['budget']] ?? $data['budget']);
        }

        if (!empty($data['timeline'])) {
            $lines[] = 'Timeline: ' . (self::TIMELINE_LABELS[$data['timeline']] ?? $data['timeline']);
        }

        // Project description
        $lines[] = '';
        $lines[] = 'Project Description:';
        $lines[] = $data['message'];

        // Tech notes
        if (!empty($data['tech_notes'])) {
            $lines[] = '';
            $lines[] = 'Tech Notes:';
            $lines[] = $data['tech_notes'];
        }

        return implode("\n", $lines);
    }
}
