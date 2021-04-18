/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.InformationsSupplementaires;
import HolidaysHiatus.entites.User;
import HolidaysHiatus.services.InformationsSupplementairesService;
import HolidaysHiatus.services.UserService;
import HolidaysHiatus.tools.BCrypt;
import HolidaysHiatus.tools.Session;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.net.URL;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.ResourceBundle;
import java.util.UUID;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.embed.swing.SwingFXUtils;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.MenuItem;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.AnchorPane;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import javax.imageio.ImageIO;
import org.apache.commons.io.FilenameUtils;

/**
 * FXML Controller class
 *
 * @author ASUS
 */
public class ProfilController implements Initializable {

    @FXML
    private Hyperlink btn_accueil;
    @FXML
    private MenuItem profil;
    @FXML
    private MenuItem deconnecter;
    @FXML
    private Label id_ID;
    @FXML
    private AnchorPane home;
    @FXML
    private Label mailvalue;
    @FXML
    private Label motdepassevalue;
    @FXML
    private Label typevalue;
    @FXML
    private Label nomvalue;
    @FXML
    private Label prenomvalue;
    @FXML
    private Label telvalue;
    @FXML
    private ImageView profilimage;
    @FXML
    private AnchorPane profildata;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
      profilimage.setImage(new Image("file:C:\\Users\\ASUS\\Desktop\\integrationfinal\\Projet3eme\\SymfonyApplication\\public\\profil\\user.png"));
    User u = Session.StartSession().getSessionUser();
    InformationsSupplementairesService InforSupService = new InformationsSupplementairesService();
    InformationsSupplementaires information = InforSupService.chercherparidclient(u.getId());
    System.out.print(information);
    mailvalue.setText(u.getMail());
    motdepassevalue.setText(u.getPassword());
    typevalue.setText(u.getType());
    if(information.getImage()!=null){
   //   profilimage.setImage(new Image("file:C:\\Users\\ASUS\\Desktop\\integrationfinal\\Projet3eme\\SymfonyApplication\\public\\profil\\"+information.getImage()));    
    profilimage.setImage(new Image("file:C:\\Users\\ASUS\\Desktop\\integrationfinal\\Projet3eme\\SymfonyApplication\\public\\profil\\"+information.getImage()));
    }
    if(information.getNom()!=null){
    nomvalue.setText(information.getNom());
    }
    if(information.getPrenom()!=null){
    prenomvalue.setText(information.getPrenom());
    }
    if(information.getTell()!=null){
    telvalue.setText(information.getTell());
    }      FileChooser fileChooser = new FileChooser();
    
