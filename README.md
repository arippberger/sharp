Sharp
=====
A One-Page WordPress Theme Utilizing Angular.js
-----------------------------------------------

The goal of this project is two-fold:
  1. To teach myself the basics of Angular.js
  2. To provide a simple, responsive single-page WordPress theme

The end-goal for the project is to create a single-page simple blog theme for WordPress. All navigation will be handled without leaving index.php:

  - Loading a page will pull up the page content via an asynchronous request for a JSON file
  - Posts listed in "the loop" are loaded through an asychronous JSON request - infinite scolling through all posts is the goal
- The user is provided a seemless experience without having to deal with pesky page refreshes

What's Implimented So Far
-------------------------
  - Posts & pages are loaded in index.php through the JSON API
  - Dated archives are loaded in index.php through the JSON API
  - Dated Archives can be listed in the widget areas using the budled Angular.js Archive widget

TODO
----
  - Add "active" class to pages in navigation
  - Modify other default widgets so they are compatible with Angular.js
  
How It Works
------------
Much needs to be modularized/cleaned up, but as is:
  - TGM_Plugin_Activation Class is instatiated in functions.php (http://tgmpluginactivation.com/)
  - TGM_Plugin_Activation Class requires users to install the JSON REST API (WP API) Plugin (https://wordpress.org/plugins/json-rest-api/) on theme activation. This plugin may be included in a future version of WordPress Core, and this step could be removed from future versions of the theme.
  - Angular.js and Angular-related JS files are enqueued 
  - index.php lists posts by making calls to the JSON REST API via Angular.js

Installation
------------
```sh
bower install
```
needs to be run - bower.json file included

License
-------

GPL v2

Credits
-------

  - TGM Plugin Activation Class by Thomas Griffin (http://thomasgriffinmedia.com/)
  - JSON REST API (WP API) by Ryan McCue (http://ryanmccue.info/)
  - Angular.js tutorial by  Treehouse Island, Inc (http://teamtreehouse.com/library/building-with-angularjs-and-apis)
  

