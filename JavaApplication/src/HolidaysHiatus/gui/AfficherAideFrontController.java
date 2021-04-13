/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.services.AideCrud;
import com.lowagie.text.BadElementException;
import java.io.IOException;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;
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
import javafx.scene.control.ScrollPane;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.GridPane;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class AfficherAideFrontController implements Initializable {

    /**
     * Initializes the controller class.
     */
    private static String CataideId;
    @FXML
    private Label id_ID;
    @FXML
    private AnchorPane home;
    @FXML
    private ScrollPane scroll;
    private List<Aide> data;
    @FXML
    private GridPane grid;
    @FXML
    private Hyperlink btn_aide;

    public String getCatAideId() {
        return CataideId;
    }

    public static void setCatAideId(String CataideId) {
        AfficherAideFrontController.CataideId = CataideId;
    }
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        
        data = new ArrayList();

        AideCrud Aides = new AideCrud();

        Aides.afficherAideFront(Integer.parseInt(CataideId)).forEach((c) -> {

            data.add(c);

        });
      
        int column=0;
        int row=0;
          try {
        for(int i=0; i<data.size();i++){
          
         
                
                FXMLLoader fxmlLoader = new FXMLLoader();
               
                fxmlLoader.setLocation(getClass().getResource("Card.fxml"));
                AnchorPane anchorPane=fxmlLoader.load();
                CardController cardController= fxmlLoader.getController();
                
                
                                                       column++;

                    cardController.setDataAide(data.get(i));
                    if (column==3)
                    {column=1;
                            row++;
                    }
                    
                    grid.add(anchorPane,column,row);
                    
                    GridPane.setMargin(anchorPane,new Insets(2));
              
            } 
        } catch (IOException ex) {
                Logger.getLogger(AfficherCategorieAideFrontController.class.getName()).log(Level.SEVERE, null, ex);
            } 
       
             
       
                 
              
              
              
         
                
    }    

    @FXML
    private void envoi_aide(ActionEvent event) 
    {
      

           
        
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
            Logger.getLogger(AfficherAideFrontController.class.getName()).log(Level.SEVERE, null, ex);
        }
        
    } 
           
        
   
      
        
        
    
}
    

