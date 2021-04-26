/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entites.Categorie;
import HolidaysHiatus.tools.Connexion;
import HolidaysHiatus.tools.MyConnection;
//import HolidayHiatus.tools.MyConnection;
import static java.time.Clock.system;
import java.util.ArrayList;
import java.util.List;
import java.sql.PreparedStatement;
import java.sql.Connection;
import java.sql.SQLException;
import java.sql.ResultSet;

/**
 *
 * @author DELL
 */
public class CategorieCRUD {
     Connection cnx;
    PreparedStatement ste;

    public CategorieCRUD() {
        cnx=Connexion.getInstance().getConnexion();

    }
   



public void ajouterCategorie(Categorie c){
  String sql="insert into categorie_produit_service values(NULL,?,?)";
     try{
     ste=cnx.prepareStatement(sql);
     ste.setString(2,c.getNom());
     ste.setInt(1,c.getId_board().intValue());
      
     ste.executeUpdate();
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
}

public void modifierCategorie(Categorie c){
    String requete = "UPDATE categorie_produit_service SET nom=? where id= ? " ;
try{
    ste = cnx.prepareStatement(requete);
    ste.setInt(2,c.getId().intValue());
    ste.setString(1,c.getNom());
    ste.executeUpdate();
}catch (SQLException ex){
    System.out.println(ex.getMessage()) ;
}
}


public void supprimerCategorie(Categorie c){
    try{
        String requete = "DELETE FROM categorie_produit_service WHERE id=?" ; 
     ste =cnx.prepareStatement(requete);
    ste.setInt(1,c.getId().intValue()) ;
    ste.executeUpdate();
    System.out.println("categorie supprimée");
    
            
    }catch (SQLException ex) {
        
        System.out.println(ex.getMessage());
    }
}

public List<Categorie> displayCategorie(int boardId){
    List<Categorie> myList = new ArrayList<>() ;
    try{
       String requete = "SELECT * FROM categorie_produit_service where board_id=?" ;
      ste=cnx.prepareStatement(requete);
     ste.setInt(1, boardId);
     ResultSet rs= ste.executeQuery();
    while(rs.next()){
       myList.add(new Categorie(rs.getInt(1),rs.getString(3))) ;
    }
    }catch (SQLException ex) {
        
        System.out.println(ex.getMessage());
    }
     return  myList;
    }
  public List<Categorie> Chercher(String val,int boardid){
         String sql="select * from categorie_produit_service where ( (nom like ? ) or ( id=? )) and (board_id=?) ";
     
     List <Categorie> Categories  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ste.setString(2, val);
      val="%" + val + "%";
     ste.setString(1, val);
     
     ste.setInt(3,boardid);
     
     ResultSet result= ste.executeQuery();
     while(result.next()){
       Categories.add(new Categorie(result.getInt(1),result.getString(3))) ;
     }
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     return Categories;
    }
}






































