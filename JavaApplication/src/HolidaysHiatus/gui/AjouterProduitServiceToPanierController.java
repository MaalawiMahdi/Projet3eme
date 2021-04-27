/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.ProduitService;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.TextField;

/**
 * FXML Controller class
 *
 * @author drwhoo
 */
public class AjouterProduitServiceToPanierController implements Initializable {

    @FXML
    private TextField quantite1;
    private ProduitService ProduitService;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.print(ProduitService);
        // TODO
    }    

    @FXML
    private void AjouterProduit(ActionEvent event) {
    }

    public ProduitService getProduitService() {
        return ProduitService;
    }

    public void setProduitService(ProduitService ProduitService) {
        this.ProduitService = ProduitService;
    }
    
}
