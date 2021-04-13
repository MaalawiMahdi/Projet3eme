/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Aide;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
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
    @FXML
    private Button btn_captcha;
    
    

    public void setDataAide(Aide dataAide) {
        this.dataAide = dataAide;
        image.setImage(new Image("file:C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\uploads\\" + dataAide.getLien_image()));
        titre.setText(dataAide.getTitre());
        description.getChildren().add(new Text(dataAide.getDescription()));
        adresse.setText(dataAide.getAdresse());
        tell.setText(dataAide.getNum_tell());
        btn_captcha.setId(Integer.toString(dataAide.getId()));

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
    }
    
}
