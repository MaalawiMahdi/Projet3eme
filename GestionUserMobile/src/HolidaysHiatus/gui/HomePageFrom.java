/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;

/**
 *
 * @author mahdi
 */
public class HomePageFrom extends Form{
    private Resources theme;

    public HomePageFrom(Resources theme) {
         super(BoxLayout.y());

        this.theme = theme;
        this.setLayout(BoxLayout.y());
           Form f = new InscriptionForm(theme);
    Form f2 = new ConnexionForm(theme);
    this.add(f);
    this.add(f2);

    }
    
}
