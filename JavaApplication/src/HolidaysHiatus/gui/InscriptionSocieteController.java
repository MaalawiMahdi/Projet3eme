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
import javafx.scene.control.TextField;
import javafx.scene.layout.AnchorPane;

/**
 * FXML Controller class
 *
 * @author ASUS
 */
public class InscriptionSocieteController implements Initializable {

    @FXML
    private Hyperlink btn_accueil;
    @FXML
    private Label id_ID;
    @FXML
    private AnchorPane home;
    @FXML
    private Hyperlink deconnecter;
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

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void inscriptionbusiness(ActionEvent event) {
    
       
    }

    @FXML
    private void envoiAccueil(ActionEvent event) {
        try{ 
        FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageFront.fxml"));
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
/*  private TextField nomsociete;
    @FXML
    private TextField numregistresociete;
    @FXML
    private TextField adressesociete;
    @FXML
    private TextField typesociete;
    @FXML
    private Button inscription;
*/
    
    @FXML
    private void insciptionsociete(ActionEvent event) {
          if(nomsociete.getText().compareTo("")==0||numregistresociete.getText().compareTo("")==0||adressesociete.getText().compareTo("")==0||typesociete.getText().compareTo("")==0){
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("un ou plusieurs champs sont manquants"); 
        alert.setHeaderText("un ou plusieurs champs sont manquants ");
        alert.setContentText("les champs nom de societe , numero de registre , adresse et type  sont obligatoires !");
        alert.showAndWait();
        }else {
              Societe s = new Societe(Session.getSession().getSessionUser().getId(),numregistresociete.getText(), adressesociete.getText(),typesociete.getText(),false,nomsociete.getText());
              SocieteService S_Service = new SocieteService();
              S_Service.AjouterSociete(s);
              Session.getSession().getSessionUser().setType("societe"); //update session
              UserService us = new UserService();
              us.UpdateUser(Session.getSession().getSessionUser());
              
       }

    }
    
}
