/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entities.*;
import HolidaysHiatus.tools.MyCnx;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author AMINE
 */
public class CrudCategorie {
     Connection cnx;
    PreparedStatement ste;
    public CrudCategorie(){
    cnx=MyCnx.getInstance().getConnexion();
    }
    public void AjoutereCategorie(CategorieBoard b){
     String sql="insert into categorie_board (titre,lien_icon) values(?,?)";
     try{
     ste=cnx.prepareStatement(sql);
     ste.setString(1,b.getTitre());
     ste.setString(2,b.getPic());

     ste.executeUpdate();
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     
    }
    public List<CategorieBoard> AfficherBoard(){
     String sql="select * from categorie_board ";
     List <CategorieBoard> CBoards  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ResultSet result= ste.executeQuery();
     while(result.next()){
     CBoards.add(new CategorieBoard(result.getInt(1),result.getString(2),result.getString(3)));
     
         
     }
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     return CBoards;

}
    
    
     public int CategorieBoardIdOf(String nom){
     String sql="select * from categorie_board  WHERE titre LIKE'"+nom+"%'";
    int id=0;
     try{
     ste=cnx.prepareStatement(sql);
     ResultSet result= ste.executeQuery();
     while(result.next()){
      id=result.getInt(1);
         
     }
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     return id;

}
    public void supprimer(CategorieBoard b) {
       String sql = "DELETE FROM categorie_board WHERE id=?";
        try {
               ste=cnx.prepareStatement(sql);

            ste.setInt(1, b.getId());
            ste.executeUpdate();
            System.out.println("Categorie Supprimée !");
        } catch(SQLException ex) {
            System.err.println(ex.getMessage());
        }    
    }

    
    public void modifier(CategorieBoard b) {
  String sql = "UPDATE categorie_board SET titre=?,lien_icon=? WHERE id=?";
  try {                        
      ste=cnx.prepareStatement(sql);
           ste.setInt(3, b.getId());
       
            ste.setString(1, b.getTitre());
            ste.setString(2, b.getPic());
     ste.executeUpdate();
            System.out.println("Board Modifié !");
            System.out.println(b);
        } catch(SQLException ex) {
            System.err.println(ex.getMessage());
        }    }
}
