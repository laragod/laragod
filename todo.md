# Laragod SEO & Positioning Todo

## Goal
Position Laragod as the go-to Laravel agency for SMBs looking to scale and organize their processes. Differentiate from WordPress/basic web dev work.

---

## 0. Site Architecture Improvements (PRIORITY - Do First)

The current site has a flat structure where all services are cards on the homepage and projects have no detail pages. This limits SEO potential significantly. Fix this before creating content.

### Current Structure (Problem)
```
/{locale}/            → Home (everything crammed here)
/{locale}/work        → Portfolio grid (no detail pages)
/{locale}/about       → About
/{locale}/contact     → Contact
```

### Target Structure
```
/{locale}/                          → Home (hero, value prop, featured services, CTA)
/{locale}/services                  → Services index page
/{locale}/services/{slug}           → Individual service pages (9 pages)
/{locale}/work                      → Portfolio/case studies index
/{locale}/work/{slug}               → Individual project/case study pages
/{locale}/about                     → About (keep as is)
/{locale}/contact                   → Contact (keep as is)
```

### Implementation Steps

#### Step 1: Add Services Routes
**File:** `routes/web.php`
```php
Route::controller(FrontController::class)->group(function (): void {
    Route::get('/', 'home')->name('home');
    Route::get('/services', 'services')->name('services');
    Route::get('/services/{slug}', 'service')->name('services.show');
    Route::get('/work', 'work')->name('work');
    Route::get('/work/{slug}', 'project')->name('work.show');
    Route::get('/about', 'about')->name('about');
});
```

#### Step 2: Update FrontController
**File:** `app/Http/Controllers/FrontController.php`

Add services data array (similar to projects):
```php
private function getServices(): array
{
    return [
        'custom-web-applications' => [
            'key' => 'custom_web_apps',
            'icon' => 'code',
            'keywords' => ['custom laravel development', 'bespoke web application'],
        ],
        'api-development' => [
            'key' => 'api_development',
            'icon' => 'terminal',
            'keywords' => ['laravel api development', 'api integration services'],
        ],
        // ... etc for all 9 services
    ];
}

public function services(): View
{
    return view('services.index', ['services' => $this->getServices()]);
}

public function service(string $locale, string $slug): View
{
    $services = $this->getServices();
    abort_unless(isset($services[$slug]), 404);
    return view('services.show', ['service' => $services[$slug], 'slug' => $slug]);
}
```

#### Step 3: Create Service Views
**Files to create:**
- `resources/views/services/index.blade.php` - Grid of all services with links
- `resources/views/services/show.blade.php` - Individual service page template

**Service page structure:**
```blade
<x-layouts.app :title="..." :description="...">
    {{-- Breadcrumbs --}}
    {{-- Hero with service name --}}
    {{-- Problem/pain points this service solves --}}
    {{-- How we approach it --}}
    {{-- Technologies used --}}
    {{-- Related case studies (if any) --}}
    {{-- FAQ section --}}
    {{-- CTA --}}
</x-layouts.app>
```

#### Step 4: Create Service Translations
**File:** `lang/en/services.php` - Expand each service:
```php
'custom_web_apps' => [
    'title' => 'Custom Web Applications',
    'description' => 'Bespoke Laravel applications...',
    'meta_description' => 'Custom Laravel web application development...',
    'hero_heading' => 'Custom Web Applications Built for Your Business',
    'hero_description' => '...',
    'problems' => [
        'Off-the-shelf software doesn\'t fit your workflow',
        'You\'re duct-taping multiple tools together',
        // ...
    ],
    'approach' => [
        'title' => 'How We Build Custom Applications',
        'steps' => [...]
    ],
    'faq' => [
        ['question' => '...', 'answer' => '...'],
    ],
],
```

#### Step 5: Add Project Detail Pages
**File:** `resources/views/work/show.blade.php`

Similar structure to services but focused on:
- Project overview
- The challenge
- Our solution
- Technologies used
- Results/metrics
- Testimonial (if available)

#### Step 6: Update Navigation
**File:** `lang/en/nav.php`
```php
'services' => 'Services',
```

**File:** `resources/views/components/layouts/app.blade.php`
Add "Services" link to navigation between Home and Work.

