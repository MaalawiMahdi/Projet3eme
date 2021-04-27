/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entites.Categorie;
import HolidaysHiatus.entites.ProduitService;
import HolidaysHiatus.tools.Connexion;
import HolidaysHiatus.tools.MyConnection;
//import HolidayHiatus.tools.MyConnection;
import java.sql.*;
import static java.time.Clock.system;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author DELL
 */
public class ProduitServiceCRUD {

    Connection cnx;
    PreparedStatement ste;

    public ProduitServiceCRUD() {
        cnx = Connexion.getInstance().getConnexion();

    }

    public void ajouterProduitService(ProduitService p) {
        String requete = " INSERT INTO produit_service  VALUES(NULL,?,?,?,?,NULL,?,?)";
        try {

            PreparedStatement pst = cnx.prepareStatement(requete);
            pst.setInt(1, p.getId_board());
            pst.setInt(2, p.getId_categorie());
            pst.setString(3, p.getTitre());
            pst.setString(4, p.getDescription());
            pst.setString(5, p.getType());
            pst.setFloat(6, p.getPrix_unitaire());

            pst.executeUpdate();

            System.out.println("produit ajouté");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }

    public void modifierProduitService(ProduitService p) {
        String requete2 = "UPDATE produit_service SET categorie_id= ?, titre = ?, description= ?, type= ?, prix_unitaire = ? WHERE id = ?";

        try {

            ste = cnx.prepareStatement(requete2);
            ste.setInt(1, p.id_categorie);
            ste.setString(2, p.titre);
            ste.setString(3, p.description);
            ste.setString(4, p.type);
            ste.setFloat(5, p.prix_unitaire);

            ste.setInt(6, p.getId());

            ste.executeUpdate();
            System.out.println("produit modifié");

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }

    public void supprimerProduitService(ProduitService p) {
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

    public List<ProduitService> displayProduitService(int idboard) {
        //nteger id, Integer id_categorie, String titre, String description, String type, float prix_unitaire
        List<ProduitService> myList = new ArrayList<>();
        try {
            String requete = "SELECT * FROM produit_service where board_id = ?";
            ste = cnx.prepareStatement(requete);
            ste.setInt(1, idboard);
            ResultSet rs = ste.executeQuery();
            while (rs.next()) {
                ProduitService p = new ProduitService(rs.getInt("id"), rs.getInt("categorie_id"), rs.getString("titre"), rs.getString("description"), rs.getString("type"), rs.getFloat("prix_unitaire"));
                p.setLien_image(rs.getString("lien_image"));
                myList.add(p);
            }
        } catch (SQLException ex) {

            System.out.println(ex.getMessage());
        }
        return myList;
    }

    public List<ProduitService> Chercher(String val, int boardid) {
        String sql = "select * from produit_service where ( (titre like ? ) or (type like ? )"
                + " or (description like ?) or (id=?) or (categorie_id=?) or (prix_unitaire=?) ) and (board_id=?) ";

        List<ProduitService> myList = new ArrayList();
        try {
            ste = cnx.prepareStatement(sql);
            ste.setString(4, val);
            ste.setString(5, val);
            ste.setString(6, val);

            val = "%" + val + "%";
            ste.setString(1, val);
            ste.setString(2, val);
            ste.setString(3, val);
            ste.setInt(7, boardid);

            ResultSet rs = ste.executeQuery();
            while (rs.next()) {
                myList.add(new ProduitService(rs.getInt("id"), rs.getInt("categorie_id"), rs.getString("titre"), rs.getString("description"), rs.getString("type"), rs.getFloat("prix_unitaire")));
            }
        } catch (SQLException ex) {
            System.out.print(ex.getMessage());
        }
        return myList;
    }

    public ProduitService getProduitServiceById(int id) {
        List<ProduitService> myList = new ArrayList<>();
        try {
            String requete = "SELECT * FROM produit_service where id = ?";
            ste = cnx.prepareStatement(requete);
            ste.setInt(1, id);
            ResultSet rs = ste.executeQuery();
            while (rs.next()) {
                ProduitService p = new ProduitService(rs.getInt("id"), rs.getInt("categorie_id"), rs.getString("titre"), rs.getString("description"), rs.getString("type"), rs.getFloat("prix_unitaire"));
                p.setLien_image(rs.getString("lien_image"));
            return p;  
            }
        } catch (SQLException ex) {

            System.out.println(ex.getMessage());
        }
        return null;

    }

}
