/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.entites;

/**
 *
 * @author noamen
 */
public class Commande {
    int id;
    int user_id;
    int livraison_id;
    float prix;
    String Adresse;

    public Commande(int user_id, float prix, String Adresse) {
        this.user_id = user_id;
        this.prix = prix;
        this.Adresse = Adresse;
    }

    public Commande(int user_id, int livraison_id, float prix, String Adresse) {
        this.user_id = user_id;
        this.livraison_id = livraison_id;
        this.prix = prix;
        this.Adresse = Adresse;
    }

    public Commande(int id, int user_id, int livraison_id, float prix, String Adresse) {
        this.id = id;
        this.user_id = user_id;
        this.livraison_id = livraison_id;
        this.prix = prix;
        this.Adresse = Adresse;
    }

    public Commande() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    public String getAdresse() {
        return Adresse;
    }

    public void setAdresse(String Adresse) {
        this.Adresse = Adresse;
    }

    public Commande(int id, int user_id, int livraison_id, float prix) {
        this.id = id;
        this.user_id = user_id;
        this.livraison_id = livraison_id;
        this.prix = prix;
    }

    public Commande(int user_id, float prix) {
        this.user_id = user_id;
        this.prix = prix;
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

    public int getLivraison_id() {
        return livraison_id;
    }

    public void setLivraison_id(int livraison_id) {
        this.livraison_id = livraison_id;
    }

    public float getPrix() {
        return prix;
    }

    public void setPrix(float prix) {
        this.prix = prix;
    }
    
    
    
}
