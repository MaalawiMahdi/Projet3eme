/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.ProduitService;
import HolidaysHiatus.services.ProduitServiceCRUD;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.TextField;

/**
 * FXML Controller class
 *
 * @author ASUS
 */
public class ProduitServiceFormController implements Initializable {

    @FXML
    private Button valider;
    @FXML
    private  TextField titre;
    @FXML
    private  TextField description;
    @FXML
    private  TextField type;
    @FXML
    private  TextField prixunitaire;
    @FXML
    private  TextField catid;
        private static int id;
     private static String actiontype;
    private static String titreval;
       private static String  descriptionval;
       private static String  typeval;
        private static String prixunitaireval;
       private static String  catidval;
    

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        if(actiontype.compareTo("modifier")==0){
        titre.setText(titreval);

        description.setText(descriptionval);
        type.setText(typeval);
        prixunitaire.setText(prixunitaireval);
                catid.setText(catidval);
        }
        
    }    

    @FXML
    private void valider(ActionEvent event) {
        if(actiontype.compareTo("modifier")==0){
            ProduitServiceCRUD servicep= new ProduitServiceCRUD();
            //nteger id, Integer id_categorie, String titre, String description, String type, float prix_unitaire
            servicep.modifierProduitService(new ProduitService(id,Integer.parseInt(catid.getText()),titre.getText(),description.getText(),type.getText(),Float.parseFloat(prixunitaire.getText())));
    
        }
        
    }


    public static void SetItems (String actiontype,int id,String titre, String description, String type, String prixunitaire, String catid) {
        ProduitServiceFormController.titreval=titre;
        ProduitServiceFormController.descriptionval=description;
        ProduitServiceFormController.typeval=type;
        ProduitServiceFormController.prixunitaireval=prixunitaire;
        ProduitServiceFormController.catidval=catid;
    ProduitServiceFormController.id=id;
    ProduitServiceFormController.actiontype=actiontype;
    }

    
}