/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.MyApplication;
import HolidaysHiatus.entities.Sujet;
import HolidaysHiatus.services.SujetService;
import HolidaysHiatus.tools.Session;
import com.codename1.ui.Button;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.TextArea;
import com.codename1.ui.TextField;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;

/**
 *
 * @author hp
 */
public class addSujetForm extends Form {

    private Resources theme;
    int bid;
    private TextField tfTitre;

    private TextArea tfDescription;
    private Button add;

    public addSujetForm(Resources theme, int bid) {
        super(BoxLayout.y());
        this.theme = theme;
        this.bid = bid;
        AddGUIs();
        AddActions();
             getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> new SujetsSocieteForm(MyApplication.theme, Session.getSession().getConnectedBoard().getId()).show());
     
        getToolbar().addMaterialCommandToOverflowMenu("Se Déconnecter", FontImage.MATERIAL_LOGOUT, (evt) -> {
            Session.getSession().clearSession();
            Form HomaPage = new HomePageFrom(MyApplication.theme);
            HomaPage.show();
        });
    }

    private void AddGUIs() {
        tfTitre = new TextField(null, "Titre");
        tfDescription = new TextArea("Description");

        add = new Button("Ajouter");
        this.addAll(tfTitre, tfDescription, add);
    }

    private void AddActions() {
        add.addActionListener((evt) -> {
            if (tfTitre.getText().equals("")) {
                Dialog.show("Alert", "Le titre ne peut pas etre vide", "Cancel", null);
            } else if (tfDescription.getText().length() < 15) {
                Dialog.show("Alert", "La description doit contenir au moins 15 caracteres", "Cancel", null);

            } else {
                SujetService ss = new SujetService();
                Sujet s = new Sujet(bid, tfTitre.getText(), tfDescription.getText(), null);
                if (ss.getInstance().addSujet(s)) {
                    Dialog.show("Ajout", "Le sujet à été ajouté avec succées", "Ok", null);
                    new SujetsSocieteForm(theme, bid).show();
                }

            }

        });

    }

}
