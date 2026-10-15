# PMPro Crontrol

A fork of [WP Crontrol](https://wordpress.org/plugins/wp-crontrol/) maintained by the Paid Memberships Pro team, without the third-party plugin promotions and one-click installers that arrived in WP Crontrol 2.0.0 after the Awesome Motive acquisition.

Everything else is WP Crontrol: cron events, logs, insights, email alerts, custom schedules, and the WordPress Abilities API integration. Options and log tables keep their `crontrol_*` names, so a site can switch between the two plugins without losing settings or history. The two plugins cannot be active at the same time; PMPro Crontrol stays inactive and shows a notice while WP Crontrol is active.

## Install

Download the latest release from this repo and install it as `pmpro-crontrol/pmpro-crontrol.php`. The `Update URI` header keeps WordPress.org from offering WP Crontrol updates for this plugin.

## What is removed from upstream

- `src/promos.php` and `images/promos/`: the dismissible welcome panel, the plugin suggestion cards, the install-and-activate buttons, and the local referral tracking.
- The "no scheduled backups" notice, the WPCode tip under the PHP cron event code field, the WP Mail SMTP cards on the Cron Alerts screen and in log run details, and the WPVibe card on the Cron AI screen.
- The promo CSS and the background-dismiss JavaScript.
- Plugin header, readme, composer, and security contacts now point at this repo.

Added: `src/coexist.php`, the guard that keeps the plugin inactive while WP Crontrol is active.

## Branches and upstream tracking

- `main`: the fork.
- `wp-crontrol`: pristine exports of the WordPress.org SVN tags, one commit per release, each tagged `wp-crontrol-<version>`. Never edited by hand.

A daily job on Flint's box checks `https://plugins.svn.wordpress.org/wp-crontrol/tags/` for new releases. For each new tag it exports the tag onto the `wp-crontrol` branch, merges the tag into a `flint/upstream-<version>` branch, drops anything promotional or tied to Awesome Motive services, lints, opens a pull request against `main`, reviews it, and posts a summary in the PMPro `#dev` Slack channel. Merging is always a human decision.

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

GPL v2 or later, as upstream. WP Crontrol is the work of John Blackbourn, Edward Dale, and contributors.
