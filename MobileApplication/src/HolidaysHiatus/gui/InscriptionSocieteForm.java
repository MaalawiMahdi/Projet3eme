/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Societe;
import HolidaysHiatus.services.SocieteService;
import HolidaysHiatus.tools.Session;
import com.codename1.components.SpanLabel;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.TextField;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;

/**
 *
 * @author mahdi
 */
public class InscriptionSocieteForm extends Form {
    private SpanLabel Message;
    private TextField nom;
    private TextField numregistre;
    private TextField adresse;
    private TextField type;
private Button inscription;
private Button modifier;
    private Resources theme;
   

    public InscriptionSocieteForm(Resources theme) {
        super(BoxLayout.y());
        this.theme=theme;
                this.setLayout(BoxLayout.y());
         AddGUI();
        addaction();

    }

    private void AddGUI() {
        SocieteService S_Service = new SocieteService();
                        modifier = new Button("Modifier");
        inscription = new Button("S'inscrire");

        if(S_Service.isExiste(Session.getSession().getSessionUser().getId())){
        Societe s = S_Service.getSocieteByUserId(Session.getSession().getSessionUser().getId());
        
        Message = new SpanLabel("Votre demande est en cours de traitement, Vous pouvez la modifier a tous moment");
       
        nom = new TextField(s.getNom(), "Nom de la Societe");
        numregistre = new TextField(s.getNumregistre(), "Numregistre");
        adresse = new TextField(s.getAdresse(), "Adresse");
        type = new TextField(s.getType(), "Type");
        Container ct = new Container(BoxLayout.y());
        ct.addAll(Message,nom,numregistre,adresse,type,modifier);
        this.add(ct);

        }else{
        Message = new SpanLabel("Démarrer avec un compte Business");
        nom = new TextField("", "Nom de la Societe");
        numregistre = new TextField("", "Numregistre");
        adresse = new TextField("", "Adresse");
        type = new TextField("", "Type");
        Container ct = new Container(BoxLayout.y());
        ct.addAll(Message,nom,numregistre,adresse,type,inscription);
        this.add(ct);
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
        if (Session.getSession().getSessionUser().getType().compareTo("client") == 0) {

            getToolbar().addMaterialCommandToSideMenu("Démarrer un compte Business",FontImage.MATERIAL_BUSINESS, (event) -> {
                Form InscriptionSociete = new InscriptionSocieteForm(theme);
                InscriptionSociete.show();
            });
        } else {
            //5alaha lya 
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
    }

    private void addaction() {
        
       inscription.addActionListener(evt->{
         if(nom.getText().compareTo("")==0||numregistre.getText().compareTo("")==0||adresse.getText().compareTo("")==0||type.getText().compareTo("")==0){
        Dialog.show("un ou plusieurs champs sont manquants ","les champs nom,numregistre,adresse et type sont obligatoires !", "ok",null);

        }else{
               Societe s = new Societe(Session.getSession().getSessionUser().getId(),numregistre.getText(),adresse.getText(),type.getText(),false,nom.getText());
           SocieteService S_Service = new SocieteService();
           S_Service.addSociete(s);
           InscriptionSocieteForm inscrit = new InscriptionSocieteForm(theme);
           inscrit.show();
         }
        });
       modifier.addActionListener((evt)->{
       if(nom.getText().compareTo("")==0||numregistre.getText().compareTo("")==0||adresse.getText().compareTo("")==0||type.getText().compareTo("")==0){
        Dialog.show("un ou plusieurs champs sont manquants ","les champs nom,numregistre,adresse et type sont obligatoires !", "ok",null);

        }else{
                  SocieteService S_Service = new SocieteService();
                  Societe s = S_Service.getSocieteByUserId(Session.getSession().getSessionUser().getId());
                  s.setAdresse(adresse.getText());
                  s.setNom(nom.getText());
                  s.setNumregistre(numregistre.getText());
                  s.setType(type.getText());
                  S_Service.update(s);
           InscriptionSocieteForm inscrit = new InscriptionSocieteForm(theme);
           inscrit.show();
     
       }
       });
    }
}
