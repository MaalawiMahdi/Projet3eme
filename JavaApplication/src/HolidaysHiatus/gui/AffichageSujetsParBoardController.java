/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.services.SujetService;
import HolidaysHiatus.tools.Session;
import java.awt.Container;
import java.awt.Image;
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
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.MenuItem;
import javafx.scene.control.ScrollPane;
import javafx.scene.control.TextField;
import javafx.scene.image.ImageView;
import javafx.scene.input.KeyEvent;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author hp
 */
public class AffichageSujetsParBoardController implements Initializable {

    @FXML
    private Label id_ID;
    @FXML
    private AnchorPane home;
    public static  int boardid ;
    int usd = Session.getSession().getSessionUser().getId();
    
    public static int getBoardid() {
        return boardid;
    }

    public static void setBoardid(int boardid) {
        AffichageSujetsParBoardController.boardid = boardid;
    }

   

    
    @FXML
    private ScrollPane scroll;
    @FXML
    private TextField searchbar;
    @FXML
    private Button statboard;
    @FXML
    private Hyperlink btn_board;
    @FXML
    private Hyperlink btn_aide;
    @FXML
    private Hyperlink comptebusinneslink;
    @FXML
    private MenuItem profil;
    @FXML
    private MenuItem deconnecter;
    @FXML
    private Hyperlink Acceuil;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        
//config hyperlink
         if(Session.getSession().getSessionSociete()!=null){
        if(Session.getSession().getConnectedBoard()!=null){
                     comptebusinneslink.setText("Consulter votre board");
        }else{
                    comptebusinneslink.setText("Créer votre board");}
        }
        //end config 
// TODO

        AnchorPane ap = new AnchorPane();
        SujetService ss = new SujetService();
        for (int i = 0; i < ss.afficherSujetParBoard(boardid).size(); i++) {
            int id = ss.afficherSujetParBoard(boardid).get(i).getId();
            String chaine2 = "";
            chaine2 += "Titre :" + ss.afficherSujetParBoard(boardid).get(i).getTitre() + "\n";
            chaine2 += "Description : " + ss.afficherSujetParBoard(boardid).get(i).getDescription() + "\n";
            chaine2 += "\n";
            Button btn_Consulter = new Button("Consulter");
            Label chaine3 = new Label(chaine2);
            chaine3.setLayoutY(i * 80);
            btn_Consulter.setLayoutY(i * 80 + 55);
            btn_Consulter.setStyle("-fx-background-color:#ee5057; -fx-text-fill: white;");
            ap.getChildren().addAll(chaine3, btn_Consulter);
            btn_Consulter.setOnAction((ActionEvent event) -> {
                try {
                    FXMLLoader loader = new FXMLLoader(getClass().getResource("ConsulterSujet.fxml"));
                    Parent root = loader.load();
                    ConsulterSujetController ac = loader.getController();
                    ac.setT(ss.rechercheSujet(id).getTitre());

                    StringBuffer descriptionS = new StringBuffer(ss.rechercheSujet(id).getDescription());

                    int nbc = 80;
                    for (int x = 0; x < descriptionS.length(); x++) {
                        if (x == nbc) {
                            descriptionS.insert(x, "\n");
                            nbc += 80;
                        }
                    }
                    String ns = new String(descriptionS);
                    ac.setD(ns);
                    ac.setSujetid(id);
                    ac.setCurrentuserid(usd);
                    ac.CRUDcommentaire();
                    ac.Noter();
                    ac.affImg();
                    Scene scene = new Scene(root);
                    Stage stage = new Stage();
                    stage.setScene(scene);
                    stage.show();
                } catch (IOException ex) {
                    Logger.getLogger(AffichageSujetsParBoardController.class.getName()).log(Level.SEVERE, null, ex);
                }

            });
        }
        scroll.setContent(ap);
    }
        

    @FXML
    private void envoiAccueil(ActionEvent event) {
         try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageFront.fxml"));
           Parent root= loader.load();
            Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    
    }
        
    }

    @FXML
    private void search(KeyEvent event) {

        AnchorPane ap = new AnchorPane();
        SujetService ss = new SujetService();
        for (int i = 0; i < ss.Chercher(searchbar.getText(), boardid).size(); i++) {
            int id = ss.Chercher(searchbar.getText(), boardid).get(i).getId();
            String chaine2 = "";
            chaine2 += "Titre :" + ss.Chercher(searchbar.getText(), boardid).get(i).getTitre() + "\n";
            chaine2 += "Description : " + ss.Chercher(searchbar.getText(), boardid).get(i).getDescription() + "\n";
            chaine2 += "\n";
            Button btn_Consulter = new Button("Consulter");
            Label chaine3 = new Label(chaine2);
            chaine3.setLayoutY(i * 80);
            btn_Consulter.setLayoutY(i * 80 + 55);
            btn_Consulter.setStyle("-fx-background-color:#ee5057; -fx-text-fill: white;");
            ap.getChildren().addAll(chaine3, btn_Consulter);
            btn_Consulter.setOnAction((ActionEvent event2) -> {
                try {
                    FXMLLoader loader = new FXMLLoader(getClass().getResource("ConsulterSujet.fxml"));
                    Parent root = loader.load();
                    ConsulterSujetController ac = loader.getController();
                    ac.setT(ss.rechercheSujet(id).getTitre());

                    StringBuffer descriptionS = new StringBuffer(ss.rechercheSujet(id).getDescription());

                    int nbc = 80;
                    for (int x = 0; x < descriptionS.length(); x++) {
                        if (x == nbc) {
                            descriptionS.insert(x, "\n");
                            nbc += 80;
                        }
                    }
                    String ns = new String(descriptionS);
                    ac.setD(ns);
                    ac.setSujetid(id);
                    ac.setCurrentuserid(usd);
                    ac.CRUDcommentaire();
                    ac.Noter();
                    ac.affImg();
                    Scene scene = new Scene(root);
                    Stage stage = new Stage();
                    stage.setScene(scene);
                    stage.show();
                } catch (IOException ex) {
                    Logger.getLogger(AffichageSujetsParBoardController.class.getName()).log(Level.SEVERE, null, ex);
                }

            });
        }
        scroll.setContent(ap);
    }

    @FXML
    private void goToStat(MouseEvent event) {

        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("StatSujets.fxml"));
            Parent root = loader.load();
            StatSujetsController ss = loader.getController();
            ss.setBoardid(boardid);
            ss.stats();
            Scene sc = new Scene(root);
            Stage stg = new Stage();
            stg.setScene(sc);
            stg.show();
        } catch (IOException ex) {
            Logger.getLogger(AffichageSujetsParBoardController.class.getName()).log(Level.SEVERE, null, ex);
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
