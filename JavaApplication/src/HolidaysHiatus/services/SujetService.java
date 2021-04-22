/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entities.NoteSujet;
import HolidaysHiatus.entities.Sujet;
import HolidaysHiatus.tools.MyConnection;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author hp
 */
public class SujetService {

    Connection cnx;
    PreparedStatement ste;

    public SujetService() {
        cnx = MyConnection.getInstance().getCnx();
    }

    public void ajouterSujet(Sujet s) {
        String sql = "insert into sujet(board_id,titre,description,lien_image) values (?,?,?,?)";
        try {
            ste = cnx.prepareStatement(sql);
            ste.setInt(1, s.getBoard_id());
            ste.setString(2, s.getTitre());
            ste.setString(3, s.getDescription());
            ste.setString(4, s.getLien_image());
            ste.executeUpdate();
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }

    public List<Sujet> afficherSujet() {
        List<Sujet> l = new ArrayList<>();
        String sql = "SELECT * From sujet";
        try {
            ste = cnx.prepareStatement(sql);
            ResultSet rs = ste.executeQuery();
            while (rs.next()) {
                l.add(new Sujet(rs.getInt(1), rs.getInt(2), rs.getString(3), rs.getString(4), rs.getString(5)));
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return l;
    }

    public List<Sujet> afficherSujetParBoard(int idb) {
        List<Sujet> l = new ArrayList<>();
        String sql = "SELECT * From sujet WHERE board_id=?";
        try {
            ste = cnx.prepareStatement(sql);
            ste.setInt(1, idb);
            ResultSet rs = ste.executeQuery();
            while (rs.next()) {
                l.add(new Sujet(rs.getInt(1), rs.getInt(2), rs.getString(3), rs.getString(4), rs.getString(5)));
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return l;
    }

    public void supprimerSujet(Sujet s) {
        String sql = "DELETE FROM sujet WHERE id=?";
        try {
            ste = cnx.prepareStatement(sql);
            ste.setInt(1, s.getId());
            ste.executeUpdate();
            System.out.println("supprimée");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }

    public void modifierSujet(Sujet s) {
        String sql = "UPDATE sujet SET titre=? , description =?, lien_image =? WHERE id =?";
        try {
            PreparedStatement ps = cnx.prepareStatement(sql);
            ps.setString(1, s.getTitre());
            ps.setString(2, s.getDescription());
            ps.setString(3, s.getLien_image());
            ps.setInt(4, s.getId());
            ps.executeUpdate();
            System.out.println("modifiée");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }

    }

    public Sujet rechercheSujet(int id) {
        Sujet y = new Sujet();
        String sql = "SELECT * From sujet WHERE id=?";
        try {
            ste = cnx.prepareStatement(sql);
            ste.setInt(1, id);
            ResultSet rs = ste.executeQuery();
            while (rs.next()) {
                y.setId(rs.getInt(1));
                y.setBoard_id(rs.getInt(2));
                y.setTitre(rs.getString(3));
                y.setDescription(rs.getString(4));
                y.setLien_image(rs.getString(5));
                break;
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return y;
    }

    public void ajouterNote(NoteSujet n) {
        String sql = "insert into notesujet(sujet_id,user_id,value) values (?,?,?)";
        try {
            ste = cnx.prepareStatement(sql);
            ste.setInt(1, n.getSujet_id());
            ste.setInt(2, n.getUser_id());
            ste.setInt(3, n.getValue());
            ste.executeUpdate();
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }

    public NoteSujet rechercheNote(int ids, int idu) {
        NoteSujet y = new NoteSujet();
        String sql = "SELECT * From notesujet WHERE sujet_id=? and user_id =?";
        try {
            ste = cnx.prepareStatement(sql);
            ste.setInt(1, ids);
            ste.setInt(2, idu);
            ResultSet rs = ste.executeQuery();
            while (rs.next()) {
                y.setId(rs.getInt(1));
                y.setSujet_id(rs.getInt(2));
                y.setUser_id(rs.getInt(3));
                y.setValue(rs.getInt(4));
                break;
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return y;
    }

    public void modifierNote(NoteSujet n) {
        String sql = "UPDATE notesujet SET value =? WHERE id =?";
        try {
            PreparedStatement ps = cnx.prepareStatement(sql);
            ps.setInt(1, n.getValue());
            ps.setInt(2, n.getId());
            ps.executeUpdate();
            System.out.println("modifiée");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }

    public List<Sujet> Chercher(String val, int valboard) {
        String sql = "select * from sujet WHERE board_id =? AND ((titre like ?) OR (description like ?))";

        List<Sujet> l = new ArrayList();
        try {
            ste = cnx.prepareStatement(sql);
            ste.setInt(1, valboard);
            val = "%" + val + "%";
            ste.setString(2, val);
            ste.setString(3, val);
            ResultSet rs = ste.executeQuery();
            while (rs.next()) {
                l.add(new Sujet(rs.getInt(1), rs.getInt(2), rs.getString(3), rs.getString(4), rs.getString(5)));
            }
        } catch (SQLException ex) {
            System.out.print(ex.getMessage());
        }
        return l;
    }

    public int NoteMoyenne(Sujet s) {
        float x = 0;
        String sql = "SELECT AVG(value) From notesujet WHERE sujet_id = ?";
        try {
            ste = cnx.prepareStatement(sql);
            ste.setInt(1, s.getId());
            ResultSet rs = ste.executeQuery();
            while (rs.next()) {
                x = rs.getInt(1);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return (int) x;
    }

}
