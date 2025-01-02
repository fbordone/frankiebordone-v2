# Frankie Bordone's Personal Website (v2)

Welcome to the second iteration of [frankiebordone.com](https://frankiebordone.com)! This repository houses the codebase for the latest version of my personal portfolio website. The original version can be found [here](https://github.com/fbordone/frankiebordone).

The primary goal of v2 is to demonstrate expertise in building block-based WordPress experiences with Gutenberg while showcasing past projects and development skills.

## Project Highlights

This project leverages [10up's WP Scaffold](https://github.com/10up/wp-scaffold) as the foundation for development, including:
- A barebones theme for customization.
- A must-use plugin for feature-specific functionality.
- Asset bundling powered by [10up Toolkit](https://github.com/10up/10up-toolkit), a custom Webpack 5-based tool.
	- **JavaScript Transpilation**: Babel for ES6+ support.
	- **Automatic Polyfills**: core-js@3 for broader browser compatibility.
	- **Styles**: Supports PostCSS, SASS, and CSS Modules.
	- **Code Quality Tools**: ESLint, Prettier, and Stylelint integration.

## Project Specifications

- **Node.js**: v20
- **PHP**: v8.3
- **WordPress**: v6.7.1

## Layout Overview

The website is designed as a single-page landing experience, utilizing both core WordPress blocks and custom-developed blocks to deliver a highly interactive and visually engaging layout.

**Core Blocks:**
- `Group` & `Column`: Used for foundational layout and section structuring.
- `Image`: Enhanced with a custom "tilt" block style for the portrait in the "Hero" section.
- `Heading`: Augmented with a custom purple gradient block style for key headers throughout the site.

**Custom Blocks:**
- `Feature Panel`:
	- Purpose: Showcases key services or offerings in a visually engaging format.
	- Implementation: Built with `RichText` components for flexible content editing.
	- Location: "About" section.
- `Portfolio Showcase`:
	- Purpose: Highlights featured projects with imagery and adaptable layouts.
	- Implementation: Uses `ServerSideRender` to dynamically pull data from a custom post type (`Projects`).
	- Location: "Portfolio" section.

## Get in Touch
Feel free to explore this repository and reach out with any questions, feedback, or collaboration opportunities!
- **Website**: [https://frankiebordone.com/](https://frankiebordone.com)
- **LinkedIn**: [https://www.linkedin.com/in/francescobordone/](https://www.linkedin.com/in/francescobordone/)
- **GitHub**: [https://github.com/fbordone](https://github.com/fbordone)
