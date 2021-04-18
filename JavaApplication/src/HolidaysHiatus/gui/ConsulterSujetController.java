/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Commentaire;
import HolidaysHiatus.entities.NoteSujet;
import HolidaysHiatus.services.CommentaireService;
import HolidaysHiatus.services.SujetService;
import java.io.IOException;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.HPos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.Button;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.Separator;
import javafx.scene.control.SplitPane;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import javafx.stage.Stage;
import org.controlsfx.control.Rating;

/**
 * FXML Controller class
 *
 * @author hp
 */
public class ConsulterSujetController implements Initializable {

    @FXML
    private Label labeltitre;
    @FXML
    private Label labeldesc;
    List<Commentaire> list = new ArrayList<>();
    @FXML
    private SplitPane listelement;
    @FXML
    TextArea newcom;
    @FXML
    Button combtn;
    @FXML
    private Hyperlink btn_accueil;
    @FXML
    private Label id_ID;
    @FXML
    private AnchorPane home;
    @FXML
    private Rating rating;
    int sujetid;
    int currentuserid;
    CommentaireService cs = new CommentaireService();

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO        
        /*
        rating.ratingProperty().addListener(new ChangeListener<Number>() {
            @Override
            public void changed(ObservableValue<? extends Number> observable, Number oldValue, Number newValue) {
                //NoteSujet n = new NoteSujet(sujetid, currentuserid, (int) newValue);
                System.out.println(newValue);
            }
        });*/
    }

    public void setSujetid(int id) {
        this.sujetid = id;
    }

    public void setCurrentuserid(int id) {
        this.currentuserid = id;
    }

    public void setT(String titre) {
        this.labeltitre.setText(titre);
    }

    public void setD(String desc) {
        this.labeldesc.setText(desc);
    }

    public void setComsid(String s) {
        AnchorPane ap = new AnchorPane();
        ap.getChildren().add(new Label(s));
        listelement.getItems().add(ap);
    }

    public void setComsid(String s, Button b, Button x) {
        AnchorPane ap = new AnchorPane();
        Label Textcom = new Label(s);
        ap.getChildren().add(Textcom);
        b.setLayoutX(Textcom.getScaleX() + 800);
        b.setLayoutY(Textcom.getScaleY() + 15);
        x.setLayoutX(Textcom.getScaleX() + 900);
        x.setLayoutY(Textcom.getScaleY() + 15);
        ap.getChildren().addAll(b, x);
        listelement.getItems().add(ap);

    }

    @FXML
    private void envoiAccueil(ActionEvent event) {
    }

    public void CRUDcommentaire() {

        List<Commentaire> liste = new ArrayList<>();
        List<String> listm = new ArrayList<>();
        listm.addAll(cs.motsIndesirables());
        liste.addAll(cs.afficherCommentaireParSujet(sujetid));
        System.out.println(sujetid);
        System.out.println(currentuserid);
        for (int i = 0; i < liste.size(); i++) {
            if (liste.get(i).getUser_id() == currentuserid) {

                Button btn_modifier = new Button("Modifier");
                Button btn_supprimer = new Button("Supprimer");
                String ch = "";
                ch += cs.comuser(liste.get(i).getUser_id()) + " :" + "\n";
                ch += liste.get(i).getCom() + "\n" + "\n";
                setComsid(ch, btn_modifier, btn_supprimer);
                Commentaire supp = new Commentaire(liste.get(i).getId());
                supp.setCom(liste.get(i).getCom());
                btn_supprimer.setOnAction((ActionEvent event1) -> {
                    cs.supprimerCommentaire(supp);
                    listelement.getItems().clear();
                    listelement.getItems().add(this.newcom);
                    listelement.getItems().add(this.combtn);
                    CRUDcommentaire();
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
                            int verif = 0;
                            for (int x = 0; x < listm.size(); x++) {
                                if (mc.modcom.getText().contains(listm.get(x))) {
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

                                supp.setCom(mc.modcom.getText());
                                cs.modifierCommentaire(supp);
                                stage2.close();
                                listelement.getItems().clear();
                                listelement.getItems().add(this.newcom);
                                listelement.getItems().add(this.combtn);
                                CRUDcommentaire();
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
                setComsid(ch);
            }
        }
        this.combtn.setOnAction((ActionEvent event4) -> {

            int verif = 0;
            for (int x = 0; x < listm.size(); x++) {
                if (this.newcom.getText().contains(listm.get(x))) {
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

                Commentaire cnew = new Commentaire(currentuserid, sujetid, this.newcom.getText());
                cs.ajouterCommentaire(cnew);
                listelement.getItems().clear();
                listelement.getItems().add(this.newcom);
                listelement.getItems().add(this.combtn);
                CRUDcommentaire();
            }
        });
    }

    public void Noter() {

        SujetService ss = new SujetService();
        NoteSujet note = ss.rechercheNote(sujetid, currentuserid);
        rating.ratingProperty().setValue(note.getValue());
        rating.ratingProperty().addListener(new ChangeListener<Number>() {
            @Override
            public void changed(ObservableValue<? extends Number> observable, Number oldValue, Number newValue) {
                if (note.getId() != 0) {
                    NoteSujet n = new NoteSujet(note.getId(), sujetid, currentuserid, newValue.intValue());
                    ss.modifierNote(n);
                } else {
                    NoteSujet n = new NoteSujet(sujetid, currentuserid, newValue.intValue());
                    ss.ajouterNote(n);
                }
            }
        });
    }

}
