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
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Button;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import org.controlsfx.control.Notifications;

/**
 * FXML Controller class
 *
 * @author AMINE
 */
public class AjouterCategorieController implements Initializable {

    @FXML
    private TextField Titre;
    @FXML
    private TextField pic;
    @FXML
    private Button ajouter;
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
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        
        // TODO
        
        
    }    

    
    
    
    @FXML
    private void addAction(ActionEvent event) {
        try{    
        String titre= Titre.getText();
     String lien_pic = pic.getText();
     CategorieBoard b = new CategorieBoard(1,titre,lien_pic);
     CrudCategorie pg = new CrudCategorie();
     pg.AjoutereCategorie(b);
     FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorie.fxml"));
 Parent root= loader.load();
  AfficherCategorieController ac=loader.getController();
            Titre.getScene().setRoot(root);
            Notifications.create().text("Categorie Ajouter")
                    .text("La categorie " +titre+" a ete ajouter\n "+ lien_pic)
                    .darkStyle().showWarning();
             } catch (IOException ex) {
            Logger.getLogger(AjouterBoardController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void deconneecter(ActionEvent event) {
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
}
