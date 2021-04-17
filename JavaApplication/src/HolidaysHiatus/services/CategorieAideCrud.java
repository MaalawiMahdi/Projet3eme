/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entities.CategorieAide;
import HolidaysHiatus.tools.MyConnection;
import com.lowagie.text.BadElementException;
import com.lowagie.text.Image;
import java.io.IOException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author drwhoo
 */
public class CategorieAideCrud {
       Connection cn2;
    Statement st;

    public CategorieAideCrud() {
        cn2 =  MyConnection.getInstance().getCnx();
    }
  
    
    public void AjouterCategorieAide(CategorieAide c){
        String requete = " INSERT INTO categorie_aide ( `titre`, `lien_icon`)  VALUES(?,?)";
         try {
             
             PreparedStatement pst = cn2.prepareStatement(requete);
             pst.setString(1, c.getTitre());
             pst.setString(2, c.getLien_icon());
             pst.executeUpdate();
             
             
             System.out.println("Categorie Aide Ajoutée");
         } catch (SQLException ex) {
             System.out.println(ex.getMessage());         }
    }
    
   public void modifierCategorieAide(CategorieAide c) {

        String requete2 = "UPDATE categorie_aide SET titre = ?, lien_icon = ? WHERE id = ?";

        try {

            PreparedStatement pst = cn2.prepareStatement(requete2);

            pst.setString(1,c.getTitre());

            pst.setString(2,c.getLien_icon());
           
            pst.setInt(3, c.getId());

            pst.executeUpdate();
            System.out.println("Categorie Aide modifée");
          

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }  
    }
  

    public void deleteCategorieAide(int Id ) {

        String requete2 = "DELETE FROM categorie_aide WHERE id= ?";

        try {

            PreparedStatement pst = cn2.prepareStatement(requete2);
            pst.setInt(1, Id);
            pst.executeUpdate();
            System.out.println("Categorie Aide supprimée");
            
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }

    public List<CategorieAide> afficherCategorieAide() {
    
        ArrayList<CategorieAide> CategorieAides = new ArrayList<>();
        String requete = "SELECT * FROM categorie_aide";

        try {
            PreparedStatement pst = cn2.prepareStatement(requete);
          
            ResultSet rs = pst.executeQuery();
  System.out.println (rs);
            while (rs.next()) {
                CategorieAide c = new CategorieAide();
                c.setId(rs.getInt("id"));
                c.setTitre(rs.getString("titre"));
                c.setLien_icon(rs.getString("lien_icon"));
             
              

                CategorieAides.add(c);
            }

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return CategorieAides;
    }


      

    public List<CategorieAide> rechercherCategorieAide(String besoin, String caractere) {

        ArrayList<CategorieAide> CategorieAides = new ArrayList<>();
        String requete = "select * from categorie_aide where " + besoin + " LIKE '" + caractere + "%'";

        try {
            PreparedStatement pst2 = cn2.prepareStatement(requete);
            //    pst2.setString(1, besoin);

            pst2.executeQuery();
            System.out.println("recherche done");

            ResultSet rs = pst2.executeQuery();

            while (rs.next()) {
                CategorieAide c = new CategorieAide();
                c.setId(rs.getInt("id"));
                c.setTitre(rs.getString("titre"));
                c.setLien_icon(rs.getString("lien_icon"));
                
              

                CategorieAides.add(c);
            }

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
      return CategorieAides;
    }

    public void trierCategorieAide(String o) {

        try {

            String requete2 = "SELECT * FROM categorie_aide order by " + o;
            PreparedStatement pst = cn2.prepareStatement(requete2);
            //   pst.setString(1, o);
            ResultSet rs = pst.executeQuery();
             while (rs.next()) {
                CategorieAide c = new CategorieAide();
                c.setId(rs.getInt("id"));
                c.setTitre(rs.getString("titre"));
                c.setLien_icon(rs.getString("lien_icon"));
                
              

            
                switch (o) {
                    case "id":
                        System.out.println("id = " + c.getId());
                        break;
                    case "titre":
                        System.out.println("titre = " + c.getTitre());
                        break;
                      default:
                        System.out.println("verifier le paramétre svp !!!!!!!!!");

                }
            }

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

    }

 

    
   
}
