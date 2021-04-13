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
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;




/**
 * FXML Controller class
 *
 * @author AMINE
 */
public class AjouterBoardController implements Initializable {

    @FXML
    private TextField Titre;
    @FXML
    private TextField pic;
    @FXML
    private Button ajouter;
    @FXML
    private ComboBox<String> Categorie;
    @FXML
    private Label id_ID;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        Actualisercombox();
    }    

    public void Actualisercombox()
    {
        //combobox
        String dbUsername = "root";
        String dbPassword = "";
        String dbURL ="jdbc:mysql://localhost:3306/holidayhiatus?useTimezone=true&serverTimezone=UTC";
          Connection cn;
     
           ObservableList <String> options = FXCollections.observableArrayList();
        try {
            cn = DriverManager.getConnection(dbURL, dbUsername, dbPassword);
            options = FXCollections.observableArrayList();
            // Execute query and store result in a resultset
            ResultSet rs = cn.createStatement().executeQuery("SELECT * FROM categorie_board");
            while (rs.next()) {
                //get string from db,whichever way 
                
                options.add(rs.getString("titre"));
            }
        } catch (SQLException ex) {
            System.err.println("Error" + ex);
        }
        System.out.println(options);
        Categorie.setItems(null);
        Categorie.setItems(options);
        
    }
    @FXML
    private void addAction(ActionEvent event) {
        
        try{
            CrudCategorie c=new CrudCategorie();
        String titre= Titre.getText();
     String lien_pic = pic.getText();
     String nom=Categorie.getSelectionModel().getSelectedItem();  
     int id=c.CategorieBoardIdOf(nom);

     Board b = new Board(1,id,titre,lien_pic);
     
     CrudBoard pg = new CrudBoard();
     pg.AjoutereBoard(b);   
 FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherBoard.fxml"));
 Parent root= loader.load();
  AfficherBoardController ac=loader.getController();
            Titre.getScene().setRoot(root);
                 } catch (IOException ex) {
            Logger.getLogger(AjouterBoardController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
