/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import static HolidaysHiatus.MyApplication.theme;
import HolidaysHiatus.services.BoardService;
import HolidaysHiatus.tools.Session;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.util.Resources;

/**
 *
 * @author drwhoo
 */
public class HomePageFrontForm extends Form {
private Resources theme;
    public HomePageFrontForm(Resources theme) {
         
                getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });
        getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });
        getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });

           getToolbar().addMaterialCommandToSideMenu("Consulter les Aides ",FontImage.MATERIAL_HELP, (event) -> {
                new ListCategorieAideForm().show();
            });
           
           getToolbar().addMaterialCommandToSideMenu("Consulter les Boards ",FontImage.MATERIAL_BUSINESS, (event) -> {
                 new FormBoard("Modifier Board",theme,22).show();
            });
        if (Session.getSession().getSessionUser().getType().compareTo("client") == 0) {

            getToolbar().addMaterialCommandToSideMenu("Démarrer un compte Business",FontImage.MATERIAL_BUSINESS, (event) -> {
                Form InscriptionSociete = new InscriptionSocieteForm(theme);
                InscriptionSociete.show();
            });
        } else {
           BoardService SB = new BoardService();
           if(SB.haveAboard(Session.getSession().getSessionSociete().getId())){
           Session.getSession().setConnectedBoard(SB.GetBoardByIdSociete(Session.getSession().getSessionSociete().getId()));
             getToolbar().addMaterialCommandToSideMenu("Consulter Votre Board",FontImage.MATERIAL_BUSINESS, (event) -> {
               new HomePageSocieteForm().show();

            });
           }else{
             getToolbar().addMaterialCommandToSideMenu("Creér Votre Board ",FontImage.MATERIAL_BUSINESS, (event) -> {
               new AjouterBoardForm("Creér Votre Board ",theme).show();
            });
           
           
           }
           
            
           
        }


        //overFlow menu    
        getToolbar().addMaterialCommandToOverflowMenu("Profil", FontImage.MATERIAL_FACE, (evt) -> {

            new ProfilForm(theme).show();

        });

        getToolbar().addMaterialCommandToOverflowMenu("Se Déconnecter", FontImage.MATERIAL_LOGOUT, (evt) -> {
            Session.getSession().clearSession();
            Form HomaPage = new HomePageFrom(theme);
            HomaPage.show();
        });
       
    }

}
