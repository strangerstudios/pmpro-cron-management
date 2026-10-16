# Translation seed

Starting point for a `pmpro-cron-management` project on translate.strangerstudios.com. Nothing in this folder is loaded by WordPress; the `.distignore` at the repo root keeps it out of release zips.

- `pmpro-cron-management.pot`: the fork's source strings, generated from this repo with `wp i18n make-pot` on 2026-10-15 (367 strings, text domain `pmpro-cron-management`).
- `po/pmpro-cron-management-<locale>.po`: the 28 WP Crontrol 2.0.0 language packs published on WordPress.org, pulled from `api.wordpress.org/translations/plugins/1.0/?slug=wp-crontrol&version=2.0.0` on 2026-10-15. Each file carries the header "distributed under the same license as the WP Crontrol package", so they are GPL v2 or later, like the plugin. Packs contain translated strings only; untranslated originals are simply absent.

Source strings are the key GlotPress matches on, and the text domain is not part of that key, so the text-domain rename to `pmpro-cron-management` did not affect them; each PO is filtered to the strings the fork actually ships. The fork's own strings (plugin description, the coexistence notice) have no translations yet.

## Import

1. Create the project (slug `pmpro-cron-management`) and import `pmpro-cron-management.pot` as originals.
2. For each locale, add the translation set and import `po/pmpro-cron-management-<locale>.po` with "current" status.
3. Re-export language packs from GlotPress; PMPro Update Manager's GlotPress helper serves them by plugin slug.

## Coverage (against 367 originals in the POT)

| Locale | Translated | Dropped (not in the fork) |
|---|---|---|
| cs_CZ | 157 | 2 |
| de_DE | 133 | 1 |
| de_DE_formal | 138 | 1 |
| en_AU | 156 | 2 |
| en_CA | 157 | 2 |
| en_GB | 185 | 25 |
| en_NZ | 156 | 2 |
| es_CL | 156 | 2 |
| es_CO | 104 | 0 |
| es_EC | 94 | 0 |
| es_ES | 159 | 2 |
| es_MX | 94 | 0 |
| es_VE | 105 | 0 |
| fa_IR | 156 | 2 |
| fr_FR | 104 | 1 |
| gl_ES | 157 | 2 |
| it_IT | 158 | 2 |
| ja | 157 | 2 |
| ko_KR | 157 | 2 |
| nl_BE | 195 | 12 |
| nl_NL | 160 | 2 |
| nl_NL_formal | 158 | 2 |
| pl_PL | 140 | 1 |
| pt_BR | 101 | 0 |
| ru_RU | 158 | 2 |
| sr_RS | 156 | 2 |
| sv_SE | 158 | 2 |
| zh_TW | 156 | 2 |
