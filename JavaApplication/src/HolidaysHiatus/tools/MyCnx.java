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
 * @author AMINE
 */
public class MyCnx {
     String url="jdbc:mysql://localhost:3306/holidayhiatus?useTimezone=true&serverTimezone=UTC";
    String UserName="root";
    String password="";
    private Connection cnx;
    public static  MyCnx instance;
    
    private MyCnx(){
        try{
        cnx=DriverManager.getConnection(url, UserName,password);
    }catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
    }
public static MyCnx getInstance(){
    if(instance==null){
   instance=new MyCnx();
}
    return instance;
}
public Connection getConnexion(){
return cnx;
}
}
