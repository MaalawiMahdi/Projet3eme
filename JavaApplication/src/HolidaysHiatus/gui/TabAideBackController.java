/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.services.AideCrud;
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
import javafx.scene.text.Text;
import javafx.scene.text.TextFlow;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class TabAideBackController implements Initializable {

    @FXML
    private ImageView image;
    @FXML
    private TextFlow titre;
    @FXML
    private Label categorie;
    @FXML
    private TextFlow description;
    @FXML
    private TextFlow adresse;
    @FXML
    private Button btn_modifier;
    @FXML
    private Button btn_supprimer;
    @FXML
    private Label tell;
     Aide dataAide;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    
     public void setDataAide(Aide dataAide) {
        this.dataAide = dataAide;
        image.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\uploads\\" + dataAide.getLien_image()));
        titre.getChildren().add(new Text(dataAide.getTitre()));        
        categorie.setText("");
        description.getChildren().add(new Text(dataAide.getDescription()));
        adresse.getChildren().add(new Text(dataAide.getAdresse()));
        tell.setText(dataAide.getNum_tell());
          btn_supprimer.setId(Integer.toString(dataAide.getId()));
        btn_modifier.setId(Integer.toString(dataAide.getId()));

    }

    @FXML
    private void envoi_modifier(ActionEvent event) {
    }

    @FXML
    private void envoi_supprimer(ActionEvent event) {
             AideCrud c = new AideCrud();
     
       c.deleteAide(Integer.parseInt(btn_supprimer.getId()));
            try {
                //récupération fichier fxml
                FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAide.fxml"));
                //récupération du root  à partir du fichier fxml

                Parent root = loader.load();
                //récupération du controller lier au fichier fxml

                AfficherAideController dpc = loader.getController();
                //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");
                btn_supprimer.getScene().setRoot(root);

            } catch (IOException ex) {
                Logger.getLogger(TabCatAideBackController.class.getName()).log(Level.SEVERE, null, ex);
            }
        

    }
    
    
    
}
