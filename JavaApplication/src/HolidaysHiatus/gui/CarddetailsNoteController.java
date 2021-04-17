/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.entities.NoteAide;
import HolidaysHiatus.services.AideCrud;
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
import static java.lang.Math.round;
import com.twilio.Twilio;
import com.twilio.rest.api.v2010.account.Message;
import com.twilio.type.PhoneNumber;
import com.lowagie.text.BadElementException;
import java.lang.String;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class CarddetailsNoteController implements Initializable {

    int userid = 7;
    float moyenne = 0;
    String Avi = "";
    int val = 0;
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
    AideCrud a = new AideCrud();

    private ImageView imagev1 = new ImageView("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\1star.PNG");
    private ImageView imagev2 = new ImageView("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\2star.PNG");
    private ImageView imagev3 = new ImageView("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\3star.PNG");
    private ImageView imagev4 = new ImageView("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\4star.PNG");
    private ImageView imagev5 = new ImageView("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\5star.PNG");

    ObservableList<ImageView> Stars = FXCollections.observableArrayList();

    List<Integer> lista = new ArrayList();

    public void setDataAide(Aide dataAide) {
        this.dataAide = dataAide;
        image.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\uploads\\" + dataAide.getLien_image()));
        titre.setText(dataAide.getTitre());
        description.getChildren().add(new Text(dataAide.getDescription()));
        adresse.setText(dataAide.getAdresse());
        tell.setText(dataAide.getNum_tell());
        Stars.addAll(imagev1, imagev2, imagev3, imagev4, imagev5);
        Combo_Note.setItems(Stars);
        espace.setId(Integer.toString(dataAide.getId()));

        moyenne = a.MoyenneNotes(dataAide.getId());
  
        if (round(moyenne) == 0) {
            moyenneImage.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\0star.PNG"));

        }
        if (round(moyenne) == 1) {
            moyenneImage.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\1star.PNG"));
        }
        if (round(moyenne) == 2) {
            moyenneImage.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\2star.PNG"));
        }
        if (round(moyenne) == 3) {
            moyenneImage.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\3star.PNG"));
        }
        if (round(moyenne) == 4) {
            moyenneImage.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\4star.PNG"));
        }
        if (round(moyenne) == 5) {
            moyenneImage.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\5star.PNG"));
        }
        NoteAide noteAide = a.getAideNoteAvis(userid, dataAide.getId());

        if (noteAide != null) {
            val = noteAide.getValeur();
            if (val == 0) {
                noteImage.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\0star.PNG"));
            }
            if (val == 1) {
                noteImage.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\1star.PNG"));
            }
            if (val == 2) {
                noteImage.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\2star.PNG"));
            }
            if (val == 3) {
                noteImage.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\3star.PNG"));
            }
            if (val == 4) {
                noteImage.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\4star.PNG"));
            }
            if (val == 5) {
                noteImage.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\5star.PNG"));
            }
        } else {
            noteImage.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\stars\\0star.PNG"));
        }
        if (noteAide != null) {
            if (noteAide.getAvis() != null) {
                Avi = noteAide.getAvis();
            }
        }
        Avis.setText(Avi);
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
      int valeur = Combo_Note.getSelectionModel().getSelectedIndex();
      NoteAide noteAide=a.getAideNoteAvis(userid,Integer.parseInt(espace.getId()));
      if (noteAide==null){
    
      a.setAideNoteAvis(valeur+1, "",userid, Integer.parseInt(espace.getId()));
         /* Twilio.init("ACdc4360a77acc10736d817d6d46b25865", "1c6704076476bfa7f33907040ff89232");
        Message message = Message.creator(
                new com.twilio.type.PhoneNumber("+21658899610"),
                new com.twilio.type.PhoneNumber("+14062045814"),
                "merci d'avoir noté l'aide " +dataAide.getTitre())
            .create();*/
        try {
            AfficherAideDetailsNoteController.seAideId(espace.getId());

            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAideDetailsNote.fxml"));
            //récupération du root  à partir du fichier fxml

            Parent root = loader.load();
            //récupération du controller lier au fichier fxml

            AfficherAideDetailsNoteController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");
            espace.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(CarddetailsNoteController.class.getName()).log(Level.SEVERE, null, ex);
        }}else
        {
    
      a.updateAideNoteAvis(valeur+1, "", noteAide.id);
      /* Twilio.init("ACdc4360a77acc10736d817d6d46b25865", "1c6704076476bfa7f33907040ff89232");
        Message message = Message.creator(
                new com.twilio.type.PhoneNumber("+21658899610"),
                new com.twilio.type.PhoneNumber("+14062045814"),
                "merci d'avoir modifer la note l'aide " +dataAide.getTitre())
            .create();*/
       
        try {
            AfficherAideDetailsNoteController.seAideId(espace.getId());

            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAideDetailsNote.fxml"));
            //récupération du root  à partir du fichier fxml

            Parent root = loader.load();
            //récupération du controller lier au fichier fxml

            AfficherAideDetailsNoteController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");
            espace.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(CarddetailsNoteController.class.getName()).log(Level.SEVERE, null, ex);
        }
    
    } }

    @FXML
    private void Envoi_Avis(ActionEvent event) {
   String avis = Avis.getText();  
     NoteAide noteAide=a.getAideNoteAvis(userid,Integer.parseInt(espace.getId()));
      if (noteAide==null){
    
      a.setAideNoteAvis(0,avis,userid, Integer.parseInt(espace.getId()));
        try {
            AfficherAideDetailsNoteController.seAideId(espace.getId());

            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAideDetailsNote.fxml"));
            //récupération du root  à partir du fichier fxml

            Parent root = loader.load();
            //récupération du controller lier au fichier fxml

            AfficherAideDetailsNoteController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");
            espace.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(CarddetailsNoteController.class.getName()).log(Level.SEVERE, null, ex);
        }}else
        {
    
      a.updateAideNoteAvis(0,avis, noteAide.id);
        try {
            AfficherAideDetailsNoteController.seAideId(espace.getId());

            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAideDetailsNote.fxml"));
            //récupération du root  à partir du fichier fxml

            Parent root = loader.load();
            //récupération du controller lier au fichier fxml

            AfficherAideDetailsNoteController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");
            espace.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(CarddetailsNoteController.class.getName()).log(Level.SEVERE, null, ex);
        }
    
    }
      
    }

}
