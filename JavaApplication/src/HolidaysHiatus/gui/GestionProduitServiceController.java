/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.Categorie;
import HolidaysHiatus.entites.Panier;
import HolidaysHiatus.entites.ProduitService;
import HolidaysHiatus.entites.ArticlePanier;
import HolidaysHiatus.tools.JavamailUtil;
import HolidaysHiatus.services.PanierServiceImp;
import HolidaysHiatus.services.ProduitServiceCRUD;
import HolidaysHiatus.tools.Pdf;
import HolidaysHiatus.tools.Session;
import com.itextpdf.text.DocumentException;
import java.io.FileNotFoundException;

import java.io.IOException;
import java.net.URL;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ListChangeListener;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.event.EventType;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.control.Button;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.input.KeyEvent;
import javafx.stage.Stage;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.layout.StackPane;
import javafx.stage.Modality;
import org.apache.commons.validator.routines.EmailValidator;





/**
 * FXML Controller class
 *
 * @author ASUS
 */
public class GestionProduitServiceController implements Initializable {

    @FXML
    private Button btnmodif;
    @FXML
    private Button btnsupp;
    @FXML
    private TextField chercher;
     @FXML
    private TableView<ProduitService> tabproduit;
    @FXML
    private TableColumn<ProduitService, Integer> categorie_id;
    @FXML
    private TableColumn<ProduitService, String> titre;
    @FXML
    private TableColumn<ProduitService, String> description;
    @FXML
    private TableColumn<ProduitService, String> type;
    @FXML
    private TableColumn<ProduitService, Float> prix_unitaire;
    @FXML
    private TableColumn<ProduitService, Integer> id;
    private Button btnpanier;

    /**
     * Initializes the controller class.
     */
              ObservableList<ArticlePanier> list = FXCollections.observableArrayList();
    private TableView<String> tvtotal;
         private static String px;
    private Button supp;
    @FXML
    private Button pdf;
    @FXML
    private Hyperlink GestionDesCategoriesProduitsServices;
    @FXML
    private Hyperlink backSocieteProduitService;
    @FXML
    private Label id_ID;
    private int boardId;
    @FXML
    private TextField emailAdresse;
    @FXML
    private Button envoyerList;


    @Override
    public void initialize(URL url, ResourceBundle rb) {
  boardId=Session.getSession().getConnectedBoard().getId();
        ProduitServiceCRUD ProduitCrud= new ProduitServiceCRUD();      
      ObservableList<ProduitService> list = FXCollections.observableArrayList();
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        categorie_id.setCellValueFactory(new PropertyValueFactory<>("id_categorie"));
        titre.setCellValueFactory(new PropertyValueFactory<>("titre"));
        description.setCellValueFactory(new PropertyValueFactory<>("description"));
        type.setCellValueFactory(new PropertyValueFactory<>("type"));
        prix_unitaire.setCellValueFactory(new PropertyValueFactory<>("prix_unitaire"));

        list.addAll(ProduitCrud.displayProduitService(boardId));
      tabproduit.setItems(list);
      ObservableList selectedCells = tabproduit.getSelectionModel().getSelectedCells();
        selectedCells.addListener(new ListChangeListener() {
            @Override
            public void onChanged(ListChangeListener.Change c) {
                ProduitService produitselected = (ProduitService) tabproduit.getSelectionModel().getSelectedItem();
                System.out.println("selected value " + produitselected);
                if(produitselected!=null){
                btnsupp.setDisable(false);
               btnmodif.setDisable(false);
                              btnpanier.setDisable(false);

                }else{
                btnsupp.setDisable(true);
                 btnmodif.setDisable(true);
                                btnpanier.setDisable(true);

                }
            }
           
        });

    }    



