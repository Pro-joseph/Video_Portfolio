# Oumalk — Design System
> Cinematic · Artistic · 3D · Dark

Use this file as a reference when building or redesigning any page in the Oumalk project. Every rule here matches the `portfolio.blade.php` redesign exactly.

---

## 1. Fonts

Add these two imports at the top of your `<style>` block (or in `layouts/app.blade.php` once):

```css
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500&display=swap');
```

| Role | Font | Usage |
|------|------|-------|
| Display / Headings | `Bebas Neue` | Page titles, card titles, section labels |
| Body / UI | `DM Sans` | Paragraphs, labels, buttons, captions |

```css
font-family: 'Bebas Neue', sans-serif;  /* titles */
font-family: 'DM Sans', sans-serif;     /* everything else */
```

---

## 2. Color Tokens

Paste these CSS variables at the top of every page's `<style>` block:

```css
:root {
    --orange:     #ea580c;
    --orange-dim: rgba(234, 88, 12, 0.15);
    --bg:         #0a0a0a;
    --surface:    #111111;
    --border:     rgba(255, 255, 255, 0.06);
    --text:       #fafafa;
    --muted:      #525252;
}
```

| Token | Value | Use for |
|-------|-------|---------|
| `--orange` | `#ea580c` | Accents, CTAs, active states, highlights |
| `--orange-dim` | `rgba(234,88,12,0.15)` | Hover overlays, card glows |
| `--bg` | `#0a0a0a` | Page background |
| `--surface` | `#111111` | Cards, panels, inputs |
| `--border` | `rgba(255,255,255,0.06)` | All borders and dividers |
| `--text` | `#fafafa` | Primary text |
| `--muted` | `#525252` | Subtitles, placeholders, secondary text |

> **Never** hardcode colors directly — always use the tokens so Filament's `$siteSettings` dynamic colors can override them.

---

## 3. Page Wrapper

Every page needs this wrapper so the grain texture and background apply correctly:

```html
<div class="pf-page">
    <!-- page content -->
</div>
```

```css
.pf-page {
    background: var(--bg);
    min-height: 100vh;
    overflow-x: hidden;
}

/* Grain noise overlay — paste once per page */
.pf-page::after {
    content: '';
    position: fixed;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
    pointer-events: none;
    z-index: 100;
    opacity: 0.4;
}
```

---

## 4. Hero / Page Title Section

Use this pattern at the top of every page. Replace the ghost text word and title to match the page.

```html
<section class="pf-hero">
    <div class="pf-hero-inner">
        <p class="pf-eyebrow">Page Label Here</p>
        <h1 class="pf-title">Main<br><span>Title</span></h1>
        <p class="pf-subtitle">A short supporting sentence describing this page.</p>
    </div>
</section>
```

```css
.pf-hero {
    padding: 10rem 2rem 4rem;
    position: relative;
    overflow: hidden;
}

/* Ghost word behind the title — change "WORK" to match the page */
.pf-hero::before {
    content: 'WORK'; /* e.g. ABOUT, CONTACT, GALLERY */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -55%);
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(8rem, 22vw, 20rem);
    color: transparent;
    -webkit-text-stroke: 1px rgba(255, 255, 255, 0.04);
    pointer-events: none;
    white-space: nowrap;
    z-index: 0;
    letter-spacing: 0.05em;
}

.pf-hero-inner {
    max-width: 1400px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

/* Eyebrow label — small orange line + uppercase text */
.pf-eyebrow {
    font-family: 'DM Sans', sans-serif;
    font-size: 0.7rem;
    font-weight: 500;
    letter-spacing: 0.25em;
    text-transform: uppercase;
    color: var(--orange);
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
    opacity: 0;
    transform: translateY(20px);
    animation: fadeUp 0.8s ease forwards 0.2s;
}

.pf-eyebrow::before {
    content: '';
    width: 40px;
    height: 1px;
    background: var(--orange);
}

/* Big display title */
.pf-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(4rem, 10vw, 9rem);
    line-height: 0.9;
    color: var(--text);
    letter-spacing: 0.02em;
    margin-bottom: 2rem;
    opacity: 0;
    transform: translateY(30px);
    animation: fadeUp 0.9s ease forwards 0.35s;
}

/* Outlined word inside title */
.pf-title span {
    color: transparent;
    -webkit-text-stroke: 1px var(--orange);
}

.pf-subtitle {
    font-family: 'DM Sans', sans-serif;
    font-size: 1rem;
    color: var(--muted);
    max-width: 480px;
    line-height: 1.7;
    opacity: 0;
    transform: translateY(20px);
    animation: fadeUp 0.9s ease forwards 0.5s;
}
```

