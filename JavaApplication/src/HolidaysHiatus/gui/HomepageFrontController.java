/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

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
import javafx.scene.layout.AnchorPane;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class HomepageFrontController implements Initializable {

    @FXML
    private Hyperlink btn_aide;
    @FXML
    private Label id_ID;
    @FXML
    private AnchorPane home;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
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
            Logger.getLogger(HomepageFrontController.class.getName()).log(Level.SEVERE, null, ex);
        }
        
    }
    
}