#### Step 7: Add Breadcrumbs Component
**File:** `resources/views/components/breadcrumbs.blade.php`
```blade
@props(['items'])
<nav aria-label="Breadcrumb" class="...">
    <ol class="flex items-center space-x-2" itemscope itemtype="https://schema.org/BreadcrumbList">
        @foreach($items as $i => $item)
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                @if($item['url'])
                    <a href="{{ $item['url'] }}" itemprop="item">
                        <span itemprop="name">{{ $item['label'] }}</span>
                    </a>
                @else
                    <span itemprop="name">{{ $item['label'] }}</span>
                @endif
                <meta itemprop="position" content="{{ $i + 1 }}" />
            </li>
            @if(!$loop->last)
                <span>/</span>
            @endif
        @endforeach
    </ol>
</nav>
```

#### Step 8: Update Sitemap
**File:** `public/sitemap.xml`
Add all new service and project URLs with hreflang tags.

### Service Slugs Mapping
| Current Key | URL Slug | Target Keywords |
|-------------|----------|-----------------|
| custom_web_apps | custom-web-applications | custom laravel development |
| api_development | api-development | laravel api development |
| laravel_filament | filament-admin-panels | filament admin panel development |
| mvp_development | mvp-development | laravel mvp development |
| legacy_modernization | legacy-modernization | legacy php migration |
| code_quality | code-quality-audit | laravel code review |
| consulting | technical-consulting | fractional cto laravel |
| devops | devops-deployment | laravel devops |
| team_augmentation | team-augmentation | hire laravel developer |

### Checklist
- [ ] Add routes for `/services` and `/services/{slug}`
- [ ] Add routes for `/work/{slug}`
- [ ] Create `FrontController::services()` method
- [ ] Create `FrontController::service()` method
- [ ] Create `FrontController::project()` method
- [ ] Create `resources/views/services/index.blade.php`
- [ ] Create `resources/views/services/show.blade.php`
- [ ] Create `resources/views/work/show.blade.php`
- [ ] Expand `lang/en/services.php` with full content for each service
- [ ] Create `lang/pl/services.php` Polish translations
- [ ] Add "Services" to navigation
- [ ] Create breadcrumbs component
- [ ] Add breadcrumbs to all pages
- [ ] Update sitemap.xml with new URLs
- [ ] Add Service schema to individual service pages
- [ ] Test all new routes work in both locales

---

## 1. Content: Case Studies

Create 2-3 detailed case studies with technical depth:

- [ ] **Legacy Migration Case Study**
  - Title: "Migrating a Legacy PHP Monolith to Laravel"
  - Include: before/after architecture diagrams, performance metrics, timeline
  - Target keywords: "legacy php migration", "modernize php application"

- [ ] **Multi-tenant SaaS Case Study**
  - Title: "Building a Multi-tenant SaaS Platform with Laravel"
  - Include: technical decisions, scaling challenges, transaction volumes
  - Target keywords: "laravel saas development", "multi-tenant laravel"

- [ ] **Business Process Automation Case Study**
  - Title: "Replacing Spreadsheet Chaos with Custom Laravel Software"
  - Include: hours saved, ROI calculations, integration points
  - Target keywords: "custom business software", "replace spreadsheets with software"

---

## 2. Content: Technical Blog Posts

Write SEO-optimized articles targeting SMB decision-makers:

- [ ] "Laravel vs Off-the-Shelf Software: When to Build Custom"
- [ ] "Signs Your Business Has Outgrown Spreadsheets"
- [ ] "What to Expect When Building Custom Business Software (Timeline, Cost, Process)"
- [ ] "How to Evaluate a Laravel Development Agency"
- [ ] "The True Cost of Technical Debt in Growing Businesses"
- [ ] "Why Your Internal Tools Deserve the Same Quality as Customer-Facing Apps"
- [ ] "Building Software That Scales: Architecture Decisions for Growing SMBs"

---

## 3. Service Pages (High Priority)

Create dedicated landing pages for each service niche:

- [ ] `/services/custom-crm-development`
  - Target: businesses outgrowing HubSpot/Salesforce or needing custom workflows
  - Keywords: "custom crm development", "bespoke crm laravel"

- [ ] `/services/legacy-php-modernization`
  - Target: businesses stuck on old PHP codebases
  - Keywords: "legacy php migration", "modernize php application", "php upgrade"

- [ ] `/services/internal-tools-automation`
  - Target: businesses drowning in manual processes
  - Keywords: "custom internal tools", "business process automation"

- [ ] `/services/saas-mvp-development`
  - Target: founders building B2B SaaS products
  - Keywords: "saas mvp development", "laravel saas agency"

