/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import com.restfb.DefaultFacebookClient;
import com.restfb.FacebookClient;
import com.restfb.Parameter;
import com.restfb.types.FacebookType;
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
       
          /*   String accessToken="EAA1QYFl4OYABAAsXhgAe08F8mhTf52ZBPBY9lefCubIjuPJxbaNxg9MiCRuWbhCor33p6ETDOovoZBZAKwlRiWjpLqm5FdHDwsRZBv0emuwsO6zG5TmYfMMzJZCuo0ad7d6ChADIFN8V1HfJ9ZCyb3KizKDnBZBjqJgjdZAQh4jujwoooJ2SznAWTabPaU0SV3foZCnDH0CeBNOaKb77ZBSCZCdwa1mw6jsS7wSDCvJRJCUqgZDZD";
          FacebookClient fbClient=new DefaultFacebookClient(accessToken);
              FacebookType response=fbClient.publish("me/feed", FacebookType.class,Parameter.with("message", "Java Graph Api test"));
          System.out.println("fb.com/"+response);
     
        */  
            Parent root;
        try {
            //root = FXMLLoader.load(getClass().getResource("HomepageBack.fxml"));
            root = FXMLLoader.load(getClass().getResource("AfficherBoardClient.fxml"));
      
            Scene scene = new Scene(root);
            primaryStage.setTitle("HolidaysHiatus");
            primaryStage.setScene(scene);
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
