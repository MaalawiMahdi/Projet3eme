/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entites.Livraison;
import HolidaysHiatus.tools.Connexion;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author noamen
 */
public class LivraisonService {
      Connection cnx;
    PreparedStatement ste;

    public LivraisonService() {
        cnx=Connexion.getInstance().getConnexion();

    }
    public List<Integer> AfficherIds(){
    //nteger id, Integer id_categorie, String titre, String description, String type, float prix_unitaire
    List<Integer> myList = new ArrayList<>() ;
    try{
       String requete = "SELECT * FROM livraison" ;
  ste=cnx.prepareStatement(requete);
     ResultSet rs= ste.executeQuery();
    while(rs.next()){

  myList.add(rs.getInt("id"));
  
    }
    }catch (SQLException ex) {
        
        System.out.println(ex.getMessage());
    }
       return myList;
    }
    public List<Livraison> AfficherLivraison(){
    List<Livraison> myList = new ArrayList<>() ;
    try{
       String requete = "SELECT * FROM Livraison" ;
  ste=cnx.prepareStatement(requete);
     ResultSet rs= ste.executeQuery();
    while(rs.next()){
//    public Livraison(int id, String Type, Float Prix, Boolean Etat) {

  myList.add(new Livraison(rs.getInt("id"),rs.getString("type"),rs.getFloat("prix"),rs.getBoolean("etat")));
  
    }
    }catch (SQLException ex) {
        
        System.out.println(ex.getMessage());
    }
       return myList;
    }
    public void Supprimer(Livraison l){
    try{
        String requete = "DELETE FROM livraison WHERE id=?" ; 
     ste =cnx.prepareStatement(requete);
    ste.setInt(1,l.getId()) ;
    ste.executeUpdate();
    System.out.println("Livraison supprimée");
    
            
    }catch (SQLException ex) {
        
        System.out.println(ex.getMessage());
    }
}
    public void ajouterLivraison(Livraison l )
    {
  String sql="insert into Livraison (type,prix,etat) values(?,?,?)";
     try{
     ste=cnx.prepareStatement(sql);
     ste.setString(1,l.getType());
     ste.setFloat(2,l.getPrix());
     ste.setBoolean(3,l.getEtat());
     ste.executeUpdate();
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    

    }
    }
    public void fin(Livraison l){
    String requete = "UPDATE livraison SET etat=true where id= ? " ;
try{
    ste = cnx.prepareStatement(requete);
    ste.setInt(1,l.getId());
    ste.executeUpdate();
}catch (SQLException ex){
    System.out.println(ex.getMessage()) ;
}
}
    public void modifier(Livraison l){
    String requete = "UPDATE livraison SET prix=? , type=? where id= ? " ;
try{
    ste = cnx.prepareStatement(requete);
    ste.setFloat(1,l.getPrix());
    ste.setString(2,l.getType());
    ste.setInt(3,l.getId());
     ste.executeUpdate();
}catch (SQLException ex){
    System.out.println(ex.getMessage()) ;
}
}

    public Livraison AfficherLivraison(Integer value) {
 List<Livraison> myList = new ArrayList<>() ;
    try{
       String requete = "SELECT * FROM Livraison where id=?" ;
  ste=cnx.prepareStatement(requete);
  ste.setInt(1, value);
     ResultSet rs= ste.executeQuery();
    while(rs.next()){
//    public Livraison(int id, String Type, Float Prix, Boolean Etat) {

  return new Livraison(rs.getInt("id"),rs.getString("type"),rs.getFloat("prix"),rs.getBoolean("etat"));
  
    }
    }catch (SQLException ex) {
        
        System.out.println(ex.getMessage());
    }
       return null;
    }
}
