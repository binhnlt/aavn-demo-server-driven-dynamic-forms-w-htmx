---
marp: true
theme: default
paginate: true
style: |
  section {
    font-family: 'Segoe UI', system-ui, sans-serif;
    font-size: 1.1rem;
  }
  section.lead h1 {
    font-size: 2.5rem;
  }
  h1 { color: #3d72d7; }
  h2 { color: #2c5099; border-bottom: 2px solid #3d72d7; padding-bottom: 8px; }
  code { background: #f0f4ff; color: #c7254e; padding: 2px 6px; border-radius: 3px; }
  pre code { background: transparent; color: inherit; padding: 0; }
  pre { background: #1e2430; color: #abb2bf; border-radius: 8px; padding: 16px; }
  .columns { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
  .columns-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem; }
  .tip { background: #fffbeb; border-left: 4px solid #f59e0b; padding: 8px 12px; border-radius: 0 6px 6px 0; font-size: 0.9rem; }
  table { width: 100%; }
  th { background: #3d72d7; color: white; }
---

<!-- _class: lead -->

# HTMX
## Hypermedia for the Modern Web

**Without the complexity tax**

---

## The Problem — History Repeating Itself

<div class="columns">

**Era 1: jQuery**
```html
<!-- Logic scattered everywhere -->
$(document).ready(function() {
  $('#btn').click(function() {
    $.ajax('/api/data', {
      success: function(res) {
        $('#result').html(res);
      }
    });
  });
});
```

**Era 2: SPA Frameworks**
```
npm install react react-dom
npm install react-router-dom
npm install redux react-redux
npm install axios
npm install styled-components
# 500MB node_modules later...
```

</div>

---

## The SPA Tax — Hidden Costs

<div class="columns-3">

**Bundle Size**
- React: ~40KB gzip
- Vue: ~35KB gzip
- Plus: Router, State, ...
- Result: 200–500KB of JS

**Complexity**
- Client-side routing
- State management
- Hydration
- SSR vs CSR
- API layer (REST/GraphQL)

**Cognitive Load**
- Two codebases (server + client)
- Data sync issues
- Stale cache
- Loading states
- Error boundaries

</div>

> **Question:** Does a CRUD admin dashboard really need all of this?

---

## What if we just... sent HTML?

The original web worked like this:

```
Browser → GET /users → Server → <html>...</html> → Browser renders
```

Simple. Predictable. Works everywhere.

**The problem:** Every interaction = reload the entire page.

**HTMX solves this:** Allows any element to send HTTP requests and swap **a part** of the page — still HTML, not JSON.

```
Browser → GET /products/search?q=mac → Server → <table>...</table> → Swap into #results
```

---

## What is HTMX?

> **"HTMX gives HTML the ability to make HTTP requests and update parts of the page — without JavaScript."**

<div class="columns">

**Characteristics:**
- A single JS file (~14KB gzip)
- No build step, no bundler
- Progressive enhancement — degrades gracefully
- Works with any server language
- Server remains the source of truth

**Not:**
- Not a framework
- Not a full JS replacement
- No virtual DOM
- No state management
- No component system

</div>

---

## 4 Core Attributes

```html
<button
  hx-get="/api/data"
  hx-target="#result"
  hx-swap="innerHTML"
  hx-trigger="click">
  Load Data
</button>
```

| Attribute | Meaning |
|-----------|---------|
| `hx-get` / `hx-post` / `hx-put` / `hx-delete` | HTTP method + URL |
| `hx-target` | CSS selector of the element to update |
| `hx-swap` | How to swap: `innerHTML`, `outerHTML`, `afterend`, ... |
| `hx-trigger` | Event that fires the request: `click`, `keyup`, `revealed`, ... |

---

## hx-trigger — Event System

```html
<!-- Debounce keyup — avoid request spam -->
<input hx-get="/search" hx-trigger="keyup changed delay:300ms">

<!-- Load when element enters viewport -->
<div hx-get="/load-more" hx-trigger="revealed">

<!-- Poll every 2 seconds -->
<div hx-get="/status" hx-trigger="every 2s">

<!-- Validate on field blur -->
<input hx-post="/validate" hx-trigger="blur">
```

<div class="tip">
<strong>Tip:</strong> All of this is just HTML attributes. No addEventListener, no setTimeout, no IntersectionObserver needed.
</div>

---

## hx-swap — Swap Modes

| Mode | Result |
|------|--------|
| `innerHTML` (default) | Replace content inside the target |
| `outerHTML` | Replace the target element itself |
| `afterbegin` | Prepend into target |
| `afterend` | Insert after target (used for infinite scroll) |
| `delete` | Remove the target |
| `none` | No swap (trigger side effects only) |

```html
<!-- Remove a row on delete -->
<button hx-delete="/todo/1" hx-target="closest tr" hx-swap="outerHTML">
  Delete
</button>
```

---

## The Server Just Returns an HTML Fragment

```php
// No JSON serialization, no API versioning needed
public function results(): string
{
    $q       = $this->request->getGet('q');
    $results = $this->productModel->search($q);

    // Return an HTML fragment — not JSON
    return view('_results', ['results' => $results]);
}
```

```html
<!-- _results.php -->
<table>
  <?php foreach ($results as $p): ?>
    <tr>
      <td><?= esc($p['name']) ?></td>
      <td>$<?= number_format($p['price'], 2) ?></td>
    </tr>
  <?php endforeach; ?>
</table>
```

---

## Demo 1 — Live Search

**`hx-trigger="keyup changed delay:300ms"`**

```html
<input
  type="search"
  name="q"
  hx-get="/live-search/results"
  hx-trigger="keyup changed delay:300ms"
  hx-target="#results"
  hx-indicator="#spinner">
```

- `keyup changed` — only fires when the value actually changes
- `delay:300ms` — debounce, avoids a request on every keystroke
- `hx-indicator` — auto-shows a spinner during the request
- **Server:** returns `<table>` HTML instead of a JSON array

🔗 **Demo:** `https://localhost:8023/live-search`

---

## Demo 2 — Dynamic Form: 3 Logic Layers

**Question:** In a complex form, who should decide:
- Which fields are shown or hidden?
- Which fields are required or optional?
- When to validate?

> With SPAs: logic is split between client and server → duplication, drift, bugs.
>
> With HTMX: **the server decides everything**.

---

## Layer 1: UI State

> **"Which fields are shown, which are hidden"** — decided by server rendering

```html
<select name="account_type"
  hx-post="/dynamic-form/switch-type"
  hx-trigger="change"
  hx-target="#type-fields">
</select>

<div id="type-fields">
  <!-- Server returns different HTML depending on type -->
  <!-- Employee: shows department field -->
  <!-- Freelancer: shows specialty field -->
  <!-- The client has zero knowledge of this logic -->
</div>
```

---

## Layer 2: Validation State

> **"Which fields are required, which are optional"** — server renders the `required` attribute

```php
// _type_fields.php — server decides what's required
if ($type === 'employee') {
    // Department is required for employees
    echo '<input name="department" required>';
} elseif ($type === 'freelancer') {
    // Portfolio is optional for freelancers
    echo '<input name="portfolio">';  // no required attribute
}
```

**Result:** The client receives HTML with the correct `required` attributes for each type. Browser validation works automatically — no JS validation library needed.

---

## Layer 3: Interaction Mode

> **"Validate-as-you-type or on final submit"** — the server serves both

```html
<!-- Email: validate immediately on blur (leaving the field) -->
<input name="email"
  hx-post="/validate-email"
  hx-trigger="blur"
  hx-target="#email-feedback">
<div id="email-feedback"></div>
<!-- Server returns: <span class="text-danger">Invalid email</span> -->

<!-- Form: validate everything on submit -->
<form hx-post="/submit" hx-target="#form" hx-swap="outerHTML">
```

**Two different interaction modes — one server.** No logic duplication.

---

## Demo 3 — CRUD Todo

**hx-post, hx-put, hx-delete, hx-patch — full HTTP verbs**

<div class="columns">

```html
<!-- Toggle (POST) -->
<button hx-post="/todo/1/toggle"
        hx-target="#todo-1"
        hx-swap="outerHTML">
  ✓
</button>

<!-- Inline edit (GET → POST) -->
<button hx-get="/todo/1/edit"
        hx-target="#todo-1"
        hx-swap="outerHTML">
  ✏️
</button>
```

```html
<!-- Delete -->
<button
  hx-post="/todo/1/delete"
  hx-target="#todo-1"
  hx-swap="outerHTML"
  hx-confirm="Delete?">
  🗑️
</button>

<!-- Server returns "" → element is removed -->
```

</div>

🔗 **Demo:** `https://localhost:8023/todo`

---

## Demo 4 — Infinite Scroll

**`hx-trigger="revealed"` — Sentinel Pattern**

```html
<!-- The last card on page N -->
<div class="card"
  hx-get="/infinite-scroll/page?page=2"
  hx-trigger="revealed"
  hx-swap="afterend"
  hx-target="this">
  <!-- card content -->
</div>

<!-- When this card enters the viewport:
  1. HTMX fetches page 2
  2. Swap "afterend" → appends new cards
  3. The last card of page 2 carries the sentinel for page 3
  4. Automatically chains → true infinite scroll -->
```

🔗 **Demo:** `https://localhost:8023/infinite-scroll`

---

## Demo 5 — Form Validation

**Server-side validation, errors displayed inline**

```html
<form hx-post="/form-validation"
      hx-target="#form-container"
      hx-swap="outerHTML">
```

```php
// Server: validate → if invalid, return the form with errors
if (!$this->validate($rules)) {
    return view('_form', [
        'errors' => $this->validator->getErrors(),
        'old'    => $this->request->getPost(),
    ]);
}
return view('_success');  // if valid
```

**Not needed:** Joi, Yup, Zod, react-hook-form, Vee-Validate, or any JS validation library.

🔗 **Demo:** `https://localhost:8023/form-validation`

---

## Demo 6 — hx-boost: 1 Attribute

**Turn the entire navigation SPA-like — one line**

```html
<!-- Before -->
<nav>
  <a href="/live-search">Live Search</a>
  <a href="/todo">Todo</a>
</nav>

<!-- After — add hx-boost="true" -->
<nav hx-boost="true">
  <a href="/live-search">Live Search</a>  <!-- AJAX, swap body -->
  <a href="/todo">Todo</a>               <!-- AJAX, swap body -->
</nav>
```

**Live demo:** Remove `hx-boost="true"` from the form → submit → see the full page reload. Add it back → smooth swap, no flash.

🔗 **Demo:** `https://localhost:8023/hx-boost`

---

## Out-of-Band Swaps — Bonus

**One response updates multiple parts of the page at once**

```html
<!-- Server returns one response -->
<li id="todo-5">✓ New Task</li>

<!-- Simultaneously update the badge count in the navbar -->
<span id="todo-count" hx-swap-oob="true">
  7
</span>
```

HTMX automatically swaps `#todo-count` without a second request, without JS global state.

---

## Comparison — HTMX vs Alternatives

| | HTMX | Alpine.js | React/Vue | Livewire |
|---|---|---|---|---|
| **JS to write** | ~0 | Little | A lot | ~0 |
| **SSR-native** | ✅ | ❌ | Complex | ✅ |
| **Bundle size** | 14KB | 16KB | 100KB+ | 30KB+ |
| **Learning curve** | Low | Low | High | Medium |
| **Full stack control** | ✅ | ❌ | ❌ | ✅ (Laravel) |
| **Complex UI state** | Limited | ✅ | ✅ | Medium |

> **Alpine.js + HTMX** = ideal combo: HTMX for server interactions, Alpine for local UI state.

---

## When to Use HTMX

<div class="columns">

**✅ Good fit:**
- CRUD apps, admin panels
- Internal tools, dashboards
- Content-heavy sites
- E-commerce listing & search
- Form-heavy applications
- Progressive enhancement
- Small teams wanting to ship fast

**⚠️ Consider alternatives when:**
- Real-time collaboration (e.g. Google Docs)
- Offline-first applications
- Complex client-side state machines
- Heavy animations / transitions
- Team already deep in React ecosystem

</div>

---

## Progressive Enhancement

HTMX doesn't break when JS is disabled — forms still submit normally:

```html
<!-- This form works WITH and WITHOUT HTMX -->
<form action="/contact" method="POST"
      hx-boost="true"
      hx-target="#form-area"
      hx-swap="outerHTML">
  <!-- With HTMX: smooth swap -->
  <!-- Without HTMX: standard full-page redirect -->
</form>
```

The server handles both cases:

```php
if ($this->isHtmx()) {
    return view('_partial');     // fragment only
}
return redirect()->to('/success');  // standard redirect
```

---

## Q&A

<div class="columns">

**Resources:**
- [htmx.org](https://htmx.org) — docs + examples
- *Hypermedia Systems* — free book at hypermedia.systems
- [htmx.org/essays](https://htmx.org/essays/) — deep dives

**Run the demo:**
```bash
cd docker
docker compose up -d
docker exec <container> \
  php spark migrate
docker exec <container> \
  php spark db:seed MainSeeder
# → https://localhost:8023
```

</div>

---

<!-- _class: lead -->

# Thank you!

**htmx.org** — *"High power tools for HTML"*

> *"You don't have to choose between a good user experience and a simple system."*
> — Carson Gross, HTMX creator
