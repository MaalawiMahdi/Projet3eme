/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import java.net.URL;
import java.util.ResourceBundle;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import HolidaysHiatus.entities.CategorieAide;
import HolidaysHiatus.services.CategorieAideCrud;
import HolidaysHiatus.tools.PDFutil;
import com.lowagie.text.DocumentException;
import com.lowagie.text.Image;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.collections.transformation.FilteredList;
import javafx.collections.transformation.SortedList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Insets;
import javafx.print.PrinterJob;
import javafx.scene.Parent;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.ButtonType;
import javafx.scene.control.Label;
import javafx.scene.control.ScrollPane;
import javafx.scene.control.cell.TextFieldTableCell;
import javafx.scene.input.KeyEvent;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.GridPane;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class AfficherCategorieAideController implements Initializable {

   
    @FXML
    private Button btn1;
  
    @FXML
    private TextField id_recherche;
    @FXML
    private Button btn_pdf;
  
    

    @FXML
    private Hyperlink btn_Cat_Aide;
   
    @FXML
    private Hyperlink btn_Aide;
    @FXML
    private ScrollPane scroll;
    @FXML
    private GridPane grid;
    private List<CategorieAide> data;
    @FXML
    private Hyperlink cat_Stat;
    @FXML
    private Hyperlink stat_aide;

 


    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {

   
          data = new ArrayList();

        CategorieAideCrud CategoriesAides = new CategorieAideCrud();

        CategoriesAides.afficherCategorieAide().forEach((c) -> {

            data.add(c);

        });
      
        int column=1;
        int row=0;
          try {
        for(int i=0; i<data.size();i++){
          
         
                
                FXMLLoader fxmlLoader = new FXMLLoader();
               
                fxmlLoader.setLocation(getClass().getResource("TabCatAideBack.fxml"));
                AnchorPane anchorPane=fxmlLoader.load();
                TabCatAideBackController cardController= fxmlLoader.getController();
                
                
                                                       

                    cardController.setDataCat(data.get(i));
                         row++;
                    
                    
                    grid.add(anchorPane,column,row);
                    
                    GridPane.setMargin(anchorPane,new Insets(2));
              
            } 
        } catch (IOException ex) {
                Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
            }
      
    }

    @FXML
    private void evoi_gestion_cat_Aide(ActionEvent event) {

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
            Logger.getLogger(HomepageBackController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void navigation_ajout(ActionEvent event) {
      
        try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AjouterCategorieAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            AjouterCategorieAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_tableUser.getSelectionModel().getSelectedItem().getId() + "");

            btn1.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
      
    }

     @FXML
    public void GeneratePdf() throws SQLException, IOException {
        PDFutil pdf = new PDFutil();
       
        try {
            pdf.listCategorieAide();
        } catch (FileNotFoundException ex) {
            Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
        } catch (DocumentException ex) {
            Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
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

            btn_Aide.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
     
    }

    @FXML
    private void chercher(KeyEvent event) {
        grid.getChildren().clear();
        String text = id_recherche.getText();
          data = new ArrayList();

        CategorieAideCrud CategoriesAides = new CategorieAideCrud();

        CategoriesAides.rechercherCategorieAide(text).forEach((c) -> {

            data.add(c);

        });
      
        int column=1;
        int row=0;
          try {
        for(int i=0; i<data.size();i++){
          
         
                
                FXMLLoader fxmlLoader = new FXMLLoader();
               
                fxmlLoader.setLocation(getClass().getResource("TabCatAideBack.fxml"));
                AnchorPane anchorPane=fxmlLoader.load();
                TabCatAideBackController cardController= fxmlLoader.getController();
                
                
                                                       

                    cardController.setDataCat(data.get(i));
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
