/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entites.ArticlePanier;
import HolidaysHiatus.entites.Categorie;
import HolidaysHiatus.entites.Panier;
import HolidaysHiatus.entites.ProduitService;
import HolidaysHiatus.tools.Connexion;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;
import java.util.Map;

/**
 *
 * @author DELL
 */
public class PanierServiceImp  {
/*
     Connection cnx;
    PreparedStatement ste;

    public PanierServiceImp() {
                cnx=Connexion.getInstance().getConnexion();

    }
    private List<ArticlePanier> articles;
Panier p = new Panier() ;
   public void ajouterArticle(ProduitService art, int qte) {

p.articles.put(art, qte);
System.out.println(art.titre);
System.out.println(qte) ;


}
*/
    /**
     *
     * @param article
     */
   /*  public void supprimerArticle(ArticlePanier article){
p.articles.remove(article);
}





public int calculerPanier() {
int total = 0;
Iterator<Map.Entry<ProduitService, Integer>> il = this.p.articles.entrySet().iterator();
while (il.hasNext()) {
                       Map.Entry<ProduitService, Integer> entry = il.next();
total += entry.getKey().getPrix_unitaire() * entry.getValue().intValue();
}
return total;
}
 

public List<ProduitService> displayProduitService(int idboard){
    //nteger id, Integer id_categorie, String titre, String description, String type, float prix_unitaire
    List<ProduitService> myList = new ArrayList<>() ;
    try{
       String requete = "SELECT * FROM produit_service where board_id = ?" ;
  ste=cnx.prepareStatement(requete);
     ste.setInt(1, idboard);
     ResultSet rs= ste.executeQuery();
    while(rs.next()){
  myList.add(new ProduitService(rs.getInt("id"),rs.getInt("categorie_id"),rs.getString("titre"),rs.getString("description"),rs.getString("type"),rs.getFloat("prix_unitaire")));
  
    }
    }catch (SQLException ex) {
        
        System.out.println(ex.getMessage());
    }
       return myList;
    }

    */
}
