/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.tools.Session;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;

/**
 *
 * @author mahdi
 */
public class InscriptionSocieteForm extends Form {
    private Resources theme;

    public InscriptionSocieteForm(Resources theme) {
        super(BoxLayout.y());
        this.theme=theme;
                this.setLayout(BoxLayout.y());
         AddGUI();
        addaction();

    }

    private void AddGUI() {
         this.getToolbar().addCommandToSideMenu("Profil", null, (evt) -> {
        Form Profil = new ProfilForm(theme);
        Profil.show();
        });
        if(Session.getSession().getSessionUser().getType().compareTo("client")==0){
        this.getToolbar().addCommandToSideMenu("Démarrer avec un compte Business", null, (evt) -> {
        Form InscriptionSociete = new InscriptionSocieteForm(theme);
        InscriptionSociete.show();
        });
        }
        this.getToolbar().addCommandToSideMenu("Se Déconnecter", null, (evt) -> {
        Session.getSession().clearSession();
       Form HomaPage = new HomePageFrom(theme);
      HomaPage.show();
        });
    }

    private void addaction() {
    }
}
