/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.Livraison;
import HolidaysHiatus.services.LivraisonService;
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
import javafx.scene.control.ComboBox;
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
 * @author mahdi
 */
public class LivraisonBackController implements Initializable {

    @FXML
    private Hyperlink gestionsociete;
    @FXML
    private Label id_ID;
    @FXML
    private TableView<Livraison> tableview;
    @FXML
    private TableColumn<Livraison, Integer> id;
    @FXML
    private Button supprimer;
    @FXML
    private TextField recherche;
    @FXML
    private Hyperlink deconnecter;
    @FXML
    private TableColumn<Livraison, String> type_id;
    @FXML
    private TableColumn<Livraison,Float> prix_id;
    @FXML
    private TableColumn<Livraison,Boolean> etat_id;
    @FXML
    private TextField typevalue;
    @FXML
    private TextField prixvalue;
    @FXML
    private Button ajouterButton;
    @FXML
    private Button fin;
    @FXML
    private Button modifier;
    @FXML
    private Hyperlink gestionuser;
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
    @Override
    public void initialize(URL url, ResourceBundle rb) {
                        fin.setDisable(true);

LivraisonService Ls= new LivraisonService();      
      ObservableList<Livraison> list = FXCollections.observableArrayList();
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        type_id.setCellValueFactory(new PropertyValueFactory<>("type"));
        prix_id.setCellValueFactory(new PropertyValueFactory<>("prix"));
        etat_id.setCellValueFactory(new PropertyValueFactory<>("etat"));
        list.addAll(Ls.AfficherLivraison());   
    tableview.setItems(list);   
    ObservableList selectedCells = tableview.getSelectionModel().getSelectedCells();
        selectedCells.addListener(new ListChangeListener() {
            @Override
            public void onChanged(ListChangeListener.Change c) {
              Livraison SelectedLivraison = (Livraison) tableview.getSelectionModel().getSelectedItem();

        if(SelectedLivraison!=null){
        supprimer.setDisable(false);
        modifier.setDisable(false);
        prixvalue.setText(String.valueOf(SelectedLivraison.getPrix()));
        typevalue.setText(SelectedLivraison.getType());
        ajouterButton.setDisable(true);
        if(SelectedLivraison.getEtat()==false){
                fin.setDisable(false);

        }else{
                fin.setDisable(true);
        }
    }else{
              supprimer.setDisable(true);
            fin.setDisable(true);
        modifier.setDisable(true);
        prixvalue.clear();
        typevalue.clear();
        ajouterButton.setDisable(false);
       
  

    }}
        });

    }    

    

    @FXML
    private void supprimer(ActionEvent event) {
        Livraison SelectedLivraison = (Livraison) tableview.getSelectionModel().getSelectedItem();
    LivraisonService Ls = new LivraisonService();
Ls.Supprimer(SelectedLivraison);    
refresh_table();
    }

    @FXML
    private void chercher(KeyEvent event) {
    }



    @FXML
    private void ajouter(ActionEvent event) {
      //    public Livraison(String Type, Float Prix, Boolean Etat) {

        Livraison  l = new Livraison(typevalue.getText(),Float.parseFloat(prixvalue.getText()),false);
       LivraisonService ls = new LivraisonService();
  if(typevalue.getText().compareTo("")==0||prixvalue.getText().compareTo("")==0){
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("un ou plusieurs champs sont manquants"); 
        alert.setHeaderText("un ou plusieurs champs sont manquants ");
        alert.setContentText("les champs type  et prix sont obligatoires !");
        alert.showAndWait();
        return;
        }else{       ls.ajouterLivraison(l);
        refresh_table();
        typevalue.clear();
        prixvalue.clear();
        
  }
    }
 public void refresh_table(){
 LivraisonService Ls= new LivraisonService();      
      ObservableList<Livraison> list = FXCollections.observableArrayList();
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        type_id.setCellValueFactory(new PropertyValueFactory<>("type"));
        prix_id.setCellValueFactory(new PropertyValueFactory<>("prix"));
        etat_id.setCellValueFactory(new PropertyValueFactory<>("etat"));
        list.addAll(Ls.AfficherLivraison());   
    tableview.setItems(list);   
 }   

    @FXML
    private void fin(ActionEvent event) {
        Livraison SelectedLivraison = (Livraison) tableview.getSelectionModel().getSelectedItem();
    LivraisonService Ls = new LivraisonService();
Ls.fin(SelectedLivraison);    
refresh_table();
    }

    @FXML
    private void modifier(ActionEvent event) {
    
       Livraison SelectedLivraison = (Livraison) tableview.getSelectionModel().getSelectedItem();
         LivraisonService ls = new LivraisonService();
        if(typevalue.getText().compareTo("")==0||prixvalue.getText().compareTo("")==0){
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("un ou plusieurs champs sont manquants"); 
        alert.setHeaderText("un ou plusieurs champs sont manquants ");
        alert.setContentText("les champs type  et prix sont obligatoires !");
        alert.showAndWait();
        return;
        }else{       SelectedLivraison.setPrix(Float.parseFloat(prixvalue.getText()));
        SelectedLivraison.setType(typevalue.getText());
        ls.modifier(SelectedLivraison);
        refresh_table();
        typevalue.clear();
        prixvalue.clear();
        
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
            Logger.getLogger(HomepageBackController.class.getName()).log(Level.SEVERE, null, ex);
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
            Logger.getLogger(HomepageBackController.class.getName()).log(Level.SEVERE, null, ex);
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
    private void gestionCommande(ActionEvent event) {
     try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("CommandeBack.fxml"));
           Parent root= loader.load();
            gestionsociete.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(CommandeBackController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
    }

    @FXML
    private void gestionLivraison(ActionEvent event) {
         try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("LivraisonBack.fxml"));
           Parent root= loader.load();
            gestionsociete.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(CommandeBackController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
    }

    @FXML
    private void deconneecter(ActionEvent event) {
        Session.getSession().clearSession();
              try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionConnexion.fxml"));
     Parent root= loader.load();
            gestionuser.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
