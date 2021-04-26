/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Board;
import HolidaysHiatus.services.CrudBoard;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
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
    
    public void SetDataBoard(Board dataBoard){
        this.dataBoard=dataBoard;
        titre.setText(dataBoard.getTitre());
       
        nbr_vue.setText(Integer.toString(dataBoard.getNbr_vue()));
        b.setId(Integer.toString(dataBoard.getId()));
        image.setImage(new Image("file:C:\\Users\\AMINE\\Projet3eme\\SymfonyApplication\\public\\" + dataBoard.getPic()));
              
       
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

    }
    
}
