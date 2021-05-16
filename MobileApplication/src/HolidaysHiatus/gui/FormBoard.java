package HolidaysHiatus.gui;

import com.codename1.components.ImageViewer;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.URLImage;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;

import HolidaysHiatus.entities.Board;
import HolidaysHiatus.entities.CategorieBoard;
import HolidaysHiatus.services.BoardService;
import HolidaysHiatus.services.CategorieBoardService;
import HolidaysHiatus.tools.Session;
import com.codename1.ui.FontImage;

public class FormBoard extends Form{
	private Resources theme;
    private int Catid;

    public FormBoard(String title, Resources theme, int Catid) {
        super(title, BoxLayout.y());
        this.theme = theme;
        this.Catid = Catid;
        addGUIs();
        addActions();
    }

    private void addGUIs() {
        CategorieBoardService sc = new CategorieBoardService();

    	BoardService ss = new BoardService();
        /*this.getToolbar().addCommandToLeftBar("Retour",null,(evt)->{
        	
        	  FormCatBoard f = new FormCatBoard("Categorie Boards",theme);
              f.show();});*/
        for (CategorieBoard s : sc.getCategorie()){
        	this.getToolbar().addCommandToLeftBar(s.getTitre() ,null,(evt)->{
        	      FormBoard f = new FormBoard("Boards",theme,s.getId());
                  f.show();
                  
              

 });
        }
        
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
              BoardService SB = new BoardService();
           if(SB.haveAboard(Session.getSession().getSessionSociete().getId())){
           Session.getSession().setConnectedBoard(SB.GetBoardByIdSociete(Session.getSession().getSessionSociete().getId()));
             getToolbar().addMaterialCommandToSideMenu("Consulter Votre Board",FontImage.MATERIAL_BUSINESS, (event) -> {
                new HomePageSocieteForm().show();

            });
           }else{
             getToolbar().addMaterialCommandToSideMenu("Creér Votre Board ",FontImage.MATERIAL_BUSINESS, (event) -> {
               new AjouterBoardForm("Creér Votre Board ",theme).show();
            });}
        }


        //overFlow menu    
        getToolbar().addMaterialCommandToOverflowMenu("Profil", FontImage.MATERIAL_FACE, (evt) -> {

            new ProfilForm(theme).show();

        });

        getToolbar().addMaterialCommandToOverflowMenu("Se Déconnecter", FontImage.MATERIAL_LOGOUT, (evt) -> {
            Session.getSession().clearSession();
            Form HomaPage = new HomePageFrom(theme);
            HomaPage.show();
        });
       
        //ArrayList<Sujet> ls = new ArrayList<Sujet>();
        //ls.addAll(ss.getSujetParBoard(boardid));
        
        for (Board s : ss.getBoardParCategorie(Catid) ) {
            this.add(item(s));
        }
        Button btn = new Button("Statistique");

        btn.addActionListener((evt)->{
            Piechart p=new Piechart("Statistique",theme); 

        
        });
this.add(btn);
    }

    private void addActions() {

    }

    private Container item(Board s) {
        Container global = new Container(BoxLayout.y());
        EncodedImage placeholder = EncodedImage.createFromImage(theme.getImage("placeholder-image.png"), false);
        String url = "http://127.0.0.1:8000/"+ s.getPic();
        Image image = URLImage.createToStorage(placeholder, url, url, URLImage.RESIZE_SCALE);
        ImageViewer img = new ImageViewer(image);
        Label titre = new Label();
        titre.setText("Titre : "+s.getTitre());
        Button btn = new Button("Get More Info ");
        
        btn.addActionListener((evt)->{
            new SujetsForm(theme,s.getId()).show();

        
        });
        global.addAll(img, titre,btn);
        return global;
    }
}
