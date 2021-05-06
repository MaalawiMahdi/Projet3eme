/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.MyApplication;
import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.entities.CategorieAide;
import HolidaysHiatus.services.AideService;
import HolidaysHiatus.services.CategorieAideService;
import com.codename1.components.ImageViewer;
import com.codename1.components.MultiButton;
import com.codename1.components.SpanLabel;
import com.codename1.ui.Button;
import com.codename1.ui.ComboBox;
import com.codename1.ui.Command;
import com.codename1.ui.Component;
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.TextArea;
import com.codename1.ui.URLImage;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import java.util.List;

/**
 *
 * @author drwhoo
 */
public class ListAideBackForm extends Form{
    
Form current;
    private AideService sv;
    List<Aide> Aide;
      List<CategorieAide> cat;
    private CategorieAideService svCat;
    ComboBox<CategorieAide> ComboCat;
    
    public ListAideBackForm() {
        current = this;
        sv = new AideService();
        svCat = new CategorieAideService();
         cat=svCat.getAllCatAides();
       
        setTitle("Liste des Aides");
        setLayout(BoxLayout.y());
        Button add = new Button("Ajouter une Aide");
         Aide = sv.getAllAidesBack();
         
        add(add);
        for (int i = 0; i < Aide.size(); i++) {
            add(addCatItem(Aide.get(i)));
        }
        add.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                EncodedImage enc = EncodedImage.createFromImage(MyApplication.theme.getImage("placeholder-image.png"), false);

                Image img = URLImage.createToStorage(enc, "http://127.0.0.1:8000/uploads/doctor-1010903_1920-603a6b258fe8c.jpeg", "http://127.0.0.1:8000/uploads/doctor-1010903_1920-603a6b258fe8c.jpeg");

                ImageViewer image = new ImageViewer(img);
                ComboCat=new ComboBox();
                Label lbCat = new Label ("Categorie Aide :");
                for (CategorieAide a : cat ){ComboCat.addItem(a);}
                Label espace = new Label("espace");
                espace.setVisible(false);
                Form f = new Form();
                f.setTitle("Ajouter une Aide");
                f.setLayout(BoxLayout.y());
                Label lbtitre = new Label("Titre:");
                TextArea titre = new TextArea();
                Label lbdescription = new Label("Description:");
                TextArea description = new TextArea();
                Label lbadresse = new Label("Adresse:");
                TextArea adresse = new TextArea();
                Label lbtel = new Label("Telephone:");
                TextArea tel = new TextArea();
                Button b = new Button("Ajouter");
                f.addAll(espace, image, lbtitre, titre,lbCat,ComboCat,lbdescription,description,lbadresse,adresse,lbtel,tel, b);
                f.show();
                f.getToolbar().addCommandToSideMenu(" ", null, (event) -> {});
                f.getToolbar().addCommandToSideMenu(" ", null, (event) -> {});
                f.getToolbar().addCommandToSideMenu(" ", null, (event) -> {});
                f.getToolbar().addMaterialCommandToSideMenu("Categorie Aide", FontImage.MATERIAL_CATEGORY, (event) -> {new ListCatAideBackForm().show();});
                f.getToolbar().addMaterialCommandToSideMenu(" Aide", FontImage.MATERIAL_ASSISTANT_DIRECTION, (event) -> {new ListAideBackForm().show();});
                b.addActionListener(new ActionListener() {
                    @Override
                    public void actionPerformed(ActionEvent evt) {
                         if ((titre.getText().length() == 0) || (description.getText().length() == 0) || (adresse.getText().length()== 0)|| (tel.getText().length() == 0)) {
                    Dialog.show("Alert", "Veuillez remplir tous les champs.", new Command("OK"));
                }
                         else{     AideService.getInstance().addAide(titre.getText(),description.getText(),adresse.getText(),tel.getText(),ComboCat.getSelectedItem().getId());
                        new ListAideBackForm().show();}                        
                    }
                });
            }
        });

        getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });
        getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });
        getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });

        getToolbar().addMaterialCommandToSideMenu("Categorie Aide", FontImage.MATERIAL_CATEGORY, (evt) -> {
            new ListCatAideBackForm().show();
        });
        getToolbar().addMaterialCommandToSideMenu(" Aide", FontImage.MATERIAL_ASSISTANT_DIRECTION, (evt) -> {
            new ListAideBackForm().show();
        });

   
    }

    public Container addCatItem(Aide Aide) {

        Container holder = new Container(BoxLayout.x());
        Container details = new Container(BoxLayout.y());
        SpanLabel lbdescription = new SpanLabel(Aide.getDescription());
        SpanLabel lbadresse = new SpanLabel(Aide.getAdresse());
        Label lbtel = new Label(Aide.getNum_tell());
        SpanLabel lbtitre = new SpanLabel(Aide.getTitre());
        Button Edit = new Button("Modifier");
        Button Dell = new Button("Supprimer");
        Container buttons = new Container(BoxLayout.x());
        buttons.addAll(Edit, Dell);
        Label espace = new Label("espace");
        espace.setVisible(false);
        Label espace2 = new Label("espace");
        espace2.setVisible(false);
        details.addAll(lbtitre,lbdescription,lbadresse,lbtel, buttons, espace2);
       
        EncodedImage enc = EncodedImage.createFromImage(MyApplication.theme.getImage("placeholder-image.png"), false).scaledEncoded(200, 200);

        Image img = URLImage.createToStorage(enc, "http://127.0.0.1:8000/uploads/" + Aide.getLien_image(), "http://127.0.0.1:8000/uploads/" + Aide.getLien_image());

        ImageViewer image = new ImageViewer(img);

        holder.addAll(image, details);

        Dell.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
               AideService.getInstance().deleteAide(Aide.getId());
               new ListAideBackForm().showBack();
            }
        });
        Edit.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                 
                        EncodedImage enc = EncodedImage.createFromImage(MyApplication.theme.getImage("placeholder-image.png"), false);

                Image img = URLImage.createToStorage(enc, "http://127.0.0.1:8000/uploads/"+Aide.getLien_image(), "http://127.0.0.1:8000/uploads/"+Aide.getLien_image());

                ImageViewer image = new ImageViewer(img);
                ComboCat=new ComboBox();
                Label lbCat = new Label ("Categorie Aide :");
                for (CategorieAide a : cat ){ComboCat.addItem(a);}
                Label espace = new Label("espace");
                espace.setVisible(false);
                Form f = new Form();
                f.setTitle("Modifier une Aide");
                f.setLayout(BoxLayout.y());
                  Label lbtitre = new Label("Titre:");
                TextArea titre = new TextArea(Aide.getTitre());
                Label lbdescription = new Label("Description:");
                TextArea description = new TextArea(Aide.getDescription());
                Label lbadresse = new Label("Adresse:");
                TextArea adresse = new TextArea(Aide.getAdresse());
                Label lbtel = new Label("Telephone:");
                TextArea tel = new TextArea(Aide.getNum_tell());
                Button b = new Button("Modifier");
                f.addAll(espace, image, lbtitre, titre,lbCat,ComboCat,lbdescription,description,lbadresse,adresse,lbtel,tel, b);
                f.show();
                f.getToolbar().addCommandToSideMenu(" ", null, (event) -> {});
                f.getToolbar().addCommandToSideMenu(" ", null, (event) -> {});
                f.getToolbar().addCommandToSideMenu(" ", null, (event) -> {});
                f.getToolbar().addMaterialCommandToSideMenu("Categorie Aide", FontImage.MATERIAL_CATEGORY, (event) -> {new ListCatAideBackForm().show();});
                f.getToolbar().addMaterialCommandToSideMenu(" Aide", FontImage.MATERIAL_ASSISTANT_DIRECTION, (event) -> {new ListAideBackForm().show();});
                b.addActionListener(new ActionListener() {
                    @Override
                        public void actionPerformed(ActionEvent evt) {
                         if ((titre.getText().length() == 0) || (description.getText().length() == 0) || (adresse.getText().length()== 0)|| (tel.getText().length() == 0)) {
                    Dialog.show("Alert", "Veuillez remplir tous les champs.", new Command("OK"));
                }
                         else{     AideService.getInstance().updateAide(Aide.getId(),titre.getText(),description.getText(),adresse.getText(),tel.getText(),ComboCat.getSelectedItem().getId());
                        new ListAideBackForm().show();}                         
                    }
                });
            }
        });
        return holder;
    }

}
