/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.entites;

/**
 *
 * @author ASUS
 */
public class InformationsSupplementaires {
    int id;
    int user_id;
    String nom;
    String prenom;
    String tell;
    String image;

    public InformationsSupplementaires(int id, int user_id, String nom, String prenom, String tell, String image) {
        this.id = id;
        this.user_id = user_id;
        this.nom = nom;
        this.prenom = prenom;
        this.tell = tell;
        this.image = image;
    }

    public InformationsSupplementaires(int user_id, String nom, String prenom, String tell) {
        this.user_id = user_id;
        this.nom = nom;
        this.prenom = prenom;
        this.tell = tell;
    }
    

    public InformationsSupplementaires(int user_id, String nom, String prenom, String tell, String image) {
        this.user_id = user_id;
        this.nom = nom;
        this.prenom = prenom;
        this.tell = tell;
        this.image = image;
    }

    public InformationsSupplementaires() {
    }

    public int getId() {
        return id;
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

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    public String getTell() {
        return tell;
    }

    public void setTell(String tell) {
        this.tell = tell;
    }

    public String getImage() {
        return image;
    }

    public void setImage(String image) {
        this.image = image;
    }

    public InformationsSupplementaires(int user_id) {
        this.user_id = user_id;
    }
    
    
    
}
