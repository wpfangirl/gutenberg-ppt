# Gutenberg for Portfolio Post Type
Contributors: wpfangirl, downstairsdev, garyj
Donate link: https://www.wpfangirl.com
Tags: portfolio, gutenberg, custom post types, custom taxonomies
Requires at least: 4.9.8
Tested up to: 4.9.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Stable tag: 0.1

Adds Gutenberg (REST API) support to the 'portfolio' post type created by the [Portfolio Post Type](https://wordpress.org/plugins/portfolio-post-type/) plugin by Devin Price and Gary Jones.

## Description

"Portfolio Post Type" is a bare-bones plugin for creating a portfolio post type and portfolio taxonomies (categories and tags). It has 100,000+ active installs. My WP Fangirl site is one of them. 

Unfortunately, the plugin is not compatible with Gutenberg, because the REST API is enabled. This plugin checks for the `Portfolio_Post_Type` class and sets `show_in_rest->true` for the post type and taxonomies.

The plugin also adds a block template to the portfolio. If you plan to use this on your site, you may want to edit the plugin to use different blocks in the template.

## Installation

1. Upload `gutenberg-ppt.zip` via the 'Plugins | Add New |Upload' in the WordPress admin, or unzip the file and upload the `gutenberg-ppt` folder to the `/wp-content/plugins/` directory by FTP or SSH.
1. Activate the plugin through the 'Plugins' menu in WordPress
1. There are no settings for this plugin. Your portfolio entries and portfolio taxonomies will appear in the left admin menu. 

## FAQ
### Is there a UI for choosing, customizing, and saving the blocks in the template?
That would be an amazing feature. Unfortunately, I don't know how to build it. If you do and would like to, let's talk. 

This plugin can be used as-is by an end user who wants to use this format for a portfolio, but it's really designed as a proof of concept and to provide an exampe for developers who want to use block templates in their CPTs.

### Will this plugin be in the WordPress.org repository?
I don't have plans to submit it at this time, but maybe Devin will add it to the original plugin.