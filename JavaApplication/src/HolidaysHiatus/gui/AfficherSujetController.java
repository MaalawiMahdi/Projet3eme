/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Sujet;
import HolidaysHiatus.services.SujetService;
import HolidaysHiatus.tools.PDFutil;
import HolidaysHiatus.tools.Session;
import com.lowagie.text.DocumentException;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.net.URL;
import java.sql.SQLException;
import java.util.Random;
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
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.input.MouseEvent;
import javafx.stage.FileChooser;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author hp
 */
public class AfficherSujetController implements Initializable {

    int boardid;
    @FXML
    private TableView<Sujet> Table;
    @FXML
    private TableColumn<Sujet, Integer> colID;
    @FXML
    private TableColumn<Sujet, String> ColTitre;
    @FXML
    private TableColumn<Sujet, String> ColDesc;

    ObservableList<Sujet> list = FXCollections.observableArrayList();

    @FXML
    private Button btnajts;
    @FXML
    private Button btnref;
    @FXML
    private TextField idsupp;
    @FXML
    private Button btndelete;
    @FXML
    private TextField idmod;
    @FXML
    private TextField titremod;
    @FXML
    private TextArea descmod;
    @FXML
    private Button btnmod;
    @FXML
    private Label id_ID;
    @FXML
    private Button btnmodimg;
    @FXML
    private TextField textlien;
    @FXML
    private Button btnimpression;

    String imageDirectory = "C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\im\\";

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        
        
        boardid= Session.getSession().getConnectedBoard().getId();
        textlien.setVisible(false);
        idsupp.setVisible(false);
        idmod.setVisible(false);
        colID.setVisible(false);
        SujetService ss = new SujetService();
        for (int i = 0; i < ss.afficherSujetParBoard(boardid).size(); i++) {
            list.add(ss.afficherSujetParBoard(boardid).get(i));
        }
        colID.setCellValueFactory(new PropertyValueFactory<>("id"));
        ColTitre.setCellValueFactory(new PropertyValueFactory<>("titre"));
        ColDesc.setCellValueFactory(new PropertyValueFactory<>("description"));
        Table.setItems(list);
    }

    @FXML
    private void addS(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AddSujet.fxml"));
            Parent root = loader.load();
            Scene scene = new Scene(root);
            Stage stage = new Stage();
            stage.setScene(scene);
            stage.show();
            AddSujetController as = loader.getController();

            as.setBoardid(boardid);
            as.btnajt.setOnAction((ActionEvent event2) -> {
                as.addSujet(event);
                stage.close();
                this.refresh(event);
            });
        } catch (IOException ex) {
            Logger.getLogger(AfficherSujetController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void refresh(ActionEvent event) {
        list.clear();
        SujetService ss = new SujetService();
        for (int i = 0; i < ss.afficherSujetParBoard(boardid).size(); i++) {
            list.add(ss.afficherSujetParBoard(boardid).get(i));
        }
        colID.setCellValueFactory(new PropertyValueFactory<>("id"));
        ColTitre.setCellValueFactory(new PropertyValueFactory<>("titre"));
        ColDesc.setCellValueFactory(new PropertyValueFactory<>("description"));
        Table.setItems(list);
    }

    @FXML
    private void delete(ActionEvent event) {
        SujetService ss = new SujetService();
        int id = Integer.parseInt(idsupp.getText());
        Sujet s = new Sujet(id);
        ss.supprimerSujet(s);
        this.refresh(event);

    }

    @FXML
    private void modifier(ActionEvent event) {
        SujetService ss = new SujetService();
        String titre = titremod.getText();
        String description = descmod.getText();
        String lien_image = this.textlien.getText();
        int id = Integer.parseInt(idmod.getText());
        /*if (!titremod.getText().equals("") && !descmod.getText().equals("")) {
            titre = titremod.getText();
            description = descmod.getText();
        } else {
            if (titremod.getText().equals("")) {
                titre = ss.rechercheSujet(id).getTitre();
                description = descmod.getText();
            }
            if (descmod.getText().equals("")) {
                titre = titremod.getText();
                description = ss.rechercheSujet(id).getDescription();
            }
        }*/
        if (titre.equals("")) {
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
            Sujet s = new Sujet(id, boardid, titre, description, lien_image);
            ss.modifierSujet(s);
            this.refresh(event);

        }
    }

    @FXML
    private void clickS(MouseEvent event) {
        int id = Table.getSelectionModel().getSelectedItems().get(0).getId();
        String titre = Table.getSelectionModel().getSelectedItems().get(0).getTitre();
        String desc = Table.getSelectionModel().getSelectedItems().get(0).getDescription();
        String lien = Table.getSelectionModel().getSelectedItems().get(0).getLien_image();
        this.idsupp.setText(String.valueOf(id));
        this.idmod.setText(String.valueOf(id));
        this.titremod.setText(titre);
        this.descmod.setText(desc);
        this.textlien.setText(lien);

    }

    @FXML
    private void updateimg(ActionEvent event) {
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
        this.textlien.setText(nom + extension);
    }

    public void setBoardid(int bd) {
        this.boardid = bd;
    }

    @FXML
    private void GeneratePdf(ActionEvent event) throws SQLException, IOException {
        PDFutil pdf = new PDFutil();
        pdf.setBoardid(boardid);
        try {
            pdf.listSujet();
        } catch (FileNotFoundException ex) {
            System.out.println(ex.getMessage());
        } catch (DocumentException ex) {
            System.out.println(ex.getMessage());
        }
    }
        @FXML

    private void deconnecter(ActionEvent event) {
   Session.StartSession().clearSession();
              try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionConnexion.fxml"));
     Parent root= loader.load();
            id_ID.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void gestionCategorieProduit(ActionEvent event) {
               try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("GestionCategorie.fxml"));
     Parent root= loader.load();
            id_ID.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void gestionProduit(ActionEvent event) {
         try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("GestionProduitService.fxml"));
           Parent root= loader.load();
            id_ID.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    

}
