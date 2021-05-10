/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Sujet;
import HolidaysHiatus.services.SujetService;
import com.codename1.components.ImageViewer;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.EncodedImage;
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

    public SujetsForm(String title, Resources theme, int boardid) {
        super(title, BoxLayout.y());
        this.theme = theme;
        this.boardid = boardid;
        addGUIs();
        addActions();
    }

    private void addGUIs() {
        SujetService ss = new SujetService();
        //ArrayList<Sujet> ls = new ArrayList<Sujet>();
        //ls.addAll(ss.getSujetParBoard(boardid));
        for (Sujet s : ss.getSujetParBoard(boardid) ) {
            this.add(item(s));
        }

    }

    private void addActions() {

    }

    private Container item(Sujet s) {
        Container global = new Container(BoxLayout.y());
        EncodedImage placeholder = EncodedImage.createFromImage(theme.getImage("load.png"), false);
        String url = "http://localhost/public/im/"+ s.getLien_image();
        Image image = URLImage.createToStorage(placeholder, url, url, URLImage.RESIZE_SCALE);
        ImageViewer img = new ImageViewer(image);
        Label titre = new Label();
        titre.setText("Titre : "+s.getTitre());
        Label desc = new Label();
        desc.setText("Description : "+s.getDescription());
        Button btn = new Button("Consulter");
        btn.addActionListener((evt)->{
        new ConsulterSujetForm(theme,s).show();
        });
        global.addAll(img, titre, desc,btn);
        return global;
    }

}
