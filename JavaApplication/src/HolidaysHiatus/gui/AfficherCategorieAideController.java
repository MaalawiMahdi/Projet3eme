/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import java.net.URL;
import java.util.ResourceBundle;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import HolidaysHiatus.entities.CategorieAide;
import HolidaysHiatus.services.CategorieAideCrud;
import HolidaysHiatus.tools.PDFutil;
import com.lowagie.text.DocumentException;
import com.lowagie.text.Image;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.sql.SQLException;
import java.util.Optional;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.collections.transformation.FilteredList;
import javafx.collections.transformation.SortedList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.print.PrinterJob;
import javafx.scene.Parent;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.ButtonType;
import javafx.scene.control.Label;
import javafx.scene.control.cell.TextFieldTableCell;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class AfficherCategorieAideController implements Initializable {

    @FXML
    private TableColumn<?, ?> id;
    @FXML
    private TableColumn<CategorieAide, String> titre;
    @FXML
    private TableColumn<CategorieAide, String> icone;
    @FXML
    private Button btn1;
    @FXML
    private Button btn2;
    @FXML
    private TextField id_recherche;
    @FXML
    private Button btn_pdf;
    private Button btn_pdf1;
    private ObservableList<CategorieAide> data;
    @FXML
    private TableView<CategorieAide> id_table;
    @FXML
    private Hyperlink btn_Cat_Aide;
    @FXML
    private TableColumn<?, ?> ImageCatAide;
    @FXML
    private Hyperlink btn_Aide;

    public TableColumn<?,?> getId() {
        return id;
    }

    public void setId(TableColumn<?, ?> id) {
        this.id = id;
    }

    public TableColumn<?, ?> getTitre() {
        return titre;
    }

    public void setTitre(TableColumn<CategorieAide, String> titre) {
        this.titre = titre;
    }

    public TableColumn<?, ?> getIcone() {
        return icone;
    }

    public void setIcone(TableColumn<CategorieAide, String> icone) {
        this.icone = icone;
    }

    public Button getBtn1() {
        return btn1;
    }

    public void setBtn1(Button btn1) {
        this.btn1 = btn1;
    }

    public Button getBtn2() {
        return btn2;
    }

    public void setBtn2(Button btn2) {
        this.btn2 = btn2;
    }

    public TextField getId_recherche() {
        return id_recherche;
    }

    public void setId_recherche(TextField id_recherche) {
        this.id_recherche = id_recherche;
    }

    public Button getBtn_pdf() {
        return btn_pdf;
    }

    public void setBtn_pdf(Button btn_pdf) {
        this.btn_pdf = btn_pdf;
    }

    public Button getBtn_pdf1() {
        return btn_pdf1;
    }

    public void setBtn_pdf1(Button btn_pdf1) {
        this.btn_pdf1 = btn_pdf1;
    }

    public ObservableList<CategorieAide> getData() {
        return data;
    }

    public void setData(ObservableList<CategorieAide> data) {
        this.data = data;
    }

    public TableView<CategorieAide> getId_table() {
        return id_table;
    }

    public void setId_table(TableView<CategorieAide> id_table) {
        this.id_table = id_table;
    }

    public Hyperlink getBtn_Cat_Aide() {
        return btn_Cat_Aide;
    }

    public void setBtn_Cat_Aide(Hyperlink btn_Cat_Aide) {
        this.btn_Cat_Aide = btn_Cat_Aide;
    }

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {

        data = FXCollections.observableArrayList();

        CategorieAideCrud CategoriesAides = new CategorieAideCrud();

        CategoriesAides.afficherCategorieAide().forEach((c) -> {

            data.add(c);

        });
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        titre.setCellValueFactory(new PropertyValueFactory<>("titre"));
        icone.setCellValueFactory(new PropertyValueFactory<>("lien_icon"));
        ImageCatAide.setCellValueFactory(new PropertyValueFactory<>("Image"));
        id_table.setItems(null);
        id_table.setItems(data);
        id_table.setEditable(true);
        titre.setCellFactory(TextFieldTableCell.forTableColumn());
        icone.setCellFactory(TextFieldTableCell.forTableColumn());
        // TODO
        FilteredList<CategorieAide> filteredData = new FilteredList<>(data, b -> true);

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
                } else if (alo.getLien_icon().toLowerCase().indexOf(lowerCaseFilter) != -1) {
                    return true; // Filter matches first name.
                } else {
                    return false; // Does not match.
                }
            });
        });

        // 3. Wrap the FilteredList in a SortedList. 
        SortedList<CategorieAide> sortedData = new SortedList<>(filteredData);

        // 4. Bind the SortedList comparator to the TableView comparator.
        // 	  Otherwise, sorting the TableView would have no effect.
        sortedData.comparatorProperty().bind(id_table.comparatorProperty());

        // 5. Add sorted (and filtered) data to the table.
        id_table.setItems(sortedData);
    }

    @FXML
    private void evoi_gestion_cat_Aide(ActionEvent event) {

        try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorieAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            AfficherCategorieAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");

            btn_Cat_Aide.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(HomepageBackController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void navigation_ajout(ActionEvent event) {
      
        try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AjouterCategorieAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            AjouterCategorieAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_tableUser.getSelectionModel().getSelectedItem().getId() + "");

            btn1.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
      
    }

     @FXML
    public void GeneratePdf() throws SQLException, IOException {
        PDFutil pdf = new PDFutil();
       
        try {
            pdf.listCategorieAide();
        } catch (FileNotFoundException ex) {
            Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
        } catch (DocumentException ex) {
            Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
        
         
    }



   /* @FXML
    private void edit_titre(TableColumn.CellEditEvent<CategorieAide,String> event) {
        CategorieAideCrud c = new CategorieAideCrud();
        event.getRowValue().(event.getNewValue());
        c.modifierCategorieAide(event.getRowValue());
        refrech();
    }

    @FXML
    private void edit_icone(TableColumn.CellEditEvent<CategorieAide,String> event) {
         CategorieAideCrud c = new CategorieAideCrud();
        event.getRowValue().setIcone(event.getNewValue());
        c.modifierCategorieAide(event.getRowValue());
        refrech();
    }
*/
    
    @FXML
    private void SupprimerCatAide(ActionEvent event) {
        CategorieAide CategorieAidetab = id_table.getSelectionModel().getSelectedItem();
//        Action ad = Dialogs.create()
//                .title("TESt")
//                .actions(Dialog.ACTION_OK , Dialog.ACTION_NO)
//                .message("test")
//                .styleClass(Dialog.STYLE_CLASS_NATIVE)
//                .showConfirm();
        if (CategorieAidetab != null) {
            Alert alert = new Alert(AlertType.CONFIRMATION);
            //alert.setTitle("Confirmation Dialog");
            //alert.setHeaderText("Look, a Confirmation Dialog");
            alert.setContentText("Voulez vous vraiment supprimer cette CategorieAide  ?");

            Optional<ButtonType> result = alert.showAndWait();
            if (result.get() == ButtonType.OK) {

                CategorieAideCrud crud = new CategorieAideCrud();
                CategorieAide c = new CategorieAide();
                c.setId(CategorieAidetab.getId());

                crud.deleteCategorieAide(c);
            }
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorieAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root;
            try {
                root = loader.load();
                //récupération du controller lier au fichier fxml 
                AfficherCategorieAideController dpc = loader.getController();
                //             dpc.setLbMessage(id_act.getText());

                btn2.getScene().setRoot(root);

            } catch (IOException ex) {
                Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
            }

        } else {
            Alert alert = new Alert(AlertType.ERROR);
            alert.setTitle("Error Dialog");
            //alert.setHeaderText("Look, an Error Dialog");
            alert.setContentText("Vous devez selectionner un champs ");

            alert.showAndWait();

        }
    }

    @FXML
    private void envoi_Aide(ActionEvent event) {
        
        try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            AfficherAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");

            btn_Aide.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
        }
     
    }

    @FXML
    private void edittitre(TableColumn.CellEditEvent<CategorieAide, String> event) {
     CategorieAideCrud c = new CategorieAideCrud();
        event.getRowValue().setTitre(event.getNewValue());
        c.modifierCategorieAide(event.getRowValue());
    }

    @FXML
    private void editicon(TableColumn.CellEditEvent<CategorieAide, String> event) {
     CategorieAideCrud c = new CategorieAideCrud();
        event.getRowValue().setLien_icon(event.getNewValue());
        c.modifierCategorieAide(event.getRowValue());
    }
    
}
