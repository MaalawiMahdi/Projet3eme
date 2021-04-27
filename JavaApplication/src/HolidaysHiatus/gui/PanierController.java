/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entites.Panier;
import HolidaysHiatus.entites.ProduitService;
import HolidaysHiatus.services.PanierServiceImp;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;

/**
 * FXML Controller class
 *
 * @author DELL
 */
public class PanierController implements Initializable {

    @FXML
    private TableView<ProduitService> tvPanier;
    @FXML
    private TableColumn<ProduitService, String> nomprod;
    @FXML
    private TableColumn<?, ?> total;
    

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        //ProduitService produitselected = (ProduitService) tabproduit.getSelectionModel().getSelectedItem();
          PanierServiceImp PService= new PanierServiceImp();    
ProduitService p = new ProduitService();
p.titre="ahlem" ;
          ObservableList<ProduitService> list = FXCollections.observableArrayList();
          list.add(p);
                   
                            System.out.println(list.getClass());


             nomprod.setCellValueFactory(new PropertyValueFactory<>("titre"));
                      tvPanier.setItems(list);
                            ObservableList selectedCells = tvPanier.getSelectionModel().getSelectedCells();


        //total.setCellValueFactory(new PropertyValueFactory<>("total"));
 //    PService.displayProduitService(1);
    }    
    
}
