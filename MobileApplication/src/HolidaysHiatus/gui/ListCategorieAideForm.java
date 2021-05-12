/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.MyApplication;
import static HolidaysHiatus.MyApplication.theme;
import HolidaysHiatus.entities.CategorieAide;
import HolidaysHiatus.services.CategorieAideService;
import HolidaysHiatus.tools.Session;
import com.codename1.components.ImageViewer;
import com.codename1.components.SpanLabel;
import static com.codename1.push.PushContent.setTitle;
import com.codename1.social.Login;
import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Component;
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.TextField;
import com.codename1.ui.URLImage;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.layouts.FlowLayout;
import com.codename1.ui.list.ContainerList;
import com.codename1.ui.list.ListModel;
import com.codename1.ui.util.Resources;

import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author drwhoo
 */
public class ListCategorieAideForm extends Form {

    Form current;
    private List list;
    private ContainerList listContainer;
    private int iduser;

    public ListCategorieAideForm() {
        this.iduser = Session.getSession().getSessionUser().getId();
        setTitle("Liste des Categories Aide");
        // SpanLabel sp = new SpanLabel();
        listContainer = GetCategorieAide();
        listContainer.setLayout(BoxLayout.y());
        listContainer.setScrollableY(false);
        listContainer.setScrollVisible(true);

        //sp.setText(ServiceIngredient.getInstance().getAllIngredients().toString());
        add(listContainer);

      
                getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });
        getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });
        getToolbar().addCommandToSideMenu(" ", null, (evt) -> {
        });

           getToolbar().addMaterialCommandToSideMenu("Consulter les Aides ",FontImage.MATERIAL_HELP, (event) -> {
                new ListCategorieAideForm().show();
            });
                getToolbar().addMaterialCommandToSideMenu("Consulter les Boards ",FontImage.MATERIAL_BUSINESS, (event) -> {
                 new FormBoard("Modifier Board",theme,22).show();
            });

        if (Session.getSession().getSessionUser().getType().compareTo("client") == 0) {

            getToolbar().addMaterialCommandToSideMenu("Démarrer un compte Business",FontImage.MATERIAL_BUSINESS, (event) -> {
                Form InscriptionSociete = new InscriptionSocieteForm(theme);
                InscriptionSociete.show();
            });
        } else {
            //5alaha lya 
        }


        //overFlow menu 
        getToolbar().addMaterialCommandToOverflowMenu("Profil", FontImage.MATERIAL_FACE, (event) -> {

            new ProfilForm(theme).show();

        });
        getToolbar().addMaterialCommandToOverflowMenu("Se Déconnecter", FontImage.MATERIAL_LOGOUT, (event) -> {
            Session.getSession().clearSession();
            Form HomaPage = new HomePageFrom(theme);
            HomaPage.show();
        });

    }

    public ContainerList GetCategorieAide() {

        ContainerList list2 = new ContainerList();
        CategorieAideService categorie = new CategorieAideService();
        for (CategorieAide c : categorie.getAllCatAides()) {

            Container container = new Container(BoxLayout.y());
            Container c_titre = new Container(BoxLayout.x());
            c_titre.add(new Label("   "));

            c_titre.add(new Label("titre :"));
            c_titre.add(new Label(c.getTitre()));
            Container c_id = new Container(BoxLayout.x());
            c_id.add(new Label("id :"));
            c_id.add(new Label(Integer.toString(c.getId())));

            c_id.setVisible(false);

            Container espace = new Container(BoxLayout.x());
            espace.add(new Label("id :"));
            espace.add(new Label(Integer.toString(c.getId())));
            espace.setVisible(false);

            EncodedImage placeHolder = EncodedImage.createFromImage(MyApplication.theme.getImage("placeholder-image.png"), false).scaledEncoded(400, 300);

            String url = "http://127.0.0.1:8000/uploads/" + c.getLien_icon();
            Image img = URLImage.createToStorage(placeHolder, url, url);

            ImageViewer image = new ImageViewer(img);
            image.stripMarginAndPadding();

            Button bouton = new Button("   Consulter ");
            container.addAll(image, c_titre, bouton, espace);

            list2.add(container);

            bouton.addActionListener(new ActionListener() {

                @Override
                public void actionPerformed(ActionEvent evt) {
                    new ListAideForm(c.getId(), iduser).show();

                }

            });

        };
        return list2;

    }

}
