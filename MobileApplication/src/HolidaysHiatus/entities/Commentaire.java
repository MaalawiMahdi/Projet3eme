/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.entities;

/**
 *
 * @author hp
 */
public class Commentaire {
    private int id;
    private int user_id;
    private int sujet_id;
    private String com;
    private String user_mail;

    public String getUser_mail() {
        return user_mail;
    }

    
    public void setUser_mail(String toString) {
        this.user_mail = toString;
    }
      
  

    public Commentaire(int id, int user_id, int sujet_id, String com) {
        this.id = id;
        this.user_id = user_id;
        this.sujet_id = sujet_id;
        this.com = com;
    }

    public Commentaire() {
    }

    public Commentaire(int user_id, int sujet_id, String com) {
        this.user_id = user_id;
        this.sujet_id = sujet_id;
        this.com = com;
    }

    @Override
    public String toString() {
        return "Commentaire{" + "id=" + id + ", user_id=" + user_id + ", sujet_id=" + sujet_id + ", com=" + com + ", user_mail=" + user_mail + '}';
    }

   

    public int getId() {
        return id;
    }

    public Commentaire(int id, String com) {
        this.id = id;
        this.com = com;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getUser_id() {
        return user_id;
    }

    public void setUser_id(int user_id) {
        this.user_id = user_id;
    }

    public Commentaire(int id) {
        this.id = id;
    }

    public int getSujet_id() {
        return sujet_id;
    }

    public void setSujet_id(int sujet_id) {
        this.sujet_id = sujet_id;
    }

    public String getCom() {
        return com;
    }

    public void setCom(String com) {
        this.com = com;
    }

    
    
}
