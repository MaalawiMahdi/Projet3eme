/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.ProduitService;
import java.net.URL;
import java.util.ResourceBundle;
import java.util.Set;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.text.Text;
import javafx.scene.text.TextAlignment;
import javafx.scene.text.TextFlow;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class CardProduitController implements Initializable {

    @FXML
    private Label espace;
    @FXML
    private Label titre;
    @FXML
    private Button b;
    @FXML
    private TextFlow description;
    @FXML
    private Label type;
    @FXML
    private Label prix;
    @FXML
    private ImageView image;
    ProduitService dataProduit;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    public void setDataProduit(ProduitService dataProduit) {
        this.dataProduit = dataProduit;
        image.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\img\\" + dataProduit.getLien_image()));
        titre.setText(dataProduit.getTitre());
      
                
        description.getChildren().add(new Text(dataProduit.getDescription()));
        type.setText(dataProduit.getType());
        prix.setText("          "+Float.toString(dataProduit.getPrix_unitaire())+ "TND");
        b.setId(Integer.toString(dataProduit.getId()));

    }
    @FXML
    private void ajout_panier(ActionEvent event) {
    }
    
}
