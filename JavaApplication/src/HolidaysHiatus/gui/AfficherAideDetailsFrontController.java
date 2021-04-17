/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.entities.CaptchaAide;
import HolidaysHiatus.services.AideCrud;
import java.io.IOException;
import java.net.URL;
import java.util.Random;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.scene.Parent;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.GridPane;






/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class AfficherAideDetailsFrontController implements Initializable {
    Random random = new Random();
    CaptchaAide captcha ;
    Aide aide;
    private static String aideId;
    @FXML
    private Hyperlink btn_aide;
    @FXML
    private Label id_ID;
    @FXML
    private AnchorPane home;
    @FXML
    private GridPane grid;
      public String getAideId() {
        return aideId;
    }

    public static void seAideId(String aideId) {
        AfficherAideDetailsFrontController.aideId = aideId;
    }

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
      int column=1;
        int row=0;   
        
       
            // TODO
            AideCrud a =new AideCrud();
            aide=a.afficherAideDetailsFront(Integer.parseInt(aideId));
            captcha=a.getCaptchaAide(random.nextInt(20)+1);
         try {    
            FXMLLoader fxmlLoader = new FXMLLoader();
            
            fxmlLoader.setLocation(getClass().getResource("Carddetails.fxml"));
            AnchorPane anchorPane=fxmlLoader.load();
            CarddetailsController cardController= fxmlLoader.getController();
            
            
              grid.add(anchorPane,column,row);
                    
                    
            
            
            
            cardController.setDataAide(aide,captcha);
        } catch (IOException ex) {
            Logger.getLogger(AfficherAideDetailsFrontController.class.getName()).log(Level.SEVERE, null, ex);
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
