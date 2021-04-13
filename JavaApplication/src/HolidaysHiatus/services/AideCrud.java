/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.entities.CategorieAide;
import HolidaysHiatus.tools.MyConnection;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import javafx.scene.control.TableColumn;

/**
 *
 * @author drwhoo
 */
public class AideCrud {

    Connection cn2;
    Statement st;

    public AideCrud() {
        cn2 = MyConnection.getInstance().getCnx();
    }

    public void AjouterAide(Aide a) {
        String requete = " INSERT INTO aide ( `categorie_id`, `titre`, `description`, `adresse`, `num_tell`, `lien_image`)  VALUES(?,?,?,?,?,?)";
        try {

            PreparedStatement pst = cn2.prepareStatement(requete);
            pst.setInt(1, a.getCategorie_id());
            pst.setString(2, a.getTitre());
            pst.setString(3, a.getDescription());
            pst.setString(4, a.getAdresse());
            pst.setString(5, a.getNum_tell());
            pst.setString(6, a.getLien_image());

            pst.executeUpdate();

            System.out.println("Aide Ajoutée");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }

    public int chercherCatAideid(String ch) {

        int id_cat = 0;
        String requete = "SELECT id FROM categorie_aide where titre= ?  ";

        try {
            PreparedStatement pst = cn2.prepareStatement(requete);
            pst.setString(1,ch);
            ResultSet rs = pst.executeQuery();
            while (rs.next()) {

               id_cat = rs.getInt("id");
            return id_cat;
            }
         

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return id_cat;
    }

    public List<String> cherchercattitres() {

        ArrayList<String> titres = new ArrayList<>();
        String requete = "SELECT titre FROM categorie_aide";

        try {
            PreparedStatement pst = cn2.prepareStatement(requete);
            ResultSet rs = pst.executeQuery();

            while (rs.next()) {

                titres.add(rs.getString("titre"));
            }

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return titres;
    }

    public void modifierAide(Aide a) {

        String requete2 = "UPDATE aide SET categorie_id= ?, titre = ?, description= ?, adresse= ?, num_tell= ?, lien_image = ? WHERE id = ?";

        try {

            PreparedStatement pst = cn2.prepareStatement(requete2);
            pst.setInt(1,a.categorie_id);
            pst.setString(2,a.titre);
            pst.setString(3, a.description);
            pst.setString(4, a.adresse);
            pst.setString(5, a.num_tell);
            pst.setString(6, a.lien_image);

            pst.setInt(7, a.getId());

            pst.executeUpdate();
            System.out.println("Aide modifée");

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }

    public void deleteAide(Aide a) {

        String requete2 = "DELETE FROM aide WHERE id= ?";

        try {

            PreparedStatement pst = cn2.prepareStatement(requete2);
            pst.setInt(1, a.getId());
            pst.executeUpdate();
            System.out.println("Aide supprimée");

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }

    public List<Aide> afficherAide() {

        ArrayList<Aide> Aides = new ArrayList<>();
        String requete = "SELECT * FROM aide";

        try {
            PreparedStatement pst = cn2.prepareStatement(requete);
            ResultSet rs = pst.executeQuery();

            while (rs.next()) {
                Aide a = new Aide();
                a.setId(rs.getInt("id"));
                a.setCategorie_id(rs.getInt("categorie_id"));
                a.setTitre(rs.getString("titre"));
                a.setDescription(rs.getString("description"));
                a.setAdresse(rs.getString("adresse"));
                a.setNum_tell(rs.getString("num_tell"));
                a.setLien_image(rs.getString("lien_image"));

                Aides.add(a);
            }

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return Aides;
    }
     public List<Aide> afficherAideFront(int idCat) {

        ArrayList<Aide> Aides = new ArrayList<>();
        String requete = "SELECT * FROM aide where categorie_id=?";

        try {
            PreparedStatement pst = cn2.prepareStatement(requete);
            pst.setInt(1,idCat);
            ResultSet rs = pst.executeQuery();
            
            while (rs.next()) {
                Aide a = new Aide();
                a.setId(rs.getInt("id"));
                a.setCategorie_id(rs.getInt("categorie_id"));
                a.setTitre(rs.getString("titre"));
                a.setDescription(rs.getString("description"));
                a.setAdresse(rs.getString("adresse"));
                a.setNum_tell(rs.getString("num_tell"));
                a.setLien_image(rs.getString("lien_image"));

                Aides.add(a);
            }

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return Aides;
    }
        public Aide afficherAideDetailsFront(int id) {
 
        String requete = "SELECT * FROM aide where id=?";
        Aide a = new Aide();
        try {
            PreparedStatement pst = cn2.prepareStatement(requete);
            pst.setInt(1,id);
            ResultSet rs = pst.executeQuery();
            
            while (rs.next()) {
               
                a.setId(rs.getInt("id"));
                a.setCategorie_id(rs.getInt("categorie_id"));
                a.setTitre(rs.getString("titre"));
                a.setDescription(rs.getString("description"));
                a.setAdresse(rs.getString("adresse"));
                a.setNum_tell(rs.getString("num_tell"));
                a.setLien_image(rs.getString("lien_image"));
            return a;
            }

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
       
        return a;
    }



    public List<Aide> rechercherAide(String besoin, String caractere) {

        ArrayList<Aide> Aides = new ArrayList<>();
        String requete = "select * from aide where " + besoin + " LIKE '" + caractere + "%'";

        try {
            PreparedStatement pst2 = cn2.prepareStatement(requete);
            //    pst2.setString(1, besoin);

            pst2.executeQuery();
            System.out.println("recherche done");

            ResultSet rs = pst2.executeQuery();

            while (rs.next()) {
                Aide a = new Aide();
                a.setId(rs.getInt("id"));
                a.setCategorie_id(rs.getInt("categorie_id"));
                a.setTitre(rs.getString("titre"));
                a.setDescription(rs.getString("description"));
                a.setNum_tell(rs.getString("num_tell"));
                a.setAdresse(rs.getString("adresse"));

                Aides.add(a);
            }

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return Aides;
    }

    public void trierAide(String o) {

        try {

            String requete2 = "SELECT * FROM aide order by " + o;
            PreparedStatement pst = cn2.prepareStatement(requete2);
            //   pst.setString(1, o);
            ResultSet rs = pst.executeQuery();
            while (rs.next()) {
                Aide a = new Aide();
                a.setId(rs.getInt("id"));
                a.setCategorie_id(rs.getInt("categorie_id"));
                a.setTitre(rs.getString("titre"));
                a.setDescription(rs.getString("description"));
                a.setNum_tell(rs.getString("num_tell"));
                a.setAdresse(rs.getString("adresse"));

                switch (o) {
                    case "id":
                        System.out.println("id = " + a.getId());
                        break;
                    case "categorie_id":
                        System.out.println("categorie_id = " + a.getCategorie_id());
                        break;
                    case "titre":
                        System.out.println("titre = " + a.getTitre());
                        break;
                    case "description":
                        System.out.println("description = " + a.getDescription());
                        break;
                    case "adresse":
                        System.out.println("adresse = " + a.getAdresse());
                        break;
                    case "num_tell":
                        System.out.println("num_tell = " + a.getNum_tell());
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
