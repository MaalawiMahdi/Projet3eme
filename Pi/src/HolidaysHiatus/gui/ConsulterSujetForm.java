/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Commentaire;
import HolidaysHiatus.entities.Sujet;
import HolidaysHiatus.services.CommentaireService;
import com.codename1.components.ImageViewer;
import com.codename1.messaging.Message;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.Display;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.TextField;
import com.codename1.ui.URLImage;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;

/**
 *
 * @author hp
 */
public class ConsulterSujetForm extends Form {

    private Resources theme;
    int id, bid;
    String titreSujet, description, lien;
    int usd = 2;
    private TextField tfCom;
    private Button btn_v;
    private Button btn_valider;
    private Button Signaler;

    CommentaireService cs = new CommentaireService();

    public ConsulterSujetForm(Resources theme, Sujet s) {
        this.setLayout(BoxLayout.y());
        this.theme = theme;
        this.id = s.getId();
        this.bid = s.getBoard_id();
        this.titreSujet = s.getTitre();
        this.description = s.getDescription();
        this.lien = s.getLien_image();
        addGUIs();
        addActions();
    }

    private void addGUIs() {
        Signaler = new Button("Signaler");
        Container global = new Container(BoxLayout.y());
        EncodedImage placeholder = EncodedImage.createFromImage(theme.getImage("load.png"), false);
        String url = "http://localhost/public/im/" + lien;
        Image image = URLImage.createToStorage(placeholder, url, url, URLImage.RESIZE_SCALE);
        ImageViewer img = new ImageViewer(image);
        Label titre = new Label();
        titre.setText("Titre : " + titreSujet);
        Label desc = new Label();
        desc.setText("Description : " + description);
        this.getToolbar().addCommandToLeftBar("Retour", null, (evt) -> {
            new SujetsForm("Les Sujets", theme, bid).show();
        });
        global.addAll(img, titre, desc);
        this.add(global);
                this.add(Signaler);

        CommentaireService cs = new CommentaireService();
        //ArrayList<Sujet> ls = new ArrayList<Sujet>();
        //ls.addAll(ss.getSujetParBoard(boardid));
        tfCom = new TextField(null, "Votre commentaire içi");
        btn_v = new Button("Commenter");
        btn_valider = new Button("Valider Modification");
        btn_valider.setVisible(false);
        this.addAll(tfCom, btn_v, btn_valider);
        Container cmnts = new Container(BoxLayout.y());
        this.add(new Label("----- Les Commentaires ----- \n"));
        for (Commentaire c : cs.getCommentaireParSujet(id)) {
            Label mailUser = new Label(c.getUser_mail() + " :");
            Label cmntUser = new Label("  " + c.getCom());
            cmnts.addAll(mailUser, cmntUser);
            if (c.getUser_id() == usd) {
                Container ctb = new Container(BoxLayout.x());
                Button btn_supp = new Button("Supprimer");
                Button btn_mod = new Button("Modifier");
                ctb.addAll(btn_supp, btn_mod);
                cmnts.add(ctb);
                btn_supp.addActionListener((evt) -> {
                    if (cs.getInstance().deleteCmnt(c)) {
                        Sujet s = new Sujet(this.id, this.bid, this.titreSujet, this.description, this.lien);
                        new ConsulterSujetForm(theme, s).show();
                        Dialog.show("Commentaire", "Votre Commentaire a été bien supprimé", "OK", null);

                    }
                });
                btn_mod.addActionListener((evt) -> {
                    tfCom.setText(c.getCom());
                    btn_valider.setVisible(true);
                    btn_valider.addActionListener((evt2) -> {
                        c.setCom(tfCom.getText());
                        if (cs.getInstance().updateCmnt(c)) {
                            Sujet s = new Sujet(this.id, this.bid, this.titreSujet, this.description, this.lien);
                            new ConsulterSujetForm(theme, s).show();
                            Dialog.show("Commentaire", "Votre Commentaire a été bien modifié", "OK", null);

                        }
                    });
                });
            }
        }
        this.add(cmnts);

    }

    private void addActions() {
        btn_v.addActionListener((evt) -> {
            Commentaire c = new Commentaire(usd, id, tfCom.getText());
            if (cs.getInstance().addCmnt(c)) {
                /*
                for (Commentaire v : cs.getCommentaireParSujet(id)) {
                    if ((v.getUser_id() != (c.getUser_id())))
                    {
                    Message m = new Message("Body of message");
                    Display.getInstance().sendMessage(new String[]{"recipeint mail"}, "Subject of message", m);
                    
                        
                    }
                }*/
                Dialog.show("Commentaire", "Votre Commentaire a été bien ajouté", "OK", null);
                Sujet s = new Sujet(this.id, this.bid, this.titreSujet, this.description, this.lien);
                new ConsulterSujetForm(theme, s).show();
            }
        });
        Signaler.addActionListener((evt2) -> {
            Message m = new Message("Madame, Monsieur,\n"
                    + "\n"
                    + "Je souhaite, par la présente, vous informer de mon mécontentement au sujet " + titreSujet + ", je me suis en effet rendu dans votre application et j’ai consulter le sujet cité et je trouve que ");
            Display.getInstance().sendMessage(new String[]{"holidayhiatuspidev@gmail.com"}, "Problème", m);
        });
    }

}
