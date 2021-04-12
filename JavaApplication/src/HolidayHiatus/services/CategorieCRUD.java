/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidayHiatus.services;

import HolidayHiatus.entities.Categorie;
import HolidaysHiatus.tools.MyConnection;
//import HolidayHiatus.tools.MyConnection;
import java.sql.* ;
import static java.time.Clock.system;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author DELL
 */
public class CategorieCRUD {
   MyConnection myc = MyConnection.getInstance() ; 
Connection cnx=myc.getCnx ;



public void ajouterCategorie(Categorie c){
  String requete = "INSERT INTO categorie_produit_service (nom)"+" VALUES (" + c.getNom()+")"  ;
  try{
 Statement st = cnx.createStatement() ;
st.executeUpdate(requete) ;
  System.out.println("Categorie ajoutée") ;
  }catch(SQLException ex){
      System.out.println("erreur") ;

}
}

public void modifierCategorie(Categorie c , int id){
    String requete = "UPDATE categorie_produit_service SET nom= (" + c.getNom()+")" ;
try{
    PreparedStatement pst = cnx.prepareStatement(requete);
    pst.setString(1,c.getNom());
}catch (SQLException ex){
    System.out.println(ex.getMessage()) ;
}
}


public void supprimerCategorie(Categorie c){
    try{
        String requete = "DELETE FROM categorie_produi_service WHERE id= (" + c.getNom()+")" ; 
    PreparedStatement pst =cnx.prepareStatement(requete);
    pst.setInt(1,c.getId()) ;
    System.out.println("categorie supprimée");
    
            
    }catch (SQLException ex) {
        
        System.out.println(ex.getMessage());
    }
}

public List<Categorie> displayCategorie(){
    List<Categorie> myList = new ArrayList<>() ;
    try{
       String requete = "SELECT * FROM categorie_produit_service" ;
    Statement st = cnx.createStatement();
    ResultSet rs = st.executeQuery(requete) ;
    while(rs.next()){
        Categorie c = new Categorie() ;
    }
    }catch (SQLException ex) {
        
        System.out.println(ex.getMessage());
    }
       return null;
    }
}






