> **Per-page ghost words:**
> - Portfolio → `WORK`
> - About → `ABOUT`
> - Contact → `TALK`
> - Gallery → `LENS`
> - Reels → `REELS`
> - Blog → `BLOG`

---

## 5. Scroll Reveal Animation

Replace the old `.animate-on-scroll` / `.visible` pattern with this on every page.

### CSS
```css
/* Base state — invisible and shifted down */
.reveal {
    opacity: 0;
    transform: translateY(50px);
    transition: opacity 0.8s cubic-bezier(0.23, 1, 0.32, 1),
                transform 0.8s cubic-bezier(0.23, 1, 0.32, 1);
}

.reveal.in-view {
    opacity: 1;
    transform: translateY(0);
}

/* Stagger delays — add class alongside .reveal */
.reveal.d1 { transition-delay: 100ms; }
.reveal.d2 { transition-delay: 200ms; }
.reveal.d3 { transition-delay: 300ms; }
.reveal.d4 { transition-delay: 400ms; }
.reveal.d5 { transition-delay: 500ms; }
```

### HTML usage
```html
<div class="reveal">Reveals on scroll</div>
<div class="reveal d1">Reveals 100ms later</div>
<div class="reveal d2">Reveals 200ms later</div>
```

### JS (add once per page inside `@push('scripts')`)
```js
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
            revealObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.08, rootMargin: '0px 0px -60px 0px' });

document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));
```

---

## 6. 3D Tilt Cards

Apply to any card that should tilt on mouse hover.

### CSS
```css
.tilt-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 2px;
    transition: transform 0.7s cubic-bezier(0.23, 1, 0.32, 1),
                box-shadow 0.5s ease,
                border-color 0.4s ease;
    transform-style: preserve-3d;
}

.tilt-card:hover {
    border-color: rgba(234, 88, 12, 0.3);
    box-shadow:
        0 40px 80px rgba(0, 0, 0, 0.6),
        0 0 0 1px rgba(234, 88, 12, 0.15),
        inset 0 1px 0 rgba(255, 255, 255, 0.05);
}
```

### JS (add once per page)
```js
document.querySelectorAll('.tilt-card').forEach(card => {
    card.addEventListener('mousemove', function (e) {
        const rect = this.getBoundingClientRect();
        const x = (e.clientX - rect.left) / rect.width  - 0.5;
        const y = (e.clientY - rect.top)  / rect.height - 0.5;
        this.style.transform = `
            translateY(-6px)
            rotateX(${-y * 6}deg)
            rotateY(${x * 6}deg)
            scale(1.01)
        `;
    });
    card.addEventListener('mouseleave', function () {
        this.style.transform = '';
    });
});
```

> Add both `.reveal` and `.tilt-card` to the same element — they work together fine.

---

## 7. Buttons

### Primary (orange fill)
```html
<a href="#" class="btn-pf">Let's Talk</a>
```

```css
.btn-pf {
    font-family: 'DM Sans', sans-serif;
    font-size: 0.8rem;
    font-weight: 500;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    padding: 0.85rem 2rem;
    background: var(--orange);
    color: white;
    border: 1px solid var(--orange);
    border-radius: 2px;
    text-decoration: none;
    display: inline-block;
    position: relative;
    overflow: hidden;
    transition: color 0.3s ease;
}

.btn-pf::before {
    content: '';
    position: absolute;
    inset: 0;
    background: #c2410c;
    transform: scaleX(0);
    transform-origin: right;
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: -1;
}

.btn-pf:hover::before { transform: scaleX(1); }
```

### Ghost / outline
```html
<a href="#" class="btn-pf-ghost">View Work</a>
```

```css
.btn-pf-ghost {
    font-family: 'DM Sans', sans-serif;
    font-size: 0.8rem;
    font-weight: 500;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    padding: 0.85rem 2rem;
    background: transparent;
    color: var(--text);
    border: 1px solid var(--border);
    border-radius: 2px;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
}

.btn-pf-ghost:hover {
    border-color: var(--orange);
    color: var(--orange);
}
```

---

## 8. Form Inputs

Use on Contact and any form page:

```html
<input type="text" class="input-pf" placeholder="Your name">
<textarea class="input-pf" placeholder="Your message"></textarea>
```

```css
.input-pf {
    font-family: 'DM Sans', sans-serif;
    font-size: 0.95rem;
    background: var(--surface);
    border: 1px solid var(--border);
    color: var(--text);
    padding: 1rem 1.25rem;
    width: 100%;
    border-radius: 2px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    outline: none;
}

.input-pf:focus {
    border-color: var(--orange);
    box-shadow: 0 0 0 3px rgba(234, 88, 12, 0.1);
}

.input-pf::placeholder {
    color: var(--muted);
}
```

