/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import com.codename1.ui.Button;
import com.codename1.ui.Dialog;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;

/**
 *
 * @author mahdi
 */
public class HomePageFrom extends Form{
    private Resources theme;
    private Button InscriptionViaFacebook;
    private Button ConnexionViaFacebook;

    public HomePageFrom(Resources theme) {
         
         super(BoxLayout.y());

        this.theme = theme;
        this.setLayout(BoxLayout.y());
        InscriptionViaFacebook = new Button("S'inscrire via facebook");
        ConnexionViaFacebook = new Button ("Se connecter Via facebook");
        
           Form f = new InscriptionForm(theme);
    Form f2 = new ConnexionForm(theme);
    this.add(f);
    this.add(InscriptionViaFacebook);
    this.add(f2);
        this.add(ConnexionViaFacebook);

    addAction();
    }
    public void addAction(){
    InscriptionViaFacebook.addActionListener((evt)->
    {
    FaceBookForm face= new FaceBookForm(theme,"inscription");
    face.show();
    });
    ConnexionViaFacebook.addActionListener((evt)->{
    FaceBookForm face= new FaceBookForm(theme,"connexion");
    face.show();
    
    });
    
    
    }
    
}
