/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;
import HolidaysHiatus.entities.*;
import HolidaysHiatus.services.*;
import HolidaysHiatus.tools.Session;
import java.awt.image.BufferedImage;
import java.io.File;
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
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;

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
import java.util.UUID;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ListChangeListener;
import javafx.collections.ObservableList;
import javafx.embed.swing.SwingFXUtils;
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
import javafx.scene.image.Image;
import javafx.scene.input.InputMethodEvent;
import javafx.scene.input.KeyEvent;
import javafx.stage.FileChooser;
import javax.imageio.ImageIO;
import org.apache.commons.io.FilenameUtils;



/**
 * FXML Controller class
 *
 * @author AMINE
 */
public class AfficherBoardController implements Initializable {

    private TextField txtAfficher;
    @FXML
    private TableView<Board> Tableboard;
    @FXML
    private TableColumn<Board,Integer> id;
    @FXML
    private TableColumn<Board, Integer> categorie;
     @FXML
    private TableColumn<Board,Integer> nbr_vue;
   
    @FXML
    private TableColumn<Board, String> titre;
    @FXML
    private TableColumn<Board, String> image;
    @FXML
    private ToolBar navbar;
    @FXML
    private ComboBox<Integer> gcombosupp;
    @FXML
    private Button gsuppspe;
    @FXML
    private Button gmofiersp;

    /**
     * Initializes the controller class.
     */
        PreparedStatement ste;
    Connection cnx;
    @FXML
    private TextField Titre;
    private TextField pic;
    private TextField Categorie;
    @FXML
    private TextField idBoard;
    @FXML
    private ComboBox<String> CategorieName;
    @FXML
    private Label id_ID;
    @FXML
    private TextField rechercher;
    @FXML
    private Button img;
   
         Board b = new Board();
    @FXML
    private Button ajouterB;
    @FXML
    private Hyperlink gestionuser;
    @FXML
    private Hyperlink gestionsociete;
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
    private Hyperlink deconnecter;
    @FXML
    private Hyperlink btn_cat_Board;

    public void afficher()
    {

          CrudBoard b= new CrudBoard();  
      ObservableList<Board> list = FXCollections.observableArrayList();
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        titre.setCellValueFactory(new PropertyValueFactory<>("titre"));
        image.setCellValueFactory(new PropertyValueFactory<>("pic"));
        
        categorie.setCellValueFactory(new PropertyValueFactory<>("categorie_id"));
        nbr_vue.setCellValueFactory(new PropertyValueFactory<>("nbr_vue"));

        list.addAll(b.AfficherBoard());
      Tableboard.setItems(list);
    }
  
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
          afficher();
        
    ObservableList listt = navbar.getItems();
                  
             
                  CrudCategorie cg=new CrudCategorie();
                       List <CategorieBoard> CBoards  = new ArrayList();
                       CBoards=cg.AfficherBoard();
                        Button bt2 = new Button("Afficher tout");
                         listt.add(bt2);
                                               bt2.setOnAction(new EventHandler<ActionEvent>() {
                                                   @Override public void handle(ActionEvent e) {
                                                       afficher();
                                                   }
                                               });

         for (CategorieBoard C : CBoards) {
                   Button bt1 = new Button(C.getTitre());
                         listt.add(bt1);
                        
                      bt1.setOnAction(new EventHandler<ActionEvent>() {
    @Override public void handle(ActionEvent e) {
         CrudBoard b= new CrudBoard();      
      ObservableList<Board> list = FXCollections.observableArrayList();
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        titre.setCellValueFactory(new PropertyValueFactory<>("titre"));
        image.setCellValueFactory(new PropertyValueFactory<>("pic"));
        categorie.setCellValueFactory(new PropertyValueFactory<>("categorie_id"));
        nbr_vue.setCellValueFactory(new PropertyValueFactory<>("nbr_vue"));
        list.addAll(b.AfficherBoardavance(C.id));
      Tableboard.setItems(list);
    }
});}
         
