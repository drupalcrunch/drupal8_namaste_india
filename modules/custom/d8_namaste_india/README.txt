https://www.drupal.org/node/2116781

Step1:
Before you begin
    https://www.drupal.org/node/1056468

    1. Check for errors behind the scenes
    tail -f ../logs/local.drupalevents.com-error.log

    2. Change settings in your dev site
    Copy following code in your settings.php
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        //Note:  Do not include the opening and closing PHP tags when you copy 
        //this code

    In addition, navigate to 
    Administration→ Configuration→ Development → 
    logging and errors and select "All messages". 
    (This sets $conf['error_level'] = 2; .)

    3. Switch on strict PHP error reporting
    check through your php.ini file and set error reporting to E_ALL | E_STRICT

Step2:
Name your module
1. Choose a "short name", or machine name, This machine name will be used in 
several file and function names in your module, and is used by core Drupal 
programmatically to refer to your module.

Consider following rules while selecting module machine name 
    It must start with a letter.
    
    It must contain only lower-case letters and underscores.
    
    It must be unique. Your module may not have the same short name as any 
    other module, theme, or installation profile you will be using on the site.
    consider using prefix like 'd8_' for module machine name 
e.g.: d8_namaste_india

    Do not use upper-case letters in your module's machine name, 
    or 
    Drupal will not recognize your hook implementations. 

Create a folder for your module
    modules/d8_namaste_india
    or
    modules/contrib/d8_namaste_india
    or
    modules/custom/d8_namaste_india

or 
    sites/all/modules/d8_namaste_india
    or
    sites/all/modules/contrib/d8_namaste_india
    or
    sites/all/modules/custom/d8_namaste_india

Step3:
Let Drupal 8 know about your module with an .info.yml file
https://www.drupal.org/node/2000204
project metadata : An essential part of a Drupal 8 module, theme, or install
profile is the .info.yml file (aka, "info yaml file") 
to store metadata about the project.

These .info.yml files are required to:
    Notify Drupal about the existence of a module, theme, or install profile.

    Provide information for the Drupal Web UI administration pages.

    Provide criteria to control module activation and deactivation 
    and Drupal version compatibility.

    General administrative purposes in other contexts

Debugging .info.yml files
Module is not listed on admin/modules
    Ensure the info file is named {machine name}.info.yml and is located in 
    the root of the module directory.

    Ensure that the file has the line:
    type: module

    Ensure the module name starts either with a letter or an underscore
    Function names follow the same rules as other labels in PHP. 
    A valid function name starts with a letter or underscore, 
    followed by any number of letters, numbers, or underscores. 
    As a regular expression, it would be expressed thus: 
    [a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*

Module is listed on admin/modules but its checkbox is disabled.
    Make sure that the core compatibility is set to 8.x: 
    core: 8.x

    Ensure that all the module dependencies are available.

Module description is empty
     Remember that the description key is required. 
     description: Example Module description.

Step4:
Add a composer.json file to define your module as a PHP package
    The wider PHP community uses Composer to manage packages, this is also 
    done in Drupal, for example the Drupal project has a dependency on the 
    "drupal/core" package. 
    
    The "drupal/core" package has a type defined as "drupal-core" 
    so composer knows what to do with it. 
    
    The composer/installers library defines a number of Drupal types, these are:
    drupal-module
    drupal-theme
    drupal-library
    drupal-profile
    drupal-drush

Step 5:
Adding a basic controller in module to return "Namaste India!" message 
when it is invoked by the routing system.

    create a sub-folder called src
        stands for "source" 
        
        It is part of the standard PSR-4 standard so that your controller class 
        can be autoloaded.
    
    Within the "src" folder, create a sub-folder called Controller 
        (again part of the standard). 

    Within the "Controller" folder, create a new file, 
    called D8NamasteIndiaController.php

    Class in controller needs to be extended of some base class 
    
    Method from controller needs to be invoked by adding a routing file to 
    our module.

    Adding controller to code is like "Build a tool, then wire it up"
    which is philosophy of Drupal 8

Step 6:
Add a routing file
    
    Add a new file called {module_name}.routing.yml in root of module
    
    You will need to clear your site's cache, if you already have your module activated

    Now navigate to the front page of your site, 
    and then add /namaste-india to your site's url in the address bar. 
    You should pull a page with the "Namaste India" message on it.

Step 7:
Add a menu link
    Create a new file, called {module_name}.links.menu.yml in root of folder


Step 8:
Create a custom block
    Creating a block is extremely easy. 
    Drupal will scan your module's code's comments that conform to 
    the docblock style i.e. specially formatted string called an Annotation.

Step 9:
Add a Form to the Block Configuration
configuration in Drupal 8 is exportable from the work done by the site builder 
on the dev site and importable into the production site. 

As a module builder you can also provide a default configuration to 
auto-fill the form when the site builder instantiates a new block.

Process the Block Config Form

Use Config in Block Display


        
    
    

    






