<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '\\d+', 'code'], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    'admin' => [[], ['_controller' => 'App\\Controller\\AdminController::index'], [], [['text', '/admin']], [], []],
    'aide' => [[], ['_controller' => 'App\\Controller\\AideController::index'], [], [['text', '/aide']], [], []],
    'AfficherAide' => [[], ['_controller' => 'App\\Controller\\AideController::listAide'], [], [['text', '/AfficherAide']], [], []],
    'ajouterAide' => [[], ['_controller' => 'App\\Controller\\AideController::ajouterAide'], [], [['text', '/ajouterAide']], [], []],
    'supprimerAide' => [['id'], ['_controller' => 'App\\Controller\\AideController::SupprimerAide'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/supprimerAide']], [], []],
    'modifierAide' => [['id'], ['_controller' => 'App\\Controller\\AideController::modifierAide'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/modifierAide']], [], []],
    'upload_test' => [[], ['_controller' => 'App\\Controller\\AideController::temporaryUploadAction'], [], [['text', '/admin/upload/test']], [], []],
    'categorie_aide' => [[], ['_controller' => 'App\\Controller\\CategorieAideController::index'], [], [['text', '/categorie_aide']], [], []],
    'AfficherCategorieAide' => [[], ['_controller' => 'App\\Controller\\CategorieAideController::listCategoriesAide'], [], [['text', '/AfficherCategorieAide']], [], []],
    'ajouterCategorieAide' => [[], ['_controller' => 'App\\Controller\\CategorieAideController::ajouterCategorieAide'], [], [['text', '/ajouterCategorieAide']], [], []],
    'supprimerCategorieAide' => [['id'], ['_controller' => 'App\\Controller\\CategorieAideController::SupprimerCategorieAide'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/supprimerCategorieAide']], [], []],
    'modifierCategorieAide' => [['id'], ['_controller' => 'App\\Controller\\CategorieAideController::modifierCategorieAide'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/modifierCategorieAide']], [], []],
    'categorie' => [[], ['_controller' => 'App\\Controller\\CategorieController::index'], [], [['text', '/categorie']], [], []],
    'comptes' => [[], ['_controller' => 'App\\Controller\\ComptesController::index'], [], [['text', '/comptes']], [], []],
    'demande' => [[], ['_controller' => 'App\\Controller\\DemandeController::index'], [], [['text', '/demande']], [], []],
    'index' => [[], ['_controller' => 'App\\Controller\\IndexController::index'], [], [['text', '/index']], [], []],
    'societe_new' => [['iduser'], ['_controller' => 'App\\Controller\\SocieteController::new'], [], [['variable', '/', '[^/]++', 'iduser'], ['text', '/societe']], [], []],
    'societe_show' => [['id'], ['_controller' => 'App\\Controller\\SocieteController::show'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/societe']], [], []],
    'societe_edit' => [['id'], ['_controller' => 'App\\Controller\\SocieteController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id'], ['text', '/societe']], [], []],
    'societe_delete' => [['id'], ['_controller' => 'App\\Controller\\SocieteController::delete'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/societe']], [], []],
    'main' => [[], ['_controller' => 'App\\Controller\\SujetController::index'], [], [['text', '/main']], [], []],
    'Afficher' => [['idboard'], ['_controller' => 'App\\Controller\\SujetController::afficher'], [], [['variable', '/', '[^/]++', 'idboard'], ['text', '/AfficherSujet']], [], []],
    'AjouterSujet' => [['idboard'], ['_controller' => 'App\\Controller\\SujetController::AjouterSujet'], [], [['variable', '/', '[^/]++', 'idboard'], ['text', '/AjouterSujet']], [], []],
    'user_index' => [[], ['_controller' => 'App\\Controller\\UserController::index'], [], [['text', '/user/index']], [], []],
    'user_inscription' => [[], ['_controller' => 'App\\Controller\\UserController::new'], [], [['text', '/HolidayHiatus']], [], []],
    'user_profil' => [['id'], ['_controller' => 'App\\Controller\\UserController::show'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/HolidayHiatus/acceuil']], [], []],
    'user_edit' => [['id'], ['_controller' => 'App\\Controller\\UserController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id']], [], []],
    'user_delete' => [['id'], ['_controller' => 'App\\Controller\\UserController::delete'], [], [['variable', '/', '[^/]++', 'id']], [], []],
];
