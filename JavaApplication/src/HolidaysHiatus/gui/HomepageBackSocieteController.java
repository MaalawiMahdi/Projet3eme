/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

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
import javafx.scene.control.Label;
import javafx.scene.text.Text;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class HomepageBackSocieteController implements Initializable {

    @FXML
    private Label id_ID;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {

    }    

    @FXML
    private void gestionSujet(ActionEvent event) {
           try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherSujet.fxml"));
           Parent root= loader.load();
            id_ID.getScene().setRoot(root);
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
            id_ID.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void gestionProduit(ActionEvent event) {
        try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("GestionProduitService.fxml"));
           Parent root= loader.load();
            id_ID.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void gestionCategorieProduit(ActionEvent event) {
        try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("GestionCategorie.fxml"));
           Parent root= loader.load();
            id_ID.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
        
    }
    
}
