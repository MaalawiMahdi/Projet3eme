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
     String sql="select * from user ";
     List <Societe> Societes  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ResultSet result= ste.executeQuery();
     while(result.next()){
     Societes.add(new Societe(result.getInt(1),result.getInt(2),result.getString(2),result.getString(3),result.getString(4),result.getBoolean(5),result.getString(6)));
     }
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
     return Societes;
    }
     
    
}
