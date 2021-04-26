/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;
import HolidaysHiatus.entities.*;
import HolidaysHiatus.services.*;
import HolidaysHiatus.tools.Session;
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
import javafx.collections.ListChangeListener;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.Hyperlink;
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
    @FXML
    private Hyperlink deconnecter;
    @FXML
    private Hyperlink gestionuser;
    @FXML
    private Hyperlink gestionsociete;
    @FXML
    private Hyperlink btn_Cat_Aide;
    @FXML
    private Hyperlink btn_aide;
    @FXML
    private Hyperlink cat_Stat;
    @FXML
    private Hyperlink stat_aide;
    @FXML
    private Hyperlink btn_Board;
    @FXML
    private Hyperlink btn_cat_Board;

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
     @FXML
    private void envoi_gestion_board(ActionEvent event) {
               try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherBoard.fxml"));
     Parent root= loader.load();
            deconnecter.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
        
    }

    @FXML
    private void envoi_gestion_cat_board(ActionEvent event) {
              try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorie.fxml"));
     Parent root= loader.load();
            deconnecter.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
        
    }

    @FXML
    private void deconneecter(ActionEvent event) {
                                            Session.getSession().clearSession();
              try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionConnexion.fxml"));
     Parent root= loader.load();
            deconnecter.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void gestionuser(ActionEvent event) {
        try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageBackGestionUser.fxml"));
           Parent root= loader.load();
            gestionuser.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
    }

    @FXML
    private void gestionsociete(ActionEvent event) {
          try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageBackGestionSociete.fxml"));
           Parent root= loader.load();
            gestionsociete.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
    }

    @FXML
    private void envoi_Cat_Aide(ActionEvent event) {
           try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorieAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            AfficherCategorieAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");

            btn_Cat_Aide.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AfficherAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void envoi_Aide(ActionEvent event) {
           try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            AfficherAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");

            btn_aide.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void envoi_cat_Stat(ActionEvent event) {
           try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("StatistiqueCategorieAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            StatistiqueCategorieAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");

            stat_aide.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(HomepageBackController.class.getName()).log(Level.SEVERE, null, ex);
        }
        
    }

    @FXML
    private void envoi_statAide(ActionEvent event) {
          try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("StatistiqueAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            StatistiqueAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");

            stat_aide.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(HomepageBackController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

}
