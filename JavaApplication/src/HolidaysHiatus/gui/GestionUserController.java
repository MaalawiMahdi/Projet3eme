/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import com.mysql.cj.x.protobuf.MysqlxCrud.DataModel;
import HolidaysHiatus.entites.User;
import HolidaysHiatus.services.UserService;
import HolidaysHiatus.tools.BCrypt;
import HolidaysHiatus.tools.Session;
import java.io.IOException;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;
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
import javafx.scene.control.TableCell;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableColumn.CellEditEvent;
import javafx.scene.control.TablePosition;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.control.cell.TextFieldTableCell;
import javafx.util.Callback;

/**
 * FXML Controller class
 *
 * @author ASUS
 */
public class GestionUserController implements Initializable {

    @FXML
    private Hyperlink gestionuser;
    @FXML
    private Hyperlink gestionsociete;
    @FXML
    private TableView<Object> tableview;
    @FXML
    private TextField recherche;
    @FXML
    private TableColumn<User, Integer> id;
    @FXML
    private TableColumn<User, String> password;
    @FXML
    private TableColumn<User, String> type;
    @FXML
    private TableColumn<User, String> mail;
    @FXML
    private TableColumn<User, Integer> active;
    @FXML
    private TableColumn<User, Integer> ban;
    @FXML
    private Button supprimer;
    @FXML
    private Button bannir;
    @FXML
    private Hyperlink deconnecter;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
      UserService us= new UserService();      
      ObservableList<Object> list = FXCollections.observableArrayList();
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        password.setCellValueFactory(new PropertyValueFactory<>("password"));
        type.setCellValueFactory(new PropertyValueFactory<>("type"));
        mail.setCellValueFactory(new PropertyValueFactory<>("mail"));
        active.setCellValueFactory(new PropertyValueFactory<>("active"));
        ban.setCellValueFactory(new PropertyValueFactory<>("ban"));
        list.addAll(us.AfficherUsers());
      tableview.setItems(list);
      tableview.setEditable(true);
      password.setCellFactory(TextFieldTableCell.forTableColumn());
      mail.setCellFactory(TextFieldTableCell.forTableColumn());
      
       ObservableList selectedCells = tableview.getSelectionModel().getSelectedCells();
        selectedCells.addListener(new ListChangeListener() {
            @Override
            public void onChanged(Change c) {
                User uselected = (User) tableview.getSelectionModel().getSelectedItem();
                System.out.println("selected value " + uselected);
                if(uselected!=null){
                supprimer.setDisable(false);
                bannir.setDisable(false);
                if(uselected.isBan()){
                bannir.setText("restorer");
                }else{
                 bannir.setText("bannir");
    
                }
                }else{
                supprimer.setDisable(true);
                bannir.setDisable(true);
                }
            }
           
        });
      
    }    

    @FXML
    private void supprimer(ActionEvent event) {
                User uselected = (User) tableview.getSelectionModel().getSelectedItem();
                System.out.println("selected value " + uselected);
                UserService us= new UserService();
                us.SupprimerUser(uselected.getId()); 
               refrech();
    }

    @FXML
    private void ban(ActionEvent event) {
                User uselected = (User) tableview.getSelectionModel().getSelectedItem();
                System.out.println("selected value ban " + uselected);
                UserService us= new UserService();
                
                us.BanUser(uselected.getId(),!(uselected.isBan())); 
               refrech();
   }
    public void refrech(){
     UserService us= new UserService();      
      ObservableList<Object> list = FXCollections.observableArrayList();
      id.setCellValueFactory(new PropertyValueFactory<>("id"));
      password.setCellValueFactory(new PropertyValueFactory<>("password"));
      type.setCellValueFactory(new PropertyValueFactory<>("type"));
      mail.setCellValueFactory(new PropertyValueFactory<>("mail"));
      active.setCellValueFactory(new PropertyValueFactory<>("active"));
      ban.setCellValueFactory(new PropertyValueFactory<>("ban"));
      list.addAll(us.AfficherUsers());
      tableview.setItems(list);
      password.setCellFactory(TextFieldTableCell.forTableColumn());
      mail.setCellFactory(TextFieldTableCell.forTableColumn());
     bannir.setText("bannir");
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

    private void editPassword(CellEditEvent<User, String> event) {
        System.out.print(event.getRowValue());
        System.out.print(event.getNewValue());
        UserService us = new UserService();
        event.getRowValue().setPassword(BCrypt.hashpw(event.getNewValue(),BCrypt.gensalt()));
        us.UpdateUser(event.getRowValue());
        refrech();
        
        
    }

       @FXML

    private void editmail(CellEditEvent<User, String> event) {
    UserService us = new UserService();
        event.getRowValue().setMail(event.getNewValue());
        us.UpdateUser(event.getRowValue());
        refrech();
    }

 
   
    
}
