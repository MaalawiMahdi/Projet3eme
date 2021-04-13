/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;
 
import HolidaysHiatus.services.*;
import HolidaysHiatus.entities.*;
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
import javafx.scene.control.TextField;

/**
 * FXML Controller class
 *
 * @author AMINE
 */
public class AjouterCategorieController implements Initializable {

    @FXML
    private TextField Titre;
    @FXML
    private TextField pic;
    @FXML
    private Button ajouter;
    @FXML
    private Label id_ID;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void addAction(ActionEvent event) {
        try{    
        String titre= Titre.getText();
     String lien_pic = pic.getText();
     CategorieBoard b = new CategorieBoard(1,titre,lien_pic);
     CrudCategorie pg = new CrudCategorie();
     pg.AjoutereCategorie(b);
     FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorie.fxml"));
 Parent root= loader.load();
  AfficherCategorieController ac=loader.getController();
            Titre.getScene().setRoot(root);
             } catch (IOException ex) {
            Logger.getLogger(AjouterBoardController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
}
