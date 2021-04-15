/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Aide;
import java.io.IOException;

import java.net.URL;
import java.util.ArrayList;
import java.util.List;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Button;
import javafx.scene.control.ChoiceBox;
import javafx.scene.control.ComboBox;
import javafx.scene.control.Label;
import javafx.scene.control.TextArea;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.text.Text;
import javafx.scene.text.TextFlow;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class CarddetailsNoteController implements Initializable {

    @FXML
    private ImageView moyenneImage;
    @FXML
    private Label titre;
    @FXML
    private TextFlow description;
    @FXML
    private Label adresse;
    @FXML
    private Label tell;
    @FXML
    private Label espace;
    @FXML
    private Label espace2;
    @FXML
    private ImageView noteImage;
    @FXML
    private ImageView image;
    @FXML
    private TextArea Avis;
    @FXML
    private Button Submit_Avis;
        Aide dataAide;
    @FXML
    private ComboBox<ImageView> Combo_Note;
  
    private ImageView imagev1=new ImageView("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\1star.PNG");
     private ImageView imagev2=new ImageView("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\2star.PNG");
     private ImageView imagev3=new ImageView("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\3star.PNG");
     private ImageView imagev4=new ImageView("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\4star.PNG");
     private ImageView imagev5=new ImageView("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\5star.PNG");
      
     ObservableList<ImageView> Stars = FXCollections.observableArrayList();

     
   List<Integer> lista = new ArrayList();

    
    public void setDataAide(Aide dataAide) {
        this.dataAide = dataAide;
        image.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\uploads\\" + dataAide.getLien_image()));
        titre.setText(dataAide.getTitre());
        description.getChildren().add(new Text(dataAide.getDescription()));
        adresse.setText(dataAide.getAdresse());
        tell.setText(dataAide.getNum_tell());
      /*  imagev1.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\1star.PNG"));
        imagev2.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\2star.PNG"));
        imagev3.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\3star.PNG"));
        imagev4.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\4star.PNG"));
        imagev5.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\5star.PNG"));*/
        Stars.addAll(imagev1, imagev2, imagev3, imagev4, imagev5);
        Combo_Note.setItems(Stars);
  
      
        espace.setId(Integer.toString(dataAide.getId()));
 }

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    
        

    }    

    @FXML
    private void Envoi_Note(ActionEvent event) {
         

        try {
            AfficherAideDetailsNoteController.seAideId(espace.getId());
            
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAideDetailsNote.fxml"));
            //récupération du root  à partir du fichier fxml
            
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            
            // AfficherAideDetailsNoteController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");
            espace.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(CarddetailsNoteController.class.getName()).log(Level.SEVERE, null, ex);
        }

            
        
        
    }

    @FXML
    private void Envoi_Avis(ActionEvent event) {
    }
    
}
