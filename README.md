# Intro Search Solution

This bundle is design as an exercise to solve problem with searching entities. It's not a ready to use piece of code,
but a result of code kata.

# Installation

To install this bundle you need to add this to your composer.json file in Symfony2 project:

     "require": {
          "piotrpasich/symfony-search-solution": "dev-master"
     },
     "repositories": [
            {
                "type": "package",
                "package": {
                    "name": "piotrpasich/symfony-search-solution",
                    "version": "dev-master",
                    "source": {
                        "url": "git@github.com:piotrpasich/symfony-search-solution.git",
                        "type": "git",
                        "reference": "dev-master"
                    }
                }
            }
     ]


run `composer update piotrpasich/symfony-search-solution" command.

The next step is adding

    #app/confing/config.yml
    knp_paginator:
        page_range: 5                      # default page range used in pagination control
        default_options:
            page_name: page                # page query parameter name
            sort_field_name: sort          # sort field query parameter name
            sort_direction_name: direction # sort direction query parameter name
            distinct: true                 # ensure distinct results, useful when ORM queries are using GROUP BY statements
        template:
            pagination: KnpPaginatorBundle:Pagination:sliding.html.twig     # sliding pagination controls template
            sortable: KnpPaginatorBundle:Pagination:sortable_link.html.twig # sort link template


And defining the router

    #app/confing/router.yml
    PPAcmeBundle_post:
        resource: "@PPAcmeBundle/Resources/config/routing/post.yml"
        prefix:   /

And initializing bundles in

    //app/AppKernel.php
    $bundles = array(
        new PP\AcmeBundle\PPAcmeBundle(),
        new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
    );

