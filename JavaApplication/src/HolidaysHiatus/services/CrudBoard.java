/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import java.sql.Connection;
import HolidaysHiatus.entities.*;
import HolidaysHiatus.tools.MyCnx;
import com.restfb.DefaultFacebookClient;
import com.restfb.FacebookClient;
import com.restfb.Parameter;
import com.restfb.types.FacebookType;
import java.sql.DriverManager;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;

/**
 *
 * @author ASUS
 */
public class CrudBoard {
    Connection cnx;
    PreparedStatement ste;
    public CrudBoard(){
    cnx=MyCnx.getInstance().getConnexion();
    }
    public void AjoutereBoard(Board b){
     String sql="insert into board (categorie_id,titre,pic) values(?,?,?)";     
     try{
              ste=cnx.prepareStatement(sql);

     ste.setInt(1,b.getCategorie_id());
     ste.setString(2,b.getTitre());
     ste.setString(3,b.getPic());

     ste.executeUpdate();
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     
    }
    public void ajouter_vue(Board b)
    {
             String sql="UPDATE board SET nbr_vue = nbr_vue + 1 WHERE id=?"; 
               try{
 ste=cnx.prepareStatement(sql);
           ste.setInt(1, b.getId());
      ste.executeUpdate();

        } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
    }
    
    public List<Board> AfficherBoard(){
     String sql="select * from Board Order by nbr_vue desc";
     List <Board> Boards  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ResultSet result= ste.executeQuery();
     while(result.next()){
     Boards.add(new Board(result.getInt(1),result.getInt(2),result.getString(3),result.getString(4),result.getInt(6)));
     
         
     }
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     return Boards;
    }
    
     public List<Board> AfficherBoardavance(int cat_id){
     String sql="select * from Board where categorie_id LIKE '"+cat_id+"%' Order by nbr_vue desc";
     List <Board> Boards  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ResultSet result= ste.executeQuery();
     while(result.next()){
     Boards.add(new Board(result.getInt(1),result.getInt(2),result.getString(3),result.getString(4),result.getInt(6)));
     
         
     }
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     return Boards;
    }
     public List<Board> Chercher(String val){
         String sql="select * from board where (id=?) or (titre like ?)  ";
     
     List <Board> Boards  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ste.setString(1, val);
      val="%" + val + "%";
     ste.setString(2, val);
     ResultSet result= ste.executeQuery();
     while(result.next()){
     Boards.add(new Board(result.getInt(1),result.getInt(2),result.getString(3),result.getString(4),result.getInt(6)));
     }
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     return Boards;
    }
     
   public double calculer_nombre(int cat_id)
   {
       double nbr=0;   
       String sql="select * from Board where categorie_id LIKE '"+cat_id+"%'";
              List <Board> Boards  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ResultSet result= ste.executeQuery();
     while(result.next()){
         nbr++;}
     }catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
  
     return nbr;
   }
    public void supprimer(Board b) {
       String sql = "DELETE FROM board WHERE id=?";
        try {
               ste=cnx.prepareStatement(sql);

            ste.setInt(1, b.getId());
            ste.executeUpdate();
            System.out.println("Board Supprimée !");
        } catch(SQLException ex) {
            System.err.println(ex.getMessage());
        }    
    }

    
    public void modifier(Board b) {
  String sql = "UPDATE board SET categorie_id=?,titre=?,pic=? WHERE id=?";
  try {                        
      ste=cnx.prepareStatement(sql);
           ste.setInt(4, b.getId());
            ste.setInt(1, b.getCategorie_id());
            ste.setString(2, b.getTitre());
            ste.setString(3, b.getPic());
     ste.executeUpdate();
            System.out.println("Board Modifié !");
            System.out.println(b);
        } catch(SQLException ex) {
            System.err.println(ex.getMessage());
        }    }

    
      public String getNameOf(int cat_id)
    {
             String sql="select * from categorie_board  WHERE id ='"+cat_id+"'";
String name="";
              try{
     ste=cnx.prepareStatement(sql);
     ResultSet result= ste.executeQuery();
     while(result.next()){
      name=result.getString(2);
         
     }
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     return name;
    }
      public void postfb()
      {
          String accessToken="EAA1QYFl4OYABAOBkNV04EvfpgPpDZCNVp1TtLite9SGVtEQAOfVk2ECCeYqa4grI3dCfc5VD3mjIWT1VxYNLu0thcNFBfolOlSkVQMRD8XsU5HasoacWUVWSrIqFLYoqfk3VEDIHGZAVDJryKKMYZBIn9L8ZCcsStGrLQtBzYzytNeVeqpCUTxqK2lpX4FKRfElWIOZBIslTHnX1qqFjBw7vZCjIJqtgEEUIHtvL3FhgZDZD";
          FacebookClient fbClient=new DefaultFacebookClient(accessToken);
              FacebookType response=fbClient.publish("me/feed", FacebookType.class,Parameter.with("message", "Java Graph Api test"));
          System.out.println("fb.com/"+response.getId());
      }
      public ResultSet actualiser()
      {
           //combobox
      String sql="select * from Board ";
     List <Board> Boards  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ResultSet result= ste.executeQuery();
         return result;

         
     }
      catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
        return null;
      
      }
}
