/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.services.CrudBoard;
import HolidaysHiatus.services.CrudCategorie;
import HolidaysHiatus.tools.Session;
import java.io.IOException;
import java.net.URL;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.chart.LineChart;
import javafx.scene.chart.PieChart;
import javafx.scene.chart.XYChart;
import javafx.scene.control.Button;
import javafx.stage.Stage;
import org.controlsfx.control.Notifications;

/**
 * FXML Controller class
 *
 * @author AMINE
 */
public class BoardStatController implements Initializable {
    @FXML
    private PieChart stat;
    ObservableList<PieChart.Data> piechartdata;
    XYChart.Series<String, Double> linechartdata = new XYChart.Series();
  
    Connection cnx;
    ResultSet rs;
    @FXML
    private LineChart<String, Double> statcourbe;
    @FXML
    private Hyperlink btn_accueil;
    @FXML
    private Button BacktoBoard;
    @FXML
    private Hyperlink comptebusinneslink;

    /**
     * Initializes the controller class.
     */
    
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
        
        try {
            // TODO
            loadDataPie();
        } catch (SQLException ex) {
            Logger.getLogger(BoardStatController.class.getName()).log(Level.SEVERE, null, ex);
        }
        stat.setData(piechartdata);
        try {
            loadDataLine();
        } catch (SQLException ex) {
            Logger.getLogger(BoardStatController.class.getName()).log(Level.SEVERE, null, ex);
        }
        statcourbe.getData().add(linechartdata);
    }    
    public void loadDataPie() throws SQLException{
        piechartdata = FXCollections.observableArrayList();
        String dbUsername = "root";
        String dbPassword = "";
        String dbURL = "jdbc:mysql://localhost:3306/holidayhiatus?useTimezone=true&serverTimezone=UTC";
        
  
        
        cnx = DriverManager.getConnection(dbURL, dbUsername, dbPassword);
        PreparedStatement pst = cnx.prepareStatement("SELECT * from categorie_board");
        rs=pst.executeQuery();
        CrudBoard sp = new CrudBoard();
CrudCategorie sc= new CrudCategorie();
double min=100;     
String titre="";
        while(rs.next()){
            piechartdata.add(new PieChart.Data(rs.getString("titre"),sc.calculer_nombre(rs.getInt(1))));
           if(sc.calculer_nombre(rs.getInt(1))<min)
           {   min=sc.calculer_nombre(rs.getInt(1));
           titre=rs.getString("titre");}
            System.out.println("post1\n");
            //sp.postfb();
            System.out.println("post2");
                     
        }
         Notifications.create().text("Categorie Ajouter\n")
                    .text(titre+"  est la categorie qui a le nombre Minimal des Boards")
                    .darkStyle().showWarning();
    }
    public void loadDataLine() throws SQLException{
       // linechartdata = FXCollections.observableArrayList();
       String dbUsername = "root";
        String dbPassword = "";
        String dbURL = "jdbc:mysql://localhost:3306/holidayhiatus?useTimezone=true&serverTimezone=UTC";
        
        cnx = DriverManager.getConnection(dbURL, dbUsername, dbPassword);
        PreparedStatement pst = cnx.prepareStatement("SELECT * from board");
        rs=pst.executeQuery();
        
        while(rs.next()){
            //(sp.calculer_nombre(rs.getInt(2)
               //    linechartdata.getData().add(new XYChart.Data<String, Double>(rs.getString("categorie_id"),rs.getDouble("id")));
            CrudBoard sp = new CrudBoard();
CrudCategorie sc= new CrudCategorie();
        linechartdata.getData().add(new XYChart.Data<String, Double>(sp.getNameOf(rs.getInt(2)),sp.calculer_nombre(rs.getInt(2))));
          
        } 
    }

    
    
    
    @FXML
    private void ActionBackToBoard(ActionEvent event) throws IOException {
          
              Node node = (Node) event.getSource();
        Stage stage = (Stage) node.getScene().getWindow();
        Parent root = FXMLLoader.load(getClass().getResource("AfficherBoardClient.fxml"));/* Exception */
        Scene scene = new Scene(root);
        stage.setScene(scene);
        stage.show();
    }

    @FXML
    private void envoiAccueil(ActionEvent event) {
    }
    
    @FXML
    private void inscriptionbusiness(ActionEvent event) {                                                                                                   
         if(Session.getSession().getSessionSociete()!=null){
        if(Session.getSession().getConnectedBoard()!=null){
          try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("HomepageBackSociete.fxml"));
           Parent root= loader.load();
            btn_accueil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
        }else{
            try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("AjouterBoard.fxml"));
           Parent root= loader.load();
            btn_accueil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
        
        }
        }else{
            try {
           FXMLLoader loader = new FXMLLoader(getClass().getResource("InscriptionSociete.fxml"));
           Parent root= loader.load();
            btn_accueil.getScene().setRoot(root);
            } catch (IOException ex) {
            Logger.getLogger(InscriptionConnexionController.class.getName()).log(Level.SEVERE, null, ex);
     
    }
        }
    }


  

}
