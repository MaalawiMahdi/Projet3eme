package HolidaysHiatus.gui;

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

import HolidaysHiatus.entities.CategorieBoard;
import HolidaysHiatus.services.CategorieBoardService;
import HolidaysHiatus.tools.Session;
import com.codename1.ui.FontImage;

public class FormCatBoard extends Form {
	private Resources theme;
  //  private int Catid;

    public FormCatBoard(String title, Resources theme) {
        super(title, BoxLayout.y());
        this.theme = theme;
//        this.Catid = Catid;
        addGUIs();
        addActions();
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
        getToolbar().addMaterialCommandToSideMenu(" Statistiques Aide", FontImage.MATERIAL_GRAPHIC_EQ, (event) -> {
            new StatAideForm().show();
        });
        getToolbar().addMaterialCommandToSideMenu(" Statistiques catAide", FontImage.MATERIAL_GRAPHIC_EQ, (event) -> {
            new StatCategorieAideForm().show();
        });
        getToolbar().addMaterialCommandToSideMenu("Categorie Boards", FontImage.MATERIAL_CATEGORY, (event) -> {
            FormCatBoard f = new FormCatBoard("Tous les Categories", theme);

            f.show();
        });

        //overFlow menu    
        getToolbar().addMaterialCommandToOverflowMenu("Se Déconnecter", FontImage.MATERIAL_LOGOUT, (evt) -> {
            Session.getSession().clearSession();
            Form HomaPage = new HomePageFrom(theme);
            HomaPage.show();
        });
    }

    private void addGUIs() {
        CategorieBoardService ss = new CategorieBoardService();
        //ArrayList<Sujet> ls = new ArrayList<Sujet>();
        //ls.addAll(ss.getSujetParBoard(boardid));
        EncodedImage placeholder=EncodedImage.createFromImage(theme.getImage("placeholder-image.png"), false);
        String url="http://127.0.0.1:8000/3ac009dd-e930-457f-bff5-f0b53007986f.png";
        Image image=URLImage.createToStorage(placeholder, url, url,URLImage.RESIZE_SCALE_TO_FILL);
        ImageViewer img=new ImageViewer(image);
        Label choix = new Label("Veillier choisir une categorie");
this.add(img).add(choix);
        for (CategorieBoard s : ss.getCategorie() ) {
            this.add(item(s));
        }

    }

    private void addActions() {

    }

    private Container item(CategorieBoard s) {
        Container global = new Container(BoxLayout.y());
        CategorieBoardService ss = new CategorieBoardService();

        
        Label desc = new Label();
        desc.setText("Desc : "+s.getPic());
        Label titre = new Label();
        titre.setText("Titre : "+s.getTitre());
        Button btn = new Button("Supprimer Categorie");
        Button btnm = new Button("Modifier Categorie");

        btn.addActionListener((evt)->{
        	ss.SupprimerCategorieBoard(s);
	    	Dialog.show("Succees", "Votre Categorie a ete supprimer avec succees ", "OK", null);
	    	FormCatBoard f = new FormCatBoard("Tous les Categories",theme);
	        f.show();
        });
        btnm.addActionListener((evt)->{
        	ModifierCategorieForm f = new ModifierCategorieForm("Modifier Categorie",theme,s);
            f.show();

        
        });
        global.addAll(titre,desc,btn,btnm);
        return global;
    }
}
