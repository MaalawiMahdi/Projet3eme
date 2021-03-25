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
        '/connect/google' => [[['_route' => 'connect_google_start', '_controller' => 'App\\Controller\\GoogleController::connectAction'], null, null, null, true, false, null]],
        '/connect/google/check' => [[['_route' => 'connect_google_check', '_controller' => 'App\\Controller\\GoogleController::connectCheckAction'], null, null, null, true, false, null]],
        '/inscription/google' => [[['_route' => 'inscription_google_start', '_controller' => 'App\\Controller\\GoogleController::inscriptionAction'], null, null, null, true, false, null]],
        '/inscription/google/check' => [[['_route' => 'inscription_google_check', '_controller' => 'App\\Controller\\GoogleController::inscriptionCheckAction'], null, null, null, true, false, null]],
        '/index' => [[['_route' => 'index', '_controller' => 'App\\Controller\\IndexController::index'], null, null, null, false, false, null]],
        '/societe_demandes' => [[['_route' => 'societe_demandes', '_controller' => 'App\\Controller\\SocieteController::afficherdemande'], null, null, null, false, false, null]],
        '/societe' => [[['_route' => 'societe_new', '_controller' => 'App\\Controller\\SocieteController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/societe/edit' => [[['_route' => 'societe_edit', '_controller' => 'App\\Controller\\SocieteController::editfront'], null, null, null, false, false, null]],
        '/main' => [[['_route' => 'main', '_controller' => 'App\\Controller\\SujetController::index'], null, null, null, false, false, null]],
        '/user/deconnexion' => [[['_route' => 'deconnecter', '_controller' => 'App\\Controller\\UserController::logout'], null, ['GET' => 0], null, false, false, null]],
        '/user/index/non_filtre' => [[['_route' => 'user_nonfiltre', '_controller' => 'App\\Controller\\UserController::non_filtre'], null, ['GET' => 0], null, false, false, null]],
        '/user/index' => [[['_route' => 'user_index', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, false, false, null]],
        '/HolidayHiatus' => [[['_route' => 'user_inscription', '_controller' => 'App\\Controller\\UserController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/HolidayHiatus/acceuil' => [[['_route' => 'user_online', '_controller' => 'App\\Controller\\UserController::show'], null, ['GET' => 0], null, true, false, null]],
        '/user/profil' => [[['_route' => 'profil', '_controller' => 'App\\Controller\\UserController::profil'], null, null, null, false, false, null]],
        '/user/profil/edit' => [[['_route' => 'editprofil', '_controller' => 'App\\Controller\\UserController::editprofil'], null, null, null, false, false, null]],
        '/user/Desactiver' => [[['_route' => 'Desactiver', '_controller' => 'App\\Controller\\UserController::Desactiver'], null, ['GET' => 0], null, false, false, null]],
        '/user/mailsender' => [[['_route' => 'mailersender', '_controller' => 'App\\Controller\\UserController::mailsender'], null, null, null, false, false, null]],
        '/user/password_backup' => [[['_route' => 'user_password_backup', '_controller' => 'App\\Controller\\UserController::passwordbackup'], null, null, null, false, false, null]],
        '/user/password_backup/key' => [[['_route' => 'user_password_backup_key', '_controller' => 'App\\Controller\\UserController::passwordbackupkey'], null, null, null, false, false, null]],
        '/user/editpassword' => [[['_route' => 'usereditpassword', '_controller' => 'App\\Controller\\UserController::editpassword'], null, null, null, false, false, null]],
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
                .'|/s(?'
                    .'|upprimer(?'
                        .'|Aide/([^/]++)(*:198)'
                        .'|CategorieAide/([^/]++)(*:228)'
                    .')'
                    .'|ociete(?'
                        .'|_demandes/(?'
                            .'|([^/]++)(*:267)'
                            .'|confirmer/([^/]++)(*:293)'
                        .')'
                        .'|/([^/]++)(*:311)'
                    .')'
                .')'
                .'|/modifier(?'
                    .'|Aide/([^/]++)(*:346)'
                    .'|CategorieAide/([^/]++)(*:376)'
                .')'
                .'|/A(?'
                    .'|fficherSujet/([^/]++)(*:411)'
                    .'|jouterSujet/([^/]++)(*:439)'
                .')'
                .'|/user/index/([^/]++)/([^/]++)(*:477)'
                .'|/([^/]++)(?'
                    .'|/edit(*:502)'
                    .'|(*:510)'
                .')'
                .'|/user/(?'
                    .'|ban/([^/]++)(*:540)'
                    .'|restaurer/([^/]++)(*:566)'
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
        198 => [[['_route' => 'supprimerAide', '_controller' => 'App\\Controller\\AideController::SupprimerAide'], ['id'], null, null, false, true, null]],
        228 => [[['_route' => 'supprimerCategorieAide', '_controller' => 'App\\Controller\\CategorieAideController::SupprimerCategorieAide'], ['id'], null, null, false, true, null]],
        267 => [[['_route' => 'societe_show', '_controller' => 'App\\Controller\\SocieteController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        293 => [[['_route' => 'societe_confirmer', '_controller' => 'App\\Controller\\SocieteController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        311 => [[['_route' => 'societe_delete', '_controller' => 'App\\Controller\\SocieteController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        346 => [[['_route' => 'modifierAide', '_controller' => 'App\\Controller\\AideController::modifierAide'], ['id'], null, null, false, true, null]],
        376 => [[['_route' => 'modifierCategorieAide', '_controller' => 'App\\Controller\\CategorieAideController::modifierCategorieAide'], ['id'], null, null, false, true, null]],
        411 => [[['_route' => 'Afficher', '_controller' => 'App\\Controller\\SujetController::afficher'], ['idboard'], null, null, false, true, null]],
        439 => [[['_route' => 'AjouterSujet', '_controller' => 'App\\Controller\\SujetController::AjouterSujet'], ['idboard'], null, null, false, true, null]],
        477 => [[['_route' => 'user_filtre', '_controller' => 'App\\Controller\\UserController::filtre'], ['filtre', 'filtrevalue'], ['GET' => 0], null, false, true, null]],
        502 => [[['_route' => 'user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        510 => [[['_route' => 'user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        540 => [[['_route' => 'ban', '_controller' => 'App\\Controller\\UserController::ban'], ['iduser'], null, null, false, true, null]],
        566 => [
            [['_route' => 'ban_remove', '_controller' => 'App\\Controller\\UserController::restaurer'], ['iduser'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
