/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.User;
import HolidaysHiatus.entities.InformationsSupplementaires;
import HolidaysHiatus.entities.Societe;

import HolidaysHiatus.services.InformationsSupplementairesService;
import HolidaysHiatus.services.SocieteService;
import HolidaysHiatus.services.UserService;

import HolidaysHiatus.tools.Session;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.Form;
import com.codename1.ui.TextField;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;
import org.apache.commons.validator.routines.EmailValidator;

/**
 *
 * @author mahdi
 */
public class ConnexionForm extends Form {

    private TextField Email;
    private TextField Password;
    private Button Connexion;
    private Resources theme;

    public ConnexionForm(Resources theme) {
        super(BoxLayout.y());
        setTitle("Connexion");
        this.theme = theme;
        this.setLayout(BoxLayout.y());
        AddGUI();
        addaction();

    }

    private void AddGUI() {
        Email = new TextField("", "Email");
        Password = new TextField("", "Mot de passe", 20, TextField.PASSWORD);
        Connexion = new Button("Se Connecter");

        Container ct = new Container(BoxLayout.y());
        ct.addAll(Email, Password, Connexion);
        this.add(ct);

    }

    private void addaction() {
        UserService us = new UserService();

        EmailValidator validator = EmailValidator.getInstance();
        Connexion.addActionListener((evt) -> {
            if (Email.getText().compareTo("") == 0 || Password.getText().compareTo("") == 0) {

                Dialog.show("un ou plusieurs champs sont manquants ", "les champs e-mail et mot de passe sont obligatoires !", "ok", null);

            } else if (us.isExiste(Email.getText()) == false) {
                Dialog.show("compte introuvable", "votre adresse mail est introuvable,merci de remplir notre formulaire d'inscription ", "ok", null);
                Email.clear();
            } else {
                String cnxResultat = us.connect(Email.getText(), Password.getText());
                if (cnxResultat.compareTo("falsePassword") == 0) {
                    Dialog.show("compte introuvable", "mot de passe incorrect", "ok", null);
                } else if (cnxResultat.compareTo("banned") == 0) {
                    Dialog.show("Vous avez été banni", "", "ok", null);

                } else {
                    Dialog.show("Welcome", "", "ok", null);
                    Session.StartSession();
                    Session.getSession().SetSessionUser(us.getUser(Email.getText()));
                    System.out.print(Session.getSession().getSessionUser());
                    if (Session.getSession().getSessionUser().getType().compareTo("client") == 0 || Session.getSession().getSessionUser().getType().compareTo("societe") == 0) {
                      new HomePageFrontForm(theme).show();
                    } else {//cnx admin
                                  new HomePageBackForm(theme).show();

                    }

                }
            }

        });
    }

}
