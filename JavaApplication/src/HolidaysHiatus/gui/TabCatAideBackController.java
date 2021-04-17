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
import javafx.scene.control.Label;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class TabCatAideBackController implements Initializable {

    @FXML
    private ImageView image;
    @FXML
    private Label titre;
    @FXML
    private Button btn_modifier;
    @FXML
    private Button btn_supprimer;
    CategorieAide data;
     
    public void setDataCat(CategorieAide data) {
        this.data = data;

        titre.setText(data.getTitre());

        image.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\uploads\\" + data.getLien_icon()));

        btn_supprimer.setId(Integer.toString(data.getId()));
        btn_modifier.setId(Integer.toString(data.getId()));

    }

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void envoi_modifier(ActionEvent event) {
      
     /*       try {

                ModifierCategorieAideFrontController.setCatAideId(btn_supprimer.getId());

                //récupération fichier fxml
                FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAideFront.fxml"));
                //récupération du root  à partir du fichier fxml

                Parent root = loader.load();
                //récupération du controller lier au fichier fxml

                AfficherAideFrontController dpc = loader.getController();
                //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");
                espace.getScene().setRoot(root);

            } catch (IOException ex) {
                Logger.getLogger(CardController.class.getName()).log(Level.SEVERE, null, ex);
            }*/
             
    }

    @FXML
    private void envoi_supprimer(ActionEvent event) {
        CategorieAideCrud c = new CategorieAideCrud();
     
       c.deleteCategorieAide(Integer.parseInt(btn_supprimer.getId()));
            try {
                //récupération fichier fxml
                FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorieAide.fxml"));
                //récupération du root  à partir du fichier fxml

                Parent root = loader.load();
                //récupération du controller lier au fichier fxml

                AfficherCategorieAideController dpc = loader.getController();
                //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");
                btn_supprimer.getScene().setRoot(root);

            } catch (IOException ex) {
                Logger.getLogger(TabCatAideBackController.class.getName()).log(Level.SEVERE, null, ex);
            }
        

    }
    
}
