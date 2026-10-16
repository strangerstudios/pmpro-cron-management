# PMPro Cron Management

A fork of [WP Crontrol](https://wordpress.org/plugins/wp-crontrol/) maintained by the Paid Memberships Pro team, without the in-admin promotions and one-click installers for other plugins that arrived in WP Crontrol 2.0.0.

Everything else is WP Crontrol: cron events, logs, insights, email alerts, custom schedules, and the WordPress Abilities API integration. Options and log tables keep their `crontrol_*` names, so a site can switch between the two plugins without losing settings or history. The two plugins cannot be active at the same time; PMPro Cron Management stays inactive and shows a notice while WP Crontrol is active.

WP Crontrol is the work of John Blackbourn, Edward Dale, and contributors, and this fork keeps their license, credits, and changelog.

## Who this plugin is for

This plugin is primarily meant for sites running [Paid Memberships Pro](https://www.paidmembershipspro.com). The Paid Memberships Pro team is likely to update it with features, and possibly promos, for their own plugins. You shouldn't use this as a straight replacement for WP Crontrol unless you are also using Paid Memberships Pro.

## Install

Download `pmpro-cron-management.zip` from the [releases page](https://github.com/strangerstudios/pmpro-cron-management/releases) and upload it under Plugins → Add New → Upload Plugin. The plugin folder must be `pmpro-cron-management` (a GitHub "source code" zip unpacks as `pmpro-cron-management-<version>`, which is the wrong folder). The `Update URI` header keeps WordPress.org from offering WP Crontrol updates for this plugin. Updates will come through PMPro Update Manager once the plugin is on the PMPro license server; until then, install new releases the same way.

## Switching from WP Crontrol

PMPro Cron Management and WP Crontrol use the same options and database tables, so a switch keeps your events, custom schedules, logging choices, alert settings, and logs. Do it in this order:

1. Install PMPro Cron Management but do not activate it yet.
2. Deactivate WP Crontrol. Do not delete it yet.
3. Activate PMPro Cron Management and check Cron → Cron Events (and Cron Logs, if you had logging on). On a multisite network, network-deactivate and network-activate in the same order.
4. Decide what to do with WP Crontrol. Leaving it deactivated is safe. Deleting it runs its uninstall routine, which drops the shared log tables and removes the logging and alert settings. Your cron events and custom schedules are not affected, but you will need to turn logging and alerts back on afterwards.

Switching back works the same way in reverse: deactivate PMPro Cron Management, then activate WP Crontrol. The same deletion caveat applies to PMPro Cron Management's uninstall.

## What is removed from upstream

- `src/promos.php` and `images/promos/`: the dismissible welcome panel, the plugin suggestion cards, the install-and-activate buttons, and the local referral tracking.
- The "no scheduled backups" notice, the WPCode tip under the PHP cron event code field, the WP Mail SMTP cards on the Cron Alerts screen and in log run details, and the WPVibe card on the Cron AI screen.
- The promo CSS and the background-dismiss JavaScript.
- Plugin header, readme, composer, and security contacts now point at this repo.

Added: `src/coexist.php`, the guard that keeps the plugin inactive while WP Crontrol is active.

## Versioning and releases

- The version number tracks the upstream WP Crontrol release the fork is based on: PMPro Cron Management 2.0.0 is WP Crontrol 2.0.0 minus the removals above. Porting a new upstream release sets the version to that release.
- A fork-only release between upstream releases (a fix in `src/coexist.php`, say) adds a fourth segment: 2.0.0.1, 2.0.0.2. Version comparisons keep working, and the next upstream port resets to the plain upstream number.
- Releases are manual: tag `v<version>` on `main` and attach a `pmpro-cron-management.zip` built from the tag with a `pmpro-cron-management/` root and without `.git`, `README.md`, and `SECURITY.md`. Adding the plugin to the PMPro license server comes later; GitHub releases are the download until then.
- Translations: the text domain is `pmpro-cron-management` and language packs are managed on translate.strangerstudios.com, delivered by PMPro Update Manager. `languages-seed/` holds the POT and the seed PO files for that project. Upstream merges must keep the fork's text domain on every string; the sync policy re-runs the rename after each merge.

## Branches and upstream tracking

- `main`: the fork.
- `wp-crontrol`: pristine exports of the WordPress.org SVN tags, one commit per release, each tagged `wp-crontrol-<version>`. Never edited by hand.

A daily job on Flint's box checks `https://plugins.svn.wordpress.org/wp-crontrol/tags/` for new releases. For each new tag it exports the tag onto the `wp-crontrol` branch, merges the tag into a `flint/upstream-<version>` branch, drops anything promotional or tied to third-party services, lints, opens a pull request against `main`, reviews it, and posts a summary in the PMPro `#dev` Slack channel. Merging and releasing are human decisions. The job is the public [`wporg-fork-watch`](https://github.com/flintfromthebasement/skills/tree/main/skills/wporg-fork-watch) skill; this repo's policy is its shipped example.

To sync by hand:

```bash
git checkout wp-crontrol
svn export --force https://plugins.svn.wordpress.org/wp-crontrol/tags/<version> .
git add -A && git commit -m "wp-crontrol <version> (pristine SVN tag export)"
git tag wp-crontrol-<version>
git checkout -b flint/upstream-<version> main
git merge wp-crontrol-<version>   # resolve conflicts, keep promos out
```

## License

GPL v2 or later, as upstream.
