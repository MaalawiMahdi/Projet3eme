/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entites.User;
import HolidaysHiatus.tools.Connexion;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author ASUS
 */
public class UserService {
    Connection cnx;
    PreparedStatement ste;
    public UserService(){
    cnx=Connexion.getInstance().getConnexion();
    }
    public void AjouterUser(User u){
     String sql="insert into user values(NULL,?,?,?,?,?)";
     try{
     ste=cnx.prepareStatement(sql);
     ste.setString(1,u.getPassword());
     ste.setString(2,u.getType());
     ste.setString(3,u.getMail());
     ste.setBoolean(4,u.isActive());
     ste.setBoolean(5,u.isBan());
      
     ste.executeUpdate();
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     
    }
     public void SupprimerUser(int id){
     String sql="delete from user where id = ?";
     try{
     ste=cnx.prepareStatement(sql);
     ste.setInt(1,id);
     ste.executeUpdate();
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     
    }
     public void BanUser(int id,boolean value){
      String sql="Update user set ban=? where id = ?";
     try{
     ste=cnx.prepareStatement(sql);
          ste.setBoolean(1,value);

     ste.setInt(2,id);
     ste.executeUpdate();
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     }
      public void UpdateUser(User u){
      String sql="Update user set password=?,type=?,mail=?,active=?,ban=? where id = ?";
     try{
     ste=cnx.prepareStatement(sql);
          ste.setString(1,u.getPassword());
 ste.setString(2,u.getType());
 ste.setString(3,u.getMail());
 ste.setBoolean(4,u.isActive());
 ste.setBoolean(5,u.isBan());
 ste.setInt(6,u.getId());
 
ste.executeUpdate();
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     }
    
    public List<User> AfficherUsers(){
     String sql="select * from user ";
     List <User> Users  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ResultSet result= ste.executeQuery();
     while(result.next()){
     Users.add(new User(result.getInt(1),result.getString(2),result.getString(3),result.getString(4),result.getBoolean(5),result.getBoolean(6)));
     }
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     return Users;
    }
     
    public boolean isExiste(String mail){
     String sql="select * from user where mail = ?";
     List <User> Users  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ste.setString(1,mail);
     ResultSet result= ste.executeQuery();
     return result.first();
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
      return false;
     }
    }
    
    public User ChercherParMail(String mail){
     String sql="select * from user where mail = ?";
    
     try{
     ste=cnx.prepareStatement(sql);
     ste.setString(1, mail);
     ResultSet result= ste.executeQuery();
     while(result.next()){
    User u = new User(result.getInt(1),result.getString(2),result.getString(3),result.getString(4),result.getBoolean(5),result.getBoolean(6));
     return u;
     }
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     return null;
    }
     
    public List<User> Chercher(String val){
         String sql="select * from user where (id=?) or (mail like ?) or (type like ?) ";
     
     List <User> Users  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ste.setString(1, val);
      val="%" + val + "%";
     ste.setString(2, val);
     ste.setString(3, val);
     
     ResultSet result= ste.executeQuery();
     while(result.next()){
     Users.add(new User(result.getInt(1),result.getString(2),result.getString(3),result.getString(4),result.getBoolean(5),result.getBoolean(6)));
     }
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     return Users;
    }
}
