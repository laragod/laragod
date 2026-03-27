<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

final class SitemapControllerTest extends TestCase
{
    public function test_sitemap_returns_xml_response(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function test_sitemap_contains_required_xml_structure(): void
    {
        $response = $this->get('/sitemap.xml');

        $content = $response->getContent();

        $this->assertStringContains('<?xml version="1.0" encoding="UTF-8"?>', $content);
        $this->assertStringContains('<urlset', $content);
        $this->assertStringContains('xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"', $content);
        $this->assertStringContains('xmlns:xhtml="http://www.w3.org/1999/xhtml"', $content);
    }

    public function test_sitemap_contains_home_page(): void
    {
        $response = $this->get('/sitemap.xml');

        $content = $response->getContent();

        $this->assertStringContains('<loc>https://laragod.com/en</loc>', $content);
        $this->assertStringContains('<priority>1</priority>', $content);
    }

    public function test_sitemap_contains_hreflang_alternates(): void
    {
        $response = $this->get('/sitemap.xml');

        $content = $response->getContent();

        $this->assertStringContains('hreflang="en"', $content);
        $this->assertStringContains('hreflang="pl"', $content);
    }

    public function test_sitemap_contains_services_pages(): void
    {
        $response = $this->get('/sitemap.xml');

        $content = $response->getContent();

        $this->assertStringContains('/en/services</loc>', $content);
        $this->assertStringContains('/en/services/custom-web-applications</loc>', $content);
        $this->assertStringContains('/en/services/api-development</loc>', $content);
    }

    public function test_sitemap_contains_work_pages(): void
    {
        $response = $this->get('/sitemap.xml');

        $content = $response->getContent();

        $this->assertStringContains('/en/work</loc>', $content);
        $this->assertStringContains('/en/work/skill-peak</loc>', $content);
    }

    public function test_sitemap_contains_contact_page(): void
    {
        $response = $this->get('/sitemap.xml');

        $content = $response->getContent();

        $this->assertStringContains('/en/contact</loc>', $content);
    }

    public function test_sitemap_contains_polish_urls(): void
    {
        $response = $this->get('/sitemap.xml');

        $content = $response->getContent();

        $this->assertStringContains('<loc>https://laragod.com/pl</loc>', $content);
        $this->assertStringContains('/pl/services</loc>', $content);
        $this->assertStringContains('/pl/services/custom-web-applications</loc>', $content);
        $this->assertStringContains('/pl/work</loc>', $content);
        $this->assertStringContains('/pl/contact</loc>', $content);
    }

    public function test_sitemap_is_valid_xml(): void
    {
        $response = $this->get('/sitemap.xml');

        $content = $response->getContent();

        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($content);

        $this->assertNotFalse($xml, 'Sitemap XML is not valid');
    }

    private function assertStringContains(string $needle, string $haystack): void
    {
        $this->assertTrue(
            str_contains($haystack, $needle),
            "Failed asserting that '$needle' is contained in the string"
        );
    }
}
