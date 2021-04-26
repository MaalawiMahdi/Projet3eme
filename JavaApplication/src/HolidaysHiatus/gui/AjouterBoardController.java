/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;
 
import HolidaysHiatus.services.*;
import HolidaysHiatus.entities.*;
import HolidaysHiatus.tools.Session;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.net.URL;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.NoSuchElementException;
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
import javafx.scene.control.MenuItem;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.layout.AnchorPane;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import javax.imageio.ImageIO;
import org.apache.commons.io.FilenameUtils;
import org.controlsfx.control.Notifications;




/**
 * FXML Controller class
 *
 * @author AMINE
 */
public class AjouterBoardController implements Initializable {

    @FXML
    private TextField Titre;
    @FXML
    private Button ajouter;
    @FXML
    private ComboBox<String> Categorie;
    @FXML
    private Label id_ID;
    
    
     Board b = new Board();
    @FXML
    private Button img;
    @FXML
    private Hyperlink btn_board;
    @FXML
    private Hyperlink comptebusinneslink;
    @FXML
    private MenuItem profil;
    @FXML
    private MenuItem deconnecter;
    @FXML
    private Hyperlink Acceuil;
    @FXML
    private Hyperlink btn_aide;
    @FXML
    private AnchorPane home;

    @FXML
    private void insert_image(ActionEvent event) {
        FileChooser fileChooser = new FileChooser();
        File selectedFile = fileChooser.showOpenDialog(new Stage());
                try {
                BufferedImage bufferedImage = ImageIO.read(selectedFile);
                Image image = SwingFXUtils.toFXImage(bufferedImage, null);
                String uniqueid = UUID.randomUUID().toString();
                System.out.println("\n" + uniqueid);
                
                System.out.println(selectedFile.getPath());
                String extension= FilenameUtils.getExtension(selectedFile.getAbsolutePath());
              
                Path tmp = Files.move(Paths.get(selectedFile.getPath()),
                       Paths.get("C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\"+uniqueid+"."+extension));
              System.out.print(tmp);
               b.setPic(uniqueid+"."+extension);
                
                } catch (IOException ex) {
                    System.out.print(ex.getMessage());
                
            }
    }
    
    
 public void GetMin() throws SQLException
    {
               CrudCategorie c=new CrudCategorie();
               CrudBoard sp=new CrudBoard();
double min=100;
String titre="";
           ObservableList <Integer> options = FXCollections.observableArrayList();

            options = FXCollections.observableArrayList();
            // Execute query and store result in a resultset
            ResultSet rs = c.actualiserC();
            while (rs.next()) {
                //get string from db,whichever way 
                
                options.add(c.calculer_nombreint(rs.getInt(1)));
               if(c.calculer_nombre(rs.getInt(1))<min)
           {   min=c.calculer_nombre(rs.getInt(1));
           titre=rs.getString("titre");}
            }
                    
            Notifications.create().text("Categorie Ajouter\n")
                    .text(titre+" est la categorie qui a le nombre Minimal des Boards")
                    .darkStyle().showWarning();
        System.out.println(titre+" est la categorie qui a le nombre Minimal des Boards");
        System.out.println(options);
  
        
    }
    /**
     * Initializes the controller class.
     */
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
                   Actualisercombox();

        try {
            // TODO
            GetMin();
        } catch (SQLException ex) {
            Logger.getLogger(AjouterBoardController.class.getName()).log(Level.SEVERE, null, ex);
        }
       
    }    
    public void Actualisercombox()
    {
                    CrudCategorie c=new CrudCategorie();

       
           ObservableList <String> options = FXCollections.observableArrayList();
        try {
            options = FXCollections.observableArrayList();
            // Execute query and store result in a resultset
            ResultSet rs = c.actualiser();
            while (rs.next()) {
                //get string from db,whichever way 
                
                options.add(rs.getString("titre"));
            }
        } catch (SQLException ex) {
            System.err.println("Error" + ex);
        }
        System.out.println(options);
        Categorie.setItems(null);
        Categorie.setItems(options);
        
    }
    @FXML
    private void addAction(ActionEvent event) {
        
        try{
            CrudCategorie c=new CrudCategorie();
        b.setTitre( Titre.getText());
     String nom=Categorie.getSelectionModel().getSelectedItem();  
     int id=c.CategorieBoardIdOf(nom);
    b.setCategorie_id(id);
b.setSociete_id(Session.getSession().getSessionSociete().getId());
     CrudBoard pg = new CrudBoard();
     pg.AjoutereBoard(b);   
 FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageBackSociete.fxml"));
 Parent root= loader.load();
            Titre.getScene().setRoot(root);
                 } catch (IOException ex) {
            Logger.getLogger(AjouterBoardController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    @FXML
    private void envoiAccueil(ActionEvent event) {
            try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageFront.fxml"));
           Parent root= loader.load();
            ajouter.getScene().setRoot(root);
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
            ajouter.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
        }else{
            try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("AjouterBoard.fxml"));
           Parent root= loader.load();
            ajouter.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
        
        }
        }else{
            try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionSociete.fxml"));
           Parent root= loader.load();
            ajouter.getScene().setRoot(root);
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
            ajouter.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void profil(ActionEvent event) {
       try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("profil.fxml"));
     Parent root= loader.load();
            ajouter.getScene().setRoot(root);
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
              ajouter.getScene().setRoot(root);
          } catch (IOException ex) {
              Logger.getLogger(AfficherAideDetailsFrontController.class.getName()).log(Level.SEVERE, null, ex);
          }
       
    }

    @FXML
    private void envoi_board(ActionEvent event) {
           try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherBoardClient.fxml"));
     Parent root= loader.load();
            ajouter.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
