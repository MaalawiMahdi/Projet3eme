/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.tools;

import HolidaysHiatus.entities.InformationsSupplementaires;
import HolidaysHiatus.entities.Societe;
import HolidaysHiatus.entities.User;

/**
 *
 * @author ASUS
 */
public final class Session {
     private static Session instance;
     private User SessionUser;
     private Societe SessionSociete;
     private User FacebookInscription = new User("");
     private InformationsSupplementaires FacebookData = new InformationsSupplementaires();

    public InformationsSupplementaires getFacebookData() {
        return FacebookData;
    }

    public void setFacebookData(InformationsSupplementaires FacebookData) {
        this.FacebookData = FacebookData;
    }
     

   
     private Session() {
     }
      private Session(User SessionUser) {
          this.SessionUser=SessionUser;
     }
     
     public static Session StartSession() {
        if(instance == null) {
            instance = new Session();
        }
        return instance;
    }
     
     public static Session StartSession(User SessionUser) {
        if(instance == null) {
            instance = new Session(SessionUser);
        }
        return instance;
    } 
     public static Session getSession() {
        return instance;
    }
      public  void clearSession() {
      SessionUser=null;
      }
      public void setSessionUser(User SessionUser){
      this.SessionUser=SessionUser;
      }
      public User getSessionUser(){
      return this.SessionUser;
      }
      
       public Societe getSessionSociete() {
        return SessionSociete;
    }

    public void setSessionSociete(Societe SessionSociete) {
        this.SessionSociete = SessionSociete;
    }
    public void SetSessionUser(User SessionUser ){
    this.SessionUser=SessionUser;
    
    }

    public User getFacebookInscription() {
        return FacebookInscription;
    }

    public void setFacebookInscription(User FacebookInscription) {
        this.FacebookInscription = FacebookInscription;
    }
      
      
     
     
}
