<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'admin', '_controller' => 'App\\Controller\\AdminController::index'], null, null, null, false, false, null]],
        '/aide' => [[['_route' => 'aide', '_controller' => 'App\\Controller\\AideController::index'], null, null, null, false, false, null]],
        '/produit/service/panier' => [[['_route' => 'produit_service_panier', '_controller' => 'App\\Controller\\CartController::index'], null, null, null, false, false, null]],
        '/categorieAide' => [[['_route' => 'categorieAide', '_controller' => 'App\\Controller\\CategorieAideController::index'], null, null, null, false, false, null]],
        '/categorie' => [[['_route' => 'categorie', '_controller' => 'App\\Controller\\CategorieController::index'], null, null, null, false, false, null]],
        '/category/produit/service' => [[['_route' => 'category_produit_service', '_controller' => 'App\\Controller\\CategoryProduitServiceController::index'], null, null, null, false, false, null]],
        '/category/produit/service/new' => [[['_route' => 'category_produit_service_add', '_controller' => 'App\\Controller\\CategoryProduitServiceController::addCategoryAction'], null, null, null, false, false, null]],
        '/comptes' => [[['_route' => 'comptes', '_controller' => 'App\\Controller\\ComptesController::index'], null, null, null, false, false, null]],
        '/demande' => [[['_route' => 'demande', '_controller' => 'App\\Controller\\DemandeController::index'], null, null, null, false, false, null]],
        '/index' => [[['_route' => 'index', '_controller' => 'App\\Controller\\IndexController::index'], null, null, null, false, false, null]],
        '/HolidayHiatus' => [[['_route' => 'welcome', '_controller' => 'App\\Controller\\NavigationContrllerController::index'], null, null, null, false, false, null]],
        '/produit/service' => [[['_route' => 'produit_service', '_controller' => 'App\\Controller\\ProduitServiceController::index'], null, null, null, false, false, null]],
        '/produit/service/front' => [[['_route' => 'produit_service_front', '_controller' => 'App\\Controller\\ProduitServiceController::indexx'], null, null, null, false, false, null]],
        '/produit/service/liste' => [[['_route' => 'produit_service_liste', '_controller' => 'App\\Controller\\ProduitServiceController::liste'], null, null, null, false, false, null]],
        '/produit/service/new' => [[['_route' => 'produit_service_add', '_controller' => 'App\\Controller\\ProduitServiceController::addProduitAction'], null, null, null, false, false, null]],
        '/main' => [[['_route' => 'main', '_controller' => 'App\\Controller\\SujetController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/p(?'
                    .'|anier/(?'
                        .'|add/([^/]++)(*:195)'
                        .'|remove/([^/]++)(*:218)'
                    .')'
                    .'|roduit/service/(?'
                        .'|delete/([^/]++)(*:260)'
                        .'|update/([^/]++)(*:283)'
                    .')'
                .')'
                .'|/category/produit/service/(?'
                    .'|delete/([^/]++)(*:337)'
                    .'|update/([^/]++)(*:360)'
                .')'
                .'|/A(?'
                    .'|fficherSujet/([^/]++)(*:395)'
                    .'|jouterSujet/([^/]++)(*:423)'
                .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        195 => [[['_route' => 'cart_add', '_controller' => 'App\\Controller\\CartController::add'], ['id'], null, null, false, true, null]],
        218 => [[['_route' => 'cart_remove', '_controller' => 'App\\Controller\\CartController::remove'], ['id'], null, null, false, true, null]],
        260 => [[['_route' => 'produit_service_delete', '_controller' => 'App\\Controller\\ProduitServiceController::deleteAction'], ['id'], null, null, false, true, null]],
        283 => [[['_route' => 'produit_service_update', '_controller' => 'App\\Controller\\ProduitServiceController::updateAction'], ['id'], null, null, false, true, null]],
        337 => [[['_route' => 'category_produit_service_delete', '_controller' => 'App\\Controller\\CategoryProduitServiceController::deleteAction'], ['id'], null, null, false, true, null]],
        360 => [[['_route' => 'category_produit_service_update', '_controller' => 'App\\Controller\\CategoryProduitServiceController::updateAction'], ['id'], null, null, false, true, null]],
        395 => [[['_route' => 'Afficher', '_controller' => 'App\\Controller\\SujetController::afficher'], ['idboard'], null, null, false, true, null]],
        423 => [
            [['_route' => 'AjouterSujet', '_controller' => 'App\\Controller\\SujetController::AjouterSujet'], ['idboard'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
