# DESIGN.md

Design direction for The Idea Grove Studio, and for the three `resources/views/redesign/`
concepts. The concept pages are preview-only (`/redesign/*`), so they carry the same copy as
the live site and are graded as deliverables against this file.

Owner: The Idea Grove Studio. Bali, est. 2019.

---

## Identity

A small Balinese studio that moves slowly on purpose. The work is for hospitality, climate,
culture, wellness and social-impact organisations. The voice is plain and specific, never
"AI-powered" or "revolutionary". The visual language is a working digital agency: a brand-led
accent, a real grid, ruled indexes, and type that carries the layout rather than decoration.

**The logo colour is the base.** `#F45B0E` (the orange in `Logo_Square.webp` / `Logo_Landscape.webp`)
is the base colour for every concept, not an accent chosen per route. Each route differs in
ground, composition and rhythm, and shares that one base. The logo itself is rendered as a
masked fill in `--logo-c`, so the mark always sits in the route's brand tone instead of being a
fixed bitmap dropped onto a ground.

Three concept routes are explorations of the same identity, each with its own ground and
composition, so the studio can choose a direction rather than accept one default.

---

## The three concept routes

| Route | File | Language | ENERGY / RHYTHM / MOTION |
| --- | --- | --- | --- |
| Sawah Digital | `redesign/sawah-digital.blade.php` | Agency light. Warm paper ground, ink, logo orange as the base. Blueprint grid, staggered work columns, hairline cards. | 2 / 2 / 2 |
| Segara Glow | `redesign/segara-glow.blade.php` | Bioluminescent ocean night. Near-black ground, sea-glass light, single teal accent. Quiet and low-motion. | 2 / 2 / 1 |
| Banjar | `redesign/banjar.blade.php` | Agency dark. Near-black ground, logo orange as the field. Ruled service index, full-bleed project grid, brand ticker. | 3 / 3 / 2 |

Dials are enforced per concept. A route claiming MOTION 1 must not run an endless marquee or
pulse; a route claiming RHYTHM 3 must visibly vary its section compositions.

---

## Palette

Each route caps at two cores plus one accent (R-29). Neutrals are the paper or night ground.
The brand orange is the shared base for Sawah and Banjar; Segara Glow keeps its ocean-night
identity and carries the brand only in the mark and the primary action.

### Shared base (all routes)
- Base: `#F45B0E` logo orange. On a light ground it is a fill and large-text colour only
  (3.18:1 on paper, 3.31:1 on white); on a dark ground it is safe as text (5.65:1 on
  `#141210`, 5.18:1 on `#1E1B19`).
- `#FF7A33` is the bright variant for accent text on dark grounds (7.19:1 on `#141210`).
- **On a brand fill the text is ink, never white.** White on `#F45B0E` is 3.31:1 and fails.
  Ink `#171512` on brand is 5.51:1, and the muted tone on brand is `#3A1D05` (4.68:1).

### Sawah Digital
- Core: `#FDFAF7` paper, `#171512` ink.
- Accent: `#F45B0E` brand.
- Accent used for text must be `#C9440B` (4.68:1 on paper). `#F45B0E` is a large-text, fill
  and stroke colour only, never body copy or small labels.
- Peach `#FDE7DA` carries the icon wells, with `#8F2F06` on it (6.84:1).
- Muted body text: `#5C5651` (6.95:1 on paper, 7.23:1 on white). No `opacity-50/60` on light
  ground. Hairlines: `#E7E0DA`.

### Segara Glow
- Core: `#04120E` night, `#EFFAF3` sea mist.
- Accent: `#2DD4BF` sea glass (10.27:1 on night, so safe as text on the dark ground).
- Muted body text: `#A9B8B1` (9.27:1 on night, 7.97:1 on raised panels). Avoid `text-white/40`
  and below.

### Banjar
- Core: `#141210` ground, `#1E1B19` panel, `#F7F1EC` text.
- Accent: `#F45B0E` brand as the field, `#FF7A33` as accent text (7.19:1 on ground).
- Muted body text: `#A79E97` (7.10:1 on ground, 6.51:1 on panel). Hairlines: `#3D3733`
  (1.60:1 against the ground, so they read as structure rather than as noise).

