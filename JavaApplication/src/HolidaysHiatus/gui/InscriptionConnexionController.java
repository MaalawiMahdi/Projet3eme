/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.InformationsSupplementaires;
import HolidaysHiatus.entites.Panier;
import HolidaysHiatus.tools.JavamailUtil;
import HolidaysHiatus.entites.User;
import HolidaysHiatus.services.InformationsSupplementairesService;
import HolidaysHiatus.services.UserService;
import HolidaysHiatus.tools.BCrypt;
import HolidaysHiatus.tools.Session;
import java.io.IOException;
import java.net.URL;
import java.nio.charset.Charset;
import java.util.Date;
import java.util.Random;
import java.util.ResourceBundle;
import java.util.Timer;
import java.util.TimerTask;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.Button;
import javafx.scene.control.ButtonType;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.layout.AnchorPane;
import javafx.scene.text.Text;
import org.apache.commons.validator.routines.EmailValidator;

/**
 * FXML Controller class
 *
 * @author ASUS
 */
public class InscriptionConnexionController implements Initializable {

    @FXML
    private TextField inscription_email;
    @FXML
    private TextField inscription_mot_de_passe;
    @FXML
    private TextField inscription_repeter_mot_de_passe;
    @FXML
    private TextField connexion_email;
    @FXML
    private PasswordField connexion_mot_de_passe;
    @FXML
    private Button cnxbutton;
    private int falsepassword=3;
    @FXML
    private Text passwordfalsemessage;
    @FXML
    private AnchorPane cnxform;
    @FXML
    private Hyperlink resetpassword;
    @FXML
    private AnchorPane resetpasswordform;
    @FXML
    private Button btn_crea_co;
    @FXML
    private TextField emailresetvalue;
    @FXML
    private AnchorPane doublepasswordform;
    @FXML
    private Button btn_crea_co1;
    @FXML
    private TextField resetpasswordvalue1;
    @FXML
    private TextField resetpasswordvalue2;
    @FXML
    private AnchorPane codeveirform;
    @FXML
    private Button btn_crea_co2;
    private String code;
    @FXML
    private TextField codealpha;
    private User resetUser;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
    
    }    

    @FXML
    private void inscription(ActionEvent event) {
       EmailValidator validator = EmailValidator.getInstance();
      UserService us = new UserService();
       if(inscription_email.getText().compareTo("")==0||inscription_mot_de_passe.getText().compareTo("")==0){
        Alert alert = new Alert(AlertType.INFORMATION);
        alert.setTitle("un ou plusieurs champs sont manquants"); 
        alert.setHeaderText("un ou plusieurs champs sont manquants ");
        alert.setContentText("les champs e-mail et mot de passe sont obligatoires !");
        alert.showAndWait();
        }else if(validator.isValid(inscription_email.getText())==false){
        Alert alert = new Alert(AlertType.INFORMATION);
        alert.setTitle("Adresse mail non valid "); 
        alert.setHeaderText("Adresse mail non valid ");
        alert.setContentText("");
        alert.showAndWait();
        inscription_email.clear();
       
       } else if(inscription_mot_de_passe.getText().compareTo(inscription_repeter_mot_de_passe.getText())!=0){
        Alert alert = new Alert(AlertType.INFORMATION);
        alert.setTitle("probleme de verification de mot de passe"); 
        alert.setHeaderText("probleme de verification de mot de passe");
        alert.setContentText("les champs ''mot de passe'' et ''repeter votre mot de passe'' doivent être identiques  !");
        alert.showAndWait();
        inscription_mot_de_passe.clear();
        inscription_repeter_mot_de_passe.clear();
        }else if(us.isExiste(inscription_email.getText())){
        Alert alert = new Alert(AlertType.INFORMATION);
        alert.setTitle("Adresse Mail existe déja"); 
        alert.setHeaderText("");
        alert.setContentText("Adresse Mail existe déja !");
        alert.showAndWait();
        }else{
        String hashedPassword = BCrypt.hashpw(inscription_mot_de_passe.getText(),BCrypt.gensalt());
        
        User u = new User(hashedPassword,"client",inscription_email.getText(),true,false);
        us.AjouterUser(u);
        User userforInformation = us.ChercherParMail(inscription_email.getText());
        InformationsSupplementairesService information_ss = new  InformationsSupplementairesService();
        information_ss.AjouterInformation(new InformationsSupplementaires(userforInformation.getId()));
        Alert alert = new Alert(AlertType.INFORMATION);
        alert.setTitle("Inscription terminée  "); 
        alert.setHeaderText("Bienvenue dans notre application ");
        alert.setContentText("Bienvenue dans notre application, vous pouvez maintenant vous connecter");
        alert.showAndWait();
        
        connexion_email.setText(inscription_email.getText());
        connexion_mot_de_passe.setText(inscription_mot_de_passe.getText());
        inscription_email.clear();
        inscription_mot_de_passe.clear();
        inscription_repeter_mot_de_passe.clear();
        }
           }

    @FXML
    private void connecter(ActionEvent event) {
      UserService us = new UserService();
      
        if(connexion_email.getText().compareTo("")==0||connexion_mot_de_passe.getText().compareTo("")==0){
        Alert alert = new Alert(AlertType.INFORMATION);
        alert.setTitle("un ou plusieurs champs sont manquants"); 
        alert.setHeaderText("un ou plusieurs champs sont manquants ");
        alert.setContentText("les champs e-mail et mot de passe sont obligatoires !");
        alert.showAndWait();
        return;
        }else if (us.ChercherParMail(connexion_email.getText())==null){
        Alert alert = new Alert(AlertType.INFORMATION);
        alert.setTitle("compte introuvable"); 
        alert.setHeaderText("votre adresse mail est introuvable");
        alert.setContentText("merci de remplir notre formulaire d'inscription ");
        alert.showAndWait();
        return; 
        }
        User u = us.ChercherParMail(connexion_email.getText());
        if(BCrypt.checkpw(connexion_mot_de_passe.getText(), u.getPassword())==false){

            Alert alert = new Alert(AlertType.INFORMATION);
        alert.setTitle("compte introuvable"); 
        alert.setHeaderText("mot de passe incorrect");
        alert.setContentText("mot de passe incorrect \n nombre des essais : "  + falsepassword);
        alert.showAndWait();
        falsepassword--;
        if(falsepassword==0){
        cnxbutton.setDisable(true);
        Timer chrono= new Timer();
        
        chrono.schedule(new TimerTask(){
                               int time=60;
              
            @Override
                public void run() {
                   
                        passwordfalsemessage.setText("Compte Verrouillé , \n Réessayez dans "+time+"s");

                time--;
                if(time==0){
                cnxbutton.setDisable(false);
                passwordfalsemessage.setText("");
        chrono.cancel();
                falsepassword=3;
                }
                }
        
        }, new Date(),1000);
        }
        }else if(u.isBan()){
          Alert alert = new Alert(AlertType.INFORMATION);
        alert.setTitle("ban"); 
        alert.setHeaderText("Vous avez été banni");
        alert.setContentText("Vous avez été banni");
        alert.showAndWait();
      
        }else{
            u.setActive(true);
            Session.StartSession().SetSessionUser(u);
                Session.getSession().setConnectedPanier(new Panier());

            
            if(u.getType().compareTo("client")==0||u.getType().compareTo("societe")==0){
                 try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageFront.fxml"));
           Parent root= loader.load();
            connexion_email.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
            }else if(u.getType().compareTo("admin")==0){
                try{
            FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageBack.fxml"));
            Parent root= loader.load();
            connexion_email.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
                
            
            }
        }
       
    }
    
}

    @FXML
    private void resetpassword(ActionEvent event) {
        cnxform.setDisable(true);
        cnxform.setOpacity(0);
        resetpasswordform.setOpacity(1);
        resetpasswordform.setLayoutX(cnxform.getLayoutX());
        
        resetpasswordform.setLayoutY(cnxform.getLayoutY());
        resetpasswordform.setDisable(false);
    }

    @FXML
    private void RécuprationPwdUser(ActionEvent event) {
              UserService us = new UserService();
              if (us.ChercherParMail(emailresetvalue.getText())==null){
        Alert alert = new Alert(AlertType.INFORMATION);
        alert.setTitle("compte introuvable"); 
        alert.setHeaderText("votre adresse mail est introuvable");
        alert.setContentText("merci de remplir notre formulaire d'inscription ");
        alert.showAndWait();
        return; 
        }else{
       
    int leftLimit = 48; // numeral '0'
    int rightLimit = 122; // letter 'z'
    int targetStringLength = 7;
    Random random = new Random();

     code = random.ints(leftLimit, rightLimit + 1)
      .filter(i -> (i <= 57 || i >= 65) && (i <= 90 || i >= 97))
      .limit(targetStringLength)
      .collect(StringBuilder::new, StringBuilder::appendCodePoint, StringBuilder::append)
      .toString();
            String subject = "Votre code est :  ";
            
          String message= "Votre code de récupération est "+code;
           
                JavamailUtil mailing = new JavamailUtil();
                  try {
                      mailing.sendMail(emailresetvalue.getText(), subject,message);
                       codeveirform.setDisable(false);
              codeveirform.setOpacity(1);
              resetpasswordform.setOpacity(0);
              resetpasswordform.setDisable(true);
        codeveirform.setLayoutX(resetpasswordform.getLayoutX());
        
        codeveirform.setLayoutY(resetpasswordform.getLayoutY());
        resetUser= us.ChercherParMail(emailresetvalue.getText());
                  } catch (Exception ex) {
                      Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
                  }
              }
             
        
        
    }

    @FXML
    private void updatemotdepasse(ActionEvent event) {
        if(resetpasswordvalue1.getText().compareTo("")==0){
                Alert alert = new Alert(AlertType.INFORMATION);

            alert.setTitle("probleme de verification de mot de passe"); 
        alert.setHeaderText("probleme de verification de mot de passe");
        alert.setContentText("le champs mot de passe est obligatoire !");
        alert.showAndWait();
        
        }
        else if(resetpasswordvalue1.getText().compareTo(resetpasswordvalue2.getText())!=0){
        Alert alert = new Alert(AlertType.INFORMATION);
        alert.setTitle("probleme de verification de mot de passe"); 
        alert.setHeaderText("probleme de verification de mot de passe");
        alert.setContentText("les champs ''mot de passe'' et ''repeter votre mot de passe'' doivent être identiques  !");
        alert.showAndWait();
        resetpasswordvalue1.clear();
        resetpasswordvalue2.clear(); 
        }else{
                      UserService us = new UserService();
        resetUser.setPassword( BCrypt.hashpw(resetpasswordvalue1.getText(),BCrypt.gensalt()));
        us.UpdateUser(resetUser);
        Alert alert = new Alert(AlertType.INFORMATION);
        alert.setTitle("mot de passe modifié "); 
        alert.setHeaderText("mot de passe modifié ");
        alert.setContentText("mot de passe modifié  !");
        alert.showAndWait();
         connexion_email.setText(resetUser.getMail());
        resetUser = new User();
        
        doublepasswordform.setDisable(true);
        doublepasswordform.setOpacity(0);
        cnxform.setDisable(false);
        cnxform.setOpacity(1);
           
        }
    }

    @FXML
    private void verifcode(ActionEvent event) {
        if(codealpha.getText().compareTo(code)!=0){
        Alert alert = new Alert(AlertType.INFORMATION);
        alert.setTitle("code invalid"); 
        alert.setHeaderText("code non valid ");
        alert.setContentText(" ");
        alert.showAndWait();
        return; 
        
        }else{
                        codeveirform.setDisable(true);
              codeveirform.setOpacity(0);
              doublepasswordform.setLayoutX(codeveirform.getLayoutX());
        
        doublepasswordform.setLayoutY(codeveirform.getLayoutY());
        doublepasswordform.setOpacity(1);
        doublepasswordform.setDisable(false);
        }
    }
}