            /*FileChooser.ExtensionFilter extFilterJPG = 
                    new FileChooser.ExtensionFilter("JPG files (.JPG)", ".JPG");
            FileChooser.ExtensionFilter extFilterjpg = 
                    new FileChooser.ExtensionFilter("jpg files (.jpg)", ".jpg");
            FileChooser.ExtensionFilter extFilterPNG = 
                    new FileChooser.ExtensionFilter("PNG files (.PNG)", ".PNG");
            FileChooser.ExtensionFilter extFilterpng = 
                    new FileChooser.ExtensionFilter("png files (.png)", ".png");
            fileChooser.getExtensionFilters()
                    .addAll(extFilterJPG, extFilterjpg, extFilterPNG, extFilterpng);
*/
        Button button = new Button("Select File");
        button.setLayoutX(profilimage.getLayoutX());
        button.setLayoutY(profilimage.getLayoutY()+100);
        button.setOnAction(e -> {
            File selectedFile = fileChooser.showOpenDialog(new Stage());
                try {
                BufferedImage bufferedImage = ImageIO.read(selectedFile);
                Image image = SwingFXUtils.toFXImage(bufferedImage, null);
                profilimage.setImage(image);
                String uniqueid = UUID.randomUUID().toString();
                System.out.println("\n" + uniqueid);
          
                System.out.println(selectedFile.getPath());
                String extension= FilenameUtils.getExtension(selectedFile.getAbsolutePath());
               Path tmp = Files.move(Paths.get(selectedFile.getPath()),
                       Paths.get("C:\\Users\\ASUS\\Desktop\\integrationfinal\\Projet3eme\\SymfonyApplication\\public\\profil\\"+uniqueid+"."+extension));
              System.out.print(tmp);
               information.setImage(uniqueid+"."+extension);
               InformationsSupplementairesService i_service = new InformationsSupplementairesService();
               i_service.update(information);
                
                } catch (IOException ex) {
                    System.out.print(ex.getMessage());
                
            }
            
        });
        profildata.getChildren().add(button);

    }    

  
    @FXML
    private void envoiAccueil(ActionEvent event) {
    }
    @FXML
     private void inscriptionbusiness(ActionEvent event) {
            try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionSociete.fxml"));
           Parent root= loader.load();
            btn_accueil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
    }

    @FXML
    private void deconnecter(ActionEvent event) {
    Session.getSession().clearSession();
              try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionConnexion.fxml"));
     Parent root= loader.load();
            btn_accueil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void profil(ActionEvent event) {
       try {
     FXMLLoader loader = new FXMLLoader(getClass().getResource("profil.fxml"));
     Parent root= loader.load();
            btn_accueil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void modifierlink(ActionEvent event) {
        mailvalue.setOpacity(0);
        TextField mailvalueinput = new TextField();
        mailvalueinput.setLayoutX(mailvalue.getLayoutX());
        mailvalueinput.setLayoutY(mailvalue.getLayoutY());
        mailvalueinput.setText(mailvalue.getText());
        motdepassevalue.setOpacity(0);
        PasswordField motdepasseinput = new PasswordField();
        motdepasseinput.setLayoutX(motdepassevalue.getLayoutX());
        motdepasseinput.setLayoutY(motdepassevalue.getLayoutY());
        nomvalue.setOpacity(0);
        TextField nomvalueinput = new TextField();
        nomvalueinput.setLayoutX(nomvalue.getLayoutX());
        nomvalueinput.setLayoutY(nomvalue.getLayoutY());
        nomvalueinput.setText(nomvalue.getText());
        prenomvalue.setOpacity(0);
        TextField prenomvalueinput = new TextField();
        prenomvalueinput.setLayoutX(prenomvalue.getLayoutX());
        prenomvalueinput.setLayoutY(prenomvalue.getLayoutY());
        prenomvalueinput.setText(prenomvalue.getText());
        telvalue.setOpacity(0);
        TextField telvalueinput = new TextField();
        telvalueinput.setLayoutX(telvalue.getLayoutX());
        telvalueinput.setLayoutY(telvalue.getLayoutY());
        profildata.getChildren().addAll(mailvalueinput,motdepasseinput,nomvalueinput,prenomvalueinput,telvalueinput);
        Button modifierbutton = new Button("modifier votre compte");
        modifierbutton.setLayoutX(660);
        modifierbutton.setLayoutY(500);
        profildata.getChildren().add(modifierbutton);
        modifierbutton.setOnAction(new EventHandler<ActionEvent>() {
        @Override
        public void handle(ActionEvent actionEvent) {
        if(motdepasseinput.getText().compareTo("")==0||mailvalueinput.getText().compareTo("")==0){
         Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("un ou plusieurs champs sont manquants"); 
        alert.setHeaderText("un ou plusieurs champs sont manquants ");
        alert.setContentText("les champs e-mail et mot de passe sont obligatoires !");
        alert.showAndWait();
        }else{
            //int user_id, String nom, String prenom, String tell
        InformationsSupplementaires infoedit = new InformationsSupplementaires(Session.getSession().getSessionUser().getId(),nomvalueinput.getText(),prenomvalueinput.getText(),telvalueinput.getText());
        User useredit = Session.StartSession().getSessionUser();
        useredit.setMail(mailvalueinput.getText());
        useredit.setPassword(BCrypt.hashpw(motdepasseinput.getText(),BCrypt.gensalt()));
        UserService u_service = new  UserService();
        InformationsSupplementairesService i_service = new InformationsSupplementairesService();
        u_service.UpdateUser(useredit);
        i_service.update(infoedit);
         Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Profil modifié"); 
        alert.setHeaderText("Profil modifié");
        alert.setContentText("Profil modifié");
        alert.showAndWait();
        
        }
        }
    });        
        
    }
}