    @FXML
    private void chercher(KeyEvent event) {
          System.out.println("chercher ");
      ProduitServiceCRUD PService= new ProduitServiceCRUD();      
      ObservableList<ProduitService> list = FXCollections.observableArrayList();
      list.addAll(PService.Chercher(chercher.getText(),6));
    tabproduit.setItems(list);
      System.out.print("list value \n " + list);
    }

    @FXML
    private void modifierProduit(ActionEvent event) throws IOException {
            ProduitService produitselected = (ProduitService) tabproduit.getSelectionModel().getSelectedItem();
System.out.print(produitselected);
         ProduitServiceFormController.SetItems("modifier",produitselected.getId(),produitselected.getTitre(),
                  produitselected.getDescription(), 
                  produitselected.getType(),
                  Float.toString(produitselected.getPrix_unitaire()), produitselected.getId_categorie().toString());
  
Stage stage = new Stage();
         Parent root = FXMLLoader.load(
        GestionProduitServiceController.class.getResource("GestionProduitServiceForm.fxml"));
       
         stage.setScene(new Scene(root));
    stage.setTitle("FormService");
    stage.initModality(Modality.WINDOW_MODAL);
    stage.initOwner(
        ((Node)event.getSource()).getScene().getWindow() );
    
    stage.show();
    }

