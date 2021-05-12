/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;


import HolidaysHiatus.entities.InformationsSupplementaires;
import HolidaysHiatus.services.InformationsSupplementairesService;
import HolidaysHiatus.services.UserService;
import HolidaysHiatus.tools.Session;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.TextField;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;
import org.apache.commons.validator.routines.EmailValidator;

/**
 *
 * @author mahdi
 */
public class ProfilEditForm extends Form {

    private Resources theme;
    private TextField email;
    private TextField password;
    private Label type;
    private TextField nom;
    private TextField prenom;
    private TextField tell;
    private Button Modifier;

    public ProfilEditForm(Resources theme) {
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
        email = new TextField(Session.getSession().getSessionUser().getMail(), "Mail");

        type = new Label(Session.getSession().getSessionUser().getType());
        password = new TextField("", "Password");
        nom = new TextField(profildata.getNom(), "Nom ");
        prenom = new TextField(profildata.getPrenom(), "Prenom ");
        tell = new TextField(profildata.getTell(), "tell ");
        Container cadre = new Container();
        cadre.setLayout(BoxLayout.y());
        cadre.add(email);
        cadre.add(password);
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
        ligne3.setLayout(BoxLayout.x());
        ligne3.addAll(new Label("Tell : "), tell);
        Modifier = new Button("modifier");
        cadre.addAll(ligne1, ligne2, ligne3, Modifier);

        this.add(cadre);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> new ProfilForm(theme).showBack());

    }

    private void addaction() {
        EmailValidator validator = EmailValidator.getInstance();
        Modifier.addActionListener((evt) -> {
            if (email.getText().compareTo("") == 0 || password.getText().compareTo("") == 0) {

                Dialog.show("un ou plusieurs champs sont manquants ", "les champs e-mail et mot de passe sont obligatoires !", "ok", null);

            } else if (validator.isValid(email.getText()) == false) {

                Dialog.show("Adresse mail non valid", "Adresse mail non valid", "ok", null);
                email.clear();
            }else{
           UserService us = new UserService();
           us.update(Session.getSession().getSessionUser().getId(),email.getText(),password.getText());
           InformationsSupplementairesService infoService = new InformationsSupplementairesService();
           infoService.update(Session.getSession().getSessionUser().getId(),nom.getText(),prenom.getText(),tell.getText());
           Session.getSession().SetSessionUser(us.getUser(Session.getSession().getSessionUser().getId()));
           System.out.print("session user "+ Session.getSession().getSessionUser());
           Form Profil = new ProfilForm(theme);
           Profil.show();
            }
        });
    }

}
