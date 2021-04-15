/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.entities.CaptchaAide;
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
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.text.Text;
import javafx.scene.text.TextFlow;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class CarddetailsController implements Initializable {

    @FXML
    private Label titre;
    @FXML
    private TextFlow description;
    @FXML
    private Label adresse;
    @FXML
    private Label tell;
    @FXML
    private ImageView Captcha;
    @FXML
    private Label espace;
    @FXML
    private TextField Captchatext;
    @FXML
    private ImageView image;
    Aide dataAide;
   
    CaptchaAide dataCaptcha;
    @FXML
    private Button btn_captcha;
    
    

    public void setDataAide(Aide dataAide,CaptchaAide dataCaptcha) {
        this.dataAide = dataAide;
        image.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\uploads\\" + dataAide.getLien_image()));
        titre.setText(dataAide.getTitre());
        description.getChildren().add(new Text(dataAide.getDescription()));
        adresse.setText(dataAide.getAdresse());
        tell.setText(dataAide.getNum_tell());
        btn_captcha.setId(dataCaptcha.getValue()); 
        espace.setId(Integer.toString(dataAide.getId()));
        Captcha.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public" + dataCaptcha.getLien_image_captcha()));
    }

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void envoi_aide_detail_note(ActionEvent event) {
        String Captchatexte = Captchatext.getText();
        if (Captchatexte.equals(btn_captcha.getId())) {
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
                Logger.getLogger(CarddetailsController.class.getName()).log(Level.SEVERE, null, ex);
            }
        } else {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            

            alert.setContentText("Captcha n'est pas Valide !");
            alert.showAndWait();
            try {

                AfficherAideDetailsFrontController.seAideId(espace.getId());

                //récupération fichier fxml
                FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAideDetailsFront.fxml"));
                //récupération du root  à partir du fichier fxml

                Parent root = loader.load();
                //récupération du controller lier au fichier fxml

                AfficherAideDetailsFrontController dpc = loader.getController();
                //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");
                espace.getScene().setRoot(root);

            } catch (IOException ex) {
                Logger.getLogger(CardController.class.getName()).log(Level.SEVERE, null, ex);
            }

        }
    }

    
    
}
