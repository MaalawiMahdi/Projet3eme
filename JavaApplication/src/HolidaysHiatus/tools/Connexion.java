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
 * @author ASUS
 */
public class Connexion {
    String url="jdbc:mysql://localhost:3308/holidayhiatusintegration?useTimezone=true&serverTimezone=UTC";
    String UserName="root";
    String password="";
    private Connection cnx;
    public static  Connexion instance;
    
    private Connexion(){
        try{
        cnx=DriverManager.getConnection(url, UserName,password);
    }catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
    }
    public static Connexion getInstance(){
    if(instance==null){
   instance=new Connexion();
    }
    return instance;
    }
    public Connection getConnexion(){
    return cnx;
    }
}
