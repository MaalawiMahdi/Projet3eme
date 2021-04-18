/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Sujet;
import HolidaysHiatus.services.SujetService;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.application.Platform;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Button;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;

/**
 * FXML Controller class
 *
 * @author hp
 */
public class AjouterSujetController implements Initializable {

    @FXML
    private TextField titre;
    @FXML
    private TextArea desc;
    @FXML
    Button btnajt;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    void addSujet(ActionEvent event) {
        
            String title = titre.getText();
            String description = desc.getText();
            Sujet s = new Sujet(1,title,description,"");
            SujetService ps = new SujetService();
            ps.ajouterSujet(s);
        
    }
    
}
