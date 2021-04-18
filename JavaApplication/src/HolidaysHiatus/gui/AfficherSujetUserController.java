/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Commentaire;
import HolidaysHiatus.entities.Sujet;
import HolidaysHiatus.services.CommentaireService;
import HolidaysHiatus.services.SujetService;
import java.io.IOException;
import java.net.URL;
import java.util.ArrayList;
import static java.util.Collections.list;
import java.util.List;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ListChangeListener;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.Button;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TablePosition;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.input.KeyEvent;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import javafx.scene.text.Font;
import javafx.scene.text.FontWeight;
import javafx.scene.text.Text;
import javafx.scene.text.TextFlow;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author hp
 */
public class AfficherSujetUserController implements Initializable {

    @FXML
    private TableView<Sujet> table;
    @FXML
    private TableColumn<Sujet, Integer> ColID;
    @FXML
    private TableColumn<Sujet, String> ColTitre;
    @FXML
    private TableColumn<Sujet, String> ColDesc;
    ObservableList<Sujet> list = FXCollections.observableArrayList();
    @FXML
    private Hyperlink btn_accueil;
    @FXML
    private Label id_ID;
    @FXML
    private AnchorPane home;
    @FXML
    private TextField searchbar;
    int boardid = 1;
    int usd = 2;
    @FXML
    private Button statboard;

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
        ColID.setCellValueFactory(new PropertyValueFactory<>("id"));
        ColTitre.setCellValueFactory(new PropertyValueFactory<>("titre"));
        ColDesc.setCellValueFactory(new PropertyValueFactory<>("description"));
        table.setItems(list);

        /* table.getSelectionModel().setCellSelectionEnabled(true);
        ObservableList selectedCells = table.getSelectionModel().getSelectedCells();

        selectedCells.addListener(new ListChangeListener() {
            @Override
            public void onChanged(Change c) {
                TablePosition tablePosition = (TablePosition) selectedCells.get(0);
                Object val = tablePosition.getTableColumn().getCellData(tablePosition.getRow());
                System.out.println("Selected Value" + val);
            }
        }
        );*/
    }

    @FXML
    private void click(MouseEvent event) {

        //List<Commentaire> liste = new ArrayList<>();
        try {
            int id = table.getSelectionModel().getSelectedItems().get(0).getId();
            SujetService ss = new SujetService();
            FXMLLoader loader = new FXMLLoader(getClass().getResource("ConsulterSujet.fxml"));
            Parent root = loader.load();
            ConsulterSujetController ac = loader.getController();
            ac.setT(ss.rechercheSujet(id).getTitre());

            StringBuffer descriptionS = new StringBuffer(ss.rechercheSujet(id).getDescription());

            int nbc = 80;
            for (int x = 0; x < descriptionS.length(); x++) {
                if (x == nbc) {
                    descriptionS.insert(x, "\n");
                    nbc += 80;
                }
            }
            String ns = new String(descriptionS);
            ac.setD(ns);
            ac.setSujetid(id);
            ac.setCurrentuserid(usd);
            ac.CRUDcommentaire();
            ac.Noter();
            /*CommentaireService cs = new CommentaireService();
            liste.addAll(cs.afficherCommentaireParSujet(id));*/
            Scene scene = new Scene(root);
            Stage stage = new Stage();
            stage.setScene(scene);
            stage.show();
            /*for (int i = 0; i < liste.size(); i++) {
                if (liste.get(i).getUser_id() == usd) {

                    Button btn_modifier = new Button("Modifier");
                    Button btn_supprimer = new Button("Supprimer");
                    String ch = "";
                    ch += cs.comuser(liste.get(i).getUser_id()) + " :" + "\n";
                    ch += liste.get(i).getCom() + "\n" + "\n";
                    ac.setComsid(ch, btn_modifier, btn_supprimer);
                    Commentaire supp = new Commentaire(liste.get(i).getId());
                    supp.setCom(liste.get(i).getCom());
                    btn_supprimer.setOnAction((ActionEvent event1) -> {
                        cs.supprimerCommentaire(supp);
                        stage.close();
                        this.click(event);
                    });

                    btn_modifier.setOnAction((ActionEvent event2) -> {

                        try {
                            FXMLLoader loader2 = new FXMLLoader(getClass().getResource("ModifierCommentaire.fxml"));
                            Parent root2 = loader2.load();

                            Scene scene2 = new Scene(root2);
                            Stage stage2 = new Stage();
                            stage2.setScene(scene2);
                            stage2.show();
                            ModifierCommentaireController mc = loader2.getController();
                            mc.setCommentaire(supp.getCom());

                            mc.validercom.setOnAction((ActionEvent event3) -> {
                                if (mc.modcom.getText().contains("religion")) {
                                    Alert alert = new Alert(AlertType.INFORMATION);
                                    alert.setTitle("Mot Indésirable");
                                    alert.setHeaderText(null);
                                    alert.setContentText("Vous utiliser un mot indésirable merci de le changer");
                                    alert.showAndWait();
                                } else {

                                    supp.setCom(mc.modcom.getText());
                                    cs.modifierCommentaire(supp);
                                    stage2.close();
                                    stage.close();
                                    this.click(event);
                                }
                            });
                        } catch (IOException ex) {
                            Logger.getLogger(AfficherSujetUserController.class.getName()).log(Level.SEVERE, null, ex);
                        }
                    });
                } else {
                    String ch = "";
                    ch += cs.comuser(liste.get(i).getUser_id()) + " :" + "\n";
                    ch += liste.get(i).getCom() + "\n" + "\n";
                    ac.setComsid(ch);
                }
            }
            ac.combtn.setOnAction((ActionEvent event4) -> {
                List<String> listm = new ArrayList<>();
                listm.addAll(cs.motsIndesirables());
                int verif = 0;
                for (int x = 0; x < listm.size(); x++) {
                    if (ac.newcom.getText().contains(listm.get(x))) {
                        verif = 1;
                    }
                }
                if (verif == 1) {
                    Alert alert = new Alert(AlertType.INFORMATION);
                    alert.setTitle("Mot Indésirable");
                    alert.setHeaderText(null);
                    alert.setContentText("Vous utiliser un mot indésirable merci de le changer");
                    alert.showAndWait();
                } else {

                    Commentaire cnew = new Commentaire(usd, id, ac.newcom.getText());
                    cs.ajouterCommentaire(cnew);
                    stage.close();
                    this.click(event);
                }
            });*/
        } catch (IOException ex) {
            Logger.getLogger(AfficherSujetUserController.class.getName()).log(Level.SEVERE, null, ex);
        }

    }

    @FXML
    private void envoiAccueil(ActionEvent event) {
    }

    @FXML
    private void search(KeyEvent event) {
        list.clear();
        SujetService ss = new SujetService();
        for (int i = 0; i < ss.Chercher(searchbar.getText(), boardid).size(); i++) {
            list.add(ss.Chercher(searchbar.getText(), boardid).get(i));
        }
        ColID.setCellValueFactory(new PropertyValueFactory<>("id"));
        ColTitre.setCellValueFactory(new PropertyValueFactory<>("titre"));
        ColDesc.setCellValueFactory(new PropertyValueFactory<>("description"));
        table.setItems(list);
    }

    @FXML
    private void goToStat(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("StatSujets.fxml"));
            Parent root = loader.load();
            StatSujetsController ac = loader.getController();
            ac.setBoardid(boardid);
            ac.stats();
            Scene scene = new Scene(root);
            Stage stage = new Stage();
            stage.setScene(scene);
            stage.show();
        } catch (IOException ex) {
            Logger.getLogger(AfficherSujetUserController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
