/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.MyApplication;
import HolidaysHiatus.entities.CategorieAide;
import HolidaysHiatus.services.CategorieAideService;
import static com.codename1.push.PushContent.setTitle;
import com.codename1.components.ImageViewer;
import com.codename1.ui.Button;
import com.codename1.ui.ComboBox;
import com.codename1.ui.Command;
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
import com.codename1.ui.layouts.BorderLayout;
import com.codename1.ui.layouts.BoxLayout;

import java.util.List;

/**
 *
 * @author drwhoo
 */
public class ListCatAideBackForm extends Form {

    Form current;
    private CategorieAideService sv;
    List<CategorieAide> cat;

    public ListCatAideBackForm() {
        current = this;
        sv = new CategorieAideService();

        setTitle("Liste des Categories Aide");
        setLayout(BoxLayout.y());
        Button add = new Button("Ajouter une Categorie Aide");
        cat = sv.getAllCatAides();

        add(add);
        for (int i = 0; i < cat.size(); i++) {
            add(addCatItem(cat.get(i)));
        }
        add.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                EncodedImage enc = EncodedImage.createFromImage(MyApplication.theme.getImage("placeholder-image.png"), false);

                Image img = URLImage.createToStorage(enc, "http://127.0.0.1:8000/uploads/categorie.png", "http://127.0.0.1:8000/uploads/categorie.png");

                ImageViewer image = new ImageViewer(img);
                Label espace = new Label("espace");
                espace.setVisible(false);
                Form f = new Form();
                f.setTitle("Ajouter une Categorie Aide");
                f.setLayout(BoxLayout.y());
                Label lbtitre = new Label("Titre:");
                TextArea titre = new TextArea();
                Button b = new Button("Ajouter");
                f.addAll(espace, image, lbtitre, titre, b);
                f.show();
                f.getToolbar().addCommandToSideMenu(" ", null, (event) -> {
                });
                f.getToolbar().addCommandToSideMenu(" ", null, (event) -> {
                });
                f.getToolbar().addCommandToSideMenu(" ", null, (event) -> {
                });
                f.getToolbar().addMaterialCommandToSideMenu("Categorie Aide", FontImage.MATERIAL_CATEGORY, (event) -> {
                    new ListCatAideBackForm().show();
                });
                f.getToolbar().addMaterialCommandToSideMenu(" Aide", FontImage.MATERIAL_ASSISTANT_DIRECTION, (event) -> {
                    new ListAideBackForm().show();
                });
                b.addActionListener(new ActionListener() {
                    @Override
                    public void actionPerformed(ActionEvent evt) {
                        if (titre.getText().length() == 0) {
                            Dialog.show("Alert", "Veuillez remplir tous les champs.", new Command("OK"));
                        } else {
                            CategorieAideService.getInstance().addCategorieAide(titre.getText());
                            new ListCatAideBackForm().show();
                        }
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

    public Container addCatItem(CategorieAide Categorie) {

        Container holder = new Container(BoxLayout.x());
        Container details = new Container(BoxLayout.y());

        Label lbtitre = new Label(Categorie.getTitre());
        Button Edit = new Button("Modifier");
        Button Dell = new Button("Supprimer");
        Container buttons = new Container(BoxLayout.x());
        buttons.addAll(Edit, Dell);
        Label espace = new Label("espace");
        espace.setVisible(false);
        Label espace2 = new Label("espace");
        espace2.setVisible(false);
        details.addAll(lbtitre, buttons, espace2);

        EncodedImage enc = EncodedImage.createFromImage(MyApplication.theme.getImage("placeholder-image.png"), false).scaledEncoded(200, 200);

        Image img = URLImage.createToStorage(enc, "http://127.0.0.1:8000/uploads/" + Categorie.getLien_icon(), "http://127.0.0.1:8000/uploads/" + Categorie.getLien_icon());

        ImageViewer image = new ImageViewer(img);

        holder.addAll(image, details);

        Dell.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                CategorieAideService.getInstance().deleteCategorieAide(Categorie.getId());
                new ListCatAideBackForm().showBack();
            }
        });
        Edit.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {

                EncodedImage enc = EncodedImage.createFromImage(MyApplication.theme.getImage("placeholder-image.png"), false);

                Image img = URLImage.createToStorage(enc, "http://127.0.0.1:8000/uploads/" + Categorie.getLien_icon(), "http://127.0.0.1:8000/uploads" + Categorie.getLien_icon());

                ImageViewer image = new ImageViewer(img);
                Label espace = new Label("espace");
                espace.setVisible(false);
                Form f = new Form();
                f.setTitle("Modifier une Categorie Aide");
                f.setLayout(BoxLayout.y());
                Label lbtitre = new Label("Titre:");
                TextArea titre = new TextArea(Categorie.getTitre());
                Button b = new Button("Modifier");
                f.addAll(espace, image, lbtitre, titre, b);
                f.show();
                f.getToolbar().addCommandToSideMenu(" ", null, (event) -> {
                });
                f.getToolbar().addCommandToSideMenu(" ", null, (event) -> {
                });
                f.getToolbar().addCommandToSideMenu(" ", null, (event) -> {
                });
                f.getToolbar().addMaterialCommandToSideMenu("Categorie Aide", FontImage.MATERIAL_CATEGORY, (event) -> {
                    new ListCatAideBackForm().show();
                });
                f.getToolbar().addMaterialCommandToSideMenu(" Aide", FontImage.MATERIAL_ASSISTANT_DIRECTION, (event) -> {
                    new ListAideBackForm().show();
                });
                b.addActionListener(new ActionListener() {
                    @Override
                    public void actionPerformed(ActionEvent evt) {
                        CategorieAideService.getInstance().editCategorieAide(Categorie.getId(), titre.getText());
                        new ListCatAideBackForm().show();
                    }
                });
            }
        });
        return holder;
    }

}
