/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.CategorieAide;
import HolidaysHiatus.services.CategorieAideCrud;
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
import javafx.scene.control.Button;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class AjouterCategorieAideController implements Initializable {

    @FXML
    private Label id_ID;
    @FXML
    private TextField titre;
    @FXML
    private Button btn_ajout;
    @FXML
    private Button btn_retour;
    @FXML
    private Hyperlink btn_Cat_Aide;
    @FXML
    private Hyperlink btn_Aide;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void ajout_CatAide(ActionEvent event) {
            CategorieAideCrud categories = new CategorieAideCrud();
        CategorieAide c = new CategorieAide(titre.getText());
        //      Logger.getLogger(StartPageController.class.getName()).log(Level.SEVERE, null, ex);
        categories.AjouterCategorieAide(c);

        //récupération fichier fxml
        FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorieAide.fxml"));
        //récupération du root  à partir du fichier fxml
        Parent root;
        try {
            root = loader.load();
            //récupération du controller lier au fichier fxml 
            AfficherCategorieAideController dpc = loader.getController();
            //             dpc.setLbMessage(id_act.getText());

            btn_ajout.getScene().setRoot(root);

        } catch (IOException ex) {
            Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void navigation_affich(ActionEvent event) {
          //récupération fichier fxml
        FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorieAide.fxml"));
        //récupération du root  à partir du fichier fxml
        Parent root;
        try {
            root = loader.load();
            //récupération du controller lier au fichier fxml 
            AfficherCategorieAideController dpc = loader.getController();
            //             dpc.setLbMessage(id_act.getText());

            btn_retour.getScene().setRoot(root);

        } catch (IOException ex) {
            Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void envoi_Cat_Aide(ActionEvent event) {
           
        try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorieAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            AfficherCategorieAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");

            btn_Cat_Aide.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AjouterCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
       
    }

    @FXML
    private void envoi_Aide(ActionEvent event) {
           
        try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            AfficherAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");

            btn_Aide.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AjouterCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
       
    }
    
}
