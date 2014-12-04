hyp-text-search
===============

This plugin adds a search box to the top of wordpress content. It will render the box between the title for the page and the content.

##Instructions

This plugin adds a search box to the top of wordpress content. It will render the box between the title for the page and the content. The div targeted by the search can be changed in: hyp-text-search.js. Just change #main-content to whatever element you want to target on line 79 and 84

Instructions:

1) Add this to the top of a page template (like page.php) above get_header(); Page templates located in the root directory of the theme.

```php
<?php $hypts_activate = 1 ?>
```

2) To create a custom page template, make a copy of page.php. Then name this file page-MYSLUG.php

If you want to create a template for more than one page, just add the template name PHP block to the top of the template file. Then you can select this template from the wordpress page editor for any page.

/* Template Name: MyTemplateName */
