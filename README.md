# Crankshaft

Hi. I'm a theme called <em>Crankshaft</em>, which stands for <a href="http://www.crankshaftstudio.com/">Crankshaft Studio</a>.

My structure is 95% the same as _s by Automattic, but I integrate the <a href="http://foundation.zurb.com/sites/docs/starter-projects.html">Foundation Zurb Template</a>.

Learn more about the Foundation framework by reading the <a href="http://foundation.zurb.com/sites/docs/">Foundation docs</a>.

* A just right amount of lean, well-commented, modern, HTML5 templates.
* A helpful 404 template.
* A custom header implementation in `functions/custom-header.php` just add the code snippet found in the comments of `functions/custom-header.php` to your `header.php` template.
* Custom template tags in `functions/template-tags.php` that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in `functions/template-functions.php` that can improve your theming experience.
* The Foundation Framework (version 6.4) using the Foundation Zurb Template in the `_src` directory.
* Webpack / Babel for bundling JS.
* Licensed under GPLv2 or later. :) Use it to make something cool.

## Naming

1. Search for `'crankshaft'` (inside single quotations) to capture the text domain.
2. Search for `crankshaft_` to capture all the function names.
3. Search for `Text Domain: crankshaft` in style.css.
4. Search for <code>&nbsp;Crankshaft</code> (with a space before it) to capture DocBlocks.
5. Search for `crankshaft-` to capture prefixed handles.

OR

* Search for: `'crankshaft'` and replace with: `'megatherium'`
* Search for: `crankshaft_` and replace with: `megatherium_`
* Search for: `Text Domain: crankshaft` and replace with: `Text Domain: megatherium` in style.css.
* Search for: <code>&nbsp; Crankshaft</code> (with a space before it) and replace with: <code>&nbsp;Megatherium</code>
* Search for: `crankshaft-` and replace with: `megatherium-`

Then, update the stylesheet header in `style.css` and the links in `footer.php` with your own information. Next, update or delete this readme.

There are two routes you can take for development, depending on whether you like Sass, Gulp and friends:

## Development using CSS (without Sass or Gulp)

If you're not into Sass or Gulp, just delete the _src directory and remove the comment from the beginning of this line in `functions/scripts-and-styles.php`:

		// wp_enqueue_style( 'crankshaft-custom-style', get_stylesheet_uri() );

You can then add your own custom styles into `style.css`.

It is highly recommended that you create a custom version of the Foundation JS & CSS using the <a href="http://foundation.zurb.com/sites/docs/style-sherpa.html">online configurator</a> so you have only what you need and nothing else. This will save users' bandwidth, time, batteries, money, headaches and reduce CO2 emissions. If you do this however, you need to do a couple of things after extracting the custom download:

* Move `css/foundation.min.css` from the custom package into `dist/assets/css/` and rename it to `app.css`.
* Move `js/vendor/foundation.min.js` from the custom package into `dist/assets/js/` and rename it to `app.js`.

If you have any custom JS, I suggest creating a new file in `dist/assets/js` and enqueuing it the usual way in `functions/scripts-and-styles.php`.

## Development using Sass, Gulp and Panini templates

Requirements: Node and NPM. And a local WordPress development server (MAMP, XAMPP, Pressmatic, something else, it's your choice).

Set up a local WordPress development site, and take note of its URL, e.g. 'example.dev'. Drop your theme in the themes directory and activate it. Edit `config.yml` and make sure the BROWSERSYNC options point to the right URL. This is also where you change options regarding which Foundation (and other) JS files should be concatenated, how the autoprefixer works etc.

Run `npm install` in your theme directory. Go make a cup of tea while this is happening. Then run `npm start` and start developing!

### Compiling assets for production

VERY IMPORTANT: Run `npm run build` to compile compressed, production-ready CSS and JS, or make sure your deployment process does this for you. Otherwise you'll end up with ridiculously large CSS and JS files and your clients will call you on a Saturday evening when you're trying to enjoy a beer with your friends.

## Including / Excluding JavaScript

The main entry point to the theme JavaScript is in `_src/assets/js/app.js`. Adding your own code follows similar logic to SCSS files:

### Customize which Foundation plugins you want

You probably only want a subset of Foundation for your project. To prevent a module from being loaded, open `_src/assets/js/lib/foundation-explicit-pieces` in your text editor and comment out both the import line at the top and the initialization line at the end of the file. For example, if you don't need the AccordionMenu component, comment out this:
```
import { AccordionMenu } from 'foundation-sites/js/foundation.accordionMenu';
```
and this:
```
Foundation.plugin(AccordionMenu, 'AccordionMenu');
```

### Adding custom JavaScript

* Create a new file for each feature inside `_src/assets/js/app.js`.
* Import it into app.js like so `import './my-custom-feature';` and use ES6 imports to add the required depencies such as jQuery (see app.js for an example.
* You can also add completely separate JS files to be copied as-is into `_src/assets/wp-js`. Do this if you only want to conditionally load them in WordPress based on page etc.

### Developing HTML mockups without a WordPress installation

If you prefer to start development by building HTML mockups, you can build your templates in `_src/pages` and `_src/partials` and change the BROWSERSYNC type setting in `config.yml` to `html`. Browsersync will start up a simple static file server at localhost:8000 and refresh every time you make a change to your Sass, JS or HTML template files. The benefit of this is you can get going faster without the overhead of a WP site running locally, and it's easier to include front-end devs in your team who might not have a local server setup or WordPress experience.

Read more about the Panini template language in the <a href="http://foundation.zurb.com/sites/docs/panini.html">Panini docs on the Foundation site</a>.

### Styleguides!

You can build a styleguide within your theme in `_src/styleguide/`, extremely handy when passing on development to new theme members. <a href="http://foundation.zurb.com/sites/docs/style-sherpa.html">Instructions for how to edit the styleguide on the Foundation site</a>. The BROWSERSYNC value in `config.yml` needs to be set to `html` and you can view your guide at `localhost:8000/styleguide.html`.

## Additional resources

* For a very comprehensive explanation of the Foundation Zurb template structure, see https://zendev.com/2017/09/05/front-end-development-kickstarter-zurb-template.html
