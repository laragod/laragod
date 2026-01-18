<?php

namespace Tests\Unit;

use App\Mail\ContactFormSubmission;
use Tests\TestCase;

class ContactFormSubmissionTest extends TestCase
{
    public function test_escapes_html_in_name(): void
    {
        $mail = new ContactFormSubmission(
            '<script>alert("xss")</script>',
            'test@example.com',
            'Test message'
        );

        $html = $mail->render();

        $this->assertStringContainsString('&lt;script&gt;', $html);
        $this->assertStringNotContainsString('<script>alert', $html);
    }

    public function test_escapes_html_in_email(): void
    {
        $mail = new ContactFormSubmission(
            'John',
            '<script>alert("xss")</script>@example.com',
            'Test message'
        );

        $html = $mail->render();

        $this->assertStringContainsString('&lt;script&gt;', $html);
    }

    public function test_escapes_html_in_message(): void
    {
        $mail = new ContactFormSubmission(
            'John',
            'test@example.com',
            '<script>alert("xss")</script>'
        );

        $html = $mail->render();

        $this->assertStringContainsString('&lt;script&gt;', $html);
        $this->assertStringNotContainsString('<script>alert', $html);
    }

    public function test_converts_newlines_to_br_in_message(): void
    {
        $mail = new ContactFormSubmission(
            'John',
            'test@example.com',
            "Line 1\nLine 2"
        );

        $html = $mail->render();

        $this->assertStringContainsString('Line 1<br />', $html);
    }

    public function test_has_correct_subject(): void
    {
        $mail = new ContactFormSubmission('John', 'test@example.com', 'Test');

        $this->assertSame('New Contact Form Submission', $mail->envelope()->subject);
    }

    public function test_has_reply_to_set(): void
    {
        $mail = new ContactFormSubmission('John Doe', 'john@example.com', 'Test');

        $replyTo = $mail->envelope()->replyTo;

        $this->assertCount(1, $replyTo);
        $this->assertSame('john@example.com', $replyTo[0]->address);
        $this->assertSame('John Doe', $replyTo[0]->name);
    }
}
