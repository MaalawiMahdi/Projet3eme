/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.tools;

import HolidaysHiatus.entites.Societe;
import HolidaysHiatus.entites.User;
import HolidaysHiatus.entities.Board;

/**
 *
 * @author ASUS
 */
public final class Session {
     private static Session instance;
     private User SessionUser;
     private Societe SessionSociete;
     private Board ConnectedBoard;

   
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
      SessionSociete=null;
      ConnectedBoard=null;
      
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

    public Board getConnectedBoard() {
        return ConnectedBoard;
    }

    public void setConnectedBoard(Board ConnectedBoard) {
        this.ConnectedBoard = ConnectedBoard;
    }
    
      
      
     
     
}