---

## Typography

| Route | Display | Mono | Reason |
| --- | --- | --- | --- |
| Sawah | Outfit | uppercase tracking labels | Outfit is geometric and open at large sizes, so the headlines read as architecture rather than as a default grotesque. Labels carry a `0.2em` tracking instead of a second face. |
| Segara | Space Grotesk | IBM Plex Mono | Space Grotesk has the slightly technical, instrument-panel feel that suits a night-ocean field-notes route. |
| Banjar | Bricolage Grotesque | uppercase tracking labels | Bricolage's uneven, poster-like forms carry the studio voice. The service index uses tabular figures for its numbering. |

Mono is used for metadata, counts and labels only. It is not used as a large display face, and
uppercase tracking is kept below `0.22em` so it stays a label rather than a costume.

---

## Decisions and their reasons (R-31)

| Decision | Reason |
| --- | --- |
| Logo orange `#F45B0E` as the base for every concept | The mark is the studio's one owned colour, so it is the system's base rather than a per-route pick. |
| The logo is a masked fill, not a bitmap | A masked fill re-tints the mark to the route's ground, so it stays legible on paper and on ink without a second asset. |
| Warm paper / near-black grounds instead of white or mid-grey default | A studio page needs a committed ground; a mid-grey or default white reads as an unstyled template. |
| Ink text on brand fills, never white | White on `#F45B0E` is 3.31:1 and fails AA. Ink on brand is 5.51:1, so the fill can carry a headline. |
| Sawah uses a blueprint grid, Banjar uses a hairline panel system | Both are agency grammar, but the grid says "studio process" and the hairline says "index", so the two routes do not collapse into one look. |
| Pill radius on primary CTAs only | Radius is a hierarchy tool: the pill marks the one action that matters, everything else is a rectangle or a soft card. |
| Arrows on one directional control per page | An arrow is a direction cue, so it is kept for the "see the work" scroll action and dropped from the rest. |
| Ruled service index in Banjar and staggered work columns in Sawah | The two routes need visibly different composition per section to earn RHYTHM 3 and RHYTHM 2 respectively. |
| Pricing is ordered tiers, then includes, then the price matrix | A buyer asks "what shape is this", then "what is in it", then "what does it cost". Leading with a 5x3 price grid answers the last question first and reads as a menu. |
| The tier cards lead with a "from" price instead of all five project prices | The old cards repeated the same five rows three times. One number per card plus a "best for" line is scannable, and the detail still lives in the matrix below. |
| "Every build includes" is the strongest claim, so it carries the brand field | It is the part other agencies quote back as extras, so it gets the loudest surface in the section. |
| The team section is two people, named and linked | The studio is two people, so a crew grid, a carousel or a "meet the team" page would be padding. Two cards in Sawah, two ruled rows in Banjar, each with a real LinkedIn link. |
| Team bios are written from the public LinkedIn record | Names, roles and skills come from the two profiles, so nothing about the people is invented (R-23). |
| Glass limited to one surface per route | Glass flattens hierarchy when every surface wears it (R-10). |
| No glow loops or pulses | Motion marks a moment; a loop is wallpaper (R-19). |
| Real project data from the `Project` model | Counts and cards are live, so they are evidence, not decoration (R-17). |
| Initials avatars instead of stock team portraits | The studio has no released team photography yet, so portraits are not passed off as real staff (R-23, R-38). The hero row shows the real two-person roster as `IP` and `RD`, not four invented teammates. |

---

## Non-negotiables inherited from antislop

- No em dash in any UI string or lang file.
- No white text on a `#F45B0E` fill; the brand fill always carries ink.
- Team members are the two real people, with their real roles and links. No invented colleagues.
- The pricing "includes" list is a promise, not a bonus. Every item on it is in every tier, and no item on it is quoted back as an extra.
- No fabricated statistics, testimonials, team members or clients.
- No emoji as decoration.
- Every nav item points at a section that exists.
- Every interactive element has a real behaviour or is removed.
- WCAG AA contrast on all text.
- Light/dark: each route commits to one ground as its identity; no broken toggle is shipped.
