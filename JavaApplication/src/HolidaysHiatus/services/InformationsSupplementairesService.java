/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entites.InformationsSupplementaires;
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
public class InformationsSupplementairesService {
         Connection cnx;
    PreparedStatement ste;

    public InformationsSupplementairesService() {
            cnx=Connexion.getInstance().getConnexion();

    }
  
      public void AjouterInformation(InformationsSupplementaires s){
     String sql="insert into informations_supplementaires values(NULL,?,?,?,?,?)";
     try{
     ste=cnx.prepareStatement(sql);
     ste.setInt(1,s.getUser_id());
     ste.setString(2,s.getNom());
     ste.setString(3,s.getPrenom());
     ste.setString(4,s.getTell());
     ste.setString(5,s.getImage());
      
     ste.executeUpdate();
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
    }
       public InformationsSupplementaires chercherparidclient(int id){
     String sql="select * from informations_supplementaires where user_id = ?";
     List <InformationsSupplementaires> Information_list  = new ArrayList();
     try{
     ste=cnx.prepareStatement(sql);
     ste.setInt(1,id);
     ResultSet result= ste.executeQuery();
    while(result.next()){
     Information_list.add(new InformationsSupplementaires(result.getInt(1),result.getInt(2),result.getString(3),result.getString(4),result.getString(5),result.getString(6)));
     //int id, int user_id, String nom, String prenom, String tell, String image 
    }
if (Information_list.size()>0){
    return Information_list.get(0);

}else{
    return null;
}
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
      return null;
     }

    }
       public void update(InformationsSupplementaires s){
        String sql="Update informations_supplementaires set nom=?,prenom=?,tell=?,image=? where user_id = ?";
     try{
     ste=cnx.prepareStatement(sql);
          ste.setString(1,s.getNom());
 ste.setString(2,s.getPrenom());
 ste.setString(3,s.getTell());
 ste.setString(4,s.getImage());
 ste.setInt(5,s.getUser_id());
 
ste.executeUpdate();
     } catch(SQLException ex){
        System.out.print(ex.getMessage());
    }
       }
  
}
