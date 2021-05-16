package HolidaysHiatus.gui;


import HolidaysHiatus.MyApplication;
import HolidaysHiatus.entities.Sujet;
import HolidaysHiatus.services.SujetService;
import HolidaysHiatus.tools.Session;
import com.codename1.ui.Button;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.TextArea;
import com.codename1.ui.TextField;
import com.codename1.ui.util.Resources;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author hp
 */
public class updateSujetForm extends Form{
    private Resources theme;
    int bid,id;
    private TextField tfTitre;
    String titre,desc;

    private TextArea tfDescription;
    private Button update;

    public updateSujetForm(Resources theme,Sujet s) {
        this.theme = theme;
        this.bid = s.getBoard_id();
        this.id = s.getId();
        titre = s.getTitre();
        desc = s.getDescription();
        addGUIs();
        addActions();
          getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> new SujetsSocieteForm(MyApplication.theme, Session.getSession().getConnectedBoard().getId()).show());
     
        getToolbar().addMaterialCommandToOverflowMenu("Se Déconnecter", FontImage.MATERIAL_LOGOUT, (evt) -> {
            Session.getSession().clearSession();
            Form HomaPage = new HomePageFrom(MyApplication.theme);
            HomaPage.show();
        });
    }
    
    private void addGUIs()
    {
        this.getToolbar().addCommandToLeftBar("Retour", null, (evt)->{
            new SujetsSocieteForm(theme,bid).show();
        });
        tfTitre = new TextField(titre);
        tfDescription = new TextArea(desc);

        
        update = new Button("Modifier");
        this.addAll(tfTitre, tfDescription);
        this.add( update);
    }
    
    private void addActions()
    {
        update.addActionListener((evt)->{
            SujetService ss = new SujetService();
            Sujet s1 = new Sujet(id,bid,tfTitre.getText(),tfDescription.getText(),null);
            if(ss.getInstance().updateSujet(s1))
            {
                Dialog.show("Modification", "Le sujet à été bien modifié","OK",null);
            }
        
        });
    }
    
}
