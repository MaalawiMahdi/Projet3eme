/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;
import HolidaysHiatus.entities.*;
import HolidaysHiatus.services.*;


import javafx.scene.layout.StackPane;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.geometry.Insets;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.ToolBar;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.VBox;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.AnchorPane;
import javax.swing.JOptionPane;


/**
 * FXML Controller class
 *
 * @author AMINE
 */
public class AfficherBoardController implements Initializable {

    private TextField txtAfficher;
    @FXML
    private TableView<Board> Tableboard;
    @FXML
    private TableColumn<Board,Integer> id;
    @FXML
    private TableColumn<Board, Integer> categorie;
    
    @FXML
    private TableColumn<Board, String> titre;
    @FXML
    private TableColumn<Board, String> image;
    @FXML
    private ToolBar navbar;
    @FXML
    private ComboBox<Integer> gcombosupp;
    @FXML
    private Button gsuppspe;
    @FXML
    private Button gmofiersp;

    /**
     * Initializes the controller class.
     */
        PreparedStatement ste;
    Connection cnx;
    @FXML
    private TextField Titre;
    @FXML
    private TextField pic;
    private TextField Categorie;
    @FXML
    private TextField idBoard;
    @FXML
    private ComboBox<String> CategorieName;
    @FXML
    private Hyperlink btn_accueil;
    @FXML
    private Label id_ID;
    @FXML
    private AnchorPane home;
   
    
    public void afficher()
    {

          CrudBoard b= new CrudBoard();      
      ObservableList<Board> list = FXCollections.observableArrayList();
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        titre.setCellValueFactory(new PropertyValueFactory<>("titre"));
        image.setCellValueFactory(new PropertyValueFactory<>("pic"));
        categorie.setCellValueFactory(new PropertyValueFactory<>("categorie_id"));

        list.addAll(b.AfficherBoard());
      Tableboard.setItems(list);
    }
  
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
          afficher();
        ObservableList listt = navbar.getItems();
                  
             
                  CrudCategorie cg=new CrudCategorie();
                       List <CategorieBoard> CBoards  = new ArrayList();
                       CBoards=cg.AfficherBoard();
                        Button bt2 = new Button("Afficher tout");
                         listt.add(bt2);
                                               bt2.setOnAction(new EventHandler<ActionEvent>() {
                                                   @Override public void handle(ActionEvent e) {
                                                       afficher();
                                                   }
                                               });

         for (CategorieBoard C : CBoards) {
                   Button bt1 = new Button(C.getTitre());
                         listt.add(bt1);
                        
                      bt1.setOnAction(new EventHandler<ActionEvent>() {
    @Override public void handle(ActionEvent e) {
         CrudBoard b= new CrudBoard();      
      ObservableList<Board> list = FXCollections.observableArrayList();
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        titre.setCellValueFactory(new PropertyValueFactory<>("titre"));
        image.setCellValueFactory(new PropertyValueFactory<>("pic"));
        categorie.setCellValueFactory(new PropertyValueFactory<>("categorie_id"));
       
        list.addAll(b.AfficherBoardavance(C.id));
      Tableboard.setItems(list);
    }
});}
         
  afficher();
                     Actualisercombox();
                     Actualisercomboxname();

    }    
  public void Actualisercomboxname()
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
        CategorieName.setItems(null);
        CategorieName.setItems(options);
        
    }
    public void Actualisercombox()
    {
        //combobox
        String dbUsername = "root";
        String dbPassword = "";
        String dbURL ="jdbc:mysql://localhost:3306/holidayhiatus?useTimezone=true&serverTimezone=UTC";
          Connection cn;
     
           ObservableList <Integer> options = FXCollections.observableArrayList();
        try {
            cn = DriverManager.getConnection(dbURL, dbUsername, dbPassword);
            options = FXCollections.observableArrayList();
            // Execute query and store result in a resultset
            ResultSet rs = cn.createStatement().executeQuery("SELECT * FROM board");
            while (rs.next()) {
                //get string from db,whichever way 
                
                options.add(rs.getInt("id"));
            }
        } catch (SQLException ex) {
            System.err.println("Error" + ex);
        }
        System.out.println(options);
        gcombosupp.setItems(null);
        gcombosupp.setItems(options);
        
    }
    @FXML
    private void SupprimerBoard(ActionEvent event) {
            CrudBoard sp = new CrudBoard();
        Board l = new Board();

//    String id = gid.getText();
//        l.setId_membre(Integer.parseInt(id));
        System.out.println( "id selected " + gcombosupp.getSelectionModel().getSelectedItem());
        l.setId(gcombosupp.getSelectionModel().getSelectedItem());
        sp.supprimer(l);
        afficher();
        Actualisercombox();
                             Actualisercomboxname();

}

    @FXML
    private void ModfierBoard(ActionEvent event) {
          
            CrudBoard sp = new CrudBoard();
            CrudCategorie c=new CrudCategorie();

            String s = idBoard.getText();
        int si = Integer.parseInt(s);
            String nom=CategorieName.getSelectionModel().getSelectedItem();  
     int id=c.CategorieBoardIdOf(nom);
        
       
       // String datee = String.valueOf(gdate.getValue());
     
        
       sp.modifier(new Board(si,id, Titre.getText(), pic.getText()));
        JOptionPane.showMessageDialog(null, "Board modifiée !");
     afficher();
      Actualisercombox();
                            Actualisercomboxname();

    }

    @FXML
    private void envoiAccueil(ActionEvent event) {
    }
}
 