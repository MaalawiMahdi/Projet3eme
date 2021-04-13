/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import java.sql.Connection;
import HolidaysHiatus.entities.*;
import HolidaysHiatus.tools.MyCnx;;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

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
    public List<Board> AfficherBoard(){
     String sql="select * from Board ";
     List <Board> Boards  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ResultSet result= ste.executeQuery();
     while(result.next()){
     Boards.add(new Board(result.getInt(1),result.getInt(2),result.getString(3),result.getString(4)));
     
         
     }
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     return Boards;
    }
    
     public List<Board> AfficherBoardavance(int cat_id){
     String sql="select * from Board where categorie_id LIKE '"+cat_id+"%'";
     List <Board> Boards  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ResultSet result= ste.executeQuery();
     while(result.next()){
     Boards.add(new Board(result.getInt(1),result.getInt(2),result.getString(3),result.getString(4)));
     
         
     }
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     return Boards;
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

}
