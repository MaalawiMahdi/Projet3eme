/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.Commande;
import HolidaysHiatus.entites.Livraison;
import HolidaysHiatus.entites.Panier;
import HolidaysHiatus.entites.User;
import HolidaysHiatus.services.CommandeService;
import HolidaysHiatus.services.LivraisonService;
import HolidaysHiatus.services.UserService;
import HolidaysHiatus.tools.JavamailUtil;
import HolidaysHiatus.tools.Session;
import java.io.File;
import java.io.IOException;
import java.net.URL;
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
import javafx.scene.Parent;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.input.KeyEvent;
import javafx.scene.layout.BorderPane;
import javafx.scene.web.WebView;

/**
 * FXML Controller class
 *
 * @author mahdi
 */
public class CommandeBackController implements Initializable {

    @FXML
    private Hyperlink gestionsociete;
    @FXML
    private Label id_ID;
    @FXML
    private TableView<Commande> tableview;
    @FXML
    private TableColumn<Commande, Integer> id;
    @FXML
    private TableColumn<Commande, Integer> user_id;
    @FXML
    private TableColumn<Commande, Integer> livraison_id;
    @FXML
    private TableColumn<Commande, Float> prix;
    @FXML
    private Button supprimer;
    private Button bannir;
    @FXML
    private TextField recherche;
    @FXML
    private Hyperlink deconnecter;
    @FXML
    private Button affectation;
    @FXML
    private ComboBox<Integer> livraison_list_id;
    @FXML
    private WebView map;
    @FXML
    private Hyperlink gestionuser;
    @FXML
    private Hyperlink btn_Cat_Aide;
    @FXML
    private Hyperlink btn_aide;
    @FXML
    private Hyperlink cat_Stat;
    @FXML
    private Hyperlink stat_aide;
    @FXML
    private Hyperlink btn_Board;
    @FXML
    private Hyperlink btn_cat_Board;
    @FXML
    private TableColumn<?, ?> adresse;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb)
    {File f = new File("C:\\Users\\drwhoo\\Desktop\\Projet3eme\\JavaApplication\\map1.html");
        map.getEngine().load(f.toURI().toString()); 

        //map.getChildren().add(map)
CommandeService Cs= new CommandeService();      
      ObservableList<Commande> list = FXCollections.observableArrayList();
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        user_id.setCellValueFactory(new PropertyValueFactory<>("user_id"));
        livraison_id.setCellValueFactory(new PropertyValueFactory<>("livraison_id"));
        prix.setCellValueFactory(new PropertyValueFactory<>("prix"));
                adresse.setCellValueFactory(new PropertyValueFactory<>("adresse"));

        list.addAll(Cs.AfficherCommandes());   
    tableview.setItems(list);
    ObservableList selectedCells = tableview.getSelectionModel().getSelectedCells();
        selectedCells.addListener(new ListChangeListener() {
            @Override
            public void onChanged(ListChangeListener.Change c) {
                Commande SelectedCommande = (Commande) tableview.getSelectionModel().getSelectedItem();
                if(SelectedCommande!=null){
                supprimer.setDisable(false);
                if(SelectedCommande.getLivraison_id()==0){
                affectation.setDisable(false);
                        }else{
                affectation.setDisable(true);
                
                }
                }else{
                supprimer.setDisable(true);
                affectation.setDisable(true);
                }
            }
           
        });
        LivraisonService Ls = new LivraisonService();
            ObservableList<Integer> listids = FXCollections.observableArrayList();
            listids.addAll(Ls.AfficherIds());
            livraison_list_id.setItems(listids);
             
    }    

    


    @FXML
    private void supprimer(ActionEvent event) {
                Commande SelectedCommande = (Commande) tableview.getSelectionModel().getSelectedItem();
    CommandeService Cs = new CommandeService();
Cs.Supprimer(SelectedCommande);    
refresh_table();
    }


    @FXML
    private void chercher(KeyEvent event) {
          CommandeService Cs= new CommandeService();      
      ObservableList<Commande> list = FXCollections.observableArrayList();
      list.addAll(Cs.Chercher(recherche.getText()));
      tableview.setItems(list);
      if(recherche.getText().compareTo("")==0){
      refresh_table();
      }
    }

   
    @FXML
    private void Affecter(ActionEvent event) {
                Commande SelectedCommande = (Commande) tableview.getSelectionModel().getSelectedItem();
    CommandeService Cs = new CommandeService();
    Cs.Affecter(SelectedCommande,livraison_list_id.getValue());  
    LivraisonService Ls = new LivraisonService();
    Livraison l = Ls.AfficherLivraison(livraison_list_id.getValue());
    UserService Us = new UserService();
    User u =Us.GetUserById(SelectedCommande.getUser_id());
   Panier PanierToSend = Cs.GetListProduitServiceByCommande(SelectedCommande);
   String Subject="Votre commande est confirmeé ";
   String HtmlCode="<html>Votre Liste des produits :  ";
                  HtmlCode+="<table border=1>"
                          + "<tr>"
                          + "<td>Titre</td>"
                          + "<td>Prix</td>"
                          + "<td>Quantite</td>"
                          + "</tr>";
                  int i=0;
                  for(i=0;i<PanierToSend.articles.size();i++){
                      HtmlCode+="<tr><td> "+ PanierToSend.articles.get(i).getP().getTitre() +"</td><td>"+ String.valueOf(PanierToSend.articles.get(i).getP().getPrix_unitaire())+"</td>"
                              +"<td>"+PanierToSend.articles.get(i).getQuantite()+"</td>"
                              +"</tr>"
                              ;
                  }
                  HtmlCode+="</table>";
                         HtmlCode+="Prix Commande = " +String.valueOf(SelectedCommande.getPrix());
                         HtmlCode+=" <br> Prix Livraison = " +String.valueOf(l.getPrix());
                         float totale = SelectedCommande.getPrix()+l.getPrix();
                         HtmlCode+=" <br> Total = "+String.valueOf(totale);
                   HtmlCode+="</html>";
        try {
            JavamailUtil.sendMailWithHtmlCode(u.getMail(), Subject, HtmlCode);
        } catch (Exception ex) {
            Logger.getLogger(CommandeBackController.class.getName()).log(Level.SEVERE, null, ex);
        }
    
    
    refresh_table();
    }
    private void refresh_table(){
CommandeService Cs= new CommandeService();      
      ObservableList<Commande> list = FXCollections.observableArrayList();
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        user_id.setCellValueFactory(new PropertyValueFactory<>("user_id"));
        livraison_id.setCellValueFactory(new PropertyValueFactory<>("livraison_id"));
        prix.setCellValueFactory(new PropertyValueFactory<>("prix"));
        list.addAll(Cs.AfficherCommandes());   
    tableview.setItems(list);
    }

    
    @FXML
    private void envoi_Cat_Aide(ActionEvent event) {
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
    private void envoi_Aide(ActionEvent event) {
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
            Logger.getLogger(HomepageBackController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void envoi_cat_Stat(ActionEvent event) {
          try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("StatistiqueCategorieAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            StatistiqueCategorieAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");

            stat_aide.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(HomepageBackController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void envoi_statAide(ActionEvent event) {
    
       try {
            //récupération fichier fxml
            FXMLLoader loader = new FXMLLoader(getClass().getResource("StatistiqueAide.fxml"));
            //récupération du root  à partir du fichier fxml
            Parent root = loader.load();
            //récupération du controller lier au fichier fxml
            StatistiqueAideController dpc = loader.getController();
            //   dpc.setLbMessage(id_table.getSelectionModel().getSelectedItem().getId() + "");

            stat_aide.getScene().setRoot(root);
        } catch (IOException ex) {
            Logger.getLogger(HomepageBackController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    @FXML
    private void gestionsociete(ActionEvent event) {
        try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageBackGestionSociete.fxml"));
           Parent root= loader.load();
            gestionsociete.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
    }
    

    @FXML
    private void gestionuser(ActionEvent event) {
       try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageBackGestionUser.fxml"));
           Parent root= loader.load();
            gestionuser.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
    }
    @FXML
    private void envoi_gestion_board(ActionEvent event) {
                 try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherBoard.fxml"));
     Parent root= loader.load();
            deconnecter.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void envoi_gestion_cat_board(ActionEvent event) {
                try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherCategorie.fxml"));
     Parent root= loader.load();
            deconnecter.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void gestionCommande(ActionEvent event) {
     try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("CommandeBack.fxml"));
           Parent root= loader.load();
            gestionsociete.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(CommandeBackController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
    }

    @FXML
    private void gestionLivraison(ActionEvent event) {
         try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("LivraisonBack.fxml"));
           Parent root= loader.load();
            gestionsociete.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(CommandeBackController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
    }

    @FXML
    private void deconneecter(ActionEvent event) {
        Session.getSession().clearSession();
              try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionConnexion.fxml"));
     Parent root= loader.load();
            gestionuser.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
}
