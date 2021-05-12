/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.tools.Session;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.util.Resources;

/**
 *
 * @author drwhoo
 */
public class HomePageBackForm extends Form {

    private Resources theme;

    public HomePageBackForm(Resources theme) {

        getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });
        getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });
        getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });

        getToolbar().addMaterialCommandToSideMenu("Categorie Aide", FontImage.MATERIAL_CATEGORY, (evt) -> {
            new ListCatAideBackForm().show();
        });
        getToolbar().addMaterialCommandToSideMenu(" Aide", FontImage.MATERIAL_ASSISTANT_DIRECTION, (evt) -> {
            new ListAideBackForm().show();
        });
        getToolbar().addMaterialCommandToSideMenu(" Statistiques Aide", FontImage.MATERIAL_GRAPHIC_EQ, (event) -> {
            new StatAideForm().show();
        });
        getToolbar().addMaterialCommandToSideMenu(" Statistiques catAide", FontImage.MATERIAL_GRAPHIC_EQ, (event) -> {
            new StatCategorieAideForm().show();
        });
        getToolbar().addMaterialCommandToSideMenu("Categorie Boards", FontImage.MATERIAL_CATEGORY, (event) -> {
            FormCatBoard f = new FormCatBoard("Tous les Categories", theme);

            f.show();
        });

        //overFlow menu    
        getToolbar().addMaterialCommandToOverflowMenu("Se Déconnecter", FontImage.MATERIAL_LOGOUT, (evt) -> {
            Session.getSession().clearSession();
            Form HomaPage = new HomePageFrom(theme);
            HomaPage.show();
        });

    }

}
