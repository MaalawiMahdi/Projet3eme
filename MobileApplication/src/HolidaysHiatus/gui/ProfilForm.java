/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.InformationsSupplementaires;
import HolidaysHiatus.services.InformationsSupplementairesService;
import HolidaysHiatus.tools.Session;
import com.codename1.components.ImageViewer;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.URLImage;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.layouts.Layout;
import com.codename1.ui.util.Resources;
import HolidaysHiatus.MyApplication;
import HolidaysHiatus.services.BoardService;

/**
 *
 * @author mahdi
 */
public class ProfilForm extends Form {

    private Resources theme;
    private Label email;
    private Label type;
    private Label nom;
    private Label prenom;
    private Label tell;
    private Button Modifier;

    public ProfilForm(Resources theme) {
        super(BoxLayout.y());
        this.theme = theme;
        this.setLayout(BoxLayout.xCenter());

        AddGUI();
        addaction();

    }

    private void AddGUI() {
        //get Profil data
        InformationsSupplementairesService info = new InformationsSupplementairesService();
        InformationsSupplementaires profildata = info.getProfil(Session.getSession().getSessionUser().getId());

        //end Get Profil Data
        //image show
        EncodedImage placeHolder = EncodedImage.createFromImage(MyApplication.theme.getImage("placeholder-image.png"), false).scaledEncoded(400, 300);
        String url;
        if (profildata.getImage().compareTo("") != 0) {
            if (profildata.getImage().contains("https://graph.facebook.com/")) {
                String nomfile = Session.getSession().getSessionUser().getMail() + "profile_image.jpg";
                URLImage background = URLImage.createToStorage(placeHolder, nomfile, profildata.getImage());
                background.fetch();
                url = nomfile;
            } else {
                url = "http://127.0.0.1:8000/profil/" + profildata.getImage();
            }
        } else {
            url = "http://127.0.0.1:8000/profil/user.png";
        }
        Image img = URLImage.createToStorage(placeHolder, url, url);

        ImageViewer image = new ImageViewer(img);
        //EndImageShow

        email = new Label(Session.getSession().getSessionUser().getMail());
        type = new Label(Session.getSession().getSessionUser().getType());
        nom = new Label(profildata.getNom());
        prenom = new Label(profildata.getPrenom());
        tell = new Label(profildata.getTell());
        Container cadre = new Container();
        cadre.setLayout(BoxLayout.y());
        cadre.add(image);
        cadre.add(email);
        Container ligne0 = new Container();
        ligne0.setLayout(BoxLayout.x());
        ligne0.addAll(new Label("type : "), type);
        cadre.add(ligne0);

        Container ligne1 = new Container();

        ligne1.setLayout(BoxLayout.x());

        ligne1.addAll(new Label("nom : "), nom);
        Container ligne2 = new Container();
        ligne2.setLayout(BoxLayout.x());
        ligne2.addAll(new Label("Prenom : "), prenom);

        Container ligne3 = new Container();
        ligne3.addAll(new Label("Tell : "), tell);
        Modifier = new Button("modifier");
        cadre.addAll(ligne1, ligne2, ligne3, Modifier);

        this.add(cadre);
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

    private void addaction() {
        Modifier.addActionListener((evt) -> {
            Form EditForm = new ProfilEditForm(theme);
            EditForm.show();
        });
    }

}
