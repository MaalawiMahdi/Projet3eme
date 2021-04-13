/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.CategorieAide;
import HolidaysHiatus.services.CategorieAideCrud;
import com.lowagie.text.BadElementException;
import java.io.IOException;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
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
public class AfficherCategorieAideFrontController implements Initializable {

    @FXML
    private Label id_ID;
    @FXML
    private AnchorPane home;
    private List<CategorieAide> data;
    @FXML
    private ScrollPane scroll;
    @FXML
    private GridPane grid;
    @FXML
    private Hyperlink btn_aide;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
       
        // TODO
        
        data = new ArrayList();

        CategorieAideCrud CategoriesAides = new CategorieAideCrud();

        CategoriesAides.afficherCategorieAide().forEach((c) -> {

            data.add(c);

        });
      
        int column=0;
        int row=0;
          try {
        for(int i=0; i<data.size();i++){
          
         
                
                FXMLLoader fxmlLoader = new FXMLLoader();
               
                fxmlLoader.setLocation(getClass().getResource("card.fxml"));
                AnchorPane anchorPane=fxmlLoader.load();
                CardController cardController= fxmlLoader.getController();
                
                
                                                       column++;

                    cardController.setDataCat(data.get(i));
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
