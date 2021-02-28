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
        '/AfficherAide' => [[['_route' => 'AfficherAide', '_controller' => 'App\\Controller\\AideController::listAide'], null, null, null, false, false, null]],
        '/ajouterAide' => [[['_route' => 'ajouterAide', '_controller' => 'App\\Controller\\AideController::ajouterAide'], null, null, null, false, false, null]],
        '/admin/upload/test' => [[['_route' => 'upload_test', '_controller' => 'App\\Controller\\AideController::temporaryUploadAction'], null, null, null, false, false, null]],
        '/categorie_aide' => [[['_route' => 'categorie_aide', '_controller' => 'App\\Controller\\CategorieAideController::index'], null, null, null, false, false, null]],
        '/AfficherCategorieAide' => [[['_route' => 'AfficherCategorieAide', '_controller' => 'App\\Controller\\CategorieAideController::listCategoriesAide'], null, null, null, false, false, null]],
        '/ajouterCategorieAide' => [[['_route' => 'ajouterCategorieAide', '_controller' => 'App\\Controller\\CategorieAideController::ajouterCategorieAide'], null, null, null, false, false, null]],
        '/categorie' => [[['_route' => 'categorie', '_controller' => 'App\\Controller\\CategorieController::index'], null, null, null, false, false, null]],
        '/comptes' => [[['_route' => 'comptes', '_controller' => 'App\\Controller\\ComptesController::index'], null, null, null, false, false, null]],
        '/demande' => [[['_route' => 'demande', '_controller' => 'App\\Controller\\DemandeController::index'], null, null, null, false, false, null]],
        '/index' => [[['_route' => 'index', '_controller' => 'App\\Controller\\IndexController::index'], null, null, null, false, false, null]],
        '/HolidayHiatus' => [[['_route' => 'welcome', '_controller' => 'App\\Controller\\NavigationContrllerController::index'], null, null, null, false, false, null]],
        '/main' => [[['_route' => 'main', '_controller' => 'App\\Controller\\SujetController::index'], null, null, null, false, false, null]],
        '/AfficherSujet' => [[['_route' => 'Afficher', '_controller' => 'App\\Controller\\SujetController::afficher'], null, null, null, false, false, null]],
        '/AjouterSujet' => [[['_route' => 'AjouterSujet', '_controller' => 'App\\Controller\\SujetController::AjouterSujet'], null, null, null, false, false, null]],
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
                .'|/supprimer(?'
                    .'|Aide/([^/]++)(*:195)'
                    .'|CategorieAide/([^/]++)(*:225)'
                .')'
                .'|/modifier(?'
                    .'|Aide/([^/]++)(*:259)'
                    .'|CategorieAide/([^/]++)(*:289)'
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
        195 => [[['_route' => 'supprimerAide', '_controller' => 'App\\Controller\\AideController::SupprimerAide'], ['id'], null, null, false, true, null]],
        225 => [[['_route' => 'supprimerCategorieAide', '_controller' => 'App\\Controller\\CategorieAideController::SupprimerCategorieAide'], ['id'], null, null, false, true, null]],
        259 => [[['_route' => 'modifierAide', '_controller' => 'App\\Controller\\AideController::modifierAide'], ['id'], null, null, false, true, null]],
        289 => [
            [['_route' => 'modifierCategorieAide', '_controller' => 'App\\Controller\\CategorieAideController::modifierCategorieAide'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
