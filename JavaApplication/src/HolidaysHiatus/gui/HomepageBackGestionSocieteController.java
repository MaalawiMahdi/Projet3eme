/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.Societe;
import HolidaysHiatus.services.SocieteService;
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
 * @author ASUS
 */
public class HomepageBackGestionSocieteController implements Initializable {

    @FXML
    private Label id_ID;
    @FXML
    private TableView<Societe> tableview;
    @FXML
    private TableColumn<Societe, Integer> id;
    @FXML
    private TableColumn<Societe, Integer> useraccount_id;
    @FXML
    private TableColumn<Societe,String> nom;
    @FXML
    private TableColumn<Societe,String> numregistre;
    @FXML
    private TableColumn<Societe,String> adresse;
    @FXML
    private TableColumn<Societe,Boolean> etat;
    @FXML
    private TableColumn<Societe, String> type;
    
    @FXML
    private TextField recherche;
    @FXML
    private Hyperlink deconnecter;
  
    @FXML
    private Button supprimer;
    @FXML
    private Button Confirmer;
    @FXML
    private Hyperlink gestionuser;
     /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        SocieteService SctService= new SocieteService();      
      ObservableList<Societe> list = FXCollections.observableArrayList();
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        useraccount_id.setCellValueFactory(new PropertyValueFactory<>("useraccount_id"));
        nom.setCellValueFactory(new PropertyValueFactory<>("nom"));
        numregistre.setCellValueFactory(new PropertyValueFactory<>("numregistre"));
        adresse.setCellValueFactory(new PropertyValueFactory<>("adresse"));
        etat.setCellValueFactory(new PropertyValueFactory<>("etat"));
        type.setCellValueFactory(new PropertyValueFactory<>("type"));
        list.addAll(SctService.AfficherSocietes());
      tableview.setItems(list);
      Confirmer.setOpacity(0);
      
       ObservableList selectedCells = tableview.getSelectionModel().getSelectedCells();
        selectedCells.addListener(new ListChangeListener() {
            @Override
            public void onChanged(ListChangeListener.Change c) {
                Societe SocieteSelected =  tableview.getSelectionModel().getSelectedItem();
                System.out.println("selected societe value " + SocieteSelected);
                if(SocieteSelected!=null){
                     supprimer.setDisable(false);
                     if(SocieteSelected.isEtat()==false){
                     Confirmer.setDisable(false);
                         Confirmer.setOpacity(1);
                     }else{
                      Confirmer.setDisable(true);
                      Confirmer.setOpacity(0);
                     }
                }else{
                supprimer.setDisable(true);
                     Confirmer.setDisable(true);
                
                Confirmer.setOpacity(0);
                }
            }
        });
    }
    public void refresh(){
       
       SocieteService SctService= new SocieteService();      
      ObservableList<Societe> list = FXCollections.observableArrayList();
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        useraccount_id.setCellValueFactory(new PropertyValueFactory<>("useraccount_id"));
        nom.setCellValueFactory(new PropertyValueFactory<>("nom"));
        numregistre.setCellValueFactory(new PropertyValueFactory<>("numregistre"));
        adresse.setCellValueFactory(new PropertyValueFactory<>("adresse"));
        etat.setCellValueFactory(new PropertyValueFactory<>("etat"));
        type.setCellValueFactory(new PropertyValueFactory<>("type"));
        list.addAll(SctService.AfficherSocietes());
      tableview.setItems(list);
     
    }
                
              
    @FXML
    private void supprimer(ActionEvent event) {
    }


    @FXML
    private void deconnecter(ActionEvent event) {
          Session.getSession().clearSession();
              try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionConnexion.fxml"));
     Parent root= loader.load();
            supprimer.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void confirmer(ActionEvent event) {
                Societe SocieteSelected =  tableview.getSelectionModel().getSelectedItem();
                System.out.println("selected societe value " + SocieteSelected);
                if(SocieteSelected!=null){
                SocieteService S_Service = new SocieteService();
                SocieteSelected.setEtat(true);
                S_Service.updateSociete(SocieteSelected);
                refresh();
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
    private void chercher(KeyEvent event) {
         System.out.println("Societe chercher ");
      SocieteService S_Service= new SocieteService();      
      ObservableList<Societe> list = FXCollections.observableArrayList();
      list.addAll(S_Service.Chercher(recherche.getText()));
      tableview.setItems(list);
      System.out.print("list societe value \n " + list);
         }

    
}
