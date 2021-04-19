/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.entities.CategorieAide;
import HolidaysHiatus.services.AideCrud;
import HolidaysHiatus.services.CategorieAideCrud;
import HolidaysHiatus.tools.PDFutil;
import com.lowagie.text.DocumentException;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.net.URL;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.collections.transformation.FilteredList;
import javafx.collections.transformation.SortedList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.scene.Parent;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ButtonType;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.ScrollPane;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.control.cell.TextFieldTableCell;
import javafx.scene.input.KeyEvent;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.GridPane;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class AfficherAideController implements Initializable {

    @FXML
    private Label id_ID;
   
    @FXML
    private Button btn1;
 
    @FXML
    private TextField id_recherche;
    @FXML
    private Button btn_pdf;
    @FXML
    private Hyperlink btn_cat_aide;
    @FXML
    private Hyperlink btn_aide;

    @FXML
    private ScrollPane scroll;
    @FXML
    private GridPane grid;
    private List<Aide> data;
    @FXML
    private Label titre;
    @FXML
    private Label categorie;
    @FXML
    private Label tell;
    @FXML
    private Hyperlink cat_Stat;
    @FXML
    private Hyperlink stat_aide;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {

        // TODO
       
        data = new ArrayList();
       
        AideCrud Aides = new AideCrud();
       

        Aides.afficherAide().forEach((a) -> {

            data.add(a);

        });
       
        int column=1;
        int row=0;
          try {
        for(int i=0; i<data.size();i++){
          
         
                
                FXMLLoader fxmlLoader = new FXMLLoader();
               
                fxmlLoader.setLocation(getClass().getResource("TabAideBack.fxml"));
                AnchorPane anchorPane=fxmlLoader.load();
                TabAideBackController cardController= fxmlLoader.getController();
                
                
                                                       

                    cardController.setDataAide(data.get(i));
                         row++;
                    
                    
                    grid.add(anchorPane,column,row);
                    
                    GridPane.setMargin(anchorPane,new Insets(2));
              
            } 
        } catch (IOException ex) {
                Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
            }
          

    }

  

    @FXML
    private void navigation_ajout(ActionEvent event) {

        try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AjouterAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            AjouterAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_tableUser.getSelectionModel().getSelectedItem().getId() + "");

            btn1.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AfficherAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    
    @FXML
    private void GeneratePdf(ActionEvent event) throws SQLException, IOException {
        PDFutil pdf = new PDFutil();

        try {
            pdf.listAide();
        } catch (FileNotFoundException ex) {
            Logger.getLogger(AfficherAideController.class.getName()).log(Level.SEVERE, null, ex);
        } catch (DocumentException ex) {
            Logger.getLogger(AfficherAideController.class.getName()).log(Level.SEVERE, null, ex);
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
            Logger.getLogger(AfficherAideController.class.getName()).log(Level.SEVERE, null, ex);
        }

    }

    @FXML
    private void envoi_aide(ActionEvent event) {
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
    private void  chercher(KeyEvent event) {
        grid.getChildren().clear();
        String search = id_recherche.getText();
         data = new ArrayList();

        AideCrud Aides = new AideCrud();

        Aides.rechercherAide(search).forEach((a) -> {

            data.add(a);
           

        });
        int column=1;
        int row=0;
          try {
        for(int i=0; i<data.size();i++){
          
         
                
                FXMLLoader fxmlLoader = new FXMLLoader();
               
                fxmlLoader.setLocation(getClass().getResource("TabAideBack.fxml"));
                AnchorPane anchorPane=fxmlLoader.load();
                TabAideBackController cardController= fxmlLoader.getController();
                
                
                                                       

                    cardController.setDataAide(data.get(i));
                         row++;
                    
                    
                    grid.add(anchorPane,column,row);
                    
                    GridPane.setMargin(anchorPane,new Insets(2));
              
            } 
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

   
}
