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
    'produit_service_panier' => [[], ['_controller' => 'App\\Controller\\CartController::index'], [], [['text', '/produit/service/panier']], [], []],
    'cart_add' => [['id'], ['_controller' => 'App\\Controller\\CartController::add'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/panier/add']], [], []],
    'cart_remove' => [['id'], ['_controller' => 'App\\Controller\\CartController::remove'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/panier/remove']], [], []],
    'categorieAide' => [[], ['_controller' => 'App\\Controller\\CategorieAideController::index'], [], [['text', '/categorieAide']], [], []],
    'categorie' => [[], ['_controller' => 'App\\Controller\\CategorieController::index'], [], [['text', '/categorie']], [], []],
    'category_produit_service' => [[], ['_controller' => 'App\\Controller\\CategoryProduitServiceController::index'], [], [['text', '/category/produit/service']], [], []],
    'category_produit_service_add' => [[], ['_controller' => 'App\\Controller\\CategoryProduitServiceController::addCategoryAction'], [], [['text', '/category/produit/service/new']], [], []],
    'category_produit_service_delete' => [['id'], ['_controller' => 'App\\Controller\\CategoryProduitServiceController::deleteAction'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/category/produit/service/delete']], [], []],
    'category_produit_service_update' => [['id'], ['_controller' => 'App\\Controller\\CategoryProduitServiceController::updateAction'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/category/produit/service/update']], [], []],
    'comptes' => [[], ['_controller' => 'App\\Controller\\ComptesController::index'], [], [['text', '/comptes']], [], []],
    'demande' => [[], ['_controller' => 'App\\Controller\\DemandeController::index'], [], [['text', '/demande']], [], []],
    'index' => [[], ['_controller' => 'App\\Controller\\IndexController::index'], [], [['text', '/index']], [], []],
    'welcome' => [[], ['_controller' => 'App\\Controller\\NavigationContrllerController::index'], [], [['text', '/HolidayHiatus']], [], []],
    'produit_service' => [[], ['_controller' => 'App\\Controller\\ProduitServiceController::index'], [], [['text', '/produit/service']], [], []],
    'produit_service_front' => [[], ['_controller' => 'App\\Controller\\ProduitServiceController::indexx'], [], [['text', '/produit/service/front']], [], []],
    'produit_service_liste' => [[], ['_controller' => 'App\\Controller\\ProduitServiceController::liste'], [], [['text', '/produit/service/liste']], [], []],
    'produit_service_add' => [[], ['_controller' => 'App\\Controller\\ProduitServiceController::addProduitAction'], [], [['text', '/produit/service/new']], [], []],
    'produit_service_delete' => [['id'], ['_controller' => 'App\\Controller\\ProduitServiceController::deleteAction'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/produit/service/delete']], [], []],
    'produit_service_update' => [['id'], ['_controller' => 'App\\Controller\\ProduitServiceController::updateAction'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/produit/service/update']], [], []],
    'main' => [[], ['_controller' => 'App\\Controller\\SujetController::index'], [], [['text', '/main']], [], []],
    'Afficher' => [['idboard'], ['_controller' => 'App\\Controller\\SujetController::afficher'], [], [['variable', '/', '[^/]++', 'idboard'], ['text', '/AfficherSujet']], [], []],
    'AjouterSujet' => [['idboard'], ['_controller' => 'App\\Controller\\SujetController::AjouterSujet'], [], [['variable', '/', '[^/]++', 'idboard'], ['text', '/AjouterSujet']], [], []],
];
