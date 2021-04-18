/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.tools;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 *
 * @author Asus
 */
public class MyConnection {
    
    public  String url="jdbc:mysql://localhost:3306/holidayhiatus?serverTimezone=UTC";   
    public  String pwd="";
    public  String login="root";
    public static MyConnection instance;
    public Connection cnx;

    public Connection getCnx() {
        return cnx;
    }
    
    

    private MyConnection() {
         try {
             cnx=  DriverManager.getConnection(url, login, pwd);
            System.out.println("Connexion établie !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        
    }
    
    public static MyConnection getInstance(){
        
        if(instance == null){
            instance=new MyConnection();
        }
        return instance;
    }
    
    
}
