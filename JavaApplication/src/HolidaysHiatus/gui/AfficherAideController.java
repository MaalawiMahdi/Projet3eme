/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.services.AideCrud;
import HolidaysHiatus.services.CategorieAideCrud;
import HolidaysHiatus.tools.PDFutil;
import com.lowagie.text.DocumentException;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.net.URL;
import java.sql.SQLException;
import java.util.Optional;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.collections.transformation.FilteredList;
import javafx.collections.transformation.SortedList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ButtonType;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.control.cell.TextFieldTableCell;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class AfficherAideController implements Initializable {

    @FXML
    private Label id_ID;
    @FXML
    private TableView<Aide> id_table;
    @FXML
    private TableColumn<?, ?> id;
    @FXML
    private TableColumn<Aide, String> titre;
    @FXML
    private TableColumn<Aide, Integer> categorie;
    @FXML
    private TableColumn<Aide, String> description;
    @FXML
    private TableColumn<Aide, String> adresse;
    @FXML
    private TableColumn<Aide, String> image;
    @FXML
    private Button btn1;
    @FXML
    private Button btn2;
    @FXML
    private TextField id_recherche;
    @FXML
    private Button btn_pdf;
    @FXML
    private Hyperlink btn_cat_aide;
    @FXML
    private Hyperlink btn_aide;
    private ObservableList<Aide> data;
    @FXML
    private TableColumn<Aide, String> tell;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {

        // TODO
        data = FXCollections.observableArrayList();

        AideCrud Aides = new AideCrud();

        Aides.afficherAide().forEach((a) -> {

            data.add(a);

        });
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        titre.setCellValueFactory(new PropertyValueFactory<>("titre"));
        
        categorie.setCellValueFactory(new PropertyValueFactory<>("categorie_id"));
        description.setCellValueFactory(new PropertyValueFactory<>("description"));
        adresse.setCellValueFactory(new PropertyValueFactory<>("adresse"));
        tell.setCellValueFactory(new PropertyValueFactory<>("num_tell"));
        image.setCellValueFactory(new PropertyValueFactory<>("lien_image"));
        id_table.setEditable(true);
        titre.setCellFactory(TextFieldTableCell.forTableColumn());
        description.setCellFactory(TextFieldTableCell.forTableColumn());
        adresse.setCellFactory(TextFieldTableCell.forTableColumn());
        tell.setCellFactory(TextFieldTableCell.forTableColumn());
        image.setCellFactory(TextFieldTableCell.forTableColumn());

        id_table.setItems(null);
        id_table.setItems(data);
        //titre.setCellFactory(TextFieldTableCell.forTableColumn());
        //icone.setCellFactory(TextFieldTableCell.forTableColumn());
        // TODO
        FilteredList<Aide> filteredData = new FilteredList<>(data, b -> true);

        // 2. Set the filter Predicate whenever the filter changes.
        id_recherche.textProperty().addListener((observable, oldValue, newValue) -> {
            filteredData.setPredicate(alo -> {
                // If filter text is empty, display all persons.

                if (newValue == null || newValue.isEmpty()) {
                    return true;
                }

                // Compare first name and last name of every person with filter text.
                String lowerCaseFilter = newValue.toLowerCase();

                if (alo.getTitre().toLowerCase().indexOf(lowerCaseFilter) != -1) {
                    return true; // Filter matches first name.
                } else if (alo.getDescription().toLowerCase().indexOf(lowerCaseFilter) != -1) {
                    return true; // Filter matches first name.
                } else if (alo.getAdresse().toLowerCase().indexOf(lowerCaseFilter) != -1) {
                    return true; // Filter matches first name.
                } else if (alo.getNum_tell().toLowerCase().indexOf(lowerCaseFilter) != -1) {
                    return true; // Filter matches first name.
                } else if (alo.getLien_image().toLowerCase().indexOf(lowerCaseFilter) != -1) {
                    return true; // Filter matches first name.
                } else {
                    return false; // Does not match.
                }
            });
        });

        // 3. Wrap the FilteredList in a SortedList. 
        SortedList<Aide> sortedData = new SortedList<>(filteredData);

        // 4. Bind the SortedList comparator to the TableView comparator.
        // 	  Otherwise, sorting the TableView would have no effect.
        sortedData.comparatorProperty().bind(id_table.comparatorProperty());

        // 5. Add sorted (and filtered) data to the table.
        id_table.setItems(sortedData);

    }

  

    @FXML
    private void navigation_ajout(ActionEvent event) {

        try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AjouterAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            AjouterAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_tableUser.getSelectionModel().getSelectedItem().getId() + "");

            btn1.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AfficherAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void SupprimerAide(ActionEvent event) {
        Aide Aidetab = id_table.getSelectionModel().getSelectedItem();
//        Action ad = Dialogs.create()
//                .title("TESt")
//                .actions(Dialog.ACTION_OK , Dialog.ACTION_NO)
//                .message("test")
//                .styleClass(Dialog.STYLE_CLASS_NATIVE)
//                .showConfirm();
        if (Aidetab != null) {
            Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
            //alert.setTitle("Confirmation Dialog");
            //alert.setHeaderText("Look, a Confirmation Dialog");
            alert.setContentText("Voulez vous vraiment supprimer cette Aide  ?");

            Optional<ButtonType> result = alert.showAndWait();
            if (result.get() == ButtonType.OK) {

                AideCrud crud = new AideCrud();
                Aide a = new Aide();
                a.setId(Aidetab.getId());

                crud.deleteAide(a);
            }
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root;
            try {
                root = loader.load();
                //récupération du controller lier au fichier fxml 
                AfficherAideController dpc = loader.getController();
                //             dpc.setLbMessage(id_act.getText());

                btn2.getScene().setRoot(root);

            } catch (IOException ex) {
                Logger.getLogger(AfficherAideController.class.getName()).log(Level.SEVERE, null, ex);
            }

        } else {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Error Dialog");
            //alert.setHeaderText("Look, an Error Dialog");
            alert.setContentText("Vous devez selectionner un champs ");

            alert.showAndWait();

        }
    }

    @FXML
    private void GeneratePdf(ActionEvent event) throws SQLException, IOException {
        PDFutil pdf = new PDFutil();

        try {
            pdf.listAide();
        } catch (FileNotFoundException ex) {
            Logger.getLogger(AfficherAideController.class.getName()).log(Level.SEVERE, null, ex);
        } catch (DocumentException ex) {
            Logger.getLogger(AfficherAideController.class.getName()).log(Level.SEVERE, null, ex);
        }

    }

    @FXML
    private void envoi_cat_aide(ActionEvent event) {

        try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorieAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            AfficherCategorieAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");

            btn_cat_aide.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AfficherAideController.class.getName()).log(Level.SEVERE, null, ex);
        }

    }

    @FXML
    private void envoi_aide(ActionEvent event) {
        try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            AfficherAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");

            btn_aide.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void edit_titre(TableColumn.CellEditEvent<Aide, String> event) {
        AideCrud a = new AideCrud();
        event.getRowValue().setTitre(event.getNewValue());
        a.modifierAide(event.getRowValue());
    }

    @FXML
    private void edit_Description(TableColumn.CellEditEvent<Aide, String> event) {
          AideCrud a = new AideCrud();
        event.getRowValue().setDescription(event.getNewValue());
        a.modifierAide(event.getRowValue());

    }

    @FXML
    private void edit_adresse(TableColumn.CellEditEvent<Aide, String> event) {
          AideCrud a = new AideCrud();
        event.getRowValue().setAdresse(event.getNewValue());
        a.modifierAide(event.getRowValue());
    }

    @FXML
    private void edit_tel(TableColumn.CellEditEvent<Aide, String> event) {
          AideCrud a = new AideCrud();
        event.getRowValue().setNum_tell(event.getNewValue());
        a.modifierAide(event.getRowValue());
    }

    @FXML
    private void edit_img(TableColumn.CellEditEvent<Aide, String> event) {
          AideCrud a = new AideCrud();
        event.getRowValue().setLien_image(event.getNewValue());
        a.modifierAide(event.getRowValue());
    }

}
