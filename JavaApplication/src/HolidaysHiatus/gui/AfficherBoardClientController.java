/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.*;
import HolidaysHiatus.services.*;
import HolidaysHiatus.tools.PDFutil;
import HolidaysHiatus.tools.Session;
import com.lowagie.text.DocumentException;
import java.io.FileNotFoundException;
import java.io.IOException;

import javafx.event.ActionEvent;
import javafx.scene.layout.StackPane;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import java.lang.reflect.InvocationTargetException;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Insets;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.ToolBar;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.VBox;
import javafx.scene.layout.AnchorPane;
import javafx.stage.Stage;
import javax.swing.JOptionPane;
import javafx.scene.transform.Scale;

import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ListChangeListener;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.print.PageLayout;
import javafx.print.PageOrientation;
import javafx.print.Paper;
import javafx.print.Printer;
import javafx.print.PrinterAttributes;
import javafx.print.PrinterJob;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.MenuItem;
import javafx.scene.control.ScrollPane;
import javafx.scene.input.InputMethodEvent;
import javafx.scene.input.KeyEvent;
import javafx.scene.layout.GridPane;

/**
 * FXML Controller class
 *
 * @author AMINE
 */
public class AfficherBoardClientController implements Initializable {

    @FXML
    private ToolBar navbar;
    private ComboBox<Integer> gcombosupp;
    private Button gmofiersp;

    /**
     * Initializes the controller class.
     */
    @FXML
    private Label id_ID;
    @FXML
    private AnchorPane home;
    @FXML
    private Button btnStat;
    @FXML
    private TextField rechercher;
    @FXML
    private ScrollPane scroll;
    @FXML
    private GridPane grid;
    private List<Board> dataBoard;
    @FXML
    private Button pdf;
    @FXML
    private Hyperlink btn_aide;
    @FXML
    private Hyperlink comptebusinneslink;
    @FXML
    private MenuItem profil;
    @FXML
    private MenuItem deconnecter;
    @FXML
    private Hyperlink Acceuil;
    @FXML
    private Hyperlink btn_board;
    @FXML
    private MenuItem btn_panier;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
//config hyperlink
         if(Session.getSession().getSessionSociete()!=null){
        if(Session.getSession().getConnectedBoard()!=null){
                     comptebusinneslink.setText("Consulter votre board");
        }else{
                    comptebusinneslink.setText("Créer votre board");}
        }
        //end config 
        
        // TODO

        ObservableList listt = navbar.getItems();

        CrudCategorie cg = new CrudCategorie();
        List<CategorieBoard> CBoards = new ArrayList();
        CBoards = cg.AfficherBoard();
        Button bt2 = new Button("Afficher tout");
        listt.add(bt2);
        bt2.setOnAction(new EventHandler<ActionEvent>() {
            @Override
            public void handle(ActionEvent e) {
                grid.getChildren().clear();

                dataBoard = new ArrayList();
                CrudBoard b = new CrudBoard();
                b.AfficherBoard().forEach((c) -> {
                    dataBoard.add(c);
                });
                int column = 1;
                int row = 0;
                for (int i = 0; i < dataBoard.size(); i++) {
                    try {
                        FXMLLoader fxmlLoader = new FXMLLoader();

                        fxmlLoader.setLocation(getClass().getResource("board.fxml"));
                        AnchorPane anchorPane = fxmlLoader.load();
                        BoardController boardconroller = fxmlLoader.getController();

                        boardconroller.SetDataBoard(dataBoard.get(i));
                        row++;

                        grid.add(anchorPane, column, row);

                        GridPane.setMargin(anchorPane, new Insets(2));
                    } catch (IOException ex) {
                        Logger.getLogger(AfficherBoardClientController.class.getName()).log(Level.SEVERE, null, ex);
                    }
                }
            }
        });

