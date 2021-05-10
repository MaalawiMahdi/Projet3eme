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
import com.codename1.ui.Dialog;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.URLImage;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;

/**
 *
 * @author hp
 */
public class SujetsSocieteForm extends Form {

    private Resources theme;
    private int boardid;
    private Button btn_ajt;
    SujetService ss = new SujetService();

    public SujetsSocieteForm(Resources theme, int boardid) {
        super(BoxLayout.y());

        this.theme = theme;
        this.boardid = boardid;
        addGUIs();
        addActions();
    }

    private void addGUIs() {
        btn_ajt = new Button("Ajouter un sujet");
        this.add(btn_ajt);

        SujetService ss = new SujetService();
        for (Sujet s : ss.getSujetParBoard(boardid)) {
            this.add(item(s));
        }

    }

    private void addActions() {
        btn_ajt.addActionListener((evt) -> {
            new addSujetForm(theme, boardid).show();
        });
    }

    private Container item(Sujet s) {
        Container global = new Container(BoxLayout.x());
        EncodedImage placeholder = EncodedImage.createFromImage(theme.getImage("load.png"), false);
        String url = "http://localhost/public/im/" + s.getLien_image();
        Image image = URLImage.createToStorage(placeholder, url, url, URLImage.RESIZE_SCALE);
        ImageViewer img = new ImageViewer(image);
        Label titre = new Label();
        titre.setText("Titre : " + s.getTitre());
        Label desc = new Label();
        desc.setText("Description : " + s.getDescription());
        Container c2 = new Container(BoxLayout.x());
        Button btn = new Button("Modifier");
        Button btn2 = new Button("Supprimer");
        c2.addAll(btn, btn2);

        btn.addActionListener((evt) -> {
            new updateSujetForm(theme,s).show();
        });
        btn2.addActionListener((evt2) -> {
            if(ss.getInstance().deleteSujet(s))
            {
                Dialog.show("Suppression","Le sujet à été supprimé avec succées", "OK",null);
                new SujetsSocieteForm(theme,boardid).show();
            }
        });

        Container global2 = new Container(BoxLayout.y());        
        global2.addAll(titre,desc,c2);
        global.addAll(img,global2);
        return global;
    }

}
