/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;
 
import HolidaysHiatus.services.*;
import HolidaysHiatus.entities.*;
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
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
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
                       Paths.get("C:\\Users\\AMINE\\Projet3eme\\SymfonyApplication\\public\\"+uniqueid+"."+extension));
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

     CrudBoard pg = new CrudBoard();
     pg.AjoutereBoard(b);   
 FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherBoardClient.fxml"));
 Parent root= loader.load();
  AfficherBoardClientController ac=loader.getController();
            Titre.getScene().setRoot(root);
                 } catch (IOException ex) {
            Logger.getLogger(AjouterBoardController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
