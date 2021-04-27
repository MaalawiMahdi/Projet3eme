/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.Panier;
import HolidaysHiatus.entites.Societe;
import HolidaysHiatus.entites.User;
import HolidaysHiatus.entities.Board;
import HolidaysHiatus.services.CrudBoard;
import HolidaysHiatus.services.SocieteService;
import HolidaysHiatus.services.UserService;
import HolidaysHiatus.tools.Session;
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
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.MenuItem;
import javafx.scene.layout.AnchorPane;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class HomepageFrontController implements Initializable {

    @FXML
    private Label id_ID;
    @FXML
    private AnchorPane home;
    @FXML
    private MenuItem deconnecter;
    @FXML
    private MenuItem profil;
    @FXML
    private Hyperlink comptebusinneslink;
    @FXML
    private Hyperlink Acceuil;
    @FXML
    private Hyperlink btn_aide;
    @FXML
    private Hyperlink btn_board;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
    User u  = Session.getSession().getSessionUser();
    System.out.print(u);
    if (u.getType().compareTo("societe")==0){
       // comptebusinneslink.setText("Votre board ");
       SocieteService S_service = new SocieteService();
      Societe s = S_service.chercherparidclient(u.getId());
      Session.getSession().setSessionSociete(s);
      CrudBoard cboard = new CrudBoard();
      //Board b = cboard.getBoardBySocieteId(s.getId());

      if(cboard.getBoardBySocieteId(s.getId())!=null){
          Board b = cboard.getBoardBySocieteId(s.getId());
      Session.getSession().setConnectedBoard(b);
            comptebusinneslink.setText("Consulter votre board");
      }else{
            comptebusinneslink.setText("Créer votre board");
      
      }
    }
   
    
    }    

    @FXML
    private void envoiAccueil(ActionEvent event) {
            try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageFront.fxml"));
           Parent root= loader.load();
            Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    
    }}

    @FXML
    private void inscriptionbusiness(ActionEvent event) {    
        if(Session.getSession().getSessionSociete()!=null){
        if(Session.getSession().getConnectedBoard()!=null){
          try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageBackSociete.fxml"));
           Parent root= loader.load();
            Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
        }else{
            try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("AjouterBoard.fxml"));
           Parent root= loader.load();
            Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
        
        }
        }else{
            try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionSociete.fxml"));
           Parent root= loader.load();
            Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
        }
    }

    @FXML
    private void deconnecter(ActionEvent event) {
    Session.getSession().clearSession();
              try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionConnexion.fxml"));
     Parent root= loader.load();
            Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void profil(ActionEvent event) {
       try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("profil.fxml"));
     Parent root= loader.load();
            Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void envoi_aide(ActionEvent event) {
         try {
              //récupération fichier fxml
              
              FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorieAideFront.fxml"));
              //récupération du root  à partir du fichier fxml
              
              Parent root = loader.load();
              //récupération du controller lier au fichier fxml
              
              AfficherCategorieAideFrontController dpc = loader.getController();
              //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");
              btn_aide.getScene().setRoot(root);
          } catch (IOException ex) {
              Logger.getLogger(AfficherAideDetailsFrontController.class.getName()).log(Level.SEVERE, null, ex);
          }
       
    }

    @FXML
    private void envoi_board(ActionEvent event) {
           try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherBoardClient.fxml"));
     Parent root= loader.load();
            Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
}
