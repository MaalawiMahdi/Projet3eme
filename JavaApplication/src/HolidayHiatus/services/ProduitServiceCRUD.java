/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidayHiatus.services;

import HolidayHiatus.entities.Categorie;
import HolidayHiatus.entities.ProduitService;
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
public class ProduitServiceCRUD {
    MyConnection myc = MyConnection.getInstance() ; 
Connection cnx=myc.getCnx ;



public void ajouterProduitService(ProduitService p){
 String requete = " INSERT INTO produit_service ( `id_categorie`, `titre`, `description`, `lien_image`, `type`, `prix_unitaire`)  VALUES(?,?,?,?,?,?)";
        try {

            PreparedStatement pst = cnx.prepareStatement(requete);
            pst.setInt(1, p.getId_categorie());
            pst.setString(2, p.getTitre());
            pst.setString(3, p.getDescription());
            pst.setString(4, p.getLien_image());
            pst.setString(5, p.getType());
            pst.setFloat(6, p.getPrix_unitaire());

            pst.executeUpdate();

            System.out.println("produit ajouté");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }}

public void modifierProduitService(ProduitService p , int id){
String requete2 = "UPDATE produit_service SET id_categorie= ?, titre = ?, description= ?, lien_image= ?, type= ?, prix_unitaire = ? WHERE id = ?";

        try {

            PreparedStatement pst = cnx.prepareStatement(requete2);
            pst.setInt(1,p.id_categorie);
            pst.setString(2,p.titre);
            pst.setString(3, p.description);
            pst.setString(4, p.lien_image);
            pst.setString(5, p.type);
            pst.setFloat(6, p.prix_unitaire);

            pst.setInt(7, p.getId());

            pst.executeUpdate();
            System.out.println("produit modifié");

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
}


public void supprimerProduitService(ProduitService p){
   String requete2 = "DELETE FROM produit_service WHERE id= ?";

        try {

            PreparedStatement pst = cnx.prepareStatement(requete2);
            pst.setInt(1, p.getId());
            pst.executeUpdate();
            System.out.println("produit supprimé");

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
}

public List<ProduitService> displayProduitService(){
    List<ProduitService> myList = new ArrayList<>() ;
    try{
       String requete = "SELECT * FROM produit_service" ;
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
