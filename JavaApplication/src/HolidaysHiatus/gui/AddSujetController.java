/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Sujet;
import HolidaysHiatus.services.SujetService;
import java.io.File;
import java.net.URL;
import java.util.Random;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import javafx.stage.FileChooser;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author hp
 */
public class AddSujetController implements Initializable {

    @FXML
    private TextField titre;
    @FXML
    private TextArea desc;
    @FXML
    Button btnajt;
    @FXML
    private Button btnimg;
    @FXML
    private TextField lien;

    int boardid;
    String imageDirectory = "C:\\Users\\hp\\Projet3eme\\SymfonyApplication\\public\\im\\";

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        lien.setVisible(false);
    }

    @FXML
    void addSujet(ActionEvent event) {
        String title = titre.getText();
        String description = desc.getText();
        if (title.equals("")) {
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Condition de saisie");
            alert.setHeaderText(null);
            alert.setContentText("le titre ne peut pas etre vide");
            alert.showAndWait();
        } else if (description.length() < 15) {
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Condition de saisie");
            alert.setHeaderText(null);
            alert.setContentText("la description doit contenir au moins 15 caracteres");
            alert.showAndWait();
        } else {

            Sujet s = new Sujet(boardid, title, description, this.lien.getText());
            SujetService ps = new SujetService();
            ps.ajouterSujet(s);
        }
    }

    public void setBoardid(int bd) {
        this.boardid = bd;
    }

    @FXML
    private void addImg(ActionEvent event) {
        FileChooser filechooser = new FileChooser();
        Stage stage = new Stage();
        File file = filechooser.showOpenDialog(stage);
        int i = file.getAbsolutePath().indexOf(".");
        int l = file.getAbsolutePath().toString().length();
        String extension = file.getAbsolutePath().toString().substring(i, l);
        Random r = new Random();
        Random r2 = new Random();
        String nom = r.toString().substring(18, r.toString().length()) + r2.toString().substring(18, r2.toString().length());
        boolean sc = file.renameTo(new File(imageDirectory + nom + extension));
        this.lien.setText(nom + extension);

    }

}
