/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Sujet;
import HolidaysHiatus.services.BoardService;
import HolidaysHiatus.services.SujetService;
import HolidaysHiatus.tools.Session;
import com.codename1.components.ImageViewer;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.URLImage;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.layouts.Layout;
import com.codename1.ui.util.Resources;
import java.util.ArrayList;

/**
 *
 * @author hp
 */
public class SujetsForm extends Form {

    private Resources theme;
    private int boardid;

    public SujetsForm(Resources theme, int boardid) {
        super(BoxLayout.y());
        this.theme = theme;
        this.boardid = boardid;
        addGUIs();
        addActions();
        getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });
        getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });
        getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });

        getToolbar().addMaterialCommandToSideMenu("Consulter les Aides ", FontImage.MATERIAL_HELP, (event) -> {
            new ListCategorieAideForm().show();
        });

        getToolbar().addMaterialCommandToSideMenu("Consulter les Boards ", FontImage.MATERIAL_BUSINESS, (event) -> {
            new FormBoard("Modifier Board", theme, 22).show();
        });
        if (Session.getSession().getSessionUser().getType().compareTo("client") == 0) {

            getToolbar().addMaterialCommandToSideMenu("Démarrer un compte Business", FontImage.MATERIAL_BUSINESS, (event) -> {
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
            });}
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

    private void addGUIs() {
        SujetService ss = new SujetService();
        //ArrayList<Sujet> ls = new ArrayList<Sujet>();
        //ls.addAll(ss.getSujetParBoard(boardid));
        for (Sujet s : ss.getSujetParBoard(boardid)) {
            this.add(item(s));
        }

    }

    private void addActions() {

    }

    private Container item(Sujet s) {
        Container global = new Container(BoxLayout.y());
        EncodedImage placeholder = EncodedImage.createFromImage(theme.getImage("placeholder-image.png"), false);
        String url = "http://127.0.0.1:8000/im/" + s.getLien_image();
        Image image = URLImage.createToStorage(placeholder, url, url, URLImage.RESIZE_SCALE);
        ImageViewer img = new ImageViewer(image);
        Label titre = new Label();
        titre.setText("Titre : " + s.getTitre());
        Label desc = new Label();
        desc.setText("Description : " + s.getDescription());
        Button btn = new Button("Consulter");
        btn.addActionListener((evt) -> {
            new ConsulterSujetForm(theme, s).show();
        });
        global.addAll(img, titre, desc, btn);
        return global;
    }

}
