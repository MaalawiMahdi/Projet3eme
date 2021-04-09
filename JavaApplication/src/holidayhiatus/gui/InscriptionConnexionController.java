/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package holidayhiatus.gui;

import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;

/**
 * FXML Controller class
 *
 * @author ASUS
 */
public class InscriptionConnexionController implements Initializable {

    @FXML
    private TextField inscription_email;
    @FXML
    private PasswordField inscription_mot_de_passe;
    @FXML
    private PasswordField inscription_repeter_mot_de_passe;
    @FXML
    private TextField connexion_email;
    @FXML
    private PasswordField connexion_mot_de_passe;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void inscription(ActionEvent event) {
    }

    @FXML
    private void connecter(ActionEvent event) {
    }
    
}
