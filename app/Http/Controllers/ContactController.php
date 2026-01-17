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
     * Service option keys for validation.
     *
     * @var array<int, string>
     */
    private const SERVICE_KEYS = [
        'web-app',
        'mobile-app',
        'internal-tool',
        'automation-ai',
        'api-integration',
        'legacy-rescue',
        'fixed-contract',
        'mvp',
        'ongoing-support',
        'audit-review',
        'mentoring-training',
        'other',
    ];

    /**
     * Budget option keys for validation.
     *
     * @var array<string>
     */
    private const BUDGET_KEYS = [
        'under-5k',
        '5k-10k',
        '10k-25k',
        '25k-50k',
        '50k-plus',
        'not-sure',
    ];

    /**
     * Timeline option keys for validation.
     *
     * @var array<string>
     */
    private const TIMELINE_KEYS = [
        'asap',
        '1-3-months',
        '3-6-months',
        '6-plus-months',
        'flexible',
    ];

    public function __construct(
        private readonly NotificationManager $notificationManager,
    ) {}

    /**
     * Get localized service labels.
     *
     * @return array<string, string>
     */
    public static function getServiceLabels(): array
    {
        return [
            'web-app' => __('contact.services.web_app'),
            'mobile-app' => __('contact.services.mobile_app'),
            'internal-tool' => __('contact.services.internal_tool'),
            'automation-ai' => __('contact.services.automation_ai'),
            'api-integration' => __('contact.services.api_integration'),
            'legacy-rescue' => __('contact.services.legacy_rescue'),
            'fixed-contract' => __('contact.services.fixed_contract'),
            'mvp' => __('contact.services.mvp'),
            'ongoing-support' => __('contact.services.ongoing_support'),
            'audit-review' => __('contact.services.audit_review'),
            'mentoring-training' => __('contact.services.mentoring_training'),
            'other' => __('contact.services.other'),
        ];
    }

    /**
     * Get localized budget labels.
     *
     * @return array<string, string>
     */
    public static function getBudgetLabels(): array
    {
        return [
            'under-5k' => __('contact.budget.under_5k'),
            '5k-10k' => __('contact.budget.5k_10k'),
            '10k-25k' => __('contact.budget.10k_25k'),
            '25k-50k' => __('contact.budget.25k_50k'),
            '50k-plus' => __('contact.budget.50k_plus'),
            'not-sure' => __('contact.budget.not_sure'),
        ];
    }

    /**
     * Get localized timeline labels.
     *
     * @return array<string, string>
     */
    public static function getTimelineLabels(): array
    {
        return [
            'asap' => __('contact.timeline.asap'),
            '1-3-months' => __('contact.timeline.1_3_months'),
            '3-6-months' => __('contact.timeline.3_6_months'),
            '6-plus-months' => __('contact.timeline.6_plus_months'),
            'flexible' => __('contact.timeline.flexible'),
        ];
    }

    public function index()
    {
        return view('contact', [
            'services' => self::getServiceLabels(),
            'budgetOptions' => self::getBudgetLabels(),
            'timelineOptions' => self::getTimelineLabels(),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'services' => ['required', 'array', 'min:1'],
            'services.*' => ['string', 'in:' . implode(',', self::SERVICE_KEYS)],
            'name' => ['required', 'string', 'max:100'],
            'company' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'email:rfc', 'max:200'],
            'phone' => ['nullable', 'string', 'max:50'],
            'budget' => ['nullable', 'string', 'in:' . implode(',', self::BUDGET_KEYS)],
            'timeline' => ['nullable', 'string', 'in:' . implode(',', self::TIMELINE_KEYS)],
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
                'message' => __('contact.response.error'),
            ], 500);
        }

        return response()->json([
            'ok' => true,
            'message' => __('contact.response.success'),
        ]);
    }

    /**
     * @param array{services: array<string,string>, budget: string, company: string, timeline: string, phone: string, message: string, tech_notes: string} $data
     */
    private function formatMessage(array $data): string
    {
        $serviceLabels = self::getServiceLabels();
        $budgetLabels = self::getBudgetLabels();
        $timelineLabels = self::getTimelineLabels();

        $services = array_map(
            fn (string $service): string => $serviceLabels[$service] ?? $service,
            $data['services'],
        );

        $lines = [];

        // Services
        $lines[] = __('notification.services_needed') . ': ' . implode(', ', $services);
        $lines[] = '';

        // Contact details
        if (!empty($data['company'])) {
            $lines[] = __('notification.company') . ': ' . $data['company'];
        }

        if (!empty($data['phone'])) {
            $lines[] = __('notification.phone') . ': ' . $data['phone'];
        }

        // Budget & Timeline
        if (!empty($data['budget'])) {
            $lines[] = __('notification.budget') . ': ' . ($budgetLabels[$data['budget']] ?? $data['budget']);
        }

        if (!empty($data['timeline'])) {
            $lines[] = __('notification.timeline') . ': ' . ($timelineLabels[$data['timeline']] ?? $data['timeline']);
        }

        // Project description
        $lines[] = '';
        $lines[] = __('notification.project_description') . ':';
        $lines[] = $data['message'];

        // Tech notes
        if (!empty($data['tech_notes'])) {
            $lines[] = '';
            $lines[] = __('notification.tech_notes') . ':';
            $lines[] = $data['tech_notes'];
        }

        return implode("\n", $lines);
    }
}
