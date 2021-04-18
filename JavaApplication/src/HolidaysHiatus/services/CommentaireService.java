/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entities.Commentaire;
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
public class CommentaireService {

    Connection cnx;
    PreparedStatement ste;

    public CommentaireService() {
        cnx = MyConnection.getInstance().getCnx();

    }
    public void ajouterCommentaire(Commentaire c) {
        String sql = "insert into commentaire(user_id,sujet_id,com) values (?,?,?)";
        try {
            ste = cnx.prepareStatement(sql);
            ste.setInt(1, c.getUser_id());
            ste.setInt(2, c.getSujet_id());
            ste.setString(3, c.getCom());
            ste.executeUpdate();
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    public List<Commentaire> afficherCommentaireParSujet(int ids) {
        List<Commentaire> l = new ArrayList<>();
        String sql = "SELECT * From commentaire WHERE sujet_id=?";
        try {
            ste = cnx.prepareStatement(sql);
            ste.setInt(1, ids);
            ResultSet rs = ste.executeQuery();
            while (rs.next()) {
                l.add(new Commentaire(rs.getInt(1), rs.getInt(2), rs.getInt(3), rs.getString(4)));
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return l;
    }
    
    
    public void supprimerCommentaire(Commentaire c) {
        String sql = "DELETE FROM commentaire WHERE id=?";
        try {
            PreparedStatement ps = cnx.prepareStatement(sql);
            ps.setInt(1, c.getId());
            ps.executeUpdate();
            System.out.println("supprimée");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    public void modifierCommentaire(Commentaire c) {
        String sql = "UPDATE commentaire SET com=? WHERE id =?";
        try {
            PreparedStatement ps = cnx.prepareStatement(sql);
            ps.setString(1, c.getCom());
            ps.setInt(2, c.getId());
            ps.executeUpdate();
            System.out.println("modifiée");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    public String comuser(int usd)
    {
        String mail = new String();
        String sql = "SELECT mail FROM user WHERE id=? ";
        try {
            ste = cnx.prepareStatement(sql);
            ste.setInt(1, usd);
            ResultSet rs = ste.executeQuery();
            while(rs.next())
            {
              mail = rs.getString(1);
              break;
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return mail;
    }
    
    
    public List<String> motsIndesirables() {
        List<String> l = new ArrayList<>();
        String sql = "SELECT mot From unwantedwords";
        try {
            ste = cnx.prepareStatement(sql);
            ResultSet rs = ste.executeQuery();
            while (rs.next()) {
                l.add(new String(rs.getString(1)));
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return l;
    }

}