- [ ] `/services/api-development-integration`
  - Target: businesses needing system integrations
  - Keywords: "api development services", "system integration laravel"

- [ ] `/services/filament-admin-panels`
  - Target: businesses needing powerful admin interfaces
  - Keywords: "filament admin panel", "laravel admin development"

---

## 4. Schema Markup Enhancements

- [ ] Add `ProfessionalService` schema to homepage
- [ ] Add `Service` schema to each service page (when created)
- [ ] Add `FAQPage` schema to service pages with common questions
- [ ] Add `Article` schema to blog posts (when created)
- [ ] Add `BreadcrumbList` schema for navigation
- [ ] Consider `HowTo` schema for technical blog posts

---

## 5. On-Site Positioning Changes

### Copy Adjustments
- [ ] Remove any mention of "websites" or "landing pages"
- [ ] Lead with problems, not solutions ("Your team wastes 10 hours/week on manual processes")
- [ ] Add "Minimum engagement" qualifier to filter tire-kickers
- [ ] Emphasize technical stack (PHPStan, Pest, CI/CD) - repels wrong clients

### Trust Signals
- [ ] Add client logos (when available)
- [ ] Add specific metrics/results from past projects
- [ ] Consider adding "Not a good fit" section (WordPress sites, quick landing pages, etc.)

### Technical SEO
- [ ] Ensure all service pages have unique meta descriptions
- [ ] Add internal linking between related services
- [ ] Optimize images with descriptive alt text
- [ ] Add breadcrumb navigation

---

## 6. External Authority Building

### LinkedIn
- [ ] Optimize company page as "Laragod Laravel Development"
- [ ] Post weekly technical insights
- [ ] Write LinkedIn articles on Laravel/business process topics
- [ ] Engage in relevant Laravel/PHP groups

### GitHub
- [ ] Ensure organization bio mentions "Laravel Development Agency"
- [ ] Contribute to Laravel ecosystem packages
- [ ] Open source small utilities with good documentation
- [ ] Star and engage with Laravel-related repositories

### Community
- [ ] Answer questions on Laravel Discord
- [ ] Participate in Laracasts forums
- [ ] Consider writing for Laravel News or similar publications

---

## 7. Technical Improvements

- [ ] Implement blog functionality (or use a headless CMS)
- [ ] Add search functionality for blog/case studies
- [ ] Implement proper 301 redirects for any URL changes
- [ ] Set up Google Search Console and monitor performance
- [ ] Set up structured data testing in Search Console
- [ ] Implement XML sitemap auto-generation for dynamic content

---

## 8. Conversion Optimization

- [ ] Add lead magnets (e.g., "Laravel Project Planning Checklist" PDF)
- [ ] Create a "Free Consultation" or "Technical Discovery Call" CTA
- [ ] Add exit-intent popup for blog visitors
- [ ] Implement chat widget for high-intent pages (contact, services)

---

## Priority Order

### Phase 0: Foundation (Do First)
Site architecture changes - without this, content work is wasted:
- [ ] Services section with individual pages
- [ ] Project detail pages
- [ ] Breadcrumbs
- [ ] Navigation update
- [ ] Sitemap update

### Phase 1: Immediate (After Architecture)
- [ ] Write content for 3 most important service pages
- [ ] Schema markup for services
- [ ] On-site copy adjustments (remove "websites" language)

### Phase 2: Short-term (This Month)
- [ ] Complete all 9 service pages
- [ ] First case study with full detail
- [ ] LinkedIn company page optimization

### Phase 3: Ongoing
- [ ] Blog posts (start with 1/week)
- [ ] Community engagement
- [ ] Case studies as projects complete
- [ ] Refine service pages based on Search Console data

---

## Metrics to Track

- Organic search impressions for target keywords
- Click-through rate from search results
- Time on page for service pages
- Contact form submissions by source
- Keyword rankings for primary terms

---

## Keywords to Target

### Primary (High Intent)
- "laravel development agency uk"
- "custom laravel development"
- "laravel consulting"
- "hire laravel developers uk"

### Secondary (Problem-Aware)
- "replace spreadsheets with software"
- "custom business software development"
- "legacy php modernization"
- "internal tools development"

### Long-tail (Specific Needs)
- "laravel multi-tenant saas development"
- "filament admin panel development" 
- "laravel api integration services"
- "custom crm development laravel"