---

## 9. Section Dividers & Labels

```html
<!-- Eyebrow label above a section title -->
<p class="section-eyebrow">Services</p>
<h2 class="section-heading">What We <span>Do</span></h2>
```

```css
.section-eyebrow {
    font-family: 'DM Sans', sans-serif;
    font-size: 0.7rem;
    font-weight: 500;
    letter-spacing: 0.25em;
    text-transform: uppercase;
    color: var(--orange);
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.section-eyebrow::before {
    content: '';
    width: 40px;
    height: 1px;
    background: var(--orange);
}

.section-heading {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(2.5rem, 5vw, 5rem);
    line-height: 0.95;
    color: var(--text);
    letter-spacing: 0.02em;
    margin-bottom: 1.5rem;
}

.section-heading span {
    color: transparent;
    -webkit-text-stroke: 1px var(--orange);
}
```

---

## 10. Custom Cursor

Paste this HTML just after the opening `<div class="pf-page">` tag on every page:

```html
<div class="cursor-dot" id="cursorDot"></div>
<div class="cursor-ring" id="cursorRing"></div>
```

```css
.cursor-dot {
    position: fixed;
    width: 8px; height: 8px;
    background: var(--orange);
    border-radius: 50%;
    pointer-events: none;
    z-index: 9999;
    transform: translate(-50%, -50%);
    transition: transform 0.1s ease, opacity 0.3s ease;
}

.cursor-ring {
    position: fixed;
    width: 36px; height: 36px;
    border: 1px solid rgba(234, 88, 12, 0.5);
    border-radius: 50%;
    pointer-events: none;
    z-index: 9998;
    transform: translate(-50%, -50%);
    transition: transform 0.18s ease, width 0.3s ease, height 0.3s ease;
}

.cursor-ring.expanded {
    width: 64px; height: 64px;
    border-color: rgba(234, 88, 12, 0.8);
}
```

```js
// Cursor JS — add once per page
const dot  = document.getElementById('cursorDot');
const ring = document.getElementById('cursorRing');

if (dot && ring) {
    let mx = 0, my = 0, rx = 0, ry = 0;

    document.addEventListener('mousemove', e => {
        mx = e.clientX; my = e.clientY;
        dot.style.left = mx + 'px';
        dot.style.top  = my + 'px';
    });

    (function animRing() {
        rx += (mx - rx) * 0.12;
        ry += (my - ry) * 0.12;
        ring.style.left = rx + 'px';
        ring.style.top  = ry + 'px';
        requestAnimationFrame(animRing);
    })();

    // Expand on interactive elements — add more selectors as needed
    document.querySelectorAll('a, button, .tilt-card').forEach(el => {
        el.addEventListener('mouseenter', () => ring.classList.add('expanded'));
        el.addEventListener('mouseleave', () => ring.classList.remove('expanded'));
    });
}
```

---

## 11. Keyframe Animations

Paste these once per page (or move to a shared CSS file):

```css
@keyframes fadeUp {
    to { opacity: 1; transform: translateY(0); }
}

@keyframes ringPulse {
    0%, 100% { transform: scale(1); opacity: 0.4; }
    50%       { transform: scale(1.3); opacity: 0; }
}
```

---

## 12. Page Checklist

When redesigning any page, go through this list:

- [ ] Add `@import` for `Bebas Neue` + `DM Sans`
- [ ] Paste `:root` color tokens
- [ ] Wrap content in `<div class="pf-page">`
- [ ] Add cursor HTML (`cursor-dot` + `cursor-ring`)
- [ ] Use `.pf-hero` with correct ghost word for the page
- [ ] Replace `.animate-on-scroll` with `.reveal` + IntersectionObserver JS
- [ ] Add `.tilt-card` + tilt JS to any card elements
- [ ] Replace old buttons with `.btn-pf` or `.btn-pf-ghost`
- [ ] Replace old form inputs with `.input-pf`
- [ ] Use `.section-eyebrow` + `.section-heading` for all section titles
- [ ] Add cursor JS at the bottom in `@push('scripts')`
- [ ] Add `@keyframes fadeUp` and `ringPulse`
- [ ] Test on mobile — disable cursor on touch devices with: `@media (hover: none) { .cursor-dot, .cursor-ring { display: none; } }`

---

## 13. Mobile Cursor Fix

Always add this to hide the custom cursor on phones/tablets:

```css
@media (hover: none) {
    .cursor-dot,
    .cursor-ring { display: none; }
}
```