  afficher();
                     Actualisercombox();
                     Actualisercomboxname();
                     ObservableList selectedCells = Tableboard.getSelectionModel().getSelectedCells();
        selectedCells.addListener(new ListChangeListener() {
            @Override
            public void onChanged(ListChangeListener.Change c) {
                Board BoardSelected =  Tableboard.getSelectionModel().getSelectedItem();
                System.out.println("selected Board value " + BoardSelected);
                         CrudBoard b= new CrudBoard();      

                if(BoardSelected!=null){
                    
                     gmofiersp.setDisable(false);
                    String a=String.valueOf(BoardSelected.getId());
                    idBoard.setText(a);
                    Titre.setText(BoardSelected.getTitre());
                      //  pic.setText(BoardSelected.getPic());
                       b.ajouter_vue(BoardSelected);
                       // afficher();

                }else{
                gmofiersp.setDisable(true);
                idBoard.clear();
                Titre.clear();
               // pic.clear();
                }
            }
        });
    
    
    }    
  public void Actualisercomboxname()
    {
               CrudCategorie c=new CrudCategorie();

           ObservableList <String> options = FXCollections.observableArrayList();
        try {
            options = FXCollections.observableArrayList();
            // Execute query and store result in a resultset
            ResultSet rs = c.actualiser();
            while (rs.next()) {
                //get string from db,whichever way 
                
                options.add(rs.getString("titre"));
            }
        } catch (SQLException ex) {
            System.err.println("Error" + ex);
        }
        System.out.println(options);
        CategorieName.setItems(null);
        CategorieName.setItems(options);
        
    }
    public void Actualisercombox()
    {
        //combobox
 
                 CrudBoard sp = new CrudBoard();

           ObservableList <Integer> options = FXCollections.observableArrayList();
        try {
            options = FXCollections.observableArrayList();
            // Execute query and store result in a resultset
            ResultSet rs =sp.actualiser();
            while (rs.next()) {
                //get string from db,whichever way 
                
                options.add(rs.getInt("id"));
            }
        } catch (SQLException ex) {
            System.err.println("Error" + ex);
        }
        System.out.println(options);
        gcombosupp.setItems(null);
        gcombosupp.setItems(options);
        
    }
    @FXML
    private void SupprimerBoard(ActionEvent event) {
        
            CrudBoard sp = new CrudBoard();
        Board l = new Board();
        
//    String id = gid.getText();
//        l.setId_membre(Integer.parseInt(id));
        System.out.println( "id selected " + gcombosupp.getSelectionModel().getSelectedItem());
        l.setId(gcombosupp.getSelectionModel().getSelectedItem());
        sp.supprimer(l);
        afficher();
        Actualisercombox();
                             Actualisercomboxname();

}

    @FXML
    private void ModfierBoard(ActionEvent event) {
          
            CrudBoard sp = new CrudBoard();
            CrudCategorie c=new CrudCategorie();

            String s = idBoard.getText();
        int si = Integer.parseInt(s);
            String nom=CategorieName.getSelectionModel().getSelectedItem();  
     int id=c.CategorieBoardIdOf(nom);
        
       b.setCategorie_id(id);
       b.setId(si);
       b.setTitre(Titre.getText());
       // String datee = String.valueOf(gdate.getValue());
     
        
       sp.modifier(b);
        System.out.println(b);
        JOptionPane.showMessageDialog(null, "Board modifiée !");
     afficher();
      Actualisercombox();
                            Actualisercomboxname();

    }

    

    private void StatAction(ActionEvent event) {
                      try{ Node node = (Node) event.getSource();
        Stage stage = (Stage) node.getScene().getWindow();
        Parent root = FXMLLoader.load(getClass().getResource("BoardStat.fxml"));/* Exception */
        Scene scene = new Scene(root);
        stage.setScene(scene);
        stage.show();      } catch (IOException ex) {
            Logger.getLogger(AjouterBoardController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void multiC(KeyEvent event) {
                CrudBoard b= new CrudBoard();   
              String text=rechercher.getText();
      ObservableList<Board> list = FXCollections.observableArrayList();
      list.addAll(b.Chercher(text));   
          Tableboard.setItems(list);
    }

    @FXML
    private void insert_image(ActionEvent event) {
         FileChooser fileChooser = new FileChooser();
        File selectedFile = fileChooser.showOpenDialog(new Stage());
                try {
                BufferedImage bufferedImage = ImageIO.read(selectedFile);
                Image image = SwingFXUtils.toFXImage(bufferedImage, null);
                String uniqueid = UUID.randomUUID().toString();
                System.out.println("\n" + uniqueid);
                
                System.out.println(selectedFile.getPath());
                String extension= FilenameUtils.getExtension(selectedFile.getAbsolutePath());
              
                Path tmp = Files.move(Paths.get(selectedFile.getPath()),
                       Paths.get("C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\"+uniqueid+"."+extension));
              System.out.print(tmp);
               b.setPic(uniqueid+"."+extension);
                
                } catch (IOException ex) {
                    System.out.print(ex.getMessage());
                
            }
    }

    @FXML
    private void AjouterB(ActionEvent event) {
          try{ Node node = (Node) event.getSource();
        Stage stage = (Stage) node.getScene().getWindow();
        Parent root = FXMLLoader.load(getClass().getResource("AjouterBoard.fxml"));/* Exception */
        Scene scene = new Scene(root);
        stage.setScene(scene);
        stage.show();      } catch (IOException ex) {
            Logger.getLogger(AjouterBoardController.class.getName()).log(Level.SEVERE, null, ex);
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
    private void deconneecter(ActionEvent event) {
                                            Session.getSession().clearSession();
              try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionConnexion.fxml"));
     Parent root= loader.load();
            deconnecter.getScene().setRoot(root);
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
            Logger.getLogger(AfficherAideController.class.getName()).log(Level.SEVERE, null, ex);
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
            Logger.getLogger(AfficherCategorieAideController.class.getName()).log(Level.SEVERE, null, ex);
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


 

}
 