/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.CategorieAide;
import HolidaysHiatus.services.AideCrud;
import HolidaysHiatus.services.CategorieAideCrud;
import HolidaysHiatus.tools.Session;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.net.URL;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.ResourceBundle;
import java.util.UUID;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.embed.swing.SwingFXUtils;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Button;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import javax.imageio.ImageIO;
import org.apache.commons.io.FilenameUtils;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class AjouterCategorieAideController implements Initializable {

    @FXML
    private Label id_ID;
    @FXML
    private TextField titre;
    @FXML
    private Button btn_ajout;
    @FXML
    private Button btn_retour;
    @FXML
    private Hyperlink btn_Cat_Aide;
  
    @FXML
    private Button isert_image;
    @FXML
    private ImageView aide_image;
     CategorieAide c = new CategorieAide();
    @FXML
    private Hyperlink cat_Stat;
    @FXML
    private Hyperlink stat_aide;
    @FXML
    private Hyperlink gestionuser;
    @FXML
    private Hyperlink gestionsociete;
    @FXML
    private Hyperlink btn_aide;
    @FXML
    private Hyperlink deconnecter;
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
    private void ajout_CatAide(ActionEvent event) {
            CategorieAideCrud categories = new CategorieAideCrud();
            AideCrud Aides = new AideCrud();
            c.setTitre(titre.getText());
 
        //      Logger.getLogger(StartPageController.class.getName()).log(Level.SEVERE, null, ex);
        categories.AjouterCategorieAide(c);

        //récupération fichier fxml
        FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorieAide.fxml"));
        //récupération du root  à partir du fichier fxml
        Parent root;
        try {
            root = loader.load();
            //récupération du controller lier au fichier fxml 
            AfficherCategorieAideController dpc = loader.getController();
            //             dpc.setLbMessage(id_act.getText());

            btn_ajout.getScene().setRoot(root);

        } catch (IOException ex) {
            Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void navigation_affich(ActionEvent event) {
          //récupération fichier fxml
        FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorieAide.fxml"));
        //récupération du root  à partir du fichier fxml
        Parent root;
        try {
            root = loader.load();
            //récupération du controller lier au fichier fxml 
            AfficherCategorieAideController dpc = loader.getController();
            //             dpc.setLbMessage(id_act.getText());

            btn_retour.getScene().setRoot(root);

        } catch (IOException ex) {
            Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
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
            Logger.getLogger(AjouterCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
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
            Logger.getLogger(AjouterCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
       
    }

    @FXML
    private void insert_image(ActionEvent event) {
        FileChooser fileChooser = new FileChooser();
        File selectedFile = fileChooser.showOpenDialog(new Stage());
                try {
                BufferedImage bufferedImage = ImageIO.read(selectedFile);
                Image image = SwingFXUtils.toFXImage(bufferedImage, null);
                aide_image.setImage(image);
                String uniqueid = UUID.randomUUID().toString();
                System.out.println("\n" + uniqueid);
                
                System.out.println(selectedFile.getPath());
                String extension= FilenameUtils.getExtension(selectedFile.getAbsolutePath());
              
                Path tmp = Files.move(Paths.get(selectedFile.getPath()),
                       Paths.get("C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\uploads\\"+uniqueid+"."+extension));
              System.out.print(tmp);
              
               
              c.setLien_icon(uniqueid+"."+extension);
                
                } catch (IOException ex) {
                    System.out.print(ex.getMessage());
                
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