        for (CategorieBoard C : CBoards) {
            Button bt1 = new Button(C.getTitre());
            listt.add(bt1);

            bt1.setOnAction(new EventHandler<ActionEvent>() {
                @Override
                public void handle(ActionEvent e) {
                    CrudBoard b = new CrudBoard();
                    grid.getChildren().clear();
                    dataBoard = new ArrayList();
                    b.AfficherBoardavance(C.id).forEach((c) -> {
                        dataBoard.add(c);
                    });

                    int column = 1;
                    int row = 0;
                    for (int i = 0; i < dataBoard.size(); i++) {
                        try {
                            FXMLLoader fxmlLoader = new FXMLLoader();

                            fxmlLoader.setLocation(getClass().getResource("board.fxml"));
                            AnchorPane anchorPane = fxmlLoader.load();
                            BoardController boardconroller = fxmlLoader.getController();

                            boardconroller.SetDataBoard(dataBoard.get(i));
                            row++;

                            grid.add(anchorPane, column, row);

                            GridPane.setMargin(anchorPane, new Insets(2));
                        } catch (IOException ex) {
                            Logger.getLogger(AfficherBoardClientController.class.getName()).log(Level.SEVERE, null, ex);
                        }
                    }

                }
            });
        }
        dataBoard = new ArrayList();
        CrudBoard b = new CrudBoard();
        b.AfficherBoard().forEach((c) -> {
            dataBoard.add(c);
        });
        int column = 1;
        int row = 0;
        for (int i = 0; i < dataBoard.size(); i++) {
            try {
                FXMLLoader fxmlLoader = new FXMLLoader();

                fxmlLoader.setLocation(getClass().getResource("board.fxml"));
                AnchorPane anchorPane = fxmlLoader.load();
                BoardController boardconroller = fxmlLoader.getController();

                boardconroller.SetDataBoard(dataBoard.get(i));
                row++;

                grid.add(anchorPane, column, row);

                GridPane.setMargin(anchorPane, new Insets(2));
            } catch (IOException ex) {
                Logger.getLogger(AfficherBoardClientController.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }

    @FXML
    private void StatAction(ActionEvent event) {
        try {
            Node node = (Node) event.getSource();
            Stage stage = (Stage) node.getScene().getWindow();
            Parent root = FXMLLoader.load(getClass().getResource("BoardStat.fxml"));/* Exception */
            Scene scene = new Scene(root);
            stage.setScene(scene);
            stage.show();
        } catch (IOException ex) {
            Logger.getLogger(AjouterBoardController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void multiC(KeyEvent event) {
        grid.getChildren().clear();

        CrudBoard b = new CrudBoard();
        String text = rechercher.getText();
        dataBoard = new ArrayList();
        b.Chercher(text).forEach((c) -> {
            dataBoard.add(c);
        });

        int column = 1;
        int row = 0;
        for (int i = 0; i < dataBoard.size(); i++) {
            try {
                FXMLLoader fxmlLoader = new FXMLLoader();

                fxmlLoader.setLocation(getClass().getResource("board.fxml"));
                AnchorPane anchorPane = fxmlLoader.load();
                BoardController boardconroller = fxmlLoader.getController();

                boardconroller.SetDataBoard(dataBoard.get(i));
                row++;

                grid.add(anchorPane, column, row);

                GridPane.setMargin(anchorPane, new Insets(2));
            } catch (IOException ex) {
                Logger.getLogger(AfficherBoardClientController.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }

    @FXML
    private void GeneratePdf(ActionEvent event) throws SQLException, IOException, FileNotFoundException {
        PDFutil pdf = new PDFutil();

        try {
            pdf.listBoard();
        } catch (FileNotFoundException ex) {
            Logger.getLogger(AfficherBoardController.class.getName()).log(Level.SEVERE, null, ex);
        } catch (DocumentException ex) {
            Logger.getLogger(AfficherBoardController.class.getName()).log(Level.SEVERE, null, ex);
        }

    }

    @FXML
    private void envoiAccueil(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageFront.fxml"));
            Parent root = loader.load();
            Acceuil.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);

        }
    }

    @FXML
    private void inscriptionbusiness(ActionEvent event) {
        
       if(Session.getSession().getSessionSociete()!=null){
        if(Session.getSession().getConnectedBoard()!=null){
          try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageBackSociete.fxml"));
           Parent root= loader.load();
            Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
        }else{
            try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("AjouterBoard.fxml"));
           Parent root= loader.load();
            Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
        
        }
        }else{
            try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionSociete.fxml"));
           Parent root= loader.load();
            Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
        }
    }

    @FXML
    private void deconnecter(ActionEvent event) {
        Session.getSession().clearSession();
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionConnexion.fxml"));
            Parent root = loader.load();
            Acceuil.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void profil(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("profil.fxml"));
            Parent root = loader.load();
            Acceuil.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void envoi_aide(ActionEvent event) {
        try {
            //récupération fichier fxml

            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorieAideFront.fxml"));
            //récupération du root  à partir du fichier fxml

            Parent root = loader.load();
            //récupération du controller lier au fichier fxml

            AfficherCategorieAideFrontController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");
            Acceuil.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AfficherAideDetailsFrontController.class.getName()).log(Level.SEVERE, null, ex);
        }

    }

    @FXML
    private void envoi_board(ActionEvent event) {
           try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherBoardClient.fxml"));
     Parent root= loader.load();
            Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
       @FXML
    private void envoi_panier(ActionEvent event) {
                  try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("FrontPanier.fxml"));
     Parent root= loader.load();
            Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

}
