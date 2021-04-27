/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.Panier;
import HolidaysHiatus.entites.ProduitService;
import HolidaysHiatus.tools.Session;
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
 * @author DELL
 */
public class CardPanierController implements Initializable {
ProduitService dataProduit;
    @FXML
    private Label titre;
    @FXML
    private TextFlow description;
    @FXML
    private Label type;
    @FXML
    private Label prix;
    @FXML
    private Button b;
    @FXML
    private ImageView image;
    @FXML
    private Label quantite;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    
       public void setDataProduit(ProduitService dataProduit,int quantitevalue) {
       
           this.dataProduit = dataProduit;
        image.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\img\\" + dataProduit.getLien_image()));
        titre.setText(dataProduit.getTitre());
      quantite.setText(quantite.getText()+" "+String.valueOf(quantitevalue));
        description.getChildren().add(new Text(dataProduit.getDescription()));
        type.setText(dataProduit.getType());
        prix.setText("          "+Float.toString(dataProduit.getPrix_unitaire())+ "TND");
        b.setId(Integer.toString(dataProduit.getId()));

    }

    @FXML
    private void supprimer_produit(ActionEvent event) {
        Panier p = Session.getSession().getConnectedPanier();
        int i ; 
        for(i=0;i<p.articles.size();i++){
        if(p.articles.get(i).getP().getId()==dataProduit.getId()){
        p.total=p.total-(p.articles.get(i).getQuantite()*p.articles.get(i).getP().getPrix_unitaire());
        p.articles.remove(i);
        
        Session.getSession().setConnectedPanier(p);
         try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("FrontPanier.fxml"));
            Parent root = loader.load();
            quantite.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(CardPanierController.class.getName()).log(Level.SEVERE, null, ex);
        }        
        }
        }
    }
    
}
