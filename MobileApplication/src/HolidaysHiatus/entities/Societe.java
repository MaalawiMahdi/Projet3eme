/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.entities;

/**
 *
 * @author ASUS
 */
public class Societe {
    int id;
    int useraccount_id;
    String numregistre;
    String adresse;
    String type;
    boolean etat;
    String nom;

    public Societe(int useraccount_id, String numregistre, String adresse, String type, boolean etat, String nom) {
        this.useraccount_id = useraccount_id;
        this.numregistre = numregistre;
        this.adresse = adresse;
        this.type = type;
        this.etat = etat;
        this.nom = nom;
    }

    public Societe(int id, int useraccount_id, String numregistre, String adresse, String type, boolean etat, String nom) {
        this.id = id;
        this.useraccount_id = useraccount_id;
        this.numregistre = numregistre;
        this.adresse = adresse;
        this.type = type;
        this.etat = etat;
        this.nom = nom;
    }

    public Societe() {
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getUseraccount_id() {
        return useraccount_id;
    }

    public void setUseraccount_id(int useraccount_id) {
        this.useraccount_id = useraccount_id;
    }

    public String getNumregistre() {
        return numregistre;
    }

    public void setNumregistre(String numregistre) {
        this.numregistre = numregistre;
    }

    public String getAdresse() {
        return adresse;
    }

    public void setAdresse(String adresse) {
        this.adresse = adresse;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public boolean isEtat() {
        return etat;
    }

    public void setEtat(boolean etat) {
        this.etat = etat;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    @Override
    public String toString() {
        return "Societe{" + "id=" + id + ", useraccount_id=" + useraccount_id + ", numregistre=" + numregistre + ", adresse=" + adresse + ", type=" + type + ", etat=" + etat + ", nom=" + nom + '}';
    }
      public void setEtat(String etat) {
       if(etat.compareTo("true")==0||etat.compareTo("1")==0){
       this.etat=true;
       }else if(etat.compareTo("false")==0||etat.compareTo("0")==0){
       this.etat=false;
       }
    }
    

}