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
        '/lds' => [[['_route' => 'lds', '_controller' => 'App\\Controller\\LdsController::index'], null, null, null, false, false, null]],
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
                .'|/S(?'
                    .'|upprimer(?'
                        .'|Commentaire/([^/]++)/([^/]++)/([^/]++)(*:223)'
                        .'|Sujet/([^/]++)/([^/]++)(*:254)'
                    .')'
                    .'|tats/([^/]++)(*:276)'
                .')'
                .'|/Modifier(?'
                    .'|Commentaire/([^/]++)/([^/]++)/([^/]++)(*:335)'
                    .'|Sujet/([^/]++)/([^/]++)(*:366)'
                .')'
                .'|/Like/([^/]++)/([^/]++)(*:398)'
                .'|/D(?'
                    .'|islike/([^/]++)/([^/]++)(*:435)'
                    .'|elete(?'
                        .'|Like/([^/]++)/([^/]++)/([^/]++)/([^/]++)(*:491)'
                        .'|Dislike/([^/]++)/([^/]++)/([^/]++)/([^/]++)(*:542)'
                    .')'
                .')'
                .'|/A(?'
                    .'|dd(?'
                        .'|Like/([^/]++)/([^/]++)/([^/]++)/([^/]++)(*:602)'
                        .'|Dislike/([^/]++)/([^/]++)/([^/]++)/([^/]++)(*:653)'
                    .')'
                    .'|fficherSujet(?'
                        .'|/([^/]++)(*:686)'
                        .'|Front/([^/]++)(*:708)'
                    .')'
                    .'|jouter(?'
                        .'|Sujet/([^/]++)(*:740)'
                        .'|Note/([^/]++)/([^/]++)/([^/]++)(*:779)'
                    .')'
                .')'
                .'|/ImprimerSujets/([^/]++)(*:813)'
                .'|/ConsulterSujet(?'
                    .'|/([^/]++)/([^/]++)(*:857)'
                    .'|Front/([^/]++)/([^/]++)(*:888)'
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
        223 => [[['_route' => 'SupprimerCommentaire', '_controller' => 'App\\Controller\\CommentaireController::SupprimerCommentaire'], ['idboard', 'id', 'idcom'], null, null, false, true, null]],
        254 => [[['_route' => 'SupprimerSujet', '_controller' => 'App\\Controller\\SujetController::SupprimerSujet'], ['idboard', 'id'], null, null, false, true, null]],
        276 => [[['_route' => 'Stats', '_controller' => 'App\\Controller\\SujetController::Stats'], ['idboard'], null, null, false, true, null]],
        335 => [[['_route' => 'ModifierCommentaire', '_controller' => 'App\\Controller\\CommentaireController::ModifierCommentaire'], ['idboard', 'id', 'idcom'], null, null, false, true, null]],
        366 => [[['_route' => 'ModifierSujet', '_controller' => 'App\\Controller\\SujetController::ModifiererSujet'], ['idboard', 'id'], null, null, false, true, null]],
        398 => [[['_route' => 'Like', '_controller' => 'App\\Controller\\CommentaireController::Like'], ['idcom', 'iduser'], null, null, false, true, null]],
        435 => [[['_route' => 'Dislike', '_controller' => 'App\\Controller\\CommentaireController::Dislike'], ['idcom', 'iduser'], null, null, false, true, null]],
        491 => [[['_route' => 'DeleteLike', '_controller' => 'App\\Controller\\LdsController::DeleteLike'], ['idboard', 'id', 'idcom', 'iduser'], null, null, false, true, null]],
        542 => [[['_route' => 'DeleteDislike', '_controller' => 'App\\Controller\\LdsController::DeleteDislike'], ['idboard', 'id', 'idcom', 'iduser'], null, null, false, true, null]],
        602 => [[['_route' => 'addLike', '_controller' => 'App\\Controller\\LdsController::addLike'], ['idboard', 'id', 'idcom', 'iduser'], null, null, false, true, null]],
        653 => [[['_route' => 'addDislike', '_controller' => 'App\\Controller\\LdsController::addDislike'], ['idboard', 'id', 'idcom', 'iduser'], null, null, false, true, null]],
        686 => [[['_route' => 'AfficherSujet', '_controller' => 'App\\Controller\\SujetController::afficher'], ['idboard'], null, null, false, true, null]],
        708 => [[['_route' => 'AfficherSujetFront', '_controller' => 'App\\Controller\\SujetController::afficherFront'], ['idboard'], null, null, false, true, null]],
        740 => [[['_route' => 'AjouterSujet', '_controller' => 'App\\Controller\\SujetController::AjouterSujet'], ['idboard'], null, null, false, true, null]],
        779 => [[['_route' => 'AjouterNoteSujet', '_controller' => 'App\\Controller\\SujetController::AjouterNoteSujet'], ['idsujet', 'iduser', 'v'], null, null, false, true, null]],
        813 => [[['_route' => 'ImprimerSujets', '_controller' => 'App\\Controller\\SujetController::ImprimerS'], ['idboard'], null, null, false, true, null]],
        857 => [[['_route' => 'ConsulterSujet', '_controller' => 'App\\Controller\\SujetController::ConsulterSujet'], ['idboard', 'id'], null, null, false, true, null]],
        888 => [
            [['_route' => 'ConsulterSujetFront', '_controller' => 'App\\Controller\\SujetController::ConsulterSujetFront'], ['idboard', 'id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
