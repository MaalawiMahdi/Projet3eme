/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.Societe;
import HolidaysHiatus.services.SocieteService;
import HolidaysHiatus.services.UserService;
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
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.MenuItem;
import javafx.scene.control.TextField;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.Pane;
import javafx.scene.text.Text;

/**
 * FXML Controller class
 *
 * @author ASUS
 */
public class InscriptionSocieteController implements Initializable {

    @FXML
    private Label id_ID;
    @FXML
    private AnchorPane home;
    @FXML
    private MenuItem deconnecter;
    @FXML
    private TextField nomsociete;
    @FXML
    private TextField numregistresociete;
    @FXML
    private TextField adressesociete;
    @FXML
    private TextField typesociete;
    @FXML
    private Button inscription;
    @FXML
    private Text message;
    @FXML
    private Button modifiersocite;
    @FXML
    private Pane form;
    @FXML
    private Text message1;
    @FXML
    private MenuItem profil;
    @FXML
    private Hyperlink Acceuil;
    @FXML
    private Hyperlink btn_aide;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        //tester si une demende existe déja 
        message1.setOpacity(0);
        SocieteService Sc = new SocieteService();
        System.out.print(Session.StartSession().getSessionUser().getId());
        
        if(Sc.chercherparidclient(Session.StartSession().getSessionUser().getId())!=null){
         Societe s = Sc.chercherparidclient(Session.StartSession().getSessionUser().getId());
         if(s.isEtat()){
                      message1.setOpacity(1);

         form.setOpacity(0);
         }else{   
         inscription.setDisable(true);
              inscription.setOpacity(0);
              message.setText("Votre demmande est en cours de traitement \n , vous pouvez la modifier a tous moment ");
             nomsociete.setText(s.getNom().toString());
             numregistresociete.setText(s.getNumregistre().toString());
             adressesociete.setText(s.getAdresse().toString());
             typesociete.setText(s.getType().toString());
             modifiersocite.setOpacity(1);
        }
    }    
    }
    @FXML
    private void inscriptionbusiness(ActionEvent event) {
    
       
    }

    @FXML
    private void envoiAccueil(ActionEvent event) {
        try{ 
        FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageFront.fxml"));
           Parent root= loader.load();
            Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
            }
    }

    @FXML
    private void deconnecter(ActionEvent event) {
   Session.StartSession().clearSession();
              try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionConnexion.fxml"));
     Parent root= loader.load();
            Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    
    @FXML
    private void insciptionsociete(ActionEvent event) {
          if(nomsociete.getText().compareTo("")==0||numregistresociete.getText().compareTo("")==0
                  ||adressesociete.getText().compareTo("")==0||typesociete.getText().compareTo("")==0){
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("un ou plusieurs champs sont manquants"); 
        alert.setHeaderText("un ou plusieurs champs sont manquants ");
        alert.setContentText("les champs nom de societe , numero de registre , adresse et type  sont obligatoires !");
        alert.showAndWait();
        }else {
              Societe s = new Societe(Session.StartSession().getSessionUser().getId(),numregistresociete.getText(), adressesociete.getText(),typesociete.getText(),false,nomsociete.getText());
              SocieteService S_Service = new SocieteService();
              S_Service.AjouterSociete(s);
              inscription.setDisable(true);
              inscription.setOpacity(0);
              message.setText("Votre demmande est en cours de traitement \n , vous pouvez la modifier a tous moment ");
             nomsociete.setText(s.getNom());
             numregistresociete.setText(s.getNumregistre());
             adressesociete.setText(s.getAdresse());
             typesociete.setText(s.getType());
             modifiersocite.setOpacity(1);
             
          }

    }

    @FXML
    private void modifiersocite(ActionEvent event) {
        SocieteService Sc = new SocieteService();
          if(nomsociete.getText().compareTo("")==0||numregistresociete.getText().compareTo("")==0
                  ||adressesociete.getText().compareTo("")==0||typesociete.getText().compareTo("")==0){
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("un ou plusieurs champs sont manquants"); 
        alert.setHeaderText("un ou plusieurs champs sont manquants ");
        alert.setContentText("les champs nom de societe , numero de registre , adresse et type  sont obligatoires !");
        alert.showAndWait();
        }else{
        if(Sc.chercherparidclient(Session.StartSession().getSessionUser().getId())!=null){
         Societe s = Sc.chercherparidclient(Session.StartSession().getSessionUser().getId());
         s.setNom(nomsociete.getText());
         s.setNumregistre(numregistresociete.getText());
         s.setAdresse(adressesociete.getText());
         s.setType(typesociete.getText());
         Sc.updateSociete(s);
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Modification enregistrée "); 
        alert.setHeaderText("Modification enregistrée ");
        alert.setContentText("Modification enregistrée");
        alert.showAndWait();
         
        }
    }
    
}
     @FXML
    private void profil(ActionEvent event) {
        try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("profil.fxml"));
     Parent root= loader.load();
            Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

   @FXML
    private void envoi_aide(ActionEvent event) {
         try {
              //récupération fichier fxml
              
              FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorieAideFront.fxml"));
              //récupération du root  à partir du fichier fxml
              
              Parent root = loader.load();
              //récupération du controller lier au fichier fxml
              
              AfficherCategorieAideFrontController dpc = loader.getController();
              //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");
              btn_aide.getScene().setRoot(root);
          } catch (IOException ex) {
              Logger.getLogger(AfficherAideDetailsFrontController.class.getName()).log(Level.SEVERE, null, ex);
          }
       
    }
}
    
