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
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.input.MouseEvent;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author hp
 */
public class AfficherSujetController implements Initializable {

    int boardid = 1;
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

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
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
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AjouterSujet.fxml"));
            Parent root = loader.load();
            Scene scene = new Scene(root);
            Stage stage = new Stage();
            stage.setScene(scene);
            stage.show();
            AjouterSujetController as = loader.getController();
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
        String titre = "";
        String description = "";
        int id = Integer.parseInt(idmod.getText());
        if (!titremod.getText().equals("") && !descmod.getText().equals("")) {
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
        }
        Sujet s = new Sujet(id, titre, description);
        ss.modifierSujet(s);
        this.refresh(event);
    }

    @FXML
    private void clickS(MouseEvent event) {
        int id = Table.getSelectionModel().getSelectedItems().get(0).getId();
        String titre = Table.getSelectionModel().getSelectedItems().get(0).getTitre();
        String desc = Table.getSelectionModel().getSelectedItems().get(0).getDescription();
        this.idsupp.setText(String.valueOf(id));
        this.idmod.setText(String.valueOf(id));
        this.titremod.setText(titre);
        this.descmod.setText(desc);

    }

}
