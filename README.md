# Accessibility Statement Feature Plugin

A plugin to automatically generate the structure of an accessibility statement for a WordPress website. This plugin replicates the look and functionality of the Privacy Policy tool already found in WordPress.

---

## Getting started

Requirements:

- Git

1. `git clone git@github.com:10degrees/accessibility-statement-plugin.git accessibility-statement-generator` into `wp-content/plugins`
2. Activate the 'Accessibility Statement Generator' plugin in your Admin area.
3. Go to Settings > Accessibility to generate your accessibility statement.

## Features

1. Generate the basic structure of an accessibility statement for a site in a single click (content inspired by https://www.w3.org/WAI/planning/statements/generator/#create) or:
2. Choose which page to use as the accessibility statement.
3. Display an 'Accessibility Statement' tag next to the accessibility statement page when viewing all pages.

This plugin **does not** generate a full accessibility statement. It instead provides a page with useful headings and prompts to be used to understand what content an accessibility statement should contain.

## Branches

### advanced-version

Initially we are focusing on the 'basic' version of the feature plugin (in the `master` branch), which replicates the Privacy Policy tool. In the `advanced-version` branch you can find a version of the plugin where the accessibility statement is generated via inputted data.

To view this version of the plugin:
1. `git fetch` - Get all branches
2. `git checkout advanced-version`

This version of the plugin has no build tooling, e.g. Gulp or Webpack, and so its JavaScript may not function on older browsers e.g. IE11. 

## Related Links

https://core.trac.wordpress.org/ticket/50673
https://www.w3.org/WAI/planning/statements/generator/#create