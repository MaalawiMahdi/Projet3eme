/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.Categorie;
import HolidaysHiatus.services.CategorieCRUD;
import HolidaysHiatus.tools.Session;
import java.io.IOException;
import java.net.URL;
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
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.input.KeyEvent;

/**
 * FXML Controller class
 *
 * @author DELL
 */
public class GestionCategorieController implements Initializable {

    @FXML
    private TableView<Categorie> tvcategorie;
    @FXML
    private Button btnajout;
    @FXML
    private Button btnmodif;
    @FXML
    private Button btnsupp;
    @FXML
    private TableColumn<Categorie, String> nomcat;
    @FXML
    private TextField ajouternomcat;
    @FXML
    private TableColumn<Categorie, Integer> idcat;
    @FXML
    private TextField catmodifierval;
    @FXML
    private TextField chercher;
    private int  boardId;
    @FXML
    private Hyperlink GestionDesCategoriesProduitsServices;
    @FXML
    private Hyperlink backSocieteProduitService;
    @FXML
    private Label id_ID;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        boardId=  boardId=Session.getSession().getConnectedBoard().getId();

        CategorieCRUD CService= new CategorieCRUD();      
      ObservableList<Categorie> list = FXCollections.observableArrayList();
        nomcat.setCellValueFactory(new PropertyValueFactory<>("nom"));
        idcat.setCellValueFactory(new PropertyValueFactory<>("id"));
        System.out.println(list.getClass());
        

        list.addAll(CService.displayCategorie(boardId));
      tvcategorie.setItems(list);
      ObservableList selectedCells = tvcategorie.getSelectionModel().getSelectedCells();
        selectedCells.addListener(new ListChangeListener() {
            @Override
            public void onChanged(ListChangeListener.Change c) {
                Categorie catselected = (Categorie) tvcategorie.getSelectionModel().getSelectedItem();
                System.out.println("selected value " + catselected);
                if(catselected!=null){
                btnsupp.setDisable(false);
               btnmodif.setDisable(false);
               catmodifierval.setOpacity(1);
               catmodifierval.setText(catselected.getNom());
               
                
                }else{
                btnsupp.setDisable(true);
                 btnmodif.setDisable(true);
                 catmodifierval.setOpacity(0);
                 


                }
            }
           
        });
    }    

   

    @FXML
    private void AjouterCat(ActionEvent event) {
      CategorieCRUD CService= new CategorieCRUD();      
     if(ajouternomcat.getText().compareTo("")==0)
     {
      Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("le champ nom est obligatoire"); 
        alert.setHeaderText("");
        alert.setContentText(" le champ nom est obligatoire !");
        alert.showAndWait();
     }else{
     CService.ajouterCategorie(new Categorie(null,ajouternomcat.getText(),boardId));
      ObservableList<Categorie> list = FXCollections.observableArrayList();
   nomcat.setCellValueFactory(new PropertyValueFactory<>("nom"));
        idcat.setCellValueFactory(new PropertyValueFactory<>("id"));
        list.addAll(CService.displayCategorie(boardId));
      tvcategorie.setItems(list);
      ajouternomcat.clear();
       
     }
         }


    @FXML
    private void supprimercat(ActionEvent event) {
                    Categorie catselected = (Categorie) tvcategorie.getSelectionModel().getSelectedItem();
    
      CategorieCRUD CService= new CategorieCRUD();      
      CService.supprimerCategorie(catselected);
      ObservableList<Categorie> list = FXCollections.observableArrayList();
   nomcat.setCellValueFactory(new PropertyValueFactory<>("nom"));
        idcat.setCellValueFactory(new PropertyValueFactory<>("id"));        
        list.addAll(CService.displayCategorie(boardId));
      tvcategorie.setItems(list);
      
    }

    @FXML
    private void modifiercat(ActionEvent event) {
         Categorie catselected = (Categorie) tvcategorie.getSelectionModel().getSelectedItem();
    catselected.setNom(catmodifierval.getText());
      CategorieCRUD CService= new CategorieCRUD();      
      CService.modifierCategorie(catselected);
      ObservableList<Categorie> list = FXCollections.observableArrayList();
   nomcat.setCellValueFactory(new PropertyValueFactory<>("nom"));
        idcat.setCellValueFactory(new PropertyValueFactory<>("id"));        
        list.addAll(CService.displayCategorie(boardId));
      tvcategorie.setItems(list);
    }


    @FXML
    private void chercher(KeyEvent event) {
         System.out.println("chercher ");
      CategorieCRUD CService= new CategorieCRUD();      
      ObservableList<Categorie> list = FXCollections.observableArrayList();
      list.addAll(CService.Chercher(chercher.getText(),boardId));
    tvcategorie.setItems(list);
      System.out.print("list value \n " + list);
    }

    @FXML
    private void produitservice(ActionEvent event) {
            try{
                FXMLLoader loader = new FXMLLoader(getClass().getResource("GestionProduitService.fxml"));
           Parent root= loader.load();
            chercher.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(GestionCategorieController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
    }
    @FXML
    private void GestionDesCategoriesProduitsServices(ActionEvent event) {
         try{
                FXMLLoader loader = new FXMLLoader(getClass().getResource("GestionCategorie.fxml"));
           Parent root= loader.load();
            chercher.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(GestionCategorieController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
    }

    @FXML
    private void GestionSujet(ActionEvent event) {
        try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherSujet.fxml"));
           Parent root= loader.load();
            id_ID.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void deconnecter(ActionEvent event) {
        Session.StartSession().clearSession();
              try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionConnexion.fxml"));
     Parent root= loader.load();
            id_ID.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
}
