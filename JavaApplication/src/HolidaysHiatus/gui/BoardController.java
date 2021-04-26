/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Board;
import HolidaysHiatus.services.CrudBoard;
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

/**
 * FXML Controller class
 *
 * @author AMINE
 */
public class BoardController implements Initializable {

    @FXML
    private Label id;
    @FXML
    private Label titre;
    @FXML
    private Label nbr_vue;
    @FXML
    private Button b;
    @FXML
    private ImageView image;
    
    Board dataBoard;
    @FXML
    private Button btn_boutique;
    
    public void SetDataBoard(Board dataBoard){
        this.dataBoard=dataBoard;
        titre.setText(dataBoard.getTitre());
       
        nbr_vue.setText(Integer.toString(dataBoard.getNbr_vue()));
        b.setId(Integer.toString(dataBoard.getId()));
        image.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\" + dataBoard.getPic()));
        btn_boutique.setId(Integer.toString(dataBoard.getId()));
        
              
       
    }
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void envoiboard(ActionEvent event) {
         CrudBoard p= new CrudBoard();      
         p.ajouter_vue(dataBoard);
          try {

                AffichageSujetsParBoardController.setBoardid(Integer.parseInt(b.getId()));

                //récupération fichier fxml
                FXMLLoader loader = new FXMLLoader(getClass().getResource("AffichageSujetsParBoard.fxml"));
                //récupération du root  à partir du fichier fxml

                Parent root = loader.load();
                //récupération du controller lier au fichier fxml

                AffichageSujetsParBoardController dpc = loader.getController();
                //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");
                b.getScene().setRoot(root);

            } catch (IOException ex) {
                Logger.getLogger(CardController.class.getName()).log(Level.SEVERE, null, ex);
            }

    }

    @FXML
    private void envoi_produit(ActionEvent event) {
           CrudBoard p= new CrudBoard();      
         p.ajouter_vue(dataBoard);
         AfficherProduitFrontController.setBoardid(btn_boutique.getId());
          try {

                //récupération fichier fxml
                FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherProduitFront.fxml"));
                //récupération du root  à partir du fichier fxml

                Parent root = loader.load();
                //récupération du controller lier au fichier fxml

                AfficherProduitFrontController dpc = loader.getController();
                //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");
                btn_boutique.getScene().setRoot(root);

            } catch (IOException ex) {
                Logger.getLogger(CardController.class.getName()).log(Level.SEVERE, null, ex);
            }

    }
    
}
