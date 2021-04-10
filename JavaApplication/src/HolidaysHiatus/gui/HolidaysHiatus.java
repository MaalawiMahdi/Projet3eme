/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import java.io.IOException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.application.Application;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.layout.StackPane;
import javafx.stage.Stage;


/**
 *
 * @author drwhoo
 */
public class HolidaysHiatus extends Application {
    
    @Override
    public void start(Stage primaryStage) {
       
        
        
            Parent root;
        try {
          // root = FXMLLoader.load(getClass().getResource("HomepageBack.fxml"));
           // root = FXMLLoader.load(getClass().getResource("HomepageBackSociete.fxml"));
            root = FXMLLoader.load(getClass().getResource("InscriptionConnexion.fxml"));
           
            Scene scene = new Scene(root);
            primaryStage.setTitle("HolidaysHiatus");
            primaryStage.setScene(scene);
            primaryStage.setMaximized(true);
            primaryStage.show();
          } catch (IOException ex) {
            Logger.getLogger(HolidaysHiatus.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        launch(args);
    }
    
}