    @FXML
    private void supprimerProduit(ActionEvent event) {
    ProduitService produitselected = (ProduitService) tabproduit.getSelectionModel().getSelectedItem();
    
      ProduitServiceCRUD PService= new ProduitServiceCRUD();      
      PService.supprimerProduitService(produitselected);
     ObservableList<ProduitService> list = FXCollections.observableArrayList();
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        categorie_id.setCellValueFactory(new PropertyValueFactory<>("categorie_id"));
        titre.setCellValueFactory(new PropertyValueFactory<>("titre"));
        description.setCellValueFactory(new PropertyValueFactory<>("description"));
        type.setCellValueFactory(new PropertyValueFactory<>("type"));
        prix_unitaire.setCellValueFactory(new PropertyValueFactory<>("prix_unitaire"));

        list.addAll(PService.displayProduitService(boardId));
      tabproduit.setItems(list);
     
    }

    
/*
    @FXML
    private void ajouterPanier(ActionEvent event) throws IOException {
    ProduitService produitselected = (ProduitService) tabproduit.getSelectionModel().getSelectedItem();
          PanierServiceImp PService= new PanierServiceImp();    

          ArticlePanier a = new ArticlePanier() ;
          
          list.add(a);
                   
                            System.out.println(list.getClass());
      int s = Integer.parseInt(quantite.getText());
      PService.ajouterArticle(produitselected,s);
      float z;
        z = ((produitselected.prix_unitaire) * s);
       String x = Float.toString(z) ;
       
        a.p=produitselected ;
       a.saif=produitselected.titre;
         a.t=z;
         //a.prix=a.prix+z;
          titrePanier.setCellValueFactory(new PropertyValueFactory<>("saif"));
                    total.setCellValueFactory(new PropertyValueFactory<>("t"));
                                        tvPanier.setItems(list);
                            ObservableList selectedCells = tvPanier.getSelectionModel().getSelectedCells();

     PService.displayProduitService(boardId);
   
        double tot = list.stream().mapToDouble(e->e.getT()).sum() ;
        double promo = tot ;
             System.out.println(tot);
             
             
                    prix.setText(String.valueOf(tot));
                    if(promo>150){
                        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("vous avez une promo "); 
        alert.setHeaderText("");
        alert.setContentText(" vous avez une promo de 20% !");
        alert.showAndWait();
        tot=tot*0.8;
                            prix.setText(String.valueOf(tot));

        
                    }
   }

    @FXML
    private void suppPanier(ActionEvent event) {

    ArticlePanier produitselected = (ArticlePanier) tvPanier.getSelectionModel().getSelectedItem();
          PanierServiceImp PService= new PanierServiceImp();  
          double tot=0;
             System.out.println(tot);
                       ArticlePanier a = new ArticlePanier() ;
    
             
                    prix.setText(String.valueOf(tot));
          
                   PService.supprimerArticle(produitselected);
                   
                   ObservableList<ArticlePanier> list = FXCollections.observableArrayList();
      titrePanier.setCellValueFactory(new PropertyValueFactory<>("saif"));
                    total.setCellValueFactory(new PropertyValueFactory<>("t"));
                                        tvPanier.setItems(list);
          
          list.add(a);

        PService.displayProduitService(boardId);
     



         
    
    }
*/
    @FXML
    private void Pdf(ActionEvent event) throws SQLException, IOException {
            Pdf pdf = new Pdf();

        try {
            pdf.listCategorieAide();
        } catch (FileNotFoundException ex) {
            Logger.getLogger(GestionProduitServiceController.class.getName()).log(Level.SEVERE, null, ex);
        } catch (DocumentException ex) {
            Logger.getLogger(GestionProduitServiceController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    @FXML
    private void GestionDesCategoriesProduitsServices(ActionEvent event) {
         try{
                FXMLLoader loader = new FXMLLoader(getClass().getResource("GestionCategorie.fxml"));
           Parent root= loader.load();
            emailAdresse.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(GestionProduitServiceController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
    }
    @FXML

    private void backSocieteProduitService(ActionEvent event) {
          try{
                FXMLLoader loader = new FXMLLoader(getClass().getResource("GestionProduitService.fxml"));
           Parent root= loader.load();
            emailAdresse.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(GestionProduitServiceController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
    }

    @FXML
    private void EnvoyerButtonOn(KeyEvent event) {
        if(emailAdresse.getText().compareTo("")!=0){
        envoyerList.setDisable(false);

        }else{
                envoyerList.setDisable(true);
}
    }

    @FXML
    private void envoyerList(ActionEvent event) {
                       EmailValidator validator = EmailValidator.getInstance();
                       if(validator.isValid(emailAdresse.getText())==false){
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Adresse mail non valid "); 
        alert.setHeaderText("Adresse mail non valid ");
        alert.setContentText("");
        alert.showAndWait();
        emailAdresse.clear();
       
       }else{
                           ProduitServiceCRUD Ps =new ProduitServiceCRUD();
                               List<ProduitService> myList = Ps.displayProduitService(boardId) ;
                               
int i = 0;
                                     
                  String Subject = "Liste des produits ";
                  String message = "<html>Liste des produit </html>";
                  message+="<table border=1>"
                          + "<tr>"
                          + "<td>Titre</td>"
                          + "<td>Prix</td>"
                          + "</tr>";
                  for(i=0;i<myList.size();i++){
                      message+="<tr><td> "+ myList.get(i).getTitre() +"</td><td>"+ String.valueOf(myList.get(i).getPrix_unitaire())+"</td> </tr>";
                  }
                  message+="</table>";
                         
                  
                  
                          
                  try {
                      JavamailUtil.sendMailWithHtmlCode(emailAdresse.getText(), Subject,message);
                  } catch (Exception ex) {
                      Logger.getLogger(GestionProduitServiceController.class.getName()).log(Level.SEVERE, null, ex);
                  }

                       }

    }
 @FXML
    private void GestionSujet(ActionEvent event) {
        try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherSujet.fxml"));
           Parent root= loader.load();
            id_ID.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
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
    private void AjouterProduit(ActionEvent event) throws IOException {
          ProduitServiceFormController.SetItems("Ajouter");
  
Stage stage = new Stage();
         Parent root = FXMLLoader.load(
        GestionProduitServiceController.class.getResource("GestionProduitServiceForm.fxml"));
       
         stage.setScene(new Scene(root));
    stage.setTitle("FormService");
    stage.initModality(Modality.WINDOW_MODAL);
    stage.initOwner(
        ((Node)event.getSource()).getScene().getWindow() );
    
    stage.show();
        
    }
  

}
