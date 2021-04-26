/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entites.Societe;
import HolidaysHiatus.tools.Connexion;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author ASUS
 */
public class SocieteService {
       Connection cnx;
    PreparedStatement ste;
    public SocieteService(){
    cnx=Connexion.getInstance().getConnexion();
    }
    public void AjouterSociete(Societe s){
     String sql="insert into societe values(NULL,?,?,?,?,?,?)";
     try{
     ste=cnx.prepareStatement(sql);
     ste.setInt(1,s.getUseraccount_id());
     ste.setString(2,s.getNumregistre());
     ste.setString(3,s.getAdresse());
     ste.setString(4,s.getType());
     ste.setBoolean(5,s.isEtat());
     ste.setString(6,s.getNom());
      
     ste.executeUpdate();
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
    }
    public List<Societe> AfficherSocietes(){
     String sql="select * from societe ";
     List <Societe> Societes  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ResultSet result= ste.executeQuery();
     while(result.next()){
     Societes.add(new Societe(result.getInt(1),result.getInt(2),result.getString(3),result.getString(4),result.getString(5),result.getBoolean(6),result.getString(7)));
     }
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     return Societes;
    }
     
    public Societe chercherparidclient(int id){
     String sql="select * from societe where useraccount_id = ?";
     List <Societe> Societe  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ste.setInt(1,id);
     ResultSet result= ste.executeQuery();
    while(result.next()){
     Societe.add(new Societe(result.getInt(1),result.getInt(2),result.getString(3),result.getString(4),result.getString(5),result.getBoolean(6),result.getString(7)));
     }
if (Societe.size()>0){
    return Societe.get(0);

}else{
    return null;
}
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
      return null;
     }

    }
        public void updateSociete(Societe s){
      String sql="Update societe set numregistre=?,adresse=?,type=?,etat=?,nom=? where id =?";
     try{
          ste=cnx.prepareStatement(sql);
          ste.setString(1,s.getNumregistre());
          ste.setString(2,s.getAdresse());
          ste.setString(3,s.getType());
          ste.setBoolean(4,s.isEtat());
          ste.setString(5, s.getNom());
          ste.setInt(6,s.getId());
          ste.executeUpdate();
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
     }
    }
    public List<Societe> Chercher(String val){
   String sql="select * from societe where (id=?) or (useraccount_id = ?) or (numregistre like ?) or (adresse like ?) or (type like ?) or (nom like ? ) ";
     
     List <Societe> Societes  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ste.setString(1, val);
     ste.setString(2, val);
     val="%" + val + "%";
     ste.setString(3, val);
     ste.setString(4, val);
     ste.setString(5, val);
     ste.setString(6, val);
     
     ResultSet result= ste.executeQuery();
     while(result.next()){
     Societes.add(new Societe(result.getInt(1),result.getInt(2),result.getString(3),result.getString(4),result.getString(5),result.getBoolean(6),result.getString(7)));
     }
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     return Societes;
    }
    public void SupprimerSociete(int id){
     String sql="delete from societe where id = ?";
     try{
     ste=cnx.prepareStatement(sql);
     ste.setInt(1,id);
     ste.executeUpdate();
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     
    }
}
