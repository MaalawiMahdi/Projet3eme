/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.entities.CaptchaAide;
import HolidaysHiatus.entities.CategorieAide;
import HolidaysHiatus.entities.NoteAide;
import HolidaysHiatus.tools.MyConnection;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
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
    public int CountAides(int id) {

        int i = 0;
        String requete = "SELECT * FROM aide where categorie_id= ?  ";

        try {
            PreparedStatement pst = cn2.prepareStatement(requete);
            pst.setInt(1,id);
            ResultSet rs = pst.executeQuery();
            while (rs.next()) {
             i=i+1;
            }
          
         return i; 
         

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return i;
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
      
       
    
    
     public String cherchercattitre(int id) {

        String titre = "";
        String requete = "SELECT titre FROM categorie_aide where id= ?";

        try {
            PreparedStatement pst = cn2.prepareStatement(requete);
             pst.setInt(1, id);
            ResultSet rs = pst.executeQuery();
               
            while (rs.next()) {

                titre=rs.getString("titre");
            }

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return titre;
    }
     
     public CaptchaAide getCaptchaAide(int id) {

        
        String requete = "SELECT * FROM captcha where id= ?";
            CaptchaAide c = new CaptchaAide();
        try {
            PreparedStatement pst = cn2.prepareStatement(requete);
             pst.setInt(1, id);
            ResultSet rs = pst.executeQuery();

            while (rs.next()) {
               
                c.setId(rs.getInt("id"));
                c.setValue(rs.getString("value"));
                c.setLien_image_captcha(rs.getString("lien_image_captcha"));

                return c;
            }

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return c;
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

    public void deleteAide(int id) {

        String requete2 = "DELETE FROM aide WHERE id= ?";

        try {

            PreparedStatement pst = cn2.prepareStatement(requete2);
            pst.setInt(1, id);
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



    public List<Aide> rechercherAide(String text) {

        ArrayList<Aide> Aides = new ArrayList<>();
        String requete =  "select * from aide where titre LIKE '" + text + "%' OR description LIKE '" + text + "%'  OR num_tell LIKE '" + text + "%'OR adresse LIKE '" + text + "%'";

        try {
            PreparedStatement pst2 = cn2.prepareStatement(requete);
            //    pst2.setString(1, beaide);

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
                a.setLien_image(rs.getString("lien_image"));
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
public void setAideNoteAvis(int val, String Avis, int userid, int aideid) {
        if (val != 0) {

            String requete = " INSERT INTO note ( `user_id`, `valeur`, `aide_id`)  VALUES(?,?,?) ";
            try {

                PreparedStatement pst = cn2.prepareStatement(requete);
                pst.setInt(1, userid);
                pst.setInt(2, val);
                pst.setInt(3, aideid);

                pst.executeUpdate();

                System.out.println("Note insérée");
            } catch (SQLException ex) {
                System.out.println(ex.getMessage());
            }
        }
        if (Avis != "") {

            String requete = " INSERT INTO note ( `user_id`, `avis`, `aide_id`)  VALUES(?,?,?)";
            try {

                PreparedStatement pst = cn2.prepareStatement(requete);
                pst.setInt(1, userid);
                pst.setString(2, Avis);
                pst.setInt(3, aideid);

                pst.executeUpdate();

                System.out.println("avis insérer");
            } catch (SQLException ex) {
                System.out.println(ex.getMessage());
            }
        }

    }

    public NoteAide getAideNoteAvis(int userid, int aideid) {
        NoteAide m = new NoteAide();
        m=null;
        
        String requete = "Select * from note where user_id= ? AND aide_id= ?";
        try {

            PreparedStatement pst = cn2.prepareStatement(requete);
            pst.setInt(1, userid);
            pst.setInt(2, aideid);

            pst.executeQuery();

            ResultSet rs = pst.executeQuery();

            while (rs.next()) {
                NoteAide n = new NoteAide();
        
                n.setId(rs.getInt("id"));
                n.setAide_id(rs.getInt("aide_id"));
                n.setUser_id(rs.getInt("user_id"));
                n.setAvis(rs.getString("Avis"));
                n.setValeur(rs.getInt("Valeur"));
             return n;

            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return m;
    }
    
    public void updateAideNoteAvis(int val, String Avis, int noteid) {
        if (val != 0) {
 
            String requete = "UPDATE note SET valeur = ?  WHERE id = ?";
            try {

                PreparedStatement pst = cn2.prepareStatement(requete);
                pst.setInt(1, val);
                pst.setInt(2, noteid);
                

                pst.executeUpdate();

                System.out.println("note modifiée");
            } catch (SQLException ex) {
                System.out.println(ex.getMessage());
            }
        }
        if (Avis != "") {

            String requete = "UPDATE note SET avis = ?  WHERE id = ?";
            try {

                PreparedStatement pst = cn2.prepareStatement(requete);
                pst.setInt(2, noteid);
                pst.setString(1, Avis);
             
                pst.executeUpdate();

                System.out.println("avis modifier");
            } catch (SQLException ex) {
                System.out.println(ex.getMessage());
            }
        }

    }
    
    public float MoyenneNotes(int aideId){
        int s=0;
        float m=0;
        int i=0;

        String requete= "Select valeur from note where aide_id= ?";
        try {
            PreparedStatement pst= cn2.prepareStatement(requete);
            pst.setInt(1, aideId);
            pst.executeQuery();
            
            ResultSet rs = pst.executeQuery();

            while (rs.next()) {
                s=s+rs.getInt("Valeur");
                i=i+1;       
            }
            if (s!=0)
            {m=s/i;  }
          return m;
        } catch (SQLException ex) {
            Logger.getLogger(AideCrud.class.getName()).log(Level.SEVERE, null, ex);
        }
        return m;
    }
  
  
   public CategorieAide chercherCatAide(int id) {
 
        String requete = "SELECT * FROM categorie_aide where id=?";
        CategorieAide a = new CategorieAide();
        try {
            PreparedStatement pst = cn2.prepareStatement(requete);
            pst.setInt(1,id);
            ResultSet rs = pst.executeQuery();
            
            while (rs.next()) {
               
                a.setId(rs.getInt("id"));
            
                a.setTitre(rs.getString("titre"));
               
                a.setLien_icon(rs.getString("lien_icon"));
            return a;
            }

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
       
        return a;
    }
}
