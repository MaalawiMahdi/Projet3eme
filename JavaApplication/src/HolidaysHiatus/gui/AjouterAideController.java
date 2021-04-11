/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.services.AideCrud;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class AjouterAideController implements Initializable {

    @FXML
    private Label id_ID;
    @FXML
    private TextField titre;
    @FXML
    private Button btn_ajout;
    @FXML
    private Button btn_retour;
    @FXML
    private TextField Adresse;
    @FXML
    private TextField Description;
    @FXML
    private ComboBox<String> Categorie_Aide;
      ObservableList<String> catAide = FXCollections.observableArrayList();
    @FXML
    private Hyperlink btn_cat_aide;
    @FXML
    private TextField tell;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        AideCrud Aides = new AideCrud();
        catAide.addAll(Aides.cherchercattitres());
       Categorie_Aide.setItems(catAide);
    }    

    @FXML
    private void ajout_Aide(ActionEvent event) {
        try {
            AideCrud Aides = new AideCrud();
            String ch = Categorie_Aide.getValue().toString();
           
            int id=Aides.chercherCatAideid(ch);
            
            Aide a = new Aide( id ,titre.getText(), Adresse.getText(), Description.getText(),tell.getText(),null);
            //      Logger.getLogger(StartPageController.class.getName()).log(Level.SEVERE, null, ex);
            Aides.AjouterAide(a);
            
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root;
            
            root = loader.load();
            //récupération du controller lier au fichier fxml 
            AfficherAideController dpc = loader.getController();
            //             dpc.setLbMessage(id_act.getText());

            btn_ajout.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AjouterAideController.class.getName()).log(Level.SEVERE, null, ex);
        }

        

    }

    @FXML
    private void navigation_affich(ActionEvent event) {
        try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root;
            
            root = loader.load();
            //récupération du controller lier au fichier fxml 
            AfficherAideController dpc = loader.getController();
            //             dpc.setLbMessage(id_act.getText());

            btn_retour.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AjouterAideController.class.getName()).log(Level.SEVERE, null, ex);
        }

     
          
       
    }

    @FXML
    private void envoi_cat_aide(ActionEvent event) {
          
        try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorieAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            AfficherCategorieAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");

            btn_cat_aide.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AjouterAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
         
    }
    
}
