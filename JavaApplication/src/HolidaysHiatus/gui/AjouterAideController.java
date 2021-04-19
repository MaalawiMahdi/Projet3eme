/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.services.AideCrud;
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
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.embed.swing.SwingFXUtils;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
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
public class AjouterAideController implements Initializable {

    @FXML
    private Label id_ID;
    @FXML
    private TextField titre;
    @FXML
    private Button btn_ajout;
    @FXML
    private Button btn_retour;
    @FXML
    private TextField Adresse;
    @FXML
    private TextField Description;
    @FXML
    private ComboBox<String> Categorie_Aide;
      ObservableList<String> catAide = FXCollections.observableArrayList();
    @FXML
    private Hyperlink btn_cat_aide;
    @FXML
    private TextField tell;
    @FXML
    private Button isert_image;
    @FXML
    private ImageView aide_image;
    
    Aide a = new Aide();    
    @FXML
    private Hyperlink cat_Stat;
    @FXML
    private Hyperlink stat_aide;
/**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        AideCrud Aides = new AideCrud();
        catAide.addAll(Aides.cherchercattitres());
       Categorie_Aide.setItems(catAide);
    }    

    @FXML
    private void ajout_Aide(ActionEvent event) {
        try {
            AideCrud Aides = new AideCrud();
            String ch = Categorie_Aide.getValue().toString();
           
            int id=Aides.chercherCatAideid(ch);
            a.setAdresse(Adresse.getText());
            a.setTitre(titre.getText());
            a.setDescription(Description.getText());
            a.setNum_tell(tell.getText());
            a.setCategorie_id(id);
     
                           
//      Logger.getLogger(StartPageController.class.getName()).log(Level.SEVERE, null, ex);
            Aides.AjouterAide(a);
            
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root;
            
            root = loader.load();
            //récupération du controller lier au fichier fxml 
            AfficherAideController dpc = loader.getController();
            //             dpc.setLbMessage(id_act.getText());

            btn_ajout.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AjouterAideController.class.getName()).log(Level.SEVERE, null, ex);
        }

        

    }

    @FXML
    private void navigation_affich(ActionEvent event) {
        try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root;
            
            root = loader.load();
            //récupération du controller lier au fichier fxml 
            AfficherAideController dpc = loader.getController();
            //             dpc.setLbMessage(id_act.getText());

            btn_retour.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AjouterAideController.class.getName()).log(Level.SEVERE, null, ex);
        }

     
          
       
    }

    @FXML
    private void envoi_cat_aide(ActionEvent event) {
          
        try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorieAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            AfficherCategorieAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");

            btn_cat_aide.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AjouterAideController.class.getName()).log(Level.SEVERE, null, ex);
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
              
               
              a.setLien_image(uniqueid+"."+extension);
                
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
    
}
