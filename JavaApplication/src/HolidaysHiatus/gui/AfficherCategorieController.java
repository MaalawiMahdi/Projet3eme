/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;
import HolidaysHiatus.entities.*;
import HolidaysHiatus.services.*;


import java.net.URL;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ListChangeListener;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author AMINE
 */
public class AfficherCategorieController implements Initializable {

    @FXML
    private TableColumn<CategorieBoard, Integer> id;
    @FXML
    private TextField Titre;
    @FXML
    private Button gsuppspe;
    @FXML
    private ComboBox<Integer> gcombosupp;
    @FXML
    private Button gmofiersp;
    @FXML
    private TextField idCat;
    @FXML
    private TableColumn<CategorieBoard, String> Pic;
    @FXML
    private TableView<CategorieBoard> Tableboard;
    @FXML
    private TableColumn<CategorieBoard, String> titre;
    @FXML
    private TextField pic;
    @FXML
    private Label id_ID;

    /**
     * Initializes the controller class.
     */
    
        public void afficher()
    {
          CrudCategorie b= new CrudCategorie();      
      ObservableList<CategorieBoard> list = FXCollections.observableArrayList();
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        titre.setCellValueFactory(new PropertyValueFactory<>("titre"));
        Pic.setCellValueFactory(new PropertyValueFactory<>("pic"));
       
        list.addAll(b.AfficherBoard());
      Tableboard.setItems(list);
    }
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        afficher();
        Actualisercombox();
        ObservableList selectedCells = Tableboard.getSelectionModel().getSelectedCells();
        selectedCells.addListener(new ListChangeListener() {
            @Override
            public void onChanged(ListChangeListener.Change c) {
CategorieBoard CategorieBoardSelected =  Tableboard.getSelectionModel().getSelectedItem();
                System.out.println("selected Board value " + CategorieBoardSelected);
                         CrudBoard b= new CrudBoard();      

                if(CategorieBoardSelected!=null){
                    
                     gmofiersp.setDisable(false);
                    String a=String.valueOf(CategorieBoardSelected.getId());
                    idCat.setText(a);
                    Titre.setText(CategorieBoardSelected.getTitre());
                        pic.setText(CategorieBoardSelected.getPic());
                       // afficher();

                }else{
                gmofiersp.setDisable(true);
                idCat.clear();
                Titre.clear();
               pic.clear();
    }    }
        });
                }
public void Actualisercombox()
    {
                        CrudCategorie sp = new CrudCategorie();

           ObservableList <Integer> options = FXCollections.observableArrayList();
        try {
            options = FXCollections.observableArrayList();
            // Execute query and store result in a resultset
            ResultSet rs = sp.actualiser();
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
    private void SupprimerSpecialite(ActionEvent event) {
                  CrudCategorie sp = new CrudCategorie();
        CategorieBoard l = new CategorieBoard();

//    String id = gid.getText();
//        l.setId_membre(Integer.parseInt(id));
        System.out.println( "id selected " + gcombosupp.getSelectionModel().getSelectedItem());
        l.setId(gcombosupp.getSelectionModel().getSelectedItem());
        sp.supprimer(l);
        afficher();
        Actualisercombox();
    }

    @FXML
    private void ModfierSpecialite(ActionEvent event) {
           CrudCategorie sp = new CrudCategorie();
       String s = idCat.getText();
        int si = Integer.parseInt(s);
  
        
                   
       // String datee = String.valueOf(gdate.getValue());
     
        
       sp.modifier(new CategorieBoard(si,Titre.getText(), pic.getText()));
        JOptionPane.showMessageDialog(null, "Categorie modifiée !");
     afficher();
      Actualisercombox();
    }
    
}
