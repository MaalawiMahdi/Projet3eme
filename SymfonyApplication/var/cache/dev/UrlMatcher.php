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
        '/categorieAide' => [[['_route' => 'categorieAide', '_controller' => 'App\\Controller\\CategorieAideController::index'], null, null, null, false, false, null]],
        '/categorie' => [[['_route' => 'categorie', '_controller' => 'App\\Controller\\CategorieController::index'], null, null, null, false, false, null]],
        '/commentaire' => [[['_route' => 'commentaire', '_controller' => 'App\\Controller\\CommentaireController::index'], null, null, null, false, false, null]],
        '/comptes' => [[['_route' => 'comptes', '_controller' => 'App\\Controller\\ComptesController::index'], null, null, null, false, false, null]],
        '/demande' => [[['_route' => 'demande', '_controller' => 'App\\Controller\\DemandeController::index'], null, null, null, false, false, null]],
        '/index' => [[['_route' => 'index', '_controller' => 'App\\Controller\\IndexController::index'], null, null, null, false, false, null]],
        '/HolidayHiatus' => [[['_route' => 'welcome', '_controller' => 'App\\Controller\\NavigationContrllerController::index'], null, null, null, false, false, null]],
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
                .'|/Supprimer(?'
                    .'|Commentaire/([^/]++)/([^/]++)/([^/]++)(*:220)'
                    .'|Sujet/([^/]++)/([^/]++)(*:251)'
                .')'
                .'|/Modifier(?'
                    .'|Commentaire/([^/]++)/([^/]++)/([^/]++)(*:310)'
                    .'|Sujet/([^/]++)/([^/]++)(*:341)'
                    .'|Image/([^/]++)/([^/]++)(*:372)'
                .')'
                .'|/A(?'
                    .'|fficherSujet(?'
                        .'|/([^/]++)(*:410)'
                        .'|Front/([^/]++)(*:432)'
                    .')'
                    .'|jouterSujet(?'
                        .'|/([^/]++)(*:464)'
                        .'|Front/([^/]++)(*:486)'
                    .')'
                .')'
                .'|/ConsulterSujet(?'
                    .'|/([^/]++)/([^/]++)(*:532)'
                    .'|Front/([^/]++)/([^/]++)(*:563)'
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
        220 => [[['_route' => 'SupprimerCommentaire', '_controller' => 'App\\Controller\\CommentaireController::SupprimerCommentaire'], ['idboard', 'id', 'idcom'], null, null, false, true, null]],
        251 => [[['_route' => 'SupprimerSujet', '_controller' => 'App\\Controller\\SujetController::SupprimerSujet'], ['idboard', 'id'], null, null, false, true, null]],
        310 => [[['_route' => 'ModifierCommentaire', '_controller' => 'App\\Controller\\CommentaireController::ModifierCommentaire'], ['idboard', 'id', 'idcom'], null, null, false, true, null]],
        341 => [[['_route' => 'ModifierSujet', '_controller' => 'App\\Controller\\SujetController::ModifiererSujet'], ['idboard', 'id'], null, null, false, true, null]],
        372 => [[['_route' => 'ModifierImage', '_controller' => 'App\\Controller\\SujetController::ModifierImage'], ['idboard', 'id'], null, null, false, true, null]],
        410 => [[['_route' => 'AfficherSujet', '_controller' => 'App\\Controller\\SujetController::afficher'], ['idboard'], null, null, false, true, null]],
        432 => [[['_route' => 'AfficherSujetFront', '_controller' => 'App\\Controller\\SujetController::afficherFront'], ['idboard'], null, null, false, true, null]],
        464 => [[['_route' => 'AjouterSujet', '_controller' => 'App\\Controller\\SujetController::AjouterSujet'], ['idboard'], null, null, false, true, null]],
        486 => [[['_route' => 'AjouterSujetFront', '_controller' => 'App\\Controller\\SujetController::AjouterSujetFront'], ['idboard'], null, null, false, true, null]],
        532 => [[['_route' => 'ConsulterSujet', '_controller' => 'App\\Controller\\SujetController::ConsulterSujet'], ['idboard', 'id'], null, null, false, true, null]],
        563 => [
            [['_route' => 'ConsulterSujetFront', '_controller' => 'App\\Controller\\SujetController::ConsulterSujetFront'], ['idboard', 'id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
