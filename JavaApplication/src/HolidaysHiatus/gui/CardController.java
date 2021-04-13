/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.entities.CategorieAide;
import com.lowagie.text.BadElementException;
import java.lang.String;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.image.ImageView;
import javafx.scene.image.Image;
import javafx.scene.text.TextAlignment;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class CardController implements Initializable {

    @FXML
    private Label titre;
    @FXML
    private Label description;
    @FXML
    private Label adresse;
    @FXML
    private Label tell;
    CategorieAide data;
    Aide dataAide;
    @FXML
    private ImageView image;
    @FXML
    private Label espace;
    @FXML
    private Button b;
    /**
     * Initializes the controller class.
     */
    
    
    
    
    public void setDataCat(CategorieAide data){ 
    this.data=data;
   
    
    titre.setText(data.getTitre());
      
      
    image.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\uploads\\" + data.getLien_icon() ));
    
    b.setId(Integer.toString(data.getId()));
    
    }
    @FXML
    public void envoi_aide ()
    { 
        
        
        
        
        
        if (data!=null){
        try {

            AfficherAideFrontController.setCatAideId(b.getId());
                        
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
        }
    }
      
    }

    public Button getB() {
        return b;
    }
            
    public void setDataAide(Aide dataAide) { 
    this.dataAide=dataAide;
   image.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\uploads\\" + dataAide.getLien_image() ));   
    titre.setText(dataAide.getTitre());
    description.setText(dataAide.getDescription());
    adresse.setText(dataAide.getAdresse());
    tell.setText(dataAide.getNum_tell());
       b.setId(Integer.toString(dataAide.getId()));
    
            }
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    
    
}
