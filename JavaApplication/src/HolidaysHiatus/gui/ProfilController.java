/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.InformationsSupplementaires;
import HolidaysHiatus.entites.User;
import HolidaysHiatus.services.InformationsSupplementairesService;
import HolidaysHiatus.tools.Session;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.MenuItem;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.AnchorPane;

/**
 * FXML Controller class
 *
 * @author ASUS
 */
public class ProfilController implements Initializable {

    @FXML
    private Hyperlink btn_accueil;
    @FXML
    private MenuItem profil;
    @FXML
    private MenuItem deconnecter;
    @FXML
    private Label id_ID;
    @FXML
    private AnchorPane home;
    @FXML
    private Label mailvalue;
    @FXML
    private Label motdepassevalue;
    @FXML
    private Label typevalue;
    @FXML
    private Label nomvalue;
    @FXML
    private Label prenomvalue;
    @FXML
    private Label telvalue;
    @FXML
    private ImageView profilimage;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
      profilimage.setImage(new Image("file:C:\\Users\\ASUS\\Desktop\\integrationfinal\\Projet3eme\\SymfonyApplication\\public\\profil\\user.png"));
    User u = Session.StartSession().getSessionUser();
    InformationsSupplementairesService InforSupService = new InformationsSupplementairesService();
    InformationsSupplementaires information = InforSupService.chercherparidclient(u.getId());
    System.out.print(information);
    mailvalue.setText(u.getMail());
    motdepassevalue.setText(u.getPassword());
    typevalue.setText(u.getType());
    if(information.getImage()!=null){
      profilimage.setImage(new Image("file:C:\\Users\\ASUS\\Desktop\\integrationfinal\\Projet3eme\\SymfonyApplication\\public\\profil\\"+information.getImage()));    
    }
    if(information.getNom()!=null){
    nomvalue.setText(information.getNom());
    }
    if(information.getPrenom()!=null){
    prenomvalue.setText(information.getPrenom());
    }
    if(information.getTell()!=null){
    telvalue.setText(information.getTell());
    }
    }    

  
    @FXML
    private void envoiAccueil(ActionEvent event) {
    }
    @FXML
     private void inscriptionbusiness(ActionEvent event) {
            try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionSociete.fxml"));
           Parent root= loader.load();
            btn_accueil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
    }

    @FXML
    private void deconnecter(ActionEvent event) {
    Session.getSession().clearSession();
              try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionConnexion.fxml"));
     Parent root= loader.load();
            btn_accueil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void profil(ActionEvent event) {
       try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("profil.fxml"));
     Parent root= loader.load();
            btn_accueil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
