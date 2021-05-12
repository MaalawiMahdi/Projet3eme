/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.User;
import HolidaysHiatus.services.UserService;
import HolidaysHiatus.tools.Session;
import com.codename1.components.Switch;
import com.codename1.messaging.Message;
import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.Display;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BorderLayout;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.layouts.FlowLayout;
import com.codename1.ui.util.Resources;
import javafx.scene.control.Alert;
import org.apache.commons.validator.routines.EmailValidator;

/**
 *
 * @author LENOVO
 */
public class InscriptionForm extends Form {

    private TextField Email;
    private TextField Password;
    private TextField RepeatPassword;
    private Button inscription;
    private Resources theme;

    public InscriptionForm(Resources theme) {
        super(BoxLayout.y());
        setTitle("inscription");
        this.theme = theme;
        this.setLayout(BoxLayout.y());
        AddGUI();
        addaction();

    }
    private void AddGUI(){
        Session.StartSession();
        if(Session.getSession().getFacebookInscription().getMail().compareTo("")==0){
         Email = new TextField("", "Email");}
        else{
         Email = new TextField(Session.getSession().getFacebookInscription().getMail(), "Email");}
        
        
         Password = new TextField("", "Mot de passe", 20, TextField.PASSWORD);
         RepeatPassword = new TextField("", "Répéter mot de passe", 20, TextField.PASSWORD);
         inscription = new Button("S'inscrire");

    Container ct = new Container(BoxLayout.y());
    ct.addAll(Email,Password,RepeatPassword,inscription);
    this.add(ct);
    
    }
    private void addaction(){
       EmailValidator validator = EmailValidator.getInstance();
        inscription.addActionListener((evt)->{
        if(Email.getText().compareTo("")==0||Password.getText().compareTo("")==0){
   
        Dialog.show("un ou plusieurs champs sont manquants ","les champs e-mail et mot de passe sont obligatoires !", "ok",null);

        }else if(validator.isValid(Email.getText())==false){
       
Dialog.show("Adresse mail non valid","Adresse mail non valid", "ok",null);
        Email.clear();
    }else if(Password.getText().compareTo(RepeatPassword.getText())!=0){
 
                Dialog.show("probleme de verification \n de mot de passe ","les champs ''mot de passe'' et ''repeter votre mot de passe'' doivent être identiques  !", "ok",null);

        Password.clear();
        RepeatPassword.clear();
        }else{
    UserService us = new UserService();
    if(us.isExiste(Email.getText())){
                    Dialog.show("Email Existe déja ","", "ok",null);
                    Email.clear();

    }else{
        if(Session.getSession().getFacebookInscription().getMail().compareTo("")==0){
        User u = new User(Email.getText(),Password.getText());
        us.addUser(u);
        Email.clear();
        Password.clear();
       
         Dialog.show("Inscription terminée ","Bienvenue dans notre application, vous pouvez maintenant vous connecter", "ok",null);
        }else{
         User u = new User(Email.getText(),Password.getText());
        us.addUser(u,Session.getSession().getFacebookData());
        Email.clear();
        Password.clear();
       
         Dialog.show("Inscription terminée ","Les informations mentionnées ci-dessous ont été enregistrées via votre compte Facebook : "
                 + "Nom , Prenom , email , Image de Profil", "ok",null);
      
        }

    
    }
    }
        
        });
        
        
        
    
    }
}
