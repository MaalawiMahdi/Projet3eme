/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.MyApplication;
import HolidaysHiatus.tools.Session;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;

/**
 *
 * @author drwhoo
 */
public class HomePageSocieteForm extends Form {

    public HomePageSocieteForm() {
        setTitle("Espace Societé ");
        getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });
        getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });
        getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });

        getToolbar().addMaterialCommandToSideMenu("Consulter les Sujets ", FontImage.MATERIAL_HELP, (event) -> {
            new SujetsSocieteForm(MyApplication.theme, Session.getSession().getConnectedBoard().getId()).show();
        });
        getToolbar().addMaterialCommandToSideMenu("Consulter les Categorie Produit ", FontImage.MATERIAL_CATEGORY, (event) -> {
        });
        getToolbar().addMaterialCommandToSideMenu("Consulter les Produit ", FontImage.MATERIAL_SHOP, (event) -> {
        });

        getToolbar().addMaterialCommandToSideMenu("Quitter l'espace société", FontImage.MATERIAL_LOGOUT, (event) -> {
            new HomePageFrontForm(MyApplication.theme).show();
        });

        getToolbar().addMaterialCommandToOverflowMenu("Se Déconnecter", FontImage.MATERIAL_LOGOUT, (evt) -> {
            Session.getSession().clearSession();
            Form HomaPage = new HomePageFrom(MyApplication.theme);
            HomaPage.show();
        });
    }

}
