/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.ArticlePanier;
import HolidaysHiatus.entites.Panier;
import HolidaysHiatus.entites.ProduitService;
import HolidaysHiatus.tools.Session;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import java.util.Set;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.text.Text;
import javafx.scene.text.TextAlignment;
import javafx.scene.text.TextFlow;
import javafx.stage.Modality;
import javafx.stage.Stage;

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
    private void ajout_panier(ActionEvent event) throws IOException {
     Panier p = Session.getSession().getConnectedPanier();
    int i ;
    boolean found=false; 
    for (i= 0 ; i<p.articles.size(); i++)
    {
    if(p.articles.get(i).p.getId()==dataProduit.getId()){
    found=true;
    p.articles.get(i).quantite++;
    }
    }
    if(found==false){
        ArticlePanier Ap = new ArticlePanier(dataProduit,1);
    p.articles.add(Ap);
    }
    //mise a jour Total 
    float total= (float) p.articles.stream().mapToDouble(v->v.getP().getPrix_unitaire()*v.getQuantite()).sum();
    p.total=total;
    System.out.println("Panier \n " + Session.getSession().getConnectedPanier());
    
     
    }
}
