/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.InformationsSupplementaires;
import HolidaysHiatus.services.InformationsSupplementairesService;
import HolidaysHiatus.tools.Session;
import com.codename1.components.ImageViewer;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.URLImage;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.layouts.Layout;
import com.codename1.ui.util.Resources;
import com.mycompany.myapp.MyApplication;

/**
 *
 * @author mahdi
 */
public class ProfilForm extends Form {
    private Resources theme;
    private Label email;
    private Label type;
    private Label nom;
    private Label prenom;
    private Label tell;
    private Button Modifier;
    


    public ProfilForm(Resources theme) {
        super(BoxLayout.y());
        this.theme=theme;
        this.setLayout(BoxLayout.xCenter());
        
         AddGUI();
        addaction();

    }

    private void AddGUI() {
       //get Profil data
        InformationsSupplementairesService info = new InformationsSupplementairesService();
        InformationsSupplementaires profildata = info.getProfil(Session.getSession().getSessionUser().getId());
       
       //end Get Profil Data
       //image show
         
            EncodedImage placeHolder = EncodedImage.createFromImage(MyApplication.getTheme().getImage("placeholder-image.png"), false).scaledEncoded(400, 300);
            String url;
            if(profildata.getImage().compareTo("")!=0){
            url = "http://127.0.0.1:8000/profil/" + profildata.getImage();
            }
            else{
             url="http://127.0.0.1:8000/profil/user.png";
                    }
            Image img = URLImage.createToStorage(placeHolder, url, url);
            
            ImageViewer image = new ImageViewer(img);
       //EndImageShow
           
        email=new Label(Session.getSession().getSessionUser().getMail());
        type=new Label(Session.getSession().getSessionUser().getType());
        nom = new Label(profildata.getNom());
        prenom = new Label(profildata.getPrenom());
        tell = new Label(profildata.getTell());
        Container cadre = new Container();
        cadre.setLayout(BoxLayout.y());
        cadre.add(image);
        cadre.add(email);
        Container ligne0 = new Container();
        ligne0.setLayout(BoxLayout.x());
        ligne0.addAll(new Label("type : "),type);
        cadre.add(ligne0);
        
        Container ligne1 = new Container();
        
        ligne1.setLayout(BoxLayout.x());
        
        ligne1.addAll(new Label("nom : "),nom);
        Container ligne2 = new Container();
         ligne2.setLayout(BoxLayout.x());
        ligne2.addAll(new Label("Prenom : "),prenom);
       
        Container ligne3 = new Container();
                ligne3.addAll(new Label("Tell : "),tell);
         Modifier = new Button("modifier");
        cadre.addAll(ligne1,ligne2,ligne3,Modifier);
        
        this.add(cadre);
        this.getToolbar().addCommandToSideMenu("Profil", null, (evt) -> {
        Form Profil = new ProfilForm(theme);
        Profil.show();
        });
        
        if(Session.getSession().getSessionUser().getType().compareTo("client")==0){
            
        this.getToolbar().addCommandToSideMenu("Démarrer avec un compte Business", null, (evt) -> {
        Form InscriptionSociete = new InscriptionSocieteForm(theme);
        InscriptionSociete.show();
        });
        }
        this.getToolbar().addMaterialCommandToSideMenu("Se Déconnecter", FontImage.MATERIAL_LOGOUT, (evt) -> {
        Session.getSession().clearSession();
       Form HomaPage = new HomePageFrom(theme);
      HomaPage.show();
        });
    }

    private void addaction() {
    Modifier.addActionListener( (evt)->{
    Form EditForm = new ProfilEditForm(theme);
    EditForm.show();
    });
    }
    
    
}
