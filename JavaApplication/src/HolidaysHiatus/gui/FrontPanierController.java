/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.ArticlePanier;
import HolidaysHiatus.entites.Panier;
import HolidaysHiatus.entites.ProduitService;
import HolidaysHiatus.entites.Societe;
import HolidaysHiatus.entites.User;
import HolidaysHiatus.entities.Board;
import HolidaysHiatus.services.CrudBoard;
import HolidaysHiatus.services.SocieteService;
import HolidaysHiatus.tools.Session;
import java.io.IOException;
import java.net.URL;
import java.util.List;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.scene.Parent;
import javafx.scene.control.Button;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.MenuItem;
import javafx.scene.control.ScrollPane;
import javafx.scene.control.TextField;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.GridPane;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class FrontPanierController implements Initializable {

    @FXML
    private Hyperlink btn_board;
    @FXML
    private Hyperlink comptebusinneslink;
    @FXML
    private MenuItem profil;
    @FXML
    private MenuItem deconnecter;
    @FXML
    private Hyperlink Acceuil;
    @FXML
    private Hyperlink btn_aide;
    @FXML
    private Label id_ID;
    @FXML
    private AnchorPane home;
    @FXML
    private ScrollPane scroll;
    @FXML
    private GridPane grid;
    @FXML
    private Button btn_cmd;
     private List<ArticlePanier> data;
    @FXML
    private TextField prix_total;
    @FXML
    private TextField prix_total_promotion;
    @FXML
    private Label promotion;
    
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
   
        // TODO
        User u = Session.getSession().getSessionUser();

        System.out.print(u);
        if (u.getType().compareTo("societe") == 0) {
            // comptebusinneslink.setText("Votre board ");
            SocieteService S_service = new SocieteService();
            Societe s = S_service.chercherparidclient(u.getId());
            Session.getSession().setSessionSociete(s);
            CrudBoard cboard = new CrudBoard();
            //Board b = cboard.getBoardBySocieteId(s.getId());

            if (cboard.getBoardBySocieteId(s.getId()) != null) {
                Board b = cboard.getBoardBySocieteId(s.getId());
                Session.getSession().setConnectedBoard(b);
                comptebusinneslink.setText("Consulter votre board");
            } else {
                comptebusinneslink.setText("Créer votre board");

            }
        }
        
      data=Session.getSession().getConnectedPanier().articles;
         int column=0;
        int row=0;
          try {
        for(int i=0; i<data.size();i++){
          
         
                
                FXMLLoader fxmlLoader = new FXMLLoader();
               
                fxmlLoader.setLocation(getClass().getResource("CardPanier.fxml"));
                AnchorPane anchorPane=fxmlLoader.load();
                CardPanierController cardController= fxmlLoader.getController();
                
                
                                                       column++;

                    cardController.setDataProduit(data.get(i).getP(),data.get(i).getQuantite());
                    if (column==4)
                    {column=1;
                            row++;
                    }
                    
                    grid.add(anchorPane,column,row);
                    
                    GridPane.setMargin(anchorPane,new Insets(2));
              
            }
        prix_total.setDisable(true);
        prix_total_promotion.setDisable(true);
        prix_total.setText(String.valueOf(Session.getSession().getConnectedPanier().total));
        if(Session.getSession().getConnectedPanier().total>150){
        promotion.setOpacity(1);
        prix_total_promotion.setOpacity(1);
        prix_total_promotion.setText("Prix après réduction  ::  "+String.valueOf(Session.getSession().getConnectedPanier().total*0.8));
        
       // Session.getSession().getConnectedPanier().total=(float) (Session.getSession().getConnectedPanier().total*0.8);
        
        }
        } catch (IOException ex) {
                Logger.getLogger(AfficherCategorieAideFrontController.class.getName()).log(Level.SEVERE, null, ex);
            } 
       
        
    }

    @FXML
    private void envoi_board(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherBoardClient.fxml"));
            Parent root = loader.load();
            Acceuil.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void inscriptionbusiness(ActionEvent event) {
        if (Session.getSession().getSessionSociete() != null) {
            if (Session.getSession().getConnectedBoard() != null) {
                try {
                    FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageBackSociete.fxml"));
                    Parent root = loader.load();
                    Acceuil.getScene().setRoot(root);
                } catch (IOException ex) {
                    Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);

                }
            } else {
                try {
                    FXMLLoader loader = new FXMLLoader(getClass().getResource("AjouterBoard.fxml"));
                    Parent root = loader.load();
                    Acceuil.getScene().setRoot(root);
                } catch (IOException ex) {
                    Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);

                }

            }
        } else {
            try {
                FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionSociete.fxml"));
                Parent root = loader.load();
                Acceuil.getScene().setRoot(root);
            } catch (IOException ex) {
                Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);

            }
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
    private void envoi_aide(ActionEvent event) {
        try {
            //récupération fichier fxml

            FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorieAideFront.fxml"));
            //récupération du root  à partir du fichier fxml

            Parent root = loader.load();
            //récupération du controller lier au fichier fxml

            AfficherCategorieAideFrontController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");
            btn_aide.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(AfficherAideDetailsFrontController.class.getName()).log(Level.SEVERE, null, ex);
        }

    }

    @FXML
    private void envoi_commande(ActionEvent event) {
    }
}
