/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entites.ArticlePanier;
import HolidaysHiatus.entites.Commande;
import HolidaysHiatus.entites.Panier;
import HolidaysHiatus.entites.ProduitService;
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
public class CommandeService {
  Connection cnx;
    PreparedStatement ste;

    public CommandeService() {
        cnx=Connexion.getInstance().getConnexion();

    }
   



public void ajouterCommande(Commande c){
  String sql="insert into Commande (user_id,prix,adresse) values(?,?,?)";
     try{
     ste=cnx.prepareStatement(sql);
     ste.setInt(1,c.getUser_id());
     ste.setFloat(2,c.getPrix());
     ste.setString(3, c.getAdresse());
      
     ste.executeUpdate();
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }

}
public List<Commande> AfficherCommandes(){
    List<Commande> myList = new ArrayList<>() ;
    try{
       String requete = "SELECT * FROM Commande" ;
  ste=cnx.prepareStatement(requete);
     ResultSet rs= ste.executeQuery();
    while(rs.next()){
        //    public Commande(int id, int user_id, int livraison_id, float prix) {

  myList.add(new Commande(rs.getInt("id"),rs.getInt("user_id"),rs.getInt("livraison_id"),rs.getFloat("prix"),rs.getString("adresse")));
  
    }
    }catch (SQLException ex) {
        
        System.out.println(ex.getMessage());
    }
       return myList;
    }
public void Supprimer(Commande c){
    try{
        String requete = "DELETE FROM Commande WHERE id=?" ; 
     ste =cnx.prepareStatement(requete);
    ste.setInt(1,c.getId()) ;
    ste.executeUpdate();
    System.out.println("Commande supprimée");
    
            
    }catch (SQLException ex) {
        
        System.out.println(ex.getMessage());
    }
}
public void Affecter(Commande C, int livraisonId)
{
  String requete = "UPDATE Commande SET livraison_id=? where id= ? " ;
try{
    ste = cnx.prepareStatement(requete);
    ste.setInt(1,livraisonId);
    ste.setInt(2,C.getId());
    ste.executeUpdate();
}catch (SQLException ex){
    System.out.println(ex.getMessage()) ;
}
}
 public List<Commande> Chercher(String val){
         String sql="select * from Commande where (id=?) or (livraison_id=?) or (prix=?) ";
     
     List <Commande> Commandes  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ste.setString(1, val);
     ste.setString(2, val);
     ste.setString(3, val);
     
     ResultSet rs= ste.executeQuery();
     while(rs.next()){
  Commandes.add(new Commande(rs.getInt("id"),rs.getInt("user_id"),rs.getInt("livraison_id"),rs.getFloat("prix"),rs.getString("adresse")));
     }
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     return Commandes;
    }
 public void ajouterCommandeProduitService(Commande c,ProduitService p,int quantite){
  String sql="insert into produticommanderepository (commande_id,produitservice_id,quantite) values(?,?,?)";
     try{
     ste=cnx.prepareStatement(sql);
     ste.setInt(1,c.getId());
     ste.setInt(2,p.getId());
     ste.setInt(3, quantite);
      
     ste.executeUpdate();
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }

}

 
public Commande GetLastRow(){
    List<Commande> myList = new ArrayList<>() ;
    try{
       String requete = "select * from Commande order by id desc limit 1" ;
  ste=cnx.prepareStatement(requete);
     ResultSet rs= ste.executeQuery();
    while(rs.next()){
        //    public Commande(int id, int user_id, int livraison_id, float prix) {

  myList.add(new Commande(rs.getInt("id"),rs.getInt("user_id"),rs.getInt("livraison_id"),rs.getFloat("prix"),rs.getString("adresse")));
  return myList.get(0);
    }
    }catch (SQLException ex) {
        
        System.out.println(ex.getMessage());
    }
       return null;
    }
public Panier GetListProduitServiceByCommande(Commande c){
  String sql="select * from produticommanderepository  where commande_id=? ";
  Panier P = new Panier();  
  try{
     ste=cnx.prepareStatement(sql);
     ste.setInt(1, c.getId());
     ResultSet rs= ste.executeQuery();
     while(rs.next()){
         
         ProduitServiceCRUD PsCrud = new ProduitServiceCRUD();
         
      ArticlePanier Ap = new ArticlePanier(PsCrud.getProduitServiceById(rs.getInt("produitservice_id")),rs.getInt("quantite"));
      P.articles.add(Ap);
      
      
     }
     return P;
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
  return null;
     
}
}
