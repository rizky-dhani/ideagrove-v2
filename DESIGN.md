# DESIGN.md

Design direction for The Idea Grove Studio, and for the three `resources/views/redesign/`
concepts. The concept pages are preview-only (`/redesign/*`), so they carry the same copy as
the live site and are graded as deliverables against this file.

Owner: The Idea Grove Studio. Bali, est. 2019.

---

## Identity

A small Balinese studio that moves slowly on purpose. The work is for hospitality, climate,
culture, wellness and social-impact organisations. The voice is plain and specific, never
"AI-powered" or "revolutionary". The visual language is warm, material, and hand-set rather
than glossy and metallic: paper, ink, terracotta, foliage, ocean night.

Three concept routes are explorations of the same identity, each with its own palette and
composition, so the studio can choose a direction rather than accept one default.

---

## The three concept routes

| Route | File | Language | ENERGY / RHYTHM / MOTION |
| --- | --- | --- | --- |
| Sawah Digital | `redesign/sawah-digital.blade.php` | Rice-terrace editorial. Paper ground, deep jungle ink, terracotta accent. Terracing used as a structural rhythm. | 2 / 2 / 2 |
| Segara Glow | `redesign/segara-glow.blade.php` | Bioluminescent ocean night. Near-black ground, sea-glass light, single teal accent. Quiet and low-motion. | 2 / 2 / 1 |
| Banjar | `redesign/banjar.blade.php` | Communal collage. Warm cream, hard ink, magenta and marigold. Ticket, sticker and polaroid artefacts, deliberately varied composition. | 3 / 3 / 2 |

Dials are enforced per concept. A route claiming MOTION 1 must not run an endless marquee or
pulse; a route claiming RHYTHM 3 must visibly vary its section compositions.

---

## Palette

Each route caps at two cores plus one accent (R-29). Neutrals are the paper or night ground.

### Sawah Digital
- Core: `#FBF6EC` paper, `#123524` jungle ink.
- Accent: `#E4572E` terracotta.
- Accent used for text must be `#B23A17` (5.55:1 on paper). `#E4572E` is a large-text and
  fill colour only (3.42:1 on paper), never body copy or small labels.
- Muted body text: `#4A5C4E` (6.65:1 on paper). No `opacity-50/60` on light ground.

### Segara Glow
- Core: `#04120E` night, `#EFFAF3` sea mist.
- Accent: `#2DD4BF` sea glass (10.27:1 on night, so safe as text on the dark ground).
- Muted body text: `#A9B8B1` (9.27:1 on night, 7.97:1 on raised panels). Avoid `text-white/40`
  and below.

### Banjar
- Core: `#FFF9EF` cream, `#22281F` ink.
- Accents: `#D92662` magenta (4.55:1 on cream, passes as text) and `#FFC531` marigold
  (a fill only; text on marigold is ink).
- Muted body text: `#5A5F58` (6.24:1 on cream). On ink panels, `#9DA69B` (6.01:1).

---

## Typography

| Route | Display | Mono | Reason |
| --- | --- | --- | --- |
| Sawah | Outfit | IBM Plex Mono | Outfit is geometric and open at large sizes, so the terracing headlines read as architecture rather than as a default grotesque. |
| Segara | Space Grotesk | IBM Plex Mono | Space Grotesk has the slightly technical, instrument-panel feel that suits a night-ocean field-notes route. |
| Banjar | Bricolage Grotesque | IBM Plex Mono | Bricolage's uneven, poster-like forms carry the communal collage voice. |

Mono is used for metadata, counts and labels only. It is not used as a large display face, and
uppercase tracking is kept below `0.22em` so it stays a label rather than a costume.

---

## Decisions and their reasons (R-31)

| Decision | Reason |
| --- | --- |
| Warm paper / night grounds instead of white or near-black default | The studio's subject is place and material, so the ground is a material, not a void. |
| One accent per route | Restraint is what lets the accent land at the key moment (core Part 3). |
| Pill radius on primary CTAs only | Radius is a hierarchy tool: the pill marks the one action that matters, everything else is a rectangle or a soft card. |
| Arrows on one directional control per page | An arrow is a direction cue, so it is kept for the "see the work" scroll action and dropped from the rest. |
| Ticket, sticker and polaroid artefacts in Banjar | They carry the communal, printed-notice voice, and they give the route its RHYTHM 3 variation. |
| Glass limited to one surface per route | Glass flattens hierarchy when every surface wears it (R-10). |
| No glow loops or pulses | Motion marks a moment; a loop is wallpaper (R-19). |
| Real project data from the `Project` model | Counts and cards are live, so they are evidence, not decoration (R-17). |
| Stock photography is labelled as placeholder | The studio has no released team photography yet, so portraits are not passed off as real staff (R-23, R-38). |

---

## Non-negotiables inherited from antislop

- No em dash in any UI string or lang file.
- No fabricated statistics, testimonials, team members or clients.
- No emoji as decoration.
- Every nav item points at a section that exists.
- Every interactive element has a real behaviour or is removed.
- WCAG AA contrast on all text.
- Light/dark: each route commits to one ground as its identity; no broken toggle is shipped.
